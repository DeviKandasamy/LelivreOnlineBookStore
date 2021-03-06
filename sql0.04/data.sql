﻿
INSERT INTO PUBLISHER VALUES('WILEY PUBLISHING INC','989 MARKET ST SAN FRANCISCO ,CALIFORNIA');
INSERT INTO PUBLISHER VALUES('HARPER COLLINS PUBLISHERS','10E 53RD STREET,NEW YORK -10022');
SELECT * FROM PUBLISHER;

INSERT INTO BOOK VALUES('ISBN 0-330-28498-3','SO LONG,AND THANKS FOR ALL THE FISH','1984','1','WILEY PUBLISHING INC');
INSERT INTO BOOK VALUES('ISBN 1-58182-008-9','MANASSAS','1999','2','HARPER COLLINS PUBLISHERS');
INSERT INTO BOOK VALUES('ISBN 4-19-830127-1','TRIGUN','1996','3','WILEY PUBLISHING INC');
INSERT INTO BOOK VALUES('ISBN: 978-0-7582-8494-5','A FAMILY AFFAIR','2014','4','HARPER COLLINS PUBLISHERS');
INSERT INTO BOOK VALUES('ISBN 978-606-8126-35-7','INFERNUL','2011','1','WILEY PUBLISHING INC');
INSERT INTO BOOK VALUES('ISBN 93-8011-236-7','NO DOGS PLEASE!','2011','1','HARPER COLLINS PUBLISHERS');
INSERT INTO BOOK VALUES('ISBN 97-8044-4631-0789','TO KILL A MOCKING BIRD','1976','2','HARPER COLLINS PUBLISHERS');
INSERT INTO BOOK VALUES('ISBN 951-0-11369-7','OHARI','1982','3','HARPER COLLINS PUBLISHERS');
INSERT INTO BOOK VALUES('ISBN 978-37186-2-2','THIS LAGOS NAWA','2005','3','WILEY PUBLISHING INC');
INSERT INTO BOOK VALUES('ISBN 964-6194-70-2','MOUNTAINS OF IRAN','2011','1','HARPER COLLINS PUBLISHERS');
SELECT * FROM BOOK;

INSERT INTO CUSTOMER VALUES('barack@gmail.com', 'Barack', ' Hussein', ' Obama', to_date('2011/04/22','yyyy/mm/dd'), 'Horror, Adventure', '#1820, Mathilda Ave, Sunnyvale-98980 ', 'Hussein','barackhusseinobama@gmail.com','ISBN 0-330-28498-3');
INSERT INTO CUSTOMER VALUES('george@gmail.com', 'George', 'Walker', 'Bush', to_date( '1965/10/10','yyyy/mm/dd'), 'Comedy, Fantasy', 'Alabama Bureau, PO Box 4927, AL 36103 ', 'Walker' ,'georgewalkerbush@gmail.com', 'ISBN 4-19-830127-1' );
INSERT INTO CUSTOMER VALUES('william@gmail.com', 'William', 'Jefferson', 'Clinton', to_date('1967/10/5','yyyy/mm/dd'), 'Historical, Horror', 'Alaska Division,PO Box 110801, Juneau, AK 99811', 'Jefferson','williamjeffersonclinton@gmail.com', 'ISBN 93-8011-236-7');
INSERT INTO CUSTOMER VALUES('ronald@gmail.com', 'Ronald', 'Wilson', 'Reagan', to_date('1968/1/7','yyyy/mm/dd'), 'Fantasy, Adventure', '1625 Broadway, Suite 2700 Denver, CO 80202 ', 'Wilson','ronaldwilsonreagan@gmail.com',null );
INSERT INTO CUSTOMER VALUES('george1@gmail.com', 'George', 'Herbert', 'Bush',to_date( '1962/5/17','yyyy/mm/dd'), 'Comedy, Horror', '217 Redwood St, Baltimore, MD 21202 ', 'Herbert' ,'georgeherbertbush@gmail.com',null);
SELECT * FROM CUSTOMER;

