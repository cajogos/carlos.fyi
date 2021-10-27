import Head from 'next/head';
import Footer from '../components/Footer';
import SlideoutNavbar from '../components/SlideoutNavbar';
import { useState } from 'react';

type LayoutProps = {
    children: React.ReactNode;
};

export default function MainLayout({ children }: LayoutProps)
{
    return (
        <>
            <Head>
                <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto+Mono" rel="stylesheet" />
            </Head>
            <SlideoutNavbar/>
            <div className="container">
                <div className="row">
                    <div className="col">
                        <div className="container">
                            {children}
                            <Footer />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};