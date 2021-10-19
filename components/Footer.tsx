import ComponentStyles from '../styles/components/Footer.module.scss';

export default function Footer()
{
    const curYear = new Date().getFullYear();

    return (
        <div className={ComponentStyles.footer}>
            <p>
                <a title="FYI That's me :)" href="https://carlos.fyi/">carlos.fyi</a> &copy; {curYear}
            </p>
        </div>
    );
}
