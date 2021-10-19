export default function MainLayout({ children })
{
    return (
        <div>
            <h1>Main Layout</h1>
            <p>This is the main layout</p>
            <main>{children}</main>
        </div>
    );
};