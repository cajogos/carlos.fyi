import type { ReactElement } from 'react';
import BlogLayout from '../../layouts/Blog';

export default function BlogIndex()
{
    return <h1>Blog Index!</h1>;
}

BlogIndex.getLayout = function getLayout(page: ReactElement)
{
    return <BlogLayout>{page}</BlogLayout>;
};