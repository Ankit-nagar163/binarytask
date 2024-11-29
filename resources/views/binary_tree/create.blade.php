@extends('binary_tree.layouts.app')

@section('content')
<div class="container">
    <h1>Add Node to Binary Tree</h1>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('binary-tree.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Select User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Select Parent Node</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">None (Root Node)</option>
                @foreach ($treeNodes as $node)
                    <option value="{{ $node->user_id }}">{{ $node->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Select Position</label>
            <select name="position" id="position" class="form-control" required>
                <option value="left">Left Child</option>
                <option value="right">Right Child</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Node</button>
    </form>
</div>
@endsection
