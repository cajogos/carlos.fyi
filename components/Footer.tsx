import ComponentStyles from '../styles/components/Footer.module.scss';

export default function Footer()
{
    const curYear = new Date().getFullYear();

    return (
        <div className={ComponentStyles.footer}>
            carlos.fyi &copy; {curYear}
        </div>
    );
}
