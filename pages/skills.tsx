import type { ReactElement } from 'react';

import { FaSuperpowers, FaGraduationCap, FaMicrochip, FaBug, FaDatabase, FaTablet, FaSitemap } from 'react-icons/fa';

import MainLayout from '../layouts/Main';

import PageStyles from '../styles/pages/Skills.module.scss';

export default function Skills()
{
    return (
        <div>
            <h1 className="text-center">
                <FaSuperpowers className="text-orangered icon-spin" />
                &nbsp;&nbsp;My Super Powers&nbsp;&nbsp;
                <FaSuperpowers className="text-orangered icon-spin" />
            </h1>
            <p className="text-center">
                Might sound like I have a bit of an ego... <del><em>I do</em></del> But we can not deny that coding is the closest thing we have to superpowers!
            </p>
            <div className="row">
                <div className="col">
                    <h2>
                        <FaGraduationCap className={PageStyles.titleIcon} /> Teach &amp; Learn
                    </h2>
                    <p>One thing I believe in is that you get better at what you do when you teach it.</p>
                    <p>This is why I have dedicated myself to teaching and mentoring. I was a lead mentor of CoderDojo in London for over 4 years.</p>
                    <p>I have also many years of experience in mentoring Computer Science to university students, which I find it helps me stay up-to-date with what is being taught, and gives me a chance to give my knowledge and experience to my mentees.</p>
                </div>
                <div className="col">
                    <h2>
                        <FaMicrochip className={PageStyles.titleIcon} /> Tech Savvy
                    </h2>
                    <p>Although coding is my passion, I am knowledgeable of many aspects of Computer Science and I love technology!</p>
                    <p>I like building PCs and fixing things. Feel free to <a href="https://twitter.com/carlos_tweets" target="_blank" title="Also feel free to follow me on Twitter.">tweet at me</a> if you want some help.</p>
                    <p>You will often find me reading newsletters and blogs about new tech and new discoveries related to computer science.</p>
                    <p>I recommend you to subscribe to the <a href="https://www.technologyreview.com/" target="_blank" title="Scroll down to the bottom of the page to subscribe to it.">MIT's Technology Review Download</a> - love reading it at lunch time!</p>
                </div>
            </div>
            <div className="row">
                <div className="col">
                    <h2>
                        <FaBug className={PageStyles.titleIcon} /> Bug Smasher
                    </h2>
                    <p>What is that you saw? A bug? Let me get my tools, I will smash it!</p>
                    <p>I am not fond of any sort of bugs, but specially digital ones. I have experience in many ways of debugging problems in software and applications.</p>
                    <p>My favourite one has to be Chrome's developer tools, I can not live without it!</p>
                </div>
                <div className="col">
                    <h2>
                        <FaDatabase className={PageStyles.titleIcon} /> The Back-backend
                    </h2>
                    <p>One of my favourite superpowers is what I like to call the back-backend.</p>
                    <p>I am already experienced in backend languages such as PHP, but I do love myself some server management too.</p>
                    <p>I have been managing web servers for over 10 years, all the way from ftp-only, cPanel managed and now to full Linux (mainly Debian based) virtual private servers. I usually go for a LEMP stack, but have played around with many other stacks - even including the MEAN stack.</p>
                    <p>My choice of VPS provider has to be <a href="https://m.do.co/c/67f4ef2abcdb" target="_blank" title="Use this link to get $10 when you sign-up! I will get $25 once you spend $25 - so win-win :)">Digital Ocean</a>.</p>
                </div>
            </div>
            <div className="row">
                <div className="col">
                    <h2>
                        <FaTablet className={PageStyles.titleIcon} /> Mobile Enthusiast
                    </h2>
                    <p>One of my hobbies is mobile app development. Having published a few apps in the past.</p>
                    <p>The concept of a native app shines bright to me. Although, I am a Web Application Developer at heart I do consider the benefits of building a native mobile application to better gain use of these amazing devices we have in our pockets.</p>
                    <p>I have a big interest for building new apps and playing around with the cameras and sensors of our tiny little friends we call smartphones, so if you have some cool app idea do <a href="/contact">let me know</a>.</p>
                </div>
                <div className="col">
                    <h2>
                        <FaSitemap className={PageStyles.titleIcon} /> SEO
                    </h2>
                    <p>Search Engine Optimization is the holy grail. I have been gaining knowledge on how to make sure my websites are found on that first page of the big G, doing some research on the Google Search API.</p>
                    <p>My main tools for this job are, of course, Google Analytics and the Google Search Console. These and as many other tools I need to better improve the ranking of my pages.</p>
                    <p>There is a reason as to how you ended up on this page.</p>
                </div>
            </div>
        </div>
    );
}

Skills.getLayout = (page: ReactElement) => <MainLayout>{page}</MainLayout>;

Skills.getPageTitle = (): string => 'What I can do';