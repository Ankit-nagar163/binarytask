<?php namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tree;
use Illuminate\Http\Request;

class BinaryTreeController extends Controller
{
    // Display the binary tree in a view
    public function index()
{
    // Fetch all nodes with their user and their left/right child relationships
    $tree = Tree::with(['user', 'leftChild', 'leftChild.user', 'rightChild', 'rightChild.user'])
        ->whereNull('parent_id') // Fetch only root nodes
        ->get();

    return view('binary_tree.index', compact('tree'));
}


    // Form to add a new node
    public function create()
    {
        $users = User::all();
        $treeNodes = Tree::with('user')->get();
        return view('binary_tree.create', compact('users', 'treeNodes'));
    }

    // Handle adding a new node
    public function store(Request $request)
    {
        $request->validate([
            'parent_id' => 'nullable|exists:trees,user_id',
            'position' => 'required|in:left,right',
            'user_id' => 'required|exists:users,id',
        ]);

        $parent = Tree::where('parent_id', $request->parent_id)->where('position',$request->position)->count();
        if( $parent)
        {
        
            return back()->with('error', $request->position.' child already exists.');
        }
        $node = Tree::create([
            'user_id' => $request->user_id,
            'parent_id' => $request->parent_id,
            'position'=>$request->position,
        ]);

        

        return redirect()->route('binary-tree.index')->with('success', 'Node added successfully!');
    }
}
