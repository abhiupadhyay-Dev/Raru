-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2023 at 12:38 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u803997168_raru`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `slug`, `status`) VALUES
(16, 'Business', 'business', '1'),
(17, 'Gift city', 'gift-city', '1'),
(19, '\"Resilient Indian Economy Defies Global Challenges: Strong Growth Prospects Ahead\"', '-resilient-indian-economy-defies-global-challenges-strong-growth-prospects-ahead', '1'),
(20, 'GIFT City Continues to Attract Global Giants and Expands Horizons', 'gift-city-continues-to-attract-global-giants-and-expands-horizons', '1'),
(21, 'GIFT City Expands Global Reach with Two Japanese Banks Joining, as India Allows Direct Listing on Foreign Stock Exchanges', 'gift-city-expands-global-reach-with-two-japanese-banks-joining-as-india-allows-direct-listing-on-foreign-stock-exchanges', '1'),
(22, ' GIFT City Achieves Remarkable Financial Milestones and Expedites Growth Plans', '-gift-city-achieves-remarkable-financial-milestones-and-expedites-growth-plans-1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `a_rank` int(11) NOT NULL,
  `a_name` varchar(255) DEFAULT NULL,
  `a_email` varchar(255) DEFAULT NULL,
  `a_pass` varchar(50) DEFAULT NULL,
  `a_mobile` varchar(255) DEFAULT NULL,
  `a_address` varchar(255) DEFAULT NULL,
  `a_city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`a_rank`, `a_name`, `a_email`, `a_pass`, `a_mobile`, `a_address`, `a_city`) VALUES
(1, 'vision', 'info@rarucapital.com', 'Raru@123', '88888888', 'hello', 'ahemdabad\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `des_1` longtext DEFAULT NULL,
  `des_2` longtext DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `cat_id`, `title`, `date`, `company_name`, `des_1`, `des_2`, `image1`, `status`, `slug`) VALUES
