{extends file="include/header.tpl"}

{block name=head}
    <link rel="stylesheet" href="/assets/css/blog.css">
    {block name=headblog}{/block}
{/block}

{block name=body}
    <div class="blog-page">
        {block name=bodyblog}{/block}
    </div>
{/block}

{block name=footerblog}{/block}

{block name=js}{/block}