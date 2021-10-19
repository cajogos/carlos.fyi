import type { ReactElement } from 'react';
import MainLayout from '../layouts/Main';
import { FaBeer } from 'react-icons/fa';

export default function Index()
{
    return <h1>Carlos.fyi <FaBeer /></h1>
};

Index.getLayout = function getLayout(page: ReactElement)
{
    return <MainLayout>{page}</MainLayout>;
};