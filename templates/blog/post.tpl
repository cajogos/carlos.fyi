{extends file="blog/header.tpl"}

{block name=headblog}{/block}

{block name=bodyblog}
    <div class="blog-post">
        <div class="post-header">
            <div class="featured-image" style="background-image: url('{$post->getFeaturedImage()}')"></div>
            <div class="post-headline">
                <h1>{$post->getHeadline()}</h1>
                <ul class="post-categories">
                    {foreach $categories as $category}
                        <li class="post-category">
                            <a href="{$category->getURL()}" title="See all posts for {$category->getPageTitle()}">
                                {$category->getPageTitle()}
                            </a>
                        </li>
                    {/foreach}
                </ul>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-6">
                <img src="{$authors[0]->getAvatar()}" class="img-responsive" alt="{$authors[0]->getDisplayName()}">
                {for $i = 0; $i < count($authors); $i++}
                    <h3>{$authors[$i]->getDisplayName()}</h3>
                {/for}
            </div>
            <div class="col-sm-6">
                <h4>{$post->getDatePublished()}</h4>
            </div>
        </div>

        <hr/>
        <h1>Blog Post: {$post->getHeadline()} ({$post->getID()})</h1>
        <h4>{$post->getURL()}</h4>
        <div class="post-content">
            {$post->getContent()}
        </div>
    </div>
{/block}

{block name=footerblog}{/block}
