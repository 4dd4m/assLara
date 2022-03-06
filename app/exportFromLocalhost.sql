-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laravel
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `structureId` int(11) NOT NULL,
  `tone` tinyint(1) NOT NULL,
  `isApproved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES
(1,'Method, Mathematics and Proper Terminology','2EVJHWhNGE','ZFDWFziT0b','nKH7YN4KpK','LCQy8@email.com',2,0,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(2,'The method/methodology has not been justified through presentation of potential alternatives and resulting justification of the selected method on a balanced and well reasoned basis.','e2bFA0Xjtx','nH7BH9HFM2','C3ctzP9APg','6mD3R@email.com',12,0,1,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(3,'The method/methodology is not well reported and there is insufficient detail and description; the reader should be able to follow the reasoning and development and there should be adequate explanation and illustration in relation to the approach adopted.','MwqjVHri7v','xcIyooqCuf','MxEZeHhTRn','8MyF2@email.com',7,1,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(4,'Important assumptions have not been addressed/stated.','Lc0jAuQ3gn','9pNvPgvaKw','p1AlEp9nSy','Ztkd7@email.com',1,1,1,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(5,'Fundamental flaws in methodology have been noted.','GmmIhp4f1q','bkg7tzK3Lj','cZ2dURL9CI','i1Jlz@email.com',4,1,1,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(6,'Standard and well accepted approaches have not been adopted, without clear justification for avoiding these.','SUB6mwoq8A','ksTETnVJju','A3nvzFWncC','z50Rn@email.com',12,0,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(7,'The presentation of mathematics has clear deficiencies e.g. errors are present; wrong symbols have been used, Greek letters are absent or incorrect, subscripts and/or superscripts are missing; equation layout is flawed.','45WYQZOhMj','s0cfdZj9K7','Gshb1vO7Jg','hpMpW@email.com',4,0,1,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(8,'Important equations/expressions have not been properly numbered in sequence.','V2fE3KU22S','qLZCokGpuo','NMNClvdEHB','nDLBc@email.com',9,0,1,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(9,'Key steps are missing in the development of equations/expressions.','PFfxzyXsEM','lgl3jxUVHn','OyMMAiZSqz','9gIJq@email.com',12,0,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(10,'Excessive detail has been included in the development of equations/expressions.','vpZqTUQn0d','zB1uhzz7a9','3dnO0QhWTV','cJ5LI@email.com',3,0,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(11,'Units or symbols are not consistent with appropriate conventions e.g. such as the SI system of units.','8wQrpjmO2i','EwpGEntsHF','D33J4kCdJu','V1znp@email.com',4,1,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(12,'Abbreviations and/or acronyms do not follow normal conventions or have not been explicitly defined at the first mention.','2NjcrnsTPm','4oDgGqdJp3','oz1l0MVn1k','DKxfU@email.com',7,0,1,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(13,'Results and Analysis','GKtZvByQYR','Y5nyo3K04L','mdfjPrOLqF','IUUaA@email.com',2,0,1,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(14,'Assumptions have not been clearly stated.','YLtWq0ynwo','9n07GVlbXP','aoTPM9UHL3','8Vt4n@email.com',1,1,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(15,'There should be some tabular presentation of results.','Jpk1qVot9J','wWdyD9UegE','6lDK1Yiv1j','8bEhK@email.com',7,1,1,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(16,'Graphs or graphical presentation have/has not been used as expected.','lFbdOuR4RG','l3dZ0CIkLS','2HwekiEdjd','FmCmV@email.com',9,0,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(17,'The analysis of the results is too trivial in nature and a more detailed analysis was necessary (e.g. no confidence limits have been indicated).','5STZIZXFoQ','Ohcyi8aVYZ','6Zk8PStm9i','ZREt0@email.com',6,0,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(18,'Too much has been read into the results and sweeping conclusions have been made, which are not fully justified.','iMivG57Php','txfp4noi2l','KXkl1UP5kz','w4yQ9@email.com',6,1,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(19,'Statistical analysis aspects are flawed, e.g. they are incorrect, incomplete or inappropriately applied.','mGC3FKZXq9','CKOba9pV4N','TyryDiKH0c','Sj3Xj@email.com',6,0,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(20,'There is insufficient discussion of results and it has been wrongly assumed that they speak for themselves.','DyDeiKnWOn','8HQPggAtq6','taxVJpCCrH','N1br6@email.com',7,1,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(21,'Anomalies are present in results which have not been properly discussed or commented upon.','01DcyLbd7K','XWl3la3Pfn','pSn6NkaNIC','Uxy61@email.com',8,0,1,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(22,'Presentation of results involves excessive repetition and an appendix should have been used for the bulk of the material, once the first example(s) had been shown.','UjW2PyRX2y','4loWFffT0k','01uYMNbY1c','mL98v@email.com',6,1,0,'2022-03-06 08:57:58','2022-03-06 08:57:58'),
(23,'Irrelevant material has been included, which does not serve to enhance the presentation of results and/or related analysis.','ufTj5zUptG','S1v3qxx81K','8P3ttQ76RN','o18QK@email.com',10,0,0,'2022-03-06 08:57:58','2022-03-06 08:57:58');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sructures`
--

DROP TABLE IF EXISTS `sructures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sructures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sructures`
--

LOCK TABLES `sructures` WRITE;
/*!40000 ALTER TABLE `sructures` DISABLE KEYS */;
INSERT INTO `sructures` VALUES
(1,'Structure','ST','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(2,'Abstracts','AB','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(3,'Introduction Material','IN','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(4,'Programming','PR','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(5,'Terminology','TE','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(6,'Results','RS','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(7,'Conclusions','CO','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(8,'Reflection','RF','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(9,'References','RE','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(10,'Appendix','AP','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(11,'Spelling Mistakes','SP','2022-03-06 08:58:04','2022-03-06 08:58:04'),
(12,'Plagilarism','PL','2022-03-06 08:58:04','2022-03-06 08:58:04');
/*!40000 ALTER TABLE `sructures` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-06 11:08:55
