import Head from 'next/head';

import { FaBars } from 'react-icons/fa';
import Footer from '../components/Footer';

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
            <div id="navigation-menu">
                navbar here
            </div>
            <div id="website-content">
                <button className="toggle-button"><FaBars /></button>

                <div className="container">
                    {children}
                    <Footer />
                </div>
            </div>
        </>
    );
};