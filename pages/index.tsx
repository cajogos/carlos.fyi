import type { ReactElement } from 'react';
import MainLayout from '../layouts/Main';

export default function Index()
{
    return <h1>Carlos.fyi</h1>
};

Index.getLayout = function getLayout(page: ReactElement)
{
    return <MainLayout>{page}</MainLayout>;
};