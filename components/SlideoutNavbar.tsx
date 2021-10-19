import Link from 'next/link';

import { FaCube, FaHeart, FaEnvelope } from 'react-icons/fa';

import ComponentStyles from '../styles/components/SlideoutNavbar.module.scss';

export default function SlideoutNavbar()
{
    return (
        <div className={ComponentStyles.menu}>
            <Link href="/">
                <h1 title="Carlos Ferreira - All Things Developer from London"
                    className={ComponentStyles.title}>
                    carlos.fyi
                </h1>
            </Link>

            <span className={ComponentStyles.header}>Me, Myself and I</span>

            <Link href="/">
                <a className={ComponentStyles.link} title="Find out more about who this Carlos Ferreira fellow is.">
                    Who I am
                </a>
            </Link>
            <Link href="/contact">
                <a className={ComponentStyles.link} title="Contact Carlos Ferreira web developer from London.">
                    Contact Me
                </a>
            </Link>
            <Link href="/skills">
                <a className={ComponentStyles.link} title="Check out the skills of Carlos Ferreira.">
                    My Skills
                </a>
            </Link>
            <Link href="/timeline">
                <a className={ComponentStyles.link} title="See events from my life, aka resume.">
                    Timeline
                </a>
            </Link>

            <span className={ComponentStyles.header}>My Work</span>

            <a className={ComponentStyles.link}
                href="https://biscuit.link"
                title="The Biscuit Link PHP Framework"
                target="_blank">
                Biscuit Link
            </a>
            <a className={ComponentStyles.link}
                href="https://github.com/cajogos?tab=repositories"
                title="Check out my repositories on GitHub!"
                target="_blank">
                Open Source
            </a>

            <span className={ComponentStyles.header}>Miscellaneous</span>

            <Link href="/rubiks-cube">
                <a className={ComponentStyles.link} title="Learn how to solve the 3x3 Rubik's Cube">
                    <FaCube /> 3x3 Rubik's Cube Tutorial
                </a>
            </Link>

            <div className={ComponentStyles.footer}>
                <p>Made with <FaHeart className="text-orangered" /> by me.</p>
                <p><FaEnvelope /> <a href="mailto:c@rlos.rocks">c@rlos.rocks</a></p>
            </div>
        </div>
    );
};