INSERT INTO SHOPPINGCART VALUES(000001, '2', '40.0',  '0.2', 'softcopy', 'george@gmail.com', 'ISBN 4-19-830127-1');
INSERT INTO SHOPPINGCART VALUES(000002, '1', '22.0', '0.1', 'harcopy', 'william@gmail.com','ISBN 93-8011-236-7');
INSERT INTO SHOPPINGCART VALUES(000003, '4', '80.0', '0.2', 'ebook', 'george@gmail.com', 'ISBN 978-606-8126-35-7');
INSERT INTO SHOPPINGCART VALUES(000004, '7', '200.0',  '0.0',  'softcopy','ronald@gmail.com', 'ISBN 97-8044-4631-0789');
INSERT INTO SHOPPINGCART VALUES(000005, '2', '50.0',  '0.2',  'harcopy','george1@gmail.com', 'ISBN 93-8011-236-7');
INSERT INTO SHOPPINGCART VALUES(000006, '8', '96.0',  '0.0' , 'ebook','william@gmail.com', 'ISBN 978-606-8126-35-7');
INSERT INTO SHOPPINGCART VALUES(000007, '7', '35.47', '0.0', 'softcopy','william@gmail.com', 'ISBN 4-19-830127-1');
INSERT INTO SHOPPINGCART VALUES(000008, '6', '76.22', '0.0', 'harcopy','george@gmail.com',   'ISBN 93-8011-236-7');
INSERT INTO SHOPPINGCART VALUES(000009, '9', '3.1',  '0.0',  'softcopy', 'ronald@gmail.com',  'ISBN 978-606-8126-35-7');
INSERT INTO SHOPPINGCART VALUES (0000010,'10','40.03', '0.0', 'ebook', 'william@gmail.com', 'ISBN 93-8011-236-7');
INSERT INTO SHOPPINGCART VALUES (0000011,'2', '50.0', '0.2', 'harcopy', 'george1@gmail.com', 'ISBN 93-8011-236-7');
INSERT INTO SHOPPINGCART VALUES (0000012,'2', '50.0', '0.2','softcopy', 'barack@gmail.com', 'ISBN 93-8011-236-7');
INSERT INTO SHOPPINGCART VALUES (0000013,'9', '3.1', '0.0', 'ebook', 'barack@gmail.com', 'ISBN 978-606-8126-35-7');


SELECT * FROM SHOPPINGCART;

