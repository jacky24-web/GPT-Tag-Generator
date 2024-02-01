<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use OpenAI\Laravel\Facades\OpenAI;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

       return view('products',compact('products'));
    }

    public function storeProductTags(Request $request)
    {
       
        try {
            $prompt = 'Please provide list of '.$request->length .' '.$request->entity.' for product named '.$request->product_name.' Format the list without using any number bullets.';
            $openAIResult = OpenAI::completions()->create([
                'model'      => 'gpt-3.5-turbo-instruct',
                'prompt'     => $prompt,
                'max_tokens' => 1000,
                'temperature' => 0.2
            ]);

           $tags =  $this->filterTags($openAIResult); 
           if (!empty($tags)) {
            $product = Product::find($request->product_id);

            foreach ($tags as $tag) {
                // Create the tag
                $tagExists = Tag::where('name', $tag)->select('id')->first();
                $tagNames = [];
        
                foreach ($tags as $tag) {
                    $tagModel = Tag::firstOrCreate(['name' => $tag]);
                    $tagNames[] = $tagModel->id;
                }
   
                $product->tags()->attach($tagNames);
                return redirect()->back()->with('success','Tags Generated SuccessFully');
            }
           }
        } catch (\Exception $e) {
            dd($e->getMessage());
            
        }
    }

    public function storeTags(Request $request)
    {

        try {
            DB::table('taggables')->truncate();

            // DB::table('product_tag')->truncate();
            DB::table('tags')->truncate();

           $length = $request->length;
           $entity = $request->entity;
           $products = Product::select('id','name')->get();
           foreach ($products as $product) {
               $prompt = 'Please provide list of '.$length .' '.$entity.' for product named '.$product->name.' Format the list without using any number bullets.';
               $openAIResult = OpenAI::completions()->create([
                   'model'      => 'gpt-3.5-turbo-instruct',
                   'prompt'     => $prompt,
                   'max_tokens' => 1000,
                   'temperature' => 0.2
               ]);
              $tags =  $this->filterTags($openAIResult); 
              if (!empty($tags)) {
                $tagNames = [];
                foreach ($tags as $tag) {
                    $tagModel = Tag::firstOrCreate(['name' => $tag]);
                    $tagNames[] = $tagModel->id;
                }
                $product->tags()->attach($tagNames);
            } 
        }
        return redirect()->back()->with('success','Tags Generated SuccessFully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            
        }
    }

    public function getProductTags($product_id)
    {
        $product = Product::findOrFail($product_id);

        // Assuming you have a "tags" relationship defined in your Product model
        $tags = $product->tags;
        $tagNames = $tags->pluck('name')->toArray();
        return response()->json(['tags' => $tagNames]);
    }

    public function filterTags($openAIResult)
    {

        $tagsWithNumbers = $openAIResult['choices'][0]['text'];
        $tagsWithNumbers = preg_replace('/^\s*[-–—]?\s*/m', '', $tagsWithNumbers);

        $tagsArray = explode("\n", trim($tagsWithNumbers));
        // Remove any empty elements from the array
        $tagsArray = array_filter($tagsArray);
        
        return $tagsArray;
    }
}
