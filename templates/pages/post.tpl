{extends file="include/header.tpl"}

{block name=head}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/github-markdown-css/2.6.0/github-markdown.css"/>
{/block}

{block name=body}

<div class="post-page">{$markdown_el}</div>

{/block}

{block name=js}{/block}