INSERT INTO CREDITCARDS VALUES('371449635398431', 'AmericanExpress', to_date('2016/05/2','yyyy/mm/dd'), '217 Redwood St, Baltimore, MD 21202', 'george1@gmail.com');
INSERT INTO CREDITCARDS VALUES('6011111111111117', 'Discover',  to_date('2017/10/6','yyyy/mm/dd'), 'Alaska Division,PO Box 110801, Juneau, AK 99811', 'william@gmail.com');
INSERT INTO CREDITCARDS VALUES('3566002020360505', 'JCB',  to_date('2015/08/22','yyyy/mm/dd'), '1625 Broadway, Suite 2700 Denver, CO 80202', 'ronald@gmail.com');
INSERT INTO CREDITCARDS VALUES('5105105105105100', 'MasterCard',  to_date('2016/12/12','yyyy/mm/dd'),'Alabama Bureau, PO Box 4927, AL 36103', 'george@gmail.com' );
INSERT INTO CREDITCARDS VALUES('4012888888881881', 'Visa',  to_date('2018/02/08','yyyy/mm/dd'), '#1820, Mathilda Ave, Sunnyvale-98980 ' , 'barack@gmail.com');
INSERT INTO CREDITCARDS VALUES('371123455398431', 'Visa', to_date('2016/05/2','yyyy/mm/dd'), '217 Redwood St, Baltimore, MD 21202', 'george1@gmail.com');
INSERT INTO CREDITCARDS VALUES('6011234511111117', 'Visa',  to_date('2017/10/6','yyyy/mm/dd'), 'Alaska Division,PO Box 110801, Juneau, AK 99811', 'william@gmail.com');
INSERT INTO CREDITCARDS VALUES('3566123450360505', 'MasterCard',  to_date('2015/08/22','yyyy/mm/dd'), '1625 Broadway, Suite 2700 Denver, CO 80202', 'ronald@gmail.com');
INSERT INTO CREDITCARDS VALUES('5105123455105100', 'Discover',  to_date('2016/12/12','yyyy/mm/dd'),'Alabama Bureau, PO Box 4927, AL 36103', 'george@gmail.com' );
INSERT INTO CREDITCARDS VALUES('4012123123451881', 'AmericanExpress',  to_date('2018/02/08','yyyy/mm/dd'), '#1820, Mathilda Ave, Sunnyvale-98980 ' , 'barack@gmail.com');
INSERT INTO CREDITCARDS VALUES('3566123450123456', 'Discover',  to_date('2015/08/22','yyyy/mm/dd'), '1625 Broadway, Suite 2700 Denver, CO 80202', 'ronald@gmail.com');
INSERT INTO CREDITCARDS VALUES('5105123455112345', 'JCB',  to_date('2016/12/12','yyyy/mm/dd'),'Alabama Bureau, PO Box 4927, AL 36103', 'george@gmail.com' );
INSERT INTO CREDITCARDS VALUES('4012123458812345', 'JCB',  to_date('2018/02/08','yyyy/mm/dd'), '#1820, Mathilda Ave, Sunnyvale-98980 ' , 'barack@gmail.com');

SELECT * FROM CREDITCARDS;

INSERT INTO TRANSACTION VALUES('000001', 'george@gmail.com', to_date('2014/01/01','yyyy/mm/dd'), '86','5105105105105100');
INSERT INTO TRANSACTION VALUES('000002', 'william@gmail.com',to_date('2014/02/01','yyyy/mm/dd'),'25.3','6011111111111117');
INSERT INTO TRANSACTION VALUES('000003','george@gmail.com', to_date('2014/03/01','yyyy/mm/dd'),'332','5105105105105100');
INSERT INTO TRANSACTION VALUES('000004','ronald@gmail.com', to_date('2014/03/01','yyyy/mm/dd'),'142','3566002020360505');
INSERT INTO TRANSACTION VALUES('000005','george1@gmail.com', to_date('2014/04/01','yyyy/mm/dd'),'107.5','371449635398431');
INSERT INTO TRANSACTION VALUES('000006','william@gmail.com',to_date('2014/01/02','yyyy/mm/dd'),' 777.6','6011111111111117');
INSERT INTO TRANSACTION VALUES('000007','william@gmail.com',to_date('2014/01/04','yyyy/mm/dd'),'251.837','6011111111111117');
INSERT INTO TRANSACTION VALUES('000008','george@gmail.com',to_date('2014/02/21','yyyy/mm/dd'),'464.92','5105105105105100');
INSERT INTO TRANSACTION VALUES('000009','ronald@gmail.com', to_date('2014/03/01','yyyy/mm/dd'),'28.21','3566002020360505');
INSERT INTO TRANSACTION VALUES('0000010','william@gmail.com',to_date('2014/04/05','yyyy/mm/dd'),'404.303','6011111111111117');
INSERT INTO TRANSACTION VALUES('0000011','george1@gmail.com', to_date('2014/04/08','yyyy/mm/dd'),'107.5','371449635398431');
INSERT INTO TRANSACTION VALUES('000012','barack@gmail.com', to_date('2014/04/24','yyyy/mm/dd'),'107.5','4012888888881881');
INSERT INTO TRANSACTION VALUES('000013','barack@gmail.com', to_date('2014/04/19','yyyy/mm/dd'),'251.837','4012888888881881');
SELECT * FROM TRANSACTION;
 
