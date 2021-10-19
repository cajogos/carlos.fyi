import MainLayout from './Main';

export default function BlogLayout({ children })
{
    return (
        <>
            <MainLayout>
                <h1>Blog</h1>
                {children}
            </MainLayout>
        </>
    );
};