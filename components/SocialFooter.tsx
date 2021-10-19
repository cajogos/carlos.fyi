import { FaGithubSquare, FaTwitterSquare, FaLinkedin, FaTelegramPlane } from 'react-icons/fa';
import ComponentStyles from '../styles/components/SocialFooter.module.scss';

export default function SocialFooter()
{
    return (
        <div className={ComponentStyles.links}>
            <ul>
                <li>
                    <a href="https://github.com/cajogos" target="_blank" title="Check out my GitHub account!">
                        <FaGithubSquare size="2rem" className="text-orangered" />
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/carlos_tweets" target="_blank" title="Follow me on Twitter!">
                        <FaTwitterSquare size="2rem" className="text-orangered" />
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/cajogos" target="_blank" title="Connect with me on LinkedIn!">
                        <FaLinkedin size="2rem" className="text-orangered" />
                    </a>
                </li>
                <li>
                    <a href="https://t.me/cajogos" target="_blank" title="Speak to me on Telegram!">
                        <FaTelegramPlane size="2rem" className="text-orangered" />
                    </a>
                </li>
            </ul>
        </div>
    );
};