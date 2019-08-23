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

        <div class="post-author">
            <div class="row">
                <div class="col-sm-6">
                    <div class="author-avatar" style="background-image: url('{$author->getAvatar()}')"></div>
                    <div class="author-name">
                        <a href="{$author->getURL()}" title="See all posts by {$author->getDisplayName()}">
                            {$author->getDisplayName()}
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <h4>{$published_date|date_format:"%B %e, %Y"}</h4>
                </div>
            </div>
        </div>

        <div class="post-content">
            {$post->getContent()}
        </div>

        <div class="post-comments">
            <h3 class="text-center">Comments coming soon...</h3>
        </div>
    </div>
{/block}

{block name=footerblog}{/block}