(37, 16, 'Reviving Jet Airways: Jalan Kalrock Consortium completes Rs 350 crore payment; plans to start airline in 2024 :', '2023-10-05', 'RARU CAPITAL IFSC PRIVATE LIMITED', '<p>&nbsp;</p>\r\n\r\n<p>The Jalan Kalrock Consortium (JKC), which successfully resolved the Jet Airways case, has fulfilled its financial commitment by injecting an additional Rs 100 crores ($12 million), reaching a total equity contribution of Rs 350 crores ($42.1 million) as mandated by the court-approved resolution plan. The consortium&#39;s objective to revive the iconic airline remains unchanged, with plans to resume operations in 2024. The National Company Law Appellate Tribunal (NCLAT) granted an extension until September 30 for JKC to make the payment, allowing them to utilize Rs 150 crores from their performance bank guarantee, though creditors contested this use.</p>\r\n', '', 'business.jpg', '1', 'reviving-jet-airways-jalan-kalrock-consortium-completes-rs-350-crore-payment-plans-to-start-airline-in-2024'),
(38, 16, 'L&T hits record high, up 5% in 5 days; Jefferies, UBS maintain ‘buy’ rating', '2023-10-05', 'RARU CAPITAL IFSC PRIVATE LIMITED', '<p>Larsen &amp; Toubro (L&amp;T) shares have surged this week, reaching record highs and gaining up to 5 percent. On September 29, the stock hit an all-time high of Rs 3,057 per share on BSE, rising by 1.5 percent. On Friday, approximately 11 lakh shares were traded at both exchanges,&nbsp;compared to 42 lakh shares on September 28, with a one-week average trading volume of around 23 lakh shares. L&amp;T&#39;s construction arm recently secured a significant order from the Mumbai Metropolitan Region Development Authority (MMRDA) for an Underground Road tunnel Project in Mumbai, while their Rs 10,000 crore share buyback had a 100 percent retail acceptance ratio. Brokerages like Jefferies and UBS have maintained positive outlooks on L&amp;T, citing order growth and international opportunities in the Middle East.</p>\r\n', '', 'business1.jpg', '1', 'l-t-hits-record-high-up-5-in-5-days-jefferies-ubs-maintain-buy-rating-1'),
(39, 17, 'IFSCA plans payment regulations in GIFT City soon, says Chairperson K Rajaraman-test', '2023-10-05', 'RARU CAPITAL IFSC PRIVATE LIMITED', '<p>The Chairperson of the International Financial Services Authority (IFSCA), K Rajaraman,<br />\r\nannounced plans to introduce payment regulations in the GIFT City within the next few months to facilitate instant payment settlements. Speaking at the Global Fintech Fest 2023, Rajaraman also mentioned ongoing efforts to establish a real-time gross settlement system within six months. He highlighted the growing presence of entities in GIFT City for aircraft and ship leasing, with regulatory adjustments in progress. Furthermore, he anticipated the completion of necessary procedures and amendments for listing companies on IFSC within the next three months, aiming to go live by the end of the year while collaborating with government ministries and regulatory bodies.</p>\r\n', '', 'maxresdefault.jpg', '1', 'ifsca-plans-payment-regulations-in-gift-city-soon-says-chairperson-k-rajaraman-test-1'),
(40, 17, 'Saudi Arabia to set up an office in GIFT City India: Minister of Investment', '2023-10-05', 'RARU CAPITAL IFSC PRIVATE LIMITED', '<p>Saudi Arabia&#39;s Investment Minister, Khalid bin Abdulaziz Al-Falih, announced plans to establish an office in India&#39;s Gujarat International Finance Tec-City (GIFT City), with a strong Saudi delegation set to visit India for this purpose in the coming weeks. GIFT City is India&#39;s tax-neutral financial hub located in Gujarat. Al-Falih emphasized the importance of supporting startups and entrepreneurs for future economic growth and innovation. In response, India&#39;s Commerce Minister, Piyush Goyal, expressed India&#39;s intention to consider opening an office in Riyadh. The &quot;Sovereign Wealth Fund,&quot; also known as the Public Investment Fund, manages over $700 billion in Saudi government assets, investing in various sectors to benefit the Saudi economy. Established in 1971, it has offices in Riyadh, Hong Kong, London, and New York.</p>\r\n', '', 'giftcity1.jpg', '1', 'saudi-arabia-to-set-up-an-office-in-gift-city-india-minister-of-investment-1'),
(42, 17, 'GIFT Nifty\'s Record-Breaking Turnover', '2023-10-05', 'RARU CAPITAL IFSC PRIVATE LIMITED', '<p>Gift Nifty, a futures contract based on the Nifty 50 index and denominated in US dollars,<br />\r\nachieved a historic single-day turnover of $15.25 billion on Tuesday. This<br />\r\naccomplishment surpasses its previous record of $12.98 billion on August 29.<br />\r\nGift Nifty is actively traded on the NSE IX, an international multi-assets exchange<br />\r\nlocated in GIFT City, and has witnessed an upward trajectory in trading turnover since its<br />\r\nfull-scale operation began on July 3, 2023.</p>\r\n', '<p>As of October 3, 2023, GIFT City stands on the cusp of rivaling global financial hubs,<br />\r\nwith companies like JPMorgan Chase and HSBC already operating within its bounds.<br />\r\nPrime Minister Narendra Modi&#39;s vision for GIFT City as a formidable financial services<br />\r\ncenter is well on its way to realization, with a growing list of achievements and exciting<br />\r\ndevelopments on the horizon.</p>\r\n', 'rupee1-1688566058.jpg', '1', 'gift-nifty-s-record-breaking-turnover-1'),
(43, 19, '\"Resilient Indian Economy Defies Global Challenges: Strong Growth Prospects Ahead\"', '2023-10-12', 'RARU CAPITAL IFSC PRIVATE LIMITED', '<p><strong>As of October 12, 2023, the Indian economy continues to exhibit remarkable resilience despite facing various global challenges. The latest reports from the World Bank and the International Monetary Fund (IMF) paint an optimistic picture of India&#39;s economic growth and potential. Here&#39;s a detailed look at India&#39;s economic landscape in the present and the foreseeable future.</strong></p>\r\n\r\n<p><strong>Robust Growth Rates</strong></p>\r\n\r\n<p>The World Bank&#39;s flagship half-yearly report on the Indian economy highlights the country&#39;s impressive performance in FY22/23. India achieved a growth rate of 7.2%, making it one of the fastest-growing major economies worldwide. This growth rate is notably the second-highest among G20 nations, nearly double the average growth seen in emerging market economies. The World Bank&#39;s projections for FY23/24 indicate a sustained upward trajectory, with a GDP growth forecast of 6.3%<strong>.</strong></p>\r\n\r\n<p><strong>Sector-Specific Strength</strong></p>\r\n\r\n<p>One of the key drivers of India&#39;s growth has been the service sector, which is expected to maintain its strong performance with a projected growth rate of 7.4%. Additionally, investment growth is anticipated to remain robust at 8.9%. The IMF has also revised its growth forecast for India upwards, predicting a 6.3% expansion in 2023, up from the earlier estimate of 6.1%. This reaffirms the global recognition of India&#39;s economic resilience.</p>\r\n\r\n<p><strong>Contributing Factors :</strong></p>\r\n\r\n<p>Economists attribute India&#39;s growth to several factors, including increased consumption, substantial infrastructure spending, and the establishment of numerous new businesses. These factors have contributed to the nation&#39;s impressive economic performance, reflecting its dynamic and resilient nature.</p>\r\n\r\n<p><strong>Economic Indicators :&nbsp;</strong></p>\r\n\r\n<p><strong>Recent economic indicators for the first half of 2023 underscore the expansionary economic conditions propelled by domestic demand. Key highlights include:</strong></p>\r\n\r\n<p><strong>- Steel Industry: </strong>Steel production soared by 11.9% year-on-year in the April-June quarter, with steel consumption increasing by 10.2% year-on-year.</p>\r\n\r\n<p><strong>- Automobile Sector:</strong> Sales of commercial vehicles witnessed a remarkable upswing, rising by 34.3% year-on-year in FY2022-23. Sales of private vehicles also increased significantly, by 18.7% year-on-year in the same fiscal year.</p>\r\n\r\n<p><strong>- Electronics Exports: </strong>India&#39;s electronics goods exports surged by an impressive 37.6% year-on-year during the April-July quarter of 2023. This highlights the rapid expansion in India&#39;s electronics product exports.</p>\r\n\r\n<p><strong>Challenges on the Horizon :&nbsp;</strong></p>\r\n\r\n<p>Despite India&#39;s strong growth performance, there are challenges that economists are keeping a watchful eye on. These challenges include a widening current account deficit, inflationary pressures, and geopolitical risks, which have the potential to pose headwinds to India&#39;s growth in the near future. These challenges serve as a reminder that maintaining this growth trajectory will require adept economic management.</p>\r\n\r\n<p><strong>Optimistic Outlook :&nbsp;</strong></p>\r\n\r\n<p>Despite these challenges, economists remain optimistic about India&#39;s long-term growth prospects. Some experts predict that India&#39;s GDP will surpass Japan&#39;s by 2030, positioning India as the second-largest economy in the Asia-Pacific region. This outlook underscores the faith in India&#39;s capacity to continue its growth story, albeit with a need for prudent management of economic challenges.</p>\r\n\r\n<p>In summary, India&#39;s economy stands out as a resilient force in the global economic landscape, with impressive growth rates and a promising future. However, it is vital for policymakers and stakeholders to address potential headwinds effectively and sustain the nation&#39;s upward trajectory on the global economic stage.</p>\r\n', '', 'Indian-Economy.png', '1', '-resilient-indian-economy-defies-global-challenges-strong-growth-prospects-ahead-1'),
(44, 20, 'GIFT City Continues to Attract Global Giants and Expands Horizons', '2023-10-30', 'RARU CAPITAL IFSC PRIVATE LIMITED', '<p><strong>GIFT City, Gujarat, India: </strong></p>\r\n\r\n<p>As of October 30, 2023, GIFT City, India&#39;s vibrant global financial and technology hub, is experiencing remarkable growth and development. Several recent developments have highlighted its increasing prominence on the global stage.</p>\r\n\r\n<p><strong>Tech Titans Google and Capgemini Set to Join GIFT City</strong></p>\r\n\r\n<p>Two tech giants, Google and Capgemini, are in advanced discussions to establish offices in the domestic region of GIFT City. Sources indicate that official announcements about this significant move are on the horizon, signifying the city&#39;s appeal to global players.</p>\r\n\r\n<p><strong>Vibrant Gujarat Global Summit (VGGS) 2024 to Strengthen GIFT City&#39;s Position :&nbsp;</strong></p>\r\n\r\n<p>The 10th edition of the Vibrant Gujarat Global Summit, scheduled for January 2024, will focus on bolstering GIFT City&#39;s global presence. Prime Minister Modi recently emphasized the importance of enhancing GIFT City, which hosts India&#39;s first international financial services center (IFSC) &ndash; comparable to Dubai and Singapore.</p>\r\n\r\n<p><strong>Singapore&#39;s DBS Bank Secures Approval for International Banking Unit (IBU) :&nbsp;</strong></p>\r\n\r\n<p>The International Financial Services Centre Authority (IFSCA) has granted approval to the Development Bank of Singapore (DBS) to establish an international banking unit (IBU) within GIFT City. This approval is expected to attract more financial institutions from Singapore, following the arrival of SGX Nifty.</p>\r\n\r\n<p><strong>GIFT City&#39;s Ambitious Expansion Plans :</strong></p>\r\n\r\n<p>To meet rising demand and ensure sustainable development, GIFT City is set to expand by approximately 2,300 acres, incorporating four neighboring villages. This expansion mirrors GIFT City&#39;s model, emphasizing organized and equitable development.</p>\r\n\r\n<p><strong>Social Infrastructure Development Unveiled :&nbsp;</strong></p>\r\n\r\n<p>GIFT City is stepping into the future with plans for social infrastructure development, which will cover 20.5 acres and feature a 158-meter &quot;GIFT Eye.&quot; This initiative by the Gujarat International Finance Tec-City Company Ltd (GIFTCL) includes an entertainment, recreational, and retail zone, complete with attractions like a Ferris wheel and fountain show.</p>\r\n\r\n<p><strong>GIFT City: A Growing Hub for Major Corporations :&nbsp;</strong></p>\r\n\r\n<p>GIFT City, already home to corporate heavyweights like IBM, Bank of America, HSBC, Oracle, and many others, is on the path to becoming an even more liveable city. The government is focusing on developing essential social infrastructure, including schools, hospitals, malls, and recreation zones.</p>\r\n\r\n<p><strong>Major Corporations Operating in GIFT City (as of October 30, 2023):&nbsp;</strong><br />\r\n1. Tata Consultancy Services Ltd<br />\r\n2. Adani Township And Real Estate Company<br />\r\n3. Akshar Tech<br />\r\n4. Arihant Bio<br />\r\n5. IBM<br />\r\n6. Bank of America<br />\r\n7. HSBC<br />\r\n8. Oracle<br />\r\n9. Beefree</p>\r\n\r\n<p><strong>Infrastructure Developments in GIFT City:</strong><br />\r\n- Completion of the First Phase in 2012<br />\r\n- &quot;DIGGING FREE CITY&quot; Concept<br />\r\n- Potable Water Supply<br />\r\n- Dual Power Supply<br />\r\n- Fault-Tolerant Optical Fiber Ring Infrastructure<br />\r\n- Waste Collection and Disposal System<br />\r\n- Cooling Load Capacity<br />\r\n- Network of Roads and Sustainable Transportation<br />\r\n- Development of Social Infrastructure</p>\r\n\r\n<p>GIFT City&#39;s ongoing progress and expansion are indicative of its promising future, attracting major players and offering numerous advantages for both domestic and international businesses. As it continues to develop and innovate, GIFT City is positioning itself as a key global financial and technological hub.</p>\r\n', '', 'Employee_development_1200x630.png', '1', 'gift-city-continues-to-attract-global-giants-and-expands-horizons'),
(46, 21, 'GIFT City broadens its international footprint with the inclusion of two Japanese banks.', '2023-11-22', 'RARU CAPITAL IFSC PRIVATE LIMITED', '<p><em>November 2023: In a significant boost to the Gujarat International Finance Tec-City (GIFT City), two Japanese banks are set to establish operations within the tax-free zone, according to K Rajaraman, Chairman of the International Financial Services Centres Authority (IFSCA). The move follows the successful delegation to Tokyo, where discussions led to the registration of these banks in GIFT City.</em></p>\r\n\r\n<p><em>GIFT City, based in Ahmedabad, already hosts a diverse financial sector with 10 foreign and 16 local banks. The total assets of more than 550 businesses within the city have reached an impressive $47 billion. Rajaraman highlighted the crucial role GIFT City is expected to play in India&#39;s economic growth and emphasized the need for Indian origin funds and businesses from tax-free jurisdictions to become part of this burgeoning financial hub.</em></p>\r\n\r\n<p><em>Rajaraman, speaking at the Singapore Fintech Festival, revealed that the recent delegation to Tokyo resulted in the registration of two Japanese banks in GIFT City, and further discussions are ongoing with potential businesses at the festival. The IFSCA aims to showcase the advantages of operating in the tax-free GIFT City.</em></p>\r\n\r\n<p><em>Currently regulating the Indian special economic zones, including GIFT City, IFSCA reported the presence of 78 fund managers, 88 alternative investment funds, 82 funds with a combined corpus of $90 billion, five insurance companies, and two stock exchanges, including GIFT CITY Nifty of the National Stock Exchange.</em></p>\r\n\r\n<p><em>Additionally, the city accommodates three electronic trading platforms, international trade finance solutions for bill factoring, and insurance companies with international joint venture partners. Rajaraman expressed confidence that a substantial number of India-focused businesses will thrive in GIFT City, predicting rapid growth.</em></p>\r\n\r\n<p><em>In a related development, the Ministry of Corporate Affairs announced that Indian companies can now list directly on foreign stock exchanges. The initiative, outlined in the Companies Amendment Act of 2020, is set to commence through GIFT City&#39;s International Financial Services Centre (IFCS), with a broader direct listing to follow.</em></p>\r\n\r\n<p><em>Effective from October 30, 2023, the amendment allows select companies to directly list on foreign exchanges, with forthcoming guidelines expected from the government regarding eligible securities and companies. Finance Minister Nirmala Sitharaman had earlier stated that this move aims to enable startups and companies to access global markets through GIFT IFSC.</em></p>\r\n', '', 'GIFT-City-The-Next-Big-Thing-in-Gujarats-Economic-Growth.png', '1', 'gift-city-broadens-its-international-footprint-with-the-inclusion-of-two-japanese-banks-1'),
(50, 22, ' GIFT City Achieves Remarkable Financial Milestones and Expedites Growth Plans', '2023-12-02', 'RARU CAPITAL IFSC PRIVATE LIMITED', '<p><strong>GIFT City&#39;s Financial Landscape&nbsp;</strong></p>\r\n\r\n<p>As of December 1st, 2023, GIFT City showcases progress in hosting diverse funds and banking institutions, amassing over $15 billion from more than 40 funds. The city aims to repatriate funds to India&rsquo;s onshore markets, foster fintech innovation, and influence the country&rsquo;s economic landscape.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Infrastructure Development in Focus</strong></p>\r\n\r\n<p>GIFT City accelerates infrastructure projects, prioritizing the construction of office spaces, residential areas, and a world-class entertainment zone set to be completed within three years. The city also expands its master plan to add approximately 10 sq. km to its existing 14 sq. km area.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>GIFT City IFSC&#39;s Financial Initiatives</strong></p>\r\n\r\n<p>The GIFT City International Financial Services Centre (IFSC) gears up for direct listings and re-insurance, with a cumulative debt listing at GIFT IFSC stock exchanges reaching $52.7 billion as of September 30, 2023. The Union Budget further supports GIFT City&#39;s growth as a vibrant global financial hub.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>GIFT City Recognized for Financial Reforms</strong></p>\r\n\r\n<p>Acknowledged as a &quot;path-breaking financial reform,&quot; GIFT City aims to establish itself as a global financial hub. The city&#39;s financial reforms and diverse initiatives position it positively for emerging as a prominent global financial center.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>IFSCA Chairman Discusses GIFT City&#39;s Evolution</strong></p>\r\n\r\n<p>IFSCA Chairman, K Rajaraman, discusses GIFT City&#39;s development since the creation of the International Financial Services Authority in 2020. The city has seen remarkable growth, with over 550 licensed entities and cumulative debt listings exceeding $52.7 billion.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Future Plans and Challenges</strong></p>\r\n\r\n<p>GIFT City&#39;s plans for growth include direct listings, becoming a re-insurance hub, and offering comprehensive financial services. The city addresses challenges, such as a surge in applications outpacing infrastructure development, with plans to maintain momentum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>GIFT City&#39;s Real Estate Boom</strong></p>\r\n\r\n<p>Residential prices in GIFT City have surged by 30% in the past 18 months, with expectations of doubling in the next five years. The prestigious project attracts investors, particularly NRIs, and plans for extensive housing development are underway.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>GIFT City&#39;s Real Estate Vision</strong></p>\r\n\r\n<p>GIFT City&#39;s master plan envisions the construction of 25,000 housing units, attracting developers and investors alike. The real estate market within GIFT City is positioned for substantial growth, reflecting the city&#39;s status as a burgeoning financial and residential hub.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Conclusion: GIFT City&#39;s Journey to Global Prominence</strong></p>\r\n\r\n<p>GIFT City stands at the forefront of India&#39;s financial and real estate landscape, showcasing remarkable achievements and ambitious plans for the future. With a focus on financial reforms, infrastructure development, and a thriving real estate market, GIFT City aims to solidify its position as a vibrant global financial and residential hub.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'in-the-next-3-5-years-6-5-gdp-growth-is-par-bibek-debroy.jpg', '1', '-gift-city-achieves-remarkable-financial-milestones-and-expedites-growth-plans-1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`a_rank`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
