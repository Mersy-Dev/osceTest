-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2024 at 06:49 PM
-- Server version: 10.6.18-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oscedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `author` varchar(128) NOT NULL,
  `time_added` datetime NOT NULL DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `style` tinyint(1) NOT NULL DEFAULT 1,
  `views` varchar(6) NOT NULL,
  `image` varchar(254) DEFAULT NULL,
  `custom_url` varchar(128) DEFAULT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `time_added`, `content`, `slug`, `style`, `views`, `image`, `custom_url`, `hidden`) VALUES
(5, 'Journeys into pharmacy - Oz', 'Ozomaye Adagu', '2024-07-10 22:32:07', '<p dir=\"ltr\">Looking back, my journey into pharmacy was a straightforward and fulfilling adventure, which began at a young age &ndash; as I was inspired into the profession in large part thanks to my dad (a pharmacist and pharmacologist).&nbsp;</p>\r\n<p dir=\"ltr\">During my formative years as a boy, I was fortunate enough to have witnessed my dad on occasions as he applied his trade as a pharmacologist at the London School of Hygiene and Tropical Medicine, thus instigating my interest in the field of science &ndash; an interest that was subsequently buttressed by the conversations I would later have with my father (during our pharmacy-related discussions) regarding his various pharmacist shifts over the years, and against this backdrop, I inevitably chose my A-level subjects with the intention to join (UCL) London School of Pharmacy, and thankfully that came to fruition.&nbsp;</p>\r\n<p dir=\"ltr\">On graduating from UCL, I was conflicted about which sector of pharmacy to join. With the understanding that each sector will have its unique attraction, as well as knowing that all sectors will invariably have a lot to offer from a development point of view. Thus, I eventually concluded that: given the opportunity, I would endeavour to experience all that pharmacy has to offer and decided to begin in the <strong>community</strong>. I&rsquo;ve since worked in a plethora of areas within pharmacy including internet pharmacy, acute hospital, CCG, and community healthcare Trust &ndash; which brings you up to date with the current stage of my journey.</p>\r\n<p dir=\"ltr\"><em>Every individual will have their distinctive journey as they progress in any profession or sphere of work, and this may prove to be smooth sailing or riddled with various trials/tribulations, or even a mixture of both. At the end of each juncture, I believe what&rsquo;s most pertinent is the experience we gain from our journey, and how we apply them to further our progression in the future without deviating from our professional standards and maintaining our love and passion for the job.</em></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 8pt; color: #ced4d9;\">SEO terms: Pharmacy OSCE scenarios, Pharmacy OSCE stations, Pharmacy OSCE exams, Pharmacy OSCE revision, Pharmacy exams, Pharmacy revision, Getting into Pharmacy</span></p>', 'journeys-into-pharmacy---oz', 2, '0', '66a238d60cda6.jpg', NULL, 0),
(6, 'Tips for Writing a Pharmacy Personal Statement', 'OSCE Toolbox', '2024-07-21 14:48:29', '<p>Writing any personal statement can be arduous (let alone a pharmacy one) but it doesn\'t have to be. With the abundance of information online, there is no reason your personal statement shouldnt sound impressive. Saying this, don\'t get hung up on crafting the perfect piece. A personal statement is one small part of many to get into a pharmacy degree and an even smaller part to become a pharmacist. With that being said, this article will help you create a powerful and memorable personal statement so the reader knows you\'re the fit for the course, whilst also helping you not spend 4 weeks writing it.</p>\r\n<p>&nbsp;</p>\r\n<p dir=\"ltr\"><strong><span style=\"color: #ef798a;\">How we wrote this article:</span></strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Youtube vids</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.youtube.com/watch?v=y3-YA7wnOcI&amp;pp=ygUccGhhcm1hY3kgcGVyc29uYWwgc3RhdGVtZW50IA%3D%3D\">Step-by-step:Write the BEST Pharmacy Personal Statement in 24hrs | FOOLPROOF&nbsp;</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.youtube.com/watch?v=GxDct_osvI0&amp;pp=ygUccGhhcm1hY3kgcGVyc29uYWwgc3RhdGVtZW50IA%3D%3D\">How to write a Personal Statement for Pharmacy | kings, ucl, manchester, birmingham offers!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.youtube.com/watch?v=aIENNbQzHK0&amp;pp=ygUccGhhcm1hY3kgcGVyc29uYWwgc3RhdGVtZW50IA%3D%3D\">Pharmacy School Interview: Best way to answer Why Pharmacy? &nbsp; &nbsp; &nbsp; &nbsp; </a><a href=\"https://www.youtube.com/watch?v=GxDct_osvI0&amp;pp=ygUccGhhcm1hY3kgcGVyc29uYWwgc3RhdGVtZW50IA%3D%3D\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href=\"https://www.youtube.com/watch?v=y3-YA7wnOcI&amp;pp=ygUccGhhcm1hY3kgcGVyc29uYWwgc3RhdGVtZW50IA%3D%3D\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Online articles</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.medicmind.co.uk/medicine-ucas-guide/writing-the-perfect-pharmacy-personal-statement-expert-tips/\">Writing the Perfect Pharmacy Personal Statement: Expert TipsMedic Mindhttps://www.medicmind.co.uk &rsaquo; medicine-ucas-guide</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.ucas.com/undergraduate/applying-university/personal-statement-advice-pharmacy\">Personal statement advice: pharmacyUCAShttps://www.ucas.com &rsaquo; ... &rsaquo; Applying to university</a></p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Personal experience</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">ChatGPT (for some of the example sentences)</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\"><strong><span style=\"color: #ef798a;\">Writing style:</span></strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Obviously, ensure there are no grammatical errors or typos (always proofread)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Infuse your own flavour but be concise, every sentence should fight for its life to be included&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Be honest and authentic</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Start sentences/paragraphs with &ldquo;I&rdquo;, its a personal statement for a reason, talk about yourself</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Whilst writing, always consider two key questions: Why me? Why pharmacy?</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong><span style=\"color: #ef798a;\">Length:</span></strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">1 page (5 beefy paragraphs)</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><strong><span style=\"color: #ef798a;\">Structure:</span></strong>&nbsp;</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Paragraph 1 = Introduction</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Paragraphs 2-4 = Main content</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Paragraph 5 = Conclusion&nbsp;</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><strong><span style=\"color: #ef798a;\">Introduction:</span></strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Why pharmacy specifically? How does that reason link to you?</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g &ldquo;While volunteering at a community pharmacy, I saw firsthand the critical role pharmacists play in patient care and developed a passion for the science behind medications.&rdquo;</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Highlight key aspects of pharmacy, academic challenge, patient interaction, pathophysiology etc.&nbsp;</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g &ldquo;I am drawn to pharmacy because it combines academic challenges, such as understanding pathophysiology, with rewarding patient interactions and the opportunity to make a tangible difference in people\'s health.&rdquo;</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Mention relevant work experience but don&rsquo;t go into detail here</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g &ldquo;I have been working at a local pharmacy, which has provided me with valuable insights into the profession.\"</p>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong><span style=\"color: #ef798a;\">Content (paragraphs 2-4):</span></strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Provide details about work experience, highlight the qualities of pharmacists and how you saw these/learnt more about them&nbsp;</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g &ldquo;During my work experience at a local pharmacy, I observed the pharmacists\' dedication to patient care, precision in medication management, and effective communication skills, which deepened my understanding of the profession\'s core qualities.&rdquo;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">NOTE: This work experience does not have to be Pharmacy or even healthcare related, but could be part-time jobs, just highlight the transferable skills to the role of a Pharmacist</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Use technical jargon relating to pharmacy if you get the opportunity to impress the reader</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Mention your relevant A-levels/GCSEs and how/why you enjoyed them and how they relate to picking Pharmacy&nbsp;&nbsp;</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g \"My A-levels in Chemistry and Biology enhanced my love for science, while my GCSE in Mathematics honed my analytical skills.&rdquo;&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g \"The practical tasks in A-level chemistry highlighted the application of seemingly abstract concepts to real-life situations, which is mirrored in the field of Pharmacology. I came to realise how essential chemistry is in determining the correct drug dosage to ensure patient well-being\"</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Mention any relevant personal life reasons for choosing pharmacy</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g \"My decision to pursue pharmacy was influenced by my experience caring for my grandmother who suffers from Type 2 Diabetes Mellitus, where I saw the crucial role pharmacists play in patient care and management.\"</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Show your knowledge about the current state and changes in pharmacy&nbsp;</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g &ldquo;I make an effort to stay updated on pharmacy advancements, such as integrated care models and expanded pharmacist roles in primary healthcare (E.g the Pharmacy First scheme), which are reshaping patient care.\"</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Talk about your relevant skills to pharmacy and how you\'ve shown them already/still do, E.g leadership, teamwork, numeracy, attention to details etc</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g \"I\'ve developed key pharmacy skills by leading my school\'s science club, working in a team on a healthcare research project, achieving top grades in chemistry and maths, and carefully conducting lab experiments.\"</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Mention supercurriculars (activities related to academic interest that you pursue outside of your normal schoolwork) e.g. Documentaries, podcasts, talks you have attended, projects you have taken on</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Hobbies - only mention these if they are unique and interesting e.g. beekeeping&nbsp;</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><strong><span style=\"color: #ef798a;\">Conclusion:</span></strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Show your understanding of the degree, acknowledging its challenges and the rewards on the other side</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Remind the reader of the key points&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Remind the reader of how your attributes would make you a great pharmacist</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><strong><span style=\"color: #ef798a;\">Final notes:</span></strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Once a draft is created, send it to people you know in relevant fields and don\'t be afraid to reach out to people you don\'t know as well&nbsp;</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">You can find people via LinkedIn, Sixth form/college tutors/teachers, family contacts etc.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">You\'ll be surprised by how many people want to/will help</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Ask for feedback: Does it read well? Any mistakes? Do you seem like a fitting candidate?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">For more detailed information on pharmacy news we recommend CPE and The Pharmaceutical Journal for updates in the field - we post News of the Week on our Instagram @oscetoolbox.com</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">&nbsp;</li>\r\n</ul>\r\n<p><span style=\"color: #ced4d9; font-size: 8pt;\">SEO terms: Pharmacy OSCE scenarios, Pharmacy OSCE stations, Pharmacy OSCE exams, Pharmacy OSCE revision, Pharmacy exams, Pharmacy revision, Getting into Pharmacy</span></p>', 'tips-for-writing-a-pharmacy-personal-statement', 1, '0', '669d1fbd149a1.jpg', NULL, 0),
(7, 'Journeys Into Pharmacy - Abundance Temile', 'Abundance Temile', '2024-07-21 19:16:37', '<p style=\"text-align: center;\"><span style=\"font-size: 18pt; color: #ef798a;\"><strong>A Journey into Pharmacy</strong></span></p>\r\n<p style=\"text-align: center;\"><br><strong>Abundance Temile</strong><br><em>Transformation Programme Manager</em><br><em>Lloyds Pharmacy Clinical Homecare</em></p>\r\n<p style=\"text-align: left;\"><br>If you\'re anything like me, pharmacy was not your first choice. I remember as a student choosing a course felt like one of those life-defining moments that would solidify who I was going to be and what I was going to do for the rest of my life. When I finally decided on who I was going to be and then didn\'t get the responses that I expected from my top universities, I was very lost and if i can be honest a career in pharmacy never crossed my mind, the only pharmacists I had previously encountered, prior to starting the course, were seemingly boring, highly intelligent shopkeepers and/or academics, who were content doing the same thing day in day out and I dreamed of an exciting life full of adventure and change.</p>\r\n<p style=\"text-align: left;\"><br>But what I\'ve grown to love and appreciate is that this journey called life is rarely straightforward,&nbsp;often taking many unexpected twists and turns, but it\'s along the way that you learn so much&nbsp;about who you are, what you love and importantly what you don\'t (!), what you\'ll tolerate, what&nbsp;you\'ll change and that you are completely in control of the choices you make - whether&nbsp;consciously or not, and life has a funny way of working you towards your true self.</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">Everything about my journey into and within the world of Pharmacy has been a glorious combination of hard work and serendipity. I started my career in a small independent community pharmacy, where engaging with patients was the best part of my day, and made a opportunistic shift to pharmacy homecare, where I was very much office based dealing with clinical queries and drug formulations and product manufacturing and specialist conditions like HIV and&nbsp;oncology, now I\'m in business transformation working alongside both hospital pharmacists,&nbsp;industry pharmacists, community pharmacists, doctors, nurses, CEOs, Directors, developers,&nbsp;the list goes on. There will come a moment where you discover that pharmacy is not merely&nbsp;about dispensing medications, that you don\'t have to only choose between community, hospital&nbsp;or general practice pharmacy as there is a dynamic blend of science, healthcare, with pharmacy&nbsp;and almost every industry you can think of!</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">Whether you have a love for business, medicine, IT, science, pharmacy offers a unique intersection. From pharmacology to medicinal chemistry, pharmacy delves into the intricacies of drug mechanisms and their impact on the human body, it bridges the gap between science and humanity in the most unexpected ways.</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">My journey into Pharmacy is only beginning and just like most of you, I still have a lot to learn and a long way to go, enjoy the journey, work hard and embrace every opportunity along the way. For me being a pharmacist has proven to be not just a detour but an interesting ever changing journey and one thing I\'ve learnt is that sometimes the most rewarding destinations are the ones we didn\'t anticipate.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 8pt; color: #ced4d9;\">SEO terms: Pharmacy OSCE scenarios, Pharmacy OSCE stations, Pharmacy OSCE exams, Pharmacy OSCE revision, Pharmacy exams, Pharmacy revision, Getting into Pharmacy</span></p>', 'journeys-into-pharmacy---abundance-temile', 2, '0', '669d67875c692.jpeg', NULL, 0),
(8, 'Journeys to Pharmacy - Kayode', 'Kayode Aweojo', '2024-07-21 19:24:54', '<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a; font-size: 18pt;\"><strong>MY JOURNEY INTO PHARMACY</strong></span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Becoming a Pharmacist was my greatest aspiration. At the moment, I am constantly thrilled by the fact that I am now a Pharmacist; I have crossed many hurdles just to be here, and I will choose Pharmacy a million times again. I find absolute fulfilment and satisfaction in this career path.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">It was my second year in High school and I was still confused about what I would like to become when I grow up. My Mum became sick and we had to go to the Hospital. While at the Hospital, I observed every Health professional who attended to my Mum and I was particularly drawn to the Pharmacist. I loved his carriage and his professional approach in discharging his duties. I fell in love with the profession at that moment. One thing about me is that I am highly inquisitive. I wanted to know more about the profession so I went back to the Pharmacist to ask a lot of questions, and Eureka! I finally have the answer to the Question &lsquo;&rsquo;What would you like to be when you grow up?&lsquo;&rsquo;.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">That was the beginning of my dream of becoming a Pharmacist. I have always been passionate about helping people and I realized Pharmacy will help me amplify this passion. While in high school, my passion for Pharmacy was so much that I constantly, and daily, imagine myself wearing a white Clinical Coat, doing the work of a Pharmacist. I would also inscribe &ldquo;Department of Pharmacy&rsquo;&rsquo; on the back cover of my High school notebooks with Hopes that I&rsquo;d become a Pharmacist One day.&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">After High school, I sat and wrote the entrance Exams to the University where I had the choice to choose three Courses in order of preference, I chose Pharmacy in all. Unfortunately, I did not perform up to the Cut-off mark to be considered for Pharmacy. That simply means I&rsquo;ll have to wait till the next year to write another exam. The next year came and I applied again and I still did not meet the cut-off.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">I remained determined and resilient, always Inspired by this Quote by Nelson Mandela &lsquo;&rsquo;There is no passion to be found settling for a life that is less than the one you are capable of Living&rsquo;&rsquo;. I knew I was capable of becoming a Pharmacist so I wouldn&rsquo;t give up.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">I braced up to sit the entrance Exams for the fourth time, choosing Pharmacy as my preferred course in all of the three Options. And this time, I got in. That marks the beginning of the realization of my dreams.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><br><br><span style=\"font-size: 14pt;\">Pharmacy school was exciting as well as challenging. The best part of Pharmacy is that there are several areas of Pharmacy you can choose ranging From Hospital Pharmacy, Community Pharmacy, Industrial Pharmacy, Nuclear Pharmacy, Administrative, Research, and so on. It is vital to choose an area of best interest while still in Pharmacy School.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">I am particularly thrilled with Clinical Pharmacy and Pharmacotherapy. It gives me great Joy when I see cases of medical conditions and the associated symptoms. I love to discuss the Pathophysiology and etiology of Diseases and Medical conditions as well as the Pharmacology of drugs used in the management of these conditions.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">I was able to push through the challenges of Pharmacy school by associating with people of like minds who are as passionate about the Profession as I am.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Now that I am a Pharmacist, I enjoy every single day of my career, collaborating with other Healthcare professionals to give patients a better quality of life through quality Healthcare services. I enjoyed speaking to my Patients about their medications and their Health.&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">I have handled several medical cases and conditions and as well written several Articles and participated in several research works. I have also mentored and encouraged a lot of Pharmacy students who are now Pharmacists. The best moment in the Pharmacy profession is that moment when a patient I had attended to in the past, gets better and they have come back to me Healthier and better.&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"text-align: center;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"font-size: 14pt;\">So Far, My journey into Pharmacy has been a fulfilling one, and I look forward to more fulfilling experiences, serving humanity and putting smiles on faces.</span></p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\"><span style=\"font-size: 8pt; color: #ced4d9;\">SEO terms: Pharmacy OSCE scenarios, Pharmacy OSCE stations, Pharmacy OSCE exams, Pharmacy OSCE revision, Pharmacy exams, Pharmacy revision, Getting into Pharmacy</span></p>', 'journeys-to-pharmacy---kayode', 2, '0', '669ee12e788b3.jpeg', NULL, 0),
(9, 'Pharmacy Personal Statement 1', 'Anonymous', '2024-07-21 19:53:52', '<p dir=\"ltr\" style=\"text-align: center;\"><strong><span style=\"font-size: 18pt; color: #ef798a;\">Pharmacy Personal Statement 1</span></strong></p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">The healthcare system is extensive and dynamic. Every one of the significant jobs it contains is necessary for the system to function as intended. It\'s a framework built around the patient. I gained this knowledge and have wanted to be involved in it ever since. I was able to understand the significant consequences that pharmaceutical companies have by withholding certain trial information in order to profit from having their product on the market. Although they claim to desire to enhance people\'s health, the fact remains that they are a business that depends on the sales of their product to remain operational. Through reading a book by a well-known author, I was able to see an example of how this issue had an impact: a medication was prescribed to a patient for whom no other medications had proven effective, but only one trial had shown that it had a significant impact on patient outcomes. When information from six additional trials became available, it was clear that the medication performed no better than a placebo. This demonstrates the bias of these companies and puts patients at risk because they are more likely to experience side effects than with other medications that accomplish the same job. In addition, despite being less effective than alternatives, the drug is still available because no laws were broken. This spurred a desire to learn more about the pharmaceutical sector.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">While studying drug treatment in my science classes, I made the decision to learn more about the impacts of medicines. I attended a seminar about the legal use of cannabis and its misuse. I discovered how well it treated conditions like Parkinson\'s disease and multiple sclerosis. This provided me with a new perspective, focusing on its therapeutic potential rather than its misuse. Since the lecturer was a pharmacist who specialised in reducing drug misuse and illicit drug use, I learned about another pharmaceutical specialty. This made me realise that pharmacy is about more than just filling prescriptions; it is also about understanding the role of medicines in people\'s lives and having an obligation to the general public.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">I was fortunate enough to travel abroad through a volunteer program to gain a better understanding of global citizenship. I had the opportunity to teach English to children during my two-week visit. Although there was an initial language barrier, I overcame it by creating simple drawings of the words we were teaching in English. I saw how powerful it was as their interest grew day by day. Some of the current issues were visible to me. Every day on my way to the school, I could see a particular clinic that never seemed to be closed; there was always a line that never seemed to end. I decided to ask our local guide about it, and she said it was perfectly normal. What I heard astounded me. I decided to conduct some research into the extent of healthcare in developing countries. I discovered that this was a major issue, which resulted in hundreds of deaths that could have been avoided if the proper system had been in place.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">I was able to shadow a community pharmacist in order to gain a better understanding of what pharmacy is all about. I observed how the pharmacist fit into the multidisciplinary team. I learned about the different services they offer, including the flu vaccine service. I saw her empathise with patients as well as consult with GPs and care homes to determine the best course of action for patients. I assisted in the dispensing of prescriptions and the preparation of dosette trays. While performing these tasks, I observed the methodological approach and attention to detail required to ensure the amount of medication is correct. I learned about both the marketing and health care aspects of pharmacy through this experience, as well as the legal and ethical responsibilities I had to every patient I came into contact with. In addition to providing patients with standard self-administered household medications.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">By pursuing a degree in pharmacy, I hope to gain a better understanding of the chemistry of drugs as well as how they are metabolised. Despite the fact that it can be a demanding career, I have seen the future impact that I can have on the pharmaceutical industry and the patients that I may encounter.</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<h3 dir=\"ltr\" style=\"text-align: left;\">Analysis of Personal Statement Using Key Points</h3>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Introduction</span>:</p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The introduction provides a clear reason for being drawn to pharmacy through a healthcare perspective. The writer describes gaining knowledge about the healthcare system and its dynamics early on and developing a desire to be involved in it.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Key Point 1: Why Pharmacy Specifically?</span></p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The statement effectively answers why pharmacy specifically by highlighting a critical issue within the pharmaceutical industry: the withholding of trial information for profit. The writer uses a specific example from a book to illustrate this point, demonstrating an early interest in and understanding of the ethical complexities in pharmacy.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The writer&rsquo;s attendance at a seminar on cannabis use also shows a growing interest in the therapeutic potential of medicines and the role of pharmacists beyond dispensing medications. This further reinforces the choice of pharmacy as a field.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Key Point 2: Relevant Work Experience:</span></p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The personal statement includes several examples of relevant work experience:</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">The seminar on cannabis provided insights into a specific pharmaceutical specialty, showing an effort to learn more about different aspects of pharmacy.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">The volunteer program abroad, where the author observed healthcare issues in developing countries, demonstrates an understanding of global healthcare challenges and an interest in improving patient care.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Shadowing a community pharmacist provided hands-on experience in a pharmacy setting, highlighting the multidisciplinary nature of the profession and the various services offered by pharmacists.</p>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Key Point 3: Unique Experiences:</span></p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The volunteer program abroad is a unique experience that sets the author apart. Overcoming a language barrier while teaching English shows adaptability and communication skills. Observing the local clinic\'s constant activity and researching healthcare in developing countries demonstrates a proactive approach to understanding global healthcare issues.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Key Point 4: Relevant Skills:</span></p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The writer highlights several relevant skills:</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Empathy and communication skills are demonstrated through the observation of the pharmacist\'s interactions with patients, GPs, and care homes.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Precision and attention to detail are emphasised through tasks such as dispensing prescriptions and preparing dosette trays.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">Understanding of the marketing and healthcare aspects of pharmacy, as well as the legal and ethical responsibilities, is also mentioned.</p>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Content (Paragraphs 2-4):</span></p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">These paragraphs provide detailed descriptions of the author\'s experiences and insights gained from various activities related to pharmacy. The author effectively links these experiences to the qualities and skills needed in the profession.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The mention of A-level science classes and the decision to learn more about drug impacts ties academic interests to the choice of studying pharmacy.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The personal story of discovering healthcare issues abroad adds depth and a personal touch to the statement.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Conclusion:</span></p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The conclusion restates the author&rsquo;s goal of pursuing a degree in pharmacy to understand drug chemistry and metabolism better. It acknowledges the demanding nature of the career while emphasising the potential impact on the pharmaceutical industry and patient care.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The statement ends on a positive note, showing the author\'s commitment to making a difference in the field.</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 8pt; color: #ced4d9;\">SEO terms: Pharmacy OSCE scenarios, Pharmacy OSCE stations, Pharmacy OSCE exams, Pharmacy OSCE revision, Pharmacy exams, Pharmacy revision, Getting into Pharmacy</span></p>', 'pharmacy-personal-statement-1', 2, '0', '669d675084215.png', NULL, 0),
(10, 'Pharmacy Personal Statement 2', 'Anonymous', '2024-07-21 19:57:54', '<p style=\"text-align: center;\"><span style=\"font-size: 18pt; color: #ef798a;\"><strong>Pharmacy Personal Statement 2</strong></span></p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">After a work experience at a local pharmacy, I became captivated by the deeply personal relationship between pharmacist and patient. Each patient&rsquo;s unwavering trust in their pharmacist was reciprocated by the empathy and care enacted by the professional, allowing me to ponder not only the impact a pharmacist can have on their local community but the importance of pharmacists to society as a whole. To have the privilege of providing medicines to improve the quality of a person&rsquo;s life is an exceptionally rewarding honour and inspires me to pursue a career in pharmacy.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">I achieved first place in a prestigious science competition, where I led a team in creating a poster about the treatment of Raynaud&rsquo;s phenomenon. During my research, I explored a study on the use of adrenergic alpha and beta blockades in treating Raynaud&rsquo;s. I found it particularly fascinating that while alpha blockades by themselves performed favourably, beta blockades were also needed to counteract side effects&mdash;such as fluid retention&mdash;caused by the alpha blockades, demonstrating how drugs can work in unison to have the desired effect in the body. I further considered more convenient ways drugs can be administered to Raynaud&rsquo;s sufferers, leading me to research a company that develops transdermal patches for drug delivery. The way a drug can diffuse across the layers of skin and enter the bloodstream, releasing the drug in a non-intrusive yet effective manner was revolutionary to me. I was then able to present my research to a panel of healthcare professionals, conveying my findings in a simple yet effective manner, a skill I hope to develop in the future. Not only did this project highlight to me the ever-evolving nature of medicines and treatment&mdash;an important aspect in pharmacy&mdash;but it also provided the invaluable opportunity to develop my leadership, teamwork, and communication skills.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">While working at a pharmaceutical distribution company, I ensured that orders taken met Good Distribution Practice (GDP) guidelines, from verifying that both medicine and customer documents were up to date to regulating warehouse temperatures. I gained an appreciation of just how crucial patient safety is within medicine handling, allowing me to improve my skills of precision and attention to detail. I developed these skills further when I was entrusted with dispensing medicines into dosette boxes for a local care home, a task that required focus and accuracy to ensure patients were kept safe.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">Studying Chemistry A-Level, I realised the extent of the role of chemistry within pharmacy when I had to determine the maximum mass of sodium fluoride in toothpaste a person can swallow without reaching the toxic concentration&mdash;a simple calculation on paper that in reality could have significant impact. I understood then how vital chemistry is in providing the correct dosage of a drug to ensure patient well-being. Delving further into the role of chemistry in medicine, I embarked to find out more from a professional society and discovered the development of the Ventolin inhaler to treat asthma, a superior alternative to the adrenaline injection. I was astounded that in the face of an imperfect treatment&mdash;here, adrenaline&rsquo;s short-lived nature&mdash;pharmacists and chemists were able to work together to synthesise new chemicals that were more resistant to enzyme digestion to elevate patient care. I found this discovery enlightening, as it demonstrated how crucial chemistry is in drug formulation and performance, illustrating how my passion for chemistry can aid me in studying pharmacy, an interest I was keen to develop through attending weekly chemistry supervisions.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">I am excited about the prospect of making a difference in people&rsquo;s lives. This, together with the lifelong learning and immersive scientific work that I hope to be a part of, fuels my desire to study pharmacy at university and practice as a pharmacist in the future.</p>\r\n<p style=\"text-align: left;\"><strong>&nbsp;</strong></p>\r\n<h3 dir=\"ltr\" style=\"text-align: left;\">Analysis of Personal Statement Using Key Points</h3>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Introduction</span>:</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">The introduction effectively sets the tone by highlighting the personal connection between pharmacist and patient. The writer describes their experience at a local pharmacy, where they were captivated by the trust and care shared between pharmacists and their patients. This experience inspired the writer to pursue a career in pharmacy, showing a clear and personal reason for choosing this path.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Key Point 1: Why Pharmacy Specifically?</span></p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">The statement provides specific reasons for choosing pharmacy:</p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The writer is inspired by the pharmacist&rsquo;s role in improving the quality of life for patients.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The detailed example of their experience with Raynaud&rsquo;s phenomenon research demonstrates their fascination with how drugs work together to achieve desired effects. This shows a deep interest in the scientific and practical aspects of pharmacy.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The writer&rsquo;s interest in innovative drug delivery methods, such as transdermal patches, highlights their curiosity and desire to improve patient care through advanced pharmaceutical technologies.</p>\r\n</li>\r\n</ul>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Key Point 2: Relevant Work Experience:</span></p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">The personal statement includes several examples of relevant work experience:</p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The experience at a pharmaceutical distribution company taught the writer about Good Distribution Practice (GDP) guidelines and the importance of patient safety. This work helped them develop precision and attention to detail.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Dispensing medicines into dosette boxes for a care home further enhanced their skills in accuracy and safety, crucial for a pharmacist.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The writer\'s involvement in a science competition, where they led a team and conducted research, showcases their leadership, teamwork, and communication skills.</p>\r\n</li>\r\n</ul>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Key Point 3: Unique Experiences:</span></p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">The writer\'s participation in a prestigious science competition and their innovative research on Raynaud&rsquo;s phenomenon set them apart. Presenting their findings to a panel of healthcare professionals demonstrates their ability to communicate complex ideas effectively. Additionally, their research into transdermal patches shows a proactive approach to learning and a keen interest in cutting-edge pharmaceutical developments.</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Key Point 4: Relevant Skills:</span></p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">The writer highlights several relevant skills:</p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Leadership, teamwork, and communication skills were developed through their role in the science competition.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Precision and attention to detail were emphasised through their work at the pharmaceutical distribution company and dispensing medicines for a care home.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Analytical and problem-solving skills were demonstrated through their A-Level Chemistry project and their exploration of the Ventolin inhaler development.</p>\r\n</li>\r\n</ul>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Content (Paragraphs 2-4):</span></p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">These paragraphs provide detailed descriptions of the writer\'s experiences and insights gained from various pharmacy-related activities. The writer effectively links these experiences to the qualities and skills needed in the profession:</p>\r\n<ul style=\"text-align: left;\">\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The A-Level Chemistry project and the research into the Ventolin inhaler illustrate their strong academic background and interest in the scientific aspects of pharmacy.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The personal story of their work experience and volunteer activities adds depth and a personal touch to the statement.</p>\r\n</li>\r\n</ul>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: left;\"><span style=\"text-decoration: underline;\">Conclusion:</span></p>\r\n<p dir=\"ltr\" style=\"text-align: left;\">The conclusion restates the writer&rsquo;s goal of pursuing a degree in pharmacy and their excitement about making a difference in people\'s lives. It acknowledges the demanding nature of the career while emphasising the rewards of lifelong learning and scientific work. The statement ends on a positive note, showing the writer\'s commitment to the field of pharmacy and their desire to become a pharmacist.</p>\r\n<p><span style=\"font-size: 8pt; color: #ced4d9;\">SEO terms: Pharmacy OSCE scenarios, Pharmacy OSCE stations, Pharmacy OSCE exams, Pharmacy OSCE revision, Pharmacy exams, Pharmacy revision, Getting into Pharmacy</span></p>', 'pharmacy-personal-statement-2', 2, '0', '669d68421ff05.png', NULL, 0);
INSERT INTO `articles` (`id`, `title`, `author`, `time_added`, `content`, `slug`, `style`, `views`, `image`, `custom_url`, `hidden`) VALUES
(11, 'Choosing a Pharmacy School in the UK: Comprehensive Guide', 'Agapé Thamar', '2024-08-08 21:32:59', '<p dir=\"ltr\"><span style=\"font-size: 14pt;\">Choosing the right pharmacy school in the UK is a significant decision that has the power to shape your future, with 30+ schools to choose from, this can often be a very unnerving experience. To make this choice easier, let&rsquo;s explore the essential elements you might want to consider: Location, Teaching, Social Environment, and the difference between Campus and City Universities. Let\'s dive in!</span></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a; font-size: 14pt;\"><strong>How I wrote this article:</strong></span></p>\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"text-decoration: underline; font-size: 14pt;\">Articles:&nbsp;</span></p>\r\n<ul>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\">&nbsp;<a href=\"https://www.thecompleteuniversityguide.co.uk/league-tables/rankings/pharmacology-and-pharmacy\">https://www.thecompleteuniversityguide.co.uk/league-tables/rankings/pharmacology-and-pharmacy</a><a href=\"https://www.thecompleteuniversityguide.co.uk/league-tables/rankings/pharmacology-and-pharmacy\"> </a></span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><a href=\"https://www.theguardian.com/education/ng-interactive/2023/sep/09/best-uk-universities-for-pharmacy-pharmacology-league-table\">Best-uk-universities-for-pharmacy-pharmacology-league-table</a></span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" role=\"presentation\"><span style=\"font-size: 14pt;\"><a style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\" href=\"https://www.thepharmacistblog.com/matter-pharmacy-school-go/\">https://www.thepharmacistblog.com/matter-pharmacy-school-go/</a></span></li>\r\n</ul>\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\">+ Personal experience&nbsp;</span></p>\r\n<p><span style=\"font-size: 14pt;\"><strong>&nbsp;</strong></span></p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a; font-size: 18pt;\">1. Location: Where Will Your Journey Begin?</span></h2>\r\n<p dir=\"ltr\"><span style=\"font-size: 14pt;\">Location is more than just a dot on the map. It&rsquo;s where you&rsquo;ll be living, studying, and creating memories for the next few years. Here&rsquo;s what to consider:</span></p>\r\n<ul>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>City Life vs. Small Town Living:</strong> Do you thrive in the hustle and bustle of a big city with vibrant nightlife, diverse cultures, and numerous opportunities for internships and part-time jobs, like in London, Manchester, and Birmingham, or do you prefer the quiet, close-knit feel and lower living costs of smaller towns like Bath or Keele?</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>Proximity to Home:</strong> How far away from home do you want to be? Being closer to home means easier access to family and friends, but being farther away can offer a greater sense of independence and adventure</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>Climate Considerations:</strong> The UK has a diverse climate, sun enthusiasts might prefer southern universities like Brighton or Portsmouth, while those who enjoy cooler, rainier weather might lean towards northern cities like Newcastle or Sunderland</span></p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a; font-size: 18pt;\">2. Teaching: Who Will Be Guiding Your Future?</span></h2>\r\n<p dir=\"ltr\"><span style=\"font-size: 14pt;\">Quality teaching is paramount in pharmacy school. The important thing to note is that each of the schools will equip you with the tools you need in order to graduate with an MPharm degree, however, it is noteworthy to consider that some teaching and emphasis on practical work might vary. If you are someone who sees yourself going into academia or further studies in pharmacodynamics or biomedicines, then perhaps finding schools who are noteworthy for their scientific fields and lectures could be something you do.&nbsp; Here\'s what to look for:</span></p>\r\n<ul>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>Reputation and Ranking</strong>: Check out university rankings specifically for pharmacy programs. Schools like UCL School of Pharmacy, Nottingham University School of Pharmacy, and the University of Manchester School of Pharmacy and Pharmaceutical Sciences consistently rank high for their pharmacy courses.</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>Faculty Expertise: </strong>Engaging with knowledgeable and passionate professors who are leaders in their fields and have experience in both research and clinical practice can significantly enhance your learning experience, for instance, the Department of Pharmacy at King\'s College London and the School of Pharmacy and Biomolecular Sciences at Liverpool John Moores boast highly experienced faculties</span></p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a; font-size: 18pt;\">3. Social Environment: Where Will You Find Your Tribe?</span></h2>\r\n<p dir=\"ltr\"><span style=\"font-size: 14pt;\">Your social environment will be a crucial part of your university life. Here&rsquo;s what to consider:</span></p>\r\n<ul>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>Student Societies and Clubs:</strong> Look for active pharmacy societies, as well as other clubs that align with your interests, whether it&rsquo;s sports, arts, or volunteering. These groups are fantastic for making friends and networking</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>Diversity and Inclusivity:</strong> A diverse student body enriches your educational experience, and universities like the University of Bradford and De Montfort University, which celebrate different cultures and backgrounds, provide a welcoming and dynamic environment&nbsp;</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>Support Services: </strong>Check if the university offers robust student support services, including mental health resources, academic advising, and career counselling. These services are vital for your overall well-being and success. For example, the University of Hertfordshire and the University of East Anglia have comprehensive support systems in place</span></p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a; font-size: 18pt;\">4. Campus vs. City University: What&rsquo;s Your Ideal Setting?</span></h2>\r\n<p dir=\"ltr\"><span style=\"font-size: 14pt;\">The setting of your university can significantly impact your day-to-day life as well as the cost of being a student. Let&rsquo;s break down the differences:</span></p>\r\n<ul>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>Campus Universities: </strong>These universities, like University of Bath and Keele University, offer a self-contained, close-knit community and a structured environment, but can feel isolated with fewer off-campus social opportunities</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-size: 14pt;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-size: 14pt;\"><strong>City Universities: </strong>Universities such as King\'s College London and the University of Manchester, offer immersion in urban life with greater independence, variety, and numerous social opportunities, but can be overwhelming and more expensive due to the bustling environment and higher living costs.</span></p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a; font-size: 18pt;\">Making Your Decision</span></h2>\r\n<p dir=\"ltr\"><span style=\"font-size: 14pt;\">Now that you&rsquo;ve considered these elements, it&rsquo;s time to weigh them against your personal preferences and goals. Visit campuses if you can, talk to current students at the various universities you are considering, and think about where you see yourself thriving both academically and socially. Remember, the best pharmacy school for you is one that aligns with your aspirations, future and lifestyle.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>This article was written by Agap&eacute; Thamar, @thecoolpharma on Instagram - check her page out!</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'choosing-a-pharmacy-school-in-the-uk-comprehensive-guide', 1, '0', '66b53d6b90413.jpg', NULL, 0),
(12, 'Choosing a Pharmacy School in the UK: Comprehensive Guide', 'Agapé Thamar', '2024-08-08 21:33:03', '<p dir=\"ltr\"><strong>This article was written by Agap&eacute; Thamar @thecoolpharma on Instagram - check her page out!</strong></p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\">Choosing the right pharmacy school in the UK is a significant decision that has the power to shape your future, with 30+ schools to choose from, this can often be a very unnerving experience. To make this choice easier, let&rsquo;s explore the essential elements you might want to consider: Location, Teaching, Social Environment, and the difference between Campus and City Universities. Let\'s dive in!</p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>How I wrote this article:</strong></span></p>\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"text-decoration: underline;\">Articles:&nbsp;</span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&nbsp;<a href=\"https://www.thecompleteuniversityguide.co.uk/league-tables/rankings/pharmacology-and-pharmacy\">https://www.thecompleteuniversityguide.co.uk/league-tables/rankings/pharmacology-and-pharmacy</a><a href=\"https://www.thecompleteuniversityguide.co.uk/league-tables/rankings/pharmacology-and-pharmacy\"> </a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.theguardian.com/education/ng-interactive/2023/sep/09/best-uk-universities-for-pharmacy-pharmacology-league-table\">Best-uk-universities-for-pharmacy-pharmacology-league-table</a></p>\r\n</li>\r\n<li dir=\"ltr\" role=\"presentation\"><a style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\" href=\"https://www.thepharmacistblog.com/matter-pharmacy-school-go/\">https://www.thepharmacistblog.com/matter-pharmacy-school-go/</a></li>\r\n</ul>\r\n<p dir=\"ltr\" role=\"presentation\">+ Personal experience&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a;\">1. Location: Where Will Your Journey Begin?</span></h2>\r\n<p dir=\"ltr\">Location is more than just a dot on the map. It&rsquo;s where you&rsquo;ll be living, studying, and creating memories for the next few years. Here&rsquo;s what to consider:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>City Life vs. Small Town Living:</strong> Do you thrive in the hustle and bustle of a big city with vibrant nightlife, diverse cultures, and numerous opportunities for internships and part-time jobs, like in London, Manchester, and Birmingham, or do you prefer the quiet, close-knit feel and lower living costs of smaller towns like Bath or Keele?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Proximity to Home:</strong> How far away from home do you want to be? Being closer to home means easier access to family and friends, but being farther away can offer a greater sense of independence and adventure</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Climate Considerations:</strong> The UK has a diverse climate, sun enthusiasts might prefer southern universities like Brighton or Portsmouth, while those who enjoy cooler, rainier weather might lean towards northern cities like Newcastle or Sunderland</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a;\">2. Teaching: Who Will Be Guiding Your Future?</span></h2>\r\n<p dir=\"ltr\">Quality teaching is paramount in pharmacy school. The important thing to note is that each of the schools will equip you with the tools you need in order to graduate with an MPharm degree, however, it is noteworthy to consider that some teaching and emphasis on practical work might vary. If you are someone who sees yourself going into academia or further studies in pharmacodynamics or biomedicines, then perhaps finding schools who are noteworthy for their scientific fields and lectures could be something you do.&nbsp; Here\'s what to look for:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Reputation and Ranking</strong>: Check out university rankings specifically for pharmacy programs. Schools like UCL School of Pharmacy, Nottingham University School of Pharmacy, and the University of Manchester School of Pharmacy and Pharmaceutical Sciences consistently rank high for their pharmacy courses.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Faculty Expertise: </strong>Engaging with knowledgeable and passionate professors who are leaders in their fields and have experience in both research and clinical practice can significantly enhance your learning experience, for instance, the Department of Pharmacy at King\'s College London and the School of Pharmacy and Biomolecular Sciences at Liverpool John Moores boast highly experienced faculties</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a;\">3. Social Environment: Where Will You Find Your Tribe?</span></h2>\r\n<p dir=\"ltr\">Your social environment will be a crucial part of your university life. Here&rsquo;s what to consider:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Student Societies and Clubs:</strong> Look for active pharmacy societies, as well as other clubs that align with your interests, whether it&rsquo;s sports, arts, or volunteering. These groups are fantastic for making friends and networking</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Diversity and Inclusivity:</strong> A diverse student body enriches your educational experience, and universities like the University of Bradford and De Montfort University, which celebrate different cultures and backgrounds, provide a welcoming and dynamic environment&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Support Services: </strong>Check if the university offers robust student support services, including mental health resources, academic advising, and career counselling. These services are vital for your overall well-being and success. For example, the University of Hertfordshire and the University of East Anglia have comprehensive support systems in place</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a;\">4. Campus vs. City University: What&rsquo;s Your Ideal Setting?</span></h2>\r\n<p dir=\"ltr\">The setting of your university can significantly impact your day-to-day life as well as the cost of being a student. Let&rsquo;s break down the differences:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Campus Universities: </strong>These universities, like University of Bath and Keele University, offer a self-contained, close-knit community and a structured environment, but can feel isolated with fewer off-campus social opportunities</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>City Universities: </strong>Universities such as King\'s College London and the University of Manchester, offer immersion in urban life with greater independence, variety, and numerous social opportunities, but can be overwhelming and more expensive due to the bustling environment and higher living costs.</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2 dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: #ef798a;\">Making Your Decision</span></h2>\r\n<p dir=\"ltr\">Now that you&rsquo;ve considered these elements, it&rsquo;s time to weigh them against your personal preferences and goals. Visit campuses if you can, talk to current students at the various universities you are considering, and think about where you see yourself thriving both academically and socially. Remember, the best pharmacy school for you is one that aligns with your aspirations, future and lifestyle.&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p><span style=\"font-size: 8pt; color: #ced4d9;\">SEO terms: Pharmacy OSCE scenarios, Pharmacy OSCE stations, Pharmacy OSCE exams, Pharmacy OSCE revision, Pharmacy exams, Pharmacy revision, Getting into Pharmacy</span></p>\r\n<p>&nbsp;</p>', 'choosing-a-pharmacy-school-in-the-uk-comprehensive-guide', 2, '0', '66b539fd10625.jpeg', NULL, 1),
(13, 'Tips For Your Pharmacy Interviews', 'Louis Martin', '2024-08-10 17:40:53', '<p dir=\"ltr\">So, we\'ve talked about how to write a killer pharmacy personal statement in the last article here: <a href=\"articles/tips-for-writing-a-pharmacy-personal-statement\">https://oscetoolbox.com/articles/tips-for-writing-a-pharmacy-personal-statement</a>&nbsp; but after you get your offers you have to think about the interviews. This can be daunting especially as it may be the first formal interview of your life. However, below are some tips on how to remain calm, answer the interviewer\'s questions and be yourself. Enjoy the read!</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>How I wrote this article:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Articles</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://studyinghealthcare.ac.uk/interviews/pharmacy-interview-preparation/\">https://studyinghealthcare.ac.uk/interviews/pharmacy-interview-preparation</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.applytouni.com/applying/applying-advice/university-interviews/pharmacy-university-interview-questions/\">https://www.applytouni.com/applying/applying-advice/university-interviews/pharmacy-university-interview-questions/</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.healthcareers.nhs.uk/explore-roles/pharmacy/roles-pharmacy/pharmacist\">https://www.healthcareers.nhs.uk/explore-roles/pharmacy/roles-pharmacy/pharmacist</a></p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Youtube Videos</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.youtube.com/watch?v=1KSN4Zjm38A&amp;t=44s\">https://www.youtube.com/watch?v=1KSN4Zjm38A&amp;t=44s</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.youtube.com/watch?v=aIENNbQzHK0&amp;t=2s&amp;pp=ygUqaG93IHRvIGFuc3dlciBwaGFybWFjeSBpbnRlcnZpZXcgcXVlc3Rpb25z\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pharmacy School Interview: Best way to answer Why Pharmacy?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><a href=\"https://www.youtube.com/watch?v=DiTbojF9jZk&amp;pp=ygUqaG93IHRvIGFuc3dlciBwaGFybWFjeSBpbnRlcnZpZXcgcXVlc3Rpb25z\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5 Best Pharmacist Interview Questions and Answers [EXAMPLES]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">ChatGPT (for some example sentences)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Personal experience from a healthcare degree and from 100+hrs tutoring people on how to answer these types of questions</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>How pharmacy interviews work:</strong></span></p>\r\n<p dir=\"ltr\" role=\"presentation\">This depends on the university, but most interviews fall into these two formats</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\"><strong>Panel interview format</strong>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">A more &ldquo;traditional&rdquo; interview in which you sit down (usually for a longer time than in MMIs) with one or two interviewers and they will ask all the questions</li>\r\n</ul>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\"><strong>Multiple Mini Interview (MMI) format</strong>&nbsp;</li>\r\n</ol>\r\n<ul>\r\n<li style=\"list-style-type: none;\">\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Moving around a circuit of short stations that test different qualities they are looking for</p>\r\n</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><strong><span style=\"color: #ef798a;\">General approach to interviews:</span></strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Remember you\'ve been invited to interview for a <strong>reason</strong>, remind the interviewer/s of why you&rsquo;re a strong candidate</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Look good feel good</strong>, make sure you know what you\'re wearing on the day, you\'ve tried it on and you feel confident in it</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">For online interviews, check your <strong>Wi-Fi connectio</strong>n, choose a <strong>quiet and non-distracting</strong> background, and familiarise yourself with the<strong> interview software</strong></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Obviously ensure a good night\'s <strong>sleep</strong> and quality <strong>food &amp; drink</strong> beforehand (but nothing that will make you need the toilet!)</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>General approach to questions:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Don\'t be afraid to ask the interviewer/s to <strong>repeat the question</strong>, sometimes you may have missed a key word that impacts your answer</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Honesty</strong> is the best policy, don\'t make anything up and if you can\'t answer a question say you can\'t and move on</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">An alternative trick here is saying something like &ldquo;I&rsquo;ve never thought about that before, but here\'s how I would go about answering that&rdquo;, sometimes the ability to <strong>think on your feet </strong>will still impress</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Understand timing</strong>s, the interviewers should say you\'ll have &ldquo;x&rdquo; amount of time to answer but if not just clarify it, this way you know roughly when to stop or if you haven\'t said enough</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Quality speech over quantity</strong>, it\'s easy to get nervous and ramble on about a point that doesn\'t add much to your answer, take a second to breathe and think about what you are being asked</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Always address: <strong>Why me? Why Pharmacy?</strong></p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>Understanding the qualities of a good pharmacist:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Almost every question asked will in some way be giving you a chance to <strong>display your understanding</strong> of key characteristics of pharmacists, so it\'s important to know them</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">For example: attention to detail, strong communication skills, empathy, scientific knowledge, problem-solving abilities, ethical judgement, teamwork, organisational skills, adaptability, excellent customer service etc.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">You must be able to explain examples of using these skills and how you <strong>align</strong> with them</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>Understanding the roles of pharmacists:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">When it comes to pharmacists their role is ever evolving, knowing this is key to answering some questions you may be asked about the real <strong>life/routine</strong> of a modern day pharmacist</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Remember pharmacists usually work in local communities but can also be in hospitals, prisons, management roles, academia etc.&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">It\'s helpful to have<strong> spoken to a pharmacist</strong> or watched a recent video made by a pharmacist on what a normal day looks like, anything to help you understand this further will tell the interviewer/s you mean business</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>Answering why you:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Its useful to have this answer <strong>semi-planned</strong> as its almost guaranteed you will be asked this</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Don\'t over script </strong>though, you\'ll sound like a robot</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">We can\'t tell you how to answer this because everyone is different, however it\'s usually a combination of a <strong>key event/person/experience</strong> that made you decide on pharmacy along with your personality suiting the career and aligning with the key qualities</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Avoid giving a lacklustre answer that everyone else who hasn\'t thought about this question will give, these answers usually over focus on things like attention to detail, research, maths skills, science knowledge etc.</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g &ldquo;I feel I am a perfect fit for the course as I have great attention to detail and a burning love for chemistry&rdquo;</p>\r\n</li>\r\n</ul>\r\n</ul>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>Answering why pharmacy:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">For this it is again a combination of your personality and skills blending well with those of a pharmacist</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">However, remember whilst answering this to give examples of <strong>why pharmacy specifically</strong>, the interviewer/s can easily follow up with something like &ldquo;why not nursing or medicine?&rdquo; and you need to be ready for that</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">A well thought out answer here might feature a focus on <strong>pharmacological processes</strong> more than (more medicine focused) non-pharmacological treatment aspects</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Also, honesty and transparency here can go a long way, if pharmacy wasn\'t actually your first choice explain your thought processes to why it is now</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">E.g &ldquo;I initially considered other healthcare careers, but my fascination with how medications interact with the body to improve health along with the work/life balance drew me to pharmacy. My work experience at a community pharmacy solidified my passion for this field, in which I spoke to patients and realised how important getting their medication is for them.\"</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>Answering why this specific university:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">This can be easy to answer if the prep is done well, simply go to the respective universities pharmacy course page and jot down a few things they highlight themselves that makes them stand out from the other universities</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g &ldquo;I know that the university of x teaches in a more traditional format which suits me due to the fact I learn better this way&rdquo; or &ldquo;the research done here on x really interests me and it would be an honour to be taught by those who have looked into this field&rdquo;</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Additionally, have some reasons why you like the <strong>location</strong> of the university, be it a family link or just the fact you support the local football/rugby team, these can help tell the interviewer/s you will enjoy your time there</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Be careful if you want to mention <strong>societies</strong>, make it specific if you do as a common mistake of students is mentioning societies that all pharmacy universities have</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>Answering ethical scenario questions:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Make sure you <strong>understand the scenario</strong>, carefully listen to or read the scenario to ensure you grasp all the details</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Vocalise your <strong>thought processes</strong>, interviewer/s like hearing how you came to your answer</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Identify the ethical issues</strong> at hand, most of the time it will be one of the 4 medical ethical pillars (justice, beneficence, non-maleficence, autonomy)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Consider the parties involved</strong>, including patients, healthcare providers and family members, consider their perspectives</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Use ethical frameworks and <strong>professional guidelines</strong> to address the issue</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g NICE guidelines, Public Health England, refer to the 4 medical ethical pillars</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Weigh the options (this is key)</strong>, evaluate the potential actions you could take, considering the benefits and risks of each option</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><strong>Make a decision</strong>, choose the most ethical course of action, explaining your reasoning clearly</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Here\'s an example of using the above points in an answer \"In this situation, my primary concern is the X. I would have a compassionate conversation with the patient about X, expressing my concerns and seeking to understand their situation. I would counsel the patient on proper use and monitor their usage. If misuse is suspected, I would refer them to appropriate support services while ensuring they receive necessary care. Throughout, I would document all actions related to X and maintain a professional and empathetic approach, prioritising the patient\'s well-being.\"</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>Answering abstract questions:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">A classic question that we know has been asked in many a pharmacy interview is \"If you could be any drug, which one would you be and why?\"</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">This type of abstract question can shock people and that\'s kind of why they throw it in, however it really is just an opportunity to be creative with your answer but back it up with logic</p>\r\n</li>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"2\">\r\n<p dir=\"ltr\" role=\"presentation\">E.g &ldquo;Wow that\'s an interesting question, there are so many drugs with so many beneficial properties to choose from, I guess I would be paracetamol (for example) as it\'s known for being widely used and trusted with little side effects. This represents my aim for myself when I am a pharmacist, always ready to help patients and alleviate concerns.&rdquo;</p>\r\n</li>\r\n</ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The above example shows the ability of <strong>thinking out loud</strong>, using <strong>logic</strong> and <strong>relating it back to yourself/pharmacy</strong>, this would be a solid answer at any pharmacy interview&nbsp;</p>\r\n</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>Final notes:</strong></span></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Let\'s be real, interviews are a big deal</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">But if you prepare well, know your facts about the university and come loaded with proof as to why you\'re a good candidate, the interviewer/s have a hard task saying no to you</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Show them why you are a future pharmacist and why you deserve a place at their university, <strong>you can do it!</strong></p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 8pt; color: #ced4d9;\">SEO terms: Pharmacy OSCE scenarios, Pharmacy OSCE stations, Pharmacy OSCEs, Pharmacy exams, Pharmacy UK, Pharmacy personal statements, Pharmacy personal statement writing, Pharmacy personal statement examples, Pharmacy interviews, Pharmacy interview tips, Studying Pharmacy</span></p>', 'tips-for-your-pharmacy-interviews', 2, '0', '66b7a6250203b.png', NULL, 0),
(14, 'Lessons from my First Year of Pharmacy - Taslima', 'Taslima R Ullah', '2024-08-17 16:18:13', '<p dir=\"ltr\"><span style=\"color: #ef798a;\"><strong>Surviving and Thriving: Lessons from my First Year of Pharmacy - TASLIMA R ULLAH</strong></span></p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\">If I&rsquo;m being completely honest with you I wasn&rsquo;t too keen about studying Pharmacy, my dad had encouraged me to apply and I just nodded my head and applied. I thought, at least it&rsquo;ll take less time to be a pharmacist than to become a doctor.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">It was quite evident that I hadn&rsquo;t done ANY research about my degree because turns out after you graduate you&rsquo;re <em>not</em> a pharmacist. You have to finish your four year degree, do your foundation training year, pass the GPhC exam and only THEN you are a qualified pharmacist. So actually it takes the <em>same</em> amount of time to become a qualified pharmacist and a junior doctor.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"text-decoration: underline;\"><strong>The Dreaded First Day</strong></span></p>\r\n<p dir=\"ltr\">When I first stepped into that huge lecture hall on the first day I had mixed feelings and two thoughts lingered in my head:</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Is Pharmacy right for me?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Will I be able to make friends?</p>\r\n</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">That was all until I saw the three girls from that one random fresher&rsquo;s group chat: one quiet and peculiar, one a little too loud and one that I didn&rsquo;t really know that well. I ended up sitting next to them and going out to get pizza for lunch. Looking back, those three girls really made my first day enjoyable. I don&rsquo;t quite remember what we talked about but I do remember talking so much that the lecturer had to remind us that we weren&rsquo;t in school anymore. W<em>eirdly enough, two years later and I still sit and eat my lunch with those three girls.&nbsp;</em></p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Is Pharmacy right for me?</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><s>Will I be able to make friends?</s></p>\r\n</li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"text-decoration: underline;\"><strong>Balancing Act: Academics vs. Social Life</strong></span></p>\r\n<p dir=\"ltr\">I really thoroughly enjoyed my first year experience, I said yes to everything (with limits) that came my way, spent wayyyy too much money (all of my student loans) and ate lots of amazing food.&nbsp;&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">I do wish I had paid a little more attention to my labs in first year because in second year labs just get a <em>little</em> more challenging and harder to understand. Instead I spent most of first year trying to finish my lab, get the results and leg it out of that room ASAP. They say bad habits die hard, so it was really difficult for me to change that habit in second year and again the lab aspect of the course was what I struggled with the most.&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Although I don&rsquo;t regret having fun in first year, because if you want to have fun first year is the year to go a bit crazy. I think it would&rsquo;ve been wiser to focus a little more on the academic side of university. I think it can be easy to believe that A-levels will be the biggest challenge to your academic life and after that you can chill, but that really isn&rsquo;t the case when you study Pharmacy. So even though in first year you are allowed to prioritise social life and fun, don&rsquo;t let that mean that you&rsquo;ll slack off and go full force for final exams because that won&rsquo;t be great for your mental and physical health (trust me).&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\"><span style=\"text-decoration: underline;\"><strong>Did I ever find out if Pharmacy is right for me?</strong></span></p>\r\n<p dir=\"ltr\">For the most part I&rsquo;m excited to wake up and go to uni (with the exception of some 9am days). Oh yeah and controversial but I do turn up to most of my lectures, even though all of them are recorded. I feel like even if I don&rsquo;t necessarily understand or pay attention to every lecture, some of it goes into my head and that does make it a little easier to revise later on (plus I loveeee commuting into London and I feel like if I don&rsquo;t go to uni I&rsquo;m not really taking advantage of the full university experience). But there hasn&rsquo;t been a specific moment where I&rsquo;ve realised I made the right decision but I enjoy learning the content and I made it to third year - so that\'s something.&nbsp;</p>\r\n<p dir=\"ltr\">&nbsp;</p>\r\n<p dir=\"ltr\">Maybe, I&rsquo;ll have a crazy epiphany on the day I graduate but I&rsquo;ll keep you guys updated.</p>\r\n<p>&nbsp;</p>', 'lessons-from-my-first-year-of-pharmacy---taslima', 2, '0', '66c0cd7383503.jpeg', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `daily_streak`
--

CREATE TABLE `daily_streak` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_date` varchar(16) NOT NULL,
  `streak_count` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `id` int(11) NOT NULL,
  `key_index` varchar(256) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `key_index`, `value`) VALUES
(1, 'darkmode_tracker', '187');

-- --------------------------------------------------------

--
-- Table structure for table `missed_users`
--

CREATE TABLE `missed_users` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT 0,
  `updated_details` timestamp NULL DEFAULT NULL,
  `paid` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `referral_id` varchar(16) NOT NULL,
  `referral_email` varchar(64) NOT NULL,
  `referral_name` varchar(32) NOT NULL,
  `customer_email` varchar(64) NOT NULL,
  `customer_name` varchar(32) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `plan` varchar(16) NOT NULL,
  `amount` varchar(8) DEFAULT NULL,
  `subscription_id` varchar(32) DEFAULT NULL,
  `time_paid` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `referral_id`, `referral_email`, `referral_name`, `customer_email`, `customer_name`, `time_added`, `plan`, `amount`, `subscription_id`, `time_paid`) VALUES
(2, '2', 'boluadediran@gmail.com', 'Enoch Adediran', 'boluwarinadediran@gmail.com', 'Enoch Adediran', '2024-06-14 17:08:12', 'monthly', NULL, NULL, NULL),
(3, '4', 'leya.luhar1@gmail.com', 'Leya Bedar', '', ' ', '2024-09-15 19:25:49', 'monthly', NULL, NULL, NULL),
(4, '4', 'leya.luhar1@gmail.com', 'Leya Bedar', 'll320@student.le.ac.uk', 'Leya Bedar', '2024-09-22 17:52:26', 'monthly', '14.99', 'sub_1Q1tyoJlrn82pmw8PJbKEAXQ', '2024-09-22 17:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `saved_scenario_skills`
--

CREATE TABLE `saved_scenario_skills` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `resource_id` int(6) NOT NULL,
  `score` int(4) NOT NULL,
  `max_score` int(4) NOT NULL,
  `skill` varchar(32) NOT NULL,
  `time_added` int(12) NOT NULL,
  `session_id` varchar(16) NOT NULL,
  `hidden` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_scores`
--

CREATE TABLE `saved_scores` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `resource_id` int(4) NOT NULL,
  `score` int(4) NOT NULL,
  `total_score` int(3) NOT NULL,
  `time_added` int(12) NOT NULL,
  `tags` text DEFAULT NULL,
  `session_id` varchar(16) DEFAULT NULL,
  `hidden` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unsubscription`
--

CREATE TABLE `unsubscription` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `reason` varchar(64) NOT NULL,
  `subreason` varchar(64) DEFAULT NULL,
  `time_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unsubscription`
--

INSERT INTO `unsubscription` (`id`, `email`, `reason`, `subreason`, `time_added`) VALUES
(1, 'boluadediran@gmail.com', 'I am not using the service', 'Change in personal or professional circumstances', '2023-09-18 02:08:03'),
(2, 'boluadediran@gmail.com', 'Privacy and Security Concerns', 'Worries about data privacy', '2023-09-18 02:12:11'),
(3, 'boluadediran@gmail.com', 'Customer service', 'Dissatisfaction with support quality', '2023-09-26 00:21:10'),
(4, 'boluadediran@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2023-09-26 00:22:53'),
(5, 'boluadediran@gmail.com', 'Technical issues', 'Compatibility errors', '2023-09-26 00:24:58'),
(6, 'boluadediran@gmail.com', 'Customer service', 'Unresolved issues with customer support', '2023-09-26 01:28:17'),
(7, 'leya.luhar1@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2023-09-28 20:37:47'),
(8, 'leya.luhar1@gmail.com', 'Content dissatisfaction', 'The content is not relevant to me', '2023-09-28 20:47:26'),
(9, 'leya.luhar1@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-01-03 16:43:17'),
(10, 'boluadediran@gmail.com', 'Customer service', 'Dissatisfaction with support quality', '2024-01-04 06:31:20'),
(11, 'chinazasprint1@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-01-17 16:32:38'),
(12, 'chinazasprint1@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-01-17 16:32:39'),
(13, 'mo.shlaka2002@gmail.com', 'Content dissatisfaction', 'Content quality not up to expectations', '2024-01-17 20:58:27'),
(14, 'olivia-reeves@hotmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-01-26 13:51:01'),
(15, 'ismat.d@icloud.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-01-26 22:27:00'),
(16, 'huzzo20@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-01-28 19:37:26'),
(17, 'sonamathew17@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-01-30 21:19:07'),
(18, 'ishahussain2508@gmail.com', 'Temporary cancellation', '', '2024-02-01 22:23:56'),
(19, 'maisierosesmith4@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-02-05 19:00:08'),
(20, 'wadahalhasan74@gmail.com', 'I am not using the service', 'This service does not meet my needs', '2024-02-15 04:16:00'),
(21, 'altaha56h@gmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-02-19 00:15:38'),
(22, 'alishaejaz@hotmail.co.uk', 'Content dissatisfaction', 'The content is not relevant to me', '2024-02-19 18:35:29'),
(23, 'amalraphy@gmail.com', 'Temporary cancellation', '', '2024-03-01 13:12:33'),
(24, 'zainabsaadu@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-03-06 14:38:39'),
(25, 'alizabawany05@icloud.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-03-07 21:09:31'),
(26, 'aminaaziz234@gmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-03-14 14:22:25'),
(27, 'priyadutt2014@live.com', 'Temporary cancellation', '', '2024-03-15 14:28:54'),
(28, 'deboravioletta2005@outlook.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-03-18 14:26:59'),
(29, 'abadullahwork@gmail.com', 'Content dissatisfaction', 'Content quality not up to expectations', '2024-03-18 19:52:00'),
(30, 'nosheen151@hotmail.co.uk', 'I am not using the service', 'This service does not meet my needs', '2024-03-19 13:04:55'),
(31, 'nosheen151@hotmail.co.uk', 'Content dissatisfaction', 'Not finding valuable content', '2024-03-19 13:05:28'),
(32, 'nosheen151@hotmail.co.uk', 'Content dissatisfaction', 'The content is not relevant to me', '2024-03-19 13:21:31'),
(33, 'nosheen151@hotmail.co.uk', 'Customer service', 'Unresolved issues with customer support', '2024-03-19 13:58:32'),
(34, 'kareenasadiq@live.co.uk', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-03-19 22:27:29'),
(35, 'fatehabegum002@gmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-03-21 16:09:51'),
(36, 'zainab062004@yahoo.com', 'Content dissatisfaction', 'Not finding valuable content', '2024-03-25 19:06:07'),
(37, 'nusratahmed203@gmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-03-26 00:46:09'),
(38, '190032449@aston.ac.uk', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-03-26 21:14:36'),
(39, 'fatoma5790@gmail.com', 'Content dissatisfaction', 'The content is not relevant to me', '2024-03-28 11:53:50'),
(40, 'zeenatakmal1@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-03-28 12:13:17'),
(41, '200042499@aston.ac.uk', 'Financial reasons', '', '2024-04-03 14:50:45'),
(42, 'tiviarul2000@yahoo.com', 'Content dissatisfaction', 'Content quality not up to expectations', '2024-04-04 13:32:33'),
(43, 'jenkins4591@yahoo.co.uk', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-04-04 13:40:57'),
(44, 'selenae2002@hotmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-05 20:05:36'),
(45, 'mehvish1509@gmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-04-06 01:00:00'),
(46, 'mehvish1509@gmail.com', 'I am not using the service', 'This service does not meet my needs', '2024-04-06 01:11:24'),
(47, 'mehvish1509@gmail.com', 'I am not using the service', 'This service does not meet my needs', '2024-04-06 01:11:26'),
(48, 'karinagupta2000@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-08 10:55:44'),
(49, 'maisierosesmith4@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-04-08 13:13:26'),
(50, 'ellamai2002@outlook.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-09 21:10:24'),
(51, 'harisjavid7865@hotmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-04-10 16:03:16'),
(52, 'yarenl.p2004@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-11 12:15:53'),
(53, 'hadeelelkarim2@yahoo.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-04-11 12:49:11'),
(54, 'zubaida2002@icloud.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-04-14 15:37:34'),
(55, 'katherinemuir633@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-18 12:04:58'),
(56, 'katherinemuir633@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-18 12:05:00'),
(57, 'fern.mcintyre@yahoo.co.uk', 'Temporary cancellation', 'I&#039;m coming back', '2024-04-18 12:57:15'),
(58, 'wasimaambia13@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-18 18:41:04'),
(59, 'pzakipour17@gmail.com', 'Temporary cancellation', '', '2024-04-18 20:14:17'),
(60, 'bethhoneyman14@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-19 10:18:07'),
(61, 'tbhamra@outlook.com', 'Financial reasons', '', '2024-04-19 11:29:16'),
(62, 'uzmaamin02@hotmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-04-19 13:04:31'),
(63, 'lmolj2005@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-19 19:24:28'),
(64, 'cathal1997@hotmail.co.uk', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-04-19 20:11:03'),
(65, 'birsah.tek@hotmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-20 00:26:53'),
(66, 'birsah.tek@hotmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-20 11:07:24'),
(67, 'jade260594@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-20 14:30:40'),
(68, 'ainiigul@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-21 10:13:59'),
(69, 'matthewkibble44@gmail.com', 'Content dissatisfaction', 'Content quality not up to expectations', '2024-04-21 17:47:03'),
(70, 'uzmaamin02@hotmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-21 19:37:51'),
(71, 'malrawan09@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-04-21 23:04:45'),
(72, 'c2033868@newcastle.ac.uk', 'Temporary cancellation', '', '2024-04-22 18:31:41'),
(73, 'anmaraaluse@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-23 01:52:24'),
(74, 'mihaela.organ28@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-23 10:51:41'),
(75, 'eilidh.watters.2021@uni.strath.ac.uk', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-04-23 16:54:28'),
(76, 'eilidh.watters.2021@uni.strath.ac.uk', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-04-23 16:54:30'),
(77, 'sharifa1460@hotmal.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-23 17:12:28'),
(78, 'darshikathaker4@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-23 19:44:53'),
(79, 'hanna-e16@ulster.ac.uk', 'Temporary cancellation', 'I&#039;m coming back', '2024-04-24 19:58:55'),
(80, 'darbyevan66@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-24 23:33:38'),
(81, 'foreverything5200@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-25 12:05:54'),
(82, 'idilhass83@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-25 16:18:24'),
(83, 'sbchowdhury987@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-25 19:00:16'),
(84, 'hanaan.shuker@mail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-25 19:02:04'),
(85, 'antoniogelag@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-25 21:57:59'),
(86, 'eilidhwilson35@icloud.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-04-25 22:00:52'),
(87, 'anmaraaluse@gmail.com', 'Temporary cancellation', '', '2024-04-25 23:57:55'),
(88, 'anmaraaluse@gmail.com', 'Temporary cancellation', '', '2024-04-25 23:58:02'),
(89, 'rnabahin@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-26 16:11:50'),
(90, 'angeljolly003@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-04-26 17:58:59'),
(91, 'haajira.khan00@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-26 20:49:54'),
(92, 'holly.houston.2019@uni.strath.ac.uk', 'I am not using the service', 'Achieved desired outcomes', '2024-04-26 21:19:21'),
(93, 'keyaanh@yahoo.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-26 21:39:26'),
(94, 'retajbahman@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-27 02:24:52'),
(95, 'charlottea3@icloud.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-27 11:57:03'),
(96, 'zaraali132000@gmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-04-28 14:50:21'),
(97, 'zyseedat@hotmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-04-29 19:13:44'),
(98, 'layla22099@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-30 15:43:07'),
(99, 'alicja.puchalska.2019@uni.strath.ac.uk', 'I am not using the service', 'I don’t have a need for it anymore', '2024-04-30 18:27:17'),
(100, 'aliharb050201@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-05-01 11:43:21'),
(101, 'hodgek3@cardiff.ac.uk', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-01 14:09:53'),
(102, 'beccalee05@outlook.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-01 14:11:00'),
(103, 'fuzail12334@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-01 14:11:56'),
(104, 'fizzahjasrai@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-01 14:32:22'),
(105, 'halle.lam.2020@uni.strath.ac.uk', 'Financial reasons', '', '2024-05-01 15:55:43'),
(106, 'aaronpaul95@hotmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-01 18:13:02'),
(107, 'namamx2004@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-02 02:47:37'),
(108, 'divyavinod257@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-02 08:26:22'),
(109, 'nazam3@uclan.ac.uk', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-02 13:50:37'),
(110, 'aaminaali4@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-03 16:19:11'),
(111, 'safiyansultan@gmail.com', 'Temporary cancellation', '', '2024-05-03 18:34:34'),
(112, 'safiyansultan@gmail.com', 'Technical issues', 'Difficulty navigating the platform', '2024-05-03 18:38:38'),
(113, 'rajsing6199@gamil.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-05-03 19:59:04'),
(114, 'nikkigrg99@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-03 21:31:43'),
(115, 'hanaan.shuker@mail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-05-04 20:25:45'),
(116, 'tahiraa1705@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-05 02:09:08'),
(117, 'amymcnicol76@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-05 08:31:34'),
(118, 'rehamgulam12@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-06 12:37:25'),
(119, 'mokafeel45@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-07 02:58:04'),
(120, 'joysimiyu20@outlook.com', 'I am not using the service', 'Achieved desired outcomes', '2024-05-09 06:46:52'),
(121, 'wasimaambia13@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-09 18:06:26'),
(122, 'hannah_corish@hotmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-10 14:17:32'),
(123, 'pfpgroup1@outlook.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-05-11 21:51:48'),
(124, 'pfpgroup1@outlook.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-11 21:53:32'),
(125, 'fatima02.patel@icloud.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-12 19:14:28'),
(126, 'k2054159@kingston.ac.uk', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-14 00:24:18'),
(127, 'alkindiyussur@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-14 22:22:06'),
(128, 'princetakyi361@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-15 20:07:39'),
(129, 'nikita_chumber@hotmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-16 15:04:06'),
(130, 'annarinujose0209@gmail.com', 'Temporary cancellation', '', '2024-05-18 15:23:29'),
(131, 'bushraa054@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-18 15:50:25'),
(132, 'bushraa054@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-18 15:50:28'),
(133, 'pmangela230@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-19 14:22:40'),
(134, 'ayuub_99@hotmail.co.uk', 'Content dissatisfaction', 'Not finding valuable content', '2024-05-19 15:16:34'),
(135, 'umaimahashif16@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-19 22:24:40'),
(136, 'uddinmm4@cardiff.ac.uk', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-20 08:51:27'),
(137, 'gaelyahchouchy@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-21 14:32:49'),
(138, 'elifdalk62@hotmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-05-21 15:12:32'),
(139, 'sabeeratbegum@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-05-21 19:59:48'),
(140, 'naeemishaq1@hotmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-22 07:51:43'),
(141, 'kantahossain03@gmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-05-22 21:11:01'),
(142, 'salih95@hotmail.co.uk', 'I am not using the service', 'I don’t have a need for it anymore', '2024-05-23 12:20:08'),
(143, 'maya.14red@icloud.com', 'I am not using the service', 'Change in personal or professional circumstances', '2024-05-23 19:05:20'),
(144, 'hanoodsy.me@gmail.com', 'Temporary cancellation', '', '2024-05-24 18:25:35'),
(145, 'hawaahmed1233@outlook.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-05-24 22:20:37'),
(146, 'mariyajalal@mail.com', 'I am not using the service', 'This service does not meet my needs', '2024-05-26 20:21:46'),
(147, 'marinaabuaita@rocketmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-05-27 17:12:53'),
(148, 'hannahbree100@gmail.com', 'I am not using the service', 'Change in personal or professional circumstances', '2024-05-28 17:20:59'),
(149, 'z.umer374@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-05-28 18:49:05'),
(150, 'mehakejaz11@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-05-29 20:32:50'),
(151, 'tabithabi10@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-05-31 18:28:31'),
(152, 'tabithabi10@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-05-31 18:28:33'),
(153, 'haris2001@hotmail.co.uk', 'Temporary cancellation', 'I&#039;m coming back', '2024-05-31 21:10:01'),
(154, 'rohanbhalla75@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-06-01 15:39:33'),
(155, 'shahida_yeasmin03@hotmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-06-04 22:57:36'),
(156, 'iquresh3@bradford.ac.uk', 'Temporary cancellation', '', '2024-06-06 12:28:50'),
(157, 'khazeemaax@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-06-06 18:49:15'),
(158, 'p2587523@my365.dmu.ac.uk', 'I am not using the service', '', '2024-06-07 12:18:12'),
(159, 'kam.azvine@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-06-07 14:29:26'),
(160, 'sulimanalameer8@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-06-09 21:35:31'),
(161, 'sanadabhad431@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-06-10 17:37:09'),
(162, 'zainab062004@yahoo.com', 'I am not using the service', 'This service does not meet my needs', '2024-06-15 11:32:38'),
(163, 'rayyanali_10@hotmail.com', 'Content dissatisfaction', 'Content quality not up to expectations', '2024-06-17 23:47:24'),
(164, 'p2590765@my365.dmu.ac.uk', 'I am not using the service', 'I don’t have a need for it anymore', '2024-06-18 12:17:14'),
(165, 'hannahbree100@gmail.com', 'Financial reasons', '', '2024-06-21 02:13:12'),
(166, 'aaron_sandhu@hotmail.co.uk', 'Financial reasons', '', '2024-06-24 08:19:34'),
(167, 'pzakipour17@gmail.com', 'Temporary cancellation', 'I&#039;m coming back', '2024-07-01 14:51:50'),
(168, 'sannahussain85@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-07-03 11:17:17'),
(169, 'aminahani19@gmail.com', 'Temporary cancellation', '', '2024-07-06 17:49:40'),
(170, 'durreyab@icloud.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-07-06 21:41:46'),
(171, 'zakha.nazaar66@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-07-10 12:55:42'),
(172, 'zaraazam31@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-07-11 19:28:54'),
(173, 'aliharb050201@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-07-12 08:34:29'),
(174, 'sonamathew17@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-07-13 13:35:58'),
(175, 'zahralaraji@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-07-14 14:05:17'),
(176, 'charlotteellalong@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-07-16 14:20:34'),
(177, 'omarmh9@hotmail.com', 'I am not using the service', '', '2024-07-19 15:04:49'),
(178, 'hoomanpoorhomaei@aol.com', 'Technical issues', '', '2024-07-24 18:12:42'),
(179, 'aaronpaul95@hotmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-07-29 09:25:36'),
(180, 'maryamaltalabani@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-08-05 11:43:59'),
(181, 'sarajawad66@hotmail.com', 'Temporary cancellation', '', '2024-08-05 15:11:15'),
(182, 'ziguan963@gmail.com', 'I am not using the service', 'This service does not meet my needs', '2024-08-09 21:45:38'),
(183, 'hawwa.noor71@gmail.com', 'I am not using the service', 'This service does not meet my needs', '2024-08-10 11:46:31'),
(184, 'habzy009@gmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-08-10 21:34:31'),
(185, 'naumaankhan39@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-08-13 17:43:50'),
(186, 'omarali_1994@hotmail.co.uk', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-08-14 20:27:05'),
(187, 'mumerji2@uclan.ac.uk', 'I am not using the service', 'I don’t have a need for it anymore', '2024-08-15 18:55:23'),
(188, 'saarah.rawat02@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-08-16 09:43:27'),
(189, 'maryamkh054@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-08-16 18:00:31'),
(190, 'murnanci@tcd.ie', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-08-19 13:02:13'),
(191, 'rufaro.dziva@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-08-19 20:45:44'),
(192, 'ellenmlk@icloud.com', 'I am not using the service', '', '2024-08-19 23:19:19'),
(193, 'sanadabhad431@gmail.com', 'Temporary cancellation', '', '2024-08-24 13:12:20'),
(194, 'annmarythomas916@yahoo.co.uk', 'Temporary cancellation', '', '2024-08-27 15:30:21'),
(195, 'nadeem9882@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-08-31 21:12:10'),
(196, 'aadishashaji04@gmail.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-09-06 21:24:55'),
(197, 'hadeeqah10@gmail.com', 'I am not using the service', 'This service does not meet my needs', '2024-09-07 16:54:30'),
(198, 'asas322000@yahoo.com', 'Technical issues', '', '2024-09-14 11:51:43'),
(199, 'hawwa.noor71@gmail.com', 'Financial reasons', 'The site is reasonably priced, I just can’t afford it right now', '2024-09-21 15:26:43'),
(200, 'aishatoni2012@gmail.com', 'I am not using the service', 'Achieved desired outcomes', '2024-09-21 20:08:49'),
(201, '119721631@umail.ucc.ie', 'Temporary cancellation', '', '2024-09-24 08:21:21'),
(202, 'sunnahkauser@gmail.com', 'Financial reasons', 'The site is unreasonably priced for what it offers', '2024-09-24 23:51:38'),
(203, 'hayon2001@yahoo.com', 'I am not using the service', 'I don’t have a need for it anymore', '2024-10-11 23:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `time_added` bigint(13) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(16) NOT NULL,
  `title` varchar(254) NOT NULL,
  `diagnosis` varchar(64) DEFAULT NULL,
  `university` varchar(32) DEFAULT NULL,
  `module` varchar(32) DEFAULT NULL,
  `station` varchar(64) DEFAULT NULL,
  `year` varchar(16) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `files` text DEFAULT NULL,
  `file_type` varchar(5) DEFAULT NULL,
  `price` varchar(8) DEFAULT NULL,
  `free` varchar(3) DEFAULT 'no',
  `ai` varchar(3) NOT NULL DEFAULT 'no',
  `author` varchar(64) DEFAULT NULL,
  `reviewer` varchar(64) DEFAULT NULL,
  `date_of_review` varchar(32) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `likes` varchar(4) DEFAULT '0',
  `likers` text DEFAULT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0,
  `tags` text DEFAULT NULL,
  `difficulty` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `time_added`, `time_stamp`, `category`, `title`, `diagnosis`, `university`, `module`, `station`, `year`, `content`, `files`, `file_type`, `price`, `free`, `ai`, `author`, `reviewer`, `date_of_review`, `comments`, `likes`, `likers`, `hidden`, `tags`, `difficulty`) VALUES
(1, 'boluadediran@gmail.com', 1682801887, '2023-04-29 20:58:07', 'scenario', 'Scenario of something happening', NULL, 'all', NULL, NULL, NULL, 'a:4:{s:7:\"summary\";s:14:\"<p>content</p>\";s:20:\"student_instructions\";s:14:\"<p>student</p>\";s:20:\"patient_instructions\";s:15:\"<p>oatietnt</p>\";s:11:\"mark_scheme\";s:18:\"<p>mark scheme</p>\";}', '', '', '', 'no', 'yes', 'author', 'reviewer', 'date of review', NULL, '0', NULL, 1, 'tag1, tag2', 1),
(2, 'leya.luhar1@gmail.com', 1682862993, '2023-04-30 13:56:33', 'scenario', 'Test', NULL, 'all', NULL, NULL, NULL, 'a:4:{s:7:\"summary\";s:11:\"<p>Test</p>\";s:20:\"student_instructions\";s:11:\"<p>TEst</p>\";s:20:\"patient_instructions\";s:11:\"<p>Test</p>\";s:11:\"mark_scheme\";s:1458:\"<table style=\"border-collapse: collapse; width: 100%; height: 223.984px;\" border=\"1\"><colgroup><col style=\"width: 49.9225%;\"><col style=\"width: 49.9225%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">hi</td>\r\n<td style=\"height: 22.3984px;\">1</td>\r\n</tr>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">age</td>\r\n<td style=\"height: 22.3984px;\">1</td>\r\n</tr>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">medications</td>\r\n<td style=\"height: 22.3984px;\">2</td>\r\n</tr>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 22.3984px;\">\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n<td style=\"height: 22.3984px;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\";}', '', '', '', 'no', 'yes', 'Test', 'Test', 'Test', NULL, '0', NULL, 1, 'Test', 1),
(3, 'leya.luhar1@gmail.com', 1682890775, '2023-04-30 21:39:35', 'cheatsheet', 'Test', NULL, 'all', NULL, NULL, NULL, 'a:2:{s:7:\"content\";s:2782:\"<table style=\"border-collapse: collapse; width: 100%; height: 231.39px;\" border=\"1\"><colgroup><col style=\"width: 100%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 22.8984px;\">\r\n<td style=\"height: 22.8984px;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><strong>Causes</strong></span></td>\r\n</tr>\r\n<tr style=\"height: 208.492px;\">\r\n<td style=\"height: 208.492px;\">\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-family: arial, helvetica, sans-serif;\">Autoimmune (Grave&rsquo;s disease)</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-family: arial, helvetica, sans-serif;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-family: arial, helvetica, sans-serif;\">Toxic multinodular goitre</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-family: arial, helvetica, sans-serif;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-family: arial, helvetica, sans-serif;\">Solitary toxic adenoma</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-family: arial, helvetica, sans-serif;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-family: arial, helvetica, sans-serif;\">Amiodarone&nbsp;</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"font-family: arial, helvetica, sans-serif;\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"font-family: arial, helvetica, sans-serif;\">Excess T4 or T3 therapy</span></p>\r\n</li>\r\n</ul>\r\n<strong id=\"docs-internal-guid-c50894d3-7fff-1ef4-1562-d0f308476733\"></strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\"><colgroup><col style=\"width: 100%;\"></colgroup>\r\n<tbody>\r\n<tr>\r\n<td><strong>Pathophysiology</strong></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The thyroid gland becomes overactive and produces excess T3 and T4.&nbsp;</p>\r\n</li>\r\n</ul>\r\n<strong id=\"docs-internal-guid-475cf715-7fff-d01b-c425-3a024f1b3226\"></strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\"><colgroup><col style=\"width: 100%;\"></colgroup>\r\n<tbody>\r\n<tr>\r\n<td><strong>Risk factors</strong></td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<ul>\r\n<li dir=\"ltr\" role=\"presentation\">FHx of thyroid issues\r\n<p dir=\"ltr\" role=\"presentation\">&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" role=\"presentation\">\r\n<p dir=\"ltr\" role=\"presentation\">Previous Hx chronic illness: pernicious anaemia, primary adrenal insufficiency</p>\r\n</li>\r\n<li dir=\"ltr\" role=\"presentation\">\r\n<p dir=\"ltr\" role=\"presentation\">Recent pregnancy: increases likelihood of thyroiditis leading to hyperthyroidism</p>\r\n</li>\r\n</ul>\r\n<strong id=\"docs-internal-guid-475cf715-7fff-d01b-c425-3a024f1b3226\"></strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\";s:10:\"flashcards\";s:0:\"\";}', '', '', '', 'no', 'no', 'TEst', 'Test', 'Test', NULL, '0', NULL, 1, 'Test', 1),
(194, 'leya.luhar1@gmail.com', 1722501669, '2024-07-08 15:52:35', 'scenario', 'Optimising Hypertension Management', NULL, 'all', NULL, NULL, NULL, 'a:4:{s:7:\"summary\";s:94:\"<p>This is a non-interactive scenario.</p>\r\n<p>You will have 10 minutes for this scenario.</p>\";s:20:\"student_instructions\";s:1061:\"<p dir=\"ltr\">You have 10 minutes for this station</p>\r\n<p dir=\"ltr\">A 55-year-old male patient with a history of hypertension visits the pharmacy for a medication review. He is currently prescribed amlodipine 5 mg once daily. Despite this, his recent blood pressure readings are consistently around 150/95 mmHg. He has not experienced any symptoms. The patient is concerned about his blood pressure control and wants advice on how to better manage his condition with medication.</p>\r\n<h4 dir=\"ltr\">Questions:</h4>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How would you optimise the patient\'s medication regimen to improve blood pressure control? (2 marks)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">How would you counsel the patient on the changes to his medication regimen? (3 marks)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Explain the rationale behind the recommended changes to the patient\'s hypertension management. (2 marks)</p>\r\n</li>\r\n</ol>\r\n<p>&nbsp;</p>\";s:18:\"actor_instructions\";b:0;s:11:\"mark_scheme\";s:1503:\"<div dir=\"ltr\" align=\"left\">\r\n<table><colgroup><col width=\"32\"><col width=\"560\"><col width=\"32\"></colgroup>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p dir=\"ltr\">1</p>\r\n</td>\r\n<td>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Suggest increasing the dose of amlodipine to 10 mg once daily. (1)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Consider adding a second antihypertensive, such as an ACE inhibitor (e.g., lisinopril) OR an ARB (e.g. losartan)</p>\r\n</li>\r\n</ul>\r\n</td>\r\n<td>1, 1,</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p dir=\"ltr\">2</p>\r\n</td>\r\n<td>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Explain how to take the new medication (name, strength, form, dose) or any dosage changes to regular medication (1)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Discuss potential side effects and what to do if these are experienced (1)</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Discuss the importance of blood pressure monitoring and attending appointments (1)</p>\r\n</li>\r\n</ul>\r\n</td>\r\n<td>1, 1, 1,</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p dir=\"ltr\">3</p>\r\n</td>\r\n<td>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Explain that higher doses or combination therapy in uncontrolled hypertension can improve blood pressure control (1) and reduce the risk of cardiovascular events (1).</p>\r\n</li>\r\n</ul>\r\n</td>\r\n<td>1, 1,</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>\";}', '', '', NULL, 'no', 'no', 'Leya Luhar', 'Kainat Ali, Kiani Patel, ', '07/07/24', NULL, '1', 'habzy009@gmail.com,', 0, 'Medicine Optimisation, Non-interactive', 1);

-- --------------------------------------------------------

--
-- Table structure for table `upload_comments`
--

CREATE TABLE `upload_comments` (
  `id` int(11) NOT NULL,
  `upload_id` int(7) NOT NULL,
  `email` varchar(128) NOT NULL,
  `comment_name` varchar(64) NOT NULL,
  `comment_text` varchar(400) NOT NULL,
  `reply_to` varchar(7) DEFAULT NULL,
  `time_added` int(12) NOT NULL,
  `hidden` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload_comments`
--

INSERT INTO `upload_comments` (`id`, `upload_id`, `email`, `comment_name`, `comment_text`, `reply_to`, `time_added`, `hidden`) VALUES
(1, 95, 'boluadediran@gmail.com', 'Enoch', 'Awesome!', NULL, 1710609368, 0),
(2, 40, '200042499@aston.ac.uk', 'Matthew ', 'Where can I find how long it takes for a drug to work? ', NULL, 1710720668, 0),
(3, 139, 'zeenatakmal1@gmail.com', 'Zeenat', 'n', NULL, 1710882758, 0),
(4, 139, 'zeenatakmal1@gmail.com', 'Zeenat', 'n', NULL, 1710882768, 0),
(5, 106, 'iquresh3@bradford.ac.uk', 'imaan ', '14/29', NULL, 1711545578, 0),
(6, 80, 'keyaanh@yahoo.com', 'Keyaan', '1st consultation trying this. needed to view hba1c ranges and explain what they mean to the pt. completely forgot to ask for PMH and allergies. address smoking cessation stratergies. address more neuropathic problems that can be caused from diabetes such as neuropathy in eye, diabetic foot, thirst. hba1c levels that range depending on empty stomach and food.', NULL, 1712012847, 0),
(7, 102, 'iquresh3@bradford.ac.uk', 'imaan ', '-', NULL, 1712246218, 0),
(8, 61, 'alicja.puchalska.2019@uni.strath.ac.uk', 'Alicja ', 'no common side effects have been stated', NULL, 1712855845, 0),
(9, 78, 'iquresh3@bradford.ac.uk', 'sarah', 'n', NULL, 1713104097, 0),
(10, 74, 'iquresh3@bradford.ac.uk', 'imaan ', 'n', NULL, 1713105345, 0),
(11, 74, 'iquresh3@bradford.ac.uk', 'imaan ', 'n', NULL, 1713105480, 0),
(12, 107, 'iquresh3@bradford.ac.uk', ' ', 'n', NULL, 1713107837, 0),
(13, 66, 'iquresh3@bradford.ac.uk', 'imaan ', 'done', NULL, 1713110843, 0),
(14, 96, 'iquresh3@bradford.ac.uk', 'imaan ', 'done ', NULL, 1713113028, 0),
(15, 33, 'iquresh3@bradford.ac.uk', 'sarah', 'yes', NULL, 1713115282, 0),
(16, 29, 'iquresh3@bradford.ac.uk', 'imaan ', 'done ', NULL, 1713200626, 0),
(17, 35, 'iquresh3@bradford.ac.uk', 'imaan ', 'done', NULL, 1713202979, 0),
(18, 123, 'solapeaomoboriowo@gmail.com', 'S', 'On the mark scheme it should say add 5mg of folic acid on a different day', NULL, 1713399616, 0),
(19, 111, 'retajbahman@gmail.com', 'Retaj', 'Y', NULL, 1713462362, 1),
(20, 41, 'iquresh3@bradford.ac.uk', 'imaan ', 'done ', NULL, 1713470332, 0),
(21, 122, 'iquresh3@bradford.ac.uk', 'imaan ', 'DONE', NULL, 1713549138, 0),
(22, 96, 'iquresh3@bradford.ac.uk', 'imaan ', 'DONE', NULL, 1713551158, 0),
(23, 137, 'maisierosesmith4@gmail.com', 'Maisie', 'amazing ', NULL, 1713552405, 0),
(24, 122, 'iquresh3@bradford.ac.uk', 'SARAH', 'DONE', NULL, 1713636173, 0),
(25, 122, 'iquresh3@bradford.ac.uk', 'sarah ', 'done', NULL, 1713812487, 0),
(26, 138, 'anmaraaluse@gmail.com', 'Anmar', 'Done', NULL, 1713838035, 0),
(27, 115, 'anmaraaluse@gmail.com', 'Anmar', 'done', NULL, 1713838057, 0),
(28, 154, 'anmaraaluse@gmail.com', 'Anmar', 'this better not come up ', NULL, 1713838215, 0),
(29, 135, 'anmaraaluse@gmail.com', 'Anmar', 'done', NULL, 1713838304, 0),
(30, 95, 'anmaraaluse@gmail.com', 'Anmar', 'Done', NULL, 1713838743, 0),
(31, 105, 'alishaejaz@hotmail.co.uk', 'Alisha', 'good\r\n', NULL, 1714486303, 1),
(32, 29, 'bushraa054@gmail.com', 'fatima', 'done', NULL, 1714858332, 0),
(33, 117, 'riyaasharma382@gmail.com', 'Riyaa', 'need to work on mechanism of the drugs and side effects \r\nalso counsel patient on not to stop drug suddenly as could cause loss of seizure control ', NULL, 1715272481, 1),
(34, 115, 'zahralaraji@gmail.com', 'z', 'forgot allergies', NULL, 1720210752, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `first_name` varchar(16) DEFAULT NULL,
  `last_name` varchar(16) DEFAULT NULL,
  `university` varchar(128) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `country` varchar(16) DEFAULT NULL,
  `state` varchar(12) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `zip` varchar(16) DEFAULT NULL,
  `address` varchar(254) DEFAULT NULL,
  `exam_date` varchar(12) DEFAULT NULL,
  `referrer` varchar(32) DEFAULT NULL,
  `nick` varchar(32) DEFAULT NULL,
  `referrer_last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(64) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cookie_id` varchar(64) DEFAULT NULL,
  `cookie_expiry` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `newsletter` varchar(1) NOT NULL DEFAULT '0',
  `marketing` varchar(1) NOT NULL DEFAULT '0',
  `billing_expiry` varchar(1) NOT NULL DEFAULT '1',
  `source` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(32) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `subscription_id` varchar(255) DEFAULT NULL,
  `source` varchar(32) DEFAULT NULL,
  `amount` varchar(8) DEFAULT NULL,
  `currency` varchar(3) DEFAULT 'gbp',
  `plan_interval` varchar(16) DEFAULT NULL,
  `interval_count` int(1) DEFAULT NULL,
  `period_start` datetime DEFAULT NULL,
  `period_end` datetime DEFAULT NULL,
  `period_end_timestamp` int(11) DEFAULT NULL,
  `status` varchar(16) DEFAULT NULL,
  `price_id` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `customer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_streak`
--
ALTER TABLE `daily_streak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missed_users`
--
ALTER TABLE `missed_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_scenario_skills`
--
ALTER TABLE `saved_scenario_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_scores`
--
ALTER TABLE `saved_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unsubscription`
--
ALTER TABLE `unsubscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_comments`
--
ALTER TABLE `upload_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `daily_streak`
--
ALTER TABLE `daily_streak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `missed_users`
--
ALTER TABLE `missed_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saved_scenario_skills`
--
ALTER TABLE `saved_scenario_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_scores`
--
ALTER TABLE `saved_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unsubscription`
--
ALTER TABLE `unsubscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `upload_comments`
--
ALTER TABLE `upload_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