INSERT INTO TRANSACTION_BOOKLOG VALUES('000001', 'ISBN 4-19-830127-1', 'softcopy', '2');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000002', 'ISBN 93-8011-236-7','hardcopy','3');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000003', 'ISBN 978-606-8126-35-7','ebook','4');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000004', 'ISBN 978-606-8126-35-7','softcopy', '2');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000005', 'ISBN 93-8011-236-7','hardcopy','3');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000006', 'ISBN 978-606-8126-35-7','ebook','4');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000005', 'ISBN 978-606-8126-35-7','softcopy', '2');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000004', 'ISBN 93-8011-236-7','hardcopy','3');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000001', 'ISBN 978-606-8126-35-7','ebook','4');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000007', 'ISBN 4-19-830127-1','softcopy', '2');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000008', 'ISBN 93-8011-236-7','hardcopy','3');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000009', 'ISBN 978-606-8126-35-7','ebook','4');
INSERT INTO TRANSACTION_BOOKLOG VALUES('0000010', 'ISBN 93-8011-236-7','softcopy', '2');
INSERT INTO TRANSACTION_BOOKLOG VALUES('0000011', 'ISBN 93-8011-236-7','hardcopy','3');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000012', 'ISBN 93-8011-236-7','ebook','4');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000013', 'ISBN 4-19-830127-1','softcopy', '2');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000013', 'ISBN 93-8011-236-7','hardcopy','3');
INSERT INTO TRANSACTION_BOOKLOG VALUES('000012', 'ISBN 4-19-830127-1','ebook','4');

INSERT INTO AUTHOR VALUES ('DOUGLAS','S' ,'ADAMS','1958/03/12','UNITED KINGDOM',
'Once at Cambridge he tried to join the Footlights, the undergraduate comedy society that would launch the careers of the greatest British actors and comedians (Monty Python for example)');
INSERT INTO AUTHOR VALUES ('JAMES','Z', 'REASONER', '1953/06/05','TEXAS',
'is the author of more than 150 books and many short stories in a career spanning more than thirty years. Reasoner has used at least nineteen pseudonyms, in addition to his own name,Since most of Reason books were written as part of various existing Western fiction series, many of his pseudonymswere publishing house names that may have been used by other authors who contributed to those series');
INSERT INTO AUTHOR VALUES ('Yasuhiro','G','Nightow','1967/04/08','YOKOHAMA',
' is a Japanese manga artist and game creator who created the anime and manga Trigun.Before the release of the popular manga, Trigun, Nightow studied social science and then majored in media studies.');
INSERT INTO AUTHOR VALUES('Mary','J','Campisi','1975/03/09','SICILY',
'As a child, I can still remember crowding around our black anD white television with my brothers and sister, anxiously awaiting the annual Wizard of Oz movie');
INSERT INTO AUTHOR VALUES('LEONARD','V','ANCUTA','1974/12/02','ROMANIA',
'After graduating from high school Gib Mihaescu theory in 1993, in Bucharest final moves where meet street life and nightlife smoke. A shared experience that often in his writings. Meanwhile attending several colleges, which are not complete');
INSERT INTO AUTHOR VALUES('Dheera','B','Kitchlu','1972/04/09','PUNJAB',
'My Workshop of Whimsy was created to share my interests, creations and more. First there are my writings which can be thoroughly examined on the WRITING page. These include books, mainly for children, several of which are in print and many still in the writing');
INSERT INTO AUTHOR VALUES ('Harper','F','lee','1960/04/11','TENNESSEE',
'To Kill a Mockingbird is a novel by Harper Lee published in 1960.It was immediately successful, winning the Pulitzer Prize, and has become a classic of modern American literature');
INSERT INTO AUTHOR VALUES('Sinikka','R','Laine','1945/10/17','GREECE',
'inikka Laine-Törmänen is a Finnish author primarily of Young-adult fiction. Her first novel Ohari was published in 1982. Laine has won many literary awards');
INSERT INTO AUTHOR VALUES('Jeff','K','Unaegbu','1975/09/11','SOUTHAFRICA',
'He is a Nigerian writer, actor, artist and documentary film maker, the author of eight books.Unaegbu became an Executive Officer of the Lagos State Council of Tradesmen and Artisans in the Ministry of Commerce at Alausa, Ikeja');
INSERT INTO AUTHOR VALUES('Nasrollah','H','Kasraian','1944/06/08','IRAN',
'A graduate in law from Tehran University, Nasrollah Kasraian has been engaged in photography since 1966. The Kasraian family is an influential Iranian family');
SELECT * FROM AUTHOR;

