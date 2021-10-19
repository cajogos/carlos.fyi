import Head from 'next/head';

import { FaBars } from 'react-icons/fa';
import Footer from '../components/Footer';
import SlideoutNavbar from '../components/SlideoutNavbar';

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
            <SlideoutNavbar />
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