import type { ReactElement } from 'react';

import { FaEnvelope, FaPhone, FaLinkedin, FaTwitter } from 'react-icons/fa';

import ContactForm from '../components/ContactForm';
import MainLayout from '../layouts/Main';

import PageStyles from '../styles/pages/Contact.module.scss';

export default function Contact()
{
    return (
        <div>
            <h1>Oh, why hello there...</h1>
            <div className="row">
                <div className="col-8">
                    <h2>Let's build things together!</h2>
                    <p>I am always looking for new projects to work on. So, if have you got an idea that you would like to make it a reality, send me a quick email to c@rlos.rocks or fill out the form below.</p>
                    <p>As long as we have a comfortable schedule. I am more than willing to discussing and maybe even work on something new! Maybe grab a chocolate frapp&eacute; in central London after work?</p>
                    <div className="contact-form-container">
                        <ContactForm />
                    </div>
                </div>
                <div className="col-4">
                    <h2>Methods of contact</h2>
                    <p>I am pretty much everywhere on the Interwebz! Mostly known online by the nickname of <a href="https://duckduckgo.com/?q=cajogos" className="fw-bold" target="_blank">cajogos</a>.</p>
                    <h3>So you want to...</h3>
                    <div className={PageStyles.methods}>
                        <h4>
                            ...send me an <FaEnvelope title="email" />?<br />
                            <a href="mailto:c@rlos.rocks">c@rlos.rocks</a>
                        </h4>
                        <h4>
                            ...give me a <FaPhone title="phone call" />?<br />
                            <a href="tel:+447779527412">(+44) 777 9527 412</a>
                        </h4>
                        <h4>
                            ...connect with me on <FaLinkedin title="LinkedIn" />?<br />
                            <a href="https://www.linkedin.com/in/cajogos" target="_blank">Carlos Ferreira</a>
                        </h4>
                        <h4>
                            ...follow me on <FaTwitter title="Twitter" />?<br />
                            <a href="https://twitter.com/carlos_tweets" target="_blank">@Carlos_Tweets</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    );
};

Contact.getLayout = (page: ReactElement) =>
{
    return <MainLayout>{page}</MainLayout>;
};

Contact.getPageTitle = (): string => 'Get In Touch';