INSERT INTO RATING VALUES ('000001','4','GOOD READ, KEEPS YOU OCCUPIED THROUGHOUT THE READ, WOULD HAVE GIVEN 5 STARS IF THE LANGUAGE WAS EASIER TO UNDERSTAND',null,null,null,'ISBN 97-8044-4631-0789','ronald@gmail.com');
INSERT INTO RATING VALUES ('000002','3','AVERAGE READ CAN DO BETTER NEXT TIME','Sinikka','R','Laine',NULL,'george@gmail.com');
INSERT INTO RATING VALUES ('000003','5', null, null,null,null, 'ISBN 4-19-830127-1','george@gmail.com');
INSERT INTO RATING VALUES ('000004','2','EXCELLENT READ.COULD NOT PUT DOWN THE BOOK UNTIL IT WAS FINISHED.THE LANGUAGE IS ALSO EXCELLENT', 'Yasuhiro','G','Nightow', null,'william@gmail.com');
INSERT INTO RATING VALUES ('000005','4','GOOD READ, KEEPS YOU OCCUPIED THROUGHOUT THE READ, WOULD HAVE GIVEN 5 STARS IF THE LANGUAGE WAS EASIER TO UNDERSTAND',null,null,null,'ISBN: 978-0-7582-8494-5','ronald@gmail.com');
INSERT INTO RATING VALUES ('000006','3','AVERAGE READ CAN DO BETTER NEXT TIME',null,null,null,'ISBN 978-606-8126-35-7','george@gmail.com');
INSERT INTO RATING VALUES ('000007','5', null, null,null,null, 'ISBN 4-19-830127-1','george@gmail.com');
INSERT INTO RATING VALUES ('000008','1','EXCELLENT READ.COULD NOT PUT DOWN THE BOOK UNTIL IT WAS FINISHED.THE LANGUAGE IS ALSO EXCELLENT', 'Yasuhiro','G','Nightow', null,'william@gmail.com');
INSERT INTO RATING VALUES ('000009','2','THE AUTHOR SINGS LIKE A POEM . BEAUTIFULLY ILLUSTRATED', 'Yasuhiro','G','Nightow', null,'george1@gmail.com');
INSERT INTO RATING VALUES ('0000011','3','ONE OF THE BEST BOOK OF ITS TIMES..PUTS ON YOUR THINKING CAP',NULL,NULL,NULL,'ISBN 97-8044-4631-0789','barack@gmail.com');
INSERT INTO RATING VALUES ('0000012','4','GREATEST AND KNOWLEDGEABLE BUNCH OF PAGES OF ALL TIMES.',NULL,NULL,NULL,'ISBN 951-0-11369-7','barack@gmail.com');
INSERT INTO RATING VALUES ('0000013','3','THRILLING AND EXCELLENT.BUT MAKES FOR A DIFFICULT READ',NULL,NULL,NULL,'ISBN 964-6194-70-2','barack@gmail.com');
INSERT INTO RATING VALUES ('0000014','4','THRILLING AND EXCELLENT.BUT MAKES FOR A DIFFICULT READ','DOUGLAS','S' ,'ADAMS',NULL,'barack@gmail.com');
INSERT INTO RATING VALUES ('0000015','2','MEDIOCRE. HAD LARGE EXPECTATIONS BUT THE BOOK HAS LET ME DOWN',NULL,NULL,NULL,'ISBN 978-606-8126-35-7' ,'william@gmail.com');
INSERT INTO RATING VALUES ('0000016','2','Lelivre SELLS ONLY GOOD BOOKS I THOUGHT. DISAPPOINTED.','Mary','J','Campisi',NULL ,'william@gmail.com');
INSERT INTO RATING VALUES ('0000017','2','MEDIOCRE. HAD LARGE EXPECTATIONS BUT THE BOOK HAS LET ME DOWN',NULL,NULL,NULL,'ISBN 0-330-28498-3' ,'william@gmail.com');
INSERT INTO RATING VALUES ('0000018','4','MAKES FOR A SURPRISINGLY GOOD READ',NULL,NULL,NULL,'ISBN 4-19-830127-1' ,'william@gmail.com');
INSERT INTO RATING VALUES ('0000019','5','DEFINITELY ONE OF THE BOOKS ON YOUR BUCKET LIST. HIGHLY RECOMMEND IT',null,null,null,'ISBN 0-330-28498-3','ronald@gmail.com');
INSERT INTO RATING VALUES ('0000020','5','SPECTACULAR AND AMAZING. FINISHED TILL THE END IN ONE BREATH','Nasrollah','H','Kasraian',NULL,'ronald@gmail.com');
INSERT INTO RATING VALUES ('0000021','3','JUST ANOTHER BOOK ON THE SHELVES', NULL,NULL,NULL,'ISBN 93-8011-236-7','george1@gmail.com');
INSERT INTO RATING VALUES ('000022','4','NEW MEANING TO THE WORD DETAIL ORIENTED. AWESOME', NULL,NULL,NULL,'ISBN 97-8044-4631-0789','george1@gmail.com');
INSERT INTO RATING VALUES ('000023','5','ONE OF THE MUST READ BOOK OF OUR TIMES', NULL ,NULL,NULL,'ISBN: 978-0-7582-8494-5','george1@gmail.com');

