import Head from 'next/head';

import { FaBars, FaTimes } from 'react-icons/fa';

import Footer from '../components/Footer';
import SlideoutNavbar from '../components/SlideoutNavbar';
import { useState } from 'react';

type LayoutProps = {
    children: React.ReactNode;
};

export default function MainLayout({ children }: LayoutProps)
{
    const [isNavbarOpen, setIsNavbarOpen] = useState(false)

    return (
        <>
            <Head>
                <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto+Mono" rel="stylesheet" />
            </Head>
            <div className="container">
                <div className="row">
                    {isNavbarOpen &&
                        <div className="col-3">
                            <SlideoutNavbar isOpen={isNavbarOpen} />
                        </div>
                    }
                    <div className="col">
                        <button className="toggle-button" onClick={() => setIsNavbarOpen(!isNavbarOpen)}>
                            {isNavbarOpen ? <FaTimes /> : <FaBars />}
                        </button>
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