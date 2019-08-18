{extends file="blog/header.tpl"}

{block name=headblog}{/block}

{block name=bodyblog}
    <div class="blog-post">
        <h1>Blog Post: {$post_headline} ({$post_id})</h1>
        <h4>{$post_url}</h4>
        <div class="post-content">
            {$post_content}
        </div>
    </div>
{/block}

{block name=footerblog}{/block}
