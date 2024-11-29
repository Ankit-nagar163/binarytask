@if ($node->leftChild || $node->rightChild)
<ul>
    @if ($node->leftChild)
        <li>
            <a href="javascript:;"> <span>{{ $node->leftChild->user->name }}</span></a>
            @include('binary_tree.node', ['node' => $node->leftChild])
        </li>
    @endif

    @if ($node->rightChild)
        <li>
            <a href="javascript:;">  <span>{{ $node->rightChild->user->name }}</span></a>
            @include('binary_tree.node', ['node' => $node->rightChild])
        </li>
    @endif
</ul>
@endif
