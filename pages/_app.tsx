import type { ReactElement, ReactNode } from 'react';
import type { NextPage } from 'next';
import type { AppProps } from 'next/app';

import Head from 'next/head';

import 'bootstrap/dist/css/bootstrap.css';
import '../styles/global.scss';

type NextPageWithLayout = NextPage & {
    getLayout?: (page: ReactElement) => ReactNode;
    getPageTitle?: () => string;
};
type AppPropsWithLayout = AppProps & { Component: NextPageWithLayout };

export default function MyApp({ Component, pageProps }: AppPropsWithLayout)
{
    // Custom layouts can be defined using getLayout
    const getLayout = Component.getLayout || (page => page);

    // Custom page titles can be defined using getPageTitle
    let pageTitle = Component.getPageTitle || '';
    pageTitle = pageTitle ?
        `${pageTitle} | Carlos Ferreira - All Things Developer from London` :
        'Carlos Ferreira - All Things Developer from London';

    return getLayout(
        <>
            <Head>
                <title>{pageTitle}</title>
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
            </Head>
            <Component {...pageProps} />
        </>
    );
}