SELECT * FROM RATING;

INSERT INTO HARDCOPY VALUES ('35.3','ISBN 0-330-28498-3');
INSERT INTO HARDCOPY VALUES ('40.5','ISBN 1-58182-008-9');
INSERT INTO HARDCOPY VALUES ('60.5','ISBN 4-19-830127-1');
INSERT INTO HARDCOPY VALUES ('40.5','ISBN: 978-0-7582-8494-5');
INSERT INTO HARDCOPY VALUES ('60.5','ISBN 978-606-8126-35-7');
INSERT INTO HARDCOPY VALUES ('35.3','ISBN 93-8011-236-7');
INSERT INTO HARDCOPY VALUES ('40.5','ISBN 97-8044-4631-0789');
INSERT INTO HARDCOPY VALUES ('60.5','ISBN 951-0-11369-7');
INSERT INTO HARDCOPY VALUES ('60.5','ISBN 978-37186-2-2');
INSERT INTO HARDCOPY VALUES ('35.3','ISBN 964-6194-70-2');
SELECT * FROM HARDCOPY;

INSERT INTO SOFTCOPY VALUES ('30.5','ISBN 0-330-28498-3');
INSERT INTO SOFTCOPY VALUES ('35.5','ISBN 1-58182-008-9');
INSERT INTO  SOFTCOPY VALUES ('40.5','ISBN 4-19-830127-1');
INSERT INTO SOFTCOPY VALUES ('30.5','ISBN: 978-0-7582-8494-5');
INSERT INTO SOFTCOPY VALUES ('35.5','ISBN 978-606-8126-35-7');
INSERT INTO  SOFTCOPY VALUES ('40.5','ISBN 93-8011-236-7');
INSERT INTO SOFTCOPY VALUES ('30.5','ISBN 97-8044-4631-0789');
INSERT INTO SOFTCOPY VALUES ('35.5','ISBN 951-0-11369-7');
INSERT INTO  SOFTCOPY VALUES ('40.5','ISBN 978-37186-2-2');
INSERT INTO  SOFTCOPY VALUES ('40.5','ISBN 964-6194-70-2');
SELECT * FROM SOFTCOPY;

