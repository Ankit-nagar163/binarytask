<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Binary Tree</title>
    <style>
        /* Styling for the tree structure */
        .tree ul {
            position: relative;
            padding-top: 20px;
            text-align: center;
            list-style-type: none;
        }

        .tree ul ul {
            margin-top: 20px;
        }

        .tree li {
            display: inline-block;
            vertical-align: top;
            position: relative;
            padding: 20px 5px 0 5px;
        }

        .tree li::before, .tree li::after {
            content: '';
            position: absolute;
            top: 0;
            width: 50%;
            height: 20px;
            border-top: 2px solid #000; /* Black connectors */
        }

        .tree li::before {
            right: 50%;
        }

        .tree li::after {
            left: 50%;
            border-left: 2px solid #000;
        }

        .tree li:only-child::before, .tree li:only-child::after {
            display: none;
        }

        .tree li:only-child {
            padding-top: 0;
        }

        .tree li:first-child::before, .tree li:last-child::after {
            border: 0;
        }

        .tree li span {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 50%; /* Circular nodes */
            background-color: #4A90E2; /* Blue background */
            color: white;
            font-weight: bold;
            text-align: center;
        }

        .tree li span:hover {
            background-color: #007BFF; /* Darker blue on hover */
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="tree">
        <ul>
            @foreach ($tree as $key => $children)
                <li>
                    <span>{{ $key }}</span>
                    @if (is_array($children) && count($children) > 0)
                        <ul>
                            @foreach ($children as $childKey => $childValue)
                                <li>
                                    <span>{{ $childKey }}</span>
                                    @if (is_array($childValue) && count($childValue) > 0)
                                        <ul>
                                            @foreach ($childValue as $grandChild)
                                                <li><span>{{ $grandChild }}</span></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
