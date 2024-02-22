<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuManagementController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categoriesForAdder = Category::all(); 
        $categoriesForEdit = Category::all();
    
        return view('menumanagement', [
            'menus' => $menus,
            'categoriesForAdder' => $categoriesForAdder,
            'categoriesForEdit' => $categoriesForEdit,
        ]);
    }



    public function update(Request $request, $menuId)
    {
        $input = $request->all();
        $menu = Menu::find($menuId);
        $menu->menu_name = $input['menuName'];
        $menu->description = $input['menuDescription'];
        $menu->price = $input['menuPrice'];
        $menu->category_id = $input['menuCategories'];
    
        if ($request->hasFile('upload-input')) {
            $file = $request->file('upload-input');
            $imageData = file_get_contents($file->getRealPath());
            $menu->menu_img = $imageData;
        }
        $menu->save();
        return back();
    }

    public function add(Request $request)
    {
        $input = $request->all();
    
        // Check if the selected category is an existing one or a new one
        if ($input['adderCategories'] == 'addNew') {
            // If it's a new category, create it
            $newCategory = Category::create([
                'category_name' => $input['newCategory'],
            ]);
    
            // Set the category_id for the new menu to the ID of the newly created category
            $categoryId = $newCategory->category_id;
        } else {
            // If it's an existing category, use its ID
            $categoryId = $input['adderCategories'];
        }
    
        // Create the new menu
        $menu = Menu::create([
            'menu_name' => $input['adderName'],
            'description' => $input['adderDescription'],
            'price' => $input['adderPrice'],
            'category_id' => $categoryId,
        ]);
    
        // Handle file upload
        if ($request->hasFile('adderInput')) {
            $file = $request->file('adderInput');
            $imageData = file_get_contents($file->getRealPath());
            $menu->menu_img = $imageData;
        }
    
        $menu->save();
    
        return back();
    }
        
    
    
}