INSERT INTO EBOOK VALUES( '25.67','ISBN 0-330-28498-3');
INSERT INTO EBOOK  VALUES ('20.5','ISBN 1-58182-008-9');
INSERT INTO EBOOK  VALUES ('25.5','ISBN 4-19-830127-1');
INSERT INTO EBOOK  VALUES ('30.5','ISBN: 978-0-7582-8494-5');
INSERT INTO EBOOK VALUES( '25.67','ISBN 978-606-8126-35-7');
INSERT INTO EBOOK  VALUES ('20.5','ISBN 93-8011-236-7');
INSERT INTO EBOOK  VALUES ('25.5','ISBN 97-8044-4631-0789');
INSERT INTO EBOOK  VALUES ('30.5','ISBN 951-0-11369-7');
INSERT INTO EBOOK VALUES( '25.67','ISBN 978-37186-2-2');
INSERT INTO EBOOK  VALUES ('20.5','ISBN 964-6194-70-2');

INSERT INTO GENRE VALUES ('THRILLER','ISBN 0-330-28498-3');
INSERT INTO GENRE VALUES ('ACTION','ISBN 1-58182-008-9');
INSERT INTO GENRE VALUES ('COMEDY','ISBN 4-19-830127-1');
INSERT INTO GENRE VALUES ('COMEDY','ISBN: 978-0-7582-8494-5');
INSERT INTO GENRE VALUES ('SUSPENSE','ISBN 978-606-8126-35-7');
INSERT INTO GENRE VALUES ('ACTION','ISBN 93-8011-236-7');
INSERT INTO GENRE VALUES ('DRAMA','ISBN 97-8044-4631-0789');
INSERT INTO GENRE VALUES ('DRAMA','ISBN 951-0-11369-7');
INSERT INTO GENRE VALUES ('THRILLER','ISBN 978-37186-2-2');
INSERT INTO GENRE VALUES ('SUSPENSE','ISBN 964-6194-70-2');
SELECT * FROM GENRE;

INSERT INTO WRITES VALUES ('DOUGLAS','S','ADAMS','ISBN 1-58182-008-9');
INSERT INTO WRITES VALUES ('JAMES','Z','REASONER','ISBN: 978-0-7582-8494-5');
INSERT INTO WRITES VALUES ('Yasuhiro','G','Nightow','ISBN 93-8011-236-7');
INSERT INTO WRITES VALUES ('Mary','J','Campisi','ISBN 0-330-28498-3');
INSERT INTO WRITES VALUES ('LEONARD','V','ANCUTA','ISBN 4-19-830127-1');
INSERT INTO WRITES VALUES ('Dheera','B','Kitchlu','ISBN 0-330-28498-3');
INSERT INTO WRITES VALUES ('Harper','F','lee','ISBN 951-0-11369-7');
INSERT INTO WRITES VALUES ('Sinikka','R','Laine','ISBN 978-37186-2-2');
INSERT INTO WRITES VALUES ('Jeff','K','Unaegbu','ISBN 964-6194-70-2');
INSERT INTO WRITES VALUES ('Nasrollah','H','Kasraian','ISBN 0-330-28498-3');
INSERT INTO WRITES VALUES ('JAMES','Z','REASONER','ISBN 0-330-28498-3');
INSERT INTO WRITES VALUES ('JAMES','Z','REASONER','ISBN 951-0-11369-7');
INSERT INTO WRITES VALUES ('Jeff','K','Unaegbu','ISBN 97-8044-4631-0789');
INSERT INTO WRITES VALUES ('Nasrollah','H','Kasraian','ISBN 978-606-8126-35-7');
INSERT INTO WRITES VALUES ('JAMES','Z','REASONER','ISBN 97-8044-4631-0789');
INSERT INTO WRITES VALUES ('JAMES','Z','REASONER','ISBN 978-606-8126-35-7');
SELECT * FROM WRITES;






