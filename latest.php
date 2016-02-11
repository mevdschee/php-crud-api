<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.2.4
*/error_reporting(6135);$Jc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Jc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Gh=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Gh)$$X=$Gh;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃþÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ýÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒÞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Þn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1ÌŽs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŽŒFÃ©”vt2ž‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅŽÃžôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PÐ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛÐ889¤È ŽQØýŒî2#8Ð­£’˜6mú²†ðjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ð¼o(Úó¥ÉkÔ7½sàù>Œî†!ÐR\"*nSý\0@P\"Áè’(‹#[¶¥£@g¹oü­’znþ9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ðè!°üë*cì÷>ÎŽ¬E7DñLJ© 1ÊJ=ÓÚÞ1L‚û?Ðs=#`Ê3\$4ì€úÈuÈ±ÌÎzGÑC YAt«?;×QÒk&ÇïYP¿uèåÇ¯}UaHV%G;ƒs¼”<A\0\\¼ÔPÑ\\Âœ&ÂªóV¦ð\n£SUÃtíÅÇrŒêˆÆ2¤	l^íZ6˜ej…Á­³A·dó[ÝsÕ¶ˆJP”ªÊóˆÒŒŠ8è=»ƒ˜à6#Ë‚74*óŸ¨#eÈÀÞ!Õ7{Æ6“¿<oÍCª9v[–MôÅ-`Óõkö>ŽlÙÚ´‹åIªƒHÚ3xú€›äw0t6¾Ã%MR%³½jhÚB˜<´\0ÉAQ<P<:šãu/¤;\\> Ë-¹„ÊˆÍÁQH\nv¡L+vÖÃ¦ì<ï\rèåvàöî¹\\* àÉçÓ´Ý¢gŒnË©¸¹TÐ©2P•\r¨øß‹\"+z 8£ ¶:#€ÊèÃÎ2‹ºJ[i—‚£¨;z˜ûÑô¡rÊ3#¨Ù‰ :ãní\rã½ƒeÙpdÝÝ è2cˆê4²k¿Š£\rG•æE6_²ªÊØÞ‰b‹ž/Œ«HB%ò0ë¢>ÈÈðhoWÃnxlÖ æµƒCQ^€°ÐÔÿßñ\r„Š¾¶4lK{þZÆü:†ÐÜÃƒŸ.¦p¨§Ä‚éJóB-Å+B”´‘(ëTòŸ%®µJ›0ªlØT¶`+É-Á¾@BÚáÛ„Vá’Ä\0ÂÏC¼,ì¯0tâàŒF‡‰å?Ä Ë\na@ÉŒ>‚âZEC“ôOŽ-æ›¤^Q€&ßÖù)I)®¤ÄÀR„]\r¡”9”7_ˆ¢\rÉF80µObù	€‘î>ºäý\nRý_ˆÑ8æ‚ØÙ«äov0¤bCA¸F!Ñt—–Äƒ%0”/‘zAYO(4«‹¡ˆ¨Ò	'Ÿ] Iéí8hHÂ05˜3ò@x&nˆ’|TÓ³³)`.“s6eY˜D¦z¸Œ®¥ƒJÑ“ôž.„ñ{GEb¹Ó‹¡˜‹†2Õ×{\$**ý¾@ÝCž-:zYHZIôà5F]¦²YúùCªOêAÂÚó`x'´.*9t'{ÿ(êšwP¶¾ Ñ=¢*‰†ú*üxwråÔ*c‚žÌc|„DŸ“ÚV—–\r†V.‡0âÆ™V¤dˆ?Ò€üê,EÍ`T¦É6Ûˆ-“Åì¾ÅÚŽT[Ñªz©‚.Ar±£Í€Pøºnƒc=aÔ9Fònß!ÙuáÎA©Þƒ0iPó¬”îºJ6eäT]VØ[\rXÌáaŸ–vkõ\n+EˆáÜ•*\0¶~¶Æù@g\"ÌNCI\$àÉŒƒ€êx@WÃy¼*vuDÙ\0ÞvœëŒ†V\0èV`Gç½uµE®Ö•ÂÁf“l˜h’@ï)0@šT•°7‹íÛÂ§RAÊÙ·ò´3Û˜Ð«/QÇ]ª,sÖ{VRž±¡ŽöF«¡A˜„<¨v×¥î´%@9‚ÀF¢Õ5t‰%Ö+º/¢8;¾WÑäÚÇJïÐo:ÖNÿ`ø	•ÿš´hìÁ{Ü£•î ËÔ8ÔEuª&°W|É†„‰®Uú&\r\"ÔÁ»‰|-uÇ†…Në¶:nc²©fV­‹ÂÃè#U20å>\"®²Ç>Ì`œk]î-¯ÇxùSØÍ‡Ð¢©‰‚êcâ¡óB’—}Ø&`ˆîr+E­“\$œyNýŒ±b,†´´Wx þ-9åÕrÓ,’ü`å+œïíËŠù’CœÓ)˜˜7Ûx\r¬þWµfMŒSR¼\\èz¦ÙQ²Ì“”uA¬ºê2Ž±õ4îL&ËHi Âµ°²¹S\$)e³“æg rÈŒ©ƒ\$]ZëiYs¤õ×kW–n>µ7E1k8ÐdÃró®škÁý¢ëEÞÙÛwÂwcmŽTy¹•ë¿a›\$tx\rB´÷=Šö¢*”<Èƒ l¡fôKœ‘N/¶¼	ÃlÕáükH“õ8 .‘‘ù?f÷›Úÿã6†Ñ‡¼{gi/\"à@–K›ñ@2ãça|#,Z¤±‡	³ñwˆd¬™“²…¼å6w™^&Áêt™çœP±…¥Äù]À¼›.àãÚí¡TìîkroÀ‰÷\ro=—%æ×h`:\0á±‚ö«”|êŠ£«a“Ô®6*:ÍÓ*‡ÊrO-^–’ñén«Íó§MÆ}æ»÷ÆAya±Ý\nƒu^ì–ÀrnO\r±»¡`þT~</ð¶wÄyþ}æ:›|£ÏÐûÖÌ¡6»¤×ø®Ÿvî\rc<·b#ûàô§†î–\$ùsµê|ç‡‡V)«h‹TCùñ(Ä½ñ£Ì]6¦Þ1´!1M±¸@a´/`Û>Ù¸üß£ðÕßÈÛC/ì6à´·#p@pá‘óÿ`Zÿôýchý°\0ïë\0oæ€ð4OýOøi\0-\n«îÿ/ý\0£Dð.ÿ ¾ˆ.“Ä\0fiŒÀÈ«£€˜\0Œ”IDüç\0§¬\rïý0f ßoãÿ€ÊGüˆðeJ|\r€¿ýl	¨3ê~ðiP›¦&“É¿/µ\09	^\0r•0]¯õ ¾Â›oõŽ.ý\"	°ÐÑM¥íðvÿP€ZÐÕmpËP°ùÚœÐÞ¹ïô{§†C?²ÀkŽ“Ï¼}ð®þdöïÊ°~=‘.Ô- é	Ðm1>hûÏÛÐ•1;QI‘OPÈ\rºcßpApV«k\rQ*èQ}ÏçŸq>˜Ðu15BqQ[1fûñl«Â€apå¯ü\0Û‘*ŒJ©Q=ñÃ£Ù‘GÜäŠÕÁ±Ÿ±_ñ—ñbŒGHF.‚0Ôø	= 2P™Àó æòÏçP!ò#(3 \nÙ!1&72fª`Â/å\0°‡\"PÁUõ\$ñ\r0Ìð,QrU&2fšÒ_²Xààò]ð9\"’S'òƒ'²yð8\r¨ú§òkW)Oõ)’*Ra%ã\\i—%ò‰&Ò³+r…’3ðS`…,ñvý¦&2×L–&Pu*›-ð˜0\"Á%HÄ¬ÔžïÏ@Ø“±°H‰B–P(ÃÉ\$p&ý,1MÂ ªØ­Ã®;\rnÁ.¯Ê I­.Õ',1ò)Ó4ý²å2°u+ó3æ `ÈSŽŠpL\nt§’_*²S3;6r'h35¤55äœ‹d2q+6ñ8‘O7sC\"pm8Ò­³“6³—9òm\n@e0É<8B8©<,( ¨8²Û\0è	Ó0šJÙ<@¦ÐI¤«ÀR6pÔ­mGË\"11¤6ËÐ.\"æÀ‚ï5Ì‚ûÇ:àÜ8bêA1±;ƒ';Â?<*\$È,³Ìo= òTÓÖ/3Û#«ºÒ†¬");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n0›†S‘Øa9œÅS`°Çˆ“Œ&Ó(°Ên0˜†QIìÒf‰›\$±At^ sG²Étf6eŒ§yŒÊ()LäSÁÀP'…ÂáÌR'Ífq]\"˜s>	)â‘`œH2ŠEq9ˆÊ?ˆ*)‰”t'°ŽÏ§Ø\n	\ræs<ŒPi2INÆ*(=2ÌgXá¸è.3™N„Y4èB<’L—üîi©Ì¥2Ý´z=š0HøžÐ'·êŒšÃuÆtt:œÂ¡Èêe¹]`pX9ŒÞo5šgòóIœÜ,2O4ãÞÑ…MÆS¸(ˆa…Š#¾Äàç’ïø|¹G‚bèôüxœ^Z[Çä™G¼ÎuTvª(Òm@Vò¸(†¼ÈbN<ŠÈ`æâXä1É+Œä9J8Â2\r£K¶9ðhå	 Áè`…‹ÆëI8ä›±S±ãt÷2ƒ+,£ÆIºã £pæ9m@Ð:ƒ€æáxï)…ÐüC…Ãxä3…ñ4P7áü-4Çr\"p3Fhà…-5ƒ”U4Í‰¸\\6°ƒ<D\$®l—9ÍR4t7ƒdD3µpÞÎ“kÌ:)\\;° ÐÔð\r@Žt…\$4O£<þ†!pdÇÔÚQJ\rÌHî}:&Œ¨ˆÂÈ„Á5YWJ­˜‹±Â`ÓN£èbKNSÉÀÉa§Ž•ƒ´d>2WñÅ…bDj:9[21c„»È€:Xé@ËqË#“›4íL™'J”©+DHeÒ3¬.«O ÇKË°“ˆ…pV…át2Œwp;Æ“…íÿ\r?èOzDq.ª°Ð-†\"ìZñ®cèX3!/>PúFìsØÉ²±Ã0Í(òóˆ°Ê£€àŒ‚T63sVQo¸€SÎ‘ b²ß…^r\$É@C© r2)©Œ£ “VÀ)+nÜ·zÃÁúålÚè{³K#…À9‹{†Û¯lÀºìmÐQ¨ëh»*É—PÄ:¡c˜]´7ãàø=¡LŸŒi;”2û¿§­ÜÒ<\\Jí¤Øb¥n”…ƒ¥nÁ_iÓ´îJ\n†¢¨âòŽõC:ª„‘`N4¶Ì–È'Aw:4}ÊÛ£ÁW\080‘ÇL3õÊJ;èiú)\\„=/NŠu=ZV6&ceaè±ÂpÞÖ.[ëvŠtPZÞèX`Ö”õŒ+zú'¦ê9½.\$\$…Ó@\n\ré]_ïÙ®¢Âh¨kk¬Ms>`Ì–ƒj¹%\\9Ð¶ÆÔ('°jAˆ>BCd\"K\$	CAÆ ä„¤.Â².`‰â.EÑæ´–ÌÃyy\0‹D2Ï8t	Ð6†Ã8¬FL«´×ÞíâŒB*¬ð,Ò|\nx\\@ °@¸Ø3r ¬­ðÎWKQb,%…¯´DBfØÈ³D|ÍŒËE0/2>£Y!Ä†'õ™`æf™mHº<BãB0\r*\0Gxò‰nêY4‚¶¾Œ,žL²©º–öÅ%SÆ,ýv‡0ê‘–XòQÄ1†HId`‡!.ÔVÊ›H/ÅúÃ—ÀHãù0ÆUÁ¸0Â™©Ž`îLI©8ÖÃkŠ”2Œ4JYNÅ&8xä¥JØk:AKã¡nWØ!¦¿Iï;'ô³\":2ðê‹4Í~óJ„8ô£á’‘¨âG‡™\"MÊ=\rZ'ŽnÇi9F§œ“™rÆ’RÊt‚3\0Ÿ”Ò²Â2µy‚B^òèb'´ÒzÈÉ²(­#”d9Itµ&WØjNa¨ÚC(¥ j”Ä–?h‰ÂØj†¡™©Ö„Z\$0«¡Ò¯´J	A_\n†!TOó4Œ<{aôú?˜æo ú‚-¹–ÃÏ?Hlÿ\"2ƒy™=Úë¨ž R©ðœÑ„àš°–ÍŠëP&åG›ÀÁ4ƒË%()¤\r5Mª‚‰ÓLTí\0ÀºxBIç=ltvÄ2Jhvû´~/:èpý×:8\"Ð´5¡«‰0î#Ž*ì7ªøúÜ\nàq×>è¡G\$°â…):	ƒ»\"ù#ë¦KfI‡!vö+?{¡Íÿ¾Qg¥{ÏR÷Q øCäªŽ}Õ#¸éiIbgà„ÔXàÄÃÂù}ÅË`‹}3—%@îÁ{_kø}0ä±þÈ—Öp !°aï—<7«e•‰ÖF‡?¦¸¡î½XüDù­Ñ, ØÊCk‰ƒíU™ØL>£1‹§ÜÜ‡¥ã‡Œp0Ž#Ä\$²ÅâV)pYs5A˜:°ÊUÈ(9…5×™,F+&Ÿ*{âŒ-£Íìç:÷Ší :7¦þ:Ê™yPãè—´ŠÀXÏ+¤Ž’\nÞI;üþ\\s„÷Pà÷1‘‘ìÈr©¦NJËAT'-£”òk?ƒÙY@“¡Ïö±fÇÍbñŽ’”RîJÏiömÖB~ò©”K\rK«œtª4à÷;OŠKc”9%Hì5àÍd¢3ÙÀe8j¿P÷±[sð™9,ƒÄ˜—bzK‰µÁòW&e¢d8­ú§)Äùé5•pí˜hù°ëéÃà¹\"0hL5\0˜7 æÚŒÚ‡Ÿ{ïÀÝ¿¸Ýðî´<åk‚²\r+üXÅblåè/ØX ìAC¨s\na¤‘l÷Çí°}·~Ý´— drx(\rè3ÎnGrÃTÄ+àQÏÁJ¹éï†PÌ\nØ'?À€Ä´n~º:· µòâQà8€»¦†`{ÙaÜÊ æ4:„ôLê:Ò öð§›ÉÜuMó„®ßŽM¯IÁ…,†`ÍBgN€¯Âÿ\rBº•\r\0ûÂoé\"¼/‡2^D2)n¸\razR\$à7¢`ÍØ¹¨äèL³p®*Ò{`Oqt–z%%éHg§¹¦ 0¸…ÍKÃf&Ì)\\ÐQW¦öù‡†\0dp¾Ü<Q\"è„c”ÑÏ'ÿ/ÃQ7>¾+ù¿j#\0åîÈºÐ‘_ðÈôk3ëJº(óÜê%OêŒ£\0³Tm4³k:lÊž¤mD\$°¦¬×\0éê´èº'¢~à¶ Z@º€¶ŒàVâº€L\"ãHjnæ¾5€ðNlŠŽÌþþ‹šfj&›Mí•OüÓdbÓ°RÓð´OdiiÞNÐ(¿%-4+Ð:HpR¦§?BàM0š¶JF¢.ÚòÏ1Mö»f~U¬Tê°ŠÒlË 0…þËÀòUÅÂ|âÀÐ‚@òˆX4àbgè ]Pè?@z `…â<ðÐRîÔú`úí-¸þF˜ÎI\0Ñåþã¬¦|Ðž…ð¸ê¸Å¬TkQk°F@0Lõì˜Pƒ\rÀšˆ#ÎuØÍËïàÜ²pXÿ^Ñ±ap\0\r y´Pt%\0^8ÆÒ\r¤Àµ‘Šk©£\0Ç¡1“\n¢dñ…â B± §.\níQjq\$\rMË¾F£ê®oî²êî(ï¸‰ [‘ .#>¦ð¬Q„`Y`íMÑÊ,ÿJ†ñí\n<³‘uÑzÔ+I ÒÃ!)Üï+ØtñìÅŠ¼Åâºÿ¯lÆœm\"\"17\"jÀ0#N±m– ÂÙ¢æ–O pRÂK#ŒRÅç7#C´&ãÉ!2\$ÅÒ>†Ïœ”CÞ.R\"Ír‚ã\"PÈyË°7¨\rçÜ¼¤s)Õ%Ð#‡U\rOÄEÐ€Ôøî«Æy”xCt@Ð¿¨û*HàÇ é+@ÀàÈ0Õ\r’˜‡I‚¡ŽìL²¸²˜‚ˆ/ \\\rNR\r\0¨@+û\$Š©/*w0ËS\nt¢\"ä–\0ær‘/¬ÃPøÃðí\0ù3L¿°í%rïRÈ2R*º+÷0Ó\"¿-¾3N1âD7(tb’ê/@Ý12º†M6â†¬dÈ(á“c7‹*–Épãl8²„å(t·0ÚKpÚ2Ù-ÐæÇðÞFbîƒ\$¼Røï(/ó+2îã,Ì²ËlºËï8¬Ïø–éróK!ç©6\"»Sa0bxÓà¾\$O\0\re‰ ¨\r\"8ˆ'‘ót³Œ\r³ù+£Pá@Y1°£Yb”Râ¹°Ú\\jK)÷438 hÌ1ó7 z`pðRŽR“CÒñBöîô<»Åöõ…”F	4çDtJ-¶tVå©D6\0NLåTå”v_â0ó‹\"qJ†ëIÅ•è*Ì.ô¾«àqÂR|´¯HÀÎ t]>ˆ\0€OL(#énŽ.®2Bn9Jm‘@R s2|”Úh”ÞtãNn6B“cO+âšÒ†È e­¤ÊåÐËBO=,ÀÀC:Ô6ô:¸M<àä—BV\\`¦/BŒïÚ§Û,w:‘H°Í¸û2xpšM„nbn«¢Õ„‹0†ÎÕ	1Ö,4µV§#& lËâ×ÍjKCš\n‰gÍâl\rè¶IcY@ÏY‰h–3Û\nU’]@Î	 ÂÔ\rLÕdñ\\Bœ ú–\"t\r¯p'\nå‡'àO\\©ÆRÐ˜Ö³Ú5øáS†¤b%§[•¬\$‚LÕuó`5—Y®òÕu©[ÕÌÔ\0|EMh—µË\\)É\\u¶9¶bÉH.e@\r€à!Åe'µVPä¶C'c\"úf(RÅ‡&#~À–\\qHû]Ã{^Âðž¿ög'OÈ<vz‰6lpÕâg'8E–{ô*­/¹UÖVû‰¤þ­pì¶ýo,ï¸+´Ôþ)X¯ëk.ÿ0`ÿsðÓ0h“r“°o^²œð¦†°ŸB\"åjçOk-õ§%Æ0Æü“gÒxú+Ø Õ[àP7\"*hPP„\rc <ø[`æëV¢ â7å:`‹˜Uà°à(–I¢ƒs*dã¶;·>	—BGsG t:À‚8d\0ž@ÔjwLvj —ow7v bŽ	¨püàæñÃu-þ\n€ , u:)âÕ\"ut…:îWB<S†b1ñò2éC×²S·¸d†%)rÀ÷pÕ¿{cpqMú!þà#P‘ì·#@ E}c\"@|d%kr£\"* xñí€ w}×´uWâ¦Âl&X~S‚B'uà@6ChÂº..ÚØ'Ø+@ÊêÓƒƒ[T÷¬1àßæþb\"Ð\n\0ž\n`©I\0Ž¸n+—/Æ\"lW1uÆ´—Z¦DøCâ(è€1Äp¶wÐ¼…®Ä À^\0ZJ`î¨b·#ãŒ5€É„«ˆH“ˆ¥;ˆäâ(à°¸Ì!`È¯#^Â»y…ß§ƒ…¨VGrß|Â_ïµpGåe‚QŒjd'2I-÷áÀh¤ ^Àda)×…:HØH)Ä5q·X‚¦FQ_·Û{8)~N~Ž\"`™\$1øøå ”ùàñ³‚ßB_‚üàå€ ñÏN^¥h[˜Nø(”+‚ÃM„wÏ™P€'pŒ65b?ƒÑ´â†ù“y&<åZTãq,9Op¹@2M¾‰ØzÄ•Pq4`eo¥”é¤b\"fmŽvùX@…c9a0Çw Db ø~úˆ”‰ˆW\"u@·J‡rŠi8È0øè0—ü#³}7+ž€¶ok¾@³öœ\n)lÑr³Êý%vÚÜ‡Ë!¬®Õân{‚XYw*,Íìb™«‚F€^\r1Œy5šðBYùÕœ#w:3&jÙB©îÀàð„fY`Þ“— ù§BI§š|l¨0òÇÓ«ãO£r[rEa0bÉ‹àÊ\n ¤	(€\r¹öGFžª@Ø¼ÃúÙ­Àß® 1ÓÄÐ“S¢Âs+£X‡´%@u¨g9zfSž†#0 ÞDBŽÍ _wÂé¯EÀÕ Bî>š{§ó÷*@Ð}kã²÷È½à¸à\\P’,\"ª-rCÉrVäæY×·žžZ\rœ÷É[ùS}\0YŸ%kŸcÏ–2ývs\rK¹îÈOÅT@èçs›Ê!Èü2ÑÒcwË’­ívÇºÔ,4&™rxrÒØ‡ì~€È#Ì\"¿€Xã\rÎ];SF²½Fî‡<ta/­ƒMé&ìU>ìÿ5s ¿ÀSÀçÿ>Æ6¿ì¬U{öåËp!\"yô7M’me÷Z„D!*vÅwæWê	‰û0Êw0ÇŒ1Š|H\$&Ô‰+{ÃìGRH!rÔ-ù24‘lµ¦\rÐå\r™\0ãÞÊt<Æ…Æ·fè:“DSÀdúeQóÑ\r\\¶aò°Ëç¹EôbGŽÏà„m äg¢x-T’¶ÅGÅYKÆ¢‡tp0®?ž¦Frx	ï2\\òVãÁ2;'\nÂ€‡Á+ù‰b1ÝÎDG–5´—¯l'(ó¥/[Å,N÷Á(nG8óÀb€XQ* àÁ-R¿–¢¹¤\n4q#[Uš<eƒÔÄ`æ&&Õoë@î›uÒ%â5\0¸ `\0‚E}#lÊ¨Uäx%m‡Y&P®bÍ•«.ëÏÏ¡Û1<jnÇÇƒÜ\nV~o´Nïp\n€Þã\$EÀ&Ô#íÞ%G\0²þ=¼ ekÝÒ–QŠCÂ<}ö]ÔA½Ù-Yb;à¸†¥[ÝÚüþ žU¤YßcÇÏ~¿šT.\\Å<Wn\\oPÀÅüÞqÆ‰6P\nsàã`‘º„ü¦c:–3›([ÅÀzX¨ÙÙ{ Pì\\Èç‚«²€W®ãY¯:ß®:ýä#®¥½ž9´èYê¹[¹Yút&lç9kÞ±ŸY_Ò‰bÍ~¡¢&Õvã	ý*1þÍÅ`ÕfÌ8—·S§øV^ÛÜ'åâ¾î›}±»l³Ûz8üØÿÜæ ÂZGbÜÕ_àÓ]„â¢ÄfpJŠ€Z–0Ÿ¥@Vãÿ'žõuö–yÆÌ	€ÞCñR'Nö…—?Yôå–Ök €è\$cöáÎ à=ì¿ní	äYJì>PíRì¢Jð•×]µß.µäì§ƒçÙÚì»};;S­Ç]ãñ@ËÇè:Ââ“­÷I~Û‘•ÙùÒÁ|;¾£FyäÆƒåÀ}`ó/ßã-éí#ä1¥@yõ®7øïÜys}¿\$A¨a\\™<xGÞ•Ö¨BmamZxý3Ž,}Ï:Ð\nÝd9¿‰Î‹ö} HÞÐmµT,/KêÎª (œæìShâ…:Âø°¼Vð,Nµ\\ ïÀø\r€B%¸YŠvãi,•å€pyrrH”ó&ëdL%(ë@L¾Ð5‚’T@1`Ù ¦:”Öî\nc‘,b×O,ìâŠ\"Ô£r(áf’YÓO-°¤ykËàŽ*&ê‰,kä•yIP\n‘”£rpE%ËÌ`àó89žÌ×…¥lëUN6_‘<EªåédL êK!Ÿ—ÄZbÕkñ*‚ºóq©¢‰C\$ÅÇP®¦ÍòäªsHnIÈMÙ(ˆ¯ƒq…ÄD@\"8÷¡\nƒâr–f—èC\rP€pKÆ£à®›Îd–L!Nˆ¸R9¨úcl…i½!a :ÂÒ\rÄ\rPSS—ã„*„…Ì0a ¦,–Ð±d4Q\r3v†¹ì±LˆøÇÊ˜ÁÃ°Gn\"3ñ%QdŸµð­‰)¯i4Ñu•sÁ­ÇˆXÁMP¬‚^«ä5¹O’¥	bépé xyèðÉTqDnBy®CàlÐq\0X“°2ŒE%	dF…‚,7G‹á±& µâRi¨Ž„#ç€‰CV¨ÆNÀÚ\$¢LB!(<€„*1|H\"Eu<ÜãªP0T|sé¾)C(oZ[ÒµSœt»îýùú¢²m•\nnƒð â•à6<ñ›/> “ªÿ'Ó|“#hàÅœ˜6è¦\rñ.=(Ôv±…¥;`\"OøCÜ!âBŠ9ã.B!UEÌDáÄ‚d œ–€)ºKŠ Œ\0Þ» ÆmF~	B{O\0¨Ï©¡¦_éø³u#„–5 =LjÀò7´9 š6­¢î£lCV‘€ŒTpÀÚ08±	1ÄÎx'0@gIw€Zã†@9ÇLáŽŽ\\v\0_(º\".Ð¯A[sÅ„ä€ê7I(azl_„EÐ¦<ñ€“tƒUöë7`tèÒ0ø‹(ßà3”=¦ço\$[Ìh×!¸B¦œ[HîR¶œœ) )nxaZ™#=HË8ðë›¥ ”’%þ@0w5J’–	¸²A\"F:8NŠÏ\"Xù- èÔ­¥?pj@)iUjƒÀ™\$Ìš-EÆ÷”E§´\n/¸œPÓB–P@y8j¾Y¼Kð³9	0ÊH€Ddš&0Œ¡èh“X\$\nÒv=¸‚ê;x\$Ù¤íénƒÔ“rBbl·p‘‘qÖA«¬‘tTæ•r Bû’ƒM€zð9Ç\$ã`e¸ò\$ê\"e˜‘pÚ 4/ŠœP ®°¨6¡Ð’Á0V€U‚žÈNÐ\$™%BÂ°ÖP¤ÁH[MI‚C´z‰2Ê0t\0Å‘s©0£2R…¥lŠ“””ŠK™ˆåm+1ò9‘/¦©•´®NŠ -™´#€]\r9¼Žœ/S{K5IrÐ–e¨Ø¤>Œi2ÇYSaÊK,t¤EHšéÛOò€¯ÂÊ(:\$:&±eeÙt(ÀW2Ú•Ì·a-3KYZ&ö—\0oÃ+ymœ¦Z2ÿ–ðy&/Ù…KvZ“–Ä¸‚}Sð­8ûd&rë˜š¢*‘ú¶Y-¢\rkˆbbz¡<W-9†Œ6‡A(Ø:–¬žK\nªNYHí@Ç”‹ ÐÙ‚ÊÃædÊòH³ ÀÎ~u”]QŽƒFš1+É”’q\0O‘èÛ¢6óùš Î„›#[¬ ŸÄdR‡°öƒ£€]HÂÆ7x¤dS„ÙU†9ÉxdC\$èUX^ÒÄmHœxÿ8@ª¢qpáªQ…˜Wˆ»(§™˜[:À\$, |Xr€(Lá…îà\n^.ÙÐNŠ!£h'°aÜ„@Æ¸¤t™âª`\0cj«üŠ lpÚ#d¹©*™\$á(¬ã†\0;iª¢Ä`À)¬Üæê†M¡íÆnV:0l;œ„Ät„ù\0èš(d `|šy@àðã<\0|W,ýDÕ@ÆògÂ/Œûf¢ª¡N-#€U¬àÆJTaNM/ÓÆ-š)¦¬´a\nåQ®Ÿ1Ca9\$?ìÆ\"„™˜„àÉœMâ{„žæó9¹«Æh3SêHÒKA ”Oø•?ø¾ç.\"\"ÆÐ9%%\r	hq9“'Pé’À{¡\\ò‚æ[€äÈ\$:6óBŽ(ª ²uÀk\rx[ÀBGHz 6cn8ž2\\Ò \nW¥i\rcÿ\nUÌ„\$©;à§{F°Ó„* _\n€§Šâ`ý€®ŽÀ|œ]@Å;P9NÝ#ÆxF}Àˆ¾BF%¸§M4\"æˆ…à0\0f(×3ñ¨ÎôŠŽÀÀ„0„Üê ÉDÙ°ù\$Ò3Y÷pjF†öw+?iiÖØÐŸÅ_\$1‘Ñ)TVÈØ*€'Ú{gš=£qœÕ\"h\0÷:qt®{dÖi“ ð4€´ ;&”ÚÀ^0Qƒ‚œ0›´ë†äZµ¥†oe¥\\`«i ´Ò†žšò®hûMzS<<³”u¥'F\rIöžÍa¨G\\áª€¹P¹\$ÍþõšACj\0öp`2¨xþŠX Zb”°|!fŽªÀç\0ômTlRT­H'Â¥p©… xùT‰NQ¤Å…˜n…Z5Mg£GsxØ”ešèÒDá´Tˆ#³ÑeO	rÊ4ÖUAžP§º!Z}ºw¦ªˆv@Òº…PÆ5UX%2ÐD7“\\UpŸªÍ\\ÊâVšR¨dçÃ!ñ@î†Œ®TÝžt¡ÀPŠ%pÕxüõç²ÑºWŸÅ³ƒ•HXê&Ð‹LpiÈ¤tóEü2:Š4©vŠzˆ©è:ÓÝÉÎ®ˆMÂÖ‹àè3ú»ö*àe?Zßd\0ì0J“L.‹ej- ~Ö†µ3%9þæ›5™ŠÞ›¤p#IÉƒÐ€a%PÐ€ºp¨ˆ¡?ku[âzÕ}‰‹‘tK¢Š¼¼‚·K^A\\Ò«k2x~Vö»€wx5w¥HhéS-pÔµ½•@ÞëpYÙMqò\"™Ñ«F6{à/ˆ‰Ç–Ÿ€¡ó^É˜½|Î­‚2LÓ<“Øá2®\r‚ë†Ú²“W¹3…@+šÓ„N¹[‹>LøÚöjÃ|\\“8°m`S`[\0»XáVÙÎ‚ øaC˜¦ë±,ÎÀ÷`£[ÞÁAÌªjÊ§\\Õ¤Pô¨—-}+Ú}ûÔ Ë'›ë®Qµõ*9S—:p–‚Zã ­HhŽRÁ¬ÍRów®ØýÉeÖ1¢†,†zTšð.Oy²Y—æ£dç¼ÅL.U”a@ŠÆùF)Ù:s¿Y-‰DÈ–­Õ›K°sË#îN2—¡›¬0k\0€Êâ!`^@´áiÆ©­ø¬6Q€PÂµ\0Öj®%ïäDh,Ð<‹<;bŒ³ØÚ¦~\0£#¬\rnT¤³1(–J”öÒ²¸d-=c)dÔÚðNÔ·µ.œ]@4!¨2|™TŸêÈÒ3üWÈÔbûR•³É®ÒBmD‚´¯I\r0À¶¶ÊcÐ¤Ï”àœK%9ý4þÖ-A™›S	n[s¿Í§?utë\nLðÆ5P2Vé']ºá#nÛ|¶ßBä·OC¢YëèW1Ñ[]ÒÅ7\rÊ¶þOpA¶:¦¸D6[¶ÝàU@¶|à9ØÂÄSˆ™ÅŠd°86„t¼?\r²†~ Úa\\v˜–1U1å#p›–=©Ãk™«IÓqäa<\\á…Ü¥B\"@	M±³¶î“ƒ€è™ð7[ä‰6ü„u½\\«q¹!3a˜s†»tIJBöèåîºH.–R{I¼ nïj»ð®ž’[„ŽÄ#•ÀJ®u[ƒšöÛu¹ý1õ”Sì_7E»D®ÈÍIM¶väËæk…NÃÝrk]æêó¸åÖ®ÿFPÉKzðwa =áè·xšO^Eë„ÈXúÈNÀŠºH„ÏÀgXà)Rb;Â^tÐ¬cnÍ0Pœ-²faÖºe¼An‹»–¦ÙP0âÍ÷\"igœ¥HªOpQ‹î–ËÕÞ¶iÎZƒìÉ…Jå*¦›÷¸Õ/„ØYÀ8&ù\nL¾X¡ïš‘û„2­/Ø#wMÒ°Üµi­s¡MMIÊÕ¦R#dmB«|äOó´µõ#ÀY;J[¼ò£¤`ó€DÀ7\0ˆrT†€O OŸ¦+rjÒQÃöÚ˜YµH	Åj°Ï(a’‡£%ñÁðH(ìZ8)š%œ¤Ì<ëè«ž¦šÀùc-«(ºÅTÒq5þ©ª~Õ¸‘€ÔÄ´ §\néœ`m\0:Œ€€W;JNà@±À¤P|`_¶u¹ã Ü	\0¯\n¸ [þ°\\,ãG`ÈQ—úÃuª-Uƒ5’ÏD\nm¥«ymŠŒ7Á‹ì©×ì_É¿V–-…}’¯5jÊˆÐ	×ÀDöÒ†Éo\nUrÕâ5¼êòo¤©ç¢2`ÔÞ\"éE´«>-jw˜†²Ã…Y¯„Fê04/áðvÊZ…~qBâÁ%¸³­›wÈc*tX‰}	À°;R0õ‡Ããª0‡ ˜°AÇúû@âbõá*8ða1 aÓ@øàR˜rÉÐ0Ú„7à¶I`á;yÈ_KÔ†XÏT ÈE)œQûØív6näÃ¾†»\$Ç>%ˆþœC/I8ó\0_ØÌPÞ~éXì=¥%zU‘^¡-™%‘Èb3ó¡j•¤ŠÍf”½E…¯á	&\"IÊÜP£‘ãBäÍ‹{yBßnÇåÀÙÂF:hªÙh;êÒ¸üy1ŠŒ¯22zšÑ­XÐKX?\rg¨±5äFÖ£H¶­lhk Ä\0ŸÏ‡ÔÊMoÂd‚\nWà,Œ3t\nèP8ù°×Yãx®™g\0ûY¥»d«¹-.mêZ‚AZäÜøÙ9?nNÏ¡gŸ­N+Á¬‚Pô–ë”[R/O)SÊTÉ!õ[l¦Û2kYR‘ái2°€œ°Ø;+T@ªËj„” z,9UË×2ÈŠ,³L‡0·î­V&åJ8ŒH[5mPöÊš­¹šëHa“2‘Ù@¾eÐ6„·^ÃÙ	×8VZ3–ªC¼#èbËj[3g1ª…k2&*äENšŒWº2Áy¼ùZØ+×£5[&”ôD›ãä­jL5³Ì9PÇ­˜¥´ç{5¨À@¶w§¬ÓüïeX\$„Ò[ðÂŸWP-±`{ÎƒYÌµF³>QU­+³bëi¹¶½	 ]T\0MéOÉƒg0\r x^@ÔÙp§ú”pÈÎ\\Cgœš_·×BYÎÉÕÃ²x¸2]åÁ2²åÑrÎy¡3ïæ p®Ð!	´Ìü2h%¶]Ðe1ªNb»W_3ùÎ9Oóí= ˜@Ip\0Š€\nçH9cˆš.ÕoLâ\$\0Ê·®€Nb7»,’lx€ËÔV2ù}‹ãÂhÇó5Å³É4°£Öß:yªšÞcIN6i¿\r!´\"Êº­ô\\\\­æY9·ÌÐô§™è‰ ›4ZmÄ›ë¾í~W¾ó,5 áëD=äÍoeÑÆ‚+›]A¡+P³/„€h(ÔÓåóY¼!Þx‰ž'öçýùÃª%¦Å¢j³%±fá|…å‘J4¡UÈƒ¤Ò!ŒOôòI³ªÕâ‚ãœK«JXÑ˜àTVàdJ‹¡ùïYZÔnµˆTèR–QÍºGÖÜÐÔŽP:@R,ZÅCå5Ô9 ½>˜ôˆÈocíe:ù	\r ·ˆ1ø×T\n\0D\0Š\0'„	Ú>p,,À<Ñô„Ä°Î—\$79=<(z/@¿À±ÀÕý±\"èk\"Š©°Ñò€í¨zwÖc§@Ä´ñ@;µNËîà,ßÌ|Ì¾P#ñš4­Š‡bÂ>=À¸ŠJ)`ðYæó–Â§Ùê¢wA„ŒËŠ=°i”ï0ÄPâ>t¨¶©µg|\0µþ{[l­RS½†ê:¼èÿ?Ž‹ &Y¬iÌ“‰*Ó´¹Ò!¦§º1¢	ö\"Ú:—~ä4‹âÆŽx9œ\$¦¥oAÏÂýÃ¶ËqDõ#\rK&E»èéÃ(ÒœÀ·¹2Àv[À?Üè¬·?·rzîˆ :Ý8ž\rež'u…ûdP›CÌŒx €öPDš&è\røbºNxç€.§F\r™Q„£wÊT0\"=·_¦•‚mH›¹tàîÙ+`òp€-Þ\ne»èˆoHØ›¸\n¨ªRjršå,ÿ{l¯n\nÅ\$é‘Knëz@1ß(k.]é;÷z»×\r°7¤Ýí—{Î²Þvû¯rx­ñ™p[õgwÔÝöXú\"ð¾÷À»øïÙÊ¦c®ÛÉèB–3X„Åêø÷}¹]à€»…[Äžžñ°¶Óž°™š¥Ó÷rª!î¢É[1weÊv¸¦»÷‡Ý‰ ÷gµÇlpéÿäŠÞnà8–aòªqêÚ•NA¶}ƒ-µb9É	•?…’vAP‰ÿa!’¨€cÅ`8<órâÆøxôÅ\0¯~drß7x¿µíý‰\\6OxéÁ­·KƒòÔ™ñvÓÆí©ïK{HeGç_ÃŽžº[AÚÊÄ\n7—‘›J˜¡½vœ.}¨n”nœŒ¿=0^”S•„b2Ô±h¹öÁ³± GÄPåvËX×µ¡\rï‘›K–¹½fk<é´\n‡¢@3\n(è´9T-à+ßÜÔ»Ê(ß×´H€vJ @_ÍGd…TÁ<Ìõ¹œ¾h4:pœÓæ¯5¹±–bj„	¯\rmzk_Q¹jÆÒCj1ïá#ú²IaP	ã{‘ï:ü{Þ‹¹¸¿óüÙZ´˜gR`±lCaùðˆê\"N|ùAP•³Ô€V0\0ÍBs…é@ž…ø„P\0Iu•¶\$4›Òí÷<©Ð`°:*†`þQ¢wRó,³º¸é\"ÈŠÉû<(»™js×¥é\$c°™ð6,É/%ñèòè3ÑÞ‘s× #8\rOH‚ãzX\r<Œ¿€;´Š›®Ý›ô‰¡ú÷º=éqá­ÍhÍ8¤}y¼…[áx‡ñ~»¸1jSðõb\"^«ƒü±n(@6pôa:Ê¨€Z5™\0üç]\"<É·¸ÂLƒ&ˆ¢|y˜Â\0d®¬vO±äñuS«:õÅýñuõþÔ–ÅÀeÎÁL´\\ì8„ÃXþÌìÇ±í‰æ€é‹È¦ïˆ¸º{Ïäê¾I\"/¥(ªŠqìö2æn¬ƒ£áŸQ:J:à”˜À	}‹	 â›÷\\˜‡©¡	.D/N²A•:££hÜîòÈÏ§Ö@‰n	-Mß½+zµøØbè ");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("v0œF£©ÌÐ==˜ÎFS	ÐÊ_6MÆ³˜èèr:™E‡CI´Êo:C„”Xc‚\ræØ„J(:=ŸE†¦a28¡xð¸?Ä'ƒi°SANN‘ùðxs…NBáÌVl0›ŒçS	œËUl(D|Ò„çÊP¦À>šE†ã©¶yHchäÂ-3Eb“å ¸b½ßpEÁpÿ9.Š˜Ì~\nŽ?Kb±iw|È`Ç÷d.¼x8EN¦ã!”Í2™‡3©ˆá\r‡ÑYŽÌèy6GFmYŽ8o7\n\r³0¤÷\0DbcÓ!¾Q7Ð¨d8‹Áì~‘¬N)ùEÐ³`ôNsßð`ÆS)ÐOé—·ç/º<xÆ9Žo»ÔåµÁì3n«®2»!r¼:;ã+Â9ˆCÈ¨®‰Ã\n<ñ`Èó¯bè\\š?`†4\r#`È<¯BeãB#¤N Üã\r.D`¬«jê4ÿŽŽpéar°øã¢º÷>ò8Ó\$Éc ¾1Écœ ¡c êÝê{n7ÀÃ¡ƒAðNÊRLi\r1À¾ø!£(æjÂ´®+Âê62ÀXÊ8+Êâàä.\rÍÎôƒÎ!x¼åƒhù'ãâˆ6Sð\0RïÔôñOÒ\n¼…1(W0…ãœÇ7qœë:NÃE:68n+ŽäÕ´5_(®s \rã”ê‰/m6PÔ@ÃEQàÄ9\n¨V-‹Áó\"¦.:åJÏ8weÎq½|Ø‡³XÐ]µÝY XÁeåzWâü Ž7âûZ1íhQfÙãu£jÑ4Z{p\\AUËJ<õ†káÁ@¼ÉÃà@„}&„ˆL7U°wuYhÔ2¸È@ûu  Pà7ËA†hèÌò°Þ3Ã›êçXEÍ…Zˆ]­lá@MplvÂ)æ ÁÁHW‘‘Ôy>Y-øYŸè/«›ªÁî hC [*‹ûFã­#~†!Ð`ô\r#0PïCË—f ·¶¡îÃ\\î›¶‡É^Ã%B<\\½fˆÞ±ÅáÐÝã&/¦O‚ðL\\jF¨jZ£1«\\:Æ´>N¹¯XaFÃAÀ³²ðÃØÍf…h{\"s\n×64‡ÜøÒ…¼?Ä8Ü^p\"ë°ñÈ¸\\Úe(¸PƒNµìq[g¸Árÿ&Â}PhÊà¡ÀWÙí*Þír_sËP‡hà¼àÐ\nÛËÃomõ¿¥Ãê—Ó#§¡.Á\0@épdW ²\$Òº°QÛ½Tl0† ¾ÃHdHë)š‡ÛÙÀ)PÓÜØHgàýUþ„ªBèe\r†t:‡Õ\0)\"Åtô,´œ’ÛÇ[(DøO\nR8!†Æ¬ÖšðÜlAüV…¨4 hà£Sq<žà@}ÃëÊgK±]®àè]â=90°'€åâøwA<‚ƒÐÑaÁ~€òWšæƒD|A´††2ÓXÙU2àéyÅŠŠ=¡p)«\0P	˜s€µn…3îr„f\0¢F…·ºvÒÌG®ÁI@é%¤”Ÿ+Àö_I`¶ÌôÅ\r.ƒ N²ºËKI…[”Ê–SJò©¾aUf›Szûƒ«M§ô„%¬·\"Q|9€¨Bc§aÁq\0©8Ÿ#Ò<a„³:z1Ufª·>îZ¹l‰‰¹ÓÀe5#U@iUGÂ‚™©n¨%Ò°s¦„Ë;gxL´pPš?BçŒÊQ\\—b„ÿé¾’Q„=7:¸¯Ý¡Qº\r:ƒtì¥:y(Å ×\nÛd)¹ÐÒ\nÁX; ‹ìŽêCaA¬\ráÝñŸP¨GHù!¡ ¢@È9\n\nAl~H úªV\nsªÉÕ«Æ¯ÕbBr£ªö„’­²ßû3ƒ\ržP¿%¢Ñ„\r}b/‰Î‘\$“5§PëCä\"wÌB_çŽÉUÕgAtë¤ô…å¤…é^QÄåUÉÄÖj™Áí Bvhì¡„4‡)¹ã+ª)<–j^<Lóà4U* õBg ëÐæè*nÊ–è-ÿÜõÓ	9O\$´‰Ø·zyM™3„\\9Üè˜.oŠ¶šÌë¸E(iåàžœÄÓ7	tßšé-&¢\nj!\rÀyœyàD1gðÒö]«ÜyRÔ7\"ðæ§·ƒˆ~ÀíàÜ)TZ0E9MåYZtXe!Ýf†@ç{È¬yl	8‡;¦ƒR{„ë8‡Ä®ÁeØ+ULñ'‚F²1ýøæ8PE5-	Ð_!Ô7…ó [2‰JËÁ;‡HR²éÇ¹€8pç—²Ý‡@™£0,Õ®psK0\r¿4”¢\$sJ¾Ã4ÉDZ©ÕI¢™'\$cL”R–MpY&ü½Íiçz3GÍzÒšJ%ÁÌPÜ-„[É/xç³T¾{p¶§z‹CÖvµ¥Ó:ƒV'\\–’KJa¨ÃMƒ&º°£Ó¾\"à²eo^Q+h^âÐiTð1ªORäl«,5[Ý˜\$¹·)¬ôNô\n«ž[Ðb÷ƒà|;‘éîp»74ÍÜ”Â¢¨ÐIŠCË\\ÞX°ç\n%øhØIäç4Ïg‹P:< ôõk¦1Q™+\\ÚÈ^å’ ™VèøCàòôWàÃ`83B-9F@ànÃT>»ÞÀÇ‰-–¿öÊ&âÜ`9q¦…Çßä‘“PÜy6Üå\r.yñ&£ñ´ÎaÌ‰ÍÃE8Ÿ0 êÀõkAÁ×VÛT7ñpïÆxØ)Þ¡~¤M½ûÎß!áEt§ÐùP\\èÄÏ—m~c½Bð\\\nímŠv{µÎù9`G[·¾~xsLî\\±Iõ®ïâXwy\nà¨çu¯áÁ™S£c»¬€1?A¼*‡ùÍ{œã½ÿ´óÍ¿á|9Þ¾/–òþ¯Eúï4æÊ/¿Wÿ[È³>–á]ÄržÊý¯v¹~B£ PB`T¡H>0¤BÒ)ð >¸N!4\"‡À¦xW-ÅX)„0BhA0à½J2P@>ÈAA)„SÎôn¼ìnìO˜Q¢¬ÇÎÊb®rõŽÔÒ¦âöàøïhèí@È‹’î®(–ð\nì†FìÂ˜ñÏ–øÆ™…(ìÎ³¤ÛP\0÷NÂõo}¯‚l«<ønÞø®ˆâîlëoq\0/Q\0of*Ê‘NÑ½P\r/îpA°Y\0p\\ãï~³ÐbÐLh °!Îã	ÐPöîd÷.¿ïy\no\0áÌËÐ¶öPptùP¡ovÐ‚knŽ¸\0z+æ›l6÷°©¬Êø0’äð¹P½oF€NìÏFô¯OpýàN`ÜÐÖ\rogðá0}PÍ\n¬–@°”ö15\r±9\$M\r \\©\nggìÀÂ Ø\$Q	\r‘“Dd‰ÆÊ8\$¶ªkþDâjÖ¢Ô†ö&€ÓÀÊ ¶àbÑ¬˜ê°¿‰›	ñ=\n0ÊÕÀúºÀPØ ~Ø¬6eö½¬2%Íx\"pß@XŠ±~«æ’?¬Ñ†Zelf\0ÒZ), ,^Ê`ß\0è8&´ì¨Ù©‘Ñr€© ©ÃkFJÂÂP>VÆœÔp¨²8%2>ÂBmÎóØ@ä’G(²ä¨s\$Ž dÕÌœv†\"Èp°wÇÆ6§æ}(VÌKË ‚K¬L Â¾¤éÄWñöqú\r‘þÃÌ¤Ê€QòL%’PÔdJ¨¦HÀNxK:\n ¤	 †%fn‹ã³%ÒŒ¿DÌMü À[#¢T\r©ÀrÂ.¦LLè&W/>h6@êE ÈãLP‚vÆC’ß6O:Yh^mn6£n¼j>7`z`Ní\\Ùj\rgô\rÈi2I\$\"@¾[`Â¢hMý3q3d’þ\0ÖµÈúys\$`ÖDÀæ\$\0äQOf1ƒ&‚\"~0€¸`ø£\"@ZG¼)	Y:S¨ê†D.S%Íˆ’ Ð3¾à d¹ÀmÓU5‹æ¬ó<£SÒSZ3â%r “ÎãÆ{óe3Cu6³o73î—³ÀdÀL\"àc7ÄLN ÜY Ê÷k‘>²Ž‚Ç.æpäì2øQôÐ÷“¼åÓ3ÀVØ°WBðDtCq#C@½I”P÷DT_D´:ÔQ<”UF²=’1ô@\$‚‰6Â<cÆrÅf%Ô¬,|“27#w7ÌTq´6sþl-1cPÕmðqªÊ\n@ÊàŠ5\0P!`\\\r@Þ\"CÆ-\0RRˆtFH8µ|NíÆ-€Ædòg€‡Ò\rÀ¾)FÆ*h—`ö €CK4Ã1‹ÊkMKCRf@w4BßJÁ2\"äŒ´Ó\r1Q4É2,\"ô¤'¼êx§Œy—R‚%RÄ“SÓ5K”¦IFz	#XP‡>¨âf­É-WX\ršÜê¤pU´ÕDÔt&7@¶ÂÑô?’©ÀÑ ªµ£}O1½2†‡2Õ#UK*¤)ôê¸‹Œ0o<> ]HŽš„Æ¿rè›LGNª›ê˜W%–™M^’Õ9X:ÕÉ¥N”òÕêÔséE¥­@xy’(HêÆ™Md×5<52B– ð–k!>\r^J`‹IžS N¡¥4'Æš*œ*`ø>€—`|¢0,™DJ£Fxbèµí4lTØ•û[¨§[é•\\‡¦¨Ô –\\{­Ò6\\Þ–’ öß(#mJÔ£,ý`©I³ûJ‚Õ­ÊÜèlß ûj…jÖŸ?Ö£kG»k¬T9ÀÛ]3ohuJ©ê¢®ÑW•\rkÕÏ)\0Ý3Õ€@xè¹,³-Ê	5B”¡¶˜=ÂÔà£#–gf¢¡&Üß·Z`ä#ÄoíæXf È\r ìJhô˜“À´5rqnzõ§­sÁ,6’oÓtD´y‡äÂb´àhþ—Ctn˜9n‘ í`§X&¨\r'tpLž7²Î—¤&—¨¼l¬Z-Í¬w£{r—¤@iUzM¿{rx×—mÒSBÀ\r@Â H*BD.7¹(Â‘3XCV Ç<WÔÑƒÝ|d‡q*@”þ@ÞÀÊ+xø÷Ì¼`á€Ï^™Ì˜ß¬__•ND­X\0Q_D]}tõYÅúp¦f€wÔÚ\"â3øz¦nÂ«MYñùZR\0÷¬Q¤?¸{†M3†•£*×1 ,¨\"Øg*U¡*²¯ˆÌ«zÒŒW5NV2O-|€¾ÉÓñ,×]‚B×dí\rŠñ/OâtÎøÃï‚Ì0‹xÆ†ðŽ½Ð®OCë8Þ-0Ò\r”ÿ0à·õ„@]¤XÌŠÐÎð\\\0¾0NÈï£Ñƒ4ëi¨;ƒØAtê¼8X—x¤\r†…Š“‘ìÁ‡øÝŠ×Ê7¬<ö@SlÈ'LÒø9WŽ ÊÎ¸òÏ¬ÖËì¢ÍÄ±•ùRçÌðÌ\r¾Ï ÂÏò|ÜXÐÖa÷ø7y€Ù\rwe¸Œù„Y!ƒ˜Eƒù’´šÂcRIdBOkË28[‡mÌJŒ+L ÈÅÙ¸OXpføÓ9ÑDÏ›·¦ßªw“@Ë“—Y—…¢Õ÷\\yäAcÙ£ƒXgš™%šôó’Â1“ï“j	œX†9CcÝ‡àR¡¹‡”QFÇpdÒ= C˜÷ýš\n\r¥Õ‘ÔóšdjŽÙ«’xE¡Â2FX§¢x_¢ØÅ£Ú5£™—}q¨Åí¿¤M%¦ZM™:\nÏzWšX7¥åí¦:ÐZi¢npY;Žù>Ê˜í£ÙÉ†:6Ú;£ZÎX0ƒ“Ì¢#ùýcàMyU…i2,q¹FËšÈb­J @ÓgGè|4ógÈÒmzWõäÊ	¬)™Èr|àX`Sc‚Õ§ÀË™„óc—¥‡û!²B²—±”»/}{4JÂ\0ÒÃn»Kuz @ÌmÚÑ®€ß­yÍžÒyÖ\"º)u¹ÊÂÙã¶Yç˜s·c¶yë‘¶š‡··y¼—Ž¹7Á|·±|—Å{Ï˜*)°Ê4Y`Ïµ[v¹‡¤­‡û^NX•†¸‰†ò‡W”©û·‚7†;¾_‚‹*x™ˆ¹Ú\rùß¼ß‰xm+¾mû¨Ú™	´»¹‹\$\n¾l˜);™²„|Ù ßÚ™¡:œNÚ :„‚Š_È8N³¸Uœ5;¨p+U–L‡ò\\‡9í¦Ùñ“›¡»ýO:I’šû zQºœ¡ƒ¡TëšÜ)ªXG¡æ»ÅJ{w8“¾ûÅ‰¸UÆù\$ôàÃøü›PxTY¾pjh·¾J×Ã€›˜JÙ{‹Âð@îÇ‚³ øðZ‡ÌÙs•¹hË˜ç–XÌ\0Û–lÓ–ÌàÌÈÎ¸Îçìó‚Y}˜Ÿ®ü^Ð@u2ÀSÚ#U‰ˆ;Ãˆ|¼¼•¥¼™P\\ŸÊ#ùÊ|ª<®Ý\\³À›žJÛ‚,öœÀ•\\ÅÌšEÌú…‚]WÍlÁÎ,£ÍìÉ–<åÎŒÛ>YnÎ),Î™rÎüûÔ¼å—âº]Èý	ª\$õÐç½Íq„DJí=•Ù÷•XI-ðÅ€äÅÌa‡llÃµ]\\“w(iÜCÄ×ƒtƒ‘<i-u[uVŽDÖ“¸QÂ¸€xb€kæLI­.kú›@ÞÀ„ÜN‹“[ñ¼l<o=-]1`è”¼ªdš ÜMÌ7‡@Û%C=]ú›êÀ/|-àÜˆ¾ÉÞáqÃã•âíùâ*¾C¾òO~ÊQâòså`·ç(âòãDÉßÉ²¿à[ãþæ>Éká¾R™uéÞ\\+>)3íûPÊßP§Óí6ÓËM%º¡¾pÔŒœÅAÐ3qmu2ÖfzƒÛ¯ì4s‹	´í`ÛŽ‘ì°-kÊS%6\"IT5½‹~Òì\"™íÂUt_	TuvàÖ½ä¶Yw¤†­0I7¤’L‡\$ú¿1Mí?íe@3Ûq{,çÀÏó\"&Vi·àžÔIŸ?¾µmõˆ™¯UWR¾´\"uiT‹‘uƒq­Ÿj\"•GÃËõßò(™ï-½‚Byîê5øcÝõ?Œàwñ®°ëTúî’`ei¾½Jtb‰gðU‹3ËëÉå@öá~ê+¾Íï\0MïGè7`ùïÍ\0¢_Ô-ùñ?\rîVÿµ?øFOÔ6á`\no†ÏšInª¼*pà™öeÙí\"T{[Ð“p^÷ä\nlh@l0[/ö„poóJKÖX“ñ€ü<ª=€9{Ç¾6ç–<eßAxãÀùÇ‚¼Éá4x[ÍžLò“~>!åOQxš{ZVFÔŽ`½éÈ~Ižß–“øL)Q[ëTûôM›àþT²*BC¤~	æâ‚ä\nƒò¡gÃˆÅ…p9zKÉ–ówzO9di^›'‰+¹ßïDz4ägHAº¯Lyô¡\nr€<IêjKQó¸Snô==\r.Âo7Â½Êé%a;‰kÏãmX¿›Zi%P¨iÏ\r­€¾ýµ/©…L`pR0¤Ž&õ—I (Øá\\.£*m„*Ž(ÚÖŽõ—\$ä†ÆÀ÷\nw×ŠÐ¥…8a“\n&´Â‘žÍUmª MÖ¨P+\"Ly„ó?¡M\n€2’	L\nbS ¥NäùÇr¶!w¥jw`¼Â\$îôƒráè…Êaáv±^Ãq­F‰Ü6•Ó¨i*™Ÿæ„ì_xõØ\n‰fðIê:B&ù6@É“KED¡úú·QD(V`.1\0Q\$íøF­¹H®’Tþ€zÐ†‹Ì\rªjkzM€ÐÀ®Y™À(61€”x‘+®%dj¸Æo\nÂ¦¬\rg°ï\"ÉŒ´ˆ—?Œ1- 3hÏXÖÁ)åyjÃ5r¢N±#Q¾¼Š¸w{_þ¡øG)ÂÎÙ1i‹Ì íç¤<Z‹ºpX³¡Ö\$â?¥=%.´€Ò®&¾­%\\±8w­!¤µa4œ<JB[ÐÄº¦u4‡%êŠ×47‹Ä%gÑä&¸€Z(@	€E¢{@’Ð#¥–2Šh@Œ#ñŸø™ÑŸ¥£@\$8\n\0UŒìjãA(×ž2ÀO€Š8Ú€ž5‘¸Œ¨@†ð&'´\n€DŽ\$i#ŽÀ#Ÿt\n PŽTs#]P*	àDÌuc› PÀO|pc—øËP	ÞŽ¼i#Ô}ˆæ:<ñí\0\0¥ÀˆÅ¥lo#}ÏFÜR‰Tp@„À'	`Q¬ycTp(ÆŠ@€eh\0‹˜Õ8\nrx› cþ<`NŽˆã:)DY\n*Dý‘2{dZ)A‹Ú4±²¤€cZLð2ÈÊ<ñò\\Œ\$r#ˆþÆö7ñÁŽ¥°!û€´ü€Nª{O¼@\$<	Ñ¢ðVƒZÒÆž52.Aù#D0 \0´ÀI¸û\"P'H	²_)¼x@Š€*úàAOh£hI)I²L1¦’ìƒäµ%áJI‚B‘þ’g¤i\"p÷§K2}’ä–Å(CËÉÍ=²t”xCøÐ&FÄ	r“ÒoÙÉ@@'”ñ€%	 ÛHÞT±áˆ	ãÔ˜:=¾)\0.ñ°]Îâ5 .ðæõ(pÈÀL!à8­\0ˆ¹	éR\0L‹YaÔbkÔ°ˆ6Ä)Y·éˆî •Ô®£	h³zZ¦õ±’IgÎVO3oœ­Lgà3ËY2ãÛ‰ÜDoPË`3Ì¸ec-‰r7í‡2Ô—Dº‚Þç‘B¼‰Z•¼¼%å/I{MÃ\0pÐÀÌ.`äÊÝo*•Ô¯%T€ý\0 &–iR\n™+Éo€ì©–\rÀ^2q”Ë©\0\\¨I@‚	KÀ#peC*!>€/á%|È…Ì’ÁÞŽüô\$è)çÀ§1P30(\r¢+\nZÆzž„))\0*®\0kà€ÙÅ2¼–Ï…(–E86å¶s—tºf&”™Š¡´“+;”Ø76&ãK–_Ž(›9fÓ,@-ÃÉ4l\$Û‚e7\0ù±:l“LÝæM7.\0ˆ³|›ðo–JÛ©ÀÎZ³u•ÌºŠ'Èy{ÅH,#\0vU@9!¼¥	Ñ'†¨&„òGôøß@_-Ù¿³ºt;Üê¡:©µ€²u¡<—ˆL†iÙÎš_ê€Ø£@U6°Îù#ä_€L'~ùæ/Öm`\\Të']=Iäât°Çž¸Âà)ÔÏqùsÉ9Âa<RPÂº|tžút&5°äs©lî@¾	ÞKÆwS®èlÍ:9úN®wSø|·göÉØOùAÐŸ<ë‰BÈ€\0/àz@´	ÍÏÁ•Òå†=?=iÞO‘ŽkÓŸ=\0E@iâÐ\$B× hO\0Á>DÖP´ó‹UäçÑ†j¥HìÂ9F¬BcCi‰é­BwMŽ§tÓx€PÀÙM‚?p“®=—äì8ÜÔý‘Ïlg~¨˜tÁa©€%]b\$àØ\rˆr„èÄa,6ÅtŒàW)Ž\0U¨›F˜	|æì“¢ˆvh¦Qú*¥Oƒl.C\$À\\ ÐÖRRÌ<lcù™&Cj3Ñý%ôZM¨öÀz9GpY’â¹£\0i\$Dµ‡d‡ñzt[')[)Q¤ØêÞkÁpi0·#cÃ¾‹ôNE¨ô(ºC2L	Æ@9hÑEJ5Ò,šh{&Jzö0n€vª©>[€j“£Û[œ]ƒK•ýRîJë>.;ù¨íF=RÚŒŽ<råÓM¡=—Ô’¤ÜhØ^Y\\RmnËÐð Nn*g‘¦ôÒÅB¬·5^QÒ‰@O¢°x¨¡HIÊT ´â9½)(‘œ&µ‡}A)PÊ\\/êô…_Õ!ÌH þÚ‘¥¤ù\0éBá­\$z4ÓTYu‚J’v\0êƒ”¨…%@æ32\0Sôm€--Gi@¸úQÅ%Ñj©YÝ+FuzlSž—”ÜW3ØÅ·OrŠU\$EÔè;¹M©¢\\€Ô±Äu/£õjeQªš¦§,#J¡ªXPÔ<UH•TVVé#Uê™ÔUbˆOU´DZ‘â¢µ£Í8êÕUJuS «À‘g)XDZK‚•¢Bî\n¼@2Š©ìx@d&ü ½eÜ«Ià@ÊFwì¬8“©\$Ù'IºV‚V†U\$²ETÎ_ð*ˆd¸/áFCÓYdp§vGƒ‰3‰ ‹Ñš‹L^(ù`áj”÷2S¸ºcÛW¨ÜJQYiÖHB”£ckœRè\nþ²U\$jê\n„ZAi€î»¢U*wKDRxW‰LÂò­ˆ€+fÚŒ@ã¨A4¢àGz…R\n²5‚b¬\\_²Ÿ ­ô‡¡á0¼C@¤\$X\0+Å]¤ÑÂè\"?‡n¦€+QIj\n»x\r€ôB`S¸âM‚ÈÑûŠ\r o°@‚À6XÀ\"{±\0µãb ¯)–ÁM¨cMðW ä¶D_áÎ±Ðv@{cÐ:¤®%[%‰C²þ1¼Ù;AÆˆÌTn› \0º a²pážóe~ÙU5 s©V†Ýe|M9‡€9 hË@æ¦\0êÙ~É@.³	l€· Jv]©ºD§f€7¨FÌá±³ËùŒ,/+:¾‹íÚXIi­\0U¢â@Nµá´\r Ê¢,².½i¶‡ª³m_ûFŒàÖõäÀYiUÔÓJ¯!©gûLj‹ãÑú¬D“iKAà6²õª-U«KfÖ_N€\0ö-3©ìÀã3+¥dãiûD	\"ö¯µM¥ml‹L…XÜãã¯¸Œ>‹&|UÕÑõ`Ïh¾ù2¦ÑÐn6Ý…·ÉI+ØnÃ©-nDÃ×`„µ†®°É”°@ã¬B!;X™smÈ¯·†pC`‘p5Á°¬¡O‰%Z/Õè5”³é#CK`‚XˆªÂcb°Q#«§Qa»–Ž…ƒ¸q…èpÚÝ÷)™®G+~Û–ß÷\"ðlM_^zò©šæ!ÌÉàE«”Ð¥’®šÀ‡ïa úØp86ì„åˆn+oì’Jâ¶ö¥¾,¹¡ó‡¢ºw\n¢]ÍƒpëŠÛRÁõ'§eÖJÕqµ'Ü¨%£'€nlO‹h@>NBÈŠX5,ˆ‡‹¢ÊrGr¹ Z l\r(ªË‘jIù†±lŸ¬%b‡;s+±× ¤Wg7¨)’*e…¸1µ•ÞÑ3“L e@(»p\0 ÐÃŽèds®AñÖD\0Ã\\bD§\nuê/&1¬ÞXR×¥Eæ¥‚5¡Tœ\r§}7õ§”ªîÔþ”AÙ¬áÉkâ\\–øöÍµ´ŸÇqà2Ü€öZ-wo´“tßZùƒ‹¯]ó-yq2j+Õ†¾Õ­Ã«¬€n¾XA«Û\0†\0º¾+S•+ïY6_BúV7z®nZ@Ì†²Ô·Æ´]´-UMJc*¢ü¸´®í¢s\"ß+\0·ï¯x´B3^«öà0\r÷ÜÀÎïÁcðÖ\\jÆÆ*¬P-\\Q8ˆÊŽ·…l•cË%XþÉVB‡}‘,€þ;(‰`*Qú	\$áïÛrßÂ{ÁKøìCúÖ%¬\r¥ˆx	ÞøQû…,¶Ø¾¥×/‰vàä\" pÁã¶ð~ Óáã ÅJ5eãü®Eš-^âX;c²\\©¶×¬m‹´7£?˜6C*åº®†,7®HfÄ/Â9eÌ0[@ñ¤!bê®íÅþUÐ‘=›Äi.Jocñj;ø—B³\0¼ƒï]Õ”ÑúvÙGÃÜ8àO\\\0ÀÇŠüO©›\$Ž•.&	p‘\\‹H1bØpø’:F\"8Å¶…þ‰ŠøVx©ÅýµR®–xä=À3Æf1Š+|Ò»\0ÂBÀ¼kbÌPÇLÑ’£ô\$zÌáàÎc	¢ÇÐi,Pcb,pÃn(¥Æ,¸ì`'/»~êÙkÖµ‚Îp€q-›ÁÈ±¹VÀÜÜ†Ü\rÙž	\0á‘‹dSˆÓÈÚÍ+º\"Šéˆ­1\0(Ä-’Ì1~útcªþfý¸àBÛ‘b}Ø ’Ã0<1\r°¨¨L’€»\$¸ˆ2d\"1ž&ì™Æ€BÃ³N…Ô\ràB\rrƒ«\"?vädäZá±.\".\0?wä¼9€oÃà\rÄ0¥Ñœ!¢ÍdR€‚ë¤¶\0‘ÃÇHëÜra%ÐŠØ+\0yrƒH¾sÏ’4W#œ,\$èô \0„*xBó\nPÌòü|„ 8@/ \0ø2U’°ábíÝè¢ÂÎÎªxÀ!¨d§°óúNÿ3SÔ?£ÑP»…€(òg\n8·‡ppŸˆü€S9õ@‘'  Ç\0úyµÿ\0¦y46¡H<‚öÌ×ô\n`S’ˆ…¼ÈûCY¹’„”³jp:\0N(ÓŒáX4ŒkÌÈÓgßDy‹<–n4™£ØrS<ÒÏýˆó¯?¥\nÀÇBãúf('™Ì~dgÓ™SËÏ?<³ÓVg(1™éãæƒ2ù£ž­—²)ÕôŸf`éZ€¼a“>t{ÀœÉŸô’>ñø\0ŠìPû`O¼\\sŒ<õ?4äwÞ~³ÜÇf@z™ÿÍ~hBW Ìø³á´ŠxhA¡¡ÜO'=úPÖŒ×²Üö±ë=óúc[ysèÌûgâ|¹‹ÏæŽ³%™Mè,Q³ÆÒ8'X žhlUs®…§Ù¢ú é4ËÃqDýÂx*8g§NLšBÈ–¨;§}%eû@YìŸv ho!\$æ›NcCXì³@Ð;YH'Á°@^ à·Rf^x„\0^osÜ_fª—“;¨Ópj]²:’Ô¤ïõ.mLêl\rš®V¨\0ó@Ü€¶Ê\"ÓÕÄ1%Œ!_êô@-]8f¤ç -Õþ±äa]Y¯WšÏˆh`(‘¬äJë@…ÁÖ\rˆ—õ€Y	kB(€xÖÂ:5˜B\\QkO[:Õ0˜Â¼¡­uk›X¥\\×P\0ë[öx¹ÀÅ®`ŠRIGÕÐk5°ðª§YzÍ×PÒ™¬=†l=áõÖe€\0ç•2=k` Å[K¼‡Bê½Ìû8ž¶C±Í}k«c{#ÖØ¢„ølŸdfF.Ìµü-›AºÿÙ6º†K­’•¤ÐÖ×Pàv„'¢lHiAÝÚ8C¶“®	G„`GbyÙ¾·Í- 0•Ä¬;[*_ˆ¡ãmlH{(;Uo¶ÕÑ*Ä]Š,Ä‹åŒÖÆÈþôXË“¡80Cµ°K	­!N¼õÔ(I`¨³	V¾Dv½§íšwá·rpc,ðåŒÃÓ\0ää 9~s»Xnã¦‡¢žŸr[ec·4dçpÅi	\\…Èe2âãl±ÄaZCk»gl÷bB„™¶7x%¿êè½ží€Å»Ùk`ì\nÁ(@Åº«®„5åÝ˜¥Ï­cÌ‡#t›–Ü–éãE½}Å„sñ–Lvö÷E¹ï\nQQÛ”Þæú76}õ‹Or»çj§b¯%@7‹˜àÛµßh³wÍ¹÷n£kÙ`Víq·±Íòï³~›™ß~ø„4{Œßþå÷ë¾óË;òßï8p2mP+ dÖaX8&,=Òn›}ü!/øK&\rŠÿt´H™Ó)/øYÜ”†6@å¯=}ðŠðEU§lKÃü\\kÓb[×â1Gø®­M­)™J¨xXÚEïTä¾	/¸\"-‘ë…<4ßxDˆ¥ÅíÐpÄ(¼3ÞÊŸ·ß´'È+Û\$\r†¶<rí×n`H\\t\"þ¶70=ä·Y×Wéhsð­\rÏw¼~°!ù0@6l‹\\† •§/þBò7’¼‰–ßÏ>Fÿ‘Ü‰\\¶¼RÙ¾-Çn‡€þÜ§\n¸?F~†œaÞ×+xÉÁýëñ¨\rœl,fúCß+­Žîw•i¢GøÛËî.X!¼_à71ymÌ~ñ„œDå¦È7åÊé	÷š¼ÆåîûÅGÍ¾gówƒàb/89¯ËxÑ@!R–9¸eÍJq˜Y¼hß'3¹ÏÍÄ¬*÷ñXw‹Ë®^—ÛË	¾7ŸÎî5óÀûåÖ`ö:î#È+Û­0˜ž·œS¯ˆ@0óo7:&~r(Z·‘G1zÐþˆ€·¢pÝÎñdNŒï“£›`ç¿/Fz@8Ñt0ŠZÌ_ ‰ªÎ0³™{Úè¿Lén•‡×‡oEËÃÑâ=rû¡‚Gj]õ H•¥›²Ò·…»ÞAf+ªÈèVº•º­mžœ7ýåßB‹ÛÓî*q‚þ}cãwØ³=Û„g¥»wE¢-H·°€»·¦½&Rh4—ªMêžZÕ_L½©]WV'ÁÕ¦§Íñ\"uŒ@-ÜaMÃsº@9êL:ÈÕ’]ù#‚ÝaëoybÝ\n\0[Øêrðp*}Qí‚bwßÛÓ¦?†ºâÿ;Vc¾Ê°›»	«.Ûsç´¢XíÖ°ûy·R=§&d”ã·rûO«žçõ2Åj!Ïux¥ÜÎÔ§R{NÖ&øµÑ»®5ö„}£ßvyÛ°Ž1o8Z#žþ{ÛNärû½ÝÑï‡Q:BÕHzW{òïW{:ìržÞ÷ó¶}D\$§j7)àP€÷ëÁÐÝCvV¬X—¾ýdí¨D7óá®€·¼,Ôh»÷á_ø]·^í—qÏƒÜŸxO»]­ïŠö¬?p{Æ\"ˆðOŠ8Qáµ?xw}ùJâ?9kâÞüx½5buÛ&÷øÏo›ÅÆ^ñ†õ¼Ÿ¬>õw“g]çíh¼#ä?+÷‹ mï(³¼¹àÿ/ngŒ	é5â5<ù;‡ñüòÈ…¼Ë³½œxÍ%‡³‘;ì(³ÞVóŸ–;Çço-ìóË½ëòÿ.eänkpËÂÀ_ËFäXõ9ÓWjQ¥ÓàCBØ§åv3R=°ì†¦;aÙ][yËÈ»4Þ/¢|óÃ##v	@_Ç­}UçM>ùßÌþ1§»\rC£MúqƒCÞÄÆädÄ˜U#[ÓÉ¦Ÿm\n\\Ä\r6ô'Ï>‰ôÃiI;€R\0X€ç<rW0[ÀE°dHSèH\n^×\\”¥3ÂTû´ÀF÷xB™îÀ\$	Òi÷´-‚­'ûÛÝÕ÷Xf¼}\0#É¤	1êo·BÆ€*;Û1±(\0ø~@)ü§Òh>³ª{³â~Ûøw·ÉH/vL\n9È?doÒÑð°,‹x)#>˜#b`',úgTð¤È~¯tˆ	€YÐ}Ùï°/]-'Òüž\0¾(ØÈ þñ@Ï¡î/Ÿëä…>¶Š~ðolH‹âžÜöÿ·½À/qû–DƒTúéö~¾¡o|ÓìaÉþ°°#|F8ÍûdœÏ¥ò/±|“ì¿u÷¿€Vîâ©hø\n>Û÷ÿ°{´	Þõ÷ˆýçï_{þGâ IaùE½÷&{VNñžod¡õÃFÆBÀXûï×½ÙñÀ(I¦N@Yû¿Çÿøÿ·ýÇð9»üÉ¿\n-èû{çã@RýoÛ½Ù&‘o^3Y¹÷ï»>ð¯†|”òŸø—îþ-ñóö¶ùä~åý/»ò?*ù`\nÏú?—Sæ!VùŸîÏ©óœüïîÿ>ÎèÕ¸}ïãþOâŸ•ü¿Å>îýRMïûºƒõãø?b@\nOÚ?þà0¯s\0ˆ¢IèÏ€’ú+èà'¾’úX¯¦À,úƒò`'¾¦óê¯Ô?€úÓñ¯å\0‚Kà¯¸¬úCéO…À2út©>¨LO¬¾¢Lïv3ŠàúÒ\0ŠÎ[ï£PÎ›ïlë¬H\nhä²Îlr\$/Àý\0+½Øý\0	»£ž¨	©\r@ ?Kå)<#PøÓîïs\0Žø ” ÂÎ?Kæ@Ì@\0ÃæÏê€±ø\0²%,p)?#£îïÄ\$ø\niL€¦¤°3è[Ìå3˜’“îð?²¬ @Ï´O¼\0ªýö°A|P\0™ôD?²N@\$Á,£Ý/ÞÀÿ€\$B?0ýÃø\0‚\$¯²\0Vú’LhÍ…¼Žˆ	èé€ùŒ£é½Ê>¤#6ý+ù€>öR:p¾>«7#÷…½\\Ð³lÎ“ãAoãüÉ<3lø	pe#7ÚA@)À±ðü¯Ü@ÒÔ#ýAV?hýãøƒ	0*ÐZ\0“°*Ð\\AuƒüÐ_>kÃöÐb?>«ïÀ\"…½cæ©#6>ÒBÃö’Òü \"\0ž>Ü\0psÁÒ?ÛDPvA\\#þà(>Ò÷3EPŒ¿>ûÓ:­Â<\n´OÅ\0ˆüd\"ï@A\0ô°AêŽûð‘Áò”ð”Â5ìÞÁÿ	“ø #¿‡	´ cþ©	“þ€+´@ÃùhØ€ø÷¤€\$\0øŽ‹:M3nø’3cêÞ`ûèØÂ„ÑT+I8¿Bò3@*ÀÆÐø	@'Â”\\pM¤8Olòüøû¯†‚­»ÝM€Ÿcî#üÂíÄð7B÷h`,	àâ6oŒÂ\\\\.S>¤›DÌÙCù˜ÿ0ŠË´ÐÆ£S\$2ÃòB‚ù«ù@&AŠ>ºLðkù¬4ÎAóÜ­3˜÷Ô°Ð@½;öÍ>pùÐüÉ¤‡\r¨\n°3|Î\0\nO‹Aø:6ƒô\0¥d7à«@8ýœ%`#Ã‰ˆ[ÐÀ=ÚDåÀÐ\n°ýÌÜ3u’LãóC™¢9ÏBCÔ:`£Ž‘\$!hÚ\$Ó“;ÐêB”20uÁ[¬8°ñC×	Ä<ôÃäúóç¯ŸÃëdPŠÃß|=q€2pí€V>˜û°áÃ÷	|*1\0Âç\rÐE\0©dAov´PÎt'?d,P­D*ü@	/Ÿ#6øÔCP‹BO\n¬©8Ä',5ÃÑüE€ ½ËLq\r?m¤Eq\nÂzþC@+¤är60åCê?3ß/¡Ì“ˆ\nPÜÙlHð•D—ü¯Í¤5\nóü°°ÂÆãói)D°„1(ú£Dƒï£7ƒæÏu>Üà\nà\$Aæüj4Í\0˜?ê4Áª?”ÑLK	Aæ¢>Ï½?Œü‹û€ÀqDI@³£\$;ð†D®Ž8	 &¾?;°c€—ÄJØ£bÑPû¯ÐÅþ\0	ðBÅ#3í`Â‚øˆ)ªÁ»ÌOÐ3CMZ50âEO6èÔC¯ì\0ÂÀŒ\\\$èÍÔûp[Ð9BãíÁª#cj<‘1Ä1B;còÅDBhÔ?Ëô@`*€ƒ¬.qbÄÐøX	o?;\0KÜp¤3¥8	ÐRCÌú6/®¤—ˆ\$>lÍ¤pIÀª,!€*\0®+ÜÀ>=÷]±wÅã\nT^pgÅºú#ó\0ž?\$J@Ä	\0*CÈ*É7Æh\nñj?“ê:pArø”]Y€’ùÔL‹ËDbÑŒàúïBÑ4d@(Dä”ÌcÀEçÛâ@>\$Òà	4¾Ø‘þÑ†©</¶Ð?\n€/Äº>¬gpŽ>šŒü± ¤I6i8¾;³êÃèÆ‰cÝ1¢AZ6€!Æ}<j±¤D¢¤jÉ(F’?dÀÂÅ'óêït\0†üTeÂØø´1– ú ü£þAv?lnos3˜’„50†#Æ>¼ÈòÂœ_¯«Ûd°©¿³¬UÐºÁZPú©4DŽ|;Ðr£‘ÃCðñ€ˆø[9£ê¤¥ú5IÇ5²I‘É\0ûEOÜB\0{9q C‡|\"pUÇZÎPû` €²øý´GcœQCëGPúJO‹ñÂ6(ÚBïóÇz>Ú7ðÏFøöÈ0IÂ:¼vOŠÇ‘¢BÏuEäµ·,\\0ŽÇ¸r8îÂÈûqgA6>ÀýÑ74D÷0qÇG¥ûêÍ>-SE@# ÑÈÎGÒ÷¤.à*\0i\n\\-`*\0q\n\\eñ½ÁÿØ±\"Â—Œ)qu¤ýÃï³nùô@`>DÔ8	\0/Ä@þ„_±Ú€¤üw#îÇlƒÒG‚>Ô„²¾-+ß6¿Wl%°6½·l0®\$5´sÔÅ&Œ\r *\0e!èrÇÿœ€qIÂ” \"ÀæÑ> È˜3EILÅ\"‹â‰94G\$/ñ¦\0—´‚©\0¯ Ñ-2>/„ƒìå€˜üèÓGg\nà/¿LŒq®BP€\"#7ôzñáHMÔ…O‹ÈO\0Ì &£¶2L‘ƒÁT^P@Zúd¨À=”]Q—=çÌKCïEã\0ŒQO¢Æ\\øôs0¤¤>ƒèq—Czù¬†±—G„>¤†²¿ü	ÌÄ@?Œ0Â?ü\\oÂ¿³–èø4Md1‰9€‰\0¼ÍGò?m\rDÆÑü(Ô´LdòÃ\\KJ8\rE’Ðù-24U 0VAÛ”…R=ÈEäe£þ¤5!Ì2m³qðüÏÓAEÛô²V\$ÆüÏ•ÉâŒØÅI9Óü‘	C&ù\\GÀ)D «ü§½òü4çIç#pú«#ÆøŒ—ññCˆù\\x£ø¿C(\$òƒHÍ:NI(J\0Î‹ß\"w\0¿,)PØÇ¬‹íÏ‹4<þÔ!òŽ=ÞúœGošÄó‹âP‡¿6üìN±QDë\r[;‹A|KÒ'AAäP\0¥C:šÊ„Ì‰Ñ4Åã*To‘†£ÕD˜F^ÈûÉ‘\$)Ï¢»¬\n«É’àÍ)’(Sà‰\0ò’È(ý\$:ä­@à‚²Y8’‹JÐà#ÅÐ‚ë+œ¯\nQ5ß+`a+ ¸iþ`6xð‘¤ª†è: ÚŒà.ÐT‚:‰þa˜\0øŸcv(ƒ^X¨€Â¼H˜O.\"JÊðO\rÎË>ex-¾¨J¸€èKPïû¤rÔ‚-`2²€ÜË_à7€Å-!\"JØô¶òÝJêH.²ÚËo-ø.²Ý\$ª<¸BOÐ€`> ©dáµ\nêH\"òØ†o+›“§s‚Øè 3ƒ‘+¢± ©6¿/¡ƒa.Ð\r²ð†nd»²ïË¨é’?ˆô£z1\0¥àð‚?‰¨ 7€ˆâà<À?âãø\$Ó\n`+Aw*MQ¼Ã<Pýo¿°?,)#P>”àÂ€šøÌ„\0¦?jŒÞÄ“ÄVqÀ?“£ñ³\$¡	9¯õÆ-üÄ2ŒÌIÄÐîD9Ì³Lg1h[ÌÛÏ1ŒÄsC1sÞ©9Lz?à	 LWdÈovLŠþ#ðÐ9`Í¨0æ€Þ‰É¦W·–ˆh>\0>¦¢Å/)Dáü²·Lº¢¡ÀÌÀ\$ÍaÀ†¨9*ƒ<:C+àJËìKPJ¸\"—L\\Ã*bÌò 1ÔÀä6ë4ja+\0î%Qf ;KœE¬¹ÀÔš`è> >7¦tÒHw€¾MPn3I:fàD <LÄÊRÈ'¾.\$ðíBO\\²\nû	Ðø5ã86ÄÌ¹D1‰<\r¼³\$Z…œð’ƒ„ï4Š%rÌƒ¬²×àúÌþ\$€ƒË¶§»éo™^Ú\\°È\0øf[z“e…í6|Ö“gŒ&ñ8+M=6È5ˆ³\0Ò1Idì{™^fqdè¶ˆs7(|©tM.]HSó[€ø¬Ô ÕÍ;7yC„—šÎ¸mÎÌÞI|A‚Ê:`c †Êß8\rÒ…iÔÉƒ¤ßÓ@¬‚P`È~\rlËa=M3ã€áf‰<ëÀRå\0Ï!ûÀ@’ØeØ«ríÍdO‘t ¬‰T°³-æXY9A“˜:38áOÊÞadÐ¥ö’gL³fxË=4K\n&€ôu0KòÍ¨Ç,ô³o7¤€ëÄ†Ó,à½Î3Ë:h|’ÎKbá)AN¬úÄ`ì€Ñ:ØÎŒ€×;´ €Í»*sI&”á«Rsµ>\rX\r!\0\nÀàBsVM63˜KâO×:Ä®ƒƒc5„× úÎæ‰X!AœQ9z%`º{:èHòºDëE€îcv!‚Î,Èôá“:Xƒ)¬(üº%˜Ë2a&Œ«,ðl3Ó8j1è|’Í‡É=CRrÍË<â\$óŽ\"KB3äöÁ'9…:|÷)`Oj+îÀ9	}-õSÒ>2¬ëUU5ÜôBUNàóô÷²ÑNÄäìS¾NÄüì«ÈO²äû3±KNìÐŽˆ†¨ ×@:/ç7£ÄQ†¨ç!Ô@.’(&v9ÔédÓøŒ^þ“‡’Ø¬!ï¦[.pGc K#?¸füÐpÃe“Oæçd®€2\0k6)„,\rÿ65GmOFV™dåiÈx,ÿa=O@s³þc6…`Â¤Ø\rJ\0å;‰³H†(ù*ŽrÅ-Œ¾.íMÛ[ BÎ !(àóM¸LP«bUèÛpJÔ:î1úÞE“»¦º!:¢,ô:‚YB‚ò*KRÞ¤¾rÍ0Ø¬Lî“a6Å;6+2Æí)èUB`JsV0È:Ô0_B14/ÎúíAOáœNeúÈ)A~\rÚÈ öÃÌ –NPów“,È´C„î3œæ®¹ÌÞ°T3öq9}SQ\$ÄãA‚P“DÐ;!:À!îæ¸YŒÐsÄÎû6Ø“ÑÑRÔŒFt›#C¨Ï€øQ\\`rXr…<í'ò×72Ø¼´O-„w9Ó¤ùËb8à5€Å3{¡\0Ä7ø\ra\"ƒ\nh[j·ŸåFÛa)”Ñ+€2Ï<%’´M¢ê|®m¸|\nÀ54pˆþ	&bUQ¨8\0EŽÑ¥4AAN,ËàìËFØ•To(ÉG`šO•GA›³êËGlý`:†=è\0<\0Ðëê”ƒ²ŒTÌNÏ¬=.û´ 6Î–(ûSBÄ°ô\0,Jð?”.º(é†%“…,Ê?B.<2ðhMÎƒI`éÎŒá4ô¶*éË¯G°ëì'ÙI¸ÛíÊÑ9š¾ôžRX—E%,O\r,Êˆs³Ï*•(”}<Ú—@c©öRœj]Dþ`UR÷Î³,˜.²÷·d£¥rø¦’	\\·N•ÒÆl¸ÀØRÏ-ó“´µËšÜëkô·Q•K„½”¹,ƒIå.ÒíÒêšT·@1\0ÉK 4¼Òý/]04¾K›K\nC¨&•F,¶ô³SF0“ÔµS.-´ÉÊéKÅ2ÔÀRÏLe'ÀìÓ7L…0”ÏËoKõ3TËS.å4T‘:XÌ¾4‰Î9/:WRò9.Í62ôËËJ6ÀŽS	.ðc´¡Sv^ 0®»ËèO|L±MD%3î 4z3Id\n»ö•áú#tPq5h{!7Z‘Û»2 „ÆthÊ !îK€Ñ7YÝó1S³<»áh‹µ©½Ç-<ÎÍpÆø€jéÍÖà<4øÓ¹O˜%@‰OKBø°ôS¶!10Ô‡SÚÒëôõ‚YF…?UR4ÏÁ›ÓÜÇ!•õŒ~ÂXl´=¨ÇH|¶5QHýC&¸\"1M'µ8¯5a`Å?¢SPlõ`0—\\ÝmËÈTM,8'1eQaA&	\nÇTRèI¡ÑGÌ¿´ýÍZxôâ6yQÃ´ôñ¼aÀJÀ‹¼üûkU&ÿOXHá‚ÔphQEN†â=Cµ\"ˆLÉ›( ÚçQe@\0;ÐñQ®ÓPÔÅD\"€/—ú\rBà¼–tãµTžì\r<eÐÔeS}Om¾—EP­P\rüÓ«P5B•4U\rR==õBSÏR}Hã“Tè#µE\0Îô¥U‚=QE‚J<ýSð` Û‚¼1x\0ãU:óéOá/‚¼€+µN J`P!t8Õ\rT¥µ7 SõR58\nc>ÇÆºÈâ!ÊõŒ1{Ã€úÓ¼uE€ÚM4{Ö”4TÞíGa;Ž|ðñà5\"SÎÕýNkSä8»DÄÔ?JcU0Õ¯RtB¸{ð5qSåB„Ï,±\0ÆpÐàÔj†!‡\0006K¼1å ÂƒX@¦D¨V­å_ .Ô(¥_`-Öð`ÆD¼àua .‹•X\rFÃÕöðõRõ…ÐFD½•‚S÷RxhÁª<mXjïb­ÖWù_G\nVšÄ©èS¸ï\00074Ù\0ÒLRÁ\$QíX›pˆÄÓðù ×ê\$°Nó¡Ö&83&a+²€|l³Õ‰ÏÉQsÀA£…CXšú]Î_X]‚\0á+8+UzƒsRPÎ¨Q\0Ü\08Õ™PóOÝMU¶ÔH6!ªVX¤5†˜X…a¤ÇV/kÓVF”ý`‰TŸZ\0D5FÑOS½nákÖóTMSÕ¾U\rTMZÒºBðÍìoÓîÜEgÿWGµfµÅ„-YÁ(µ}V7T0BÀ©œ4Úð’Âòƒ[9‘5ÖX´åm¯ÿXhét>×LU`4\nÍŒTÑõ††o9­vÓ×FÊUm®Ö\"ýu†DÕ€	\rw+Ö˜\r`©V(ýVÏãPËÆÓjô]Kâœ4°ìoT.\$mDÄµ¶	S’à‚­e@3ÿ×­;@7mŒ:Èë¥¥“´dðÈ!õâ¥Zð£ôá»Q[œåõÑ5P•µ7;Sôº/BÖ!McÃG¹ÉT»Wõå(V–ÖÔòä¯•<7ó[lÓt…‡^Êô×ø\ri0ÁPÕÐÍa£|VX‰•áÌƒa[x9Hˆõ]¿õ¬^&m¹‚¼ƒÒ¤ù\0ÙXlã¤«Ìú•‚•Þ€»T‹ÐáOXl0£öØ(ô,Ï`€ØoaÈÕu€×ø3½‡U#Îô'0+Ó½8ñ]HT!XX\ryW@è¡\$ÛMQb¹‘-ä)ÓX	oõ†‚\n|Å`-qÎ-bÙ¶U‘VcŠÇÒÖ ‘3N=5vAg\rýŒÀ8<IGPBÔ9O^8.	Xk®ö;+\"Cµü×Z/åÂUUo[i`Ö\$×ïd].âÙ(s¼Ñå“ÔèÕ`-•Öâ½€óqªûe‘-ÂN¿=#[ÖMÙPè…ÅÑO^(B †”6ÍÏ_u–¶2:0mx ­Yg^5”-‘YG8”´AØÝc¯VVßÉdô6Í\">\ra­è™^íÈÐ®0õ\"ä±¿R¤¬–,·3Dä¯Åøß¡2iGÈ5§Í?:\rT!ƒwg„óM[7;[v{ÖªCs\rU9d×`ØÈyh\0h@ØÈ~ŸqT4Ì×_QVÍvÃø•F5ÔPƒs*ÄMc]Ió9Ú1T0m†V)S•ÓXÖ[üâÍ*Œ¨c“dA+Œ1hóbõ:×IhõM@Ýs>P¬ÛÍÞ9ûvuTË>¥Ž‚Ö½`	O5ÙccÛÍöjÏ?QëTmq\$¼¹—=(VÏ6F\rTr¶®~¥šÃ\0Ø|m•CÚ)[Õ‚N¨ÖÆ,dÐ+;µQm™-Å‡ðê\$µo²B-žsšÚÇRˆ­ÕàN›:’È/8‰>øb.°Û40>‡ÆÚñ,‹.tÚºJ¶\rÛ\rk®•6Û	WMmØ3[Ñx5œËêqÕÉÑìLb´6Í;`•Lm‹ÿ4•Iµ6^d!5`7¤:aOÕh4õµÀÐ-3üÒHÈUm˜€¶Ú’³^_ÀÔNTê±²[PHðÙØa=UH\rE µ\rjM¶•”SåPsN6ºMXQ 5Œæ	Ã\r’Û­YKqsþ[¾s-\0Öé®ï]¼aN³d5?ó+—Cf¼ÍÀRe^ø+@Ø[ÓP€5­ËÐGa‹öôÒµoM@w\0QyoKŽõUÛøe}¼Õ[¶_oK’Ž@Ûán»wxVýpEºäùPuo5öR“ñ8c·.¥	Uo5Áw\0ò\n(%ÓNp¤ëVÖ®ˆJàˆ AqtÏ×Zæ#Õˆ³òÜk6””ÜiEÜØV‹R{qü×fØ{3l@äPqH‹r!VS]úÈ6¥Ú'q«Ð@>R=E\0ùêSñ+UjõÊ”øYÓ[ÅºuUÕ¸Õ»rÌÜÇp»6Öõs]h'tË	mJ ¬8ñQUUuD’­m2z›Ð„àˆB¡K”ßÜÝv'P¿l]AAfËchÈ\"RåV«p´ÓXÌü;UË5öÜŽÆåÒcƒÖ°zPTuUQYëõíZ¯5åU¹…ýJen5ÀÜnÞÕovÅs=Hu½ÙÅZõoa‚itÝoUÀÚ»uuH5nÝ=jSÐÀUPZMNÄàˆÿQmobF·A>´]i\\¨G\rTŸvÏÖ‚Ôâ\"•Ä2Ø×v4Î³=]¶2åz\n=:¢\rh*s¯×fÅÓw_ÔäÊUt8Å[Ý„8]Ÿ+=•ÐëGÕ×7z=n…Û—JÝòßuè8|«Å4u]ô	caÈÝzà×€YwíÊt]ÜªÔÕáÅä^€ˆÎrÌÞ)w­]Œ%‚i,˜¦õí¤e}w—0<Õ3ÕäµnÛLr½å.³Ýiy-Þ7(K&‡\r_;f‰[­Ìˆ\\\rXÃ+Hï…çÔøa=Ü³bÞnôc€	,c’!£Õ8\$m“VõvRæJ]g -†W¹OsˆôŽƒR( êÞ5]WHVC\\5@DÝ!s%Î’²^×sdñ%NÐÞ9úÈ7·Öƒ{U™¡+ÜÙI-îÕ¼€ïP\0\"FÐˆS5…ÒFÞÏ[Òâµz¶Åsk(7ÄEz•Ÿ÷ÇÖ1-å@ÝxñÌ¹Ú>M³g‡ïWM£âjÔ»n\nÈ ƒ^«tLµ·ÓUc}AÃVRÜúõ™@;ÕX-<sÔ<×t…¹C8^!P}Ì3q´d·\\Î¶LÄ3uÀÖúÛû\\-\rSlX{sàLÅNlÙåïL™ßŸnà‹¶&ZÅpút6_[\r±¢°¬ƒVÅV÷è„C~ÈIªE…?W%üUöÜ«u…[ÓATAW\rü÷•¦\rdáwøßÅV½ÛkÝù¶þÏh,8£ÅŠÏ”Üí×D×ÈØ»¦Ë­|añ¸6-_1O×Ã`j…ýo?7>\nÀXsôY‘nã^cÑÙ{jÈ7®ÚÄÚÊ:ÈÜ]E\"JVJe~×.ÙQHgžT3r…cÆÙVßBceø“3e^Õ€…9®8¤\nò ™Zð(ää‡ª½	;tæzôãÕ#	üq#à\0V.\nÂS/DkË/Èk4 Ÿ‰Ìø(iJÊ`¼†êuM5´l£GÀ–'¢Ò\0n`¼‹54èÁ\rÃ5 «t“B¡}´ÞÒZH€4iƒ:x4µÓŠæ5¡ö¡æ3àæö&ú`Ä¡£úamnÍ-³ön\r©èWƒ†¤a§ØÐËMXC´õ„KQm4ìÔþÈˆ™5…AXGˆîÕ@'€€ï…ºŸÀ:L¶Ô Y 3»\"˜@W÷ƒ²¨ÆŽ»,Õ°ïMà¼õQØ[apfJÂ;…îø`ÕÁ†ÈØc=RÞ°ËÀ¶~ÙV¸o¸—†éŸ¢žwócXn‘Ñ‡8K8t·j×â'øt5Ôèe¯B°:øãkx®yaîà£¾­ý‡›¤Íð·Fn×	”îî |:a09¶\$ècuöfâ\nï‹‹˜‰ºˆw>\"ÏËaˆÆ!8~Zð\\ƒÀx‡ºM‡¨#ØŒ·‹JÖ\$À×y‰HhMØQ‰H \$ù\0ó‰ƒ]ÀÓó‰`@3bS‡Ö#®×Ñ<KXïLµ…~Xf5S…¸«˜haw†˜åØjÔ6þ–§€^Ú“šŽß¼˜Õ³r€#€ªÎÖj\0%\0º¤%q;)9„ãg‰.Æ,bBD®£DÔ€~íË:rX3¾¯\nvßÅL­ü5Ü0 R•ìê¥Â/Í²NÐn_¹–ƒ‚!…)SPÒØ¡%þ0†=»ö+Š@BÖ9ùof`œö~)=§DŠp°@L>¼wÐˆ‚¬?L§2YIÌ>»ø!Ì?,šƒì@€÷Ð[ØÔG¤>¼˜ðÃÌ>÷,ROsÅ*dRð’cG¼Q¬ÜÅG!ðÐÃ¹œs°èÃq|øåAóìXqæ£ÔøPP%Éñ\\Px×Ã¿TI8ÖÅ¶Î¤s#ç£µ#„ ÅžŽˆ #ÄÏL<p_Å¹Ûà¼ÃûŽ>¯lEÿ;Cøô¾ó;øôÈ#£ÝQ}H_LY˜­Jy\$ÒKL/~=1Jãñ(ýÿäÀ¯ÎÇÁœ0d/\$ÙAe)lüÅËE‚­/ÔmÏ¡É54)QÅ€—ìt±÷GdqQÅÇÔQ1E£Ž„p0ùãÕ	ôd13Áñt¹!CÇæ?™\$ÃñŽ^>QÌÁñ|¹!B?ŽF9!cÿ„ '€WhAñLYÑÃä…pû1—Áñ–K±\\¬”y*ä½&ÆM£éA{Ôð~d=“Óà/ƒÃ“äpdå“tPRjÂæEAäí‘\\(Y:Ã\n,yP@iDy)9B\r´!Ód‡f=ÙLÄ4p d >ž>p™d©•V˜ýÂ•	–KpïÂe&PhBe“&Ap™dÑ'D&Y6es“ŽU:Bd?îO†å5\rŒ'Ke•FD™de•FE¢Cõ\0t(ï—´“|)-Çó#”)ð!Èm\nÜŠðl4?[âÒ›I\rL^r5cU1™ÒÂý\r,Rr?ãdRØãÍÜsÃþ£7&Ž^É!ÅõÔO1ðF°ÿÖ[Ñ-Æý,\0ù)ø\n°Æ¤BÃéäÓ”}¬ß?‹”^a¹æ!ó9pe?•»ùêf1n)ôNÎ†û³¢a¯~í¦ÓWËË}†eSèŒø>Ëø¢¼ÒJOÆæBµ\nÁ¡Pœë%\nÔ*AIleq™EØŒä^Ñ}€QD2p	G•ÄfmJ”Ðü¤íÊ\$Ë}Ò¹+’³-”ó5Eôg\0QTF6ÆYì	#òcé*ìÊƒçK4@[s‡Î8L¼ÖaN)CX•DÆ[ImRò\0006N9fƒz3‘ÎM=å~Ÿå9`%sgÏÝ=>¶‚ÏG9Œæ—ï¶¤T´ê²ƒ4ˆZø„Ïtlà†ç‚³86!‚_KthIÁŽÊÇvìÐ<LìC¢7I/!6t“bQû.²êÔŠMÍfÚózOF\\Î2¶gj\$²ò	‡OþçU@Wº54Ð™Ð\$öv´‹P3-Æ,\\Q;ž½áPÍ•4½·ºÚNGH72ÈTèè—Ïù6iSjgŽ#üÝÌ¹T2ãùŒ@9Ù7@l3ã˜p\n€\r#<O—7ž\0øNu;¬ý”.„¬Þ|õ“agóq††Wç”¤ùrÔO—=Ê©ö\$¼„ùy—Lßb(×Ææ]:…Iè(nqó³ÏËI`‹Õ„ÖàÉ†ÕÒu@%!Àœ5;ÀÃÇ3èK¡Ý`Ü›C,œä¯dVq X\0003Nù€>ÓOo3x»S„ÌÆ#³ÓÐ1†õ(©XIeVòÉÒx%UTº#q¢Np ‚Ò#\$­Œ®L)×f|CÝ3´»Ë¹Mäßb¿MGÍ%d4½—L»]KÁ³±èÛmÍwš6Þfé…˜è£ 8\rvÜËu9ÀrÓÔA¡x‹á\0h^‰´:bdghE4¤R™}Ðx˜ßAHÙ|ºEÝ¤9¡|ZIVs¤N’ºCÏ—.Ö‘Ö¢çnw<õZNÑDC.Ìèªò¶Ñ'IEµF=Q3?rÈ+K[Tô®—FÔÍ4\r)“@Ñpx—OÑx3à4ÍÌ—â<ÓÚ`˜qD…ò…0ÙÇ¥…óÍåè[A€PõÕiœ”‡úcXÛIšÏZé›EØdéœí¶4YQY§ô\\éÉE¥®óQEÕviK\0B\0WÚÝˆOZ?fOkEÇÙ’ïB^dÖ·éöâèLó1M„Æ5¦xÔÿ¨,+WgStØO\"Lý¨6 SH=C¬æ¹æ54ms:¹”eRô4›[‚&£¡¨£”:Ýšé½jûÝ#mºÓûÙ‘tÕ–6©•©lÕŽjbX5Š.KÕYb…Igje©ÈLú	)j–§\n_VÆ¦öªjwLÜZ¢j•©.§N™qT¼èn:ÉCIx@4Ô—žctÚ¬IªÝRîÍ.1~«:°^wö¬c+j¾s½€ŽóêÓ«.­—òƒù«~­vÓºg«–ªoJjÞÔí´»©,î¤Æ/!ždî­qêÿ¬%È\$Zb\rv°†·cOV% Œé×¬EJ!g5Ü(þ°õKÎëB£yôk)«R:Ìê˜ÆŸZÊa9~oÍŠênµ\0¨ëTØÞµ‰+ë\\Ä\0000¹›Ü‹‰ŽÔ=ƒ_¢Þª€¬…hmÔs—ç˜e½ÚÝjKzÐ»oXž`­DÕÚ¯T®¹€•¹UîºKþ-g€<N;žf¶ÚíU\r5~:îiõ®ö£¶ÆQA¶yšòUCÐrš’ëÕQLëZî6<mµ·*ç™qíDë‡|û Zýk¬ôg\"ñË­«kÑZ¦ëý=0IÕçëøêŽÀæM^ŸT½åZåë¬1¥Òº’™Ð^ÑU8l,&Ã‘Ýå}P6:’Ë«:vÃºIÑžfÄ{·?°õí%ÌlCžfÅWc<ß`vÄõKìc°È5{Þ«°ÞÄµ9lh|jïtä>MNRîôæ=Œæ(´èŠøZôD…=SÛø°lœ,95M¹7/qÆÉ˜°ÔUAÛCèS²ÎÊa…^ne~Ì\0º—³²ÕámÍ)³(%€¬…¢ÖP!÷3ìÕJFÊ;&ìÍ²–ÌÅA[¸‘Ksñlë³FÍÒö1Ë§ÜËV2§8ÖÍ”5é´p!!lü	VÏ\0–m\"1øI–\rí±&ÎÛIm3´¥ø5*‡|Ûågš.Zü¬N´tˆ6œ2å€³qMZ¦®c£ô]\rt-‘k ÄåZà/A¶Ô{YèpåíåWÉÐ›sÃ” _tÚ†vºàC´Úi;Eìã«vÑÛIí’.Ñ„Õm¶QŠð¶‚ŒYÜ™3#O…”ËGíšâ°mÀaÀZ1úáFƒUJþ±t!s\\‡¨M‚ÍÏsÜ´\r‹Ú«·£1H¸]=,²ŽÍItŽ×5(ˆ5Ýèx«X5o\\ð€–“Y°ö‹—§ˆÐVmARuøY•Vszˆ\";…Ò¿?;*PZ­,úLßA3X•U^§!OÙRÈ‘eµ&å4Œ].qáe:MÕiŽºf…	5cÃ3Ö–²ë}7t.·­ÓžvŸÏhŒë9Þ‘°%¥Aå€;Œéè:úõ³7z„òôh™díÕW%S]h‹¢Ð©{“É÷öâ×·Dùá;Ù¥·e³ ã]i¼î;µg&µV›¸]«»YOâ¹õ,>ä äÐýõök€Æ2åÊàÛ‚\"±-R@2à%þð€úo\rTRS1è_¼eÄ!C£_¼EÖ–UÉ‹µåuà\\ÙyS¢/Ë¼ê WÒNmJø!·¨€ð@–ÙÐ­P\r`9M¨ss#|X½ŽönÎµ½ÅïA¡ùw^õtýîÇtìÜZ?=´ÓÌ×èý§¬þ_eB•×\rèÏû`Î}óP]ÞPe:›èXÕºØI–UNËë6é‚CSíóòØÎÑRéoúMÛ­%Û–žõ`À¡PÞs>@CÁ!]EUj•ÔüNíûƒl*B…{\nˆSYÅ‰ÔúƒuOP&¤ÄÔ¿ÈDU\0^e\\\rõRLýµÞ¶U’¹rV“iõ5»·fóÀ¾í¶~Î=t¬ëU'ëèýŠ<[k=ÏUChø.Ý|üà2ïURkËÍI•CpG°é‚£!@ –Û<ƒ@õŠ¼Þã·¯µ'Ýfâ:?J0]T5î7YèeGµI÷¸ì­ÁfØœ*U\rS \rz%ðGuYþU'²ãÃŽ!¿ÀÕPÕÔðK®ø6œË/ÁM4<pËÂ‹öj3UÍIî\"mÁ?]í7*Ñ¼×|õsÁKA·ý‚FWÜö5üÕÀ·L6UÝ\\è@ÅÅäó@]t]MÛ6ˆ”Â\ro[Úmãž®#Œ­BÅ\"+ñ?ª±OÉöoÝ€eoXÆMv½Õgƒ\n†­Óö-ºu\0·SÄ\nèT<X_¡O¼Zß ×œ][¹p(¼^ñ…tàUiiyÆ<×`8ñ‚Uúöñ˜àÅÃƒNgFÕÏ2ÜW6{„dÕEÆÔË»Á€êkn|pNMµ<››„¼GÇSqÑ«ßÚXÒrqÌ·6U\nð#:qñ=8A9Ð»ÇÈ_Á Y;ÇÝ@õ½r	nFÝ‚ 7MsÉz€î^C¬ˆ<ãÄÿT>\\-žxð\\p£ØÜrqÙCV·31LMÄtÔ«j]·¯àAXöÅ×Ëßy¡NÔ÷“]Õz¥õ|\n]ß²íAS¾Ñ¼UâÙÉÍÛa'_w\$ñ¼EY+»ÍçF6]h%»‹ë‹¸É>Uôí'ÇŽûõtË]³G*œo—]+'*wñ³¸ð•\\®„™ÊÕTØòÅ´ì¬€1\0Ïas;KrÕË`\"\0ŒZ“Æþä¼µœÈóW.TÜ‚¥q’ò\0×T!Ç¤Òã*ÚÝW€‡]lrr‰Ó‹oÏÌ;*•z]!€uªõ¯O•Ì6Õ®\n`4/se´TDH.èŽêCW?7E¨é%“î’X9\0_gÈ<U_‘xÅKM¼ab¤AqOxˆ•\\Urá´·5œªÐhÚÍyš­Nµ[&”žqV¼Ï|â¶¿¼ìáõ¡ókTðU_•Aw9Üåîi7=º•”Ù­¤©_Vð6³¥7;;8íNEø&³ep!\n´¦ÒŒù¨¡ˆQ -³ê¡`êá4Ñ¾\r¸8Ö `à-€t\0‰ÅàÆc‘•Ø:l”CñgÁÜî@ÒaB—þüóŒÅ_o@¸H(7Ï_@`‡á*ÒÁ>IÕsäÒÇ>œû`×„ãLM4(ÓnÍ'‹…+Ù­ô&Ó£OøVtZÓÙ	\r>´ê #Odá^¡Žm:ahÍ)Nd).)¯TôtÔO=Ï;†p®fWt‰…ö`ò€Ý;l=)‘Ð°žíu[µ¥|­¶tµÒ°Ã\r”¶%ÒÙ\rˆ¶¡Ò•j½2ë,×J½4Œ0â{bI*t§¬r÷ôÈPpkÝ:¸?ÒÛÄ<·åÓ·J|\\tüá“Ó#ô„4[}ô™Ô8‘Øj\\\nëº?»/‹ëŽZ¡õ\nô×G}ômÒSÔ=E˜çÒx@X¶\0ã_J=K¨zöG\n´hÄWR05yŒÎ´çsÑÐ>=0Ø³¥|“Cì¤ãNGñ~ÂŒæRý]Â•Œ/ÙbÁ—	æPÐ‚å5”†ZÏB•\nÐúqÒ¤¤÷¡-YvÁ¡ì¹|É¢ŽœgøîãÉÖ`€*æüvHOŸD“4‘›ãÛ‘ŽGQEãvboÜäWó¯ÿÀÝ×Œ\0±¥¿\0003öQœÀ'_>@÷‹ö~ÀkøO¾¹_#ïõöøï`Ïù¾&<íu¿ìŽ°]È ù¬”¹Æç'†:ÑNEÅäÉH[‘Á¤-‹p+À³þI‘ÏHù“ühÑžÆ~ÿD¾ñ¡F½/g1£öwœ&0ö´Ed ÏlÄ÷hÝœÇ}„{qìä\0Ñ­FZ“|žÍv©ã9ÔÇíœ€ƒêH R4ñÈ–@r	Èl…‘¾#>?\$rñ3À×’61ÌIAê62Â»%ÔlpáÃo\"4\\à>J@Ðü‰ÍÈ¡\"¼ŠqyIëßrD´UšIiwÛòÒI\0\$£CìàÉI%<0‘fIeÐT›2W¿fäZñ~Ç;&BDCéÇÙ†7ÙeÓt5OàÉ£&¨ÑFBÛDñNI®Œãû]~@ìQ,´?)ža1,3™ ®a8J˜üh\"3pRs-¶æÀÔNú8æ“RYh\\ËæÖÚé{¦3F·ˆu5¢D!?{åS÷¹Ç\$ƒç19|ãE¿Ì§-¼Ê¹µÍš­\"åÓ´5¡syÙå51ç‰6'y<Ck‹O¨7w]0¼„Í¨îSœ SÞK“9tôyÃ…	ha¤:–MÈ0R¬çnÉ\$Ö¤K;;˜ €ˆ¸GÊ°l&B\nÁ¥Ð4\$éiE6–à•l²xû\"`·ŒØ\"huUŒõ:5Èí#Þåî÷*Ý(€4ð[7œ•¡,?îå{YÞÙTMs!€Ü…{ÒÅ“P\0,”Üâ)\$~SðßÐî¦äƒcûÀø¬±G4ÌÅYºÊí2s98A¤WÂe~ïü˜õP¦SUÜpÕQ–ÁÐ¿i÷;|­]©Êýë•P9PÁ3S–ªú:eÉý5ïW6‚Œ›#÷}_!tpYX^ûàúÍÇDdý®Hëéâ×4ÔPnŠ\\˜¸ãf¾£>MÔc¿äµ¶°ºÈÙ…¯:—Ñå\$Ó@…ÙÏgO•gùIu£\\wBŒéå•­^±VÃžT%jÅ#¸[¸òÉåÕéÂäó¤Ãßæ#q—voÏe;›8uæbI\0–ãq[¼òìÕ>3ôlÏ0ò Á‰\ræÌCJ&ô1„§=Ìü§ÍÏÇD­2\rˆe™5}óãÑ8.Ý€ÛÑšÊ^xYÑ¸'€.ôž*†CyÆÕ7S˜fœæ \rË)8#Gˆgë%‚V*\0a‰˜Lìf(s˜ \0b¸\$¨Ñz0¸\0€hŸ£À9ú2À`¡øâß¤Ë8\0jÞ’ú2°\0\0ké—¤\0úAéÇ¤`\0oé’Ì€úSê\0\0z}é—§Àz‹ê@þ”úè¿¥¾”zkêBÎ\0\0sê` zWèÀ”\0mêß¤À€n°’z¡èÈ \0nçÏª úmêG£~·úÏé÷­Àzqë\"Îª\0oê7§\0úËé¿®~©zŸég£`€rŸ®Þ¹úFÏ­žúj—±>Â,Éê·°Âz5èç²>úF·¦-\0Ä°~¿úÁèÏ¤\0ú¯ìðÞ±z…ì®Ü¾Ð\0aì‡´þËz“í§Þ½û;í—«>Áú¸‚k>Øú¸Ï¥Êú¹éG±¤\0sëß³>–€d¯¨þ¹úÔ‡¶þúÉí§\0ú_ìo« \0kî­³‰záëw¶žâ{£éo·ž—úqêw¬ÞÂz›è×´~±{@¢B@1û ‡¬~Û±_ïŸ¨ÞÝzÃì¾ÀúËï×£>Þz»êÇ®^õzÇêo©Þ\0síµ¾±z¬™‡®~Ôû­êG­^û«é§½¾‘€gîç´ž½ü9îÏªÞ½\0sðç©¾¦ü!ì·µ {ûì°\$©¬úqî\0¿\0Ä¨\$ž¯üIî\0ûð¦¾Ãû}éh {·êÇ°þ¢zýñ?³_\rzˆ§Á~¢N%ï­Þìz¥ñ'ºß{Œ ÞÆúÇê/À úUêG´·z±òÿ¬þ½üîO±ÞÐ{iðwÍö|›ó/ÉŸ{ïwªž”üÛòÍþÙ\0iï§ÉÀûÇé?Àÿ\n\0ièÏ¯¾è|Wèÿ±ûQðw¤+ûAëï¸ÿ?úÅé×Éò{_óÿ§ß ûÛî°^ôú¹êo¯ž¹üƒìçÎ¿R|#ð©ž¡|¥òç§š€iïoÆ?2|\rë'Çžš{‹õ°ßzÕô®&{±ñ_CúÂ§¤íËì?Ð~Žz™ì7Íœû!î7¥þ•üëXazãîƒ•þùz•óßÅiýƒò×Ãú¸Æ?_ü…ïOÛÞ¼ýEéÒ¾Ò\0gð²@mz‹î×Ìë|?êOÓß {­ò×§¿5ú÷ö·©>×ü_éàÃzaò_ÄVû_öè^—N%ñÿ´žÃý1íOÕþª}\rôw¥~ûý·õ	¿y}ë?¨>ï{ýõ¿¶_\rüôŸØžž{ø‚ÎÃ~!î°\$¿“€gòÇß?ˆüüØÿ™€còÇ®à’þYé Ÿ“ý÷úÆŸ€z¥ñ?zUöoÁ~è|—ðŸÔ_!}ìÿµ@~_é¨>ôþ5òçÆ^×{—ôÇ§ß úáîgÒ_b~wùÇ³þÐû—ñçÚ¾²ú‘ì_ë_yzí²k2zîÐžÿzÓðO¾žì{Sö®IþYëOÉŸ•\0mø‚Ìž£}Ûôš^Ÿ´{êwåÿ&|úð¿û\rû÷ß~øûæ³‡¶?­û§ùWîßûù?¯ß¨{-é‡¸Ð}%éOô>õ~gî?§Ÿ=üyòäŸD|™ö_ÇúkýŸØŸ6¬áèïòß¼}Sþð?\rþ‘ê¬_;üiîÇàßt~©êoÌ_8Qü×©_{YûO¬¿u|Qê÷×zëùïá>Àÿþ Ÿ~ýúOížÄ|ïñÏÍ¿Ãú‡þ/È_0{Còï¬¿±}qêÿÚE{%ë/ÑþÏ}öñþsÿ÷Ø/qŸI¾©\0jüÕõé×üŸŸ¸½ó|0üõþ‹Ùgù/ßb>í{&ùÉïSëG½¯Y²=ç}ªöÝ·+ðçË0¾¢z”þ-ì{û7ÌÏ«_¥@\$÷Yÿ‹×7ÜFž½=~} ÿ•ï‹Õ÷©¯‘`=¶€<ô‰ð»Ö'¼ïH‚½YÖýæ\0’q'àoŠ¿Å€øE8“óWå¯äÞÜ\0002€,ÿÕüCÖWÞ`^¦¾:zöþÿkð÷íKŸ`¾í{j÷5ì³éÏoå¾Ð~fõQìcòÇª¯–Ÿ¿°~@õ•÷ƒñØOžß6½M{Íqñ£óØÏ™_-¿,zšö™ùëùWÅŽ`?3z¦øEèÓòÇåoµž½’ô|Hû´'¶à@|DúañçÇÌ¯M^Þ=pHô•ësÒ(/sžíÀr{\0¡óóú·Ç/½Þë@R\rí“í‡§”_>¿'I]ðÛì×¯Ïáß:¿©FùùñàWÝðà>e|`úéî„g­O‡ß¬¾yz¸þêSóØ\npÞè@r|öùié·òÐ6Þ°¾´}šõŽûÿ·¥0ŸjÀH~s}øÑ˜\r¯œ¤Àì{\0!é«á·Õ¯HŸ†>4{¡\0\rüíG¸ÏRŸ¾ƒ|¨õ‘ñ#ÒÏzž¿A{~öðûÜ\rïå >ŸzTý]éáøO¶`=À¥|Êõ‘÷#ê—þÏež‘Àó|Põ©ó[Øˆ\"/žÁ˜¯­Õð¼èOþžŒ=Aù•ñ '­ÌÞ‘?{|àùî{ã—Ç¤ß->|\\öyéCâ7ìïà^@RzaUé3ÔãCàGÁzÒúIò¬·êÐ0À?Û‚dÛ•8“ÓhÐ9@’>÷%èþ-ñƒöÕïýwÀ›{öFâ4âP¬¿~!öø×üOø_=Œ‚#åéãÖ¨JŒé|rõª¨)H0ÏVŸË¿w‚—¥ëÛÞØ!O¦ß,¿‹ƒ+¥÷Ò×ðïÿ`ÀÝ|Àö>ÛÒ‡ïžÞêÀ}a)÷¬7²ÏÎà»½êzk\0väh!t4A6.KÒ\nÃÜÇô‹_0=V~Øú¾3ùx\nOÁ {@BŠûUêÄ‡£ïH`åAd€pù•÷—¨Pß À”zñ™ööÇ¨°pÞä=Lz5Yê+æ·ÙÀßí>IzÔý¡ð“ìá÷ O>‹ ø®	sä'«¯÷^Ð½ˆ~Nø-î¤w¨Oû^®¾Z€9õïˆ>°>Ÿ9¿ïƒVõ}ó»óª ß–%|bú¥ø;×8AÐFžõ¾½}Mæ{Ü8Ð q@ƒÿÔ¨(ïöß¬ž¿y°ðÅçÉíš QÑµžì#Ž|D÷R”H©!ÃòžÔEÖ<ø“3óöˆ»ã#„xƒ!	º'Z)!«ÒFoö\n”I”¡€KA’|µ	 –¤0ð’‘\\¤JuÔ…Žº,t<D”˜ù1ÚE†ìí/Ø†F°Ý¶ŸR„³	‘*TÃ9Ýo2\\E\nÁš8MŒk‹ŸÚ@‡	Â4D^Ñ€¤Ð˜–Á[«5àDœÑG¢ìA&ÇÖ‚\$–i§íÃì‡î©	ôÁ*çÛ÷’\ndh}±t)„whhlBK„¬}qrp\n`QD‘œI¡	UêJ°©ò;®…PÐúâÔW°¬Y¢äc@|.›8MÐÏ¶\"ÿ%B~Ü’’Q¦a-þC‚%šx6SF0ãˆ‚yad¸‚dRÿ°}ƒô,¤ÏÆ¥ŽJâ¥pã¹ÁZ,ÄCëÂÛG”†ÙÂ˜L.¯á#…\$,:Ø„ré‡Ù>žÿu“	…š5CÜÈ	„!>vÍ~Ê\0Óâ@·˜ø²¤„½É'©¢t†Çºó¢ä\$ÞËH?,0pp£ÀÌC\nG„ËF['è`ÂÁª2×…·Zùá{@aQ½ÃBâÓÀßÈŸ ' á’éfKª\rPøÒ(_¨pá/ ·Ba Ñ`Sá\$ž!”2Ú†j‚æ\n8\0jŽÙ‘ƒTXnDÛêVr²ˆØ¡s¦+…Ò‰Å4hQ(¹\0¤,Jà]í-ÀÄ­¯‰C1EÊM\0ªðÎãÁª!hF\0¢ñþWt ·™r¤ï†Z°¨\$!@R{³F†ÂˆáªPHÆQ”¦†9Q+ˆafb¡’\0(eÇ‚ä/ä\$*ÁÔTù\nEùU`Òæ¥^ŠÉºBð§†BL\0P’Y*8T°«€«C–I<Íš9t”h,¡\"²#hJ…\0‚ôÄ\"ZQN€(C\\{ñ’ô5ðåSC–‡^Æ²óãñPí!OBé®“NŠ:Hx'üQ91Å\$Ç‰!÷À0®»ØãÞCy\nS(U¶¨¤Âî…u\r3/t\\‰8“ Ž#8@¢à\nìÑ€9ÃybHœé›*7]R_3^8ˆ‰à>ò'„g aY~ÂEC`ì\0+»àj‰Ü\rØ8Žâ@£­ÈV`\n\"3D\$pØ€®°	8DD¾*5DGÇÂáŽ…wIQõ°	S“\$ÄFYÄ1ÌˆQ† H‹ÁDx¨ŠÛ²BcÖÉ+®FKÄf[BEL˜\0­“¯OÁÿ@&’…Òƒà?ä*ÈTÂZ¡TD:CŒtùÒ\$ƒgÒâ²J„‡\rš!‹\$xX(âb#!÷†Š“®\"¨}fEž¨\0PDÔ\róçÉ…¢*²TˆÊí	:<Ôrè Rv€C„‰ýØ[%æJˆ€¢-Cmˆ‹Å”#´@ú1PB—ˆðÌQq\"Hl„yb7ÃØˆdÊ\$FÄò¢C³@©žà˜LÑÐÃÄ\$ÞŠ\\EX’Äœ‡Þ@ý\nÙ’Ò‘‡îv;À=úÈ\0ID9\$lb*ÂT‡;\n~\$l%4‰Oà2‰ˆª˜é2	&@(Ù!D¸ˆn†R!k%ä\$©-\"`²„?;%S&ôÀÑ_BRCš~©ET4.R¡¡‡?bG\"&‘ˆ˜¬ÅéDQd„ÉÂ Ò„›R6 ¦ˆÔ|.'\"¤Q9â6(ˆÝB%ã'8™§â¢r\"*ˆ‚6'D(s€\náËDù=÷ lET‘,azŸÃŠÚ&H´¿QP¢ÄU‡žË‚t3ˆŠ±PB¡ÿ…ø‡t’HÄ&QØöÄŠ6Fd”ÌCdVqas2š3|Â!ó1¨H1aÍÂ§‰_¥	”(3þ1’0ÄLŠUò\"z+x†(Lñ™Ñ#ÝQñT#‘\"’²ŸˆëpDEèˆŒp¢1\0IˆÉFhª}uýC­,Nè±F™MDsF\0LGh¥ñPZ\"G›î*œUð‘¡u2š‰’„OZQŸj‰ÇR+\$I¸eQ\$EyH^%AúÈ®‘^¢N¢¶La%W8­¬§âLÅt>¥²+¤JèŸ‘,™³L>‹A‘9¢ˆ¬‘/‘Y²­Š¸Ê~,ä9”=çãP™DÃBOv+¤Lx´Œ¦ƒë¤‚‰™	FÚhšÏbºDÓÑÄü:,¬‘I\"ÅÂA‰»­”üN¸bqÅt‰Ë¬¬F¸¬‘qâ«Â¸Ùj+“4fWñ<âá …„f‹&.¨~ÈžÈöbÅË‰õº,œSSP¨âÂ¤ŠÉ\rÖC°˜\\l°â„E½C7­”üPØ®‘CÐ»¡€H#’(£!T›qEÏÐÅ‹Ç¦!¤Rlñ\"m3‰Ìg.)Aô8ÀÑ:áÍB­‹ÁZ0;j3Še%%¦ÇÀÙ†\$oŠãèük4‘PÑ²ÆAM\0ôT˜‹ñb1Â÷cÓJ12(«Ìz¢äÅÎ?ÍB)ÔHÈÅñ\":Ea‰sA‘4G×vÑ‚ÐèEwE¹\n´XD:‘_\0#ÆHA\$~†\$‚Óõq“£%æ\$ñ#è±,Ñ˜ôÅŒc®2ã\"h²Q†E–‰h{þ/k˜´(Gâ]ÅÿdM®/ÐÄ1›ÒYÅ§ŒæÌ2-Tdèµ¤ƒ^Å°C€q¼[HËñ2\$Å·C|%ùï¸L,„PÄÔ‹q^»!À±‡SE¿Œ44ñsc,²&‹˜Z'dU”ÑŽc73HÙ	J4¼]Hw‘ãLÆ\rˆ‡‚+iFDpþ#L²\$Œ.5’“þ±®@«EôBøÉ~|kÄ0!<\"ŠÅûLmhûáy\$¬AþÆÏ#Ž‚60	 	ib ¤ŠAHúl;(ÚÀ\0/¡ŽAH´H˜ÛñdçÆˆz}\rÑ¢„I0ºb– rEÁv7jD¨Ý.´cvqŒ¸Pt,Àùà£&¢ìJH€%#t)P	h8€&ƒ>¸Ê†\\+d)JÏ¶P\0 kÜÂ„7ÐiÐb§B”\$åZde3ë‘À£‚B”A¹û¸W¡ôøBÀ?C	z7œn¸W©ÈÍ¢#Õ®6é˜åhå#”ŸêŽf˜á/Ê+ÄÃ¯@'ÜcaÖ!ü,?‘>#¡!]iö\$º.\0	ÄxãžCÂ…c²18ê0ŒFýuÉlùñ 	ÉAé2WKì—à>¹ùÔñ»ã¯»:F¤)	øçf©~P¡%ö…Å­©ÿh	pÃl¡’4FˆèÜ˜ûÇ@‰Sª\$’(åñÞCé#kŽø|T0hðñ·£Â1«EÈŽüÿ°(ïº£ÉGŒ(žÜcäp¼b˜¿4f0ôy˜‹hà!ËŠ‘\"S²ó‘èG¨\0²ì†=.hóÑèÙ¾ˆ¼F¢ |.¦=¡õÙ…G²Hopt=rç¼ÝÓ2…å‚=¤z¸_QéãÐ:Ñ2²>ÈóæoLåÇ·Fh€5/¹&çæ#ì\"	HAÍ}ØûD“\"Â÷Dj-1øÈ^QöR2 NŒ6Í~?dw†1\"PtÃ\0ŽÒ„¶<œˆ©ÑßãüG–BZF?Ê&¹\0ÿ¤!0Ž÷q\\€pÿ!Ð£{â¾?øÒ4è¼\"Ã)^(W¨H¡ôH\nŠõ'²\08ÞÊÎ\0_BZŽp>ÀÓé°Ø\$n…ƒ^A\"3Ö;¨¢˜êGòA ÅÚ<kðÊQ.È1F« ö’š2aœ\"A&˜ùòtm#d\$Fê\0šLúz;8òÉ€\$#€¥!1B3Øâ aQ£=-í;³„gˆ¯¡¢ÇJ­!‘Óâ°ÕÕÆî®CzéÐÐ\$GßË	†C©*t`È‘d5£b M	£! ü’Ñ_\0S\r^ä‡èüôÄµC]\\¾ÅjBÜ6Ëò\$cwG–w‹’9j&¯ aO©\$‘4…Ž@REè^áôD´ÅL4,7èÜˆõãŸ{=Ê”?K%±IUãÁ£*G\rPÎâ0Ø{².Y`3	DìBDŠ'hƒNãá¤C—\$„GñøÆh\$cÈZ‡»!ê9Š0VR3Qâ¡ÿ‘¢~6CÔ€©2£uÇ‡0ƒ¦4,MXrG¹ÐÈã\0œ”:ü9ÜÑP\$ÕJH‘/üy§¾dwÇÛ@=‘1N(æ@a@()\n3#ñ[¯yôä\"ÜLsŠGà~˜^älÉ HDÔˆ.<y`\n\0À\"\"ˆeÐ˜†H¤}(‹`Õ	,F¡Ûj¨yh	Ð¡\"	DåvI<|v([\$\nÃË#~\$÷,;<d˜Ø­E¨‡\\h0zY'ˆ!à²¤@J”u!(_0ëƒôÆÝ@°„2\n>(EèÑÏ¨GVD“\"•Äi)6\$y fd~€fC4d:¤ †3›²¼•âJRWHÎF¸A‰À ÀC TŠ–Z@Í%¨Ìq2.(£rF…’‚9”„¢	PQ#G’ºFRbAŒ¥‘?‡Ù¡\"ù!`\nÈŸäÅGiG8‰ü©ï4ÚQÎHCAbLš(òh8¤ÍG–“8M,•4¿HñdÏ%NÜ~YÜœŽ”ÈÑ.»;@q&°ûs³¹5k3B¤@å%uœƒù6(Ñ\$× ØU%š7²'ˆHgìÏ¤¤	I¬‚6!9ñèL1	ÒŸÈ‘\$ñ&µ\$›95L‰#nÃ²#6{–¹þ£Eääí -'v@Qù²8ä…¢\0Ç:?GN7T@è^òhäHÉ£,•\n;Hcv-@)ŠbfK“5é>@³¤úIö\0É%®Kh¶°0©ú¥ŽjFs)âÓ|P0©U#‹°yxZ§-‚á£CC€þ¼åÜg¼‰/.O:ItFçäÓšCM€]¦ŸP`XÀ3àbŒÏ\0.&llÐÀ3Ò‹ÀÇ46<h¹Ô4¡F(Ì-K+øtˆ¼\$qªàAÌ0\0001€d\0^	í3ÚÄýÃ–7´\0\\ðOÎà+\0000z&o}ÂÈm‚u°2†÷JX6ÂRÛÔYK¦õ¥,†/\nø\0ÖSciÒ˜¾\0006”ÒáÒS3óMò™e0€8”ç)|-¬¦2å5ÊyH’SâÙ©KR•CÑÐ”É)âTR²¡¥5J‚_)Tœ¨Bä)À’€4•%)‚R¬¦‰Q’œ%J=Ð•/)æR¨ySò¢_òÊ£•üúU4©IP¦å:@V~ñ*¦Ut¨±cÒ¡å>Ê‰~³*¥íÛÉW¢¥TÁ@•*ÎTl©8(¬†•J´•~\n©U’¢Á@•-+.U¬¬ØAÒ¯@’Ên•¡+\nª)Zò°€’Êv•·)‚\n§¹[òž`o€0•RùUü¬YX2˜#ÊÄ”½+DûäyYR°%N>G•Ÿ+ÒS£äySR¾%fJñ•«+žS”®9KO‘åoJü•àùW°iXï_¥UË\n•',2WL®ùap%T½d•u,1|±i]Ò±¥IË•ç+ªTä±i^òÈ%:K•÷,’Wì±iZÒÃ¥0K•µ,²SÌ±i`²Ê%xK–,ÒV<	\\ÒÆ\0/Á –#,rYl±IgH%Ë–;2X«ÞYi\$ÖeT½–/,ÂRÔ´écrºå<ËN–‹-Z¬©YU0	åŸËT”µ\0žZœ©ÈòÕå¯/€O,ŽZ4¦òÉå´Êy€O,®YÄ©8òËå¸Ëj•»-nUD³Ç©RÃeºËn{y-v[´)jÙ \0Kx~w.[dµ‰kïo%¸Km—ôn\\4³9qÒáÓKx€­.Z\\§H ’ØeÍ=¯–É.ö¹iq2Ù@/Á—.*\\#Ö©rÒä¥Ô\0_,É->[ì¥©uòç%~Ë¯—?)Ò]|¶‰u²ëåÑÊœ—_.ž]\$ºùn’äå×Kw–y.¾Y¼¼BÌ’ß%åK•S/.]¤¯	yríåÚËH—-*^¼´É{2ðåÝ¾—žø*^ü¹yzðN¥T…|—a/_4½Xòù¥êJð—Í.ê]\$¾iw²%óKÀ•9/š^áÐ³˜²¯%Få”¹/ö_Ü¦)€>%iÌ8)+þ`1Â‰`2°%ÿJ¥˜qŠ[ÌÀÉró’Ì•_0<ÞÔ¸)]Rÿ¥[Ìw/Z`”Áits%àL—ó0r]d¿©‚Òòf\nÌ—Å0†atµÙÏV¥4Ì3–É0Î_„Ã9„rþÞ˜L5˜y0žaäÂ™†rÍÀ€izÒû2lÂ©…Ó&#={zø®_óÚ‡ÓwÌS˜œJb´À§¨Sf?3˜¹0eðÜÅùƒï[¦1\0s{ÿ1•þÌÆ‚^“=Ìl˜e/íõ|ÆÉ†ó&Ìp˜w0òÄÆÉˆ&!Lp˜Y1*`S×éKæAÌs˜ôŠdÇy€ïŸ¦AÌ{™1öd<ÇùÏY&4>Y™+-NdœÈi€ïŠ¦JÌŠ˜örd¬Èé“ó\$&MÌ’—öôrcCÖ¹•3&&SÌš˜õîeLÉé‚XæTÌ¢™g2’e|Êi€R¦4=™{2²eÜÊé‚µf^Ì²˜2ôÖeìËi˜ó.&aÌº˜Y’cCØÉš30&gÌÂ˜2ùfŒÌiƒïÒfhÌÊ™·32f¼Ìã…_&2Ê™Êö¾g<Í`7`I&:°ø‚Ë3ža)ÌP\$“7ž“L˜a3ú´ÎY‚“ 1?x˜ß3¹ëLÏ©OI¥ÃÌš	3jh\$Ï =¼Là™×.Vh3Ö™gs=æ~Ëäš#0Òh¼Ð7ð“9^åÍšpRb<ÑÉ¡ÏIž«Lå˜¥4Fb¬Ò‰š“8æ-Í(™Û4‚cÒ‰¡b&“Lâ™û1¶h‹è9œ³fœÍ}‰4îhCó¹£ó8ß Í;šFüîi±½§Ü“Dæ\rÌò|i3–d\$Ñ\0óT&—Ìã{·5BjÏ×§C{.g\0Íê	1¾WÜ’Ý&®‚šÀöÆkÕ°YY@æA:~E3òjSÜÉªRfuÌ”š#2Zk¼Ò¹Ÿ¯h&rÌœšï5e×y¡M&¾ÍtzÃ50éÌÏ)•SD^•Låz›6:j¬Ï×ºÓc¦¬ÍJzÅ6:j;Øiœ¯ŽfÍÍ™‰4EéÙ¹²³:ÞŸLå™¡4Ff”Ú‰¯SRžÃÍ¦›#6²jÍÉµQßÌe”«6ÚgDÐh\nÓ@à+M¯wZhDi´a§úM¸šGZl4©±NA:™þpRkÛiƒ³E\ríA:›|q÷\$Ý)¸pN¦zA:›4Bn¤Ûù…óSX|=Z›Ÿ76hÄÞÓ§fÛK¡›u4vo|Ý¹uS{æãÍ%	 Æ8˜YGN­#ídp|Ö4ÌcÅèÑqÆ¥AM¬\\_xØQg§ ²Œ½utØÉÀ‘ ¯… >DdŒè¨`\"ùF™œ0%¦pÑñX×H}¢IÆ™f9-‘2CXû‘¦P\0KJy:?L“hÍIVÑ5Æz(¼XxÓ1o#I2ñ‡Ž|´:.8Õ,°cTÅx…\nŽMôdè n­YcÌœ•¾rTf–DÒY˜ôÎunÈº1	œ²A((¢EÛ\$¡t÷DcXVÉ(!^Â¥‡[\nÞ%%é¿Ð§b,È/ˆ&)ê)T%±ØûÎtŠª†÷|=Js##Å	G.\\Ž`xŒ¨'ÆÁŠ	&2ÜEXËÌ˜gÅíAñ8QERS0 ÏÙÄ­>Ý8€”Ìá¹Äs¥u\$ë@'8ˆ\n²T91gÎ¤#i8­ÄâÙÅñBgUE˜#´Gr%¼ç9Õ‘cõN³?-8Ö(L;xšÑç\\Æ“qópÿ³PŽDäCÿ¦r\$P“ô³¬§_Åä\$¥š(LP6PNg'NÑœ¡;Fts\$);¨°'XE	’Ìƒâpì.H´‰€ç-Dne	.âØ§ŽÖ!ÅtŽ‘9¾/réÎ±]#ÎyŠÈŽ\\’\\çÙÞ(­fÎ‡ç;îpDà©ßsƒ\"é2šŒ¼ëý\\á(®“¤'Nû&îî+\$áùÓÓ¦§P»‹#:^xœê\0s¨xÈ›÷:–+¤â£ÿÑ]'VÅÙ?:ÒI´ZYÆ‘™\\Ã²=ø…‚uäï¸·Œ®aãNÂcÛ9\n.3!™Ñ=\"ã\0Y‹Ë\"šwÜ^†Xs“gžOA¯=/jÆQ3·\"ñ2Ÿ’ÌË:5Û5ô)³‘aŸËfŒ{Ñ2CV‘!Š³«5	Ä3T*0Õ­Èšœ~Š\n5¤7hq1;‰hÃ\$ÞHû.äe0ó	CÔwjŠNJÜ=©+pÊ‘Í¥C¢Š–ò(·Œt¡6Ä†‡ë ZoµyLågÅ·O¢|X¡À5ƒ\$åÉgànõ7´ùdÎ*2º'ðgB™½o¦˜iúÕ#’‚Vê)ù>Y>ÈP'Óïªò#^ý>ø´éÂ’Ó‹˜70m`[P9iiÎë¦~Ÿr0~}ë””¶Á	\\Ã}VX¸íšó5@>@¢’Ó©‰?5K€4)ù©¡gé§âkj¥R~j”ÀNóö[ÚÏÍW”›ø\$ŒýrÞSóZ]KŸ®v§{[P‡Ê'§ÙOêiîx‘§³OæÍmJf%š\0ÄáèÌS€À³³þ„¶'†pà ,•K<Õ˜RP´»•À`\\Ô³@]góyR\\8hØ `RÞ'ã7†À™H„çBc(7çf¼­1’¸c\0wMo3ÔsG@‘ä`7zg§žFP\"(Š@–mðÃÆÎH§:N3>eK:t%,†(ª´ L—MEâŠAVŸO¿M:qè¸5E‰ƒ“¨%-ŒŸ)@ŠjÚ†SL—…ME>dA“es¬•ø«Ÿ™Azˆ7Dë\nÙ‡µÐ.JÝ\rƒ5ÕlÄK•³\0n Út@\n2¹ð:Ã?Vš§º ®\"ƒ†5lÉ­³&×S†šê€Q[	}\0Ø³‚Ké>tG0T¾‰ãÃ»Ø:Ž¬\nÈj!YÞ+!Â¶š„° íŠÁ(-mØÁj!\nŽjÍ´(E Ð©â…!5@JÓé•}6 –Ò…áêT+A&¡bðZ‚èVE6iÎž«KŠ8BècaY(_®'QôÒWÕ	%`”\$£}n\\3Ì£º-4N«Ô¡¦ÆÝÂŒô5ÁEPÙáŽ†ˆsJ\"Ü½P*	hÒ‡+?åÂSë”ÐÑUbwfèHÑt'/\\xÐî¡\nrô\riF“T=¨y5¶P­A<J”<²Pæbüd*ÿP¢¯óPöFæ¨¥\re8'PÓÕ+µf¼'È¸¤Ó´D@0Ñ‘DmNê\")©À7Ñ Ê,E7X6\$dUÙî\r¢V&0¹Ú%fæ@¤4×UäP²g)Úa¦ži†Ó…¦ÓNdí7a<ˆ(¦·æ‰tJ\",áè¥¯² ¹>dë¸E€:Âæ(¦ÑRPQ S-Å84†³ˆ–OU?Í´û3°x`Gœ=gK¤øPb±ê	À'ðƒ¾xBk8.b4¨FV%U¨ÅXkJœxQŽ›ÝÌðÅá\nÇƒ/TãFŒ¥¥šÔaÏ\0m_eF\"‹¢å°!êš‡\rYm1F2RÓp I“þhÄµG¢òÔ(Øz¶Z3 “hÏ¸ém>‹Úhss4dsÑ„Qf¢Âq©\0Nä°Q2ÎÕXñ©5Ý âDÕŽ¡¤5žÑˆàTÔpû‰†k-BŠŽ\"ÛÚÊœ‚_Ñ¹^n}ùÞ¦¯thÝ£qqG8õ S-s§øQÄ¢Á>|+:-¬Ë“âˆ–hU-€x4±IÎ“åÑém×Gâù–€´hð·ôGÔ‰Ô0ÓåÑôªUËÕÚ>ôÉèB“£ðîôú”¸4.ZM„9[¸Ð…ôôôI`P:£ñC¼•ÃbÌýœÂÝs\nuÌ(V€€º–\n¢Øsú%T‰Ö£P¡'Bâ|Ë3êDæRQ\n ]?”¤þŠ6€aT_OÌ¤xâ¸C90ÍÜÁªQÖ5ÝI\n,¤TàT’«qC @*5J…ŽåÒMŸ©IT°èI¨‚£y’œê’ð>ªJ«„i&\n[I1¬Š‘šM\rcÀˆ˜å¤˜jþ“y±cŒîy™‡:ã±Nãž—BìM*t6ieÏ«\nÓ±ÀàÒyz\nj¦R\"tÐà‰ÂJ/ý; ”h‰>«|Òÿ½f¶\0¼ÃZ‘órÀÔC€ez&k`ŠÒp‡ šÅ\0s.„\$t†\$éSÆ#DM4xCšU‹ð)WÒ„\0ËJ…§¥*jV€¥\0*§\0\0ÏJ´ ólb€–ù\0¬`Z•¹×£vT°Mø=¡I'€ŠÞD¦¨_„™ZWà·ç³¸PÑô+½ê\n¥2NŒGS\"›€šf\$üj˜ª6ˆVž6µÉ5pTŠ>“Ò€3ZóXkÈ");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôža8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wþ\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹ž”ªÓ²Þ»\0\0;";break;}}exit;}function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
idf_unescape($t){$Qd=substr($t,-1);return
str_replace($Qd.$Qd,$Qd,substr($t,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
remove_slashes($Hf,$Jc=false){if(get_magic_quotes_gpc()){while(list($x,$X)=each($Hf)){foreach($X
as$Gd=>$W){unset($Hf[$x][$Gd]);if(is_array($W)){$Hf[$x][stripslashes($Gd)]=$W;$Hf[]=&$Hf[$x][stripslashes($Gd)];}else$Hf[$x][stripslashes($Gd)]=($Jc?$W:stripslashes($W));}}}}function
bracket_escape($t,$Na=false){static$th=array(':'=>':1',']'=>':2','['=>':3');return
strtr($t,($Na?array_flip($th):$th));}function
charset($h){return(version_compare($h->server_info,"5.5.3")>=0?"utf8mb4":"utf8");}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nbsp($P){return(trim($P)!=""?h($P):"&nbsp;");}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($C,$Y,$db,$Nd="",$Oe="",$ib=""){$J="<input type='checkbox' name='$C' value='".h($Y)."'".($db?" checked":"").($Oe?' onclick="'.h($Oe).'"':'').">";return($Nd!=""||$ib?"<label".($ib?" class='$ib'":"").">$J".h($Nd)."</label>":$J);}function
optionlist($Ue,$sg=null,$Oh=false){$J="";foreach($Ue
as$Gd=>$W){$Ve=array($Gd=>$W);if(is_array($W)){$J.='<optgroup label="'.h($Gd).'">';$Ve=$W;}foreach($Ve
as$x=>$X)$J.='<option'.($Oh||is_string($x)?' value="'.h($x).'"':'').(($Oh||is_string($x)?(string)$x:$X)===$sg?' selected':'').'>'.h($X);if(is_array($W))$J.='</optgroup>';}return$J;}function
html_select($C,$Ue,$Y="",$Ne=true){if($Ne)return"<select name='".h($C)."'".(is_string($Ne)?' onchange="'.h($Ne).'"':"").">".optionlist($Ue,$Y)."</select>";$J="";foreach($Ue
as$x=>$X)$J.="<label><input type='radio' name='".h($C)."' value='".h($x)."'".($x==$Y?" checked":"").">".h($X)."</label>";return$J;}function
select_input($Ja,$Ue,$Y="",$uf=""){return($Ue?"<select$Ja><option value=''>$uf".optionlist($Ue,$Y,true)."</select>":"<input$Ja size='10' value='".h($Y)."' placeholder='$uf'>");}function
confirm(){return" onclick=\"return confirm('".lang(0)."');\"";}function
print_fieldset($jd,$Vd,$Zh=false,$Oe=""){echo"<fieldset><legend><a href='#fieldset-$jd' onclick=\"".h($Oe)."return !toggle('fieldset-$jd');\">$Vd</a></legend><div id='fieldset-$jd'".($Zh?"":" class='hidden'").">\n";}function
bold($Va,$ib=""){return($Va?" class='active $ib'":($ib?" class='$ib'":""));}function
odd($J=' class="odd"'){static$s=0;if(!$J)$s=-1;return($s++%2?$J:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($x,$X=null){static$Kc=true;if($Kc)echo"{";if($x!=""){echo($Kc?"":",")."\n\t\"".addcslashes($x,"\r\n\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'undefined');$Kc=false;}else{echo"\n}\n";$Kc=true;}}function
ini_bool($td){$X=ini_get($td);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$J;if($J===null)$J=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$J;}function
set_password($Vh,$N,$V,$G){$_SESSION["pwds"][$Vh][$N][$V]=($_COOKIE["adminer_key"]&&is_string($G)?array(encrypt_string($G,$_COOKIE["adminer_key"])):$G);}function
get_password(){$J=get_session("pwds");if(is_array($J))$J=($_COOKIE["adminer_key"]?decrypt_string($J[0],$_COOKIE["adminer_key"]):false);return$J;}function
q($P){global$h;return$h->quote($P);}function
get_vals($H,$e=0){global$h;$J=array();$I=$h->query($H);if(is_object($I)){while($K=$I->fetch_row())$J[]=$K[$e];}return$J;}function
get_key_vals($H,$i=null,$jh=0){global$h;if(!is_object($i))$i=$h;$J=array();$i->timeout=$jh;$I=$i->query($H);$i->timeout=0;if(is_object($I)){while($K=$I->fetch_row())$J[$K[0]]=$K[1];}return$J;}function
get_rows($H,$i=null,$n="<p class='error'>"){global$h;$ub=(is_object($i)?$i:$h);$J=array();$I=$ub->query($H);if(is_object($I)){while($K=$I->fetch_assoc())$J[]=$K;}elseif(!$I&&!is_object($i)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$J;}function
unique_array($K,$v){foreach($v
as$u){if(preg_match("~PRIMARY|UNIQUE~",$u["type"])){$J=array();foreach($u["columns"]as$x){if(!isset($K[$x]))continue
2;$J[$x]=$K[$x];}return$J;}}}function
escape_key($x){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$x,$B))return$B[1].idf_escape(idf_unescape($B[2])).$B[3];return
idf_escape($x);}function
where($Z,$p=array()){global$h,$w;$J=array();foreach((array)$Z["where"]as$x=>$X){$x=bracket_escape($x,1);$e=escape_key($x);$J[]=$e.(($w=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X))||$w=="mssql"?" LIKE ".q(addcslashes($X,"%_\\")):" = ".unconvert_field($p[$x],q($X)));if($w=="sql"&&preg_match('~char|text~',$p[$x]["type"])&&preg_match("~[^ -@]~",$X))$J[]="$e = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$x)$J[]=escape_key($x)." IS NULL";return
implode(" AND ",$J);}function
where_check($X,$p=array()){parse_str($X,$bb);remove_slashes(array(&$bb));return
where($bb,$p);}function
where_link($s,$e,$Y,$Qe="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$Qe:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$M=array()){$J="";foreach($f
as$x=>$X){if($M&&!in_array(idf_escape($x),$M))continue;$Ga=convert_field($p[$x]);if($Ga)$J.=", $Ga AS ".idf_escape($x);}return$J;}function
cookie($C,$Y,$Xd=2592000){global$ba;$F=array($C,(preg_match("~\n~",$Y)?"":$Y),($Xd?time()+$Xd:0),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$F[]=true;return
call_user_func_array('setcookie',$F);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$X){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Vh,$N,$V,$m=null){global$Xb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($Xb))."|username|".($m!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Vh!="server"||$N!=""?urlencode($Vh)."=".urlencode($N)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($A,$le=null){if($le!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($A!==null?$A:$_SERVER["REQUEST_URI"]))][]=$le;}if($A!==null){if($A=="")$A=".";header("Location: $A");exit;}}function
query_redirect($H,$A,$le,$Rf=true,$wc=true,$Dc=false,$ih=""){global$h,$n,$b;if($wc){$Hg=microtime(true);$Dc=!$h->query($H);$ih=format_time($Hg);}$Fg="";if($H)$Fg=$b->messageQuery($H,$ih);if($Dc){$n=error().$Fg;return
false;}if($Rf)redirect($A,$le.$Fg);return
true;}function
queries($H){global$h;static$Lf=array();static$Hg;if(!$Hg)$Hg=microtime(true);if($H===null)return
array(implode("\n",$Lf),format_time($Hg));$Lf[]=(preg_match('~;$~',$H)?"DELIMITER ;;\n$H;\nDELIMITER ":$H).";";return$h->query($H);}function
apply_queries($H,$S,$sc='table'){foreach($S
as$Q){if(!queries("$H ".$sc($Q)))return
false;}return
true;}function
queries_redirect($A,$le,$Rf){list($Lf,$ih)=queries(null);return
query_redirect($Lf,$A,$le,$Rf,false,!$Rf,$ih);}function
format_time($Hg){return
lang(1,max(0,microtime(true)-$Hg));}function
remove_from_uri($if=""){return
substr(preg_replace("~(?<=[?&])($if".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($E,$Db){return" ".($E==$Db?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($x,$Kb=false){$Hc=$_FILES[$x];if(!$Hc)return
null;foreach($Hc
as$x=>$X)$Hc[$x]=(array)$X;$J='';foreach($Hc["error"]as$x=>$n){if($n)return$n;$C=$Hc["name"][$x];$qh=$Hc["tmp_name"][$x];$wb=file_get_contents($Kb&&preg_match('~\\.gz$~',$C)?"compress.zlib://$qh":$qh);if($Kb){$Hg=substr($wb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Hg,$Xf))$wb=iconv("utf-16","utf-8",$wb);elseif($Hg=="\xEF\xBB\xBF")$wb=substr($wb,3);$J.=$wb."\n\n";}else$J.=$wb;}return$J;}function
upload_error($n){$ie=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($ie?" ".lang(3,$ie):""):lang(4));}function
repeat_pattern($sf,$y){return
str_repeat("$sf{0,65535}",$y/65535)."$sf{0,".($y%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($P,$y=80,$Og=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$y).")($)?)u",$P,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$y).")($)?)",$P,$B);return
h($B[1]).$Og.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Hf,$md=array()){while(list($x,$X)=each($Hf)){if(!in_array($x,$md)){if(is_array($X)){foreach($X
as$Gd=>$W)$Hf[$x."[$Gd]"]=$W;}else
echo'<input type="hidden" name="'.h($x).'" value="'.h($X).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Ec=false){$J=table_status($Q,$Ec);return($J?$J:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$J=array();foreach($b->foreignKeys($Q)as$q){foreach($q["source"]as$X)$J[$X][]=$q;}return$J;}function
enum_input($U,$Ja,$o,$Y,$mc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$de);$J=($mc!==null?"<label><input type='$U'$Ja value='$mc'".((is_array($Y)?in_array($mc,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($de[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$db=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$J.=" <label><input type='$U'$Ja value='".($s+1)."'".($db?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$J;}function
input($o,$Y,$r){global$h,$Bh,$b,$w;$C=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$Ea=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Ea[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Ea);$r="json";}$ag=($w=="mssql"&&$o["auto_increment"]);if($ag&&!$_POST["save"])$r=null;$Uc=(isset($_GET["select"])||$ag?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ja=" name='fields[$C]'";if($o["type"]=="enum")echo
nbsp($Uc[""])."<td>".$b->editInput($_GET["edit"],$o,$Ja,$Y);else{$Kc=0;foreach($Uc
as$x=>$X){if($x===""||!$X)break;$Kc++;}$Ne=($Kc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($o["field"])))."]']; if ($Kc > f.selectedIndex) f.selectedIndex = $Kc;\" onkeyup='keyupChange.call(this);'":"");$Ja.=$Ne;$cd=(in_array($r,$Uc)||isset($Uc[$r]));echo(count($Uc)>1?"<select name='function[$C]' onchange='functionChange(this);'".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).">".optionlist($Uc,$r===null||$cd?$r:"")."</select>":nbsp(reset($Uc))).'<td>';$vd=$b->editInput($_GET["edit"],$o,$Ja,$Y);if($vd!="")echo$vd;elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$de);foreach($de[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$db=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$s]' value='".(1<<$s)."'".($db?' checked':'')."$Ne>".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'$Ne>";elseif(($gh=preg_match('~text|lob~',$o["type"]))||preg_match("~\n~",$Y)){if($gh&&$w!="sqlite")$Ja.=" cols='50' rows='12'";else{$L=min(12,substr_count($Y,"\n")+1);$Ja.=" cols='30' rows='$L'".($L==1?" style='height: 1.2em;'":"");}echo"<textarea$Ja>".h($Y).'</textarea>';}elseif($r=="json")echo"<textarea$Ja cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$ke=(!preg_match('~int~',$o["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$o["length"],$B)?((preg_match("~binary~",$o["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$o["unsigned"]?1:0)):($Bh[$o["type"]]?$Bh[$o["type"]]+($o["unsigned"]?0:1):0));if($w=='sql'&&$h->server_info>=5.6&&preg_match('~time~',$o["type"]))$ke+=7;echo"<input".((!$cd||$r==="")&&preg_match('~(?<!o)int~',$o["type"])?" type='number'":"")." value='".h($Y)."'".($ke?" maxlength='$ke'":"").(preg_match('~char|binary~',$o["type"])&&$ke>20?" size='40'":"")."$Ja>";}}}function
process_input($o){global$b;$t=bracket_escape($o["field"]);$r=$_POST["function"][$t];$Y=$_POST["fields"][$t];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return($o["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Hc=get_file("fields-$t");if(!is_string($Hc))return
false;return
q($Hc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$Wb;$J=array();foreach((array)$_POST["field_keys"]as$x=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$x];$_POST["fields"][$X]=$_POST["field_vals"][$x];}}foreach((array)$_POST["fields"]as$x=>$X){$C=bracket_escape($x,1);$J[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($x==$Wb->primary),);}return$J;}function
search_tables(){global$b,$h;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$Qc=false;foreach(table_status('',true)as$Q=>$R){$C=$b->tableName($R);if(isset($R["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$I=$h->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$I||$I->fetch_row()){if(!$Qc){echo"<ul>\n";$Qc=true;}echo"<li>".($I?"<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>\n":"$C: <span class='error'>".error()."</span>\n");}}}echo($Qc?"</ul>":"<p class='message'>".lang(9))."\n";}function
dump_headers($kd,$ue=false){global$b;$J=$b->dumpHeaders($kd,$ue);$gf=$_POST["output"];if($gf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($kd).".$J".($gf!="file"&&!preg_match('~[^0-9a-z]~',$gf)?".$gf":""));session_write_close();ob_flush();flush();return$J;}function
dump_csv($K){foreach($K
as$x=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$K[$x]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$K)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$J=ini_get("upload_tmp_dir");if(!$J){if(function_exists('sys_get_temp_dir'))$J=sys_get_temp_dir();else{$Ic=@tempnam("","");if(!$Ic)return
false;$J=dirname($Ic);unlink($Ic);}}return$J;}function
password_file($j){$Ic=get_temp_dir()."/adminer.key";$J=@file_get_contents($Ic);if($J||!$j)return$J;$Sc=@fopen($Ic,"w");if($Sc){chmod($Ic,0660);$J=rand_string();fwrite($Sc,$J);fclose($Sc);}return$J;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$hh){global$b,$ba;if(is_array($X)){$J="";foreach($X
as$Gd=>$W)$J.="<tr>".($X!=array_values($X)?"<th>".h($Gd):"")."<td>".select_value($W,$_,$o,$hh);return"<table cellspacing='0'>$J</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if($Jf=is_url($X))$_=(($Jf=="http"&&$ba)||preg_match('~WebKit~i',$_SERVER["HTTP_USER_AGENT"])?$X:"https://www.adminer.org/redirect/?url=".urlencode($X));}$J=$b->editVal($X,$o);if($J!==null){if($J==="")$J="&nbsp;";elseif(!is_utf8($J))$J="\0";elseif($hh!=""&&is_shortable($o))$J=shorten_utf8($J,max(0,+$hh));else$J=h($J);}return$b->selectVal($J,$_,$o,$X);}function
is_mail($jc){$Ha='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Vb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$sf="$Ha+(\\.$Ha+)*@($Vb?\\.)+$Vb";return
is_string($jc)&&preg_match("(^$sf(,\\s*$sf)*\$)i",$jc);}function
is_url($P){$Vb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($Vb?\\.)+$Vb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P,$B)?strtolower($B[1]):"");}function
is_shortable($o){return
preg_match('~char|text|lob|geometry|point|linestring|polygon|string~',$o["type"]);}function
count_rows($Q,$Z,$Ad,$Xc){global$w;$H=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($Ad&&($w=="sql"||count($Xc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Xc).")$H":"SELECT COUNT(*)".($Ad?" FROM (SELECT 1$H$Yc) x":$H));}function
slow_query($H){global$b,$T;$m=$b->database();$jh=$b->queryTimeout();if(support("kill")&&is_object($i=connect())&&($m==""||$i->select_db($m))){$Ld=$i->result("SELECT CONNECTION_ID()");echo'<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'token=',$T,'&kill=',$Ld,'\');
}, ',1000*$jh,');
</script>
';}else$i=null;ob_flush();flush();$J=@get_key_vals($H,$i,$jh);if($i){echo"<script type='text/javascript'>clearTimeout(timeout);</script>\n";ob_flush();flush();}return
array_keys($J);}function
get_token(){$Of=rand(1,1e6);return($Of^$_SESSION["token"]).":$Of";}function
verify_token(){list($T,$Of)=explode(":",$_POST["token"]);return($Of^$_SESSION["token"])==$T;}function
lzw_decompress($Ra){$Rb=256;$Sa=8;$kb=array();$cg=0;$dg=0;for($s=0;$s<strlen($Ra);$s++){$cg=($cg<<8)+ord($Ra[$s]);$dg+=8;if($dg>=$Sa){$dg-=$Sa;$kb[]=$cg>>$dg;$cg&=(1<<$dg)-1;$Rb++;if($Rb>>$Sa)$Sa++;}}$Qb=range("\0","\xFF");$J="";foreach($kb
as$s=>$jb){$ic=$Qb[$jb];if(!isset($ic))$ic=$di.$di[0];$J.=$ic;if($s)$Qb[]=$di.$ic[0];$di=$ic;}return$J;}function
on_help($pb,$_g=0){return" onmouseover='helpMouseover(this, event, ".h($pb).", $_g);' onmouseout='helpMouseout(this, event);'";}function
edit_form($a,$p,$K,$Jh){global$b,$w,$T,$n;$Tg=$b->tableName(table_status1($a,true));page_header(($Jh?lang(10):lang(11)),$n,array("select"=>array($a,$Tg)),$Tg);if($K===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($p
as$C=>$o){echo"<tr><th>".$b->fieldName($o);$Lb=$_GET["set"][bracket_escape($C)];if($Lb===null){$Lb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Lb,$Xf))$Lb=$Xf[1];}$Y=($K!==null?($K[$C]!=""&&$w=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($K[$C])?array_sum($K[$C]):+$K[$C]):$K[$C]):(!$Jh&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Lb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$C]:($Jh&&$o["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]' onkeyup='keyupChange.call(this);' onchange='fieldChange(this);' value=''>"."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($Jh?lang(15)."' onclick='return !ajaxForm(this.form, \"".lang(16).'...", this)':lang(17))."' title='Ctrl+Shift+Enter'>\n";}echo($Jh?"<input type='submit' name='delete' value='".lang(18)."'".confirm().">\n":($_POST||!$p?"":"<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$T,'">
</form>
';}global$b,$h,$Xb,$fc,$pc,$n,$Uc,$Zc,$ba,$ud,$w,$ca,$Pd,$Me,$tf,$Lg,$dd,$T,$vh,$Bh,$Ih,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$ba=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);session_cache_limiter("");if(!defined("SID")){session_name("adminer_sid");$F=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$F[]=true;call_user_func_array('session_set_cookie_params',$F);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Jc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);$Pd=array('en'=>'English','ar'=>'Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©','bg'=>'Ð‘ÑŠÐ»Ð³Ð°Ñ€ÑÐºÐ¸','bn'=>'à¦¬à¦¾à¦‚à¦²à¦¾','bs'=>'Bosanski','ca'=>'CatalÃ ','cs'=>'ÄŒeÅ¡tina','da'=>'Dansk','de'=>'Deutsch','el'=>'Î•Î»Î»Î·Î½Î¹ÎºÎ¬','es'=>'EspaÃ±ol','et'=>'Eesti','fa'=>'ÙØ§Ø±Ø³ÛŒ','fi'=>'Suomi','fr'=>'FranÃ§ais','gl'=>'Galego','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'æ—¥æœ¬èªž','ko'=>'í•œêµ­ì–´','lt'=>'LietuviÅ³','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'PortuguÃªs','pt-br'=>'PortuguÃªs (Brazil)','ro'=>'Limba RomÃ¢nÄƒ','ru'=>'Ð ÑƒÑÑÐºÐ¸Ð¹ ÑÐ·Ñ‹Ðº','sk'=>'SlovenÄina','sl'=>'Slovenski','sr'=>'Ð¡Ñ€Ð¿ÑÐºÐ¸','ta'=>'à®¤â€Œà®®à®¿à®´à¯','th'=>'à¸ à¸²à¸©à¸²à¹„à¸—à¸¢','tr'=>'TÃ¼rkÃ§e','uk'=>'Ð£ÐºÑ€Ð°Ñ—Ð½ÑÑŒÐºÐ°','vi'=>'Tiáº¿ng Viá»‡t','zh'=>'ç®€ä½“ä¸­æ–‡','zh-tw'=>'ç¹é«”ä¸­æ–‡',);function
get_lang(){global$ca;return$ca;}function
lang($t,$De=null){if(is_string($t)){$wf=array_search($t,get_translations("en"));if($wf!==false)$t=$wf;}global$ca,$vh;$uh=($vh[$t]?$vh[$t]:$t);if(is_array($uh)){$wf=($De==1?0:($ca=='cs'||$ca=='sk'?($De&&$De<5?1:2):($ca=='fr'?(!$De?0:1):($ca=='pl'?($De%10>1&&$De%10<5&&$De/10%10!=1?1:2):($ca=='sl'?($De%100==1?0:($De%100==2?1:($De%100==3||$De%100==4?2:3))):($ca=='lt'?($De%10==1&&$De%100!=11?0:($De%10>1&&$De/10%10!=1?1:2)):($ca=='bs'||$ca=='ru'||$ca=='sr'||$ca=='uk'?($De%10==1&&$De%100!=11?0:($De%10>1&&$De%10<5&&$De/10%10!=1?1:2)):1)))))));$uh=$uh[$wf];}$Ea=func_get_args();array_shift($Ea);$Pc=str_replace("%d","%s",$uh);if($Pc!=$uh)$Ea[0]=format_number($De);return
vsprintf($Pc,$Ea);}function
switch_lang(){global$ca,$Pd;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$Pd,$ca,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ca="en";if(isset($Pd[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ca=$_COOKIE["adminer_lang"];}elseif(isset($Pd[$_SESSION["lang"]]))$ca=$_SESSION["lang"];else{$ua=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$de,PREG_SET_ORDER);foreach($de
as$B)$ua[$B[1]]=(isset($B[3])?$B[3]:1);arsort($ua);foreach($ua
as$x=>$Kf){if(isset($Pd[$x])){$ca=$x;break;}$x=preg_replace('~-.*~','',$x);if(!isset($ua[$x])&&isset($Pd[$x])){$ca=$x;break;}}}$vh=&$_SESSION["translations"];if($_SESSION["translations_version"]!=2763095553){$vh=array();$_SESSION["translations_version"]=2763095553;}function
get_translations($Od){switch($Od){case"en":$g="A9D“yÔ@s:ÀGà¡(¸ffƒ‚Š¦ã	ˆÙ:ÄS°Þa2\"1¦..L'ƒI´êm‘#Çs,†KƒšOP#IÌ@%9¥i4Èo2ÏÆó €Ë,9%ÀPÀb2£a¸àr\n2›NCÈ(Þr4™Í1C`(:Ebç9AÈi:‰&ã™”åy·ˆFó½ÐY‚ˆ\r´\n– 8ZÔS=\$Aœ†¤`Ñ=ËÜŒ²‚ž0Ê\nÒãdFé	ŒÞn:ZÎ°)­ãQŒµ™öú£°Ak¾ßÄê}äˆe‹çADÍéœêaÊÄ¯ ¢„\\Ã}ö5ð#|@èhÚ3·ÃN¾}@¡ÑiÕ¦«ÁËžN›t¼Å~9‚ˆ™ÈöBØ­8¦:-pÎüˆKXÂ9,¢pÊ:ë8Öã(ß\0À‹(˜ž½­@ò¨¬-BüÆŽN’üŠ@.£®9Â#Èý3ˆ«®Ó‰ƒzÔ7:‹ðÚÞŒ­€@Fñ.1©¬ÚâÔ\r\"²\"Óˆ#c:9˜Ê;RŒ¦Ð¢Í<;·ìèÚ†\$#òÎ!,Ë3¾‚›2È€PŒ:Ò#Ê¾K#8Î€ŒìäïAcÐ7£Èîð -BÎ¼ŒŠHÇ®ð3––¶Â£‹Ç£;¿,ÎÍ|ä:¦Râp9ŒmëP(‰\\6Çmd²:³ØÆ€À-‚ÌùÇ›M,ÊKðA#FNœµ_TvhøƒÐKÃ.#gfXÖx É2 ’±Q`PŠ<í’2ÙvŠ.X“¦)Ù¶:û!¯2”JÄ Ð[¸3ÃbÖÑ¹q²\n¼Šƒz5V(Úù&Ñã˜æ3TülàŒ¼‘O«[~7'éÚÙ3¡p€àt.„xN†È†%‚º-‹MA67V\nJP½ŽÃ\rôˆb˜¤#2ãx×…ÁÜß;èÌ³¦jÖ”F£=þƒá\nNN64š´îõŽJ2b(íÈìe8Æœ7%	TA*\\Z©úî¿¢‡‰Ð€ŒÁèD4ƒ à9‡Ax^;ðrA™¯ÁrÎ3…ñïñG£œî„MäÊŽ›Ð¾‹7£XD[{j:xÂ'éô1\$¿ù‡0²ÔxØk8V¶„„—*!î§\"’èÈ”0./#?­î @î²ï©ÜÑi¨@(	ƒÖñòO0@(JD€¤YÊLÑfãvsÕZüzØçL2T–%É†h6¾ò§™&~’Jä‰òž£É©5h§U±“Äê²ŽÁè/D@‚bîHJYM/­ Ï“âM›½Æ˜Èâ£IcŒƒ¾hi•%ß—¦Â˜TWèÅ¢…\"j“LñFF/-*µg^i(\n¨×’Sœ“ñ¯Wíy8J¢ª7¦dEC;FUõ2F‚£Ö?Æýn\"ðI áDn%9pÊZXÃCCà(×(’ŽxNT(@‚(\n €\"P˜dÈ\rá°—±„PiÂ‚(a_Hð’4S*l'–4î~N8f*€¦¾sg\"•cëK!’RRÍQ•æ¨£‡tq\rƒl°4ìá’BºQ™(?kE“ãjº=Wæ\rÜÀ\$…aœÄ:keœDÁ0š×\rì™¡ÀXi4Gå™Àê~b\${!¸:—š`Ã¨g\rMê½wŠýOOHëÎÙó\r ÙIPaE†Èï%ç¨'Fž‚&k3Ò!5?S0½>izHV*Î%X4¥z—dTŒ\r¨à½¨Ðð}=5…=6Pä£èC—Aêñ)Ê²m£€ ŽR\\´O°ä~`ñÿ§¦U…dqòú\rÈL'«\0à¬#hrGeä)/õö~B)6¬…”gNÉ~K!P*†/ÔtŸ/c†S{º3¯\ro#J«I³A‰ðA_wM\$†ÀŸ£^˜-,lÔ„ð–ÄY\$Kâ&À aËõ‰¤ö.¹‚d,!„­¶Rˆ×CªÕkýh'­83RPÌkS±V2Ï¶=l+Õlµ–qéXâëfèzce6Â§#ÔG\"ª/(„âäûU[‹ººxE4œH‚¸eWY_x„~B’t‹‹†ðàòØÁ~®é!%ðÙbk±g?!!rÊÎ²%.Ñü¤ÄbŽ»¾³)Fœ™œoù‹'Ó%ŒÄÓCÁX\neý\\áY¢À/±€É3t\n˜k	àÂb”æv#K¸o\nB:¿ŠpÔ–S+ìýYE)«:ƒ(¨¿—†¶™±á±6'› ãè•%§Œ[T®“ÌcM‹q9~Àù0IƒçHdkÛ\"èï‚’Ý\$Í<ÃX\$áÙ—y±ÂF+«2`L@d}tÌY³bh~3–kZy–e3¬Q]&¥`›	v·lÝ™°þh™Ë±jç\\ÍðÁ¨Ðº;>«Öæ²/íUVïJB7ðMm‚IA†Òa€¦‹ÊÏšx™j3¨Œ-“ÖVºjpãˆe`º¯3ÌÝk­õÎ»ÐúW?”=NµÖ}+“H…:\\£ÍYÿAnb\"R\"øÌ§9M˜ðäƒæ	¢HË!ób-%ð;Âšïâ™k¤×¢ ¹m©dmm7Íã)'W¤°6Ã½)èscsNñ2)«š†´”%fÕ‘³~Ž¦\ryŸ²•t£‰_eh}FønÊÒ;@\$¬–*Ëëâ¸‚gr}Ãô·%«[kaâí™3©INåu{—ó)U9KúÞUÜ†½„øF…ÛCcD¤Æ°ª4æ¼âÙ§£ÕmUËrŽ—é?L®7]9‹N½\nš+ã#6áº‰ã¤‘:)ÔqØúú‰?£ òÆ7\nµ«{r=]wtÚó«µžõ›z«få=cKF®ÿÍY}ðù[Àe—ŠdÏÅþ-÷X<°T¨jû¥rLEæÒ§(Ø´ð´ÔO%Ëü¢¾@ž–±v?WO¤¹-4ü˜¼žÿ9Ô<}töÞ‡¨q\r/îý>x% ëž_ÔÍ8G‰\nÚf„iÙijÛ(5’b.ðì0l˜Ëm¼¡õun€#Ç¾1b2\\KhKúß—ûÝKe™‰x,9:dfmI¬í)(h6¸H\r Æ\rmØ\$iL#\râîÆ\n/Ò'\rÌÀF.`¨ÀZ€5Å\"ë^´.êZ®Oáè LMç¢÷G‚'0]é i%D4à›\0ÓNÚ Î„?#jö£±)º©kV—0`¨N'Ð\n%	\":**%ú\$s	f4Í¾E‘b \"JJ>.l\0þ©”I„êøP²û¬žÄÉr1¬Dœp·¼Ê;ä»oóÌ3\rðÒÊÌ@\n\rÐ´Œn>œ…È¥éæßÌ¡ Š@ÌhÌ@@	‰6PjJ)ñe ‹â4êª0¢R?‚Ð—¢v\$.&K	À±b^I<cbvK\"Ø1JcÁ\0.Úm¦¼§ŽÊ?‰g\0Ç–Ü¾Í‘f‘@à¾ì^fQ0œEõdªá¤DïéÈY®Ö\\à‚)¢Ô«C.öJø ZGbLÙH&*O³Q¨\ràÄÑ®À";break;case"ar":$g="ÙC¶P‚Â²†l*„\r”,&\nÙA¶í„ø(J.™„0Se\\¶\r…ŒbÙ@¶0´,\nQ,l)ÅÀ¦Âµ°¬†Aòéj_1CÐM…«e€¢S™\ng@ŸOgë¨ô’XÙDMë)˜°0Œ†cA¨Øn8Çe*y#au4¡ ´Ir*;rSÁUµdJ	}‰ÎÑ*zªU@¦ŠX;ai1l(nóÕòýÃ[Óy™dÞu'c(€ÜoF“±¤Øe3™Nb¦ êp2NšS¡ Ó³:LZúz¶PØ\\bæ¼uÄ.•[¶Q`u	!Š)èÍ&ã<Òq)æÖ ˜ÈF>Ø¡Ps7Xì5g5¸K®K¦Â¦àØ÷á—0Ê‡Æ¢¶§\nS ü›r\$ ¯jÄ(î¢v†°Ì¶!Jbž¸¡‰q««0\n¸ŽÊÚV¨?\$W¡‰¡FÃÂE{ü‡-‰:>W9ÏJ|Á¨eRhY¨+dxB&…[Í*¯³lƒêŽ (B&÷¾ÆÉè4S!ÄÀËdPB¾ñä=ÈtO¢	ãë?‰:²X£ªØ¢eJ	\$£éÚ\n&Œ3Þœ:îšã•ÊÃ‡OìK¦‰Ð¬ÈJÓX›´m\$*³Ó!Rt­.Ã\$äªTIn¬Q@ ‰\r([O±eK°4€•1¥ª¬›ºÈ’,2Nê?N-2÷<¤‘|P¬®5jp–£åÊiR&ÅZÔ=\$R®ˆÏUm)aÉì†lOd½e6!¬^R×£ÎÃ¨Ø66Ž^ŒcÝ0¤êr)Š\"eZYWËò—NRª<µ!Åjhã<léWÊL„é5º“Â=¡8“¬Mˆl[Ü¬[ó2)†G’¿™Yn…­qf1AãTÔøê1…3pSwå¹wWHumSØ¦ÃÉ#¼ëûGN8´;SÍ¿`MYuZ›h‘pä:\r€S<Ð#“J7ŒÃ0ØíŒ¬+ð­U¤\r7&àP¨7µmô<„¨Ü9Ž£ÆÙc5ä\rƒxÎíŽach9oÎ0»a\"×ƒk¶:·a@æ©é:Y¦)È\"¨¤ª#¨V…Ù\0ñhËkÞ¸Òñö†Æ3\\ÛŒE{zŒÂ§4FÙmÉ\"ù;±«êÙÖdÈBöC¡5‚ƒ(b®Cfª\\A ‘\\è½mt‰AÑ•’f&Œ#›v95?Hæ;ã•x2€Ó±hx0´;ÌAhÐ80tÁxw@¸0†G,ƒ(rÏÄ3‚ðÊ °x7mì4†ø0—¨r6!Ò\0ó†¾ƒX\"Á\$6‡^`¸t€¼0ƒâ–lá½\rêðÚ‚ìÍ(i†¦·h ƒ¡O?døë½ÆJOÚ¨1©i½\"äìÈJ?ˆDÈ\n÷LUI*C¥mr3’‹TÙ©\rÁ×3ö`ÈkPtåZ1¢²J{5jj]ò¨è¾ê\"¶PdØT“6ÁŒ3Ê+l…F/Ž¡(e£Ÿ#–”Ôs­Œi¨2O¼7&a\$“> iW†ž!‡8/\rñ³lAÄ:›(†ƒo\r € ÀæÐû\rìÂÊãi,_i±Ä6%¨gpôB€O\naP…‘4¥€&2i)¦5H^ÒœL(„›,·]3c„i!ç>n«ÕÂ±©Jg^8Ãv`µ+;h5Ú\0ì§_!¹¼ÂàßAüA¤3‚\0\0f5Æ”Ö¿ÀŒ…	\rÊð4Â×ãâ—2îW#IiÇB…TV½Ò´BÒFPjƒ‘ñP‚xNT(@‚-8§A\"„À‹PÁPgì–Çz’˜ÐÂ-Ñ€ÿtD‹×3LŸ+}€ ˆC0a^Q;Ù-X‘uJG([RÔ)š\$.ÕZp²|\\žñ.()2	,ŠÑà1H”ø1TæÓÔ¼zc’69º™Pd#ÀLdØXúú²e‰S-M RXK®Å3ÒyR«Ù°óÅ¨±¹Ô¬Húui©z³…Úd=‹uMÔZbl é‘.!½'b˜ÔöVar¼c® »E¨ØOê2SòcOÏ\rAúñ\">'7a†«•¥géªÝWY\0 ¦CÐeA]1|‚˜e5áŒÝ†FH‰Aí³Ì‘—ÛÅocË“ÌSª²õÞÕiSZ\rQ‘#ÕÕL«Ó&Â¶›	46Š†‚(,yS¨uÙ[IÝo*ä¤Ì“Z\\N)ƒ:‹…Ž!%9‰ësÆ‘tš4IP’‘9M¼È\nÄ^QHùô¸%É¸,6¦‹Ñ[X2HþNƒøÍÚ;(=Ã&tÁOÂ Aa KH\"M•	lF˜7ÊÓn(øe)1!‘ÊÅ÷ZÈ9µŸ¥ü˜  à]ÒãÞÉƒ·2¨„”žñ`ísê´/1Åhe\$€¹®§	12å!L™y`èuƒe›k±êªÖ‹%¢ÉAUÑùñD´RÕâ˜!(š‚à¢˜>ŒÖZCZçøÓ¥’N»2(½ì-Z‚e¤2ä;‘Ç(É>Ä{\\•25:¬i01åPBL²¥ÒéˆLd—Üt3s7J_M†›WÂS¬êŠEJ)¡½cžíùAj\r`­Š¼ïsEÊ\0ÈiÂ‚ïnkIÖ%[ªÔbUEv=ì;¶Ô0¨•™{²x\rÈåjI5|eý®žQvPQh±Kò×T,yM”'ê\rXÉžaÊ®érç¦Ÿå›p¬_D@u( ô5g„‰²¡ª³Ï¦i<X[K`¶H´¤¡¦'‘f4:¥¦lUOL8~:«ë¦%I!Ž¨¤¹àb|y5aCÎ+áYDxK»aþYbð(:•d”_x»ƒÁç[úÐØ†3fì]’z.Ä¥æ0ŸÉNÔ©™Z2åiP§)èÜKÆÚÆiäß)?L|Øo;fš—‘y­!”úëDò=¦î(.Êò\\\$Ë½'èøgàsÿW‰z-¹¢ÞÎ HÝn9û¶‹žU”LšbD3ŠÒê_Mh‰Îb4þ¸Õö–¦C‹.™¥íGÕ*îèT>ËûŸ­<|PÒ7WyÏ~ÄTÁïÃ¤Œ\$ÄßÂ>/¡P{­Î`åD0k˜Ù#ŽeÐDG*°‡°10Üâ\0Î§¸?ŽúŒ-X¥Ê™\0\"\\Ä+-\0«Hõ(uÅ(/¨¢wPIÒ¹‚÷°6Â<\nRÿL\\.oúO^éÇ\\?.ÄLHQJØÇ& ©ˆÈ&/ŒýÎV.ETR¯ÆL¯Òå‚ÚÏìöƒÐ‘Ðº)ïFú°®ÁŽâü….ÊAVý®ç\n¥ÆÚè¯„ÿ	@ðæè	ÉfËPö\"kÎ]…H\"nhÊ¬zÞM%fbU#Ó‚hçžú\r€ñe.úã®ÐÜõ‘.+lPèþïª“Ñ<ûÕ\rî‚Bn	oÞv\"úh%ÑE+ØÓðúøeÙï ªÎôæ°¢HÏwÃ¨GîÐÓð¿Ñ†znoRñ‰AQ‹d°ÃñW®I®õï†CC±X¯ÑÂ%QnâQÊYÑ´÷¥.Çd½Œ0PqÜCíÑÚ[á_ñ8\\ñï«eÈCpc§W‘ÖçdÔDÍÕÞË‹<Kñ½ÒLÒ[Ï>*¥É¥-N°AdÃç‰Rñrë\"NÆÏov1‹ž­Î/'(Ë†@­\nßç\\Yj¯ÒZÅ\"i\$nLc…láÃþÓÇt)/Ä¾`è@Øiˆ\r Æ\r`@ƒÊ\nÊ¬ãxn¨v\r Ìo„&`Œ¢h|§Ô\0Äˆ*\n ¨ÀZ\0@‚àÇ+#¸å/¤“d¼×ì%Ü#¥~0âFÓ‹<[„béŽ1@›+2·'¥üa%8øð˜@eú'±.2~\0Dè@=P¨õ§ ²¡MŽÞ>¢ž(¢RŒ «bÚ>À˜ éR;¡5H|~#J7#‚DÒ/¯6[\r²T°Òâº:‰´0N•\r\$B®³}N|ÑC¸“(1·8«ØçÀ¨^ÌÒ4CI,€Ê˜@Þ\0èÚKâÎs¡9Šý¬xÂ²Á…¡Lõ9s€éäÔê\" &ù)˜\\¦vBŸ>g]h´?è°×4óK/\0}Ö\r*Ì¾ä\0¬Í\0î@¬ Æ ê\r¦®í2jêÔHŽ&ÅÔv#¤Ùfšd…œ®‡ˆ1‚|’¯Jc@òn \$ê÷DÔ9&n2fÄ7CJnÔA3¿*”Eñˆ¼T8Âç#¦ZÍøz#øÊD\\	\0@š	 t\n`¦";break;case"bg":$g="ÐP´\r›EÑ@4°!Awh Z(&‚Ô~\n‹†faÌÐNÅ`Ñ‚þDˆ…4ÐÕü\"Ð]4\r;Ae2”­a°µ€¢„œ.aÂèúrpº’@×“ˆ|.W.X4òå«FPµ”Ìâ“Ø\$ªhRàsÉÜÊ}@¨Ð—pÙÐ”æB¢4”sE²Î¢7fŠ&EŠ, Ói•X\nFC1 Ôl7còØMEo)_G×ÒèÎ_<‡GÓ­}†Íœ,kë†ŠqPX”}F³+9¤¬7i†£Zè´šiíQ¡³_a·–—ZŠË*¨n^¹ÉÕS¦Ü9¾ÿ£YŸVÚ¨~³]ÐX\\Ró‰6±õÔ}±jâ}	¬lê4v±ø=ˆHî·ƒâ’ÀDê²¹%’>L*H›8ß@¤ª¤——P|.Õ3dŠ¯m XúÂé3’‡²ð!rÔ'HS†˜¹1k6A>éÂ¦”6Ëÿ5	êÜ¸®kJ¾®&êªj½\"Kºüª°Ùß.-Òä:Dfã5Mb(¬<¨ùOÈhù(™G°Zi2=é^ËÁ¨¬ÄÂ9-bk¨®1l™#äšÀä©j©Î4ˆúùÉ-jAA1c‰A/ˆK»ÃÆ>•BOÃÇKm\r%2!1<ðh1²Ìã§\\èhF‰\n¯äœO°“K8ý&ä¦,´(à,ªãô”Ôå\r*Á©úÊÖÉtøá¬Ö®¡ïÍ“N·m-š²G´»ËC\r¼Y-Šú±>ÅÄ02!­RÒ‰!-ÑKÝjÝl¯W0½i7.Lþ%åÅE0ŠDž“)ËÝÌhTjH¬VªË¶‰4ªF\0Ù¸((@6®žÂ5[’Z4‹êT¶/Í¿|KÀMêÄW&¦è*O·ŠjTŸ-ë½»Ñm°ñ<ÏB˜¢&!±ƒˆ”¿Hù í¢“äÈŠNLÂ}'È­\\Î¨Þø¬M^Õ-ðëAu¦¯–eGfÝP½}±Tù¥©´ÚÛ[N‰Uw§OØX/_ëµîqU,}¼¸œá·Lµ#½¸ºnì4¥ÄÈB&ÂÙ\\­Ë`ûì/ÀlYóO kO:?¶ºÈmSPè	½[²¶Áô PØ:MÊ_\$Eˆk6 !òz¸Â\nž<ãìêÅëhêÍ3´Ï%iÊGœ¤ÊªQ÷Û+jêÔlŽZDjóæñErÚX£çŽ]ÈjÅ êØ\\ÒN7—fþr½è/>œõ‰Iö|J`†6â÷•cá9/Œ »Ô~ßKÌ±w¾ñzHÚ¡Ì,òªFO‘Á?YFø¾´’ê#‰ .!ªÜ’³W¤ù )2æQ½§ã¢OØ¹»Iè„G•|jÑ7ÏÁÖÈp\rCÑ/Dês0\\H\nL@Pô­–ÄHTÔÉ1x í÷\"EßTX;èÌÌ'âžž	„'Ž4“5¨ðcF;îˆ¬AÂ^lÉä*„€äC0=A :@àÁÐ/áÞFàÂhi\rÁ”9àÞƒ8/¡ºM€é&Ã˜i\ròp\0èdÀe’/† ØCpk@øh<U.UOÂ,€¼0ƒçØâì6cï…Ô¸â|#Õì-6ìÆ9TšfÛ¬y^l|ã¹f\0ÕË[æ)3ì°Í)ª;®©Q—£nTåÉW+'0áœôjeŠ²RÌqŠ’Ò‘‘xvFÍ) ÙÛ½\n (Nô#gœS\0 ·’ó˜rÛNdª\rGR™àçJêY,¨¤BÎIŒup¸”cöRZ[6?Ë¦‹š4¸œj-†”XÖN§†CJ2'‹æ\r¬Ñ\"Dù‘ûN7¯E^0c¿¦S{ g”ðª(uŽã::JX[‚\0ƒ\$\$””˜î!Gz¶L¼ß0i¡T5Ê‚Š{®S6Àó\nt]yïæ‘£¸TšŠ‰Ï¦Àì8VìÛÜ|Eµ,ˆ5‚ÁO¡±m˜5Âê¬Ó!~=‘¼£j”ùÉNö&rVÔ'6IªZ;ïBÇ–@ÑšD8HE¬šjª‚¥€§è†¿Â^å»2°9¸9ü£ÊqnE‚ÆšŠBGÚQ³G)µ\\¶x\r[uv7C%*KÚë“;ë5¥ó“×”µ4ÎŠ¶©ÅaOÔjŸJO h'¥<Þ‹ŸÐ´þºÕ„ÔFB`¦RöA9Ô»<@¢i´#¤zB}}kªòAe	KÉ¼uÀ°ç U0’±f†d¥DB ðÊdUwe5Qb£cÂ£u\nŽºšò>¨UÕ¢E¸¶Bªìò–V*®ðbëÄeÐáqX®À,ZHSi\\È–w#/æ,¡\ràºgMJéºÙÚ“5f'7Ú4 \nn-ÑÅË3“ü¥þT+VÐS¦ç“øfRü²›,AÄMºåbŽ©‘wšq¾geoÕzGð\$Ô¹lO²’¢ÐO3­½Ïª)÷Š™Ïu¥Ä’Ûq{ˆIž#v¸•\nbƒÀ^ÜAÏˆ†\\ÏA,êj]*ŸÑ%~ïéf˜ÊŠNXZ«9fß(L5Î?‰)Ž!‘ )¬>ºn…g¸³ÝpmI+Š\\Ö„Ìô¸u©½ à®¹\$JE[åöÔ³kvÔgL°8wØ9sC§Ë¿U:¡É#!9tÞgØ¦›ìüoÎ9]ÝµFåSý°F„ …@¨BHÄ:É@Òf¨ €7ðèGC¨p^O†HÏW‰B¹€ïp™Ù	²¼Ÿh/Ÿ•Úº3M@É“—7²¹`Ñ,.8e¾ÞsD*„Ü+·ùó¾[£,Gè,›e¡aÑyÂ–J‰ô•Î’Xö=°ç*6•^ˆ]Êå‘^õBs˜N_4qœ÷ŸöÂ[Ûºyæü²¨Ò»ÝºrÕ}´¯÷—vGÄÝ·Sƒ­2{s™ÒgÂ«`´_•5u<‰5k±'pyRÕãºA©¬™j!è\"ð^íú_äºàO2Î]^Çþª÷;ìAóÓÇ~@\":wZ›W\n‰ÀÖÃMQ¿‰Ô…ñKÎÕÞ+§ú³éŒ)¨Ù/X¹Åž¸£™“=ÇYæ.H/e¼ñèa@\"ãù+óq¦ª\0#%/Q×ïÒ˜ªf3ÆÆçº7f\0&.Ä.-[JÊê/èýLÔÞŒxçÐÖ¶hoÑb®ÊŒ²íé¤a%/æ‰Çxàe~×ð6BúÜIdð)*Œv¿ôR„š¹çòkëþTJ:÷f*6%t×èx'%zÝz°ç[Î8¬Æø‰/,¿cjCNÒ×À†l‡¬qÇL|½h&YÍ}\nMdD¼,€Pš®ÜNëâ\0R»F*Æýh]0A£žpŒz=,^TN£/Óí¤ñOä°Ã½AG,†ä’sâqŠÍ¥ufà€±¦HFüÇñ‡<oâpòlUL˜uøÕ.}OëŒD+\$zŠ^Þ+oQ‚£Ñ5°ëñN©02ðÑóÒ3Í±r÷­hŸñ3\rðš¥Ž&N°æ§Ö;î¾+ÂjnšT1†Bo¤³eœº’d–êè)Î·EG.–©K„8ÍÔåñ?ìu0ï%-qK¯yçðêÑä¸ŠÒÚ±ë«}H<mMjÆH®Øj&žäÌÊÂ<',œ#|³®þR„hÁã@bBlŒ¦DiÀRéÆ˜Ï+¾²ÄYË»kÊ†dR¶eF)Gº7†³ÊEnÆÂQèv0Ò¹%ŠüØ­”mGbÛœÁ‡%-jv)lÕ¬ÉPçP²ï/)ÆM*Ü¯ÍCOÜ¬å¡)ñM‘c‘fÿ%ÿ Q=\$„/*ËØsÍüfO9Ñ-ò¶Ç¯JuÆ-ê~2*Q0ô‘Y/(	.£,0/,n	Òî¸k¢×†îß³_6à’Ó 2ôž¤È&¬Nda C¦#raczÉÄ¦Âû¢H‚NX;e ž,I1‘ºßQÿ**Ý°=ö3rÑû°/Ñó ìÊ£e6P,’s×e®4á_M€?¥8s9ìs8óòÏ9S*„Dž_eú’ñ-9e•63¸²ÝÂê+mêÜ¦r‚FN:¸3\rò²ví	§5,É*=?\nÇÅ93+…GÕsìð°dBT\rË¡*t(k¤qIA³ë@pœs£y;ÓÎÝ>”ÏÔÞ°¹7Ô(Üp+„¢£±@ôCA&73œ¯ò9-´jtºYÆb½†ßbºÛTgBƒ6Ô`Î­±EÔæç8'‡I”ˆÛ(}.R9PIG\r—;!J­Ç;³)DgGI©q41Þb²Ý2&g\"Ä°áhy0Ô¡+Sú+T£bÀßÄ¸4”å.l\nËTo?îO4áO”±1G,Á ¨œÀM?:ÓÔ*LÌÂßM@¡<ˆ´7ÛMð>”±æ\$\$Ž˜ïu<ÊÊØ¥¬àçì/†s\0²\núDvônäûä&¤`ÂUFg+³S³îoOå\"òûÑ§NÕMWò¦þp\0ëÄÐì¸ÅÀ†w\0Øbú:bbÂ¥ÀËð›B\$þ+j¶°	0ÆD€öÊc%\$+i@@\n ¨ÀZLÑHF&år(ŽŒëTúD‹pC«tT§ç_2ÀÿõW-Uús¸¤…¼*¨˜éâ®'d^§iGæ­\"=0ÙŽœËŠP)c7`ç#i:ƒþöf¾E(|£¢VD¤öH”¨\r/ÒˆqLhE‘YPjtÇ7>la…\\NÎa£ãh\nFÚ&¾H¤ÎÆrp2h\\ƒë\\0dC>'­c!p’Ô†ˆì}jUjÐ«kPIŠÕk¶-<hl0®¨g´÷rsj¶ÓYqQ.±ÐÕöãköç`§²%¦¨4Ê‘QÖÍo*Êº®Ù-‹•I“ZéExYÐù[0Sp¯šbÃÜQG½°Ä¾È±Erm&ü£?GWB×ç4v\"ˆE.š– nŒ¾Ý†LM¦+4«Î±\"pô «¾\$…<Jva«çoÏp5hž4w¥ñ9¶!-¬…‹ê«]N@«‡X¯GåÀš¦0IñQ#(Ä6È0-FÖotÔs'GÐ€YÆÉ4ÅbS!{vÍ\\øTuèIE>ÈäÑ=/4Ôa%5uôˆI%ð8\0";break;case"bn":$g="àS)\nt]\0_ˆ 	XD)L¨„@Ð4l5€ÁBQpÌÌ 9‚ \n¸ú\0‡€,¡ÈhªSEÀ0èb™a%‡. ÑH¶\0¬‡.bÓÅ2n‡‡DÒe*’D¦M¨ŠÉ,OJÃ°„v§˜©”Ñ…\$:IK“Êg5U4¡Lœ	Nd!u>Ï&¶ËÔöå„Òa\\­@'Jx¬ÉS¤Ñí4ÐP²D§±©êêzê¦.SÉõE<ùOS«éékbÊOÌafêhb\0§Bïðør¦ª)—öªå²QŒÁWð²ëE‹{K§ÔPP~Í9\\§ël*‹_W	ãÞ7ôâÉ¼ê 4NÆQ¸Þ 8'cI°Êg2œÄO9Ôàd0<‡CA§ä:#Üº¸%3–©5Š!n€nJµmk”Åü©,qŸÁî«@á­‹œ(n+LÝ9ˆx£¡ÎkŠIB›Ä4Ã< ŒÀ šâ5mÊnÂ6\0êÀîjÀ€9èzžÐ ª,X‘¶í2À§§Î,(_)ìã7*¬è¶n¢\rÁ%3l¥ÃM”ˆ¨ \r²öã¢m¢ä‡KÑKp€LKÂúÙC	‹€S.ëIL•G3ÔW9ÊS·2bÙ!¯«|–Æð;I7ÅÒäŠë#´Û=ÀÐõMó“TŒRí/Ô\rÒž®­ÓY'ERj!*§¹ôâØƒÅ5eO¯;w4ÓÓ…‚Á°³’ÜWFóò‰,ÏÊ}!ITdÿX/‚Z¶*5¹O5ÚSyB§”+eÉQ„âŸ’ô1QT0¥*«qÈÈuáy)èM{SŒMƒ!°­Êð‹¶”†E©÷‰LPGŽ5ÒEòÂ0DÔÓ{ˆ¼DJQ}áj}X4E•Ûî.:’Ör*½„Ô–<|T–f\\@£c\$ñW“àHKdŽÔã´9s–àjšÙ„^r£‹Î³6NèÒ{n¼ñý`ØÄ€Sk£wE+Úý%æµþ¶V–°¼+¸dÝU”Ö…7µkÁqT	Û‘¡Ñ”¬ ‰DÍäÂˆÑnzÝEn@Œ:ƒcç\0½É\0Æ0Ñˆ¢&³rc|WÖÉzdœ„ÆÁ|UµÜ*ˆ«Øe6Â—ïöT!ÖBšùMt¸·\\÷vã1TìõM®ë]nI‚Sú’k¸3zkåÄŒ1OÃÃ>˜]RØÎ-Ë‡ªÂúûõ’ÔñÉê1+|­¾÷CXÂÃèMJ|ÑÁY_·³Y·7+“'¶âòizŽýñWÈ“Kén¬°ã¬wðÁ‘*ó\rÐ9\0£ºwÃr<¼3`Ø*Pä‡ÁL¤_ÈT\rçœ6¹Àò¨naÔ1†3âÃ3”°7†thÁaóPÜ0†pÂPgà€6£@ê~@s0¨­¼7¸)Á\0C\naH#)fÐkKq)¥™ÿbVÐQËÍ/AŽ¾Å4.†©±£z›Ú“wdj4íª‚Ü[·[f€·:¦TCˆšŒå\\(ÂŒ^âI\0…Ð`›/¨X¼™J1¨§ÐÂÏÐr=œ9‡pÞ™ÐeÀ4Â È\0<'‚`zƒ@tÀ9ƒ ^Ã¼ÉÁ„2EPÜC.•áœ†PÝ5CÁú‡A¤7ÍpDåÃ‘ð’ü/ '8Á>	!´8àÛ5ƒ <á„å;ÏàogGÒ*ÖyHt=BÌðÜ!QƒìD¨¬ð½›K¬:ê*P¦É4É\$Š_6Jé1öQ\nŒƒ)R!ˆ±âN™AÔ\n (*d0½K\"£”„ÛÒ3\0\n)ŽHô®DZ½ãå&/*Ï%LÆÐ*âxOát¨8ºWR‰ ,(‰c–V\n!3LñÅÁrØí9Y@ªiÅ½˜º¿«	D5bºP¶i?%ŒTk >QVöè˜ŒÃ»Mæä¬§uØkØ‘…¬¶QÇbœHøy;À€2–ty¨sšÓìþŸ(DC©ñ A˜9ðÚÍ…¨þM`@â%’>vVUŸT¦Ò‰@d\0^\0 Â˜T!Ï¬ZåÙ9NðŒ>Â[DYmj‘×äÒR‹:ÇaË–…³•Š!‘îÂÀC^úWƒöÎC‰Úæ` —aˆ4†p@Üø Ç´òÉv‚¥-sŒè4ÎÉ_@¨\rò³¶~É#Ç4K³ˆ-Ó¨¬XcA:ÍˆÂãˆºT`Ÿ)õ>Ý¾ò1†°r¿‘L	nšŠÊ¬VîW+khqKpª)î6Šg§0Û)j (\"PÌ\\¥Á„6Y–¬ˆÓzþO\"™Æ;¦ÊXRkM…ì¥J´ßD\$IÅ+¦Z)Ûè¦\"õ¹8evÙ™òJ9Ç\"˜â¤…X³/dÖñ¡ÀãnsÔtMO;´F¨ŸrP \\¤%E‰Øú|’¥»BXgÃps³Ä‚¸ÖN4ËÒ 4£Ãº@¼@òÞC 3ÜHp%é¾¾Þ©n€Ò•ˆ)˜Á5¡¹üS4wÎà(Öœ0LYl˜R¢u:žÑ%;Òº[VÐJo¦Š2›d…*ßŒš_!ÕRž”r6|´RËÏ™’<.wÚ¡+Q·É’Æ}Å„óÚŒ€nãYŠvªÃHz (!Ùàá÷˜S§¸1Ÿ ÈÕ™~„šS\nhºg\"þV}a®èçÜ°DLÝO¿rhŒ\\õP>cÌ;µªñ‚‡˜3öîÐ…ã1Ç@ˆ§ÚïX£¼qÉO&[˜%`´ÝnL9ÌGR¥}q·îžjçï8St;XòzØzN!¹fZ`q]V`“Ë«º/”óÞl®¯å’,|¶ž›ÑOHiE5õîCÇKÈ¦3Ñ¤¢&¾8Ÿ4}½w+\\·©=YÞî—!P*†˜š¤øÞ¨DyC}‘>ÁÂÿ†YoJªì!—h^ÕÖÙ4.Ñ¦2)‚ð@ÎN®oìù ,¯DÆ{Etšåróƒ…Ì]“0FßBlOK›œsZÕ_;,­­v­pQÂº/ƒë CÅöÙ|Qý·¡÷:º-Nºl\$£¤ùÿ\r²Ž´ñÙ†¥:Úì|k¬FÅÚ\"X¶¡”ëàè>7«ò}å–tOõž–Ý¯¯üß´ÐbŽô‹ÞsçBÙ/\"ÄïZìîFYOìáí:Jhúÿ‚ˆ/\0öû¢ˆ©˜ée@˜¿¬³ î\$&œhEï¾ÁâdæLó&SG~`FdWMÂX' ¢­0,¤\n\\£\nÿ¶`Üž©H¬kØÆÔ.PXPÆLaŠ-„`eÅVeîÊ÷BÜ~B¾òÅ:G¢ž’\$¢2j¢-ˆ5Nï\nîÈ¼\$-Æ(/ªí*ÐÛ.Ã	Òä\n&¦Lÿo–ej,N\nÝaLfdÖ7&ÔÓ/Èà0 3P¶{/føPxf\"ÆI)E.6èøüPs/·q	Æj(3MjI’î¯Âkq?©áÍÒ-ÑdÍŽñwI¯”ûîdcÐpû)ócco¯æ\\ÔEò{ñwâQhÃÌX;..í/úI®¼Ñå¥RüŒ´ÄÍzÎ¥Žj*~ügÔ*ÌN‘‘ÉÑÌÂDœùgðì±äVŠ¸[‘²á¥`ííjU2HÑP1ƒQ1=Ïh®1’0rÌ\nvƒVwÐøWà@dïðÆä¾&Ä¢d°ÒH'ŒÉÇqïÿ,ó\$EØ~1®VNüãŠXÄBÑ¡%Q!ŽâÎ²F|®ïÎ¥'2QdÏG„ÓÇÍ0þ;1ŠÑRWrB×OòI’‚\"á‡³îÐÑuîtÅ1dmH\$y‘šúq2Ã,qzPrÍ+QÑ„ö1‰(²ê2È£‚RìN·Ñ[’×'R“âô°³¯\"ò§O¨koñ’Xø‡\r¥ƒ†M!2¡'sŠqÌúG[1ˆúhÓëOw2*c3³bÎRŽyòJJ2ºÜ	2£'†6[(r™.°6{38ørû“v¦¬*ïé0r‹/r6gðÕm7!RÑÊè±8Bî-\$¯,£âÚÓnå'„Æ0º-‚j€Ï,LGÈ“.³°Ã3´ÄSK*ºPÌ²\$Ñ:‚7…\næ¨þ×ÂdÃ¬2îÎPe&Ô¢\n«\rÌ°Pr“l\$t¢Ps_9nóò|Æ¥ã>¦KŠ&T‡ð_Ì¥\"²kNtm¢×…Žca8)ó‰3Ñ&K4[si¤«¥7OyFòÓ9s‡2’¥GîQ9MGNÒítN4qqs%3›-ñ’-Ô˜É› ¤C)ÒñFs[T¬¦®ÛIeHt{8Ô—LQÃEò\rK‘çÔÒÙ”ÇH4’¼.›“/Š¸ÊÐÄÏw\r&Ëtô/ø’LVòÛ@Ï¾[nrGDÞB8nÇ&a+”u6ó	(ÅRn²ëÔ´üï9“YSQ“S“\0jMBù4»H”}?æ ¡_FÜç®š¸ÃV*%ŽxQV4Ú[”•UÑïL“}V”ün•q*uw5SHN™/Å‚©p':ÐLÆL(É¢Š×Iñq+Ô¥/\$UKêœõ³ªÙNÝLÕTŒÖª\n\$ÔÙKuUmJ•Úëuµ^WõCXÕ¯]Í’n•Î{Qœ7T•<b[[“k%W-’õ^Ô2í!UL–\r^•×9Ì_Z§›D\$…Óc¶#<•ÑXµžètBèÉëvGsqF‘}«¥QRé_“…Ô§2®\$n–cV	UUEKÕÙdÂ1e?vkd\rÓgI?g•›N´Þé­ÚÄâí…RZÔ„ýaU/+öoH®èI¶³^5Ahæók´}kõi´ËfÕGc ù”ÛÄ13º®Ìk4°N5 Xã<ÂA43A\n0SIÁs4ñ)FgK5é8£·\0W5~W\n+óLgs3´çgõYMù¤**½\$¢ÂMa0ó¬å]s1su4;sff‘cÂ÷OªÏ}lÐ.h8\r€Vµ\0Ò`Ö	º½@@ÈlŠ?hhŸ@ÒÈn \"êËèŠ€ê•\0@J\0\rÀ@\n ¨ÀZ\0@šÀÇyÄj.·a>ïq4r1>mk4åžÔçïuÖÙhrc1B}·\r~üÊ_I×eÅçßM(iv>5sÐ¹GøB… 	·z0Ø5˜*ä²ìÕäÐòÑøjD€#:Í-,¢qv‹ƒqXÂ\0%tv\rrL5V‘d3qb\0Ž…“tF”É\"-ÁoËÐ±¤kˆKÒ\r©^<ƒð@2Ôêô0²pÜ/í‘–dÂŒ8³0;Tes¡ŠÑ)0TÌìµcÎs•ëg;Šä.8ƒ±/b•Œ\$OpÖµ\$öYS60\n‡0ð£Â<w²«L\ràà@ÞOxèTsøáô}ÍmŽqknÆÇIBÜÂ‰Ñ)Æ˜/#ƒ™jÅ`Ã†¤F[yA#g_¢\0`\r¤+õÊÉ&Üu ”ÉR\r,ˆÞ/\0¬ð€î@¬ Æ ê\r¬Ö8“‡ËuqÎ(‡ásLàÊ’`9¤Y)Æý8²/¶¤õÿ…§<2^RLÉŒxËŒ¸H[uüéÙ_Œ‰t”&¸ÜÞˆD?#È†¹s—yy9^æ__&ëOI!ÄKuW5dEPŽÏÖ.@	\0t	 š@¦\n`";break;case"bs":$g="D0ˆ\r†‘Ìèe‚šLçS‘¸Ò?	EÃ34S6MÆ¨AÂt7ÁÍpˆtp@u9œ¦Ãx¸N0šŽÆV\"d7žŽÆódpÝ™ÀØˆÓLüAH¡a)Ì….€RL¦¸	ºp7Áæ£L¸X\nFC1 Ôl7AG‘„ôn7‚ç(UÂlŒ§¡ÐÂb•˜eÄ“Ñ´Ó>4‚Š¦Ó)Òy½ˆFYÁÛ\n,›Î¢A†f ¸-†“±¤Øe3™NwÓ|œáH„\r]øÅ§—Ì43®XÕÝ£w³ÏA!“D‰–6eàiMÆ~ó}Å“á£˜è!Î2Mý!ŠèÅPâIW³I¬K¹í˜’lðÒmþ0cL@ð#A\0Þ24Ë*š¨#é\n¦ <M²+‰sàºhr†5 š°Ò¯#’¶*#«ð‚Ë¢8ÆB¢¦ƒ/+²¸‰¬™Š_ PŽ2ì`éG\"cäè\nrÚ‹Œ£’f9=ïÜ4F¿N,X&'**¨¼­È\n°¤2¸¡ 2ÑjÚ5(ÍÔÏG,\"ÿ\$ ’Ú>‘RûÚ0Æîì~:c¢:Bn†\r3\$3´ã\$û?®”l•Ï‚pÞË «ðí+„° Ä˜Ž€M*RãRýMRÔÅ4SZèÃ¨Ü5Œl<‰.Ž£‚z#“‹'Œ#<r14ÍhÎ2V¢‚ææ&+à0£ÃPêšº:Ú‡qÈˆ:Îª2DäOµcŠc[&‡Yé3ô6ÖLj¬¾Ím:.(‰Ìz#Óèê­Úô/ÍúBÔéLÄÏÅõARãÓ77/Ò¾¸@Ê6Ï‚2æÃPXv ¥€àª¼Ë¶’rÝBªv=L&N—Œ+c“t0dù‚ËXþã8Ø4Ô¬N6GìÃ4,œ3È¬—	öÑíhÚ)8Ü9Ž£ÆÕc0ê6 CxÎ¢Žabú9jµÈÂ¢¸£t0Ãuæ2…˜R—	Ã+-¼H †)ŠB5Ü2Á¾¬»ì£û.	Ø@3bcª\\*¥#+Ð£@s;,—\nÓ¡B€ŽmU¶ÿ¡ÖŒìÓ3’ÿt0—–BlƒŽM9Žëœ2…Êp¡â42c0z\r è8aÐ^Žþˆ]dn2H\\¹Œá{í>®4ãp^]“R:xâûn\ra|\$Ü;7à^0‡ÐSW\rX™#8¡ÐÑ\$–¦UŸ¡.>¥´ÿ#ÖÄ²Ä9ýM¨9€ÖfÕ)tDp—¢øNâW	Ê¸6çü–àª8!Á¡Ã€ QÙ³!4\nºebF›ÃzN‚øñÖFO).Kìm‡6âM\0C™÷.ä9N\" Õ	Ñ<1°¬+7\n}Hø7§‰L„ÊH¨yha4 Bán@†ÈÚ ÊC©ª€™€‚«µ6G82Xëca«Xæ¦!2‚{H P	áL*!(CË™#®‚•ÃüÂéÅ hH™“XºL\$.wàÌBˆ`aU¯„Ž»ôòi\"ðs%ÆdÍ­Ü¬IbÈhŠp…\0¦»y¦!”€„`©×‚R+Ê×`ÒJzÄ]\\DÇN²Šz1!L¶‡b6i¡Ð	á8P T €2¸Ðs&hÝ4°Â\n@Tã\"„À‹:§dî=¨ö&›Ei=Ù`z4‹¹™Ò­BhZÇ-¨ø¶¢ÐÒ\"ÔÅÚ|‡Z­B eÁ…¯ÀC,ÌŽð~eù&F?Îô\$o©ÅªâèA\0gXtÐí&ÊpN+§|&%¼›F]7˜âY‘Ì€ªAÒÜÇ¡ 3lðóPf–ÊYêl?ÌF²Ùºq”y›«•-›‘w|äÉl\rín´+jjO‰ì°š„|”V’èRgOé	ÐÞMLØP…ÐÀ¤ ’˜Õ²Û4°hü†ß^ÊlùžNZ‘y»7Ì±ÏE«¥\"3Ã Ñèpnu`¿¬òâyO9éci©Ã2MQ¬¹—XJÊY¶bŽOÕ\r'ì¦5\"ö\0¢	Ä(§„5º°¿\0PC4Æý…¨•‹K–J‘Yäk¬±>Pá(f&è@ßvN\nb&%™ªVRJM¢¨bd|%æQN….WCH“°ˆò­%ê>ê\$ãÚŸB T!\$à›\rSDhÑœ‚«–AÜ\":FÂ…™µbSâ›à€ˆ C&n#Ø‡ª3ï !&%øŽ9sZÏLElÊoºF‰px.!WclV«±qÅ'PTPœìg‡Œ¥RÆì\nçüu&v*½´Pša‘23oÄJC¶\\ é‘\\kÀ‚Aœ®z'¬Ã¦»(Œ•2¶Cˆ¸éMárýƒI>SrÙWç,‹“±v 9Kg¼ãŒsû°eYÄ¤#\rw±bp”tH‘ÈO*Õø…¬ÃBIŽö•):¦œ	¢’Ö–—Aõò´J\0Êµ:IG+	oâ	¨É|T‘¦Òé;è gÂiÁ9F\rL\r~§;èƒä|S8tŸ7lþUŠ{,sRz\rÒ‡ª«Z2vÚ°Ûwk“ã.Ô’	)¸ÙDS.NÜÈ[|nýã™æå9ÛÚÛîÅ»›Án¡j-uhM!m`ÔöÌÌ4Te%óá\nºM•Ž&GSðªPèn8‰‰	6öâÚ¦aUqÏ!Ä¸*QvÛq+m¹DÅJ4]§ÇKfLn=æ†7­NçÇŸÀÊ}Îr£Ü!\n¥sÝå»sù—é¨ïŽPO·1.bAÉŠJÇÓ­[êÛÓp³›[¨7ÿQ%Ý›yožSÖi z¿ÆÌï å{ÉþGÄYwC€°‰ÖõÆÝÜù÷œµ‡òV^É¥w¿²?I¼!vïX•HopsÔºgäžÝnÇÐq¹š·SÎ”>­¾½š#^’lÝüçŽqƒŠ\$5ÒÇÛ–¹ù•!ù1Ö(\$qJÐg/´\\0¶eZOJ7¹(ÞñŽ{û‡o–y ˜À¹­mïó*È…\$~	Ø]»í¾DAõS[ÒÝ{•òG=¸Ä\"J_C9š|¶jÓöÿcM-¢µû{ÐD&ÄþŽÐöR&\nŽ‚oòýËæ¾¨žÿnÈ*Ä7pþ®°þëå‰\0,æPì˜¸(ž'X°«èaã~XI²a#ÞLb.A×nN¤\$JÑ‚ëÚïÚÿŠ¬2ëÜð°rõy^à4aˆžkÅV£äø¹°84DDknlîëÔë›	´YP¦ë¨ž­P OjhE\">‰„<%æxóê¬oÊ\$Ç!\nŒs‚øÿoP%Ð˜PBeBeðê¢ÀáÍÀ%Ä=lÿNú‰ðÆ¤)N!ÃÐCª.»Ê80ø‡»O]ìõ ž¼M«œ‰ë¿¢‡0›ñ\$N<UÄY«èX¤.6‚\rqõ1ZC#ÛCœ'Â\\?D1ñ\0þàÏo0.0z£Š\\Š\"£¢rîe7ŒÅD8n@èÎ„	ZkOåæ0LCäOŠ^g`Zee€Ob4%*1Ex7å6@î|òï£E\"3ÈÑà#H‚Ä1Ü ,ï¯2d~\r€Vtñj¼Ž>â0dúN®9Ç\$U	„€P€ƒ\0m©Ê\n€Œ pœd( Î%Ìh2Œ|žhxô,HÉ,ð‹føÐB2±»\$Ž’‡(\0í,ÈELaæ`Q¬'ÉÄä²1/ØÖÄšCæÕÆ\r!,„Úã6Qî”D&+¯ÆG\"°¦#ÀžÃ»e\$Ù2®(’²?\0Ô\rãÐ¬†BF¶5£&`Æ€½àf\"Ë`‡nTüRÖ%rÚ`ã&\r¬¨ÓÒä³’R¡ÒÁ\$²÷-ŒðªA02èÏ\0Þæ0Îäá®Y/P«îVåî£jÈ€C6ýF¦óDFZeªfª¢£3>åä^[‚XD4.À\nC(ÄÇdv€Ò.ë<@€¬\r ÊñL•@êDÊ;1fx«˜'â¡PTpàì#…NXP\n¼æ\\-ó&aå\\?‚N(îî!e8-Æèg.ó¢âC.ê¹#&’H\0’Bé6@õ\$CK6ðÜî`¤@É–¶ «!-F”E‚¬";break;case"ca":$g="E9j˜€æe3NCðP”\\33AD“iÀÞs9šLFÃ(€Âd5MÇC	È@e6Æ“¡àÊr‰†´Òdš`gƒI¶hp—›L§9¡’Q*–K¤Ì5LŒ œÈS,¦W-—ˆ\rÆù<òe4ž&\"ÀPÀb2£a¸àr\n1e€£yÈÒg4›Œ&ÀQ:¸h4ˆ\rC„à ’M†¡’Xa‰› ç+âûÀàÄ\\>RñÊLK&ó®ÂvŽÖÄ±ØÓ3ÐñÃ©ÂptŽ0Y\$lË1\"Pò ƒ„ådøé\$ŒSÓÞLà®\$ÓyÉò¨ü†ðËÎ)ínÔ+OoŸŠ§M|°õ)àN°S†,ê,}†ÏtÒD¢£¨â\n2\rÃ\$4ì’ 9ªŠ²’¬I¤4«ë\nb*\r#ƒæ)ã`NùŽ©(ÒË£(9ºƒ\nHã0K« !£îú†KÌD	(ðÈã+Ð2Ž‹³ &?ŠüPø«ïH¦—µÃ\"ëCøç®ÀP‡È#\n7,€…-#ªzp£EHÜ4ŒcJhÅ Ê2a–n|Ü4Î\rZ‚0Îøé9#ƒÓ¨±ŒP&¢òÈA(rê1ŽˆS!B1É[C¦rGôŒÑ5¦ŒKË´©@Ê¡9Á(ÈCËpÔÕEUÉsìþ½B2EYÅÎÏ3Lá+%ì(š1ØƒŽÃzR6\rƒxÆ	ã’ZLƒ¿iÏba†V¦ÖÌ¼Qµ:Œ”·( ÏÓ¤ã[YŒ@Âß Ì(ÝhZL @)Š\"c\"1²• è?OBöYã|L2S%1MRs`Å0C“\rRM%5„ê‹QÅì£ü7\$ãž6ô JU„Å‰Š\rk^„Bˆš*º¤€PŠ<\"Ã–j!ãÏÊõw1L†ƒâ0æ'’Ž¸àÏB’f6H SFÒ¤¨èÞ3Ïäòà(c<ÑŒ€¨7«‰ô¹ŸJsôÜ31T8Þ¼2OÄ‚<£Ã8Â¼¸ÙZ›\rÏÐÊaL.7nø@!Šb¼ŽÈø2ÁÆ9gðÜ×\$©:¬ºº\ní®zðÝ<§“®¼92›\nb™Í¨ÅÔÓ+£€Ò9E[’ëÊï3DÔ9³Î|Æb’Óp“Ðæ;®µ<	Ù2œ€@&ƒC(3¡Ð:ƒ€æáxïï…Èþø—…Ë¨Î»ÿD\nï£0H^]Ã“b:z¢ú7<\ra|Š>µôxaÈ,š¤\0Ð¦M™5.ã/ò€›2z&(À”±¶B{IäèTT<†ÊyuÈ%%cWP2oN%øÁ“		Ðé²@¥   \rìå( @\n\nˆ)CˆP‹&s}ÞißM%ì‚——(|%\n`œÍ<e”KÑZ=š“²zÑL)A€3/ÇüHÉ¡Q&!\$ˆ‡“IÕ9[_émS›¤(£ \$¨9€@C#ã\$ÆéÃ5šÑ#±ô&ÅÕ›\$Æl‚€O\naPƒ'@OˆÁ4Wiâ1… ÊIaPò:Âó—òœˆn¤öfNè‰Y	vŠøY ³E×‘ù>¡¼‘åP]×ºù)p9€@‚¤9O\nœž³•ÿ4}\r©´9‚`•±È¹<¢†¼EdZ6–‹@'\0ª A\nr\0ˆB`EiA˜E”Cj´/ÓMqš²J@ÊNHa\r\"„ˆI[±8ZÁ\\@Êƒ	Š_ò¸64”¬ãBU!˜„¢RwñÎPQ£5)É£<§„ÖÓ*SLŽ1ÇwÌ JtµnÊ2\nÐäu2(dÅX†UÒ KDei‘+3Óÿ¥uIL5\nƒ\$TVSÍbÎMÄ\\dD»Ð6Réì+øT‚ÁÔ(•C±—ÖÓ©O†ðä¨ÑwGQ‰\"ÿ›õ¦ºÉé¢×Qyèx­Á^®ªDk	ñL!+‘VüŸ+ÄŸ9çŠ—VÇ)¤P&äÄ+4ÖÅb,\rŸ&@aˆÐÜQƒÂƒS,YM¹¢\n¶í:E,Pâ¶é;2nŽÊ*Ÿ!¨‰*›–íF™\\“ƒ’¹£†Æß2{+HúO¡¹f†)Ó´O	èç³Jl­\\â*AHý”fMA#E‰³ÀÊÇÏÊSFó¨*†.ÆÉªÅ¨æmftŸ*Ž º’v@›SjAV‚ð@CU;L4•Vaa„ÑBW2TI	àÆ~ˆüöuâµ§£ð«p“N&¶­‹‡@\\pÖ\nEh£bpfË¬¬Ä¤ác>Óˆ(mÅŠl:BT`aæüË'ågaòI5Õn	Ã…w’LnéñÒþÅùFQ(e‡±±²Ë“-3lÀÍBa=‹ô;«’@H‘Y\")`9 N3xn–«”¤mÅ(—ã¼§LšMIá’b¢ÄhúL&ø;†PÅ™²ªAÙÑs¨×iŒD}aä›9øûT! &…lÛ\\Ið%ÉA!¦Œ1d¬<¥áæ[Íš{§ÒÁ°¢æeØdyF,cú¿öDgÅÇ>*c\$KëÍmTKú5mC5±sVÐS¶‚¢m\\Wn·@1{”ÍFdTÊóÀŸm6oƒ¢O«Ë6äÝ–#GcÆÉâ³§u	hg„€((V	\rQFóž³ûƒN=ö]R>Õ’ùÂ¯òQkÅm±µ(]Â\0Ol-E´Lü,ÐÜ¸¨d(“olK)OXu1hÉ“vB÷.š¸ñ)Õ›Ò”ó©·6îÝ5¢ô~{¹íge2¥Ô:›{ÝýRé¬OeîpÆYI'Ý?¥m®ÂÇ:~BÝ™“D‹¿²×å6Ý!Êò—¬{0¾*í]Ebþà]»(î‡³»|ÓQ?PÅ½#oó}ŽaµÂv…ë´ñÍß‚<ŒÛòtß¤±íÓp\r/šO\0&f)ï>M‘u.îÀ¦B+M3 „%f~“ãq(e?#Ó³ÿ\\¶Ý€dì=¼ÚŒB‹;6OL—Ä¤ÕLéÊQBdÙÁ?3pì;Aéª&Ü#~¹îYÊ·þôønn÷‹YB–\$?¯xù‹g»'žý?Ã«±õ+g¹©ñÛAŒÞ¦ÙoÎÈ´ÿÏâ½ïø°·.ù\0k¸½Ëá£®¸…ÞEìB®Ís)\n°B8Éïòý®æî¯83PêDØðdm\0¯.&PòbæPmŒô°Æ+Ž«%¬1Åüþ®³IÇÆ|5hû*\\9ÊCc(ß'(¼NºÿfP àâ;¡†gcþDÙ\n¥\nˆ–ò®× Ë\n!y\npª&0jµ°ÁPÈ‰px©ðµp¸MP?	ÂŽ÷#çN‚1J„°ÎRpëpÚdìã/§Žëž¸Ë¢šð\0òÏù+Ž.°ð­±!pÌòÑ(Ð‘-˜º eF{FlÿÐçÏøDEÎùëäsïòì¨? Ò& K@Ð²KÈð„xòdö“Å’p¯òEE_å[˜A€ØkœÓÍß°†«lŒåÌyQ\râH/€ƒó±šyM’‚Q’ãO\0EZÛdô„® ¬äd‚\r€VÄÐ—Ìä¢Œ\nñÆ0§xY¢bÑ‰ˆs¨öB:o\0ª\n€Œ pÀÆ¼1Î^ééšf‘ºï~41Âú2gRÅ\$NffuÅà åd†§2Þ«Aàò¼bP°®“ã=Cö?­´ºƒºï¤1Ì÷Ñ¸\$ÀÂJ&/q\$áƒZ‚J2‡h&Iy!C¦	’ŠÅeì6ã ß,ŠÕäNÃŒŠæ¦@°\0ám 6E<êÑ”ÐCêºÁNòò´±¹F¼vRÄ7’Èñ„ðÿQL§ÍÔêÀ¨¬d0cPU\0ÊpÈv=‚l±g û/’0/ÔF`†X%¦gù2¶µP•(Ž^%ŽbÞ‰H©’‘1åÂÞŽNä.R Š0%˜\r\"àF^PdT%äÔ?’ü: î«¥z©ð¡rø?¥Î/CøƒÞ«³LbòLà£  9km+ð'G*j\r>êŠ©8rc,\$¬ÖÒÐþ£pG‡4àÓ5#]5„å\rPâF`EÊ5,„_Ä8Pö	\0@š	 t\n`¦";break;case"cs":$g="O8Œ'c!Ô~\n‹†faÌN2œ\ræC2i6á¦Q¸Âh90Ô'Hi¼êb7œ…À¢i„ði6È†æ´A;Í†Y¢„@v2›\r&³yÎHs“JGQª8%9¥e:L¦:e2ËèÇZt¬@\nFC1 Ôl7APèÉ4TÚØªùÍ¾j\nb¯dWeH€èa1M†³Ì¬«šN€¢´eŠ¾Å^/Jà‚-{ÂJâpßlPÌDÜÒle2bçcèu:F¯ø×\rŽÈbÊ»ŒP€Ã77šàLDn¯[?j1F¤U5›/r(ß?y\$ßºâ¡±Š¡»”Í¦Ö´JòMxÃÉŠ‹(¨³So\0ë4šŽ‘Êu¾˜=\n Ü1µc(Ö*\nšª99*Ó^®¹ïÃXýƒ˜Öa¯£ ò8 QˆF&£˜Ø0B#Z:¾­ûˆ0¡Æ)02Ž ô1Œ P„4§£“L\ni©ŠRB8Ê7±€ä4Æ¢˜Ê=#Ãl:)*406Çƒ(ä P‹!	¨ P2ÄC|JÖ°lj(\"ÃHÐé#›z9Æ¢¤®0ºKèá4Íi¾ž.â´69¸è¢þC{ÜòMã¢–5µêX(\rãÐÚÒ\rÍê%5µ}#I´­ëfÁ\rcªÕºˆ“p5Ä(ÈCôÕUe]\rV]Zý.o`á@1b0ê7\rq  ŒãÊ3¹‘¬ýLP@PÖ2@ÉÐÒ;J¨°ÂÔ±s‚¶84dØ&&ˆ‰0mûö<•Èƒ`Ìã’æ1˜AN«óPIâˆ˜›²åmP=Xm‚4\$Àv4Š71c{ö;_¬[7¿…7J7´ÊPNu!IbŠ=á)Ä“ðèœÍ8ðÑG˜ùRñ»“ Å3HBÐÛ±Ø’6¢C“\"Ë‘dˆ»]{¶ V-—ãNTñC´þó\r”SÎ£3Ã0Ì¡\rÃ*V'Œ“ÌÚÈÍÊj¡;á\0Ú7\r÷‹PŽk˜@Nè¾½=´Á`@=mÚüI[þßÖ#lpØ6ÀNÃ±;.Ï´îë¶•û}ù¹M›¢k»o~ôØîû@í¿Á_76/\r~ì‰÷µ\"[fÝ¸O©C>¼ÆòŽs›ï?»ð:3HŒF:&…îö5§\0†)ŠB0\\kƒ+¾ïC2R6°SÑ3ÎïÚÞ»Ùv‰»ä14“Z4;8»)PªsÜ7Éü7wvqí¸ÍQ¿½Næ+O«º6Ê=á¶‚ŒY4Í¨4&Füˆ\n{Do<ò@C0=A :Evx/ðŒ-wF•q)à¼1‡0^VOØn}á¸‚%ìƒ:0ƒA|1\"5€ó7íƒ óöxaÍ™2˜T±€\$Ýá‘‚4”…	;}¡Î¿å8‹ƒfqäÕV1zI	Á:O‚¤•—’÷Oz;èøL»BøC!E5ëqa}ãê\0\"A‘œœgŠ¼\0P	@Gæ+H³á@¼†kcø'|ã8È0ÅÑB<†Ç&‘Äy'Œ—™Âg#I;x§UF‚tM^xZiÏìŽþ}PJšT*¬55BüOá1ë\\ b®D‘t\r-ÜÉ	Èv/è×¹ÂŒÌÖa‘Ôý’·+]I?((\\Ÿ\0žÂ£-/òåƒ§¶ôÅŠ¹(nòìÎÀ‚&Ú\rz~˜4†pêpÄi¦;¥c(Å§æVq˜5ôII9V\r¥ÌÇ£8G‰\"–Á´7Éâl‚¤Œ7äÁŸbHÚƒÑN	]+@0†CÔd:\$ÖU²RjÉèv\$Hí°Í68iM\"M\$4ñÓ‘BŽÂrf}	„:‡…TZKè„\$U¨‚¢D«‘TÂtèVŒËÁHÆEâ[ØR\$	id=ª”EÔ-;Ç€V×tÀ¯É1\$¤¥Q6þÚ\rÜ'Jåè¨sD™ 4GQ£¦bV‰šfU’–)‘9¾Y©…=–:y1v2{hDtÕ’kJÒ-:JI„úËähäyò‹åÁõ©Dƒ•1AÌ\\9NäL‹‘ªFGÉT+»ùONÍø† ÂQ.-Ð	á‰Ï6\ndÍ\rC.áQ¢CPJzG„HâRþbÂ}³•Vñ®Yõ+cÓ’Œ!Í¥†ÌÚIØdWÚVP¦Fj¨e`)‚-\0ð‡XÜ_7¨ã!Ð´jA\r±¨L\$|My9´ä›S±Zq0Gðä9aBqÔUÅ˜¤Ö'ŒD×ùŒŒËlg¯H­Í%5)›ðÌ¯×aÏ„Ê=ë0ÈCÍ©d €û¥³ZPQ¨D®!ê)„¨C	^bÚé!Map%a4Ó³b‹øzTJÄ•õbú–€kV¦Y±>°óžóÀkW3¿çÈ&ÓYÈ™Yô2*íZ%5Gf®…»–Ôš;b_Ç“C>YMV­Q˜º>Î7x¾¥(‚«©ÖÍ'i	§%ö‡Ñ:ƒ@ê;6Fu2”R„iXê´š\\ãi“2­Äš¯ø¦Úr¼B´•«‰¦äãÓÚ+P¾·³—îÆÓº 6E=i£f{Ùëý·k<ùßNà€gÅR\n’Œ·×	\$Ï‡‘ùÁ\nEQÁ;{*…S÷ÂmÍf…KxÉXZ¦IY,*\"©¾®1Ü2’Š„ÊÈÝ4QÁL89¤Þ‚Ô\",·ÊZ¥¯ÛRT*‡c2Ø:Ü.MZði(Ä¥\$Ã‰Ìƒ¡‘0ä;ÖìÔÒ§7ú@ß‡:›Pï÷AbùTksuÍ|ÒJ’§ô•!ÐŠ‡N'æàžtœ¨:¥7öyEZ)×¯/aúK³’¾¾¹zÓNÊQÔª¤½°*”ñýÔšÔ/kf\$ŸÕÁ\r\0 ¤¤C!¤(RØ2¶b2\\èCµb˜¾‚'äCb¢	ý…!ÜVbžŠ}°ÒÚ*Â+<;FK+”ú¤˜ìËIë]3^““íè’œ50~©Ý}Å¦ø]‰ùw>»eÙušø~“ä4TÅ~‹9ÁNþër5ï;1¥á¥“²¾Ôùò‹AàåOîéù©ÿ	 dèónÄhAHZ<¤å6íHÒ/à~-zÒËhÕÃäþêíC~ÿinê¯þôpÕ-*cštÏìÈoòúoæÿ ÂÿïÞ×OÄÒ|¶€Ãjp§C¤ÄáÖæÞ‹ìRŒ×ìK#‰©/ÄÐjÒšý@Üá,0\ràÔÝ£|^fÇŠ¨ªÂ8{\0æŒ‚b¢Ž?`Ô–eT‡ŒC@ànÂ<UjL#*„§!¯Z9¨Å	¢leèÎ;ˆ0GŽõ ÜÁÐŠÇÈË(LÊŒ‚²ç\n]P§ÃpŽßîðì<c«¢¯0’ÁE4Ym\0+ÿxükìŽåÂVúÌ¦RìÉL˜€ï‡NÛÈ²Oõ\0.’\n¬—±@ù‘.µOžSM\$7 ëb2Ýñ4µqkã@Â½£:=jæk,	b*Ì–ð\0ÐSK@KæŒƒÊ­„&È0/™CJêÐ×*‘)Íoñ±^¹Î’L>ŽX›¥:Ä åE#{e‚9Ñé„ÿD«\0ì=ð¬/ÊÄI@Ö(ùh‘ ’FŽâý1a!d\r!²qP¿ñf(ò&'‘Û\"7 ²89ÏO’íÄ7Ò ¹Ò10°µ‚SÊÄNLdJÒIÎËlS&do',W&y®èá2XÅLg#Ìc'ä²CäY‘n7D\$ÊéM2l÷°`KE§*Q+¹*iK²\"þ@Ð\"¡C‚ãñÆSOø21|ƒÊ1iH”ÀëÁy-`æÓæŠrê~çKlLM.b5/ãG.æÐÒ“rV	b2sÃÌV%èy¨:\0£#.fÞ;E¦Òp\n2û3¢„4MQPÕ³H”¯¿3ÓQ3BÕJe\r€V:\"†[¦ôâEMÂˆnÅJÈú^hoR2AN!	ˆÉ\rH}.hòßê\n ¨ÀZW3ŠX%#c:“U4@Û/K;¦tøð%sY0ÏRg¼øíxÕSW¢ b*\"íp¦œWl`¼¥E\nÀô/ìÚJªçƒ\"	b8ô‚üC8­ê\0Šb\$Ê£òoPä@1'€·©À¬© À* ß«Â'ÄàÞªB\$jô‘ëJEè¢¾DCPÞŽÞ0nÛÇæ-¢ÞÕÜ¼¯BÔ¦â°çKGnóF¦î(€à&£å:MG”‰!T—HoDmààç#Æ(N§IT„_‹ƒP­ òY…ÇÐSã\$EàA†Nø\$nü½ˆ€åš¢B…MâHõ@ðW ¬'HÃ	îf/03r%£öHî¥‡KŒOÎn(Ã\" ©P±¦\"<Û´®<À´@E'J\\f#ç¦Fæ0-æÀ’ æ°\"šGú²¦’¯ÕJ±{HÔ‘Sr<<u\r5 ´\n)Q«\$€Š†1†Z–dV!Æ²";break;case"da":$g="E9‡QÌÒk5™NCðP”\\33AAD³©¸ÜeAá\"©ÀØo0™#cI°\\\n&˜MpciÔÚ :IM’¤ŽJs:0×#‘”ØsŒB„S™\nNF’™MÂ,¬Ó8…P£FY8€0Œ†cA¨Øn8‚Ž†óh(Þr4™Í&ã	°I7éS	Š|l…IÊFS%¦o7l51Ór¥œ°‹È(‰6˜n7ˆôé13š/”)‰°@a:0˜ì\n•º]—ƒtœŽe²ëåæó8€Íg:`ð¢	íöåh¸‚¶FÛþÈA´ŒàwZv \n)Þ0Å3Ëh\n!Ž¦~Çkjv¥-3Še,Ã’k\$SøV¢‰G¤Òä˜)ÎOÙíÂŽ‡“…üœ—8ƒ“Ð\rî;j˜ŒŽ€èž®#+°µ°œ2Žƒ´\"5¸C*É\n-\0P˜§¦°¦<ª(¦…<ðß­ƒ°Ü‰éÏˆê0¨óµÁ\"‚È¢ãsB­Qx¬Â\r¨ÉB²ž‚Ác¨Ö:°†C4ˆÀì4Œ£¸+Ë-J|	ÃËBØ\"èhÈS0Ê„³\\ÚšŽrlîÈ¬¦4è¼D0® Ü34rÖî\niÓ¸4Ë8æ²3Iû¦Ü/ô Ø‘>ðÒ6,0¨¦§cF3¤@PÉƒ<ÒóØŽc\$è\n\"`Z5¬’\0È7Bê±„€ÆžÐL1†B®Ñ{e/Ë#K%Ž‘¼s0YÈÀæ„² PžêÂˆ-°0ÀvˆÅ>¶ø(-Úðµ/âHÚ8RŠ•Þ“\rm²ÕphZPp§sIÓ¨ÙBÈÞ‚-(Þ3ÕR©6£¬*\rð,€<£ƒpæ:Œcê9ŒÃ«=\"-c˜X˜XÀÂ3Œ+[’¡ÍtàÝ_Œ¡@æ¤â¨Î<ÒëKB!ŠbŒ¬hJ–„\r}å)S[n9PI8˜ä<áÀÕ,`è“Äãš\r>®j%Q³C¤jnûÂñ´1â2Ä\$éJ 9VñŒ49\$S:±§[0\\ƒ@4'£0z\r¸à9‡Ax^;òrC™/+8Î©\\ÀðšãSàÜ„K ä¹œ8¾1&cpÖ×r<Ø)QxŒ!óÊ8‹DÛ,êçÞ -\0@3§V}ºþê—c®cüò\nŽÞ­\r®¶êÐ­Q¶ë:“®B82Ko\\sî®z¯vŠ¤C’p2ìØ@(	€[‰|)ò€€…\n R¦ ,ïˆ)iâ.Lå³Òä!ÉMa¼\"F–oÛ‰*%„¸Ï¤'¨‰ðtE¦ 7¢•®oVëHQMYµ†sÈ{Ëy,”Öƒ{Òi¤À4\$òzC©õ4!˜ëð‚£ý3E,1‘ò\rxpel<”’·ÞÂ˜T HÙþx<á[ì±âU˜3äE~ÃVP¡ë'dôö°Òï›ªƒ-)TÐ9â”IÌx \rfHŽâ@îË™8w¡MZ‚ÓÒÕƒK‚ÁP( b2»×‰ŒPñÁ?tSÀPFX‡2ÑpÌ \nQëØ…(u´\0U\n …@‹)Á\0D¡0\"Êä`GÈ±J(¹s°•\0…l»EáPþ à™PpV-§p\"UÈv-°å(bÂKüÇÈ’‚š)ŽxF\r‰˜ã‡	38Îa|“!¨ö€¦tÏ\rôS\\K’<#eÆP\rABu”ð=#¤MZÚvÉ&y/Õ´·c_“Ý.€ÞÇƒ™â9ó(´YBÖŠTN¥>§<ôˆpOÁù?H\\ýˆÁDb’RÉH)SJGŠŠp\0¥>JÍÊñ”ÁPº—rþÃHzAÁ²h“fY†‡ZsNøô–ù'IÉv›SÒÜÃ|¸M%À‘²þµ\r*<Tü%’UJF¥-ÕBJ‰Ðj6Òl¾IéA[K@g7õ¶·×PZMúçGï)!@‚Ö†Û`f‚L–s\"a‚’¿-eü\$7Ä_ÑªÑ ëä1âÿ+B Aa C‰J}Lù¥†Iè)@ÈQÃ(j3Ñ½§ŸPàñK‘ìM@€•dâoY	N	¬Å\nc€‚YmMlJ¸³BÂ['·÷Æn)RØr!-lÜ•[s-Ïº,Âà\\b@n½Ù»oq”µp U@o(O\nð¶oãÝß—5{ ®z¹O~þ^\"NÞ*šS†„ëtêRñ#ä†LÍÜ%â­­+vJpå%QA\ná”1Ib!¦í*ÁìÛT!#N¶%¹€Ç¢*m±š¦DœƒÓbtYbá~x1œPÚEÛÑŸèP“äl‘`bÐ*4'Z8Pƒ›ÂG„žž£Y†r]Ë´ø¥Æˆ\0µsVËå\nj—*´A¶–tªKàB%ô¿…LIŠ}Æ2õ{)Øì€³ö…Ð,k9\$qLÞâ«•Œ9O’eŒµì«¤âbËtújE4.\$ˆ¦I„¸Wîe 3î~ä¤)›õE)a¡„›l7BNdÂž³Î|e\n¬,Î©Šºc&Yµ»B×!Ð[ëw,f¹²òNmÕû›\0Ã³4¾gÓ\$Nå\0«\"LRU¾«Úé\\K‚F/Hi»Y0íû'ª°%áÜ·–ãÝjÓz¶,š6r»f²DvßSZN¨­üh¶Öù®œOð}¤ûh\reRá•¤ˆÁZ•ÅZËåÁËµ¬ %?gõ“¾•¼õ¶(1¸úDë®î+J¯ã:|¥2s‘Ty/p¥Dž»ó;ÉÌò DGoºëÁuh­K‰1ÖÊm_EÅrærå&¥Àï¶8BY 5O«äžÄ*—Vë?X&Y£Õ•5–¥Ã¯ë+™û^Ãá4·ŸHÛ¯³vÅ­Žµ[¥ð·CG}G4c?\0Ø¯Õ2)I¥ðÛ2+öñiBlŸŒ'oY-Ã³x	zòÍ‡lõ¯5¸<äåï4½²U¢Öba:´<¾%TßáÚzõÂëf<@ÉîÞB‰W‘¯âšx×¡í»Sß”­{›5ÿÄ\rãùÜÐIûÙ@ùcC/¦Æ©´Åí›;ìŸÝáÙ;ÒÍ4¾÷ê“\r:+Í{û~f›~’£¼6&býÈ3¼~Îö‚ìöŸâ½úÜA.ê²ãº?/èøjEoÞë/Ÿ\0oÔôOØTàæ3K óc„\r ìö°,)%Ø@OÐ1b`\$¥Æ.Kvõj Œj\"WìÞÀ0HcëæÐNì&—v,e¢-ÀƒÏ0Ë~M\rÐÞíÔ½l‹ÑÍÖ  †A`Ø`Ö<@ÖÞÁJvîRÒ€3ãBØƒL5¬*Ëç¦3Ð¢#Þ\n ¨Àph€ÊçTF%\$ë¦ÜèªSg¢Êl\rkÌ(B¤’	HÛk’Ëªå\$’#˜Œä^éÂö&m/ãzÈP7‚øÈ@ZUPšið©GŒ\"ÃQ\n\"úkŠN”H\\9ê¸¦‡î0R9Çp**\nE\"#zš@BŠªËÃÚ(-V/\rZ<åp”ŒÓÍ+ÙL8\r`ÌhÏ(ªÕ…ºW\0àÒ1n§Ñ„óa(ÒÑvŸ…º‚b2*%[IKdºN¥“ê\n#%\\” šÎ¤Ø-DT„ÒbW%J“HÞ_¼\$\"þ%\$B‘#Ä¨DÖë„'@ìcc¸[qª-¢ž³âØœq>\n‰Ø±\0Ê‰Bz@Po£œIÈçåP.mG2(0Ê±âþb{gqj+/„¼Dï¯!16#Åf\n\nÒxp,5B.\r@";break;case"de":$g="S4›Œ‚”@s4˜ÍSü%ÌÐpQ ß\n6L†Sp€ìoŽ‘'C)¤@f2š\r†s)Î0a–…À¢i„ði6˜M‚ddêb’\$RCIœäÃ[0ÓðcIÌè œÈS:–y7§a”ót\$Ðt™ˆCˆÈf4†ãÈ(Øe†‰ç*,t\n%ÉMÐb¡„Äe6[æ@¢”Âr¿šd†àQfa¯&7‹Ôªn9°Ô‡CÑ–g/ÑÁ¯* )aRA`€êm+G;æ=DYÐë:¦ÖŽQÌùÂK\n†c\n|j÷']ä²C‚ÿ‡ÄâÁ\\¾</‡ÛærQÓ¯@Ýš…S´—¬†J97%?,äaäa#‡\\ç”ÎÂ1J*Ž£nªªÅ.2:¨ºÏÛ8âP:®¦ŽŽž—\r	fÂÏã:9#c2/KÞ-)SÞ¡µîz-:`T`æÍ0èíH49BpÊÎ:CÖã(Þ6Çë Ê	¤V‘£ƒÃ ƒËÔ6»h`ì¸Ãòâ(#˜æ;ãéÊt¥ÉƒxÎ€SÅ2LÈ;Âï1Œ»v:ÌlÔTåƒêÞŽ®¬¦Î¨¯x¬­á49 Rú¿¶ôqIH<qèÊ:¡ŠÒ9¤cÒˆCÊH„µ%L–ÍXAD&(ò@Ï+z4¤x‚3¨Ã(Î‘×Û”:¹e(­J*åX@RüõQ(õ^ÍÈÜÿŠƒ(ð:\r”zX5½gZ°!\0è¿-è8Ç)»bˆ˜‰r:r\r÷ø7…¢LjáÉj¤¬œVÊ2˜×KSSœá.…áˆcÔÛÏ3LÖ5Ã*r5-\\–\$£„Ë\n¡xŠ<dS3„÷ÒlÓ‰\$˜¦	5`ÎÞ0UƒÞ6P.Ú´ƒ (Þ3ÃbÏ\\6#l`´ÝÊÖ^9ÃzV6\rí @&MÈZ+bV\"Ìnƒßdä¨ë@–„\n ‰¨øƒ\rÈ¸Ðž )ÈØ:z=© Èf««ë(6¹7ÚþÂäl›2ƒ´íy^ÝŸî•Rn°í]¼¡[àÝ¿&b¦)Á\0¨7´Ï%®ÈçŠ/#\0 Í’#L£hêŒÄJxú?ØÅ!=jf éL\0Èÿwü=z¯3ìU¬3Žc ÃNPÃXŸ%s[dìýú÷àÊz^šªL<äÂê³”Ç‘î*w…íúþîÈƒBáŒÁèDWÃ p`è‚ðïÁq\r­9äÊÁyëhÅ‚@Áæ0ä°:?à¾ˆÊ5@ùÞ¿Y!Ã\rÀð†|Aû¶*ÍÎ#ô2FÍj-n9/28SÍÈ '+™…SâÌ‹Ó\$æDê…\0hS%°XÌD\$ù\r\râj%lƒ—¢f^Z8 ¡Èé¢!)Äé£³)P)Ï:…8È™Å]¢„cŒ§R4ÐPTAKñ)ä|9% `â0gvT–\0‚èÞPe_!¹ªÃÕ€®LDgää›·ç~OŠ‘áé“¸â¤‰ÕBŠ8^ðä†£g&M•ÚC7~\nA0a\\Ž9wjlå”>ò4®šµdGBdeìê’Ãh¤\ny¢/ïyu¢´R! vÍj)FbfxS\n€µ=ƒ¡J0o)MÔ¼°ôå¡„¿ Á£”’–|qKaÈ£‰°xç‰±4’ñ: ÆåWŒ”(ªK˜3@Ê@nXNˆƒN™°AtäJš\0Œ¡oDe¦¢ãb”Èé6H9O¶âÈY–&a~D0·Eâb0á«”*¬ÂxNT(@‚)r¨A\"„À‹R:1a¸0¤„{U]«pLÝ\$G5\$‚RbÞIa<8Sõš y£H%<”âÞd×ˆm…Šr{L˜N?\ríµžúôèO)Ú§Äù¬Ó.ÅÎ|ŠŽÄ3¾ƒÅÍ wP´–ØRÀÌìC×O¢‘?Ù†ïØ™‚N-¨Î¦&Œz€PV0á¥tUÎoƒ©bKƒ©mÊ|x±èéÆu¯××cRD§“¨p	¾8!¶ÓÃCT‘¶´SÒ°ÉÐkwnY{2XÓó<Ivù“êÍÁÅ+à‚ÅXÂf¢Ã(wº*P·ÕÄ—Ñ²´·à›JÃTˆU•í¤ÿ#&¤†„a*ÒšÓs#N‰Øh®ÁÖ¼2Âè¯ˆTÂä°êá%«…‹zä0Ñc¨ÖÈ\nCŒd°1Ûbî\$²g\nA¼þ4sØ.6ŒÌý9ä?h¢¨áP „0‹Ø6fìáÞÞ…Ã¨pe\$2S2R[åRS¡NŒ¼€Í0Ò[›å‰Í™u@gAÌÆi´œ¾L5š%‡´4&c[™Tú¡Aª¡¿`—³{»Á—:gfæ§ ®l3¹íµ4D!íq^a7«)\n”ß:í]ú8<Ö¬óÝrÐ†G:–ÓF4ØbÍêÅÃió†W´sÔ‰™ã§Í\n“ôI›ÑeýjÖ*Q)~S»–˜¶Ù¢	)¤/Ó8…U\${Ò9KEÆ^<=¦¨ÝÀBVk[˜Ã\nI¥B*PÁ¸Ñ^#”-ÊêuC°Þ¢e5„[1“T©×1÷_‘ÌÎŽ“¢¦\0¤!‹/™³Õ’D\rG ^žLâáDmÑk#%eÙj•ânÂž1tˆ7½—†•²gÆWO\"fºË×¤‘@Ž¯(Igpæ‡+vµÚ=©­%þµjÚ·ñï«hV³O^œL?DX5ú¬s\0AÐÌRÁT’_ËôÜ	g%ÖYmÐ©X^Î\0 &V SUêµ‡³ü«Žž>cû_5Á¶iÒŽÞÁR§*•ù»³NóÜºÊ—áÖ;¼0~VÌ‚èäOo‚š³?â»—‡gž=ˆ?¯É<&^Ù\nügKßázÇQ‹ÍKóWàÿ>hâd|úô<‹QhPéê6A˜ÑDÖh×íƒÕ6#<Ú¾Ùy{u3Á¿œü_EÅ<\n˜²ôÓààïš`>{…ï|°™…8`Am&MH9‡\rœGCoÄ4”ªöôiîC¢	‹¤Ö·t˜£’¤¿ŒÀ~_Ît@@¿%´Bb²ØÃÊ hd†Úâ¶4„ôý/®#¥´BŠdø\0ÚøBTý@ØÀÃ\0\\ëèIlÁnÂ¼CBÂl*1‹àQ¯.ëK//²'ŽÚ>+ÞQ^òP[\$dÍ^ì]°b²ìp(°{o2ëpƒ‚›¯¶00pzëLo	Ð“%\0é#à#`	@Ë\nþohâ-lÖg˜ÄÎcŒhöNBò0~&obŒ0ˆúPÙðÜò0–òehVÊÌÀ2\nImÓ\nîF°ó\n‹F\rã:yc«Ž¾\n†€¤2 Æ\re~ç¶(¤É\"8à.[­êñÄ³«	KB²ñ.S‘C\rïñLà±2È\\eåo+îOpéqo‘q`fL4(¬9Ï‘E\$Ãe;5,0:®õQE;±‘0êDã¦ð1°¤¶\$ºAñ\rQŠ²ñ¾Çñ”ëqË1rï‚f	Â!`ÉÏ@¼`ä”Þ\nàÒ@¥{¥Féðúÿ	œ€ÞÊMLspùÈ¦àb jÊ‹æ°Y§6Iœª¤Î‘íÊ;G6&T4Âv÷¬úB\0†P Ø`–hÑ\"UäZ0£°ß‘¨%¢¨gä\$þèh\n ¨ÀZJŸ\$,þcÏ*á.ä'\r„äÍNÍmu\r.#²ˆØ®·Æ”®œæBNÊí˜%Là1BaÆ80\n=íô;#ß)| B:I¤¨7#a%MöŒÄ˜i%àæ3ëz-Ä~Nª	‚4I`š%-°UÊH=äŠT\0Ú:ŒXÅËç\":ãb:{bàN PP#Ê]bH.Nä\nRbB¯£æSàB:\rrBÓ/ó?)panÆ†Ô-1&(û\"; d*q—3\nM1,lB˜#³<<º!Žnq„–2éúžÆ>R\0ñ8é°ø„l¦J+Æf32’&„ .ƒàA+R?\0êèêÉ6«¸‘âtJË¹ƒ#ƒRüÄ”…D™1ãI2%\rÓ(®Î_CvS,bË>Ÿgˆ©¦¶I^!E=åâ¸c†J…:ëXhÓ´‹kåÆ\0iÑ²„\$dÝ\$¦%ŒX#ƒHFdÎ/b";break;case"el":$g="ÎJ³•ìô=ÎZˆ &rÍœ¿g¡Yè{=;	EÃ30€æ\ng%!åè‚F¯’3–,åÌ™i”¬`Ìôd’L½•I¥s…«9e'…A×ó¨›='‡‹¤\nH|™xÎVÃeH56Ï@TÐ‘:ºhÎ§Ïg;B¥=\\EPTD\r‘d‡.g2©MF2AÙV2iì¢q+–‰Nd*S:™d™[h÷Ú²ÒG%ˆÖÊÊ..YJ¥#!˜Ðj6Ž2Ö>h\n¬QQ34dÎ%Y_Èìý\\RkÉ_®šU¬[\n•ÉOWÕx¤:ñXÈ +˜\\­g´©+¶[JæÞyžó\"ŠÝô‚Eb“w1uXK;rÒÊàh›ÔÞs3ŠD6%ü±œ®…ï`þY”J¶F((zlÜ¦&sÒÂ’/¡œ´•Ð2®‰/%ºA¶[ï7°œ[¤ÏJXë¦	ÃÄ‘®KÚº‘¸mëŠ•!iBdA\$šž*¬M\n@Pd0ÈÂ0œ7‘ä7®‰lHæ¡®‚W/Jj°¥(\nï>Îr¸™Ï¼bgfyª/.JŒ®?éœPEˆ¢WK¤rC«…º¹)ï”¹/ª£ö§Jª\"½\0*®b×§¥ÒªÊ;\nšÖÁ0¬:Ø·1Š\"¬²ŒTIF™äl–Ìh¤ÊªÂFtŠ.KLê\$ºË@Jyn”ÅÒ\$m/Jé4¤J¼˜%o<Ó¤(e­¨|¶Þ½‹àä\$Ú=*ñœQÓ6…^§¹6K>ª{˜‚ ïÅ¤š¬oiœÙÓÖµlèWÔ3[iArLï¼ÕjÌ^ºêAj©KÞÌÄâ¾œN’§LßÊ¼Ìà++‘v³Ï\"\\‘±Öíî•\$¸ú§ï®&^¸µÄ¥ão¤”NPŠ¯>)ô¢Ù#ã“B¹B@‹ül“«4Lž¡Î|ÔgË.J2ò: N¤éc*>€2Xt%Ù²:„ÈÅiC{iK%Æ6©¯6Ä'–Ï½A›µ\nÊvª¢j–º8k•ñ'Ã{aœSBÍÔ¤æ¤\rmIcÄä.Ò¢xû)êŠÆˆ¹Kª¸‡;8ÄÏ.mH¤äÜ/4«©•j©IY_½—Ò\0’nÄ˜)Š\"d|ÿ+öÅ@¶!•6ó3tw*ä‡lÑd+ AûÑI’¾y¯oƒ^)\r1™ø°mÐ ª<Ùkv’Ek¾Ûþº÷ú0¿¨µ_kw¦¹ù\$£e»ºËò6úèç½šÇNáÊßŒµ`û—´©V9\\fnÜ°²^KÔž±RÊã—ËázEèÖæ«X\rÐ9\$uHZA\\ ¾+óþE‘ý'ý›ÕDÉˆ,\"€é†Bp«Ø{Øq¤¥¯“¨hÕMrYæá–R\n¥³•†¥RBD\"Ec>¦•‚¨†\$3Ÿ£¢:ðpÁf`.-Q·˜`†Ë,3FŠ¢s˜±!ÑÖ5,Î™8‚}¢)a,¼ˆ(’ÈPtMZ–(“YÈLUs`ƒŠÃ\n–T1>)¿§òRKBS\nA­CöCê{vmšÅ°I£é“A¡ÀD,ƒOLO,)5†Ã’Ž‹Œ(—Džcª\\ÊŒ1Š\"\$™#\0	Zm–qÎ74÷.ã,†\$\"AŸdRI‹ šZ®\rÄ’i¤{lKÈ@eÀô€è€s@¼‡yÜƒd\r¡¤7Päƒxrà¼2†éø`na¤7ÏàD aŸA”:N@¾ƒ`a\rÁ¬çNZv>¥ÉOŸ°xÃ>@(r¡cêÅA‚.%Ì¿ êIPs¹*ó^07RXÉ\\;…dìžæ~ÿÑ±8…Jg°ã˜385ðøªŸ‡pÙÁ–ŒP®ÁI)³6°ì“BÕ\n¡ÏÊŠVÅÐ§«|M\n‚!U,ˆA´äàÅ³±¨PÕBAã'XkPP	@ƒ\nX™à)é#+âVZNáy`¢Üß•D³0i--[Nù²C\"¸j©*0¢”ÉÂ(]Ùº|*%Åh%)XVŠäXoˆŠˆWh©K+qÐgºXš%úk.“	,S‡Gb sAÚ\"	.Jy2˜çôÖRèm1£Ÿ¬ê\0¡\0ƒ<§¤ö—°~cšX®³àÙü²çÞ‘È0Jp±|ì½ÌGùM£9\n<)…Há“É«¼(½œ2oS…«&\$™ÙwpJ @otýcJ“\n*ývÏ¹(Â@À™O3ÉFRzOÔE3ƒŒ]%èØyˆ2¥¼:À™hŠ ‰*WÆv‡ðpƒ¯¹Ñ¹HžL“ýÎ^«mÄ>µ +üÈ(¤£à4wË’¾€(1†ðÙDC¥\rÕŒH˜eDIŠbª¨Üg,å—Q—Ë™xHæ,–™TC9\næß3PÎ\\‹ÚþÁ´YŽzJ'¶_%x²Ò“\$SGÍi8iPø\"áöÅ%Hî-'Ð€ v’\$nñ‹³‚ÁN“À.aýS˜Ù)Ðu\$µJ­(¹ˆ­Ñºe)5–«ùiÝÉ´ÂúÁk+C­fª5H†P­ˆ”}cÖ~oR!®<€\\ò‰\0ŸÇ–Ød’E¢YUèx^ØØÃÊ‹˜ûQ*?›ZäÎAî*(¼“nLËx6C¨g9¥âI®ði+'ú\0ƒéZÇr«¼8èJAJÅY¸:¥!Ï\\d‰ø25„¥®½WÃøjšÿÕ¦MµÔòë:DN}\r€ ‡•²ÆZc5èÒÌå)6³ˆWIÚFË6ŽS¡»úr¤-’D¶Ú,h¤ƒfH¢šU ZØ|íŽº®Vn­Ò/|+…Ì*èJÑfDUæŸWžÁ¸Ñè&u]Ó&…^ü¤´(î'­Ñ¦NñÕ—­¼mƒ\$Ó‚¯¦Éè“y7\"_Ö«eE„l÷\"ð5Q1ð%é¸hžØ,Õ`ñ…[Ž†ýd-Þ¸b [zÎÎÍüƒ›¦¾±ê#¨]éRÚ1n{¹_^ç{h™t6ªÜ‚T\n!„€@C¬ö\r-HP Êpo„x:‡\0á>Z`d0«Q,â	Ë\"*V™24ð^ËH¯pV4ïÄ¢NÑPÐ*8â}»¢\\êü—ÜYm¤&£¾™;V§€à£x¥/ÎHí°‹L¼û\"ŠKï¸ºOâ\$oæ­ÏêÏîÿ(p-¬4ÿ¯¸Û\0¼ÏÒÒ£\n^ƒ ©g<2ÄŒ,GRcê|ƒ®²'¨®bQ¢¬ûPýâöiâG'0±/üÄoï\0‚˜gðï'0ipTýP Á4É.²—/*î*†K2¦¥ßPÞìæDF\\8ë¤1(Òµ©–‡DŒÈ\næÝ\nŠ.E^-\"úÈHÊ.ÄXðDMÃ,=j°GÌ‚ÞKtbÅ¾©¤|RÅ\"ádü­ð[ŒŒÏÀ@àÊG#	¯6eNïpÀ²pò2L 5¯@p@Åjz±ÈÜaçzgª~¦­'Pm*^F¬q\n„¢Öñ8úÇ¾[!2´«2]ÍþBÉ~}Ð¨Ð*¼—eXÞ‚òV\"¾K§JU(:h\$®h‹Én‚Û(À7‰c­®èQ’µ‡±,Ûbí7\$°>é;\"?Ž-+Ú'üêv„”ü‘‘j0¡?ä\n•#p+g˜ë„îBñÈCáFu†&ÜÇöIq¯‡Ði>g)€\$\\-ÈÊÔ.äŒÉšçˆoªnßÌ¼UÏkgŒÖjH™&æ)çÆà²Ïf,DÂ™\$R6Ò˜`²0ÚK\n)R„\rf‘òA±öÛ…0Ñml”Î°T¦Bèb¯¢ÊÑç2\\§zÎ\r¨bnµ ÌÞ€ršUgS)P-±³*£ M› ’s+lÞÝ­ž|Â‚x‘ð£qõ+QÞö¼öGø|’ÏÅ\${²G)Çß*Ý.Ä@é\"ç+ïc rÛÒüé¼=ñí-e70²¤ 1dÌ–FJ?ÊÉïè7\$•°(\$hè©\0001Á\0h·2†g2Î¡3åÐr³:*s>'³C+Bw/Æ;hLýŽíÐbâÈ»Îø1Á_/D¬ÛÛ*SxÉBÛ7ê‘8)šÊ\"-1ïóÆæû3™žHŒ ^³Š^²ÀèÒÅ/­¢CìŽóg8“b²ìñ’CÅ8º¤ôíNŽ‡ªvDNýNÖD*\\¸‹Ð{2Ó'~—³ì8,p¥¥&®ðüÇ5'ì™&ŠÜ¸Ò„Ö…Á>“ ¨4%,JK‰7¬–ýîz°(ð¾+Ôr'éCìš,s½8ePrñÑ ƒóöZLºaë’:-L‡Îèª*šê­2ˆzc‹ØÂíÄ*£’;ÊØ\\cÑ’ÚÑ—94•H™Hr0rÃ:òÈzô±<ÓIŽšf¤ýŽ`!ÑO\n±×9£ITÉtÏ&”‹&ÒÙ'Í\0¢ML¤nñÕ0Rã0”é0ÎÛNB#ÔïMÏTñ§¬ýð¥KÊÍOÞz©–ñB(ª²Aµ)	HÝ\rMþPêF¸”œ‰gT5KC\nšN#ó“**³WM*ïMrÉ5\rÎô¬sN.º>Ôÿ*U`ô“/<TºÝoM’Ô¨®¾¤Œ ñµE”ÇX.ßP‘]°Þ9\rK”ûK*ÌYÑÀkuŽêGñW¯g8Íä•1Yr•´*ÙA®KXØ\"·@T~†ÔlŒR2)_0\$«1™PÊ·nª‚äÝ5yZt½Wõ_]Õ÷^\"%^kûV’×VÔ“,‡‡:µ—Tk —V-Ä]Z5.B¬Ö'^\rÏa\r\"g]…Jù_E]fMd¶3OÖ-ã\rYR:×öT>d§[v\0Ýf±\"ýŽzHK¥dÔÕN¶|ñD5!6:ÖfŠð^“ÇWÖ^ysfqµ‚dSPáQà{5¨þkRVíœåjÎ•\rOE¥%ÎL…­OuëJ5]fØö«€ss©j²ojqÍm¥Ò­Öáj\$Wic\nšõ¿at‘,aj\$F¼n åkrLd¾sFôä(Ý8R<neX{âè]-åµž–¶)—77;3o…}tCŽkÈLVí&qö¬ä¦ž*Š§IÃÐ2w4“ÐƒpÒ/÷³k×@h¹‹h[xsA3w?b¤è1»ŽV.PpO`†‚€Ø`Æ\r€Ò`ÖøDªÓ(µ|ÕfŒ!i3L¬Ei‚­LXÖ³î§¬œDwðPÉ°ÁÖX`@\n ¨ÀZ”“I6C&ÇqÂ-ÑÈ‹Wný\nuQÀ/1ÅäÛ¯YC®X°©Jà@ÕNtjëÉ!N£P5kXn11~ÀZM2î×\\E§,ö­fò7Þkœˆˆæó_@ÄRÝ^.jVDÔ}ÔŽö×ãS·Ú¦ì_p!‹Ò5ZC1PEÂ@o>ìhh%˜²“³šäŠH‰‚LúÑ„¸Ž4¾î1‚èëª²2,Ó\$’S‚³Eå¢¶qf“¢½4BwÑŽñç2¬ð‘³ÖóÏŽÎXH(Èu\r?^Ô¤…Ù‘†ì€\néhU[6ÐëŽ±ý“Ô'ðTP1e‰6‘T]jé>M\"4ÂýThmÕAñ%ìKBFþ‡™ëM^NB!íw(ÑÔ^˜Õ—°ÑÅ¹˜²e(‚õ«\".bl\$¨e²p–@µù‰4R`Ù]Hqj-1nó—‚P”±b\$ÍrÌPHEB™Žv-ÖÉy¬‡ŒŒNVU—vNÍB¿\$K/?cóŒ§1(r».­ñ \"*ÛÎ_#z—•kµgBç›•ã›Ù£oÁHo/ ö<oöG(\"ÐÂž{÷€õe¦ƒ”˜CÂÓ qq8Þ(²L5Z(ár";break;case"es":$g="E9jÌÊg:œãðP”\\33AADãx€Ês\rç3IˆØeM±£‘ÐÂr‹s Òv7‹DYT˜Úaa¬b¦ØâE2H%’é„Z0%9¦P\nÊ[/Š›¢¦YôË2†Ìh5\rÇQ¸Òn3°×U Q¼äi3ÙÌ&ÈNªt2›„hñ„ç2&›Ì†“1¤Ç'Lç(>\")»ÞDËŒMçQ ÂvT£6ó±¦>g‹Þâ§SÃx½Ë£ÈüÈŽu“ëŽ@­¾æN <ˆfóqÒÏ¸”prcqÞ\n)çìæ}ç#u› Ò]üri¼Þ&fÉËvIÁ›æà¢©ÏP·Ùÿ‰Ö :›Œ\"\n€Ø¿2Ã´4¸J¥¾ê à?j Ò«&B Ò#\n\n³9ÈÂH”¿›‘\"kPÚ2²àPŒ2¥¯Û‚4-Ã!Œ*ôO4@)9MàÊõ£ äa•±p™¤Ã˜ÀŽ‹ú1/Éú×I20§4®svöÃîx†âGÒjsRkù'5èØ&\rëˆÜê·ÉC†âŽRñc\nÐ{pòMüß\r.tŽË®K,:Œc¢0,\nÃ¥\r*D0L#ß¶‘pœ:Œª,pÊÇÎxJ2ò¼4ýCQ¢óû,ÄÏÈÇ\rÕKÊF34¶æ°ÃI†YÍnsš Ñpž9FLB‚9ŒkËðŒ³;ÊñM@ÓCTêð<I,HÇW×s]Z6&£\n=`0ó\\¶›¹¨¨¦(‰€P’7ldFâ¢£ë\$§…ŒáCm8·pRa?ÑTšQ0¾ò|Ë#Q4•£4ÃÖ!±ú/ˆŒ¯ZŒ&óC1aRˆ(42HÂJF·\$ÍØŠ<\$™l_Š¥¨&a3&EâQs)\"D£d|Ì³i[\rã0ÌòV)‡`*/]W€P¨7§cÜà¿0õ¶‹Žc0ê•\r“JÎ9…‹ØäàŒ#8Â³»!L6¸ëÀP9…0ˆÞ5²B¦)ÎÈì¼Žp\\\nÔÀØ;?phÜÒ·û,+…ÌiPÌ·\r»O&Rš9n¾K”ñ¿sx@a•)ô“Îê}2P&Ó\r¾i…x£¯Ü<á?í<7S	ƒ\0¿/	@à¿cºÝP*ƒ€ÒÆœ8xý`Ì„C@è:˜t…ã¿ÄF;¥b9ËpÎ¯?e°¼£Ž ^/i;P:{úú7\ra|Êƒ^aÐðÂ›‘DaÑ*’	»|\$!ÐŒ¢EÐxID¡ˆÉvZgW¦ZnŒò0AŸŠ±3<Ï¨€¡I:gäýŸØL€_‚°5!@\$\nÙŒ\$\0 ¤’Œ@ˆ!ƒdh³.2d–Ù ¼Š†7z“Š_dT³œ0äc(a)aád˜3\\+Z8Æ¹P/’|ÇOé‡ehj-4úFÜ9ð%Ôø¯hH:î\"!å¢Æ`@T ¡9¦Å™0ÊÆ	ò!A´Èù‘!±2QX’#^9¨&A@'…0¨\r|5c%ø4«P@bÚÑApèáØ£‡	±8'M •‡XÿãÏEÆ1äÞaHBq[Šò“#4g)ø€!½’µB\\ë	Ž„‚ 0T‡ÒÄ²²Kä‘êjAÈÐ>„_ÈÄ/D‡é#3ÿ2ÓXA›a!…@«>‚HZ!HÄÍ°„ÂR eÔ6†&Cxl—ÈÌŠPÚH' p,…5d&sÖ‰qZ€('‡^R4>mŽ\n8Ê\$³W9áŠ&\$Å˜Óv`gkF-é1?Ó•ÄCQÏ&‡”ý¶%BQ;1z0beQÐ«:#d¦¢BGXGÖÚ°7õ%lÍ\$;Á?lâ¤UäŒÔ{)dÅ´ŒœÚâ#é€dü‘#Ÿ™… @™¬—\\©ª3y 7@aä>)	4†Y\\p×õ}±hà3ÅbÜ÷j‰¬*W\"ütHz¦¨8/uš”êÁx‡Žª²àæÇÙgpb…Â“T{V³È¾ˆÑ4\\»Ìm`Œ8ß–{‚ªVp/ *\rÎsØj‹1\nÎ›;Ã>H'rFa¼tâ•••5mÄ¢%]åjËƒt÷\$Â5¥˜tš}EÁÌ&VG[Qå<)˜\"šéJX[3±Ä¢(óžB TŸ 1‚ÞjI9¡\rò\$Ö3”Râü}%A”5\"…îžŽ\"hH¹Sò²©™ù–\rê•Pb•:‘•¾\"\$Ä[†<>k›N(dø¨•†i†­Ap	Æ4±ã\\nqÎ-Çx¿ãô2LŒy©B„vnáÌ=Ë1h-EêÈKl©¤RUîè8á¼])n©¡†?äÀ³„­„ù—ex…S1þm&yœÄ\$6éPwe3š°#Ÿ\0`aŸ{CUægˆô\"Íd‹ŸÓ¶•Kq‰)Å ,©É@wƒp'=çbPtÙPdd‹eÂý§H¶¦ëüîÑØ³5‰\n²À(\$\$Ev[×åpÌl¸å©C™”Û@*g‘ód\0²qâþ`®¾Ûm:RÉÛ®ÖÚÎ—Ú©³Mr³ÐAHÝ-Ãn¶òñ±ÛžŠÐêß©}_¸OL×ËeÊG±Ôý!VIUÉÄ7ä“¯¸t‘·mg€O‹n\\Ër©¸(TïhU©˜BDi\$p²må\r§ê!¶U¤µMÝÈÑU)ã³–ç«Œ†©˜Â¥E%Oåµ&©î®sËÏ<[•Iîv)€Á3åÄÎ×³Ý¿Ìm³<•g	Š¸n™l7&ÓÙÁ0ÿ“swñuÆÙ£\$Èå8B²lapÙäNÅ‘û..2ý§m™€‡áÅÚA¼Ã~Æ)ßuûÏ\$ÚW£w‹³É9öç	ˆ{[ë[®Qz8+ã\"ƒÑÛr°A¯â÷GÛO—»ÝçŸ‚õÇ®9N‚øÞF€\n	*ò—<à!ÎäE^²\$/9Œç&88d'¥&Á‰]\nÜÓ¼3ïï[£x\$ø=sîÒ7wRñœ+{ëíºD?~swëqŒÃ/|çÿ}Òõ^ýÑÍúŽ\$ÄÎÿ@ÿÃUzµý¿}gÂuÛz­¶º,%èÀC~ÿÅ²]îDÂÎEçH1\"T²G£~]D‹î\rèÊ¿Eèéíú¶ÆI‹ònæûŽ‹Kð0p=ïÿNˆaåZÎ%ºú/ø­p9ƒÀÿïÐe\\³p\0xÐGÅ²ãm`¥Ä”\$\0ìqOÖJll÷i[Å0Î/ÊÝný	ûpRçïöaâ\rð&¥LÆHÐ}	N­0N0ªfª?ƒŒ#K˜»­XJÐÄ¶Ë¸‰pÞ>0@Úˆ3\rË¾>0ËÆkÌJÊhV‚Qê7d\$c0Ù\0CžÀ¤	(žCÈ¢þÌ¶Ñÿ\rÖ¶À/ÀÐÙåî.Kx^\rô<âF¿#vTÐ`­­:OŽ×ð­ÄÇˆðîç˜/D’\$ÂèƒP#ÂRc/æ,|íBbÅ‘~€j§L`†GÀØh¬0È~ÝÄ9ŒÕ‚,Ø äl¢dÆL‚ì‚~n\0ª\n€Œ põC†0bÐ&Ltìè¸ÐŒÏn#Dˆ,ž.¢Œ#\"6Ê<«\nN¨©€fË¢-žü-àíæëD®8ÃÈY\$8/+ÔcËòÑkÌ‘ËâO\$ÜÍ‰`  dÔEÂÔhB~±„b:rL®\"©&|\"ìˆ÷°#å²ñcf³Â03Ï2Žé½!*¬:@_ÃJDƒˆj/®5&Ï¬yÒzÛ¨nýíÀ/ÍÄ\\rnð82H€8Æè´G¢ù„\08/Ô³à„>Æ¬ÏTÞ(LOä’7jBZ`êZ®—-e¨ã¡Zãåš Ž¤ãü#£ ñàaƒ^D‰ZO”qÀîÆÉ|¤€á+0úcôtn¾´‚IƒvGÌ7m„•­f§ÆK¦>è*Ì§°\$Kr”ëæ*6nx³´3(3\r\nPœHÃYD\\¢ôü-É²¸%j×€@š	 t\n`¦";break;case"et":$g="K0œÄóa”È 5šMÆC)°~\n‹†faÌF0šM†‘\ry9›&!¤Û\n2ˆIIÙ†µ“cf±p(ša5œæ3#t¤ÍœÎ§S‘Ö%9¦±ˆÔpË‚šN‡S\$ÔX\nFC1 Ôl7AGHñ Ò\n7œ&xTŒØ\n*LPÚ|ž ¨Ôê³jÂ\n)šNfS™Òÿ9àÍf\\U}:¤“RÉ¼ê 4NÒ“q¾Uj;FŒ¦| €éž:œ/ÇIIÒÍÃ ³RœË7…Ãí°˜a¨Ã½a©˜±¶†t“áp¨QŸ–lÛï7×ŒüÕÁ9äóÐQ.SÃwL°Þìëá(LŽ¦èG›ye:^#&X_v ¤RèÓ©‹~2§,X2­Cj€(L3|²ˆðÄ4Œ€Pœ:£Ô  Îê†88#(ìÞ·ãZ‘-á\0000°€!-£ä\nÉxä5„Bz:ëHÖB8Ê7¯èµ/âd(\\‚ÿ )0Þ7´ñx§3q|óŒ-ðÜ“,ïHå'­òHÉ%¤h°˜7­ˆ«ÁBS‚Þ;h<‚†¡‘‚FÞ1“ë	8*“~Â¨£Z¦¢,âjúß²I Êø…°’\"Šñåª7íŠŽP­¡­@TŒ9Ä#Hä5¨‚ÿ*@HKS£#¢Îï2H»×A'R|·ÈÊ“·R‰ã¢t2CE•%ŒÓÓ¬[2ž²C`è\nMD¿Š‘E\\•\r#XÖ£Dí ínÃ¨Ø64Ë’\nŠŒlc\0(‰h ì9 P‚óÈ»g\"´ãéCtúÞBÃ\n0@U@è7mú~¦Ëý&¿ÌÉ&¯”¢+!ÓT;3³ÔÍ6¢^RPË&'H¬D2 Q†J­x\"\$©Xä’B*s™f˜à@¡¶“É‰ds+Œcñ}·XÙÑ{*ËÅÉHÞ3ÈÚzšÌóJ\\R\ròá'¸¬`óÊÆ1°ƒ˜Íq/B9…0å¯Œ#:2ö!OÄä…<ã(P9…- ß£\n¦b˜¤#m£ƒÔö%qKÒ²Ò6çc«v4¦±Ž°ß\r›UvŽ–£rzÂ¨Í¦Ê4ÖÈÙŒïZ©Äñ{JÙÈ(|¼ÔÄŒ©ªnÂÀ‰R9Ç9˜@2…DƒÁ\0xßÊ3¡Ð:ƒ€æáxïí…É%v9ËHÎ¾Ÿ ðÖl=@Ü„W+³Eú\"ûdÆ\ra}˜,‚7à^Añø I×òiÚê\"H• GO_ã¦1. 7«xf‰!Fü6×U	¨E*<½ Ò}!ß0	Q‚\"V¹Ï£#†EÁò@P„Ð ûTjRë5?Á¬´¼åhcš{&èÀ“ÂZpZÊŠb!É‘â\na‹ÓÉ=0tö\"‰\n‰)? (\$‘@òe% ætø˜2ix yÁÅËCàÌ—Ü ALd 9Gè0qÀÁ;ãHMB€O\naP´X×^›ª:¤™FÕ9‹WXD.0±D„‰/SêN9Jƒ@p¦\rEC)Iì5.v›ôÁ\0S]€€3'#%\0F\né<À¶b±àYñŽé\0ŠÂÇÀŒ	z2%ÂÔäàP‹IOç±”xY\"ÂRÅ¼'„à@B€D!P\"€©Ê E	v#ÆQA[\$ëAæÈäú,áPàà´ÊÛ\"ÁX™-’¨‚#Ï`Káf¹cºÙ†EÊxêœHvUÝe§¼˜BV±UË­OŒ0Òr\nÍYA2/ÅÀõ¦8?'“Ó\$&©‰‰“¢^)1kâ…læhm8§ªy®3Ê”ÐH\nÐKêùÓÉòI¢P§:›ä\"èÑS\"Ò*«X* m1h&qƒjO…!²´ƒ\0šÉK-…êº‘`ªå¤áp83‰Ÿòâ\\ÈÝ_\r!éR„4€Ì+ ¡ŒÖ!¼éSoäÅÁ‡6NàjC‚Z–{ CœLjB,<ß¢NSØA\\kf¨˜§›¦j}DMk	z®Zà¢•¶AÁE\0æ9#ËxJ® ¤¸ÈÔ* ’Â8E\nHñw‹ÂtÔƒ\\ÐstÔ‹¹4ïT’ƒ…*¯‘ä”Ë‘¨E\nÁ'@¦)âgU:µ¥†µ:Â Aa GFiZlùJä83++\"€nu¤Â‚h[’¦\0¼a¢ÕL×}9®Ñ²ŒÛCi/\rIb,Hä„­u/a.â£K Ué5UwCa*‚¦¤©O¦‡•UTAÐæ=¥Xþ¡Ÿ×ÓôY;¹@ð¤bN|Røw\"Å0‘ÚJHI%¤9q˜¬a&b%I“’,¤”â¤-YùrfçÔõàS§\"0¢€´,6Qá“¢zrO\"°Qdƒ™· MbHsÕÖ­\0êfMÅºD2ˆ„¡«1?³Y/Ä®9“Zÿþ¢tu‰ª%I)êÈà Ôráad–²É¤ ïâÈA­ìA‰:æ¡dŒU^¿°ä7bk3âç`6Ê°´.\0¦€ÉrP-)Ùl¥ÆJÕÎÅbC)yW+è(–çàrÜµ™[î×¹ö¤ûs[…—FKRN¤~ÃÖ;|;Y9”­E¯d¨2ƒZS²^2Ú(Èð'm[òÉ6n»¨ºø½ðôËÄr	B®ö}C\\¥ÅˆÖ•Ë_òJÇ˜ÑßÅûTºVéja¨(Õ=’45Æ¹N×¹Ú4Nq¾ösiÚ%î°su9ÎN)}Ù8Ï*ð¡TïWGœ•kë©+Š1WÅð§9›}p&¡èKëdb-f•ÁH5>ŸžÎ¬¾69Ê]Ÿ´ÛþÅÛ·æÏä…ì&X3XQjzfmbàá L‘v@.ñ‚8½|r ñÒ:‚‹ÇŒÛI×ƒžî´†.O\\ Õ18·D9VÛ\\Š*¾>4(B¶ì??â^‹YÇ¯v‹4î¶€¶qéª8¨›NÑIF¨õ#Ò;K´5[â©\0SÒ8Ÿ<ø1G|î‘´!O|©¼ÍDýOŒîL|Ï±ä£­¿¼½ò}wŽƒÊÿGâ8Äòò>†î”9þL§¢«öæ`æÿbä¾€¨¿:Ó.ú¯< ’Ã0­@^ê<7ýOÆ Bd\$Ðª‹Ö¯êçM>ÊNž½-dPŽØù•Ž¡ð@ýÍvû\r~µ‰xVmÌVÊ¶bÀá°>,ïþ FÎ\rÅhÜîbr¨]…8ÖæäÔŽòÄÚ\$ƒ-ym~	P úîö&°¬b¤ù,¥Š¼H¦¹+A¯,úÊÊJ	ÀáîÓCLò§°š ìB¸¥\\F¤üðHº+Œi†Dí¬˜È/àÊJþ…Ðý0Üû/ñQ¡ÏúW·I²º‹¬»´¿Lý/Ö<ªØ:p÷\r-~Jä7ïÛnáqJ=Ä³\n0`È-jÊ@¸¢Ì„ P	X@È»d’aª`p ØÄZ1.óìŠ‡ñzÀ¡‚6„°wÈ&¹Vùð¥Ml	m \rÊ.áLdÐD&Î³bTbêë«ÄÞ‰Øã0OPd†\r€V\rbfSF!¢–—Ïæ>\"æcØ\n ¨ÀZ†\rÀÆ€Ãš&§ð-\"JZìvÃàÂ&­–Ë¥šK‚zxcüÕLL\"À›!@Ì(V\rëÔNâ/íæ£íÄé#ÎÑr=ªÙ%‘Þ\$\"!&¨¥„Éâ>9ÏVåJLâH^2€NI²1Æ ŒöRëŽ4ÅÄe\rë`€í§NÞ>\$\rHßí*JœiA\nB6¤mm\"²¿*ˆ\rï`Žæ¡²»*pÑ\n‚ö°â@34%\"æòÐUÂN±’ã-Ã¦Q+*ÍÌ!Ñ\nrL¤Œ†bCè‹\rØd\$ô‘î¡MìàB92e¸¡ƒüŽB†Ÿ`¤ÆlÑäˆ#rø\0¬„àîNÀÇ3©ÜôžâÎI\"dò¥~	h*Hb#mÒO%¨,²²·e¤¥E*)ïØdM°¤S„¢òÒS †yÍk£Y4k1ÃB³Sh2o`ÊÀÒ0‹ð7ÃV\$’„±^œDD-à	\0t	 š@¦\n`";break;case"fa":$g="ÙB¶ðÂ™²†6Pí…›aTÛF6í„ø(J.™„0SeØSÄ›aQ\n’ª\$6ÔMa+XÄ!(A²„„¡¢Ètí^.§2•[\"S¶•-…\\ŽJ§ƒÒ)Cfh§›!(iª2o	D6›\n¾sRXÄ¨\0Sm`Û˜¬›k6ÚÑ¶µm­›kvÚá¶¹6Ò	¼C!ZáQ˜dJÉŠ°X¬‘+<NCiWÇQ»Mb\"´ÀÄí*Ì5o#™dìv\\¬Â%ZAôüö#—°g+­…¥>m±c‘ùƒ[—ŸPõvræsö\r¦ZUÍÄs³½LÂv4›ŒýK©\"ÑÊ[˜–±GXU°+)6\r‡ž*«’>n?a ¥&IYd„—ÈcC1È[fâÁê„U6©	Pœ¶H*|¡jÚ®¬¡\$+TÉ¬ÉZU9P“&—!”×%E‹ðö2Íz˜'esÎª 0“´–ˆr«41\"Èˆ=Ò	P¥?Ä:¢‰–oñÄèR@ÒÊ’\nÒ¤lœd¨ª,\\¥²ïªbÅÉ„#®é½i4¼ŽÁ,òZÂM‘«úC³RêË<–1\"K ÒÛí°p´þ•ÎèéÙ;‰*°p£.À¾\n´1»ŒÓtÏ7‰+þ¸d#Q'oÔÄà•éò,2=TáT„µcëW0êŒ)B¤Ìô°ÂÏ]tÉ ,ƒ²DB:…–1{S£¨\nÓ\nBñ{0ƒÑJ›)±h\"P=¨‰TÀ uC!>ï[¯l%vüM&!|ÂâSö»BüËÁ\0¦(‰•ªhúSë]É•\$%•¤Ç\\®‹´ÿ;0…lÎ0­:Ñe7F§”„oI·v[)Œ¶´–R)„®Îj†(þ9ì\"‡¶êÓ<Ì«6þÜ©\rˆÁ³«ãÑ-ãPÎF'Cå“ÆIäp•••\0Pä:\rƒd’”J³þÏ ñ‚7ŽKž5Sä50eÞá(òSŒ`ª2DF(U“úA&ÄQnÎi\$„B%mêFŽH/lêêÏµëDÞÏ¶;ß¹î³ú=¼ïuI¾¤¯×\0ðT]1Â¢)ø!ŠbŒƒxÖ2ÜZöZ\ntL‡Ü²Ã°O³b\\¦WfÅYÄ,~Û¼[É-pô·–êÕjÈ1>ONBPn®?H^èÿ j¿uYË®œVâÄ­ŽÓK¨\$Ä2œy³»i÷3Õ:¡¤¬è@!\0Ðƒ(f ˆ4@è˜:à¼;ÀÐ\\C m<!”9àÞƒ8/vh<G`ÃHo\rÀ¼:ÀÃ(t€a|1ÀÂƒX\"Ì@´•ˆ€<á„&7ÈÞÔ“Xk¨A¤R\0TySlLAæ³fAÐ+q*/D‡*Ô²Ì	šm*á¾’'M‰ÃA…™0;4nŒV:]¥,ë*vâaÚHn((€ ÉÒN`‘Aº?P\n\n)x¥„Õ™G!ZûIè¥6»Sp‚`¬m,ºF¦c”¶É/)­ù\n#ELÊÊ\rqD>·šØkñw/q\0¿ˆ‰’ýrÂ±’4Cxu4ªÀÜÃ¡v\n°:€ÒÁ\0!Ô2‡9‚ƒo\r € Á&`hv\0€1†ÀÞÃ,Ù˜à€8ÎdºÀˆ¯È×(÷ÚŒJ™-~ná¹5N‰BîJËù;¡²ÈõŽ1×#èÔ’JçôzB)e¤“Æ8¢WãŸ®”åz×£ê»>Óù•âp½Âdõ&ÊžƒÆóN™ÛpF\n‘Ýð,’&¿\rCÛEü¤xúCSéa\$ŒÌ)rºØ“I>JÆyåé\$bÑ¹§\räðœ¨P*Z›SÂ E	ª­TÃ\rÕÚÔŒ©Š&&TÂÒú‹,+	p“sð¤aª!Ë4Šä\náiÊèÉ—¢\"+WÓög©æœ~ˆü[%-î=¹õj„ë­ŠMÏ‰ˆºE¨äÏˆh©É£•'åXäª1+vU”Ç:‰g›Ú•\$• ³‡ž Õ»PzlI:N¶Z§\r³svv|&Å>ªŒQù‹%¥RèÆ³Q¸º:I^¾žµJµHh®%à!Ç:dÝùUÑDmˆhÝ\nf5–L’‹—¯=Õ¼/€¹3—R¥J©Š¡kÔ5(°.AGgVNÇ´õ\ršUªKŒi‘S¶Õ¨±+nˆÝšèÑ¤bg÷‰\"ô¢‘)³ru'ákìuÐa*0	XþÙ¬2vÌý*…•®ÔKQS-GWé¾ßiaŠØC¦-ôü,÷ÝTc~ØÊÌ'íñµ9'ÌU\"Z†•n\$û¡Œ\nª@‚Â@ ™pP4ÌÐA	ç¿˜!Ì:‡\0áàðd9FÓ óD˜Ì˜¦¦*¬òØ¬a½'V\nÈÓ0\$˜Xs’g6†6ƒÚ×sž	å'ÇW(íCã0r’‚B§R'h8ˆˆÍbO5Î›<gòLt¶…µä‡B\\Â¶Ñ\"¥Ï/…+ÒÔæKÎCÛ£µ»WäqtaN+‡²É_´P~•8Mïàý¢&…Éå9i§JìZ=_zµiššš‹›HëÇ TúY\\Û°*9³e+G0…4v°i	IÈ‰¥\\T´Ü¬Í¬µû¹S­”ä‹Lî'Q÷Ci67¡\0Pï3~àó‰j·“èheî™TcÄÊó„à¶\\§¸Š¢:å†%ôEb^u;»uàšW¦mRRO@´hÓrsÊhq^ÃS’®_]9ši¦ÿ\n”¼/@Xn(S±ú1à³'*ZäcÂÉr°€P€)«ÄÍÛFUm“gáõŽÝZVVƒtYœÜ±~Ò[Ì˜oˆ¹ë}–Úäãsº6ïâr¶u|€Ù&È»O‚Ä–K#û›åµýù¦S¾ƒÃ¸(µ)”ú3„~Šøg%%wJôo¾åtNºeä®MñP‘ürò”o~MŸiß›\$>w‡âæ>òËë[÷×\"_aQû~è~ÐTÜmQ¢‹@“ü?·BTeŽ¥)¥XÅPâ±Dè%gÅºÕi¼‘`+Úã‹‘8Y8Ä™\nhÃ9Š’1ÀùÕ‹K.Ü^|‡áÞÏøþÖáð¸§Äð;qL§¬–ÿ/è}”t©>ýæ0à°³ÎÐ8/òß°ÃpNÌ'†?%Ta°Dê§®>âMetI‰£ÂŒ?a°ª×c~\r|ñëÐ~9M”±P÷k_n\$ÿ?ÏÛ¦DÄMÎ÷Eü½£ŠF*Æ¶ðtD°~WÆ:øpˆÊdúæ†ZF(º:ÈÆk«Ï	ƒÚpb00·nÔñ%-¥ý†.Ãp·nÕ\r0²•0»\r°ÀøpÌî­P˜ÿpÚÆkhoÐº­ö÷.…«^BŒhÍð›¯ã¦1÷\rO‡‹vddx>Ð\\ÿã^ÊM¨ïn*û„É­uG!\nª°¡1}Núî¦&Be­”f.E‚¹‡\0Iþfå¨Ï\nòàxŒ†^1í¥b“OÎ±dØ\\\"œM'*¾íãkŠIìé…¼àBdOXÐÌökKT)‡là©à¨ÈÞÍª5.>®ÀÆ€ä\r€V› Ò`ÖÎ\röþ.K¨²k‡à`„6\n ¨ÀZ².Ê)/P2&jóÏOoÓq6²*¼‹`B¢Lã@á‘æúgK1Gæ @®¹‘@7€!%° íÉdÌ”rB_Î’xªïM}ÇäxRùb¸¦ZCjLåçVû*\\–,æÖ²„ÐBV}âV×ˆª\$Ã¸­ŽMbÎRF€â*MDÞÊ„M‹Zûn\r*ÃŒ¶\"8‹zá2¸ü/ IŽG,Ž‹*‹ë*ñ4è‹_,ÒÝ#~or·-rºú	þþF¹#å˜Xdn5d,rü*èã„ÞêÄÉ…ÀZîÐÃ®|^hlòclÖä¸¤ì>þÎd\\cø0ÊÊÜ†@½¦!RêwÈp¾Þ1Mhž\rò=É:ˆãµƒ&RIò¡mÍ,8‘RzÒNî§2ìæø4Kú±W6RÓs	/ù3d2sP½l›fœ¡¥º>ce‚7æÆ3€";break;case"fi":$g="O6N†³x€ìa9L#ðP”\\33`¢¡¤Êd7œÎ†ó€ÊiƒÍ&Hé°Ã\$:GNaØÊl4›eðp(¦u:œ&è”²`t:DH´b4o‚Aùà”æBšÅbñ˜Üv?Kš…€¡€Äd3\rFÃqÀät<š\rL5 *Xk:œ§+dìÊnd“©°êj0ÍI§ZA¬Âa\r';e²ó K­jI©Nw}“G¤ø\r,Òk2h«©ØÓ@Æ©(vÃ¥²†a¾p1IõÜÝˆ*mMÛqzaÇM¸C^ÂmÅÊv†Èî‡¼ny›hîúaŒRkŽz–\n(H£X‚\\Z`\n%Û:Ûo¥Ië×ò™Ø‚œ-“M[c©¬æä¶j’Œ©iã82¡C˜æÙ½Ï[ØÉ§‹@ò84àPœ:¦C“æð4¯Pæß„>Ä	«›Š4¾Ct6!'mJt7.àP­ €PŽ2éè1`ê‰|6%-ƒ“ö%ãk(%‰r`¼A­AI&#Jl–0[nŠ\"ÈÛ79O,ŒØƒ¨\$%’x8#˜ò×\rcLÆÑ±‚îÄ\nÉcNí„	C'=O`@î´pÁ´HèÜ¶\rcÌ”ì­´BR×¶,@ª:¿ê»¡£#^; HKO%5ñ=ŽØ#N£Z‰\rˆ#8Î9£;WŽ“8Â2L3?8¥ŽP˜ý4ò\n·9£*JÂ“ôÜ¯ò‰5´éÂ&*\$IÝ\n•à–¤ «âüž\r‹d(5½S¬)Š\"`Z‚[HØ ´QÍoi®á¯-È;”ºmÜHœRj\"¤3Càˆë1, A‡·î…b€PžÏ´6ír*0—Td‹dQõÂØ/Ë>-/Ì.óƒ§õPÙãHè¥ŒÃ4ž2…ª\"MA““\0:Ì¡úŒ±#HÓ„„j™IŒ£‚Ø¦\rÎLêÑRoû°¶\rÓŒæ ¹rt´#K`Y‰©û:œ[¯™Qé¬»Dú®ò€ÙÀK¥§švjE&©«\rÚÂ;­5:î„ØlXó±Í¯fÎ¤íC.¢»r›O9.æžnºÆñ‘ŽC@Ê™®Éà†)ŠB0[e¥0ÌNbÙÓPCeìÐröë¦»¦¢¯t9ëÚ@ÍÞ¬4¦¢J5:Àˆ8ÝÓL¸éÉñz\"…¶&}8ÜÁK2äÁyþ«3lêîÔ¤)Œ³öâ:4Vƒ0z\r\n\0à9‡Ax^à\0.\$ît¹‚àÞƒ8/.ð(<\$ÜÊ`/F¾'îÃ&k ˆ-„‚¢Aà/ øû0ZŽƒxd\$m­bÖŠ™M‰¸;(Ãþó^z`>gôÍ ffH8 p%°æÂj^—Ñ‡?fíL šiÜICGå\0\0 ø‰GðÿEPPSIš+Ytô‚”2\nˆÎ‘Ó:ƒ¶ÍÞ+ŒC\$¢Ÿ2jË¹@d„ôæ,R„]ÉŠ1j=\"šàòOÒ\0yv-,u&B±„¤Ô%Æl¾º@k‡¬ÕŠEƒÈyL[\0‚ !:<mœ9—Ó÷'dùÿTÕ½´ÉZNI\0P	áL*Ôý!!t2‘Y’c\\Ÿˆéôbr4àÙ!\$Šsh\rÁ˜4†rrH—S@deø#\"DÍÉ2~\"DáZÅØ»¦ÑT)€€#@ ŒRfø Â—¾Où@_\$¬–’òbKÉI5\nÄXîœBAçú¹ ‡1[†ÞÆ‚p \n¡@\"¨h€ &Z.•Ô! _-TäqÈ/‘+IB¡àZªayÆóûÙ©S<ô#•â…LS[5Glœ²âlÒƒ”ÂR3,œªRX\"g…\0%ÆËC%ä­\0²¶mÙ¼ëŠ3”ªãKÌ%a1%¬^êó\n<hí  Òuâs(&×s4Ipr‚\0êÅh±Ô\\;t2Ó˜àöJ…Ž\nµÂÙa\ns¤N-”öÉjCÍÉ±W+}¬7ˆ¯É?4G‚²F]\0l«„Õ@\nE£Í¡±¤„Ð\0 ’–ì]W*HŽ“»‚vÌ™‰vëvž†‹™qMB Ô,ÐtD^Ù+1t&è¾Â`nÑÿ/A6‡˜jj’z'\"‰˜3çCÂ“s'hTÜ’·ò†\0\n“5ˆXÊƒ‹eÉ¢ÁP „0Š?'Ne«JV|ç0€é2P\$äé˜šm%é´ì)Ð@Á2!¥Q)ìFc‚^\råµWž\\˜o¹Ï,ûb`Òi‰ÛyÅ6/8<_Œqž/Æª´§¾cÛBñ\ræúVÀsN\"ç&­ÁFãÌZòÛÎTÅI¼Õcè¨eL#c18ùr;ˆæÂ1È\nu.Iš¦\"MŸÄÈéÕi·âI)8î§8ÏÒaìës5–E#\$hçâNŸö2SÊ•ÞÂ`ƒ@Œqt”}Ž.ˆÎI?J K2Mòs-–âò‹‹\r3¥tçmÛSàj¨A<Õ1µ\\„ƒ““Ái‰j-HœC2ÕûKªÅËV3’21QS{ÒäøõŽv?š+ìRlühKòˆU‘ R¢Ê\r–Ú8f‹níóc¶‹ô;ÜËŽ•¥PÓ™'V:‡)\"®B|\$>†1¨!¾ <¥‹Ï{!»qÃ)“ÜLrÛëM=/¦!N“»ÀP…\n\n˜([w*ÖßëÜnû*«ÖÂ;:é\$‰w¯uàl6.¤ç^é¬Üº¬rvûÃ9ýS\\–¹HÌ£¶ö>ÖŽö¿™l“ÐËŽ8(›@%š)[˜ï“Ub}9ÑdU›†#Ç &øô¾¤\\OUm*d>µ‘èsº¹DúòƒÌûIÝ<wXóo¹9ÏqízÇtNfí…%Îgˆ€‚x\$HHúÝB%õÓ•ƒ2‚ÈTÉbÈJ˜–ÍØÛo4lú”å¬ð ¸ÜAL†Î|ƒDëÇ§=æÎ{\\¡ñÆÏ½!þØ”1“Ü1DÝÕ OT\"¼¶¶ÝöN½ÇYvòQŠ8×vä‘Î~ÌË«“¿|–MJþ]¸¾¡†û­µ±¾3ûtÃð¾ñøƒ\rölÙ}}SÃMê¿õ‰ŸäB—›ºZ¤L&hŠt\"i*0Âl.¬VrN¦ÖBXl ë¬Œ‡®€ü/“‹æýŽá°\$êNbýÏxR`ÌU¥p`eˆJè\"éÈØO¯¦ºUîtFL©p¤ÂLN‚4âEÖZ\"\\å2ùÏ2°l.êìï­Ô&Ð{,úfšéO’¸‚%jì1Ï®;`×êì\"iêÊèÊ\\Bd(ý£æèÐ”ò„)	Ïë†’¼D¼O¾äNþiKÂî°)		i\rÎí¯©0”»ðÚ®O¯æ/\0‚DchþãÈ²Œ5ÏÁ\nî™„¦}*èCÑNè­ M\0ætÀÉn¢JÀšMál7lP<ÅÊ-¦á‚2s%2wBålKQJ®ÂJÿÐvŽçt)†Ê„DDã 11`<rÆ†à­D~s'¼ÇQzëHÙq„å †G`Øcng™Î\né'·ŠêyŒìÍ©:ö,z±€ª\n‡\\N0‚Œ›®²È¨¥®·ãL5ÉêëÍÖÜ\"®’%ª ÅQ”&çòtår8c\nad¢5Ñü8£?vDò¯C?Ç2/cX5Éž6c,T\0Çdu#\$éša22ÏEô1gØ™z\\¤xkr/ÌðqHfiHÛBÐ-Cl‘1â¬\"x?ê¡&RN4M´ „(›ï’Ûþý‘á²&‚–ˆiÅ«&d@×ˆÚ¥trÉR‚üª š\ríâÉËô™¥¨ã\"&àî!+¥¬FOÒü¦|ÌlŠ1Àš8æic¯'Ë\$ûlúJŽÆâ8cR&\"D^cnÅ`ç/crÓ\nª[äÆ×2aÂÚ©ê“ÃÄ{Îvãï[.³³²zJÏ®!GÅ-Ã.u)Òè\np˜Ÿ%æDeÄLÎ<-\rxD\$FKb>";break;case"fr":$g="ÃE§1iØÞu9ˆfS‘ÐÂi7\n¢‘\0ü%ÌÂ˜(’m8Îg3IˆØeæ™¾IÄcIŒÐi†DÃ‚i6L¦Ä°Ã22@æsY¼2:JeS™\ntL”M&Óƒ‚  ˆPs±†LeCˆÈf4†ãÈ(ìi¤‚¥Æ“<BŽ\n LgSt¢gMæCLÒ7Øj“–?ƒ7Y3™ÔÙ:NŠÐxI¸Na;OB†'„™,f“¤&Bu®›L§K¡†  õØ^ó\rf“Îˆ¦ì­ôç½9¹g!uz¢c7›Ž‘¬Ã'Œíöz\\Ã/;{ºíxúkG'•®œ,shy»¤f3a}á¸ÎîB«¶6\r#›+£ª€“µc¬¦`NÂ%\nJž< LˆÒì¡*¢®¬©Šâ¼¢¹ë@*#‚•((Â7\0Pœ7£*Žˆ‘zPÝ„DÊBÐ0˜es\nŽˆKðÓB“82Œ#¨#²q£&±'	Ü\n#¢˜òç˜eCt\nhcSÀQhçF,R¢¤µtMt+\n»#s&°t|í1©¬_\r¾Ìé?»jÕìµˆb†Â»C+\0ü)Š”2O3Ú: Ò‰´\"ž¹ã“:7“Æ1Êì(ÐO@Óéó‘IFc«R6˜ØÉ½¢.2xÆ€HK`XV\$»]¶Âº\"3³gCŒ\0ÎÍ•#=û\nVl|9SÎ‹L–\$)}‚a—18ä®C#&1¶iÂô‰‰ciI	ŽËÿ¥#ª|2Ãƒj>Â˜ÇyªIò&)ë“É£(â:˜eV)Š\"c!xWƒ+´J#¤iAât’Éuº8ó›-¾\0U_Tá¡\0Å;a4ÀÝ=3æ_&Cšm^2\r°˜0ˆæ~T¨s&Ž¡á#b{™ÀÙ­3œ£¢…Ö»×e@Ï>#÷*èˆ£Æ¼ÇˆzTÂÖK8¨NéN§>`ÃF€@É=†3î‹F„W8²”4%ÍzøÂ§B%ß<à%Ô7ŽK±›ñ0årT¦È=4+×òÕW.\0Ü²JðÉyÃ¶\0Úî Ap*,|láÇ°ª/%wð¦©Ì s_6Õ·á?[t)OHXáN7AÈt*\rã^<b˜¤#=«,¤º°D óŒ¨Üƒsjêd3%Ãk<‡²©ÓÍ¨4–3'sBDc„—=ó<Î ÛæB¢]w®üÔ¥>ñƒzo%´‘’‚zÀ²Ø: ðž†ƒ*è\"\rð80tÁxw„@¸0†GŽNIpgìz°4vAx\"VAÉ­‡H2É2ó\r`ˆ5ÕvÒñ@ð†|ÌCjWp	Àª2hfS2{ÆÊ¨åçM	f¬ý³RøŠR\$j9œ¨\\Iaa,jÙY§Ó0ÐºD\0àu\ryM\0PU¡¦+æ09’ÜINJ}Pñ@°sÂf]£–g0Ï£S*ñŠ!,¡µÇ\$2@SÎy)2p0É\n—³žä\\¡^“<™J¬4ŽøÓš“W\nóß\ráäÉ£vÃ«b¬0¤‡BB&\"1ÌwLÔsœ8¬0Öµ·\nÛÈHP	áL*çZºóBÇU'\nÉ1ÜãNVOì©°°WòQ•‘t“×¬¿\"a±xs©Ç“Cþ–Û	ŽÁ@ÑK3o-z\r¾´C2µÉK+dÁŒÄâWB0TñÕîLIY-%åvbÌrbJ0rLçQ Ãò•èþL)0°ÀÆÓ j½A<'\0ª A\nÓÐˆB`E¨hÉ4Òzv([©’rsÑpÃEA½Dè¥|/£ºŒBxp‘ät+uøki!“?(9 £EzúÂy1€Ö4†D\0S†!Á§µXS©:=d5æQ×ÒaÍy(jÜüŸ´èÍƒ6g(ˆ=bð‰ŠÁ	m†Å<3xúvJŠW—¦v=®¸’Õ	ÐSYŒh3ØÔ¬óThIí³Ø«!gl™^¨–v×U„îH@\n¬«­Y¥ÓA[@rŽl&&ƒ§ˆBK¹=BL9?JsäT\0&’õçæ>ÉAÎ*‰40†j\0‘JÙÑ	*EpS„\rN‚¥ÅDä=î\$Ž`Ãbdµr>É‚€æ\nS\$z>D°Ç·€õJ=—4Hø¶ †ê‰…2\$<2ã\0i9	\"Q22dB¦Âê¤ÀW&¿B[E7—´Áy†zf¤«Õ7cÊxÜ)¼MC¥”\$á»ÂpfQPrQñÔ²´²/I¬.e‘Ñ†\"C²a0ªõM‹fÎ[=	Aé­„C	\0’®²”d»Ÿ*6‘±†C”Œ©¸xQÒuL(ß•ø àƒ< @ÎaV2ÀÏÉˆÌ&üˆ×zOl€Ô†8òÃanaâè2PqiOn©nèfÀ4HtÑf¡fèý\"*4›ÄÐN¥i…Q¦­DnUg`6¨ôàïu”®déâçi†ŽÃÆ¡Ôz7Si'U¯X–wKš#]j&©£5)Òélšc×«§ÄæÀ˜êÂ:×Iv'h¥h¦ŸÊB×¨\npÜˆŠA™ÈºrŒ“¯!–c [JiX\nÈ†Wý¾àW¡‹jê-D·)€Îü®¼ölA9Î'DÅ£àGI'W¸d¯g~GBB[/l–Æ£ótÕû`«¦:ÇÉí¢1æÒ’Ã&Uùh©‡üo˜ŠÊ”7'|çÄ›Ïyù”°H°åfÈŸ?§àýi¾šÚI—H—º» ï\"yÖ wQ—¬pTõdgU	DêaêKLeÛ…Y±­Ç5­_Ðvïá0­\0+»djÇTêuï*²’|k„Ø@»b¦2Õ´TJIXnÃ˜?’€QTWÙ¸ÀŸ«Úû#;ú×3Í–›«uÿ=n#ï¡}’VÓÙ†ŸmÛu±Ìý‹™öOKëÚŸöD'ÕuÏ‰›-´ÅÛÜú‹dV3ri÷Õz>m)‰Ý(i3Ú¥±Ð¾C>ùM3Þéž„cØe\$çðžÆ³¶Ú=V¹0{82éMWŸô¿Þ’`'¯þi—Ô9–ÌýoãUmßà!/|Ö”êìTælX¦AP’ïÒê\"ëÊž‡î¢¦,].Âÿ0öâpú¯lëÂ”ª³‚8ÃÄvIÚüíÒ\ríàˆ&ú7¥úxÆ*7B|«‡0(Ü6€@-Œ²Ão3¨À!0DrHBÐT‘ãØÛ‹\$¥°ÃÞÆhúSZcçDªXp4çÐ\$Åëæ,åX@¤öÂÎVËÌn¶¢Âêå[®|ëoäõÅX;¯ñ\rîfêkÛ®ï€lÏ‡eðç,¢§ÏšÀOHú\0™Œ¤®xú°/‘Ñ!<úï glp2qãÒø,°Å'ñ.=*ô(n<: ¨QÉ–:\$„.HÁã\"LÂ`biÅ\r\"@‡íœêïìýªùÏZ*ïÊÉ‘Ðãƒ5ÐÝ±4DÑ8|Bz|Œx‘ðÈÃ	Ô>E„;åJÊê+%§ÑEë}©ÎHPñäà2¦DF.¾”¦JÇ‘š´qùðå»PøìqŸQðÆqææq'\r2V1ÿQ½\rÃïŠ¹oE«N€òñïUã ªé\"¥%l³#¢Ç,dÇ„|ÎQæ²'\$%ÜÇLg\$¢ºû­^û*]ìvÇ² úÃ&èQ£’W\$lzÄ¦Ç{&²\\Dñ ƒ ÉñL§QE„Ë…ùpó’œEÌ»&ñ&ç«*M2rú\0?O”ÉdXÂ@Ž¦%|[¢yÌóB\$güú¬Ð3f,æí«€!+A.N.¯'P´;#x¤¢aB¿ ƒ/¦¾Ï.\\ˆaOäØå1¬¨X&?c/ä‚,@Øjn\r&J5p…)îÎCoO+„>!-Ö°¨53.bÉ.Æc3‰r§À¨ÀZ\rxýñÂÀ¤OÙ2OüHó,´3€\\ÂSBtÜÇà”¦ìï3Píq®QQ¬[¦œïð1äÓ)éÒí,~\0E; ä†SO5\"`šbQ4ªXîÆ¶]¢ð½(iå}>Æ¶> Øot· [:3ä^—#¶Û”írõ2ó€,C²˜Mb³.ÁAsçòV¯Ž«B4¸³Ç\0OBTC¯ó3\0tEC’öSÆÿ';gN”°Á­¸GÚ#¥º\\%ÂÎk!4ÂÎÜ_#ü«êHRì­HO3HªA*©\näÃÛ+c&KOþ¸Pè(mœ¸’Ÿ`¬²êv¬Eì¥#\0\rÂŽKä=èI©FÍN,`ÜÌ«¯k+«&B’ïNö4\0¯T0±Ì~ÆÉWt±MFKô1ã-à	\\®’HÓ6>EÞ@ sàÜ";break;case"gl":$g="E9jÌÊg:œãðP”\\33AADãy¸@ÃTˆó™¤Äl2ˆ\r&ØÙÈèa9\râ1¤Æh2šaBàQ<A'6˜XkY¶x‘ÊÌ’l¾c\nNFÓIÐÒd•Æ1\0”æBšM¨³	”¬Ýh,Ð@\nFC1 Ôl7AF#‚º\n7œ4uÖ&e7B\rÆƒÞb7˜f„S%6P\n\$› ×£•ÿÃ]EŽFS™ÔÙ'¨M\"‘c¦r5z;däjQ…0˜Î‡[©¤õ(°Àp°% Â\n#Ê˜þ	Ë‡)ƒA`çY•‡'7T8#DßÀÚq·NJ•ÍƒB;ºPQ\nòrÇ“;°ùTç(^e†·ÈëÉ:àð¼3„ðÒ²CI†Y²J¨æ¬¥‰r¸¤*Ä4¬‰ ¨4£oê†–Ê{Z‰[îì.¸œÌ\rªR8ƒ\nN°„Bòßˆc\n†ßˆNêQBÊ¡BÀÊ7Ä£ äa•­ûÔÝ`P§4©Ì”¥5*ƒ*÷D¸†ŠÈC\n:¾,´ªŽéÊãpÊÙ>\nRs3jP@1¢³;@ëŠc*@1Œq\nú”ÌQ8‚6£ŽÚ9­’ß‰£{¢·\rKtQ4Z\\Ü7ò&7¾«\nAÓ2òÒ!-AQ4²Lë;Ï(«#?3ÌÉBÎÍŒñ”N!>ãŠªˆ4š¸Ì¡Žsk¢À<‚dˆ¦Y¨ª€ÙÔ\n‚n±SÂñ@€R_LÉ\\à’\$¦Ý°ìH+Ív°¦(‰Œ€Ü1³tåÌ0Ž³|P©Ó€0ŒL \\»L­\"4Ñ‰H…/ªsUàøKr8Ž£,œ!³t)‹7è6œáµ0áòH Ô5P|N\$¤‹ÊNÊˆ£ÂK—ÝxÊSJÝK£“’LrN=ŠÉÈ5Y=7ìû*ÑÚïìá3(˜(Lì#Î[ƒtQŽ#µÓúñÙj©¥Áõ˜X‘S¶`Â¡\$*ý2À*µ˜7_#x\"kNµ²@îC°i°&Ç®S»>Cµ%{eLmûŒ’*\rã^Ø!Šb²ÈÙ\rÁ\0Š7r¥lÁ´Ó	^½’ªiXÌ¼¬ôn7¦š‚^7¾é\nƒ#µœÞ°#ŸYuÆT/`vz¦Ä>C3èù63k‡Áô0F—,Ëk«NîÏ#‡¥_ðëÌ‡Œ(ÐÍŒÁèD4ƒ à9‡Ax^;ýte·©Arò3…ìêÿ°ê*„IºPÃ(t|A|PÖó,\nm³À^Añ*qa1­b¬kAóM¨t¤”³ª³*µ?®Ñª¡`Ê›aœeèµ€£\r`@ù\0;UºYù0‹œþ­‡ó	A\0P	@‚†öfŒ’Ð X›“xTÐ'dxF0ŽÌy(B%!÷VXA{¿yç¡è†Èšw\\¨¡råA­àðòŠy…+È‘A1BP{,´þ‡ÔSPÒˆ/ã’•ð½‰	V&‰Ôò,`\rI±&ôÝ•úÕXjË‚A2?R³´~%è:J‡~‘C¤\n<)…FNZÊÖVçUd9”töM¹*BÎ‘ßÈx@ð\"›6A¤;²BÒÉi=\nÉ gZ¢1G4ü ’ŒWAï	Œ†YšHöN‰à s¦#Hˆwi&.­¢M³&”KÊë0ØÓCàä_RHx\rá´&ó^lŠQ¦	À6ÄTžJµ&Á!…@ªB`IA)D ž\0U\n …@‹BB	6A<)*)E¨ÀD¡0\"ÑêE*çvá°:†Òú¥é‰T\n ¤™A1iÐêxp™ŠÐ+N²RIXhfNIY 6bôuÜÚ¹1­Lñ6U ¦q(/EÒ¯ÏI]ÝXrí¼Ç°¶vÃ›ÓÔ<éÈÅ-êÖwH\n;Ï\0þ³£LÏä‹NÉV§°A[œúçg¬Ô2›†Ôakó!O©%#¢²¨Rmhž¦—¦\0Hñº:AX¥Cb,UÒ˜	eÊŠ™w\r!û¶§Q\r.´âš²ã\rö¤«#ÊŒÚÉ1áb}ÏÕ}2Í-Á‰Tƒâ+BB¢éKUo“´¬]Cª2ª®Â5ZìHÑ³0l|ÂÆ‡,æ\0PVI†þè›ÕÔ•é¥67ãF\\g*ú’¸ä\\Vßk4±Øejäîv\"¤ÙFG6QÏKa=ÍøDŠ&½)_Š³‚Óæ=	J¡†•r¥\njƒõx)›S†‚3¨aèå|£f}=ê'E6.+›„¨êÕ¨T\n”0\$6^1(tÐ‚‡PàÌÑÙ‹E ¾»s\$g‰:Ÿ\0¼*UA•2‘- ÙYÐd’™LéŸAÁá3¯˜ØÜ>Z6JÜ ˜2†cÌ¦€0æ…AšèaÍ™Ò6´ƒ]ºíCf¼ÿg2PM;KÌ(¬±hg–œ2]t‘\0».h¬ãs%ÙÏŽßH¦'´1•=K@Ügƒ!:aY[(ç^2ãc&\n¦ª+°˜9˜B?³¡4nÌªNä †Œ¨FAZ­Îý€¼'¶¬ÇPÍduéÙè“äY_Y¶BR©úP'!––‰ÂBL@eé0²í´–ñÏRŠ*µ^¾ì`•ƒ^Îï§\ràá`f1&†DÉ¤Mî¦˜³]‘W}·»’º/uuÞ¼ÙnŒßµwJÓž¥”c2µ5Ü«1.Ml<”Iu]SçŽÑ’êÍ\$Óy).»Üp¼ß€‚gÊUy\"§\$Ö¤Küg’Ÿ¼øÆ¦Ûm|rh(C¡¹iÔpËKê¯À»ÂÈ2:á`mñ_D¼KªÖûÖ\"¿\\d]zÉ“NÕ;‰ì¶0ÜX‹\$Éz–ïçŒM W^Ã¿ÌåäìÊ)„î\$áouŠÆœ™P‡á8‘\n§Üí—s]t8zSÃÇ¿A<b6ñùáàg¸‘B-wî\\7’ì_{Ýúì^—ú‹êçŸ¦@š”úDI×¥ë2\"Å‘ã[D(\"ÆMÒ¸ƒ9Jqleä™5·D¾ò6\$ÐJk>,”*À¨±Ñ·§Á@W›vŒ7á|ì¼ôöW&›³‰ŒÃp!_w¶i˜ü/VéŸ×Qð¢ö%\$ãôOü½n GîÐÿîìfÉÄ½nâïâÂÆÆõ.úÞÎæ° wnï°/F\$°.í‚SÆº^Nd:í„jÄbÄà‚\\D€h7Ö¹0ßë0\rç”à-ôV®p!Ph³(°ÞpÐkð€¿0&7`ü&œÞ£qplj% ÌV+½\n#OÐžÆ*€èFB˜®:a£ê3íÚà®Ð Ë²‹&í0ÊÌ°ÐáOøRnÅÆ*ü0Ü¿CqPÛ•ðègÐßï“#…Œ&î…Qnæ1 æzÌ6/1\r‚B(L4WOÐõíÿÑ!&7%ì(ž0­1:Ã€¨bÊ…P´ô-ÝÈ¼ªñ':upÔîqbD\"h	´&\0ÈÅF+ã*GCê¸ì¥	Í¬tí\0(bœ4,¹CZtêôa±žì–1çm„Æ\$äºnemò^ï=ÅôÏO\$ì„\r€Vg.hŠ`1*œJœƒÝD:A\rd)fchœ7áËr,\0ª\n€Œ pË#T¼­P‰\r(Í2kr†.\"â2B¨¨\$&„»®NânÆ·ÊO%hGcJn.ÃëdôÎŠ“:qÞ¿hT\$0½Fž”ên3>('xEr:Ò‚`ˆì‹‹&K‚Î2\n\\ˆ:íÌ(ît¯h’ýÈÚQ+Z¯N?²¬ŠÈŒ@AC+Ge+‹¤ôE*r¶áÃ|ª’)Â˜ÄÂçrÇ-CI2¬EI%x¸Døt‘¹,ª¾ãJ†¨¥¨íNà¨Ž˜¨ÄÂ\$/¤èÂ\0zÀõÑ\rè¦#ìØL¼½+ÖqT;ãj6ìO*\"d1òÚ¼n2 ‚Kƒl1åÙ¢é Ë£+4MÑ+\nÂ%Eòƒ+\"°“6Ï\r+óYP3‹’nÇ/4~N°ø‹D’,È:#~\"…®e¦Èè¥tI";break;case"hu":$g="B4žŽ†ó˜€Äe7Œ£ðP”\\33\r¬5	ÌÞd8NF0Q8Êm¦C|€Ìe6kiL Ò 0ˆÑCT¤\\\n ÄŒ'ƒLMBl4Áfj¬MRr2X)\no9¡ÍD©±†©:OF“\\Ü@\nFC1 Ôl7AL5å æ\nL”“LtÒn1ÁeJ°Ã7)ž£F³)Î\n!aOL5ÑÊíx‚›L¦sT¢ÃV\r–*DAq2QÇ™¹dÞu'c-LÞ 8'cI³'…ëÎ§!†³!4Pd&é–nM„J•6þA»•«ÁpØ<W>do6N›è¡ÌÂ\n)êîæpW7­Ñc\r[è6+Ž*JÎUn\\tó(;‰1º(6?Oàôÿ'ïZ`AJ–‚cJ²92¬3ž:)é’h6¢²­« PŒ”5Oëþa–izTVŽªÞÀ¢ƒh\"\"‰@ô\r##:ð1e³Xò #d·‰f=7ÀPŽ2¤ªKdï‰Š¶œ7£ ÄŠ+q[95Œt>6D0„	IC\rJ\rô¦PÊ¬BP«Žˆ\"¯£=A\0åB Â9;cbJðƒê5¥Lk¾'*ì”‰–i æÌ/nôòŠ/©GRë¾a“CRB««0\0J2 É èÔu*‰SÕ38Ô:B[fÿÀTŒ<:ÃXÆ4ÄƒZp3Œê@Ï¢µŠãG¾³8ä4;\0Þ9IŠ7.l[ê¼¥c[7Fã]ž«5„Y2mJÃ<¦)bÖ6Õ€Œ:Ã¶â„˜Æ0Ï\0¢&6Ýð¼§ª6·ÊäT©¥wdÜÉí2NtË)JŽ.‚S(«¾)ªø\"%SÍ4ðc©Œ4¤YŒ^5‰Ìò­ë’BƒdÚ>ƒ8Ò:£}|\$£…ž½ÜxŠ<gÓå&¾/ÐÍA”\rùU\$0Ê9jƒ’8 ŽÕ¤\$îIKÓ5ÛZ7ŒÃ2€…&õ“é6¾¢ Þ×àA\\c¨Æ1°£˜ÍxC#~l7abB9)€Î0®áT«¾2…˜R›˜dL°«´u\nb˜¤#&ÐÞ7cfZØ6•#Ô9&#ëu>c}\n<\nåŽA»[¢ã×XÃˆ©0ÈÊ5\"“çÊ¶Îtç: ïIt5v;ùß£˜æ;Ùõ Ë¢\r*@ÉÔ‰ˆÐ¤ÁèD4ƒ à9‡Ax^;þv¡Æ¡C]gŒázÿƒÁYp¥Ñ‚ðDpÃg)/¨/©Uró<Ùˆ‡@xÃ>AdH¤¬ÅH@ÉÑ„qE(Œ‡&ârP¨mx/„ÊÈPkE¼À@Ü‚ˆD\n…\\ì•£Xï	By¡¸4œc^]â#HD&àœ]âA“p©¬£™°ègTø¡g.¾Ð@@P‰(>&`PSPs#îQË5‘RæL°n&	EB’vOOû+Fu1Å ÞR¢¢|.N¡D.GY9Ÿ0F:¤MÂI&œDjkŠTjZ‡\0á€âL)JÁÈ’‚\0‚hK¹8l1§èÕ'(p0(›Ÿt†´2&!@'…0©Íð!sŠ<[-£’Õ#²˜\n,«”ƒ”v–nÿHi“È9ÿ*ÌˆŠ»†À¼r7iù¨dHS_dÈÚšÓhLB0TŒKáRÖŠRq2”„‚5%‚5\$œ\nŽA­x0¤AÍaÏRŒ ¨öDrÖñŽ%BØù\"‚y†OÁÀ©†SXÌWñF{*ŸPŠÒçT`8+µz‹Ã(f+À¥M Ù()“2¡œ<­bÞê— tNqa”²¦ ÈÒÙ'>€(&S¨›ÉIÇaŒ–÷*åãyÚŽ3-©2žÔX©%1M*¾™«Ik\$ýZ²58§š…hM\rL#€òðÍó:AXÿ3,ÕðÃ+ÅÛGòARÉ[D’8¦8(À,ao1-¬ÖY<èu\n´ò„”Ü|ZAWÁL€†PÉ*)+'€Ë2²*…d-qµÌU§šËÚ©#ª\$¤´u+F(Ðo\0(\$­G¿î%Æ}FºU\"wë¨rNë!ÃÃÊÈ.s\\	4ÍÐ@Ù*-GeaPÙ,4žo,\nK™:KÄ¤‚A³7Ëy§+{WrÏ'ÈÈ&]ëÐEFˆ<±4<ˆ*ÂÎöThvÊÂT\n!„€A'ÈÔE ­ŠL/Sw=äú\r+Fs`×3V©Ñ ëåT‚ò¾ªH°rU\n“ã5ê³êd/Åhô7t[œÜnX!”Õ*ù¤à±‚Ï=%»•—Ú€MMÄåœµëÌ.A*ù\"‡LŽRñ¦J™¹4¤¡L£Ž²¦<ÊØøÂdå™@aÈÁ‡\$f×˜Îve&ñ<Èá‘3‘š;˜2Y; Mñ†X ¸›Óâo_N\\Ð50žÏ™HËxFBäÈ”Q:¢rí1PÓu+OcmŸ—Á!6¹zÝ4–C‘@\\2†#§?¯YQC1j6vî~\"Ä™dåG&6­9Þ—F§Ú\"\$ÀŽåã>[ÞŸ(}*°–{Fé%sÖõ8Så`”)ú(JÃa¬B³?rÐÇ´¤7U‡Üj„ö¦3Y·{R¦}ÖúËn‰Îúi,]º“mò¥K'xä¯'Ûæ’…Iùg\$ÇüÛ\$l2J(¥LÓ”aðPOaÐ4«·F±+t%>rUy`9g\$¥Ø2’Zj¯Çî@AN¥Ü¹‡ˆ_\"+Y)i§mÜ^z§é:’£.ŠŽ‚3M»â\$á:×)\\ëýßå?ª›ÐÉÕÙr1æ¡ëxóª¹ZxSÈÜ7³uj»su4¬ý€áp¦RÈØå¹ß•“|w–=Úxc¸ïÊZìpWpr8h3æÿrMŒdüP­Ù\$ç|™žrx	ñ®%†y'37òÆËÌfo7ãüO‹ò™Û%úLœî.Ù· t¬÷Ëuìh¼öÀ‚w+‰w=ßÑm/…ö·pT}Ó:X1ÃÀ@AÕgA¸0Ë§DéÑ˜E*<]}WO!hkpDÇæŠ”1ô>”2ç—–Ã#mø!‹‚=šùT&›ÊWVúŸ¹P¨ˆ5£^*\0öOtøKNùÎ;êø'êüØ€ú+„Á«ÜÁå\$'. QOxðÄ+çŠ¬müß,·‚”ðŒÏpDiB°i†œ;îÌË,ïp>àëËk/}¬°Há¬#ðjàŠª;ð{îìi¦F	b´¶\r CÊýeò1\"N2ª|¢)3 ä+mÄPO·+þØÏäíðPP/Šá¥ÞW.g0‚ª/•\r‰¸RPÒWN_°Td`Š\rß0‹jö¡¤ˆ9Dî9b^ãÂ®´eži£ÙÐº\nqpñï#Øà}	IPf7ÐFøŽîÚN“ð¤Ï·fSï´`ñ:Ø1P`ðþdn½)UÐ@piÐ½PlàÑkiUgp¼‘€½q^dqˆ¼Ë×fV»dokjÜJ”K¬D‘Là\r8KŒHQzøñ³‘¹Bn?`æ3k`ôäÞ\rÈt‡ƒî§ÑÛcVäåŠU Ì®Êñ`Ê›Mà/ìm£³çC2¬ÑûÆ	Õ†ÒÁgH¥bVÛl²ŽEFÇ2!¨>ÿ¤0Ï^ÊRÝ’2òò6ÆÒ<õ¬Èá †P ØiZä¨dtiÌ¦É@7\"\$\"àÒÇ\nAÂnÉÚÙàæ)G¢q ª\n€Œ p3âñ&‘ÔÑXžÆ~?òò§g²š'òŸ)r¤O’œ·B<\$D\$‚@k´ Eð%âbàDb<²i&ËúMaBæ`Öí¾0ñÈKÂ~šòà:£Ð8)¤þÆœŽQ(eâ*\"†R&ã°7¤\0`C°Qáf©€ÞjÇ2	Êg\"’£|Sam\"\nÄ|LQm Ø.áb©C8Š kt´úÙÄb3hzìˆ5…À†Db'Â,Ý3Vá\rV8ƒl £T‡âsk„ä‡0GÆáÓ\\ÊÐ8+%}	Üþh³5¡B\re¢_ šìp	©š·®Œ{åÌÛf&^¤ˆZ+`éj6<£|Ã Â(”\0¬ˆ î¯`Â`êg\nY9Þ #þª?Ðöy°­À”5e ÀàÙ4óÑA+3BQ£Ñ7¸ìî°Z\"Ö4!6+®\"ª¨º‚‘=¢tAàÓ?³â6€Ë>±5‚°!8+ ÛÏjðqDl,V-af±`à\0t\r Ú";break;case"id":$g="A7\"É„Öi7„¢á™˜@s\r0#X‚p0Ó)¸ÎuÌ&ˆÊr5˜NbàQÊs0œ¤²yIÎaE&“Ô\"Rn`FÉ€K61N†dºQ*\"piÑÐÊm:Ïå’Á€Äd3\rFÃqÀäk7œÍñàQ¼äi9Â&È‰¦…¥É’Â)’”\n)Ü\r'	ýÖï%˜Ü%…“yÔ@h0Œ¢q¼@p·&Ã)ž_QËN*µDÑp¨˜LYÉfÛ„ë¶iÅFNu›G#Æ[ñÓ‘„ð~Ö@¸Üp›X,æ‰'\rÄ¶G*0‚ˆò4ã£1éˆ#æîï\"çE˜1ÆSYÎ¬n¸Ñ¥rÙ¥@æuI.òÂTwP8#£;Æì :Rˆ§æÚ(ºõ0¢Þ¶HBN	LJ<ïã(ÞŽBCH\"#2–98or®À\$ì”P(@0~€ÄBTÔ4ŽÈš•+ Tvû¢°\0ä6§è(3cJIBd”Œ¡ð’²õE¨Ä¢©m{6ïJÒÃT2®‚(Ý±ê…‰*”ìÉd”É\0Î¸BÎ93±¸!± Rü§¨„Š³2–„·C¬Ì„ÉÃjþ('TÛ=«ªòÈèB4µ+Ð@Î#ÉHá#¤èB–’\nbˆ˜	hèÂ4§á\0ž:CèÊàJË²¸¸´\$®’JîKh¥RêH9j»²!²…‘e0LˆÄXR` Ì³ixÊ	-zÜ¯háoÙ’‚ó0Wºm&\nv“²8I#@6B@SÇ&,˜Þ3ÓpÜ2¥•hÙfÅ ÞËHƒpò\$¸Æ1¥ã˜Ì:”øÞ3¡˜X¨ŽXXÂ‘!BÍ4pÜ:ªÁ@æ¥˜5’ b˜¤#dCpì¹¢ap@%+xÛ†(‰ÈÌ·+pä¦¤ì‚ãŠÙ8bÖ¥ôã ¤ãH|·XÈ’?)d~«&HÀæ9ŽëtÒ2„ð2gAâ4O0z\r è8aÐ^Žûè\\¡dÉ8\\·áz;Ãzâµ…áR93Ã¦æ/µiÀÖÖèàÎ7C xŒ!óäŒ£ Ð7Í5¥däHÔ…„££¢X\"+3“j9ê,zbÜ(#Z¤3/oN*H£l9wó³pÅO…8(	‚nœ¯Ã'jœ…\n8R¨ªh®Áä®É`‚ö³èFo7mÀê6¨‰\$Ì¨Hk‰õúc:tž'Î5³*YÓ¤	äV\nÄ£’À’CƒÉ'I¤Ê‘§p@M1¨OÄ:’ò4ƒ’28déˆè a°´™7LØû\0Ddd…\0žÂ£Ç(Œ™“ŽÎÔR	Sˆä ”³‰462èðBÐƒ0i#ð\0øÀUíƒµ4P¡Ôý•HL\$Î4@Â0TzDá4œEÆˆÑJ‹peŸ»€ä‹˜	 jq–ÂÐQ O	À€*…\0ˆB EQè@Š,A80­8î‡ä\\PG\"60ˆ‚\rÊH¶öðˆ‚ eÁ…Š§ÏUbv\$ÅÕ~CÝ*`\$l(ìÈÅ`DTQ ;çPˆ#e««çg'Z_”²fšQ›'FB^ÄÚ’–¢8…„µf‘¥ƒ4¦2WLÐ­/]Á\nÆ%/—@¦RÏTâ\$ñ5¼º0É\nìy§Åè=\"Ž‘áw	]£ä‹	O!!,7Ç„D')ÃKl!¡ó¨U‘aœeX2K³ª»VTÁg¦„%¦‚‚Ô©„µnä±ezš¤áMõ’dPÎÄ\0WÄŽVÊð×£¡q-‰ 1¦z;+×…=A ÚºôŠBN“KN\rŒ€ ¤Ê‚0-ç¸4 èV±+®F'q:…@¨BHQR™õòe|4QžŠ0^yÌ@(r4SuJš\0/âm+p—K|Ç™!±²DÊj\0Ci˜42Òì@¢Tì11•’t¤š	Z¯ÚÀÒëeÏ8n³HfÌå Èw\"T”Z\\MU!NDŠ¸ÌrjN¤ª°'ÌÄËÞ…Êu·È¸pÊ§ý¤rÆÖ×’£¢ìmÑ@#Ad“ÚwŽ”´54yXÝZàw‚•U\$ßââ)}Nà¬<´ÇgZJ7b¥úf‚ù{Ôåž¾Dê ;¶º¸/ÁG°Wì¿“f¨Bž¿M.e;íHÁ…ø:«ö[9p”Ê/ÊäŒ’É´×9t#”êE¥»òPqÞR Á:FN¡’91*IÓÉ<Y15%ç·ß0Ó…Iü“\0€\$Òe+A) ÂNpS\$R\$Ä›á¤Ÿ3r’ë˜W\$Æ§\"D)«©aåKã„ÃNvYg2ãÒu,lÔJ_-,J0´òæ\rËß3LŒ	šf©­]Ù»\nalbHRÙ	©åH gÛK°…4×Òmbb%ŒÀ'E²QKñ°@FnÂéS¥É=Š !ÕyWðÝÊ\r:~Ùæú`ãç«µ„uÖyŸ+gã«éÉÁÐšÒ(4}åq'A„>˜›S ™ÉWI\$¬‡kö&‰Ð]³JÏw„qG&í©J±áÇÍ©˜5+­ÂîÉ±ûU”ãXœ ÅI„6KŠþš”YI(êðh;_JÞs5æ>¾§Ï€è‡šŠlÕ»|„Õ\"àTvÃás9RÕN3­1þ†âÜ{>Ùü7 iAEH\\^ñg*µTøÂ:bŠ¾ˆÖôDÝ)vTuISÜ³Ì³“6©Õ@ r7ÐôgÐÚw¢ð’uÄ9I\$bdy:,i¿	^²(«1m9'N¶f:ÂŠ’á¸Ô%}Ìw¥\nxšÝ;ZåŽÒéx(íý¯?fŽÕ§jåÄX“º^ÇÙ{fWÁç÷²Ô:¶Öð½ïÅ+zxcº6¶™Á¦žô¬‚¦|¯ ñÊ&~¿ç@PWAéŸ‘ób€Žçò^ùlâŒ	©ó\\¢¤†ƒx\nºAÐ)ÔÄ†ºñØ'ºh#ÆE1a•¡K.#áëìl˜±z°–4\$\\#ò„TµÅiO	˜C¨\r!™…”¢X–É7­šÇÀ¨h8t1þ\"<K,6–Øq˜·ÏŠ\$F*Ü…âS¥Ð	¯ÄüŠœ–Dè7‚þ;cÈV(|Pïæ7«(=B*7B>•îÈ9æj¿ã¤(†FÀ ÃNE\0˜\râ„ÞÐNŠ Ú-Ã&]„À—\"H°mîØbÐ-EB·pjäàRëÑLÂ.@ºÂÂìð.&*ä\0Þ¤H€ØÁ0ÝD²â„ö·¨x®f~Ä\$|j.*R%&D…ˆ“LšÈŒŒ\"Ä b\\X#¬ªiðlìMÊM ¬\r Êàœjz}i	Ãˆ.c\n p9%H-ãÚM‚NJå`DJ	ÅE4\$kº2lèÍ£žâ±#ãbgdð##&’¥Jgæ‹ÐíæC„AÂèR AÇ|1ÆÀ=ä 2 ";break;case"it":$g="S4˜Î§#xü%ÌÂ˜(†a9@L&Ó)¸èo¦Á˜Òl2ˆ\rÆóp‚\"u9˜Í1qp(˜aŒšb†ã™¦I!6˜NsYÌf7ÈXj\0”æB–’c‘éŠH 2ÍNgC,¶Z0Œ†cA¨Øn8‚ŽÇS|\\oˆ™Í&ã€NŒ&(Ü‚ZM7™\r1ã„Išb2“M¾¢s:Û\$Æ“9†ZY7Dƒ	ÚC#\"'j	ž¢ ‹ˆ§!†© 4NzØS¶¯ÛfÊ  1É–³®Ï+k3ëö3	\r¬ç‚ÕJ´R[iÒ\n\"›&V»ñ3½NwîÔÃ0)µ¤Òln4ÑNtš]¡RÓÚ˜j	iPÒpôÆ£ÞÜfÚ6ã«Êª-ãª(ˆB#LâCfç8@ÊN¤)° Ž2è¤ êµP\"\0©Œ©Ë^Á2Ã“³Âb‚t9Žë@ÉÁcu	ˆ0*Ý¯£ÓÏ	‰ƒzÔ’Žr7Gp˜¬Õ7®ô=<\r3%±hÓ'¦\n˜åˆü¼/Kâ`Î*rúò½¢Mbèñ/ÂrÈ;#ÜKè8ÈCÊ¨„³¼òª!¢œå\$‹ðŒÄÐ@ Œã8ä2±´L&!°KêÎ±Ãˆë	‰ã’ô¶KÒRŠ£H´€éÀ‚c3ÂRÃ@òN¢\r\$PïÔ¦¥#Ü‡CµÐÈŒ\nbˆ™EÀHÂÖ1ÑéšÌ0³L+¶ÚÌÓÒÒ®Q³ŽLBú†p”L!ÑòÍ»¶w{j.q¸(3lë\n\$£‚Ð¹:ä9^—\0Ê˜Z«ªýtZÐ˜§s/Î:AD¯Ãcœ2’ ã0ÌéI	hŠÂB ÞŒHãË–Äc3¨àÙ!8Ác@9cÃµ„„ú\r­â¨aKê7h¨@!ŠbŒ§\$­“¥_…Á0µ³‰€Ø˜\"6èÒò1ÎË¹*”3.ÁmÂŸdIØÞ–ÐIÜn#\$0åCt‹\"C’j˜¤S~Çl'J äÌÅñ<¨Å2i!â`4Qã0z\r è8aÐ^Žü¨]´æ²@ä-8^ŠóãÃÊš¤xDÖLðéÅ‹ãž7\ra}x	”ã|õfÈÐ¼´àÃžæ#£3#WQÚZ&\$.>Ì’?#,àÌ0ìB¹£é[LªÞ½Îô¤r%ãî2vï§ÏBò\"½#Ð\n@ †4wºäÓ…\n0R˜ÞÞ€ÄPIjúT¨ù+4@@ÑƒI>¤8ƒpDÏÃI\nŽ™RÐõÐ2;aç¨¤°òdIŠw\$oò'pèjMZSGŽ@Úds0R³àÆÉÎ9¨5MðÏ@°ßOÊR€á¤˜\0žÂ£I\nP\$¨öbémË*\r´òb£Üpi6Åé¯â<Òò’ƒŒ2ÒJhÙ;iÁÿ†p@°Ba@)­4`¨üÕó1^+ÍâÂÔ:CA‚€&¤ßžöô’\0Q¹MŠÌ'„à@B€D!P\"€© E	Jô:HdQ\$TÀŠ7ÀäDÐÉÏ>ËÈ—*µZ”\$°pQ&\"PÌÛ˜T-ªm^Õ”¬ThiUg¤æœð¦¼“+ô5ó!¬ ê¢XmMòÑ£x\rB4Z³X2ØnÛ\"ƒ<éFm­uôLsvŠ¥k*nLÉl\$Ôb!ùÒ5ïÝ:…cû‰	FNò:>ÃÌMßƒò=K‘#BnH¥(Ê.`–…@Ã|‹Gìd¹—V•Ôšé’\0ÆU™Ñ›Ë•oN‚Ÿ6¼þ/Tq5´õxÉÃr 0è•-„Î˜™ˆn§†)¹Ô“%Ÿû[‹IÕl¦*)3ƒqj#°\\ÆVzXÉi3È©FU\n¤„i‚%Å¬5¼pä‘ê<K1(Ó'PŒZ	Éf\nFDÝÈ€ŠeŸ*\n7d9pš\$X¢Â T!\$VDLü„oÒ¯0Êá€r ‘9\$&Ë¦Ùbv\0¼Y¢ÒSâw-(Iz†RV°ìx'„¶TÌìýAoF‚àÅí0uµúË˜+YkŠ-¢1ˆJÙ=bvöÉhN0æ%¯Kå|F\r)ïRÔ4¨òZÌí]ÒŒj.¿FBaÛ¡·¬²í]CNnI+`¼XãÝºÆÍ^1ä4‡µPEˆÁLRsÜ¾ËøäHUØ:Sð– ¢8qÃ’)A\\2†,Šoý·nÿÏ¸~ý\n…’‚ôù-%š2F9ÒÃ6N¢v¢Bƒ%9&¦¦”ºã“¬î¿ÓuÌÖÖ,í“¤k¢¡Êo·|d\n5AÁ­»…J;e±¡Ô.G×#Å`ÛOèsUÈÔÔ˜,…÷’äô¥_©°düL’‹ih=&jÇËbÖJÌ*._	^qÖeÖD\rÜ³Ë\$„8gØMç®aAì€žœž´‹ìàc'ÝcT\"HiÁŠ²WT°\nsœÚ¬écRY¤˜	‹\$zY»×­&n—ÓÚg?­¬m_Üë`&½‚\r+’›»¥ºƒ+ë[©S—rW4Zå¼Av¾áÛŠøÎÞK:úºì‰\\[eÁ1j°âªm‘r¥TõX2±ì“7Ú­oQõTUvi”4áÛ[qekjK¥§/6£*cnFŠ™Ô·oM8“·¬úY9PÌ¸èCnrˆÑ–=ø ÜÂ×Ok%ŠÒ†œž£¾Kdbâ1þ¸—¬ &‚ÜA—rUzio}I‹)À‡7þ_ªìÂª'§Š*¨Ö5ÆQ%¼ÜâjýÁÎÑUÔ-VsÄ4Êt+Á¡Ûúž»ãžs q÷I#»KâÕ¶ô“¦¨8H¿ž…­6–Ûf ‘Æõç‰QE>hWM«©^XÙ¿§îþæ’5¦ïêÄÁ’r\n7ÞçˆodMªSõ¢:¢(ßE3^\nÇ¥é †H%å\"¢xWÈ9ïqjªË¥ó–<â›óŸ@w­Ð–C//Ýãú­¼‰ñûÈ‡øñ YÜ4áõàÇë3šKí[}çÔ-ßÀ¿aïåÐ?þÚ£ô_t37Éöˆà¡0©V §KÒÿ\\ÆU¿I©¾ßØo}SâzvW÷kÎüRZS‘c×¯·ûMßø¤Ÿ¿®§·ü„´\$¤\$FnîE¤Œ©ON,fožm\noBÆm	ä0ãÒ-p,­jp/Æff..BÜ0*^%Þ#ƒd©ø‹£àÚ­¤NI~¶Â”1j×ëÑ*ƒlpnZÀÂ= †9ÀØhn *Ê1–—FN‰ÄŠonêFO#ÜšB¦OT\n ¨ÀZ \rÃrSàÎºíŠ&d~Ëj¼KF8¨ö_\r°PFlëR_Œš¥ÂJ\$æ®Z\"ö«0iìäî¦­L¬îM0“âú‰ÈV*b0hÈ.%¤\\HbýÂd: Þm#€%Ñ\"Nìž‰ÅÐP(0B1ªØ,Ç˜MJ<!‚H#Ê4àæ,bÊÛBËeq®{b™‘X\$1\\Þƒ1íâ?kGÕ‘r~í(î'¸Êb@5c(áBègÈ~7fjKÉŠj}nŒ@…(E¶²¢›ê|ËéZª)^œ„êUQÀÑÏ<áí›CÒ:BèBë†B`š{b\"JÑ Nä– îÏ\"@É,‹1ž–\0‚-„œ–\n0\"ÂËˆ–Î¯\n\nqT^‰Ž\ré’f	ŠùIÊ`QhW‘xëCN®#‘‹ˆqðòÏD–\0 ˆƒÐ©À‚Uèöí\$ÊŸ,ˆ@	\0t	 š@¦\n`";break;case"ja":$g="åW'Ý\nc—ƒ/ É˜2-Þ¼O‚„¢á™˜@çS¤N4UÆ‚PÇÔ‘Å\\}%QGqÈB\r[^G0e<	ƒ&ãé0S™8€r©&±Øü…#AÉPKY}t œÈQº\$‚›Iƒ+ÜªÔÃ•8¨ƒB0¤é<†Ìh5\rÇSRº9P¨:¢aKI ÐT\n\n>ŠœYgn4\nê·T:Shiê1zR‚ xL&ˆ±Îg`¢É¼ê 4NÆQ¸Þ 8'cI°Êg2œÄMyÔàd05‡CA§tt0˜¶ÂàS‘~­¦9¼þ†¦s­“=”Ð(§ª4›Œý>…rt/×®TR‚ò‰E:S*LÒ¡\0èU'¹«Õû(T#d	ƒHûE ÅqÌE”')xZœÅJA—©1Èþ Å®ƒè1@ƒ#Ð 9ªˆò¬£°D	séIUº*òÀƒ±\$Ê¨S/äl˜ ÑÎ_')<E§¤©`­’éé.RœÄËsÄ<r‘J8H*ìAU*‰¹•dB8WÇ*Ô†EÂ>U#‰ÂŽR‰8#åÊ8D*„<r_£ˆa˜EÉÎTÇIBý#êdÿ+ÆñÉlr’j¨HÎ³þA‘3Ì÷>Ç%Ê¨—E‚®Y§¥pîäÔ£•Eu\"9=Qd~ž”äYÒ@=Èá&Ž±É\$ ‘'16Z/´»¬%u‰cYI@BœäÙ]ÂäáÌDÈJê¼ðt%ÁÌE?GI,QÒ0ÉÔ„ðs„áÎZNiv]œÄ!4B´\\Ãw“\$m¤ÊJ…µîB'²Œ§*Á'I*[ÄÉJÛ PŒ:ƒcvä¶Á\0æ1Œ#s¼(‰ˆùfŽÈæWL]äFs’²åÕ7ûœòºU6AÏÔìAXe%‹cÍ_Ö~‘JZZbA“ÏKÖö×Õxž•KånÔhá;KÏúÀAL”Å²Y8–¥VÍ·°u¥>hî’êYeßrÜïÐØ:M#L#“X7ŒÃ0ØðŒ®eZÕéI`b Þ×¹(ò£pæ:Œcr9ŒØà@6\rã;Â9…ØåÏŒ#8Âð„ÀKo¯êá˜Ræ…Ás°ÑUb˜¤#Nó.\\ÆG)\rƒœÆ„qœÃÑ\r†ru\nPó)]¥Hþ(A¨y]šŸúü©=H+òÕêGä%Ö¨´:Ïy>ˆX`M!Ìá#aÃ˜w\ráÉo†PðKŠ€¸ÀÂjPf ˆ4@è˜:à¼;ÂÐ\\C#½\rÁ”9è&Áxe\rÐä<'DC|;L|9€éÂùÊd¡¬à’C¶\r°è:À^Aò#Lâõ¾o\"Øa\rf°4‡Ca\rì3\rÁÑÉ>·Ú Ÿ{ñ\$ÄøDžÄì«ëßC¢ÀwÆOPbBHt!CAŒñ ,…˜ž\0JA¨=¡1zCÄAQ!äÍ÷Ø—Þˆ‚%2€A–\$Laú«‘fâ¼w’A“a.rŠŒ¼Šä|(ò\n¼²|P\nDÈiU0»Ux’ØÐ&#B÷DûÔ*+¢QDB«,Qê@‡¨‚I.2•¾k£0s‡Q|â›§C©¹ŒÁ˜9ðÚ1r8âC @Ýdê7s¶›ƒ˜xS\nŒùZ§ÄTPI¨&â†^¥nê\$¦ˆ!tI‡(°h†=ÁÎ\\Z V£ÚA0h”4Ê>À‡iÙ ntD7Ãià€)²€@©¬6|#@ ârß\r1B	ÆhËQç¬÷AÈÕÃRò)°ém©Q\n)×“¢é„ðœ¨P*P[\0D¡0\"×Rò•T‚’—\"\ndXò™Ø“€çÖ–Ë`(f,r3`Â'Šheé¹—§†¬{sÅG4\\\$Cä)\n–´’¹åKìGÛÃANªj†©ÅjÐÖð´ð²\"#F­…¶hD™r.eÑ\0æä||H	†‹Ð)£ÜÆµêÚá5â/VÒÜ*„µP>ÅñO¸¦õ}b®áÎ\"…°æ©¨®jšŸƒ.!âjö½A#‚„’RV^\"5>å/™Q*’Ä1Yßy™õž´Šã[kSmçx4‡ Ê‚öÿ…0ÊmƒÂ‡¼øŸ2ê!hŠŽé±µ5.¢¿k?á\0I+úI^â‰	Rê¾1ê	iË °„šÂ€Oµä:¿Xk|XV}¬=¶Gð>5ÊØ³,“›•èƒR0Ž%ë:‰åäC‹£Ø&ËÈ½Ç‚ñ˜& Yrh)	úÎÛFî£Uª;hÊíW@¨BHÂ“râQ­\ró¤ß\nª`Úhm%ƒ+¨µšÙˆà©&xðA©ÞšÔu@,2fíäš&5Ý‚\ra5Z2ÐÖ3BZ\"BÈúL½–æ•1!Ì)‡123Rf­W,ui\0×Æ±[ÒDv–©	•N«ÏPî‰&E*íÁóÊK¸¥ÔÎáDå ’éùE“7;“‚0sâˆìMZhQMM,ií…uyA\\2†*8À·ê&(Û²ÿn®`¦¯‰£Nj-<³…\0´^Edrˆ´+WÎ«âÙykˆ~@Å@ç…àr‹˜+V@æÂ rˆáv€h¬w;Ax.õ¦µV¼Õ·GÏ]Ûî|µ´sXéAQ=Ý¬ H‰QZ]# ‰!ÌeŒÇEÚøØA¶úAÐÉNÖ]s¯k†\0»¼#…ù·q¯vRÇièÝ­eK\rªÙZiÏ7<G£ÑÊ ¡ÌmL¿\$5ãñRj_Âøxãž|Œ#þ;Ä²ë\rßÏ¦;È=›]w.·æ…â!YÉ*	y1bQ›/*DŒýp[Í·ëø—°í^Çp.§±¸k6ÀŽQMû1™Ý>ß·Vl±oon}k¨zÿsò-ÆCùŸéÛ:…®Ãsox»2t/iôþÛ}j„›0~¡ø™oœXÿ€r‰x9sia*“©çŒÓ5q~_i-ýnh®ÎýŠÀ¬JÈXO|ûï<ù«S\0Œ¤V°\0ó¯l×Ê/¸Õ­î0\"îaÈÅ*&ÎÉ\">ÉiH™Åœb+A 00÷.HmðybR‡ò ÎšÅ‰4BÎ£/rÉL˜æLo@D#:ÙG³ƒF\"¾€dØ0d0jÙIž‘‰¾µ0ŽÈÇœô¯È=K@*ŒdÆ¢×/×/‹ðìÌÆ%€XP/\r0ÍÐ.Ä‹w‹ÉèÐÛŒ&n¥r.¡jAÈC(Á^ÁÊcô V[ÊÃfv:/æRïìï/”»Lìþ§¦ýLˆ+ï±2[¥Ô]„ŒÈPÅíÎñÞ#‡”YÑR]åÖ™°û14”§Ê}å\0¾_%¶»Áó„LçÜG!c¯£\ré¥kïî·ËqXPœï/£/Íb?¤êÉÑ™‘‘\"8s\0GdþG¤~H0\\ûÐç.·eG‰m\$åf®±Üù±àÐ1ä–ñÔq¼qÈ#ñÌýñæ—‡DÞÊáË¯g°ïòË\r—\"l°Êp¸=°ÒLR!Ïy,·#./Äœ]Bx*ìøNí²ÄÑ÷%Ñ=%²ûà@`ÐÓ+%bk†¼.âÁÈa0x¡(¾ÈAÎd™Ä’Ö¢X|«¼ú!xæñbýDÈ–FT…ä¥a*FAÒ°+qÙ¦ˆZ˜ü\0†p€Øj\0\r Æ\r`@ˆ*~²Ë08g8‹ÀÒÇ>Œ£˜Ê’‹`êŠ€ŒŠt\n ¨ÀZ\0@‡@Ç0CÄ9jÿæÂfÆ`R¡\"1ônØÂNÜ¸§ê&•bÎ@›0S	AD9Ãîx2l¦ÒSl2#&Ø\nN*„\n½âz'ò´1À˜§©Ê<@9*|\r¨&5ƒ€9ò®R¡ Á<®+ˆp‡Bdƒ…\r3JÆó½7NaÊbóÈî³ÎeB8‚ÿ\"óÊë®Ý\0ò ™îŒ\n†@ÑãR5sŸÀÞ\0èÛŒ,Ó.èí¥˜Óß\nÐ-åêÇs€NaÓŽò¾døÊ±,~Îa+C‚ì£ê\$3B™\\8-²ì*Ó\0@\nÍà\nÀÂ`ê Û8¡\0\\„‚‹TJ\r;FèÏ(bVm¦YÄ€@¨SÃE\nþX-?CJ6÷P:TóÓ=l|#Ôbë5>-FgEÂ ÓETh´añ··îôÆe.c*JIlI§ªoO\0uGÀt#\$";break;case"ko":$g="ìE©©dHÚ•L@Ž¥’ØŠZºÑh‡Rå?	EÃ30Ø´D¨Äc±:¼“!#Ét+­Bœu¤Ódª‚<ˆLJÐÐøŒN\$¤H¤’iBvrìZÌˆ2Xê\\,S™\n…%“É–‘å\nÑØžVAá*zc±*ŠžD‘ú°0Œ†cA¨Øn8È¡´R`ìM¤iëóµXZ:×	JÔêÓ>€Ð]¨åÃ±N‘¿ —µô,Š	v%çqU°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€é²:œ†¦¼èh4ïN†æ‚ìP +ê[ÿG§bu,æÝ”#±õ¦“qŸ«ÒO){¡þM%K¤#Ëd£©`€Ì«z	Ëú[*KŒÉXvEJôLd£ ÄÉ*é„\n`¾©J<A@p*Ä€?DY8v\"¦9ªê#@N±%ypÄCµ²0T«ï“¡Á‡i0J¯äAW¯ðóìBGYXÊ“ÄƒC\0«L´ˆuˆÊ“daÚ§ ÑØ	,RÌxu•EJ\\NÈ¤i`­¤\$&†É¤TEAä\\Èv‰e\"Äg«GYM'—\$!Öûe‘,ÏM3Z!å\$Š—E»*NÑ1u°@@„áx—&u%+KÑ'\\Í4MRÝ:v%„ŠY–“ÚYaz‘0óë[×%•vƒ•³Rö”äbbRBHÈÈö–e)¯ä!@vs\"T‰ÂþË ð2édLŠU	‰@ê’§Y@V/ä»ôD?ÚÍ]ÈÒD”K«Ðb¡KÉˆ\nsÃ¨Ø67ÎcrcÂ7<\"ˆ˜ö•Ii@\\¯òIÖG“'aLN¾ÏÄ–óºtUYGM±×\\WKüÜvE!ÖS‘[Hæ–hù¾¯½]Ö2Ùm+¯æBèEq˜¨È¤ZA5®˜Ã1Q)dYDž—YUTYiFÐ´z½7eÈc™¤3¥¯lC`è94íH@0ŽMxÞ3ÃcÈ2¨55,³;¤Ù\nƒ{d6áãÈ@:Ã˜ê1Œmàæ3`Á\0Ø7Œï æ7Ã—0ŒãÈta-ž6¼ƒ«ŠaKžÂLÙÖH&b¦)È1\rk%€\\ö (UnÄéÇaF”pì?ï´¦þJð<èÊ©Îgedg~÷CÏoTC~J¥(\"hÂ9¸£“góŽc¸Þ9Yã(ð8\r;¨Éß‡ƒWºŒÁèD tÌð^à@.!‘ÔàÊsïà¼2†è(+\r!¾&ØtÁ|æ°ðÖðI\r¡ÀÜ†Ø*à/ ù‚\\qÃzÏ7ðØ0†³^C¡³î\"àèsÄ#ÔAd©<¡‘Rø^Sä\$H9!\$(h\r/4Á@\$ƒÏH P²<”G`¹A@„ X‹‹!,ñi•ô*“´{Ä-¿©…ØI‰Ë!B„™”‚”S:‚&DÝ\nQxG‰Ù„\rC Pë‘Ç´¾§äøôR	\$t<· ÈVy±ˆ!Î\nÃ£o[¨q¦ò †`äÃh 01½¾£A\0crò°ßJ÷ÖnÊP	áL*ÕV£TfJ¬V´®/M)‘™ÍyF”ÒžTdÔ‚î¢Ô,Pš\n†©ÐR#t,_@¦“ñEæ7TÃƒs‹…¾·0@ƒHgM‰\0Ìn\ry·A*Eæ³ÃL+}ñ Pio.e`r5Ð@¿‰‘p:Å´ˆf+±w/\0ž\0U\n …@Š©8 &Z\\¼JÚ}OåüXUbJÅb`3©Á-‹†\0µgh G2†`ÂÁ¢v!²Y—ñz%X©µjÃèÈKøƒ%ýè2ü½¨óŽñåRÌö¾š›)3“d 2i Ê‚nœ(\\ý\n9%#¥uk¬ž¸×–e&ÛRØ±AñÏQØ Ù­ƒ®ö±²¥’²ÖhíŠ—½5\"Å¡LŒ¬é-ë VÁü*‡µ;TUä\\‹Ã¶*F¨¤ãâ+HŽ°–²^„NÔi‘w«ÆªbÏiA”9pUÌ\na”Ü†3ŠÉû­NÅÙÈV^ÙÙ¢³jJÉª+á)N+‰\$ÊeL*¡cgí#7Ä•²-…‚'ÕšÁWc²R\nEaç_gÕrÏ)ÏyœžÀìò°)¥8+E¨)Åü[@u\0´bŒTÑ“B…JJ¦·(ÔdQ«X³\r2–…@‚Â@ –P<4›ÆæÝM€o•g8Q0ÊýËø¿TsÊ@äC&‹ó¦\0¼,âA2C¨6!K%‘„˜ÉLw²Å…•ÉîY9ùTDrl·J:-/^¡.ás\ra4Ù(vd)=^ÈÊÂZJç(ë™\0PL¢4V[‡tHHÊÄâ52†IÉY-%äÄ…ŸtYZÝ™	ùöºD„ìwOŠtº\0+†PÅôùÑò>Ûè„L'bf€iY#\"«¤T§‘2Ì‹#ŠW¬²H0‘CèyxŸ¤1vkòç]\"L›3*eËÒÅL(Y<×ÚÿŸ,	’»Ik\",/x‹Zûc,g3z±6Ô3Fs0iÛy·VÖÝ²\\É+ÜBbòíúÞy‹wïu¤JžºË4:szoÓ¯éÒxæ0S¤H¬,ÅÁöE_&w«Å_0¤“ŠŽÇªG±\r;âEþöˆÛß^¤ÝñËû“?W[×{¬ýDIq‰• SÉM;²U¾¼Y\\ð ·—,ÝÜí°&Ë\r‘xLïZ#¨_]7¶k·<²ŠF½ðµÀú‡D®Ÿrœ¼/wÙ¦ë\\öøYv´³YÅà-v# ¾Ãnû:íxžˆßË»‹hê½»œú=p’.ÃËô•(Š½µø&b*k?.mîUØ:¿”~fÏb+öï´wÊ_þ÷¾¼ŽüòwûË`UÕú~åŽ¦•¢µ#ÏiK´ä­~”Æ6ÇI<„›l/a¤š€4“©‹zZÛ°ˆð»¨\"|”AGù2‘¿žÛÍ,¬\nñ` åxJü/‰è¯ï•g<«_–n¿0c>ewÏ«¯7úâ·lè>'±+Oã#ú´íõ<µ¾‹r¤ÿ.Ðíªüýîøô.ÄìÏôþ„bñä‹Ð”!<3ØBZ{0fE££ºb Á6‰ƒ¬=/Ã¬>ôæ·ofÅ…K\0¦¥¸'‹‡Æ:0TXp`ÍMä?Ð\\k`«a2',2ND‚¯á\0:NPœO26!AÛ	.¨±îÐŽ¥èÔOÚåpåÐ²N°oð£	K,k0N‰¤öI\"<©L‹¡:Þ.Ý\nî\\OLQ\rIÜG\$v÷Í¼«Îë	ðèFí\rðN!;0Ñ¤mP‰\$åf¦Á,ñ	¡`ólÁQ\$ëÏA£%Ÿ.èd1-Ì‘//ÿÆ˜!D†çDÀŒOm\0EëìS‘m\rP~@|àÐÇðX@!Ôhot¿ÃB^†h‰\nå¸¾lœ³K8Cè“\ni>Ä¯Â=Ö{-2ëT°Af«´#ñ\ntÄ¶®±µÇL¯cìÜ-Ç‹šmàØi„\r Æ\r`@ƒ‰üªJ¨8Ç‡ ÒÇˆ‚Ê†Àê}	þ‡éò\n ¨ÀZ\0@‚ Ç CÊ(,¶3í¼há@i!21‘¾Þ«ŽßèÎmk&©1ÒF@› RKahW!fHœ2Ã0fl\$ÂnÚ&Ab¼,Ž\0feÌ	‰ø”ãÊÐ2’†ÇÞ5ã†9m”]D\"A`’OÈß\r¼mçaÃ‹ÍìàòLD\\!‚Q%«ÊßÌ»D0îò³,qhó`¨aLl5ƒ]!©€\ràà¹l-2Ä’CÚÿÎ¢›¥Æ±åÌ4.Iïª*NjEHúNDSI.@a8]f%ÃˆÆŠ¦¹L~\0¬Æ î@¬ Æ ê\r¢þ)# µBH¡me´ŠˆüeajÁçR»3¤Š )4õÓêjô·äúc‘]9p‰«šn³:‡‡Ò\r3?/À@6àË4°¡\nFÈDÊ”[ã¤©B<HA`O<J@€t#á";break;case"lt":$g="T4šÎFHü%ÌÂ˜(œe8NÇ“Y¼@ÄWšÌ¦Ã¡¤@f‚\râàQ4Âk9šM¦aÔçÅŒ‡“!¦^-	Nd)!Ba—›Œ¦S9êlt:›ÍF €0Œ†cA¨Øn8‚©Ui0‚ç#IœÒn–P!ÌD¼@l2›Ž‘³Kg\$)L†=&:\nb+ uÃÍül·F0j´²o:ˆ\r#(€Ý8YÆ›œË/:EŽ§ÝÌ@t4M´æÂHI®Ì'S9¾ÿ°Pì¶›hñ¤å§b&NqÑÊõ|‰J˜ˆPQO’n3‚·­¯}Wâð±ãY¤éË,—#H(—,1XIÛ3&òì7÷tÙ»,AuPˆËdtÜº–iÈæž§ézˆ£8jJ–’\nÃäÐ´#RìÓ(‹Ê)h\"¼°<¢ Â:/»~6 Ê*©D@†ˆƒ°Ê5±Î›<+8×!¢8Ê7±ŠÈ¥¹®[‚9ª8Ê•¹£(å,ˆl¶ÊRÔ)Äƒ„@b—Ãzk)1èÝ	½#ÒØ\nhÒ5®‚þ((\rì—?S4Ðè%KP‚:<c[ˆ2K«Œh)KNÚ<³ÑŠUŽOò½¯­à@; ƒÐÉE8ôkˆ¸.HÛ‚÷ŽªZ^Å*âÔŒÒï(\0MIS ƒ:	UTµ8è»S¼ò¿ˆÓHÖ1Ìãz Œî5]^HHÊ®\"«û69Ž£) #Jüò¥rÂØ5%H°éHPÈ&%UDO¸h³8³IÃ*9¥hmr6\r[ZÊŽcÂ79¢ˆ˜²ÄnÙ¶U¨êÐ„HÜ1¸ÒðèCãJö9;`Sðê=ÔZùi„äx¸ÌÄL¼×S†^£DŽð\nt-šâd¹;˜\"O²ü0­‰~[\$L£K6Î×¨h’6ŽV©FƒÊyTS›ùcRö;1îhÇ“Iýnò£–sÈÁÌ¨Þ3ÃbÎ2¤“ºS9Œëø¨7¢ÉXÜ<ßƒu˜1Œløæ3·ŠD³nÁcOˆBÎûÉÍJ6¬øÊaJH‡®i²ÏW%â¦)Í;â¸¨p@!^é›åz@>±µö3˜µXxAÁîZH%Pé|?µÍ#;úÊÊJ#u°“µõÕvÌ¥N©}OßéOEœ÷ƒwNû«Œ³f5\$i,Û%?J\0æ;¬u(Ê<\ròõÑ‘ÐãÁèD4ƒ à9‡Ax^;ÿpÂaB@¸±†p^\\`8x.mØ4†ðÜÁ«Fx:? ¾kW¸k@ùŸŸ´Ž\\C <á„  @MBZsÐœ“™S¼~’Sr„)™ôÎ„ÈŠ\$ !åvšušGƒ‡8„a¶\"·&b	û?¡¦–²ÚˆJ>†]ì˜r‰Qâ\n (£ø%Ïò\0\0 9\"ŒY—#ÆeË6Å²ëØÛsxÁXßDW	Bu%¤¼¸0ä°XjA!°8D&wQI6zoý‡#c¼eIÑ¯!aäÈ1–e±.*”Ô£ŒC©Ÿ„|9#À@`g7æ ¸‚\0ÆHƒ™•“¤¼ˆ™âH{6€€(ð¦#ƒR.à”­Q}#3QcˆD²0áC‘é|\$Ôš½iìàpf,ª¬G\\ðN‡‡ÚH€¦¿+—ºü?a½ÿ¸ULYf\"ú#æpÊ™´B‚¤]t§Ý 4#ï(Ã4¥\r²i%¤£^W3 ‡“£ CË€yªÔ:…:Y×»7	âŒ#šR\$!t3JFõÚ™pa…•ð©	«DÈgÁ±tâ\\ˆ¤<H2’û(Ô-§š8¢CYÊ“Œpï	p·HÜCê>:˜Áf™Q#„y,\$pò¾b¢lÇ’3¹RRtÊfJ±ªFaZ›5|%¡h—%}-Ê¾FÉí˜×@ÊC[+#ÔX5jÕ_“\$¥o!ÎA\$%B(KPK,èÆ\"óÊË  ä½&6°Â¡4…7ñn.Äª–¦y:±1µÞœ^†P­ µIÞÂY3Ê(Š3¤á2)§¢‘CÕChð88ä’\\s”¢±[jËkAjé¦\0¤T‘j·Šf/Ñöû![3>\rÁ‘r\$F,¥íã\\„¸Q@K#\n']hág©U§jêQÖ¡Žg4ôxeIHrüD·€”H¯¥”Í™b“)KÙÒ+ˆ¹‘®çX‡ËRe\ríä2MÅ|`q;´í˜‡’`,AÈ@¥\0‚ Aa JgæƒÀ“+084{”I\\:/kñ\"B\\Rª«å9UªDÕØHa§(äê¬‚®E`„Œb\"fˆ\$Y(åÅe+è@NYËü—eÁ_—Œ)L—´£‘ìšvs8iÙ§-fÓ±œ3sÌS‡2åc‹v^‹(~æ¼c¹Tº76,þE2ùLÊ:SGºì»¦-wÓy÷Hip×¦Pf /ëÆJ9J×q1;8K¶jNOŒâ#Ó[fCñ]?2Æ‚–@ÞµÂ8„Çâ‚\$ÈšµQ\$q”SsY—ÈñŸ£.Ï!^eqèkÛ„½³åÊË	¸¨,Fó±…—{\nC%çâŽ-ƒ¼s<´Î“…ãoŒžNˆcJˆË~ÞÅ÷Ãsw±\$»m8¶>˜8%Üá«2À´ŽÁk‘¥Öèµ-Âxo©+·Œœ…âðiÌ_[æ!ƒ|pÔµ%‡4î‡ æÒ'.æÇþ‘ñºLZ‹Ï\"<’ß°kÈJ(Yáùèé^¢P¶ªS¤€Õ…ÎMM(çÔN·Ì*ÙÃHt;¼\$uÙ—×Ä¼0It—ˆvjÖÍ;OewW·WÓÒ™Å\r.`övi_î™+àöB±÷¯ˆ{—jÍb\$ï¾!´5;ÃXrnfíœ³¾òáÝç4y2õåu6¨Ð¹áQF¿ž€OžÃª#Ëj¯0©t2ïŽƒŠÉ}þŽäG„p3qíäõ\rÌžÏ~{_î~6à[÷_f¹¥]óFlÛ©—CAÕ4B#Ìˆ‘ÜpGZ‚Ü!Î±ÈéõC`yFø²}‘Vq(±í)pô³ôse¼ÍýjÄß³l”RŽZoŒ<o‚OBÔ P¬ni«|¥–Àª–Pk¾SLºë²ßNØ0(Ü¯%‹'#Oànö8… »&9ƒÄCT÷	­úÄ\")oÞð`;¯”â®Ý¥ÓéœÁPF#Ðx#èþ,\$ØyâÂ<â-0äàbcf:£ÊõOA8ì¨õ6ö‹Ão?PBº –ï-¤WEˆ<Æ&Äôkåå®§­ðáÙÏW\ràðÞêLê\ndI\$3o\nº¨kpÂ†„Rñ°.ÈÈ“I¬R–1\"Fªe\\\$ŠbÌÂxÐÒuOÀÚ°ìB€àÀÈ3Ä›\rìxÌeñYìîçÑ£‘QP~ÀñrÁ@˜D¢Õ	lºÌVJ%<Š­êàdžÅ‡¸ï¨åfFA‘ŠB18ùgŒ½ÀÒ \"üÃ0Û\"Âe'+\rj(TE\n/åV30¼þìOg\0„Ê1Ð±jå¯QðÚÔ±é® È(¾åVÙ…–Øàœ`qëDÙFÞL÷!1ó,ó!°f%ò +dð\r€V•àÒmÄÉÜ¨)B…gZ& Ìnƒ¼'©è„ênTÈ\\q ª\n€Œ pâd´râI\"« Sâ2ª-5'Š×j£ï`ôŠ¬Ör€r`Ê#äG„BkJöiŽ0·à›'2NYàò+Œ8Å¾àœ,bØ/g8«ìQÃŒèNH'´£Úzò¼96u¬,d´vÄÈ%ÄªFŠd°+â[éØš£¢	“„âÆ2£J,%–ÌƒŒJ~Ãák|yÀêÅÌ+‚¶#ü4'2H¾–Š²ª*îâ.z,\"§ÒM£3²ªßO{4`¨5‚à%ã&EÒ\\• ÞJÅÂ¸ Èâî%4Ã¯«²<¥ŒY°äS>¨džãähî¤êëÄþÅÌ¦„iâm2Ë8\r\$bÃíü²Ê\$Âæ,97€@Ž€Êñˆ`ê Ú@Ÿ7G1ÃÜ\"ÐlÓèMf KœM„df\"\n…û3Sû4*¶;f©¡Ë©ê´/à—7\$Î¾à†8Ä>2¢W<bÁ?ôª“ÓL?€Â›DL¦Ì 0£\"‡KBö= ä";break;case"nl":$g="W2™N‚¨€ÑŒ¦³)È~\n‹†faÌO7Mæs)°Òj5ˆFS™ÐÂn2†X!ÀØo0™¦áp(ša<M§Sl¨ÞeŽ2³tŠI&”Ìç#y¼é+Nb)Ì…5!Qäò“q¦;å9¬Ô`1ÆƒQ°Üp9 &pQ¼äi3šMÐ`(¢É¤fË”ÐY;ÃM`¢¤þÃ@™ß°¹ªÈ\n,›à¦ƒ	ÚXn7ˆs±¦å©4'S’‡,:*R£	Šå5'œt)<_u¼¢ÌÄã”ÈåFÄœ¡†àQO;zºnwf8°A®0œÆñ—æ¡§xÿ\"Tê_oæ#‘ÔÓ‹õû}âOÃ7›<!”ð¢jðæ*ƒš°­%\n2Jê c’2@Ì“Ø÷!ƒ’”2¦C2ô4˜eZþƒÈà’2I3ÈˆŠxþ°/+…¤¬:ô00p@Ž,	š,' NKà2ãj»Œ P˜¤±B†ÚŒ#šH<É#(Úæ¡®\$\$ùB£›¶0Êb¸Â1 î¦¸ TRÁI²(’7%ã;ÀÃ£ÃR(ê\rÈä„6Œ”r7*rrä1¥ps˜Æ¬H¨èöÐ¨ê9B²¼;„ á&ÉÔjŽÒ)=&9Ò Pœ¯´€Ò•Êa*R1)XS\$ULH%À@PŒ:ÔbÆÄÌˆ´Ÿ¹k«ˆ0¯¢ší@²\"Ì—ÄiC2ÄnT^5¤¡\n3¥`Pƒ[D•›Ú6É`æ1·¢˜¢&{Z9Kó\r¬:µA\0ÜžHK¼êºÙ,Ìé·³<™'S#u7NŠs¤î<ƒPô¼28\n6»˜e{}SJ+a€P¤2Ì\n \$£…††²\"(ñV%,Áß¸s\"×Ms›Š P×X”;0ÍR1°Þ3XëÐÊšŠµÛ7Ð7(\$ø:ŒcH9ŒÃ¨Ùi#kÐæëPúHÂ3ÆŠ*ôª%#jõv¡@æ·ª:2/\0†)ŠB2|å…ÁÅ”SŽƒ c2ì£ÈmÊ8+£-C hHÛÁ¤àÎ2h„N+ÊŠ¦âY @¿ð,÷ÂÔ*‹–hlºo\$¸÷üÆâ¿¹kn¡ã¸4AÃ0zL#£táxïß…ÉŽÄ½ŽArì3…éŸ’ÿÇCJÄ„M äŽ¸¾Û\$ãXDc‰t¤™Žà^0‡Ð.Œ\rzSvåJŠfèÿj)éðŒŸ¨œd¾:\r,ô>BHù†/çÿ ¼dŽAm„p\0l\$ˆ)0ö\"vA\0(*­ ‹¶¤ðÂ¡ymIí“rrNÉêtDÇ\rµœ\"Fƒxtn­Ýô‘´\nMBI,á¶ÂœEI›ë6EMêQÁ\0f)„ô †G†à‰Âd½~f¤Èá5\n<)…@ZËá³*,¦Ã&ìb‹“_?¤ïÂIL`\\¤PâCPÎuÉaUŒ±! Î¢Ê^&¦d‚®Šk	y1R\$‰¶®%È†‹‘Ã\r'p#H VÊ‹Xoº\$Ä¸€Ž!5ÅØ2—‚ŠC€\n†@–\".\0U\n …@‹+Á\0D¡0\"Ë`ÏÊAKiL(”¸@ˆlÃ1ˆ‰\"„Âfµ)¹ˆ\"PÌZ‘Ë#€ †Rn\$ÇeFŸ“ölq?Má<6Çb.\\r<g•Â1¡`b)8š±Òåç˜j8ÎA3\$¹ö·ˆëdÊyP“¯A“H\n\n1§´iÙ’f\r„’fòE£ÑÄ@!•G¤„@àt€¯6<‘`‚IÓ³kR!± Yäv¨i‘›ò²i˜Å.‰Î`S\r\$*o\$àÙ¢%iå»°SÍ= ôbl,0“UC½>0rþ`¥4ÖLƒÁ‘«çøá)%(dBL9Ÿ—Ú^¿«9Ì”pÀ3ÊpÊÖ‰;*PeÝ7Ò,+á8éÒ½Q\"üg¤/F- ‡C£+›(tJŠ!…‰)žœDY}%t(à¬ aW²Ô*†F!¯Øì™ø~Íc\$©rˆÍ6¿jƒy\"¤‚veú«%&TÈ…nH\"£,üâeXe\\bè´PÈÜbÒOpt¹h~ç\\2?HiÔ\rpÊUÌC8Wd•ËeÕe¸i6Á¦’BÂÔîÍÛ8 ºáZ›Ž”«L¢·ÞäÝ£½sÍ½ç1#¶\$Ã¹+(-È‚`LŽf)`–Èœ8lïÉ\$L‰µÕcî“¥\rD\0001bƒˆ‚°Ý6ÃRbìà³šjƒ‚É‘ª\$ÛPCqjmù²ÄdKúß6H`™•,VT”èADåL‘£êÄ©!`r©È~e„èGÝä	*’=£ wè!èe-ßº´¦2úÌI·“5g\n`Àî™5Î¡²eLö}ÊÙÔußAaŠ\$v_ãüÈê	ÁèvJ¨ÕŒÅÑóMwD»¡kc÷0g8q¦‰TÌ«„¼ž‚…¦JÁJžÒÔ–Þê@çí_„íðÛA'òüÎ6Jñë[§3‘%×Ëì–ZzÂ˜YÍ´d0Í¯/&Í;„q‚°wâ,uÌ24L7´àÉeð-ú—vàcËx®¦ÜÛÛƒØýÆØ7-àºZõYJIL%FÊž™º¹ÊZë¾+¾ÀÌ6ÒºWjðÚ¶X­@µzÚêìá~ó ¢Í²ŠßPlÇò9\"G\0Pn:Îƒ&^«0NŽ<8Î B¥?€‡ãòR`ˆé¯Cä²94Iø&þàÉš¶˜\";MÊÜõÔiîó#UÔ†qàj5Gïª—:¥XÙû¢«u]ŒÈlÑ9\$§6oº	f_\0 ì|OcþÃÚŸþ»ë»´Öe9Ø;­yÄ•“2\\n¹˜ÞLAË/BhÃ¶~©M\r'BÊmÛ,»/WÍÛ«Çì\\ïÔü¦ßFÝË<«%h¶êÿÛvWÍyjáÝë—ŸÒ|æyÁë±QfQ?KT­uvZìÏÌ2ûvÖüï¶ˆþáÆmRñ³=ïÃ÷ÿ7ü\"gïì(T™[XL¾?ç7§Òãÿ0óý?£`\\‘ú¶\0¼X.Ù°Œgà°yß„þŸËhÕqýÕ÷õ‘žöc	ÒEíŠÏÿÂÕî°>+>þ­:ýÿÐÏ\rè/ã8bO ¤¶¬þ1¢&bö9„ÖPâW¥X4o*cPÇ©«*õ\$¥Ì¼€ˆ‘\0ÒiÌTU†¾5IÆX,pY+~Td¤üðF%0p\r¢¦êNÚe\r€V\rb<\$%Ì?£„Ðƒ²?Ž˜&B½£1C.ÃL%‚vZ\"FtIb\n€Œ pEˆøm„ê&«ž#îàu‚8a^“FJ +ö¿«ˆ(®Æ¼Ù\rÂVë0#B‚#âBèÆ¦*ü¡N”	§Ô\r Ì·F.(I¦\"Ìª1Oú\$#ø#Ì‚\0Eã”z0ž°£	ƒŠ6Xûƒ˜¨Df#x„’HÌ.ñ€˜ÂçîFÈÀKî.J¤AË`f¤Íê\r,8(\"æÍ*~0±x8Cˆ%Äý	ª[‚;Fä.\\\\Â¼ë÷Pêâ°\0ÍÌÔ.B¦3‡<\$c…\"t¨gaQ……\"Åw¦¼(©ô¢,€„DŠ_E¤™åª¬m6ÔñâIfì2¦,»ã˜&å’b<!BRê\n2eJi¤'E€*PàZÃ¶\r„¡!é¾œB˜.LT	\nü%bú™ÄÞnñŒ(b¦Kk,q`ÖD‹\$N\"É€¼PI¼AÃ^hÃ^.ò ‰\$«¨÷ÄHÙ\r¾.C|Øö%D\\	\0@š	 t\n`¦";break;case"no":$g="E9‡QÌÒk5™NCðP”\\33AAD³©¸ÜeAá\"a„ætŒÎ˜Òl‰¦\\Úu6ˆ’xéÒA%“ÇØkƒ‘ÈÊl9Æ!B)Ì…)#IÌ¦á–ZiÂ¨q£,¤@\nFC1 Ôl7AGCy´o9Læ“q„Ø\n\$›Œô¹‘„Å?6B¥%#)’Õ\nÌ³hÌZárºŒ&KÐ(‰6˜nW˜úmj4`éqƒ–e>¹ä¶\rKM7'Ð*\\^ëw6^MÒ’a„Ï>mvò>Œät á4Â	õúç¸ÝOŽ[¶¬ß½à0´È½Gy›`N-1¬B9{Åmi²Õ¼&½@€Âvœl±”ÝçH¥S\$Ñc/ß¾õ¡C ò80r`6° Â²zd4ŒŒèÐ8îúØa”ÍÀœÁŽƒ²ïã*ÊÁ­-Ê 9b˜ò¨¬Ìå9oÄ…-£°Ü\nó:9B0Pè»#Ã+rç·«dn(!LŠ.7:Ccž¶O ØÞŒXÃ(ª,&ñƒ«–\"µ-Xì4Œ£¸05HÄ~Ø-âpòâ1hhÈô)\0ÎcêþÊ)øÎÈªZ5\rè¼R0°@Ü3AcrÙ?ŠiÛ¼4ËC:6³*\0èÀ­@6­ˆKS!\nc[7! P¨§#íÎÆBC\$2<Ë•\0:¶-zðŽc\$ÀŠ\"`Z5¬²PÈ7Bê²T)õM´Ã‚.#­ÜÏ0£¬× ÚóJ\n5C+\"	é,éwÅ+ÇÒƒtÜ7 ´ÌkÊÖÀ	#háN°*[}·÷%ÍWMˆm]Õ%ÕqŠÊ€\rÈú|¦c`Z4'cËp,è ÂçÃ5jªÈc;{eÕCxÞISz*9Ž£ÆþŽc5pŽIøˆXÏÍí°Â¶0ª\$çP\rÖXÊaJR*ŒãÈØ¿.A\0†)ŠB6(7ÔA\0Z0MK§oÞ#ŒŒ÷f\n£¤“Qá<Ø(C”˜dÀÖéYcbv8:ZÞ 7<Ã;ÑµÈ¨°@88ctê:%)Z¢9£„t´Njó½ñ\0x0„B|3¡Ð›˜t…ã¿T1z\"ô´áz—Ù	\"4Ð¡xDºŽK˜éÐ‹ã;TAõò8/6zã|öÁ#ß>Þ£‡²§m[é@ƒ””¥ñ€Vë»×ƒ¢v›#k†;C\r]ÒðŒ“ŸR¥+Šæ¦Ysæ °ÿ»Ü|™:¡é…\0kùBü šàPQAIM ,U²”²æàY#LiÍAÂ¸ˆ£È2‹-D9¨FÎJÊy/&&I«ÌOÃ¢5)½>òúØÛñKp'¡IgêDCË H@àÞº\nZs¡,“àâOéÒÁÈÏÈë ™™)'e\r’.e ÒóHÂR¯#¥°.¶æá(\$4Ac™Ùx(pöØ]™öXj“t¼G¡0s/Äù»†”<øLx \rfHŽânH‰!tŒÄ)¬ZIƒcn\r.p#@ ƒR*ú_hºE79ÑK)9@Ü¤Œ \nGh¡G®@œ¨P*Y| E	b‘0Þ“ä2G}D å4‚¢HA2;\$ ¬[“øDª1\\ ì[¢„ÎQ/˜	¸É|¡:¤@ÇƒIõžä]„eÃ5ÛCMiå¨%`ÄIJí ð4Œ†>zO1„g`>¤•(2Ü7Q7°Š—˜o]ôMÍæ?(Þ€\nhý.‡2h¡¬&OU1¹È\r Sû#’»æ¾¥é<íšLE2 w•Y-8®^…Bí‘HiI!–PàÑ’ŒàSa*O˜5@ÚŠð]d¥†¦UUSØ0K™êi—KWêØ0µ¾9‘2N¬i¦-é äYàÅI,´/²Ü\\7\"ÞK&*Fæ¿Û\0„ËRIxÉ>8RÕI|f²–(F‚ÀPRYe±~±<»Na½=HÌåÌ@¨BH<…&CE;b,G ¡Ô‘¯ÀÈR)'#&øþ¸‚xPKzx\0¼«Ü£ºs¹æ\0%–éB²Ã3Ù:A<%³»œbÜ9¦LaÈ„¸ÀuUÍØ»@‚î]ë¤bÊó¼w•ú˜‚˜±J³\rñìÓÞ¢xÉ.T“½!Òì“Ë¶ÁuÑ’WX_ã{0A\rOe*¥½.))8‘‘Ò?/pÜ˜ÃÄÌÄ©<I«áÆ(‚¤`‚¸eRÀ…Iû…O^'‡Å	I†Ü_I-Á-ì4ÑPsWÉ:±Då¡2*¢vLkãŽ%ü€Ýd„¯L(tM7;C–`”øi\0—³QssAgI#šœ›¦[¢™{7Ç¬´@bI–ÍÕ Ùf0¹ó¦|šA¶#–DRÍKˆÀ¿roÊ„&(hyèòg	T.Žcú^DÍ#È!Ë­Ê°ú”<ó—µJ›S:h@å\\cH\n	Ç½Ð¤‚S(qxA¦‰g9!F`k¡÷dR˜G±µ¥	ØÄ€çü»¯ÖÞÁÔËað®S¶Á(òÜT­…±ç-žJvÜn:Eg>‡Ã¸LŽÝÏP”Þ‚ßh±&ÌÁ¸í^äàü¯i¼ÌïI÷ž7ûÚéå¾¯¢€°RÙIœû··4³\\RÖÂXmå©ñWâ¼;ynZ+»k¸ekh9õ\nV,±5iCä»‚¨„AidÚgom–>·ÚPŠal®—„Óò^OZæ‹;AÌ ú©s‰8Ê‘>4V•ªÊJO¸”ëá–‡ªôšËÂÝ¯µþárŠÙ7“ wÝF¡4ÑnÃØòçK	—±ñì½Fö<æì)žÓo.ÓÇû£àâû³¼¤Î:ÀûU|(V™ms|%+Óg]e©°‘‹Ï\"sfÆÇGóÓâý¡´i/4ëâ÷æûßeóûÇ€vçÃà‰*‚ÓßÔºD_XÒBÚËŸÔªWá}§®(!“ØÚ—0%9ˆm\"Ýòñ‚\r¿ønñò¾g\0ã§Ô–Réw³`Ÿ[âª©µçvÿÞ@™ûÀwQð}—å&Z®ÄY¥À>Cáý¶(Ðf¦ª¬IÇùºÓ×+ þp`þB ¨Bb‰(þ?ëX ¯=BÝoEÍÈü¬¼V@æ3%6ßÅ¦èØ;i)Eî9k)ÃØbªU+”÷Fhê&ñ­ù(¨¤b†=ðZí@–šä&HŽ-Å6 í¥6»íð«çëÞ1Žß-ö| †B`Ø`Ö<ÂçƒÚÑˆØÃH8mN5†ÎÃbèågØC(Ö˜\0¨ÀpbŠüU\0Þƒ‚SLÂ\r)T7ìÊÁN\rðâEÂº®rnL~JdÔÏ‚–ëL®'éÓ#–8¬©ÎŽ8ÌjÕâ1JäŽãøÇí@–Cit¤£˜qñ::DŽ„¬E2#”œ¤0jÎÎ\\×* ×ƒ¤=å‰OåZ¡ív0†DqmŠ\n\":Eˆ\rC±|üÔÎ£bÔ­u)ð&c\"<ÈçÊ •	DLª\\R+\næ8Ž±c–	¨Ž-JÑ0êéìVL‘¸Ëð%QR-\"ÜªL€¬¤Ì¥bwàêOåËæ® ‚-©ì® ¦\\\"÷Ç\$9E’ÑfS`ŒžÃ°\$ó²’qiƒ\0b}&Y)F<Ê¦NdÆ¬Ï û\0 ÈgWà zñ`MP\"àÒ";break;case"pl":$g="C=D£)Ìèeb¦Ä)ÜÒe7ÁBQpÌÌ 9‚Šæs‘„Ý…›\r&³¨€Äyb âù”Úob¯\$Gs(¸M0šÎg“i„Øn0ˆ!ÆSa®`›b!ä29)ÒV%9¦Å	®Y 4Á¥°I°€0Œ†cA¨Øn8‚ŽX1”b2ž„£i¦<\n!GjÇC\rÀÙ6\"™'C©¨D7™8kÌä@r2ÑŽFFÌï6ÆÕŽ§éÞZÅB’³.Æj4ˆ æ­UöˆiŒ'\nÍÊév7v;=¨ƒSF7&ã®A¥<éØ‰ÞÒvwCù»ÝN¬ A¹g\rÈ(ªs:èD®\\×<˜¡ç#Ð( r7œÏ\\±…xy¤Àô¦ã)žV¹>Óä2½ˆA\n‚¦ª o³|­!êà*#‚û0j3<‘Œ Pœ:°#’=?Œ8Â¾7Á\0Æ=(È¨È Ãzh¼\r*\0åŠhz’ã(ßŽƒ’ì	ŠË„\nLLXÖC\n\np\"h9;ÉŒ3#ï8‘¥#zñ'(,Sr1\rØØ7Œî0æ4¹nhÂº¹kãX9 £TÚ(\rãXÂ˜´HòÜ)È#¨ÖÂ#­jüØK¬…ÀƒšA#¼ÛD¡í¢M¢td2È‰Œ‰3:!-C&NKSÔl¨îµO3ÙxÃ¨Ü5´ëp‚Ž?£\rs(Tã ô‡¨Ãb†óŠcxäÂ0ÉèØ2ÎÄ(Ç/H«¨èÃ¥#«ü„¿(:tÂH†7(ñØ®ž#:‚†%/ãü…À£œõt:ú‚¾PîkèŒ¡\0¦(‰€P‚:©Á\0’7l„BàCxè;²¯`9Ïm)EÉ¯™3>Ìs.7Ks\"]»Øž*¹d£FOmŠy2z:TH@äÌ¢«80Ãh‚ìúÊÃ¤5,ÕÀP’6Žu¶\"§ZMŸ”â…›ÙK“n;0£ÙÄ¡™eàôþê¤+®\r’Æ‚ èH@7ŒÃ2Dþ&×\\Ï4°Í“Dû%ihë1g£*1œdèŒ!b0Îoî6“|%«šƒS«ˆ:9ap»›Â®2ïzÌÉ¿||®Ü59q-g,\$dPòX@óËsÖõ¾süGCÀÍõÓwC7ñoØF¸Bl'!ùÚ2K£º§\rh€@!ŠbŒ`^éiHÂüŒÖpÚ:ƒ§Õç»ˆóÑ£É^’6¥Ú~‡¦Òˆæ5(>•ÜøD…qÍÍ5&Æ>û	kqVK¡p Ð—  ä¥W/\"Vÿ €a{€ð †ƒ è\"\rÐ:\0æx/ð¬Èä .YÁœ‡\0ØÃ(x á¹5¼@^hrá”:B¾ŸJ·@øÙ–´ØzÐ€¼0ƒâ„øƒ˜n‚ÈÄC}\nƒ†/¨\\ƒ3ÄØRˆ!,(1””“SÐOWq@?Dµ†(\0·£Zu5!Ü\0Áz1á½5ô\n¾€PÅp¸þ9!P#_RÑø(R^LI™vZ¡¾´’SÑ[>`)¬ú&;Ù»Ÿ@¹¸æÍ\rÚ'r7<ÀÊóƒKÐ%DÑ0à¾Šš\rgÁ¼BVOIÒì'ò ‘\"°Ä}•/à€-ã–N‹’\nläÄ×Êç¤É„­¨Õ‘„‚ñr0½ H‹hk#æ±„§•Ñ0Zü\0~%Ì“Ë4îCÜQ%lùGTì&Jt\r•!¡À‡W\0¦°™›ÍEèµ\0f\r)¤ŽÉÀÕEÐHsn0l0lHÍK	ŽD˜Â\n\\ƒ¹|e*9'@ä”ÈXokÅÄ`©%iÚ¡E‘9§çHK‰°K\rÖPÇPÆ[štR,\0¹”\0ÖÑBºô !ÂJ(n\rÕYkÈV®’RØ­ 0cHa9'\0@²QÝ­”Aw¾¤ßuBhUn%¼ºD8\n	áÁ_…wÕBJAJ4oÐ„“ô:Ñù/ŒXÄxÕ,Žáº=óäðšøØªw^¶t¡#*JNñà<RÚª“ââf35 T\0Ì\$ëfç¨`z>%ð”ÆJÐœcrë=REšŸJ\0ÔY,FR¢S±ûŽ‘c*ô\rõ<9´V7E“ù|0„d+¨×ùHPAPqÔä—†9PT3½_\$	þkÂFB{Ðe˜žåTª=­ªæY	šå¦FˆyE°\n\$”VnÑ\"¾·H”ïÙÔ<óLì¹z\$	–²ò¦£TyÂ:ô¿XðßRÃi@hÁ¸2#tÈÍ\n5Ä³&D‹—P,åÒ^eØ¨£ÅeL]o©h®§Vó]L¡0æ'½,‚7Ob6óÎ‹‹è»JÑó2ƒßtÍ(uDÔ†el®!è1R!„Dýì²hN±=0`¨C	\0€8‡TCÃ˜ }Lt3CÀ*)¥3}±ZV0¿Èýzr\0¼¯9:³ƒ\"«1æGH%£ÌÖ6z =#€Ÿ¯#õ~á•Ãv}ltv”2nÓM—Ç§ž& ~zˆ–êZ+lC¯ÒjyÙ¹}[U5@‘ºÎÆëZ¿©õÎ©SÊ¹åàcEÃÎŸ˜ÚÆ?m_´uŽÉ¨Zþ€”ñµuBÛ§í´-«‹³–ÛúÓNî9öä4=¼»O˜e²Y¡ð÷r™8ÚNIÑª{øªªé_¸´\$ÅnÄŒ%)Ü{eâ¦¼9êò™üŽßõèÙ\$OMd|¬up2UàÅ'ÄË™¾Éé>,I¹A‚A!#,ä†ºÑ[õGfÁ½óäH0k:YAO;w’Ï©à#éÅÙ¤UPº9)qÊ:“àÓn¯Y6èšBñ[¨Ø ¶{|&ÁRÿ½o gét\"\raÂ‰ÙºŒÔÄXö>ËÑºùAa€öwT=[WÝþ6Ùñ:ŽF¬9G­[?p\"P¡aÎHj˜ÞÇ¬ÿ\"[«n«žXÓ›³üQ°ax¬÷ŽÑ:u»ÄÈP8ìHŒ+ÕÄÈKªÿAO®‰}×PM’û×J€ÅñåøeBýûâØýÐ [_{n>Oibk;öÐ„˜>Ggø/\\vÐªÊš”¦I×Ü5¶\\ÌþI·ô#¦³Î‰ÿO{ú“¡üµÆiöº—s×4*ñpÐGãÜ˜Œ²P¯ðí/üGïºÖÂùÊ×m ÝPs0î.õ\0âêÖ0ÙÓ±Nàï#ëÐûPT08Ù€©J˜.@ÞI8þ/„éŠ’Çp]	Òî0L70k¬zþ/¦ï°xÅ¬^Æ*Ü:¬°LêÜ®B('Î>K˜?” åæjî^c„-gi\"% ÜAàè%£òÅD`Mž©ð”ZŠÞÃêâ\$œIÇ\"-ƒæ‹„KÔ>@‚ £ÎŒyé8íÇÓâˆpljR¡Ís	ˆ´9€ Ã\"ÃPBíÌõ/š=Ñ R\nÝ\0¯‚ýo‰\0äQÑ\"ªo¢ïP‚ú¢lûæ¢}q2ÃDÚ]lÆkç\0¢VíO†¸ ó)Dú#ÿÑqQfî1kïT&ÌPÜQ€:QT¹'¥\"ÜOV‹eÅgˆ!àÆ=€8Å®ÁæOCÀä1r}Qdgæ’«Hˆ@‡\$wÀÒ¯L®©ðA¯Ôíq?°o¶ÿNý‘ßƒë‘/ì¼Vã”9‘Ž3>ËDÛoÂÌü×2 €î£¦²5JøJ Ö&†»ñùÄâí²5#ƒOÏ”þP…\$C#\$’=ví±ŽN’7j¹&RXM¯YQ<é²w\0±úïŒé±2ljrŒ]lŽÇ’\$Ø}Ò–6Ðu‡)C È2¤ëò‚þp‡ì*ì‘!F§+â|É\0E¬ÅIDJ£îÍd6*Ò›rŸ-„¯-ïÓ*øh&†\$oÒ:Æ³ÀÂàæÿåóò\$#£¼yÐ¼HlRÃ63³C«6JMÞT%\$¥Å	_02æ„\r352´(Q¤¿c.0ã6*£\nTJ<\00036\r1À8:K®×6éçiÓr×“wsp×PR2Âld‚\r€V\rbªžb„ñ(ŒBN iP9\nŒ¦j’11Ô¤ÓU\$Ö\$Ð¤é\"ø!ÏUÀª\n€Œ p&Í”Òî*ˆiG|×³Ö2prëéÓ=Æ‘>\nrÓæ2ƒ-‡=ï@½dÈÙ¦s¤º#§ Ä#£ò÷Âä_ƒ_äéÌ‚Ì3©5`ªJÃXÉÂJ9:ÏS¢ÿEÂ>ƒ ô)ÎÄN/<ç1\$%¢5FŠ­0Ô¸ç¤¸rÆçî‚:NÈ/Æ\0¢§L^&/˜õkýH.â Jv%¨zát~(”•>Â0(ÃhwÔ‘H¢·ÑåK4¥KnŒ„ZN¯KíKCR!‘BÃ%\"ÇÃäXNB`-ö 4zsô\$È\$Ê\n`Öð³²I	.§Ô¡tü6õ‚t«>‘¥\rFJ-ÄŠ™Âƒ8e^Q\$NÎî¬ë<]ñZªcÐç(°TÄ™N¯5`‚(DX#\ngœztïçTŠ‰ç6	DmCFõÃøI‹mPS&3á7ƒiCR 6ÆgRÕNwÉQMQEDÛ\$rh-Ä¶B^]\nd\r«fàÚEDXMbÜ% ";break;case"pt":$g="T2›DŒÊr:OFø(J.™„0Q9†£7ˆj‘ÀÞs9°Õ§c)°@e7&‚2f4˜ÍSIÈÞ.&Ó	¸Ñ6°Ô'ƒI¶2d—ÌfsXÌl@%9§jTÒl 7Eã&Z!Î8†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘ZÔž»	&))„ç8&›Ì†™ŽX\n\$›Žpy­ò1~4× \"‘–ï^Î&ó¨€Ða’V#'¬¨Ùž2œÄHÉÔàd0ÂvfŒÎÏ¯œÎ²ÍÁÈÂâK\$ðSy¸éxáË`†\\[\rOZõƒ?£ÅåÞ2wYné6M”[Æ<“‹7ÏESž<¡tµƒ®L@:§pÙ+ˆK\$a–­ŠžÃJ¢d«##R„Ì3IÀ¨4£ÍÈ2¦pÒ¤6C‚JÚ¹ïZ¤8È±t6 èø\"7.›Lº P†0ÃiX!/\nê¹\nN ÊãŒ¯ˆÊóÇBc2Á\"ŒKh–Ãa\0„Ã°ªÜDÊ•E¬+?ñ(Ó®’Ò}Êoô£,EÂ+œ91âjºLnRÉÌòÓ^1®+Ì¡EÌJ½8%­‹Î:Žƒ¬à1,[å%JôkF±‰‹•CTE‰ÃxìŒÈ,ûh‡\0Ä<¡ HKRÔèJ()¤£,øæ±â0ê¬ºðJ( ºµËb\n	°ÇM¸Ã‹†6XÈ8@6\rìrö'ŽPÜüCc:9 Ît‡%\r£Jœ§iê#(HñQˆ.³±[\r‰315è›7FÏŠz¤˜¢&2u¬€¥\r @ ÑŠ„çŒk“òC;¿8±T«–Í2¼¯@I¸BŽvKä!®´¾:: 1¨‹‘ä³+0Mˆ¥‚4µÈÚï	#j<„1â(ñ›°N6@•¥·{\nR¦YŒ=9CäÎÔQpØóMJ–J£xÌ3=cpË öìü‰¶)\n0œêz<¿ìê1 É\0Ì:¤ÖbîÉ˜å´#8Â¼åVkÔ@ÊaL,7i@@!Šb¾¥*Ö¤ÁÜ•9Izè6î	bâÕ-Ñe´œV	ú„ŽZôp‚a(çµì)¼µÓ2êààšõ{®nü¿t,ß‹tšÃuë9Žë¥KÛ&®§* ƒC:3¡Ð:ƒ€æáxïï…ÑÆ¼ƒ…Ë Î¥EÎ”sè^7ÃÏ#ú¢ýàža}šŽ\rDà/ ù¸ŽOÕ+'Ž%¾‡B:×Ië'Ù7L®’±\$ J;òÜƒ±—\rM¾Ã°‰@h@—äH`ÀP	@‰›bè`¡h(*\0¤“•ä&bÃ™CÄ6ƒÞÀXa]F\\¼g\$‡Ã	8\n'çE¢PJE…‰TÇ3b?ÝJÞCñ|®cˆ©÷%§éO\$\0ÀR©PˆÄH<šD‡ÍTO\$Þ#:²Jñù&Ä	^>6‚LÃqY‡ø:G×ŒüÉÀP	áL* \$b•‰ãíP\0€3§\0Ü†ÜªAÔ…’ã|O	ñŽÁ†7­¢Ìì‹g07œ\"YŽMF;/3þÿCz8•áˆ»/•ö~CJñs\0€#Hh½Ûì^!6AÀ‰ r'Ó’D ÉëówQ„®ÓrŸ@PO	À€*…\0ˆB E3¬\"P˜gŠ^E’XæÅn§úQ\n°aŠ\$XyË’#Ë‚TùÒRºEèrV4ð@[§òCiç#ââ•á1O§(Ö1fQ\n2ŒSË(8ÇY©TÙxÉÁS7°ðœÙGm5±‡!…“Š4î4t@IÏ[ª@n‘X«6¾ÊéêYgç(7)âÑSSK))I&X³]‰\nÎx¡C2ÒaÁr\nÄ±K§·MÊp‰Â¥\r7ÖÌ¼2†…@\$¦ô¾hoH.(’ôYðo\r‘(ë¶2ta,Z¯Lthø‡ž•‘	€) ”jtÉØñ‰±=Ê\0 ¬fV=ˆ\\AÑ¹ü^@PÃ²|˜«õ(ÆÈÐ­¶¶t—Wæh™^/ÊÛ©cHjqÊ›†¡*©‰ÂU‘¨T·ÏÌ9+³rZ\rÓ ë5£œ²ËÀk;1(V›„æÍÉrX5€Å¿ôÚIr.FI’Õ2Sª]žP „0IuAMR<ÃPàÏqéE\\¼ËG^ÓÑ«å…¿´Ä–ÕR¥ÂÆ€ŠQ¶Õ„ò²Qä§á£=…ÈfHê\0\0œ=ƒÌ!Xpà0·\\+‰ðæ)Åq ŠÂ”\0s%Bø¥´Ð®b&zNû	ÃøÅŽ’l‹ŒÝYÌÁx­ÿµ¼3ƒ›‚L\"aÇ'ŒŒêÍ“	Êf*“†u—Î2Ü[Æp7‡r(ÿ!¹Ê1¥,ôgq.SsBhØÎrÜn	ÀD#'.&T\n>ƒKqŒ–‡pÊ¬&gÊ¬ª”ÅK”)1ÁÌ£ÜÜqùç9Zs*’}>EBK¤ÅÕ„×Ò‹ÏI‹Åè½ªPIOay´ºØÐ84¥µÞ86…AÈ8Æ…Œ…©åÕì‹Y¯”vÀ¨v?e-bW 'Ó7Ö°dŸi‹ÑtAF±!:Š”‹¨¤JÐ–³}/º¨Š¿S³ìÜ\rÒsåÎàY‹^ØÛ;®‚Š6Ñ1Øò…iÛsnÒåŸà€fEÄÁNÙ¨–ìº•Pê…Z‹ævª¢Í›Äê4_ÚÜŒÉjÀbNØªlRžq¢)h\"×Ÿ34§XÈm/0e<¡GÚ[–O,NK®Ù|ÜclLÓqÕiÅ¸¿,ô<¡Ñq)œØQ|0âªÒƒ.Y©¹ÁºqdJ’{yTÝ¹³ƒ®]\r¡ÊjYìz‹²»‚Î*Ÿ³ÿ>ë|â˜µÂª°dÍž5Éƒ™F6h`7·T7Ö‹ù5?ä‘p‚NïÈa±]Ñ–(k†rÈÎ`OLƒ’„ù&ü=Íñ3iv({Û:íÑÙ6/Ê÷­AÀŒ}È¤d·…[OWyæÒ'ßó>ÁPýç7Úý¦úÑt–É¯ƒ÷ÚéÙ_’P5ÿù¿?·íw…ôNWÎ`%Ë•¹ož¿I³A¥:µ€µÒÚv#.µþâ³zã1Eû|[°;/àu?•ñìü÷û,/ð½ÏªÅŠTöZVÅp;Šbb:ÿËÚûdlø¦ß\0æÆûª¾þ+Ü'/L\n0?¢i…®Ó„´XÁ†Eü%oè×J†VE?\0-±@ëpJ ràj‡-F°WphÁo>\"ŽðnF´°ph/	£”9êºBìºˆ´° ð¥°Š»Ohç¯\0€A\n«¨¤®öp¿Br *ûKâ>dÄL…\nëï˜'\0«\r¥\0%°°´°æ¿ÝÇd	\r8\rãž¶<ŒË¶ð8Æÿ§b6fºþ¬[oü\$¾ÜÏêë˜Zfþïch0BöÝ#oå¼3nªÇbnÊñF2N’c	¶<àØ`Æ=e’¢âAM8C:”Ð6Ýª\\\$íd ZY‚¦™\$ªs‰0‡ €¨ÀZa#ëŒèìPÕìârŒ®óH¿ÆpÇˆB)¢8C'Úˆ†ÀOpÈ ¨±p1€ò³ƒ\nÞ\")\$Lj«À\rÀÖÿkŒ¦b/GP%‰\"(FæF¡†Fž(¢ä	‰ƒ#»!I„(Ñr7E®é«\0²£^TqÒ0ÆìVðl6NS%ü7 ÊpÊ@6R66@ÌF‚³È A‹5ãdôÃqFvìîF„²#ó%¦0Í&CL¹…L§\ràà9åºL%#–R\$˜»†F3#”â¢ó%V0ÊTÛât¡®eªáäÀñ­þi*Z:Â2I@ì3±Üi¤›\$†C¥J´àÊíÀXd\02”µ@‚/\$L1êÖ.¦7Ì†1ë¥#Æ ¦CÌ¦ŽK,§J6Úd\0Ë\$‡.W.O.°C0X%ev~i? \0FjhCq-\0o\$h";break;case"pt-br":$g="V7˜Øj¡ÐÊmÌ§(1èÂ?	EÃ30€æ\n'0Ôfñ\rR 8Îg6´ìe6¦ã±¤ÂrG%ç©¤ìoŠ†i„ÜhŽXjÁ¤Û2LŽSI´pá6šN†šLv>%9§\$\\Ön 7F£†Z)Î\r9†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘‹ªË„&)A„ç9\"™*RðQ\$Üs…šNXHÞÓfƒˆF[ý˜å\"œ–MçQ Ã'°S¯²ÓfÊs‚Ç§!†\r4gà¸½¬ä§‚»føæÎLªo7TÍÇY|«%Š7RA\\yi¸ÏÛäuL¢bû0Õ4à¢\$ ËŠÍ’rFùè(ªsÊ/‚6¿ö:³\0êž„\rëp² Ì¹†Z¶á°­«ªh@5(ló@œŠƒJBÜƒ(ÌÀ*‰@”7C˜ê¡¯«Ò2]\r¨ZDö7Ãœ C!Œ0ëLP¼BËB8Êú=ëìl&3ìR.)É¨<l)¡ij’Í¾ñ9C»i[]1Ï;Ç1xŠèÆ¬Ø˜7¯ãtF9'£rVƒK­¨Æ¼°)ƒz¤¢âjDõ<M0ê:±¨ ˆ4Ò%©\"7CÑ(]õPt,l'\rêü„Ò½KÐJ2òƒ4ýCQ¶ó¨Ë;º Œ:¬%<Tˆ,‘‡YAˆ¸ ÓŒt³6š0I¢\rˆ	ã”tÊC£F9¡NˆÊIŠŒèÎ*\nñ ÃÀè½5ºÄUãbRÅMª,1§Ñ»èŸ*¢˜¢&2£uœƒÎhàƒA¾Š¦1¯L[Î?c)DQN¨…0Ûs\$ùHa)ƒoa>¢•‰x¤l\"ã#¬¥†ápÇ=ÅõÚl4ˆòÿ‰#jB†2‚(ñ—¾¾.á±ƒdl1a™Ê‹ã˜Ö÷U“ÈD³mSX—¼cxÌ3\rŒ\0Êã,Òt7¨)ðó2ã¨Æ…\$c0ê”Ø³hæ £–¶0Œú¬ÜÀAÕ¢é Á@æÃxÖ•„¦)Ï\"X¡ê*H\\LékªŽËàÛ±¥ëËb»E¶–¨’·µC!L“zã6ôrÇ™³QÈÃ´eïãü˜l¸ð[\0ÔÊy9ê`PšÇQI9Žëå@²Ô‡Ã‡‘ÐÑŒÁèD4ƒ à9‡Ax^;úts¹¡arø3…é_»o%cœð„Nä3½þP¿t§ÃXDe£ƒkÊŽà^0‡ÐsqŽŠ@·Á=og:&ôâœÎ1»/†ý‚F¬Ðàe6ÜøÓÊ›†3„p4!TøSÁKÈ\r c‚I\"¹@\$-™„&`’¢Ì…Ls\$!¸›‚r|“˜iCë±qÓ\0œ!T\$ä(C£“B(…ž5ØË‘ONI pðçbë‡?DÀþ“r`P´PüŠ‡“VJ¡±€¦`ìœ„hÖf?†œ„+W°Lë|k\0¿Ó„cµ\n<)…DÈb–Ù=|I”tjvZ˜ HA:âbpÖÉñ¡ú8JðŠ™va¬\0007!ðÎ¥¢)Aà)¥’|€ŸoG \"üL?Œ ñ¸ @‚¤.^’,È	Ï¡J¯ešâNÍ1>}”‹°Ìo¡O	À€*…\0ˆB EYŒ\"P˜gII	ç†Å`¥çšc\n¼aŠ'øzÐÉ!'DðŸ¹=ˆz4(•`˜òî~ˆýp&ŠuC§(¥Û)•†S¹õOÄž3³ÀÒÒB(ô‘02\$ÄÏÜH.%¨p@ÈS/O‡ð7†™y\"kŸUT\\˜S†É»%ÄÁØÊ¦yK˜r/I…š*’xèQxVr%“™ðÇQÚ\nÄ-Ñ? tþ¥â€‰¥#(>‚Œì,…Åaj&É(À\n=g®B ÒCŒØC\rìêXÐ6rcŽÝZv	—(5¦•±Š 3:Çâ<IƒAXÏ®2wa×töGcFÒØ‚’&–ÓZ…’_ˆ=,Æp)Ò¡è²x:¡k:Á%æÚ†\n…ô3¾€äEÕ­§·Râ\\`\n>NkÀ³Àæ°FqÆú”†ó¥b)':(¼\"3ömRç\"&¢Š*@‚Â@ XEõ´ÈåÃƒ4xu|9rÀŒ¥b&Q(ÙSòÒ©œ4ê•P`”šiêIÐÀR@²*µé›F4˜<™cÞ™Ap	°Mw˜l-X];q4XlÓ\" Ã‡«	¨„DýœôâUdB5ÄÊôø•M€[c\$§\nãÇLsïî”¸‡á,‚cˆ°qÈãºcpÀ2IŠÉu*ddÔQŠ‘¢\ráÜ‹¿uI™^/Y™˜KšJl?¦b‚¶îˆaš@¤pó%bø¡Ð‰_*¹õ“\0îCúË™T˜Â˜Mîy/<D!v2xÈYëOÓd˜iiJJ¯ê/		4a‹2úÀ¡FÇ5|ëËÅÌ²\$Ö,S´òŸ!ÓkŒIÈOÖ8)ÆSÚÒu‰ƒZéMáÂ±­æD9ÞÏ˜ÝJ3¨AlÖu²	Ú{TÅìçO–q.¨JaÏEÐc@QG[æn­,Užîƒ r‚G<ÔBAŸçÞy¡*§rRøVKÊ…Ý¥ñT„óqi-j\rq¨Ô„m•\$ŸÂÒätVð›C=Á\0(ËT7‚™ä‹iµFgÔïoÓöØé³¿\"§H‹’š7b‹yG!g¼¬Ür]ÃÌv§*ª<×_päkPªS\næ|ïX4<9(a²»\rÄY~‘¯¹¿LèÌ¤ÛlA5h!›\nWxÀVì»…ÍîÁºÊÿbü>á€O[»øï°bœ5¯\rÇfÆ&>›[Ã_o¦ÉÞ®—ltºkµ;±°·ók½ã®«¶»û}·½5@w®ùÍ’VÓÊö{Ácqå9¶nÅm’ry³Ü6å‚ñ&Ð‡`™‡ÏXÖÖQm0š%7“´YA‘ÁKhsˆæÅ¸¯räï%=F˜õAÈœøñãn\n6ÚÕUù²ôŸŒ”C`öåV“	½=éµœ¬¾‡øŸ´azO~Îÿ|Îù\rÅMz	0Q«]^óßy?R¼PîsòqÑž½ÜGûý„´ãªýËÆ¼ðÿ%ê\$¥X\\‚ŒFçLPâ8¯äÃâ`£#nJ¦“N¸0/à¨/íNºÛ¬Ûp=OÌç¬Œ…`°¦µJ¬ \$†(Åó\0PV%Æý0ZŒè/JâbìÝÆ4mÖv*lJ‚h eì%Ð6ç	€°ŠPŽFPJÛpˆDðœ÷ð@ñ·é¥	°ŸP·\nº×Pw	.™p¢þðVQb¦ Pm\rbõKšXoÂþ/ïü¸Ð®áðêÚ°âŒŽ ÿ²b0ùâ·”ú±¸±\n\n‚ P[í`K*)÷D¶rOêêíuÄRÙ¢þà1ÀÐH02FÌFs±\n~0^3eL£0\\\$oô ¢ ë®Ñª¯xá‘d‹m¤Æ@†X¦ŒTÏ8[ã0mò2…L*CBé,`Ä€‡Â§‘tîF~ø£Ô\r€V`ÒXB,\ràÄ4i?£öÇ*Ü:àÂ¥Š' Œ˜ˆ@\n1‡œ€¨ÀZT^ÀÞ2C¼ÇÎÆ×ÕLÏ±úÃ‘r'‰˜f‘ªƒb¬ÞâF‡¢R3ì¹ixÛ‹@ÿÀÌ\$‚1­ö\"ð^f ª*m‚i«¨\rÀÖ:Ã'm\$€1òÿåØcOˆ¹â†M¤latQ\"Œ/DÖG#\0;òvnN‘älYìž*° ÖåÀ7— £E`]„+r”Û¦u)’TJÃCˆA¯1‰\rç‚¿`ƒ*k*Í nl­+EÓ+ŽîsFù,¦* ô¿r–9Ï¾¡@„@Zçkÿ,ƒO«¼Ïå°ãŠŽ¼Ó'î&õ«NZf8‘n#„˜ÃG#.àvÃ|3*ý.e@³€Êà«Ez@e‘.*þ`ãØ#(¬búúN´±È3k‡)ã(¤e‡‚bPltçJ£ªX°@á#,³.€3.IRBT[3¤»~¹Ð;\$lÚ„hŠ¥-zFØ/€Â";break;case"ro":$g="S:›Ž†VBlÒ 9šLçS¡ˆƒÁBQpÌÍŽ¢	´@p:\$\"¸Üc‡œŒf˜ÒÈLšL§#©²>e„LÎÓ1p(/˜Ìæ¢i„ðiL†ÓIÌ@-	NdùéÆe9%´	‘È@n™hõ˜|ôX\nFC1 Ôl7AFsy°o9B&ã\rÙ†Ž7FÔ°É82`uøÙÎZ:LFSa–zE2`xHx(’n9ÌÌ¹Äg’IŽf;ÌÌÓ=,›ãfƒî¾oÞNÆœ©ž° :n§N,èh¦ð2YYéNû;Ò¹ÆÎê ˜AÌføìë×2ær'-Kk{3ùºš>²±1¢`÷½“¢ÈL@Î[àQ2ÁBz2§Ë¨Þ„ ¨:Ã/a6¡îÂò2¡Ä´J©'©û²¡&Ëš::ì8Ô0§¢ Ò/!àÒÂ¸+ËMc\"1Ic²à)	ìü\r)¤[¥cÂ1¿P\$T80KÜ&\nH!6òˆã(Þ6Œ££ZþÄp §0®’t™ÆìBpÆQ¢ð\nšê0BÃ1TÏËÌè˜7Œðšp8&j(Ü2 Lè¦Ê²cØÎˆ2TH÷+)¤˜†N‚hÞÌ¥ÉCÜò õD<o-5N\r4ó”É‰¨¿´\rbºœ\rÍ“:Œ\0ßG€Mq]QÐLÌÊÑÎˆŒ€ŒpHÓ\0Œï%òBÐKºò€°î’ñRL;Vò5pŒÞÿ)ƒ£ú€ŒêCFàBé¨ëeªÐJXãblÈŒP«V0Î¢&ˆê™6‹È˜I©`ÂËlS;onE²9¹ô{KS4ë®Á°±tòXÆ5Jb#*‹ƒbÕÒ’Ç–X–cƒ*¸°  Ý7ƒ-Óe‰#hám³¢(ñŸŽW0†û=µ[(c“Ä]=eÃFM:46#6öCd¼6(Ý]Ã0Ø½²Ìò˜Ú ÞÜPÃÌÐ£®9Žc2†6P Xà[pÃ@Á°m~¦,P9…)è†)ŠB3€7t@A ÀãHÄÞÁ«/)Òp3/\n*«ò{;4m>ä¬E2\n†Ð¡(4ŽBÚŠÅoc•\0„:ã³®íÐò`ÃÒ3,\rj:§¢hÂ¬¦hÿ–9ŽëÅr±+ÃÌ‡‰`ÐòÁèD4ƒ à9‡Ax^;ýr•Â'‹ÀÎÑ€ñ!.à^9OÜ»ï÷ÍøÁ>g¡ÀÊ¥ÂxaÅD§%ÃŽ¦Üyñr.L­(@ä¡•!Í+¥Ù!T¼Cï'Ìë’å^sž'¤i<Çjý	‘¦…¦,ó™#xuáHc æá¨‚ÎÛaÇ¸'šPª/M7æ(FÃ‚r\r„°¬µšé”œ+¨àšbŠQÈò/\$ªÄÖ¤ršÏáK—B¤±Ð’8ŒM™yA¨¼<2\r	èI\"áäÙ\"àÒ®U©Z4!¹\\œs’yU%®è–Ù\nñÇrA¼€r\ntQ7Ï\$¬ÔPÂ€O\naR¨3ì|O#™\n…år¥bQH9 A*§˜¸žQ	I/ŽñE%@èºêá.!i)³(üy`i'hl9›úJÌ	Ão)Ú9pÎšÿ+hTÝ’ÀŒŽMŸ-¸)\"ÒÙ9Dì98¦¤AáèrPà(íÅ4wt	„°6©¶2ªV¬û=çèß-\0ˆ¢\"ÛÖ%“Ô7¯Æe#©v.®ð“×8n])q\0¬’¼ÑØeÌ-­\0ì_XÑKj‘	ÁÄbC¨g:ñO2€ª£¡Î›\npIt§‡â‚ DìÒY¡£1eî“¶0ÈYS©„QŒzZ“†KP9ZaÌÐ•T`“½Tf¬ Ò2¦8‰Xú´VÆ”ÿ’X¨UÙX2‰¼+RØleN’Ü\nÕr(rXTÔu…ùÃàÒK€Hœ%I\0ºBö—ŒS¨6Æö|îƒ˜pB,Z•Ob\r>I’Q‡I @†–É QmXð€ªˆLÏàSe‡\\½¹‘R eT!•Q%ª-v´óL7Ó>aÃÁYl‰TÛIX®QÒ!ÒÛ Þþdt½…Ó#ÜÉI”/&wÒÐy(¿	Š¡«BG]Ó®ç=\0 ÃÞpÝzQ¨)¥ë€ëÁh0¢o*zª„Èì­\0ŒèLRpwE\\2\\£ÞAÛ±'YD çµ\0ŠNáLdñ4vSÑêGA*@‚ÂC`f´§5ùNƒƒD až„v&Ml¦uD·Ò&®Ax Çæ¦2+5|®cß+«,(â¶ÜX”jÔí_ä•dhŠ%Ú däÖír‰‘ÊeG\$¬®‹gê¨%d-S¢0 0zfdã(:œÄOUþ=Éáã0˜ ]‘ñS¸;:å\"pêiÓ«™ )¡füçJÓºôñX\$•TKü]UæO©òVôÍs+ÑTœXògœ®¡= äÞuNÂ|W‚Pšµ4hÜí	u‚:QjêÝÕ°AÁW&åH)\$Kzö72Œð¬—‹´Ha ­ñ2“‚¹•‚ÎDi(ò;HÛV„É›Z§M†í´¥Zül«9Z™ª¡¶YÖÛŸ%Kon³èLâ)¸%uFê·¸÷Ò¬ß•b7f™ÿšø	”à{}Ô`éª¨AL”ëã…*Õ–ŒnÅušrœ½Ë«Ž-–—–©F¯(SHK]f†WÔ4œ(”¾¦zçÜ’óÈßàÊu=:Ô„äùªîYw†ÞKæ«hÒê7éE[TXë4À[÷pn-ÉQÚs5Þ±¸ò~S»„=ë‹©ðB´k*UPì}Jvl³š·Ídi-7²Z¦_Öú©£ÜuBÙ5\"‹Þ8oiì-E©øw–ê€AP†Tè„Ý¡sýÁg…LeLË‘rÇTíü|€ŸÃ<„C75Ç¤¯-‘2Q®#œçuø|ÖÙBïŠ–y5VÐžäö,ËÙŸ®æ½wq÷vñ{SÝæ»GÂ@Ô:5ÉÉH=Ô#Ž[Û1Dùã;¶V÷þ„#<ŒÅõ¤^÷\rpn¢Œë£òÐ.F¬¡Ÿ00‚ß×cê‡ÃÎžÒòQ{‚%ƒVºë²ÍE ¦¼˜ˆ3¤ª·kzT¦íÏ‚·TJX”ïnÜ.ôÜ&·*]oáÏòi®T(·Å Âå]BámÖßí2TXà¬´á\rÃT\$BlóB”ZeáðàãÁ4eR°ˆK­Ê*ëR:@ÌaDC²\\Â~Q¥ª:cªD£†×Rb… fïHS\0÷öðpÀÁÄøjî0Îò„”ð’·˜ÒåA%3¯%\$”îHK¢´ÐD=Êá\r\0ä3¤ž(cÈ\$OŒ/%–AVåŒ0  ÂAwp0÷*¡Ñ Q%áE!7q+\rNáPð=ÑDqH!ñ)‘YñG7v¢ä4çð.?MÃÊÊãny‚dd€»€i1„Ýª./+âÖ1z«„SÊbµ1¦!Q«nÝ'“fùDÑ+ß„ÐEF}ðS ªF(˜ÄQ¬ q¤QÚM±áŽu\rp±ÞF±ãÀ	–j@ÈÁPô3  P§<æƒôÎB®@.Ü?G²%gXóÏXÒ\$JC\"¯&«¥¢o\nük`qã\"&Åp¢òÿ¯>õ±ô:ìªÌÈÊ2Ò1ô'bóòqD¼\r€V’…R\rmX7\nš½eT‚hv†Ù\rd:g\"ˆ§b´2n€\0ª\n€Œ pBÂNŸÊ4ÏrHÆW'(h¬üÐÀ\$ÏJ>iË,ŒØ†B:#âB\$fªQ£\"ª¨ü0.(.ÆD`¤ª³Î^<#4Z®5(Â>¡£%Ï6ç…&°b8“ñü&ÈB8\"ÀâÀAÏ]zN%Ò/€&¤bdäþ)CÐ?ªW)úÛ£ŠN®E3ÃUË€UŠ¦ªîu1\nq%-³bQŽq\rá#+7³jºëdw8*­#.òÜfË6#*)Ãh6Ã&rK¯3ëJÆý6L5‹u¥&FÀ†as§2òIÄVZ%øF,Ä]o»=»=fœ/kê;#¤Š%ä×ç,M`õ\$lyCôãó®\0¬&@îJêu(¶@ž¬To/ˆ˜³‹N Gtñ†±d&3 †Ú3qæ.\$,v0\"û1jÎ=ÓÚ	´@4«Nz££(³þ/´7`Ë@±Qq]ÀË0ÀY¢:Ü¤€gÂ‡6ÅI  @š	 t\n`¦";break;case"ru":$g="ÐI4QbŠ\r ²h-Z(KA{‚„¢á™˜@s4°˜\$hÐX4móEÑFyAg‚ÊÚ†Š\nQBKW2)RöA@Âapz\0]NKWRi›Ay-]Ê!Ð&‚æ	­èp¤CE#©¢êµyl²Ÿ\n@N'R)ø´@%9¨í*I.’Z¤3¹Â{“AZ(š˜ÂTq\0(`1ÆƒQ°Üp9Œ¯ðXi\$fi'BÝãðûæ2’•,l±Æ„~C>Ò4P·üT!ÕHæˆkš‚®hRðóHbúˆ°šÊ4ø½i6FFc{Y”…3¦-j´rÉ¼ê 4NÆQ¸Þ 8'cI°Êg2œÄO9Ôàd0<‡CA§ä:#Ü¹”)#d¡µîÃ ŒÀ©),zn™¥LÓŠÖ®ém&êÜ0¸NÄ.„A%Â\noÒ7ðd\r«‹’”ÂŒC8¡”h…*ôš¨ªhéZ¨]9kcFhÉ0¦:î2¢FHÈ1s ©SŒÑ¯*in‚²hÙÉ‰9!©ôL«.™Hµ—hé¡\rË,	Á°²dÄ¦«šë3H¡(¤J’XãD’ÂØí4ÆNì()|Œ’‰€¿F³Úí†‰¦Ð¹t™ÒŠ#Œšë\nÇ1Pqsåšã,îJšSæ„\në³î\rHhR±Ìæ»ÉÔ‚„-rOB°Í»Ñ,;´¨×\$ý-ÊhÊ¾¬§ðúÀØ­:ï+¸hÉ<æ%¶ŠPÀ‘éQd RRÏ\$šZ±&š³QÛŽC  VÉ‹„Á-”³M0äi7÷DqEÂ19 L&K<eÒ÷ªØÝàÈÕ¡K]®­xº!(ÈÔ§I¨“eÝ/•äøÖ\\ÃÑ¥íKHe\"bŸ)d2š\\#\$‚]t¶}\\#7Õ à£7}\nGcU¢UZ³…¬\\’à®‡Dg„£9IkIÈÉ6¦©î}JÝ,õ¥Æõ-tXZ°Œ:ƒcç\0½È¸Æ0Ñ@¢&%Ic­­¤Úš)ÙÃ±T¡J\rFãK4†âRÌ#µ5bI+¥à¤\\š¦AÐ„Õ|b˜G7…e²ªTà6eƒñ½\\u€44æ:ëŽEÚÀ÷<iaø*}0Õ+(^–ö=Ã|Ã+iU:F'ÆÊ)Œ•®¡k:ºd×Fm²ZÜ»6;ä:¾\\pxˆo¦ª™½üå\rƒ ä;®øÂ oÁ˜6\"°Ê\\È	¥L@(*óÎ\\\0yÔ70êÃña™¼\0ØÃ:+`°ù‡(\$C8aE`‚²ÀÚŠÃ©úÌ—3¦†™œG*))ª¢¬Â˜RÏ™}¦\\J—9‡aŒ<ç˜rÖXƒ%Hð¯B³Q›deqé,ØŠ‰ˆy7KÀÏ¯\"\nÙÁypå=‡~P\\‰LDÂà•FRlWÅÔ\$*d\r“á|¼#ñÇ]Ë1.èÈºÐƒ(á40‡3ôDaÜ7‡&NCÀp\r0\0002DpxO\0Àô€è€s@¼‡y\\ƒd…á¸2‡ ]%C8/¡º]ƒõCHo—€‰½‡#à% _@N\0005‚ |Chp=Á¶]‡@xÃ>-çÊjÀÞÉÏ  ‚¬òèz%¬–¸: DòPc›ËJKÒ—d¿Ê\"£*\"8h¹Ã\r’V0)Ì;bªtú0ÄÄëÇâÿ\rÒ/ý2‡;!DÉ}‘¥¸pPÐÚ&lnéç\0P\\!­;Q,ç(T© \\ª&S¬…BCÕqáâÌ)±‘œ…°Jš•\$¦q4XÂ#ûÂ{ÓÂ¥CÚ`á[lýa(™Ê¹67T£‰‡D“ÈæPÂÂl¢ó1h\n2ˆ´ÜzëZSl£„’,Nð ¥“žiÎåÜà?§Ê\0ê|g8fA¼6‚\0ƒ, 4?’ì8?^{’'Âwª,¯š“Q¥Ö\\ãbî’ÄSò@'…0¨VóÍ6U‘}Y{-ZÝ©S–]5¥¥ê4m\nœ}Ë}Ù:v…	ŠÈªâµÃ¯O‰jµT\$ª«òsQX#F)§Ø.7—A^ñÃ1\r6¿ÊâßÃtšA¾X‚	@ƒHgMÁ‚\0Ì{O!ì”*Ì™8iš2VsÎkÝ`ì-xGŽ[.\"}åUiõI !êBS—Æ{(Ü¢7l§šK—¶Æª@Œ,ÄZùÃK¡Ì\"U~FÖãcÁ5…jPŒRó\nk•¸èBå ‚2ŸÕjÀcmµ¹VéŒ@PD¡˜0·‰Îƒl¯ädMržÅˆy·rôgÙçÄT-% ©ÄòÖ§ÁYÁç­bÐü²û¬(Žp[‘šÌp-z°ZÊHÙ2Zá­Ýª¥Ím¤eì*úd#ÅA4(°’’dø}…j)Zø‰cäŸtÁìîAsÎXÊñÒF§,qF‹>Ž%š½Ï—Y¤bH5tQÄZ±\0(±Éf\0u6Ê£	@ÑZ.¦õ†.	&A’TÏOáÁÖûh	æ5‡XQ7Çk‹Ì#GXvªx`º>z®ú„Z(\r!è2€ ‡a„1Ü¡L2žàÆ~ƒ&n[ÙÄè±êV„NÎÏ4æ'Ðð´Û8z©±\"ên6ù ÉFê+ç†õÉñ;MÀ;L¡š£8©|U‰êÚ¤ç(¦!«eëº¦.¬*29Ï—5”\$Îç,ôú3ðCã|¦ÑZ)hãœ§+ºÅlSyÁEË•¤)å¿¾É9',D~\$œëGµS•ÐDŒ¦ø ñ‰©®™´Ldâ5­`*àFv÷š:¿A¶ÝÑ5¥r¥_^Ò–SUžïiÊŸ!P*†~–¡¤øÞh\0yC}w>ÁÂþY:¹­£_’‘0Ê‡¹Y`/1¬²®ª\"@Ì¡X„ÏÐyÕˆFD¹-òÄš¨0þtWJø½TnØàvÚ[Ù‹†dq”Fà4=K‡ÔÖÖraìw³b¬%Í¼¦YåZX¸÷ßÕ8ˆÈ³ùÊ:ü·VêãÿÏ÷Zr8ºTMnfNÆÑå­EÜU)©`Ââ<£þ/«ðÿybþ>Ø^‘×¾ÁH÷ÏìøJ[¤öÿG¢ÿ‚ò‹C¯\0}\0Orþð\nQò£¢ÙJ(Nâƒ«.ÍÂFtä	‹ô¿Ëâ0ú‚B%æ\n ÂXvá¢'\"ö'n;\"†û/P%°X&\"XòpbN /æÜŽn(¯Ša„xa-üA…àÌï²áA MðfN\"áI;D—‚	íbø'-DÄ|°\no Â ví>F­Œ)£TTmb.¤¤*G&KO#\r¥~Iã8Š¬\\çªÄ…ðÚe¼D'0ïÂ0,·Ov0\"R&,á	BçÏÈBl¬¢Nup—\"ªí‚ØSöÂ‘*m¤üÛË,gÇŽ*‚úNQÑFáJ[¦Ã¯ºäÐîcQ_î–'í:Ò,aìP&LTÆ'ÍÇÒâ¥Xðr'ÃŸÊ2‹Ää)ðâU\$Jæm¤5n\$ªéðJ1®[‘²*-ÂcÌ^ÄÄêF1|­ZË\$,jt%”â\"â…öŽ.ù¡e\0û±àâb˜áìšžnò`PCÙ€RÅÑ„Æ\n¨[CVS¦·©ífÜÐbBÃñ˜Ï’Ó%Á\"1d‹d<¦Fw±E!…û#R!‘S­ìúÏ\r#rP[±èù’FXÃÇîFÓ^·§âËÒ&Þqîm\0S\r wÇpß¨Ðx²dûÏå&¨!2r[QQ\0Â¨%‘†SVì.Nâ°„\"O'RªSfûñD÷á#,°++~B®Àa²¼\$Á#¬ú28RQfö²Búr×\"RÚ8ïo\r\"K+‹¢ëæ–Q’òK²Ï)ð<ÀÎ\\b.bÁa/1T*¼!ÈþP:)³*Ÿiû3¼ö³6³:Àó>¶¥}4S/%\r¯'8ár\0,F¢>žhúì’@Uäh£Î2D ëÇÌPÉ!çœEÞCÍ³fµ®fO³Ù #Y7\"ØN‚\".Xã1²nõ9®Pª4{ÀRéå;\"Â`îsLŠ2P5Ždæ‘®;SšJpÃ:	ø0’c'Ð7p u2øGEKh˜åŠ¬RSlc®\0Ø Årb©3\rþà.Bq‰B³3\"²úÃ4!Cr-C±c/RTÐ(†ºat5BTK!rlí…Xr´Or)C”WFfÃF³BÒCÅG«µFÒª¢H|laGtâðaI4ˆÈg'ÅJ	ïJLPªT@Ra¡ó<Î\$\$6àBÄÖ+ZR#X÷O²²ïæÂ\$F0DÎRâ;RºA(1W&´@Ó\r.qu#´/(lDÔûNÒcbï6R.âÍ¶cÌ ÆxÔ#°l®K@®ëNnÅ+Æ:ít©QÎÎgµ'E’s.	.B`eÅ&ã^óü~B¨*Ñ’A„g ¨f!;¢äb¤Êº„N1Ð‘YTS(å™Vm±MècåýWJ^¡DgWâYÏVõ˜§5žèƒ¡Wò÷²kIµ&õÂu­•œzU{WõD|µÇ\0¬?WZuwZ¶ln)¡Cô&ÕTvþQ_8¥.uÀÂæ0»Q•Jné`õðæÅn/r!s1X2+4äüæâð-IBö-aÎc6%6Ry–	H.|ôJ‹d]vc#eb\0CÊgHt¯FF”¦Õ®ZJ]btr*/bßåœJŠoW5å,Ž—[­gî†¥Âe\\Ö‹bt“QBæ³'sÔEO•L+—-Éç@Ñ0+pÂHrÿ”ÔÖo¶÷IkMG/ÔŽø´ÖLïÁmS	RMF\$Ýj“lï_\$6é+iÞZæÉ´täGE£–ü¦Šü-ãâÚ!¡l±S4µ½–èüfIo&7iÐž²Âü‚gsRõr’h¡×?1oÌgô\r€W5¢šTdÕeŠ°lˆHŸªíˆ¦¢w8äïz@Œ¾	Ä©\0Äœ«Â\n ¨ÀZ\0@—`Æ›äVöJ)ç²k\$Ñ\$W,óŠóÍü÷æ)zÓÏ9õ˜‹·¸çè¾úwÂÛ±jÑ‡qB!t ëgµ aeœNðúŸÄ¦\"W±qíÂ	·¤Àó>óÉRHæN)S÷g%a`·|L\nªiÔ;Iéo®P‘¤0eÖÒÃéBÙ6àAYGU¤T¹@N\\•Þ*aÃ\0˜¼ŠæE€†«Ê\r©*<ƒð@šO1Øò¸¥ý^ñŒc…Fê \$°úsIÿ‰‰S¢8ØkŠI¸¦Ô(²rBîÓ—5í\rŠT‹Ø—*¨éb”'Œ ¨o\n<#ÇxÀÊ±€Þ\0é­Èñí»‰8ÐŽ¶×N”HÛeª.åzI\r@9žÇÙËA3m­'§œ\\ËnY%N4n EÂn .ç*jŠ‘……DI‘àÒÉ-ÆñÀ@\nÏà\nÀÂ`ê Û’Ã4»FÒ&WÝq hQ˜Çp^%ÔÞ´ökŒÏlñ\r4Hpø^,ÀÎLºv°üÌ'_Tæ†Ní,åM\$Ù*ÔÖdÍ6ÁKØÅ‚¢h\0?#È‚U•˜öØ¹eZ•Ü¡6i•x¨•Ô|96iqÈ4ò5”Oß‹\r¸QáNA )!9¡„\n ";break;case"sk":$g="N0›ÏFPü%ÌÂ˜(¦Ã]ç(a„@n2œ\ræC	ÈÒl7ÅÌ&ƒ‘…Š¥‰¦Á¤ÚÃP›\rÑhÑØÞl2›¦±•ˆ¾5›ÎrxdB\$r:ˆ\rFQ\0”æB”Ãâ18¹”Ë-9´¹H€0Œ†cA¨Øn8‚Ž)èÉDÍ&sLêb\nb¯M&}0èa1gæ³Ì¤«k02pQZ@Å_bÔ·‹Õò0 _0’’É¾’hÄÓ\rÒY§83™Nb¤„êpŽ/ÆƒN®þbœa±ùaWw’M\ræ¹+o;I”³ÁCv˜ÍìMÔÎ\nßò±ÛDb#Ì&Æ*…†­¦0•ì<šñ§“—P9P¼æÙçÐÊ96JPÊ·©#Ð@ Ã4Œ£Zš9ª*2¨«¶ªÒ¸ì2;’Ù'ã˜Öa•-`ò8 QˆF<ã˜Ø0B\"`­?ˆ³Œ0¡¢Ê“½ƒÊKª`9.œÆã(Þ6Œ££2ô I˜ÛŠcÊ³\r¨sþžŽ@P ÏC%l6ŸÀPÕ\$hÂÛ­±cð4b`9¸œX*NLÝ´³lÞœÁ˜á¹A\0ÉÅ‚ÐÞú½ŽË%£Xèˆ)L78ÐÐŸ¯””ø¢6ì€:Bs£MØ×£ @1 ƒ TÕuhóWÕU`ÔÖŽÓõ\0ÆÃ¨Ü5Œsè‚3ŽC(Îè¯o._/ŽP5ŒhÞŸ§¯•\r%Aƒ#\$J´8.b\\4Ž‘iˆ]2;X«×\0Pƒ`Y5èØ65Œp†cÜ‡\n\"`@µ¼õ8õw­h@\$Á6-'rã¢l1ƒ«¾É½TÛ–Ø°mA-TœâéJ•\0¬<áË’ˆ9äHÛP\nyK×ALøÉB=D¢~\0PŽÈÅ)	#j5\0B(ñŸÜ¹Kˆ9tëPcÒ‡eÑ`í×l˜Ù%Lê’Ž©ƒxÌ3\r‹¨Ê”‰ã\$ôPÎ`¨7¤/XÜ<„ðæ:ŒqÐæ9ŒØ@.ƒpæ5ƒ–à0Œã\nêpõ€Úºà£(P9…)HœŒÅc¢t^µŽrb˜¤#ÁÊí&7\"˜3\"y\\ÜP¢ƒÓFäì›7V9ÏŠbÖ2ŒC,ÚŽ×úäÍª‹U8\rãsúµ¼¯ÃÀO=œ9_ïÈæý„s0¥)Z²ÿßñ æ;¢uR®8\r6(ÉÐ‡ˆ²H2ŒÁèD4ƒ à9‡Ax^;ÿrùÅ£\\DÃ8/'0<&ü^(/KÔ9èû‚ù¸_A¬æz	Ã€¼0ƒä@t\rmÌÂ\0ÂÊbä_çý·èð›¼xÎÝI“¤BÊÓAä¢RnNQ)/%ì¾™‚yO:ÅRˆì' Ä –ñ¯†À€í™b˜ˆÐdgï]Ë(Œ¢@­‰Gœ‚œäU”LñMæ£G®°Ja#ˆ\\!w¢ƒOÉÆˆ`õ’Ò^L[{¾AÑßbqCC¾MÂµÐ…£ /T[¶zOP§’BÃÉžPA¥U9írª„FÔÌPâMT„ÇäþÈÿä\"saŒ;CXm\rXpp-ÁZØO)<L}…\0žÂ¢‚P’5IžWM2…	8\$à‰=Y\$A#-ì4¤ €Ì\\Ã©Å¡”5IµŠ£Óp’­fM/—ŒkÉ|8*¬¹‚\0¦¿Aß^æ(‹`¨¡qø‰ÈHU*Ò9Jçü”„0êÔN\rdüˆG¢ÔDÎAv91,ðœ¨P*Z;GÂ E	’ªÚr`t\\áÁ|ÒægL%Ñ%„\$”DF¹—A@EYi‹èv‹_`abR;J€Ò<.GòöN(Âxã½5JøˆHF±jÓs'K¡‹“u@èÔAŒraÍ›³’,ÓSI)ŒÅ§36àD› #ed¶\nuOibõÑ6Žpyf	¡™ªëƒ	ü-a½»Šµ\rQ/êä+ú\"EŠp:ƒèé\0‘@Ì`<Ñ‰Ú ú¨Ùå\0Ãsœ7Ú\"GC¯[ilü³’aFÓèT0\nxÂàÒ‘ØCHáÁÆ¥bpÍd£¡’¾)Z£S–Dà4%G°–ƒzËS7À˜4Xéº”1€¦´CÂ%b·\\å—[á|ƒ!ù\r@(! Â~¦¯¥T#…1Ððõ(˜¾¢¢6ž‘àÎj\\P+cŸôµÔ.rõè20#lŠÉ¯AÔ¢ù{eD¡TŽKPèQj„°Ì=J¥Ì—“:`E”*†§?è0ÕµÂ.ÃHa¯hˆ††ƒèwb¹Uò¼¬Èd8jÐÌDC	—2ÉAW'á€žÈîîaôw¬ÿ/W^ª“e5U`vf“p	Ì‚µfwu³[¿Ã¥&¼œâNb!VÚÈ\$üóžóë·ÍßfMÉÑ#:=RÚ“ŽDB2±€gÃàHê_H0”Ç\\Ô|^*ú¶Zw-e,ó«´3SÕQMXkSá­ôÆ©Ö:s^°ÓÙ¨Ožª1‹‰ÅÈCòÈi\0\$š¬¦=2¦¤v•}:ú'mbL\"\\O‡ÒÀ(jOû,BDP§j€îîE	v› ë˜VSŽë=(ÒÍ©R<‘þIŠ\"ˆ”@Ò«8N¨á!\nŒ1f’ÙÆB«lÃ’SQ±åI%ð*htMÎèy=d»”·Ç•_ 8*8:ž;	‡&Ó¤0îÚðwMÜ@\$¦ò\\N>ŠðåÕ¯Üëž\\;ÍÊzš¯üîžôj…Ò9Gè”Ùn»Ö”P)7èx7áñztˆÝ)“jO\"P¤@–ŒÀ9qeL]5´Cb%	Ô½Þ‘¾Þ\0H#}–÷J¯]É¾†éZ'ž\"7ßƒÃ,½7¬1ÆPÈ¹ù )ê–Z¹ØÂÔ:\nJºÝOÊ³//Íãº“æ3Î×_?ÊšŸRä©›Ësò-àý[FÆ…¸XÖ¡wYW®ó5÷¥•£æ=Kêl·Ü2ÿAì9ŽûË8üb….‰/˜ ,»føíòÆ‹ÓöGGŸ”uóþÇ1<ƒêôœµæuûz;=}ìSô=×Óü„Ãë\r_úü‰ûYÞÈìŠ¢¢t8Î÷o6rêÀÐÁP°\nû\0Z@ð\0Œàø\"&bRKò\ràÔTdB\"Èà'ð@¦*fGH@¨r„Âˆ·¢fCç06%Fs\0èDg\0&eUa}gËÔ_0z‡È‡oh}‚êæ0¾Â®žb6`N`D%š\",‡ö(+'®\$ð\"Àð&Á,¿‹ým¶^«Ê¨L\0·b<Àc–+*f½‹À¼EjúïÐ¶Ne\n¯o4èp\rå1-^õPèÆfLíkÃ£°Å¢„(AxêlX<q9on™ékOPd„õn*:¢ˆ¡ñ (c&öQn1MöâDÎ8jžx¤½ –\$Á|Poò¼ Aô'P& nÀClNûå ÷Q\0ï’ù±€þ¥ŽLýÏÀ÷P0Œn˜¾c€o%~X+cÈ{… dQ5±¨^¸°ñ²ùÑ¶¦Àì\$¥pÖpj¬\rbzA0«k©/{±ÞX1± xQÜ'1ñ-7¢ÖA±î\r1Âör±àT\n|ïqr\0±ŸKÀéCqiE„è.l!\".„ÿxÁÒFÎ Á²D{/R1E9%-’<ÂŒ DÁF‘#îÆÄ4Ç\"\$‘é#¶¤ºKò‡%Pæ®e)o)A}\"Òa`´\$bL0ŸïÞ§„¶Å·*ä>feœÕÆã	ÆÃe`²fìØ\nòQ§‹+·-oÜc\n-\\5ÒÐh½.ŒPm	b@uåœVt\r‚‚J «-·-nf2\$éB90&s/€Ð¡¤”\r€V\rfÂ\re(@\"f‘CÎ8Â‚p\"k¶:Dt@25LF#â˜‡	w/¤\0¨ÀZ¬A\"6:ÍZŽÂ\\hÓ­Ïðð*8Š7.oÔÿÙ/3– °‘/³žÑ­ç¦–\"¢ª‹\":#çxjZNC	³~ÄJ\nÈÀ¢FD£^âÐÐŠå&)#dVâBì†n5*	Ÿ	¬Í=ñ<%4÷…N¢äT@g.@˜\râø:ÔA…T\r°2±dY0íf‘ôËCå;Nžô¦fâÝ´8]O@vêÄ`¯“Do\0¯.¸OèÅ	î‹´HåQ‡TR^ÃT›#BUb¬xÀÞ^qk|î›FGwÐá= ó\n)¤êÎ,c¤§ª~³£) h©‡K”ñ#¨¨¦qiRë ¤ËÄJ%cd3&ÃH`@\nÄã,\n¤ªfÔ‚åÎªYÀ‚&nãO#\ndIM09#fÓà1†GDß>*Ä«ªÊðéÉBLD£ð«jÆ1Š¡EËzYÀ†X¬r„ÔÒ/tÖ@byMñíÅ’\nV_`¬¦%ô9æFb	\0@š	 t\n`¦";break;case"sl":$g="S:D‘–ib#L&ãHü%ÌÂ˜(6›à¦Ñ¸Âl7±WÆ“¡¤@d0\rðY”]0šŽÆXI¨Â ™›\r&³yÌé'”ÊÌ²Ñª%9¥äJ²nnÌSé‰†^ #!˜Ðj6Ž ¨!„ôn7‚£F“9¦<l‹IŽ†”Ù/*ÁL†QZ¨v¾¤Çc”øÒc—–MçQ Ã3Ž›àg#N\0Øe3™Nb	P€êp”@s†ƒNnæbËËÊfƒ”.ù«ÖÃèé†Pl5MBÖz67Q ¢ž>Ügâk5Û3tâÿr¡ÏD“Ñ‹(ÅPß	FSÔìU8F®—ÂÊzi6‹3ÞiŠI2Ôósy’Oõ”ÏÂ\nE.š¡¾Ššæ›/bè†;Zä4ŽáŠP ,°Â)ƒ êŽ6ˆHÂŠ°Nè!-Ãä†Bj\n‘D‚8Ê7£(è9!1 ¦î#Ãk^Ò .—È`ÖïÀÃP§œZECšA¬Ð›Ê4¦Ì(2B£Z5#Ìœ ÇÂn¢êÊ oÀè–B€Þ5Œ)L=íhÈ1-\"š2Å­“Â3²ã#‰9Î«’è»-\"pÞýÎc\$Z:!ï°Ä˜Ž€HKEQƒ\rH\rI-&Qt­éº£+(Ã¨Ü5Œr„¨-ƒë5B.›°„¯ƒZŒ9'‰Óˆ\$²ºÈÛ&#z*	BI	ˆƒxÙ5K)b©\n®P£`ØÎ.Œº(1¡nüÐÞŠbˆ˜â(ÈÉf­\ng_ŽÈ]žú àPæåFSãâ“QcÔãy6W|è´Š©õÓ0_HË“:&÷¬¨ò¸Ã¨*ŽÃ|<êa°õú:_óòë%Þ°›W‚CM;O‘xÅ1‘¢3ÉÒ —‰ã\$¢“r ¨7²Cj<³Ãpæ:ŒxPæ9ŒÖˆ@-¹ÓÕçæÚ6”xA\rÃªaJ^‹§2‹âÎLúØ†)ŠB0\\LÎÃp÷„246Ú1@ì>Z:%ò|¢›Ž£˜à2»óUf¦ê4Â–\rŠ¶Èóo@Þõ<+@íræ2Ö^€¥âl6€ŽH69ŽèÓì2jõ±‡‰»X2ŒÁèD4ƒ à9‡Ax^;ösm¨SÁr43…ïz< 9ÐÒ7ÁxEjLÈéÕíB5„Að’6Ž¼ê:xÂ?ŒÝ4>ºæž0¨‰\"OfÊ€ÝºL·cÄÞ&ùŒµ´ÂH“EƒxÏ_¯Š¬‡È)½‰ˆýb¤Öß	á„’†ƒîhOÓðl (\0PRI\$Ée†›€ÞÕÃ+Y1å@É°’\\L	‘4®ì!ÒH¼(Ä2p@œsf\$ˆøÁ÷yÈËŒPp©FpæKÂI&,“†“ìZ	û1\rÇØ:C6ACˆu3Dü3b8T1nSÆ­†2@äb©¥sFeºRrNÌ”\n?*	\0žÂ£cO¤5ˆŠÛÅ.†É1ÇB>I\nç!JTãž„`‘ýdq1lÓ>H\r° `¥°-Ð˜Úay0Ü#H*BÏ±è=„ýóEÔX”Ã‘3D¼*¢LÍÀuV\0(ê†“b³È:agàÔ,àêYÖ4«ªc½2O–0p[M¹£Z¡ÍjUAˆQc,„&I\n='¤•f`Â´Iúé\r‘h´X|K˜r›„ ÝÈäòpLÂN#oÙ?¹äyX k6P¸2Ò|lL!.ÉE,±’^‹4Ï2AèÇ‡(xÊÔâ_^…™~/äEÔ’^©Å.&Ùò›NDlø¶pì™êJYOÒl÷AÓÝ2eÉ@8 Mè¤‚¥!2™D£\rÎi<”æ¢ðæLÓP\nGº_³\$þeÎ#J\r¤•™—d=ª*‡šÅ„oÄ40Fêþ“É|\n•] ØÞÃÓŠgD×¯‚L[—kf*q†Ï ‡ÃR{¥ˆ‘bÏC8n¸7\$&ÅN^‹å&\$P‚Y`Ø“+è!sÁ¡–ä~uö€3 ”¡0ŒÚÉKíšÁMÇö-ªf‚ñ‰±SÖx’;Ba*@‚Â@ ‹*x4™©4ALŒQ3ò¬2†F®Cƒä&ê7±âf›ËãNåa§C¶½æ\$ª–ô˜[Öomç}·zê¨´¦QHyomôÉ_@ÈáOSz±pÍÀ”sízŒ9V)šÿ_g\"à¯Ó|+–ÿ`9€×™.góÞãAv»¡êïàèq~[ÖÂ˜’êálŒ3¢Xpœaæˆpf,MïÇ™ìS\rž:ÅËâ†˜à¯.6jä˜:­¸éPpl;øÿ	™,@‰ànCN‚—íûÊ¸kY‰–É3NËØè÷bÃŠ²¶VËœ…-lÕˆñ).9¿ e|Í–³©’Îø6\$c¢ø°Q±?<ÁÝû,P	Q,P\$}¥S- Pƒ]ø}¿µ~Z	y½ íñÜ\$(ÓAµ³†\\:9¨ÑA;1•³QrLhtÅ.iH©[³nS:i\$dQp™\"=¯Õ=·Ph…ö«‚){'ä|¸P‹´Ó™AÌ…ÆÛª¡ôÑá˜pbŸ½µÃ¡HÓAØ¿Ô‰i]4Õ0”]ÿ×6/p¾0Ÿ\rù*ï!Gƒ–‰TÓ—d¨Þ%E2¡éJ\"ôZ6zf5¡éq“¤ÂûxŸ\$„Îj\$\rÅ·¦|>q—À“^ì0ÊÙyËDs,Ü8•Ú¼Aj	7I0;¡Ù&T¼¨°¾Ô=&î\nz!êéß”CŸb†(ˆ¸=ß½:õ{GÔÅ`lÛxÑ]èj«o\\ßý?€ô>·ÔùfüLÒà„ÒøÉÔ•ÓG¹iî\"TÞÃ^í;ã\$Þ|Ü0IÍp]Òawr‡Þ°ÂùÃ}öõâ\0à;—ƒ…þ7÷¾±‘ÐXvóç¯ BûŸ“îÞWÃïžª¼ò>Æ·žZY%.„o]Þ}7zÓwëÈNšê˜Çs%_].}Ïc_ðÏBØSdm)¸ñSD2†6žûúA%6f0Ál‰(pla=_¤ý	½€::«ä¥Œ†¦Š¥ÆÐ©Bm÷Ïj2D3)ãâŒdDÄûÛüKùBnà§\n±Mô³#ð7i ®ïš}¤ðº¯tí*ßãìçî¼ö&O-4o.ÈøŒ¦ìó‹l>¢†öN‚÷¥Š¶ðJpOvßb–PHÓ/„êz¥p>ðTGî®L*¤%~%‰ÚÓŠòÝ‡È`ê&|ü\rc\råà<‰Æôd N€¢êÞ¶pV™ð\$¶O\r\nl}°j¯ÆÒTEHJî±oótàLh%FT¯åë|ônð/£ZËo°›df\rbf\rÅ±Î¾8‚‡¦n\0ê0÷Œ{±O…ócâmt·Æc‘\"- ¨åð,öo{ áÐÀö°O£8›pvA`à²¤Ô³âvÓCê êeJV³Ä}/5K;qknËPÄÀQh;ÑNÂñ‚Gáˆ„7kHb¢‘aÑ˜=±œôÏyCÁ±[<¬Âx/cb-\$Í\rI¸ƒ¢øe ìá„mm\0ô>Ë:gÌBÑÚK\"¨Ë£ÌgÎþÎƒ–˜qð¥4ñÑèCHhÓLÕ#4Pb^îˆ—Âb8˜»#vQñØCKÏNðOTP¥Ä21çâñqà/EÁR>ßnU\r¾EÏ\$ìŠõ2TÝ\0^\r€Ví2ƒŽH'È\$£~¦B^ÉBið8S6€ª\n€Œ p./`Üâða­é Ï8½lÁ*hfDõoÍÒ´>,fñƒÏFœ/Q*Ò¼0è@ùâ6È#¬%&,àÄJ> ÒÀò@¤.ÀÃ\0æ¶²|º«xH&Ñ0%œãÈ†ÞP¨~\$ø-Ó3Žº® \$£TEå²¬ÀÈ8\$&	€Þ6ÃŽS8“'è CBBfZn&µ…ÞÎóB(\rd®Ê15…­ÄøŸŒdÝæ.ÆbxtKG7S[ÐªöˆNÞÃ.3c2ê\0à\$¤lá‹¬ß³v9„ÃŽLUçúú£ó1¨ÞàÑÎ¦‚t'’xˆ<Há'Ä°Dœ€ˆè³© +\0¬ÆÄJ%+˜ó \0¬¹ î/²ú¤.@Ÿ9¥„;¥t\"ÞcÒ±*\0–P ,£\"b2 l C\$åTn²^ÊŠ \$HÓ|± † ³ì|g0\r3ñ\0³û1\"adF;Ãö%\r\\4gixž€";break;case"sr":$g="ÐJ4‚í ¸4P-Ak	@ÁÚ6Š\r¢€h/`ãðP”\\33`¦‚†h¦¡ÐE¤¢¾†Cš©\\fÑLJâ°¦‚þe_¤‰ÙDåeh¦àRÆ‚ù ·hQæ	™”jQŸÍÐñ*µ1a1˜CV³9Ôæ%9¨P	u6ccšUãPùíº/œAèBÀPÀb2£a¸às\$_ÅàTù²úI0Œ.\"uÌZîH‘™-á0ÕƒAcYXZç5åV\$Q´4«YŒiq—ÌÂc9m:¡MçQ Âv2ˆ\rÆñÀäi;M†S9”æ :q§!„éÁ:\r<ó¡„ÅËµÉ«èx­b¾˜’xš>Dšq„M«÷|];Ù´RT‰RÔ)·ãHÜ3½)CØ÷‚öµmjˆ\$í¢¥?ÆƒFÏ1EÁ¢D4æ„8±ª‘t’%L‚nú5æ8¦¤ì‘x‚&‘45-èJÌh%¬éz‚)Å¢«!I‹:Û¬ˆÐµ *úð±H¨\"ŽÖh\"|˜>‰‚r\\-q,2ž5ÏZÈû¡¬”¦¬E\$‹+\$’JòÅðz¢Å,mZHQ&EÔ‚A6”€Œ#LtU8²’i’RÚrX\$ŠTf·À´|˜^@­b1'¢ñ\"ÜÈËŠÒÈ_>\rRFÅ‘\nl¸¶ê «ÌqÌ…\"¤„ýúÐfDÅ<ï”¥YÈu¬.Î³ô´ÝV­©¤+Y22-Îè»Ë;Q(±\0ŠµZøÌeœ#Z­œqf3Œòj\n#l¥Îõ¥PŒˆ#>ó¡€MÙw(²åvÜW‚^ó\$•ýÅaE%#ÊNÄ2n³@¬ììö±*¢¾þÖ3„ÖŒ3¶Õq2J	m%¶=6¤?o;º³µq0Â”%p›CX6.J<´õtI“³é‹’	™£ƒCT\\;[Òî(”¦±DŸ Íb¹³l]ƒ¿âˆ™E,uoç	Ú^§²Þ†DHIÃ˜ªPÈž<o+o±­7]êz+)E•uÃTm»{ïµW!I´°Ö‡Ãi‘yr2—|±‹¥‰%1{Â§*\n–¡¶«¥úÆrÅº†Å±8¤É¦Ø’n5^é­¸UkÄÎ5«%Ußû0Ø:MËv#“‚7ŒÃ0Ù«Y=/5í*\rî Ú0ÃÈ@:Ã˜ê1Œnpæ3£`@6\rã<9…Ž€åé#8Ãeæ6ÀC«®aJÖ¢,r%(Aâ¦‚3TG ¸‚,‚ì¶Öº5.¥9>¹’!-m¸ˆ“ãX‡\nëuy'˜µ²\n@Éá¬\",õtcàºK'•®©Å™¬!uf5Ì” šC™×G0îÃ’í¡à8—|  <&õß`zƒ@tÀ9ƒ ^Ã¼YÁ„2?\0ÜC.ˆœ†PÝCÁ×z¡¤7ÆpDtéÍ‘</÷ Á>	!´8°Ûƒ <á„Ð#ùÙ\rë´èÈ€ÂÎi‡0<ø¾ƒ¡kEh™ÈE‹¡QÄÅlA¥¦‡YuP„žBAjZÌÂ )Ž±È:æ.Q%sX#(ñC1hb”WCB\0%›XUåÅ°rjmVk1bõû“'ô„æz¥s(DµÀgbWÛâ;/%Ñ«3¨F¨Œé5Ë¹3žõ¾åÈÑ*….ÌH<ˆEH°ƒ\"äVâú%i’B]Ød\r+´áÉ0ç¤aÚ9îø8‡S\$Ã0r\rá´ºñ!ÙÙŒÀ€1¾\nt(”<9³u@\$ôZ—æ(O\naR_:Òg>¤Ú¸Hå5fˆ†‹5–¤ÍPÏØf¦\nU.‚É·§Ôï\0ˆÈÑ‚JPÓ¦x‹bßpIÖRP	Êº7è=8úâã¼ˆ4†p@Ú Ç(àœ˜–‚¤Èz´4ÇÈ\$ä•r£Tr‡‡#OKši¹;	’vVßÊ,®¦£\$ÚØ€O	À€*…\0ˆB E\0¢‘)ú§ÍR<'”º`žâT,H\n³@€\"P˜m\r£´¬d‰4dÚ,RÙaä\nØ®S©…•P(Ù\n”ETD®K\$ej!\\'2\$/ÓK12Œ]ã˜–y8ÀPD¡˜0½Ù&ƒl¢ÊjOÏFÂ Ku(¨A¤­÷øŠDûU)Ff•u´‰˜õíC7öd´“PY.Y®såÚU{]K‹qó.|ª–ä&ª„,Aª¡påÂ¹†ˆÆ:VJä¹Ø9ÑÃJ™‡\\`·np.e7ujI‰ö\raJìŒ\r•¬½µDªYuFI[\nÑ!DtçÐˆ^H:«ðÌÒ“6Üæ4ÈøÕ&Î:¾Äar´>äDº›”‹A\$Ö¬™3+è¬­Ð%A[4â²‚˜iA”:6–|\na”å†3®ÞKhq»	Ñ3et'‚¶PùMÙA.¶&…W°“ÀÅ|M˜ìæC­¹o-uBFµ6Èè]²ß )‰¸™[¤Ékßh{Ök¢lêÇaš’üÊ+h¥ÉÌ¤‹	¡’UÚý[S¢sir«_¤óä± ßÑ5>O@P5£(…v+?Eßn¢YãŸ3®‡1@+‚Ë… \n!„€AEc\0i9Îñß ßCŽ˜p¯á–\$2£ó*F<»Uh‘ÕÚÁ6ZÑ{ñ4\$,8«o\\ì\\ÔðÄlNˆ´)`¦áäß)Ê«å^k[¸í.LÜôÀ%Ìqì¼Nù1¼š¦r‰éÊ—koÃxÍl–îc¥y§&â– ½©ÈùÙr«:pô-–Í¿MÆ—ÿqÏB›,\r¨œº¡7:®¥Éàý®!Å•Í*ÓyÁuçI÷žuB«Ìûiu¨£tîrá{§gç®¯3Û’pä=ËÀr_ÝºñAÑ=£F\0 ™_l\räŒ’Â¦ˆ]±nfªÕã—5DSªªç|Üˆk‡èiaN¸WÎá»÷“˜¥ñrÊ¤cžÚq2(Aa)r473:h)»ÐûÆtéÆ€—%…WŸlyi­ëUclK„,t2²±‘p˜‹*ý¾Y«'Jªð†f¤¼¤ê5l±\$û¸J<ÌËÝŸ\"{7ÿº„ÎÎA£úÒ¯î]Bïö6¬¹\0èÓO\\ëGfCBÿâ×%þ…P(14Ð ÎÂÇoöhd«f¯\0V¹IlTCX«£:R”ËŽM‰¬±j–©¢ì”…b¾PFXb›'YoÓ\nk	HP|J€BÍ@«ˆF\"g°>ëÄ°ºÄÄÔëìÔF.D­:WKH—ãÚfCä¸¢rNA 3žU‹ä¨oõ\0*ÿ¬uÚ¸ì%,4ëMØÁ`ÅÐ0ÂÎÌÂll„	Ìeb¬ìÞÃ1£H?@-m°1GÙÅèUN‰‘\$jÑ%Ïý\"×(Jh¥ñ&°±\nÒÉà\\ëð›Dˆ+®nZb,L#äêÎXÿnŠæîæ’r¯þîx«¢­\rJï‘:õ±“m¼fhVÎƒî7Î^ë£<+˜D`žKpìm3…×K\r}p³¯ï‘â×£ÖëQ&ítÄ‘DÊ²>ë¾*Š²hÌ&¬ªÙÌf3îö>/àõšLB|¦vÖ%tµ*òb…é!ð¼Õ)[¯\"8cñt\\&ŸoNW d©€-©JÜïÐÃÂ ¬Gñà>+±âHÖ5 ÆiM7\nQ'MlØË”«Èù%´¾¤|ÿqb5šŒ2r¡MÞGQi+\ri‘W‰ªÝm)&r¼6’’ÜH<pè1‘ÖÄR¬-‘¤+ò×‘eÒä2rè¾pK,1þÖd\$>0-BŠÝLXúÌ·0†Eâ`²	–Dœ@¤ˆÙ\"HúR`#duiT>¯ &&\$»«·+P/ÓA%u*P=.ñ4óERÀ[ÑY5¦óãî†gK¾dï ÔhXiÚÇçZFüpý/“p=¦	\"æ{8­³8ãÎúì|Öƒñ)¤Xç¢Újº»ŒvsI²ð—žî!9ófš³½5RŽóòñ7ÓÒŸ0ÍØW£â5ÓâÎ°»=QIò­;scòÅ0\nµ\"bz¾#XªfXp¤Àºí€Ù-…;óøxÍ‚Ùrí*ŽïA¢%B’û6T6³~>\"AÍ–\$‘.#2piyDD\r	¥\rÂ%Ö½ß>ÁuBÙ.\$µôiB³Ù.\$cFk{?ñ/á ®¡6pŠÛ“P*Ò“ \$ZØÆ*lâKK:hDñF0œqÚâ´«\"ì€èn=²KQKÙJÏ€æôÄ™Ï\"IE³\"YôÞî…ØÀôÆ=Vfâ±bkqÅL´òú²jH,aOÎŽ.nðè4ôÿ%™\0•4Ï\$gp\r€VÁƒ#3°BJœ.ó7\$³V½Á(@Œ®‰¨r­i\"\rË8\n€Œ pÌi@@Îí‘»+ôÔ –æN3ôÀŸëYŽWÃÍKƒM¬ Œª\"lf§ŽÎÄÔ[²VZ€›V`Ì-€%µ6C²¦e”dÄ)Hø\$@ÆnÍ[¡zÆeÏ±ŸSiIÒH1*ˆãßPPjZ­‡^ËR/\"` r%KÎJPÂ ¬’Ó0\\'NúÿÓæP4zív%vè”Zäb’4É_b,ï\nÔÂTHrrÎ°%bla²·d05bBP‰x11|p#ãvQ(†’AN¶\rÊbQÞ1s2ÆBXÄZC@HEpclJ5K³óGgÊlrKµ6)\$K„@«–3çXð1\r`.~ã`†èt\r+ÒÏN\0¬ß@î@¬ Æ ê\r´ «¶`ü&Øg\"¬¥ì plÁ:ïoâa£ìÚm&tB ÁO‘b¨E\\5šYÃÚ”16nUÖ¹o§cqdÂÀãKcãNg|:Ã‚yöÇl¬ö]£’¶×;¶bL“@%DÀ¸mµ:Ë…@äçB¢æ";break;case"ta":$g="àW* øiÀ¯FÁ\\Hd_†«•Ðô+ÁBQpÌÌ 9‚¢Ðt\\U„«¤êô@‚W¡à(<É\\±”@1	| @(:œ\r†ó	S.WA•èhtå]†R&Êùœñ\\µÌéÓI`ºD®JÉ\$Ôé:º®TÏ X’³`«*ªÉúrj1k€,êÕ…z@%9«Ò5|–Udƒß jä¦¸ˆ¯CˆÈf4†ãÍ~ùL›âg²Éù”Úp:E5ûe&­Ö@.•î¬£ƒËqu­¢»ƒW[•è¬\"¿+@ñm´î\0µ«,-ô­Ò»[Ü×‹&ó¨€Ða;Dãx€àr4&Ã)œÊs<´!„éâ:\r?¡„Äö8\nRl‰¬Êüž¬Î[zR.ì<›ªË\nú¤8N\"ÀÑ0íêä†AN¬*ÚÃ…q`½Ã	\no\0Ò7ð2k,îSD)Y¤,«:Ò„)\rkfä¸.b¬á:®C• ÁlJ¾ä”ÂNr\$ƒÂÅ¢¯‘)2¬ª0©\n¶Ëq\$&‚ í¹±*A\$€:S®·ºPz±Çik\0Ò¸Ü9#xÜ£ ÊU-¬P¼	J8“\r,suY©ËÔBæ¸Ú\"¨\"+I\\Š•Ô²#6Æî|\"Ü¢Êµ(„+är\0Ü7¨¼CUÄðRl·,ÊA\\«'\rí{E­H_*Ñ4èØ©ðP)ŽDXÕÒ\$B\0Tº2º&4\ršR¾BÕ\$žÏ.k{¡Îk=8ÞFá@Ž2ãhËfµN=ÂÞ®}Îß%t\\)Äý“YcÈæû¶‚®«Š±2§,5Í–2ŽOåƒSHr­OTÙe\n£ž!ƒVHýrC\nRR¥BÍ„Áä54BÆåhŽ5)Õ–¼1+%’\\à«I‘‘À•B¤I’qi)ôSGZ¸0‹m—·0¥‡oMór•3_5LCmDŠa¤RË«†Ô‚SÉúÒ\"¾X¬ÃW©JwK¹šŒPn)Ô”¼Úæû§¢5†‘.:ºõ_opÌ\\\\Ðm6È+¾Êá(ÉU¢òÜÂXÙ_°Æ[Pë2BmªmŠF®¦Õ‚0ê7c¤û=«üdÙU)ÝHP Œã8äö¾Ýžá&ÑýZ€auŠ(¦Î‘/KTwýK,ó‰~¯¦Ûš#äÊrûµnöš!pD1€Ä/²Æ6ÒfÒjóéEÊ^-¨u£¨Ø6>/óØcÜŠˆL)¿26dnJøpëO¾'ÎÛ²!Å­fšËèf/½º\$—Ø”ài¡q¥¾5õ\"ÙÞò@W®\r»BðS•ù±fô6ØTæ\\!Hqèa9´&â^ƒà`ïÑŸ+4ka2…	¸˜Cw>\\›¥.ÏÑ !&èÕ  î¨·½¨N¤RÖ4q]Ü6ç²©ÞSß\"I“ð’iÃxrŒB&ä‰cb_Èù~Á‘\\àaÕ‡qª¶”/	 ¹tkŒˆ³	ó¥‰eÉB—\"«Sw)¥2?\"ž¾CbÍGlî†~xfÁ±†S€gËÉoKe%@ÞyCkþ ×‡0êÃïa™û†ÑXs‡Ä9K°ÂÃ\n+IÎ†ÔVO¸(`¤¯0¦‚1H6fDD\$vôÝZø7¤Ò©„p¸S”lƒÎƒ¤èþècR&G«M9&”Íl¯L®;¨v\$a\ng)ÁÒ/e†N(u	‹°ÀÄ +…»X-­BrèŒ>W'<·ÀYä Arºžª¾|6×¦ÑHG~m­ïPCbšœ‡0ï\\¸eÀ4»ðÉJAàa;Îü3ÐD tÌð^êÀ.(³X71\0]C8/¡º±'šÆŸð/Oä9àéS‚ùÿÁ¬èÞP5c€ð†|_Ï‚î?!½ËŸ A.CYâ\r!Ðó1	sWCpt¢ÒzŒ¢ÎR\rAXŒ‘78Ð¢Q©d.h4¾fÌè'É( H>15Rü\n*zfìW&²ÐJÖƒS¨–€  …˜ƒvnš&åÊÆÓ“¢Œ«¤À[“¯:ÎÊÇ|²Éå–‹H[Ü›æ{l2å•+voá’;Qqä³ÎX Dgó[¥E¾AFäÛôS\rBÉXÕ}— \nº{›Óp¡áü&Ú/D¤µz—¥'¥7\r{º™:Ö ñ~Nä½^QKR0œŸƒæ¶÷-\\\0¬gúŒA\$‡“¸ irç’Æ1àÝaOÑðwáÄ:žûƒ’í2UÊv~k e\rcOqÀ@—–#Ò˜ùá\nÔ*!@'…0¨…rä5ö«,AŒ´ý…rEÓY÷:Œu'°.xz?âûb'á?`ÒÃ¨rx)ûTPÊìOHe·.;¬Cj¥'¡º^\"ˆåêPbÎà€)ÀAŸÙê©A*\\üåÃLpŽSOãÚHƒ DÆ‚@ºtÜÍømÈI”¬;å?`O	À€*…\0ˆB EZè@Š.ÁgRy²åG¬\"yTy¨ñH¦eªÛk3HÈ‰4‚€¡)ƒ\r‚cî{k]6Ý›â¶ËžÊR€å‡iÜ¢öÍæ[ÐˆC0a~Ö0;ÙJúQoH>û%(ù‘•ÃH‘sVmÈÓh.-.+äÂçˆv‰–v|M!	OfqÅ™µç}|o¥\$™=¯2Qv¼cg[»4ÌçÑ\nºt†~\$ÐUHaÀ³R/-íI¨XUÜŠ<û“æBãh°A)^¹HFs®YäjBˆÐw¡é4opqI¢éœã¡ˆ\"§2ìŠÒ;—Ï.«ŸZ@²îÈ‹Jo#\$QÚoNø:õ¡(g™>°\0­)ƒKú=ìPdBÎ	O…ïMEeŸÐèfÙ>ˆÁ\n³YùÇ!Ô3†€Aoî\r±¬îÎÀ/\$B½ØÄ±áÂ7Ì»Â'éˆaÁK|;ðæT7„Û[Û}±j:T~pH 4‡ Ê‚ícã…0Ê{ˆe›«28™'ø)£‰ÇWÞÚÝ¤¨:eÃ‘ÂÈŒ€’·ì¬ráL1†ƒLfä™KºÐîÖùI²ûµlÃÌ<,ã¨†Nxæp\0Ö+ºüÌ^¨B\0Hüµ£¨(Ý ðÐkªÞˆb4aç	\"ŒÐ4ú©ï,JNÞþ…~Õä:Žtìâ\nHÂæ˜8P2¿®”ëÎ{‡H‚-àGðM\0­¢…¤õftµ‡ÚMD»Ëú†„4q*Ý…Ì¥g4JA,hBj…vé\"~Èâ—(æ+äÚBÈ\n/nø¦\"ëïï°^éìÞeEôê4„&fM©í*H„.RIM€\n€‚`hb\0Ò=à@”ÃÄÅ‚@( àŽ#î¨íÜNŽÆ-ãì.Z„D€V‰ ACŒs¨¶#g/°7'9î ¹|î0Õäu.|%î‘Îêöèä4^o‚ƒ¡™g;\r žˆCÑhlñlk±4ÀñVÿ%ÐáÊê1jÁêKÐéD½o*11uŒß(žÖG§ÀÐß¬²Â ²q›o(µ£kØËøg¦b€q†oî‡	cÐük£dß”Í˜¦kw1Úˆ±§ñÉñ®/±ËŽºÒ‘Ñ½ f’ˆ‘×\n\$!ã2Îš~1ÒæñÇ’7@	B±`@Ç î\$#QçÐžŽ+‰h„k^(\"†(°&2:¹N‡å‡&ÍZþ©ô(\r'µŽØˆKÓ!rMâRfn™G„khr‹%Z4luM®[rÆ¾æà¯K'ÑÄm|:«<eŽ„â&–ë¤hâŽ­èî®æhŠ&Ä'\n‚Î¦NEç­š è„-á-ŽRÐíÎ ê:…é9«P% PcØ”Æ5¤ë\$ä…‘ôAD,åEÒÖt\nFXGÝ)³)ï)…0}Nr1©5~sÑÛ6–Ãðm5Ç5#ä¥e+’ÖÍ¨Ü`‹s&©1«C!S_Ò8OïÑ*pRù5s™!1„é3`¢¨dÿ\ni	*Uèa23<‹;ó©³Å4³gè}/Óµ<ó×63§¦Ö6é(X\"W\$eHxá\\ÐÐGGJRe*NDÀ*\\'íîß-öÐkÉ'ëî»²èz¢Þá.~9´+ÐZŠ«—Cm¸¹2öÚ²	L(nŽ†¨„V 1¹¥ È¨O<s\$nSÌAÓÑ8#€5°ÙðN…­ÐñÏF`ð\0¨ àÐM–ÿ©ÿé;2ÇÚÝg¤bŽ·,nVËÓó#~æ‚è³X½ók7ó»!Ô²ìR'Q31I\"î3(SÈWÔs#ÔË:NGî\\UG¤íßóã7´ÇGsíNñY#Ž€ôáFí\r9³·*¡=+‡OHì®¨C´ù8Ž×)úð”‰hl’ó®åã#³ÁHd‰/²f·Rèxº³³T“¹QôyTó÷	l/UgÃ”çT±qG°Ìg'×	ðžÉÏEe‚5³UóOL’5*TÖé‘²Í	J4m(¬\næ(÷2²»C*+îXEéUGF&ùY5Ç7ÐÂQ1På:\"£+OXÎ}\n[iå81ó*f/íÜá°,“‘ÿõBèÕ>“ñR«&èî¸Ñ{Zµu`òKYˆ\raPG`6H(>nÕUÕÏP3ë;Ëhü’à#5TœíT ëP+5ŽˆQ·aðHÔ D61AdŽï6\r>v'<)0dç`Pö€Ìb\nÆ˜'.×ðø·'Gk°öF„A°UU\r+V¥•ÃÌfcd‹æÿ’£f650¶m&—p=då±l6Wé?Du	M.|ÍåêÍÔö”4  «r¶ÕŠþ¶£ö¦Š²âÕîiÖµ_öÕÑ‘J3Õa3Ù:ÖF³ãŠâp+4›•¥HâÃO¸êîÛÆÙ.dn\n)Mˆ]ZÕaQÖ+VwOZÔ÷Jvwu³Ÿuõ8WQNUU‰	cÓåvÖ)T×c“<ásÝS€í®L-çFñ	:dèÚ\0Š<+\"·4ÁYUÑd4Ìä0Ê×¡e—¤a×ª¯P)N*{w%PoˆWÂdÄÉ|—¬Žw}c°ñ.5wV7qdE…\r5zCz Ê4—©~wÏQQ-—Ýøº˜	|·¯~³ám/åƒd×0Vê'ô:`Ël/…¶÷Sgƒ\$nµ¶³H\"¿G¨×èº³(PÔÿf\nkØE]5‰Kð¡{VA}wù÷o\\Uçs7yg”èÞ5‡Ö)ˆ§c˜'L7óuÕLuÇ`vLùW6o\$TJ‘Èš’ð!Š×5ŠMŠ¡]‰”ý‚Œu‚S‹më‹¸Ç4Õ3AI3\\Œ:0‰1^£)më`¸bX‹w»=”_HW‚XË¸‰W“¢•öÚs8Õ¸½ˆw…PWùlW?‘èp…µègÉsØóUX¹t\rø1¨¬'ãSIw±‡6?9×‡W¹;ŽÙQIM”w—)Øw8Hv[@˜	•9k’6HÑ4ëO¹IyåJ[µ©v™’w¹NÐakgc6	˜U‘7õx„‘™–³dò#“U·ïx3‹›¹`AYÁšùÅ¸Ù“x™­s—e™–ÙÏ™GÚtçá{Ø¸G&ÚDvžÐÃRËšu•ÚTHS%÷ÚîÆ3¡wWxÙÓuË«¢/LSj55zMeIŸXc5¹sN¢¼	\nrýÏ§X85iÎ¼(ñEîG¯+nÍW£Œì4Dò!(t„ç·ìñn‰/²¸xþÁQGqŸF³¢¹¨±Õ¢ÎW÷Ž.9\$€žïb3ýIƒFBÔ0W	ôs¹bZ© Z×ŽIQýŒ—·59åZåç_ëGš›œ¨Õ®·¿ª:3¯8O_®rùš\r€VÈ`Ò`Ö•\r©OÒÆ£â—\r Ì—k+ÀŒ=cÄ\r¯ ±€Ä±M\n ¨ÀZ\0Ahû2E‚½\"ƒèÏd·™Dñ®aÊï“’ëbœ^÷Õ—U»¶U§Ÿäz{j‘T·œÍE~š|LôK¸3Q*·#8ÞDVÒ®µÒ-ºTÜ¥X4–DIeË g ›³;76Lt³‹6†ùìöOg‡„SH·SU!uB5——Ñ}´™sDHòÐ¶›´’­§˜ú\nP¦¼µÇ½ÌE#5”XÈ„6f‘€G®	Ed[ÃBŠ°èâ<Cê?¸IWæÚ…Œ¢A¸Õ„Ë]ºò™»(ZàX×š:7vìÔšuçû¯ã>û±?H?«Ôµ»ºÏ‰ümu³‰1ÿ»F°O\na¢¹e/ª‰G1ÉUàü~D7)5UE©VSb\n>¾< A´¬‚\rãQ%oÜ}ÅüªÍ\nš “qºŒ®%R1X:¼±Îµ“;Ìzg‰”@Z—ÅÒ¤X•§‡\rk”¼U”Š¨] ~\0ˆ>Í6wï½åò§î=\rüø¯¤\0­`îNþ`ê Û6TÅ7zNJ\"~	üÖšÏŒð„0V\r5#@N%@Á¸g#1¸0Ç£üM\\«Î­fÌO\n€åÇCí¬ˆ×l¸‡gõ%jÅpfzÏ/·F8®/ÈoW®)ÈTÑMýÉy¥6\0†wý¦°ý§ÔIYÍ @=@ËÕ=9mÙ1XaLÏG|aßœegD‘¿Yúvõ*æÚŒDà	\0t	 š@¦\n`";break;case"th":$g="à\\! ˆMÀ¹@À0tD\0†Â \nX:&\0§€*à\n8Þ\0­	EÃ30‚/\0ZB (^\0µAàK…2\0ª•À&«‰bâ8¸KGàn‚ŒÄà	I”?J\\£)«Šbå.˜®)ˆ\\ò—S§®\"•¼s\0CÙWJ¤¶_6\\+eV¸6r¸JÃ©5kÒá´]ë³8õÄ@%9«9ªæ4·®fv2° #!˜Ðj6Ž5˜Æ:ïi\\ (µzÊ³y¾W eÂj‡\0MLrS«‚{q\0¼×§Ú|\\Iq	¾në[­Rã|¸”é¦›©ž7;ZÁá4	=j„¸´Þ.óùê°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€èù£€È0Žxè4\r/èè0ŒOËÚ¶í‘p—²\0@«-±p¢BP¤,ã»JQpXD1’™«jCb¹2ÂÎ±;èó¤…—\$3€¸\$›Ú4Ã<3«°ô/¬m£Jæ¹î‹®®å†á'ê6¯¹DÚ²Š6ªÉ@»•)[t‡¯ÌÀÁ+.Ú~¶ Êñs0/íŠpé#\r“Rµ'éL[IÎ“Ê•EhD)1q7±óŒhæ§ Þ\rlŸ\n(‹ÂE¤£9ÁîÂÀ¨*P“³>—t\\›8Ò*/¨ÔTI9—Ü&€‹35 khð§¤Ë_ÈñÒH\"U¹³Œ°×Fò™q8Åã·.§Îe|€Õö’&“l UPÛIú¶ž¦sLìJ«/\$ý'§¥Ûa·òÊæ‘jYfIŠŠ²¿Û±ÅaY93dÅ\\!W™qJC”Mc=a6¥¬ïT	Ü^RÛQShžÑ+;¤ŸÄ…íF«ù!pYÞë›.øêá^°Óƒ,EŠªg+^ñ;ybãFbíÓ·D©“r­¦iûÃD£‹ËmU2Å>ÇÔQ£·¨°6ZP‹ê§wÎZ¼Dð¸7‹Oa6%>žÔNÞÍZamãŒ‰3•\r%×ös`9ûŽ¬¬0ãÂäS¸\"Ç×Väã\r'ó‰B¬ MŠ»JYzé;hÓ¥lïiû³Pë2ÆP¶ÙMÍž¹¼øÚO\nËÑ»pá)È;©êwQ'³Š·poÖrh^Y.QV+³²»·#`PŒ:ƒcý?!\0æ1Œ#wi“­\\:Ð\nbˆ™mI+‚wÑd°ãm£äµ›ý’w8%¦»Eª‘ý•  ü1½ëÆ¾è	«o‡…jœ\"ºÏ‘c\"oÍ©ª‰_è‡zAŒ4PÚJËLLG–	ÁX.‚œ‚Á…A;¶³UÊáLP%Y(2ÖÜ°˜kmé	<6Wá{›;ìòœ6œÖ[*ÜOmÁJb³\nœh.Áè0ÞÒÃ;Bà(6@äAê!È÷†ðÌƒb<¨=3Â ]Ó2ôdFä*óåÃpyÔ70êÃüa™æ\0ØÃ:<`°ÿ(äC8aG€‚E‚VêQàu@  9‚“ŠsZI`I¸¢ÖØS\nA»Rà”‘yÛ6±í–XtÅ%b-båö\"É·>väÊSRQïµÇQ1s¥¾\08ÈV»Õ*bå`)Ç ÒÃr‚–®‘6ÂÚ2‚˜	 œªÆ|Ç!f®Z7%¿1%ÂÜR*Ü¬ÐÂÐ(r>s¼9‡pÞ›¨eÀ4ÅÀÈ\0<„¢.`zƒ@tÀ9ƒ ^Ã½Á„2I\0ÜC.žáœ†PÝGCÂŽ³>‚'žØt á}½PÖðI\r¡Àü†Ú<à/ ùK‚\nlÃ{u?ôø0†³ÞC¡ó£Â› ùVwÍAÍU)Øª°e\$`žäÎšS#ž†”!ÝPéÒ8óø¦%akIÉD-ÄìNá1à@\$\0@\n@)PHQÿ¨—lxÈAn\nÙ¬Â“”UJ¹Y‰RÈ¨UÓ*}OoÇ™×FWT1jEí.kºJâxK\nvKUN¢Âº[±Â6	ÍeXvÞ4Ú[“q5\$ˆf’Ûô·Rå`\$’PòzA\0d\r-ÔøÔçGª?±p8‡SùRC0r\rá´+§’£À€1ÇûŽ®Tó?h>ÅÀ¦ù_…jª0ª¢×>VÊé=ª¥\$\\cMká€™PDÎÚWçN·³v¶Ê,é\nZˆš-ð.ìÙ*KÐc©é\0&nD½©8òQÁmeÈšÓÏp¤Ñ@1þŠHƒHg{xcð{Ï¼\$ÁR»=Vêiœ÷©5#Ý+©qÃ‘î£/]Ï§•:LØñg¥ÁÎ\" ²\\lgrÊäðœ¨P*\\«•Â E	.¯ù4t‘a3E‰a´h#33Í\0ç¶c„NÎ‰Í8(±¦çj\\ê£×N5þ\0;•v²•ë|ŠMü\"PÌ^eIÁ„6\\â³4æ²¬R‡\\>n£t\0Ã	EàÁpÎíO.ªX6vDâuKl	`ð–5Ç“RÃ¦!	^XZXìu…²ªcž¯ >Å¼ÉbÈdís6:ÚŠ2õ‰@kÙ,v\\=iºÊNl®wö\\å2\rÎ!6\rG\n¬šOœhjÌäåã¡Ðá¥lKDµ%(RˆÉ	ý¶eÀLƒ¬\".zã+µ«v•·pŸ«uRðõ8°ÖJçïáßÆ Ýµ)h÷Fe8eÅe\$)•NviáL4‡ Ê‚ÓK“ÌÓòÐ(dJæà=8)g6ÂTy:É-„œS³jä;”ð=|Ö„sqÏÎ‘0ºLã^ÉóyëGËŸÔóB¾šÙ¬ëîvÆ:íÓ	ú©Õ ´ÓØÜ<‹Ò°”áD«ˆ´”(RøoÙ÷µ¤¢u!qIûŠè‰;\"§w±Ýx:µ¿n-_rd;Škq”cŒ†µÑ?E÷ ®-­7gw8¸ ÐÓ¯4É{O\n±Tl?Õx²àT!\$›FIüÄÑpøûŒ€C†:³ýëáCoŽQÖçR¥öK³#\0/3A¥.…©Öã!'k·Ì&ö|ŒÉm*ìvëòÒ{E†Ú\0¹ê:¹Îowq{\nã˜óÃƒÌyd*¦qý´DõAJ+¨[oæÂ¯\";Žv;oÔogŠý«\0üDŒU²Q¸à	ŒpÇ‹¤àæ+'ÖûÚâä¨2e8L«\0w£W,Sd`,ù°~†ŠÜë`ãAé~oeò_c¾ï€® ÄÈ„Å¬^ábÜþfBPr9C(éM.lÙpNB‡G	*ÆE¥¼_CšŒ©†..´þ‡H½ap6Œê^…Y…X'â@€IÆá¥’~Fö&h€øD£µÄQì6“‰¦vnˆm°NÙ£¶Ùð Ú0ØB\$4ÿ‹:<-CŸ¥–S\"^1®6eFö|,\nÚ\"æfDˆ%ˆq™CŠ;pî*b·MB5Jm\$ƒOPèqF0(ˆç1 ™lã&ýƒNÎ0³Ê Ú­îô¨î&!\r->E«\$ÖÊ‡Å:B„ìpÄø+fŠB³ìûñ¦Hv“k>Î(a;Zì§üêh.¬éŽ°éñ=Qâ†qàL.²þNŽYN’**îþMQŽY`SìÐˆæ'ÆùFø|ñ_1ÔèQxE¼ñˆXëñç%úÛˆ	!m”×î2T’#ÅX²(íÜ„òDb²I2<‡ÒAˆ“\$n¾„D‚ñ2ØdE\"¡\"Hš„r{/O&²e'NnýLªN¤:H8È##¥Ê˜‘¯\\äóiˆ+±5QÖÔBú°‰8W/È%ïÌnÃ¶úÒ™K-‹óäíÉÈîä8Îè“’’Oïäíð\\ÉL½í-®¢o’W²§)2ÿ.¯äÉ.ç\0òR‘/±è8ÐD•ïð¿é’˜2Rƒkè'i¬;ÍÓ\0‘ú}äøS®zk%5Qƒòa#…Xh®Þ­gb!Kö“QzØ£Ã5¦Šé¢æSñJ˜24‰fø.QfoÏ\nÝxÍDDÍ³Rì-¸ìeC.r¬î	2ðÉ‡®äQm)ÎÄ¿åÉÅfEú­M9åÍå€~„ã+ò1ØjÎÓÓ,çèa=ò}!ò¨;®ƒ0ÐÀÛfÏ1…Y‹pè¸oo>rïBôo?rù(2P9´-”;á>±×*Y1sîóÅ“BÐOAÔ2”Có´91FÇATCâ	Ò@t)EíÜ[”*®ØQ‘š‡£¢6Ž³°ürÔDF¥´'r.oqd<#Q4ÌŸÂPÀ\nCÒˆÅ(°aB0[\"T¬’T³0Ó?>TW>’ZhÔ?Kô°¢ô´IôL8Q]BRýLtTìôX€`@y`Üæ\nI\"sæ‚Æ>k¤ È¨¸ÛS@®TõO‰¡QQP@ßP•äñ3ÃšUÄ)%¶b.	JØæ‰šöôö=ôK…MõF¹ÕKM¬MñINQuUj<5\\9ãN¦ÁLÔ=VI˜µIVÔÅW.ÍWu\0€qæ„U•…ôÝ#ôOVB³U, 1Tã1bfYZõUõ¡Nú8ÑR9B·Z…‰ZÂ[QÒk[pÍRðŽõF<µÊ¬VäÈ\nƒêïVò*•ðð*1_”éX¨W”[)5ÿ_VDµÃV4»Bt516\rOðUØ4àAbª0[P*Y\r5FÔ.†ŸÏW^[^Í­@•‰Ctíbqß^Eg^«%•S”Q/R`–LL2³f‘L@àÐaR¹,-`ô+L³«R'¥ØÜÈ †ö½ÒÒÝHÔÝ” ÎÒ\n„DÓ4PrÇGchfè„±ðRl“¢wHv´o†Ø+/Ë\0q-Få!Ðx’ãnF›k°”¬\r€V» Ò`ÖÀQÄÎIÏ\\“ÊÝ:%b°ÐŠ\r êž\0@JŽš ª\n€Œ pj¨\$xðüã-•¾;bºýo%”Ø0ÀÐ–±iæúŒÃÅJ(†&k@›sÀÌ-.âvQ'F9ä8+¨doWDåÂKöNðŒ8éRÔï0ð\\79ÌÎœõÜt´S`’+qm­Ck¾„hcngS…\n 	€Þ¢—?|÷Ò‘éî=äAfqÏºìYS¯i±æ®è¬Ž‡¨@©,Ðó½/SöO-¸O6»mvÁ-÷g€²C{²,v»ÕÅtµûa ÷CØ=×&«¶\ràáK	 äÏ‰u¢o†CA–v‡\$¾—TL»‚ÆŸ°e9’]‚RpôÐ	 d[ §u'w¬îls‡	97ølê¨ÎTçþ4­oï­w÷\r(ä¯†\0¬÷ î@¬ Æ ê\r³Ï·®d4èd~…\\'¡==¬òþMBd'4éc‚Ê&LQ\$X×PwzÃ;eò:e’vQ¸`â³š*eRTG&Í{‡dDE‘xÖ8Q±ö¾LVÄh¹Šêˆž Ó‹8Lî¸¿V•K¤žte(+°¥J4r/°¯c¸ .·•Âæv`	\0t	 š@¦\n`";break;case"tr":$g="E6šMÂ	Îi=ÁBQpÌÌ 9‚ˆ†ó™äÂ 3°ÖÆã!”äi6`'“yÈ\\\nb,P!Ú= 2ÀÌ‘H°€Äo<N‡XƒbnŸ§Â)Ì…'‰ÅbæÓ)ØÇ:GX‰ùœ@\nFC1 Ôl7ASv*|%4š F`(¨a1\râ	!®Ã^¦2Q×|%˜O3ã¥ÐßvMóÃA†\\ 7\\Îó´ÀÎe9ˆ—3©ÀÈa:sFƒNdépÉð'˜éÐ«ÖËtFKÅèÝ!¦vtÓ	´@e×ñÐ#>¿±ÇœÍæã‘„×ßßÌ ¢œ‚%Ö%M†Ã	º™:ž»§I÷r…?ÏÀÌF˜ù¸Ò 5ö»”	ý\"iñh`tÊtëTù;©ðÆ¡Ž‹Àä£î£òŒ#’Ý#Cd<CkºëLºPX9ã`Ò*˜#Œ£z˜:A\"cJÐÁ¤V‘:ƒ¨Ü:©í|\0ú@eˆ(A£{¸\nÉx@·ŒPt#½ƒJÊI‹ÞÆ¼…Œ0Èæ2˜e;0Ž	óX£ÐæÐÁÂ:49/rð6¯\nˆÊ©ÉDøèöAëŠpž*J¢Ë9ÁÂÌœøAe‹\\Œ‰³:4%<¸2Ä´#9cZ’6ðk_5Œ­Ã¦ ¹ SI,½c’è#®¢‚¶JƒÄùCš|úOµR†ðÆC`ê©Ž«èòÜAíóO;3Pk{*\nbˆ˜øDÉÕr'³p´æ5„ä£2È5¸îªØ2+èúMÓ„÷:¤òE@Ü3Ôår\\Ð°A³ØëH6å#-ÏWGIJVÛ£ÐÜ³!#[O‰òË¨x.:®W}myAÉuì¸HÀUËsÕ´p6EKA­Þ3ÐðÜ2¤æŸ\rxRÌ*\rëœ,7!d9Æƒ09ŒÎÐ@¹èæ3C–r0Œã\nX–QHfÐ…˜R“Ä˜äƒA\0P!ŠbŒ„S€åŽ¡pAHCjxÐnmD’;c\nN!8[Ï]¢òÎa™.’ãÊ2'É=™yŽ­ðç3zf6ƒ®6/ Ì˜³C.ã£JËÀË¯¨&Œ3<(æ;¤´(Ê<`Ê2mAâ.4C(Ì„C@è:˜t…ã¿Œ#&¤É(Î¦>€ðý ÎX^X#“.:w‚úâîa|\$£…47à^0‡Ê#3}\nÍ ŽsD4°£‚=›¦#§NÃ“‰MÎ™8ðèsÈ>BÁ°Ÿ8D¤IÂ©â}º‘#0Ü	+ a@\$£Sš Dt‚‚ŠÙø§T'¼þó\nžJª#QÄy®\0ÒPñˆ_Ä±‹æ2ª;Œù‘¿!epnÇ*åÈE]\$zæH–š¯\$á\$‡’DðT)‘0©\\Ž3JÈq°\\`ä‰–‹Ê Nœ:‡0Ë’WŒÆeÔ™vZ!Ì96/ä¼-\0 Â˜T6D|ƒ4ˆzOzª-‰D“S>û™!ndi•½§ƒ¨yèÉ‰,% E	óÇœ7sOÝgO˜7¼–HMƒHgc†b`KCIÁRÕ\rÃ%0¯â6Æ÷G˜±Hpt0»äy–º\r‰BÄî'²‚…€PO	À€*…\0ˆB EkÁ!Ù»¦à{ÍY„7®¤øHbW3†q„@Š,és´3NðA<T»Ÿ¹­†YöÑñËd9¬\$Nîh™>-ÈAjCYÔ†l¬é0‡tNÑ…Å²5²(Rb2=\$@åœØ>tÂÍ a‰€ÓÍ´@ÂÊšo\"~RÚÖE<4!,÷¯sèI×«øc\nTó‘\nMPHU8¡¥u¬Ÿ¢´=[«áx1D6YMÃCEä.!>ËÛŽ\"˜E'/@¼\r é÷4ˆ¥ óš„”÷“¿)NjÐh¤}ÏÊˆ–,I9o/FmTI¹PÖœàH…ÊlRô‚&èé…52C¡ˆº£Ã6·R×Òk	4¦¶ Í};Á„\$[oü\"])Å>`òŽp\n„t3VÙìH±sóRk*+tÂ¡À\r4”·]¥¡uÎ4(åC3æ”@S.f !”³\réqŸ‡\nX'Æø½	z6n¨à¡ÖTä¼Ñ\0T\n!„€A‰y˜ŠæŠ1;2bÃ³\$áMçY.”¢Šå]E-„¾¢SÉ8\nL*¡›Ò^ˆid¶3(³7 u~P¸ˆÂáéäpé1«\0¸áG´O.)-ðbËÅ7’•ÆTOãjŽ!ö;½\"Ý\$äPPd±Z­d˜RêIÔQÊÇø OÓ¼‰‘±vXÆDã3c˜¥dÌØ¬Så\\yÜƒ…ÊyÛ+¥ Šˆ	…áÜˆ”’jFHÙaÝ0è’^@`4¸a³	£\$i…¼Rá”1`äfSÙáQ>ëð‰t¿‘s®GÏ¨8\$/—˜s\"îE\":Ï<ÅD:bM’ÉIwd€‡¢ø]µ…DÚ×<ˆ3*ÊT Â‘‘x™ñÛÇUgg¨(¥uÈæÜ³eÏhÂ=Äjœ0\\d}Ènu Úr6GtQ”tCy›^ˆ7Y%øŠžb£ZYJÈ!lå+Ñ|Dk„CŽÃ^ö¹Ü„[Ö\0¨·RëÝ™JàÍ‘^Å¹.P•Zun'Ã¬û6®¨Ö5Á¹w\rZbëyWªð@it‡žû·™TÚ§Xÿ€.A´­¾}Í:I<ó£rî€¼z]¤_˜e&6»·ƒˆè„Ÿ«ë9ëq:^ReÁ† çã¯–¨ì‚<c‰›²j0¹Bã°ÙûN,*}´Ÿd¼Üà>QÛ—FéÜ‹«U¶—ƒš~ƒÜ=ÖH8ç‹š¾7¬ô=çq®BÐ1ñÚæ,ŽFy¤Êà¬Hmr:Ä _}×4Ï³Í%êÂÿ&Çiz”ÀcòŸÝjYV(ZT VUšYY’xÅ-rÝÒÝ.W;° ê!Èéº#¶›_ˆô®7·0¶¯)ª½xÍlþÖÊ7ÞWyt_³öø•œ7ÛïsÖ`¼wòrúÿÉÖÿ~§úßå‰u\0IŠ†Gì(;ÉØTD*BâÞBËæ]Ì¸¥çJ£Nð7¯ÚÊP\"7Ï¬þi\\u°\$þï.R\0ÜRI mâ¸ ²“ƒBç.¾Ý`Å\$\r%(ÿªÍ¢7ð`ê\$H[ƒh#bðsïH¯\$0=îªðk{­âÿ;nÃBV’â¢WŒ\0ãåE+\"@Ð òÎ‹\nDÚÿp¥\nëºYð&ÜK½	°1ë·\nïÊ²+´€¯­\rPÀý@´Xc¼þ ò¿Cæ@Jºªí¸;+÷“/äéùëÆéæ)\r+”A¦n•P!J`OÏê1,  âØ•b˜êÐ\$JhR¢8ÍLò²ÚÉ‰—gõÉ5@Þ,Gã6|Ð\$PŒMÑ0Ã®äÒ/ÇŒB6.ÿNêÛ‹Úã	êHO¬)… ½ÁN%š=£DdP\r€VJ\"þP)[i~mÄÆ&Çî `ª\n€Œ p7í°~CˆÌñ”HCœ`ëŽàÆ±se¹ªw-èX\n½e4«GÀÍ¢RCÂÊÇ\$6‚òÙÉè*qùn½âdÙ¦\0)‹ÊëÎ'Åø\\ã§D8@òˆ%Z9c¨3ÂJ\"Iª\"è‚ØÂ.¬Iƒ¤OIäfZÍÆôÈÌ¦Aënô\nz²Ñ>²~sŒ¹ÅQ(qò³‡9\n’ŠºÂ”)F c\$\"0»O¯)d|sƒÑÐá&'\$’êÄXQþßNš£ÎLWÀô£òØ@Þsê¢Û è›HL‰‚CÂôP ¬\r Êä€\"žq\"û*)D”’ª4G¶N†\\#@ôMbøž†W.ë°7£Ø\0Š5ÒäafA\0%ê¶çâ~\"ò‚£BÞ§Ê!)~gr4DYÂ^-‚vi00~E¢Þ\rc*‡>ª(2Bä3å<P ä";break;case"uk":$g="ÐI4‚É ¿h-`­ì&ÑKÁBQpÌÌ 9‚š	Ørñ ¾h-š¸-}[´¹Zõ¢‚•H`Rø¢„˜®dbèÒrbºh d±éZí¢Œ†Gà‹Hü¢ƒ Í\rõMs6@Se+ÈƒE6œJçTd€Jsh\$g\$æG†­fÉj> ”žCˆÈf4†ãÌj¾¯SdRêBû\rh¡åSEÕ6\rVG!TI´ÂV±‘ÌÐÔ{Z‚L•¬éòÊ”i%QÏB×ØÜvUXh£ÚÊZ<,›Î¢A„ìeâÈÒv4›¦s)Ì@tåNC	Ót4zÇC	‹¥kK´4\\L+U0\\F½>¿kCß5ˆAø™2@ƒ\$M›à¬4é‹TA¥ŠJ\\GB›Œ4Ã;äõ!/«î¿(+`˜²ê’P¤¿ê{\\’µ\r'¬²TÏSX6„‹VZ(è\"I(L©` Œ¹ Ê±\nËf@¦‘\\¦‹’š¦.)Dæ‰™«(S³kZÚ±-êê„—.ëYD’¡~ÈHMƒVƒF: ‚£E:f¡FèÑ(É³ËšlÉGÓL•·‘A¡;–Szu CD´RöJ©‘`hr@=„¼®Á†BƒÎs;ãMNrJ¨Û­)ŠS3NéjfB£TÝ…ÑˆÑ54T4´62(Ñ>É«)ŒF#DMRD¨kgVhI…t˜—;ršFêöH‹¡ªeŒ_7iŠ]EÚA	MªüH”±\0Õ¨µ.AÂjã}c\\ñf‘·-Ýë7ß³bÐ\$›Gm¶¯úJ«Ý)ŒÊ ¢c\"Ð,IxâP¦*ÏbøÎ)f%óyenEÊÍ×O”Z 4k¡.´,Éå­ÍžÄ‚5oA¡Ü%­[4d5¼ñA0é²„„P„E­(™JÈ}3;áP\n’X3¨rvÄT0Ã¨Ø6:ï+¤ŒcÝŠ\"d>•áäa\r&žŽÙ²Rno7Õü¤‡!°Z5B·ÍãÓéKéFÂ÷ýî™ÀxÕÒ§©zuÉ)<f”h¨îÂP¦ˆ4ƒÊ]EzS]S7Rcõ?3Usw/e¤f^hÕKÖÍeœh±úëßÝû·Z˜tÜ\\=jB˜)£ƒçv¹pö[×Tt{e’ï`PØ:@S‚áŒ#“7ŒÃ0Ù«Z«5¢ Þå»pò£pæCc:¡Ì36`@xgBÍ>GöC8aB\0‚	±€@P€u;À 9‚’ÖfÚ†.«f\0†ÂFk«ÂâG]Jeº)aX¡\\,£DD”JÅ»ò&¤-’BN÷ÒD3ˆbÝ¥+Sl.Z®*%ÐG·7Œ½Ì‰%FåDF#Ä\\ÏQ©¡G	“en¡¡5Œ\"Ê&¤5Eù\rHÄð&†æwƒ‘ÌŽÁÌ;†ðäÄƒ(x¥õH\\	Ä}A˜‚ Ð p`è‚ðï%Ápa`7Pä£ðgá”7J0ðwŸði\rò”6äu¤ç™·°D‚HmH6Ê@èxaÉb†SÀØ‘Ø‚á„5œ€Òdž2t7H¢…VÈÑçé7\n†Yâà?Ì5Ó¬D ù¶k‡ñË¥3f£La7Çô¤¤¨˜@P³±(Îãê•ÁAg(ò¢œâY\nB*…<hˆæB#\nˆ‹Íøÿ&¤BŒé!Gí“=õ~CÄ³³¤õÕÒžZÚÅ>ÅÙjBˆñŠS¥ô|†½sz¿\nA½MPÝp˜†ÁEÜë ›Šù‘BâÒŒã[G\$ª/8äÞà™Ìj†åœž’.N ¥‰© å\$É<'Yõêuf€fA¼6‚\0ƒ&ß„y<8X½cGPô4èbÞQé`ªz”Ñb´“¸¼@'…0¨Ð*«¨Ç¥©’ê£CÈ! °ãFÄC?Aªs(éH®Ãi¸Œ(ê”¡.fwµâ¤l¦\"g\$¸œ4·Ù¨—8e¶†çù.Ã|š\$1Î›q˜èœƒ¡\"B0T\n71 Ó.£ôÐ™÷.µÖÚÀŽ<ŸBl)q¸5ÆA©F¡É¹E<vD†ÉYw()›.Q i„Á=\$ùÞ‘Á³ïÁ \"aAb&Þ!µ¿Æea¦Ç>ÞHYû4jfNEHÓz£R¨¼&2¦/Ó²*kTÕër‚ eÁ…³M\0ìCegVE6Ê­E.¹ÃØyðõ¡_e^¶Ur¤}¤Â®ñùQA	|¹ÕÒÉ\"+¨Sëš•ª§®ìV#št­aD‡dV;5lÀ•<£9Ä±kj+}Ê»0ö*\nÈt1Z9ä@†‹+–J9ç0=¬|}a¢??GñéÍ†Dç&úäÎiâ†F£\"™¹K\0êØÏyó>ÕìíJŽ«D°·#2Ë‰(˜›¡u¥>%ŽFÈÚ)³öo”*íC“šú)”ÇgÞ“-A¡¤=Pë`pƒZø)†S¤ÎðdÊÅé<8@âM5sî…×‹…m—áº˜t˜°CE}Uš¾)¬­»Â’SS_PVQ€e\"ç¹írDhÊ©Ã`REÍ	Žš§”}”±ôdè~òC*AaoM\rW#@Q;uö«Ôþ95=w^W™ºj7Äé¿;úcµªÜt	½&!•ŠDÑmtå—¡7C·½#)Ê÷B¤hT73k’ÞPòÉ3Îr©çSóXŸ\0PA\nP „0+4ž\r'Vá¾£’êùÚd2ÈntUM\n:G±Yºòˆ,ËÔRûh¦‹¦:n;a•¿µ®nÈÆénŽS2Û&¶ˆ#5î.‰N9TÚäÚ©'íK¿¶.p\\{Ëï}DS_£h=æ#þ{O_â×êŠC½)Äß|«N\$þcWù¡}ç7o‰,ÌKº¸­aFžïdrŒ‰ÌÄt}êw¡¹'Y†÷¿Oå7ªð-/ƒG/ñW¦É¥Oàyr¡ó< ùìgèö]aê>Jªõ_ÌøB?µûõ55¡2ëÝºÖÈÏ‘¾+‰è žXVa#BÏŸb›èª&âÜÐ(Øø¤(tëfÓj=šUâUç¼KoòkbÚE`EÂ…Ä*]åÈô£öúâ¤þð>CVLª‚>¸Ðd„¨eF*bŒ×Kì…ˆ€Mfö3­ú§(†0ðZì%4mdÈÈ¨Eˆ²ÐPxcLæÄ\rŽCP2ÿo¤,ÄAŒï¬ÎûPœað ‹íòCï:.0¬þPž,ð£p˜zäÓ|LMºDÇ¦¡°Ç\ng¿\n¯œÛp4G`ÌeH+obkpÕ¦ÒP´Fìè)à%IÒËÌz\r½ëÚ]â ª%˜BoÔ2FªAfæŠÂ<D\$ÜÞmj*„ü+HÓ\r‡*0ñ>JB`¬nŸ‘Nl#Óm8Þ§z!­Ð¦”Ö°Þ´óÐæá„ÈÝñhÞ'FH¬\"B£F†àP§¢ÄbT1RÂÇ¼Ë§.ÏŒ´±r÷ÄHÙÐË…LÍìûÑ ÂÉ#|²¤TüQ¹q¨{1Àg¶Cg›°ÒX1»lãð¹qzÑqâÝÌõÑª{m¨¡lóÐàGÐäüòuqñhñ(¢{ˆá(OçæLëGDc®÷äLŒ†·C w®l¡†LG òD‡±¶òe\nEI\$6¯ÒH1L„.p©f÷D†ˆr\rRa\"e#ÏÁ&ì­'.k'„_%O¹%ˆ¦ ²]\"Ñy!O\"à¯²\\n_‹×%ÒR ¼b¼¯PËÑ+Ã#*±wÑz=2´¼ÒÑ#NòÖQû,n€aL\$C0tGÍ¥Ðk‚®.¢Vì\n>¤Eðªeªp2ÃòCrù\rªBS†›Îdœ1FÐ‡'­ÔaN|¤.Lþ,¢qVÔÒü2>‹j†Ê#“\0¤d¼.Ç„ Jû.2ÎãrÒ½Nß‹D1¢Xk°ý\r¥2Ý‡&qŽÇE­ñŠ=‘Žd…ö(Íµ-’‹#,Û#w,²(±·:S´’ît²ñøÎ¯¦¥s¨_Ðbça;ŒÍ,P¾Ê„h[S­R±>‚»=ò)róó‘ðrIsö{lètìíSê¡®2O‘ˆEdö0ÚX Ü\"dÕlŠWSk:ˆ­å.Jq+br'læ’væåç>à¾qzí	E2PÍò‡\"²Û;ôO\$£OFrW/Ë-ônsÂneGŒf¦@&4cGnqtèCð”Œe”\nèûA4›\$ôžuŒ< ê‡¨/ôH.*¢.2NŽHEKÊl\nyF°©>T_5…øq4ØKË1?²tòô\\ÂêÐ)Æ ÔÛO4á%óño#&N•NâéMÔ\r‘üãÔëUOlÛŒ?E’Q¾óÇJ1ä¯µâ„ÉR4³TÌ>Ã®u9NR°áªââ¿?µ\r\"ñ{VS²Q•CRRõIMÜ¡5vã±=U¥bäO³ÛAe2Ü.Šh®òiã;ÒõZÒèÅpO“ïW±[Ek	H²Êô}?Ôƒ+JB¤§4DACTQIÌ8À±Lœ­šÝp×Sòg£CÅßD>c*9GE°ñêZ´;göO‰`²t›q(ö\0Ö\0´…„ŽR~æv\r*ad-efˆÓlWœøb(â›C0Ábéý3µâ[ƒ\\õo*ï*/Œ(6_°á*ÒÜ)RWfêcg6egÑcoºT/n×çÈ\r€W.ƒ|2«Ê´ÒFa±aD3ILCÕ3’\\t\$Š'€Œ¹¨.¨î\0Ä™Ë|\n ¨ÀZ\0@”€Æ™ ï†öAu!±Ë3ï´î–îôVôwÆˆÂÙoï@î/yOVöy‰pñz„2&KtÎú[ÆMTÓŠz€›n@Ì\$&E¤7BRî@>¤J@ónSò2è•·qãVY¨}o“ZiÑ, «5kUö&ÒLŽ#'k\"&òÆâ’GB4§Ç¡\0\0	‹‚«d#ywš‚èü9¸<‡ÐÈn>¬ö§lyMnz-¿2õ\n1\$6ly÷¿s-%ÑÆŸö%/WÓ\r†[-…Õïó]Õs\rmrœðLÒÃ[\nA·Á‘rLÂ@?só¢S	Ñ˜}d2_SÂPAP^jÎÏ*‘~E¦Y@¡‘ ,J³k;ƒW„kÓÍÛ4<5Ðnžª]OLOÏBŠäàŽ¨ð\r,`×Žº\0¬ê`î@¬ Æ ê\r¬K†M÷·d…f/,Ð8š|,þQ­ M'‡#6\nþs”=d7‹¬‘}Ì€r£ý1	¶ÏL¿ 8«XÂ#Wë?wV×çÔ;£8s‡mzbC ¸ƒ4ÿMkÉ5†B\\ƒMËÒ&-¶ adö2m¤\0";break;case"vi":$g="Bp®”&á†³‚š *ó(J.™„0Q,ÐÃZŒâ¤)vƒŽ@Tf™\nípj£pº*ÃV˜ÍÃC`á]¦ÌrY<•#\$b\$L2–€@%9¥ÅIÄô×ŒÆÎ“„œ§4Ë…€¡€Äd3\rFÃqÀät9N1 QŠE3Ú¡±hÄj[—J;±ºŠo—ç\nÓ(©Ubµ´da¬®ÆIÂ¾Ri¦Då\0\0A)÷XÞ8@q:žg!ÏC½_#yÃÌ¸™6:‚¶ëÑÚ‹Ì.—òŠšíK;×.ð€¢™„ìi¶n÷»øì¬ÛÀ€ðÁEƒ{\rB\n'î¹»Ší_ÌÁˆ2œka§‚!W¹&Asv6Î'HáÈÞÆ»ÉÛä÷ ÉvO„IvL®Ã˜Â:‡J8æ¥©©B‚a”kºjÊ*Ì#ìÓŠX„\n\npEÉš44…K\nÁd‹ÀñÈ@3Äè!ªpK P›k¼<ÈH\n3°Ã|•’/Ð\"1J'\0\0P¦¦‹RÙ!”1²dœì2V‚#I²pN¾¦ï&	¨	Zþ)è	RÜˆf1B‰§CÖË\r‘Ü˜„ˆA¯¯™Z8B<@Ë(4=9%3÷.—sdn4Ê®ØÊëÏì»3-PH Æ€”±äa—Hl`Â\nxëD˜e`Üô9M‚ß&0î²2/#Èè2…˜SO1B„§Jv7RUâpJ®ÈñGF\n•«®5¸%û½¯åN]•2†Q7,tW¥Ã³FG	AQ±6’>hv4D4È	 íI/+|´¢ÊÑ4¶\n#©†T¿ƒ£ºP ‹t‚¯omÎÍ\rŠl¬)Š\"c\rh¤±&IƒÅ>\rÃ41¶J¤‚¦\"dL>c(Zi æ™Sì*˜\rèž€6°¯quT¿µbw›g\0VÕmcúÔ ´£ÁE%©u;»qö–:0ÒVŠØ­ƒõ>@ïS+Q\$ÍÎ~4h VTÅ\r‹@,ìÐÂ9¡\0Þ3ÔÜ2©cCºPì˜eª&0¤ƒ¢Š’)òv2ÓáÓÜS~ã X\"ålŽ½8ê±É³A-€ùUàÜÊŒ)t‡Û‰Áë­\nl)Ü˜ÓÑô±´SJ%2RH1D4ü—EXê—P²\";Å¿ƒÃþ3¥Â…ù3¨…®ç©©Ü/¾eøéâC‘#’xåÕä«´å:>s½Íô;/åòKA\0<(a¡À`zƒ@tÀ9ƒ ^Ã¼Á„2Ó C.\ráÈ3‚ðÊ ðxXa¸9†“þÁoáœ2‡HÃlJ¡¬ãzH0¡&O„6ƒÀ^Aó<#êm·®1#‘@h%Í(ø}Âs\"a”9ÂSþK‹¡QCQ8ùÄÔ‚S(3å¼»°x.…¹ü\n (Eºfˆð—?¤á“&ŠR\n[—V.*2 ä<aÖéüuOÌ¤5‘uC£\$:¦\$\0PõPÈvMBìQŸÅâNWÂJvhÄþÉ1:]Ž)?J;EÆqñø?Gñæ;§ž@^)%Á\$‰–úzƒJÀ\rÁ¼þ8>°èih\$2šˆ¨1þ:á\nÁpäM ù\r¾_Fé†,%Á·¨2Hb*%€¼(ð¦áÞy\$æ\0‡ÛÚÛ&ìŽÉ2tO	D|îD¨ƒJª#‚µJÀ¡~1éÀ(I!H–QŒÐÅ·QÊ¹#Ÿ–¤Ü]‚0T¦ø£?çG+jOg%?MÕôÑÚËs3¨9ª[UÚEC,’*wäJ(ód\"Ä‘íäÍEWûeá„ëœ”d)rAP§ê‹0…ÙLbìF«pˆC2o €;ØC*ûU„Òy¥•zbNÁÂQˆðÔ»¢	8Š²«%‹î¶‘ò*k#a’{\$¹Oš€LxQ-eØöÁEØ‹ôPÄ²=UAl­È³vD•°sK¤_×–BÝVáP´š¤Eé{Þ\r/´!\$#!ADk¡–Aø¬­zÆAX¿žªúG=¹7Eë eïØºFt¦1ƒdKÉ‰3ž¤ÜœÕ²+QJû'Tí¸³˜ÑÊ™Z±Ð”1ÒMê´VÔ2çžäÙá8)œup¬*ó@×ØðÕªž­Ñ¾íÄ-·K=InÁã›«WEC[ýk2q…D’+„A\"ÀA¥c)i€PRo¡Ò‘D`‰É&ªÔ™Q´1BÑSMÔSGØ¶¨C	r˜¨û—rô:‡\0áÖd°„\"ó\$úöËºèbìºà@Á˜f@É\$É ¦‰; ¸ªÅ½·F[É™5º‚|»\"c„A2¶\\#V8€‹4\0B¬ˆD‚‡æH©A	.ÊÄ)^l¨Lß:Ì Nœ‹±BfAŠ‹‰'û1åLáþäQ¡Ñ#ŠOk…Ú\\‹>E'*…h¡Ñ,ZÅSaJfÝ*Z ´>Œ˜V`»L¥0“Jl‘õÊe¾:.|%2p*Ë±O¦¥ã&¤â.ïž•­èý „ÄOÎH­»´ùW”2®¸d5ËËö1ê	‰MŸ9Ü¯[Ç‹Ù›DŠDÕ™”ïã@l¬9glÍo}à‘\n“sñ³Gš*Úe\"ÑBü”›ˆæy—¬ê-žúO¸‘v^òçTËñ]¡b[8È¢ “êVgÀì9¤¥ÄËˆ§¾'buú¾¯›x¡žu8l0†Ú¤ëždqˆmîRò=(±v\0V:Ù®vUñMÉ†øEf—ŠØÖ†J¾/²¬ã«“M÷Ô™­–B–RÉn7Ñ›£Hë½e¢·6ƒÚÙƒîg½£·¨Û·R·4u_(Øÿ\\HáÝúîBï©ç#œÌ_g¥¯*Ãï>žE¼V	ñš'›ÇCkïG‘ç¾PHð.Ñ\"\\«FåÊ®ú‚½Ñ‹š˜»¦õbóC«£‰ôK7Fž}}:O1¾‹ÔÃº8Û3pP}xë“(ßêâÅ*´y‚·ñ÷µ›¸Ä&hËÎ¶¨DYY›2.­¬?•’ž]\\Þºfþþªæ¶\"ÅxûÓ÷¨áó¼ãÏâþÇÖ••êVýšuœPT®àëîæÿÏ^cÎÖlÆØÿðÀp\0¬T²nµ\0ŒRÒÃ@ïPJ)7 –ÂCªU¤’d€¦…c‚.U§F†°Ö¡Xê2±„Äh/\0/ênúïçŠh°k*‡eð¸zúÇ*#ÁN\$«ìÅÆŠÑ£	¦»%âD±N&/j¸5d¦êŒñ®œqp²ƒ tÆØ.ºÛ\"‡äl¨Ç\0OM°À¨Ð h§ÏâÕ\\Å'¯ðö5ðyÏ€P\nO\rðúPŽòÞ„ööjîIPÇ‘±qØùùÂesQ Q¥ÝHnS\"HG:ÄðÒÏøsÀÎ“ÄÚMñìbMqVñ¿1_\n-„„HŒ;éÜ|K€õE¬­eP%PjƒX0Éì'qŠ5enÊÌH;+<VÍýcÖÙ¸9€Â¤\".%)\rŒq¬Wï‰­ðP„%Àœ>aJ €†-\0Øô¢Œ\\Æ·¤q\n(aBA„(×±\$\$‹”åIÔ/N>4¤zNÂ\n ¨ÀZº£ÂPª,Ë°þøJP‹)@#Â@nò&›ÆâÀf¤¤ªt‚šPÉ\nï\\/Át—°ù½Å7Ë3bŠ6¢ÎDªá*òïn3d”Q€°SêÈ­C#…,æ&bª˜Â#„?Œ2/mÞúOÖÞbUÄïú-ì¦/8óÇ'IN°‹šáµ&.žú/å+‰B\$ƒq+&2#o~ÿ/à½e²…¶[¥æø2ˆUL ‡\"vávmdÆ8N7Ž<à–¬¢i273õK¦'	î¿/p¾É¹/\nNáêôWŽÎDà%†E8P ô¥€\nÌ|ñ¾²>%°-RÔ7€ä\"¬¬¤>wGy&Ðªa^0 ˜¸„GãÚG¦¨QJ^â\nmjI1i¾4ht®“†ýD‚9²½„vp<p&‘3óB\r3FXž³P±j–	Úä²·ƒ:S5JîYl*»#F* ";break;case"zh":$g="ä^¨ês•\\šr¤îõâ|%ÌÂ:\$\nr.®„ö2Šr/d²È»[8Ð S™8€r©!T¡\\¸s¦’I4¢b§r¬ñ•Ð€Js!Kd²u´eåV¦©ÅDªX,#!˜Ðj6Ž §:¥t\nr£“îU:.Z²PË‘.…\rVWd^%äŒµ’r¡T²Ô¼*°s#UÕ`QdÞu'c(€ÜoF“±¤Øe3™Nb¦`êp2N™S¡ Ó£:LYñta~¨&6ÛŠ‹•r¶s®Ôükžó{¾”òf“qŸw¹ß-œ×ü\n–2‹Œ #*«B!@éL©N…zµÐ¨@F«÷:QQãW­àÏs¡~™r.“ndJ¥ÊX’¨ËŠ;.ÚM(ìbx¦¥¹dè*ŒcÚTÄAns–%ÙÊO-Ç3¨ì!J—ç1.[\$¹h´¤¹ÎVÈÉdŒDcìMœ¤Al²¤‹‚N-9@€§)6_¥éDî’ë£Þs–eÛ‚‡%ÊyPœ¤Ìž÷B¥ºF­ys”\nZÃ±()tI¬„Ì4^’­ÙÌF'<Ý\$Î'I\0DœÄYS1RZLÇ9H]8\$™ÌO±\\s…ÉÐSÒ1}GR’ê¥)v]PJ2ÐE%“Ôù?H%í\0\$Ý*H	i Nå¤–“—g1¡—¤iÎ^•ÉiÀD}`L©öKÆFr4Vž%ÅaÍBPÅÓÀHG1ÙÊE€#£`ØÒ6Lø@9ŒcÜ\nbˆ˜r’(ñvñ9Uo•)DO\$=”þg)xôœ»sLR5rÍxarsÁyeG1Å?ŠbØÑ‡Íg1LA4Ìs¤·0—Ž®Xrë>3ORtÏ@ÍSf9ƒYUTúTC`è91¬x@0ŽL¨Þ3Ãc˜2¶§1fT\$£Ò*\rìÀÛw!\0ê7c¨Æ1´C˜Ír„`Þ3¹ƒ˜XÒZèÂ3Œ.`A»µ Úæ­XP9…:‹\0†)ŠB0@“”‡9F*Ø	’S¤y#=&«©ÊF’°V§ª­¸Eì`§²#xÝRÁÏ±!‘³ãÉr“´ßÎ®âhÂ9µc“3ÝŽc¸Þ9Tƒ(ð8\r:HÈàÂÈé#0z\r è8aÐ^Žþè\\0Œ›ØÜ2ŽAw†3…ã(Ýô\r^ÁÔýaÐ94#§¦/¶wpÖÂHÚøm}AÐðÂŠ1£€F´7ªCJØk2¡¤:—ÈÖßn†ÕÓ‡0æü(¿£¤P‹±Ð(…Y	èMäò\0-åÄN'Á(+Óšu'@€(€ !ÿH¢>žâ\"\n9()Á‰QÌji1ƒ [W\\K‰20\$Ô›“‘ˆ0®ª€ˆò¬yòÿ[â‚˜À’DÃËF¥Rx*ßT5Æ¤‡êh ¨fA¼6‚\0‚øZ{¾5¯¨6Õ\r\${wæ„Ú“ö);\n<)…H€ÇÌY+f< ‰£ÄAz	è×A\0é«	b/Eì)aŽ2µÕšvÔø8 A¤3‚â\0f3ÆTÎ¼ðŒ!úîT¥ÿ¼8+&Lƒ±à9GÊZ –j«s\n°+ÅÈ\n	á8P T³ªv@Š,òE‚^0‹T¾Zx‚Pý!¤8¬¨¿b™X'¸I:B eÁ…rÁPìCd%®|Cˆ¢0.À¸ÐF3\0`¨øŠ\"¢îˆºVY8»<‰a)Ø€“1ˆ5êgNYŒgÉú &ÆfÆÄ±ˆ”äñ‹ñ69Å@‹G)5MŽQ&#)dGH@&bŽEM7‚±Ä‘x#YëBpô(DSk·Biv²‡3º-Ü¡-œÃ–t56ÃHz (!È@àßl§3áŒÕ†CºwÏ\n°¢y©	VvÅâš”RÕø÷Õ2È®˜2qa*=H«‘EhIhºM¨ñ@!Ø‘-èhE\nc8„¢ÅRbš«	³gDCf¢žÞ9k~ZØº Âht‰1|9„qƒ/l˜×¦ZÅÑ`ªIg“°Jº¢¨ê!.!`<B Aa GçÈMGi&X7ÇsN&°eyd´OŠSÉiÙ‹U*ŒðA)%ü¿Â¼QÁOI5%âUØ·A„x—I\"Är‰1a ‰–Î2Š¼IfeÆþßúxè–ú%8<P¹ï‰ñ¨\n	“RlH0ï]Y(#ä„P¢zSEÁ \$X”s²hYÄíþ_IUo¥„´‚¸eYQ+Ûü‚-«ö“/¤´%Ê&Ã”@‰ÁÌ+UØ»«]B¨|yyhÊTG£1Ì.!‘8Åè¾¨ ìêG6@RPñÏkiÚÂlZ9M¤¾/:†KŠä¦tU><);H‹+F¦u& §·T’Ä?íæb9X±0M… åðî©Q¢Ê-Èç_3!±u†»-;SÚ[@/Á,´Ö†‚ì\$™ÇM	¡q(´	„)Å†Ë§º2¢êW%-’þåÕWuÊy³XK¨:fà³J‹¸´]?b¬óRîÍ÷f5Vð²ñ˜»Ž` ÐÙ»l@Gâ^\rÂ\"5gÂÔ“á¼;‡÷^¢×3†qê]ámøï¸\\‚Ü «UTÇ(’š>×~Q¡\"µâèñpByY:”ûU;¦*9dååÂ K‘ñËÌ!)r@¢àUm= tHÈ”Ú‡º/SŽ†êÓ<rÜÚÎZÍ·hVÖÏnñi•šHû÷)5+Úù4íÊZïU?ÜÒ>øãWx¦qîÎ¦{á(í—À’’ï¼<)Ýð‚êï­æ[r‰e	PW±]IDBÜ9„›ÃuO7Éá*j¨ðÎýÚ=Y>\ršzŸKêü?R,ÁWv\$ë®ßŠõ¢ÚîÇî*MêBlOsÍ‡¨tgª~±Oü®‰éÔÏÎæ3¬žËÝ®WÖèëF|o™°(0‹úžÈ\\üot§ÿ7 í·ÞÛÿ ¤mßíK_øÜoçì{Gõ·Ù_ßþÏì=ìÔE\$Vñ/Ôû«ÊïÞü°ûêæBÃ	v\rôáO^`a¦æR-têfÀƒ¶Fë¶Év¦ìàœžGBÐ¡b&ÁB(Ë80HIl,;m:ªÌ4:¬8ÃÃf†\r€V‘ÀÒ`ÖT˜*.£#XkH\r Ìk¨(6 Œ™h §x˜H&u`ª\n€Œ pÔpš9£jâljô^e£ú‚4#z¨aR<‹üS`›	°Ÿ!f†.!Ï-9Ô>Ž€8âø¹«žº&P:ÏÉMtŠ„!j!:Ih°!-h	€Þ|˜9Ñ4˜\0Úxc*5#b%¡t.jeÄ€Åí\0,¦j.­JzŠVÕ«8ôIïÝÏ¦qp\n…Ò¾#\$2°‘€Þ\0èÇ‹¿m^åNðRî~IÄÅn´ÉN-\r ÖMh”í²¡At¡Žœ±¾¡kÂ1Q`E\$fÌlwGz\r*0°+ô\0¬¾\0î@¬ Æ ê\r¢0‚¤,×¥µaÌgB¿¥&\$ÀÏáÇªVG%:¬ÖÁÞñiÊcÅº°†’5C*kqß1š:±îúCÆàñÌçäæåÂ\0\$T@	\0t	 š@¦\n`";break;case"zh-tw":$g="ä^¨ê%Ó•\\šr¥ÑÎõâ|%ÌÎu:HçB(\\Ë4«‘pŠr –neRQÌ¡D8Ð S•\nt*.tÒI&”G‘N”ÊAÊ¤S¹V÷:	t%9Sy:\"<r«STâ ,#!˜Ðj6Ž1uL\0¼–£“îU:.–²I9“ˆ—BÍæK&]\nDªXç[ªÅ}-,°r¨“ÖûÎöŒ¿‹&ó¨€Ða;Dãx€àr4&Ã)œÊs3§SÂtÍ\rAÐÂbÒ¥¨E•E1»ÞÔ£Êg:åxç]#0, (§˜4›Œü\r÷ñˆÅG‘qäZ†–¢SÅ )ÐªOLP\0¨ýÎ”«:}µï»áÚr¢òå´yZî¤se¢\\BœÅABs–¤ @¤2*bPr–î\n¦ª²/kÞÁ)ÒP“Ç)<·Ä©p¨’êY.R®DùÌLGI,I¥¥i.Oc’t’\0F¢å±dtì)Ê\\—È*ð’ëÛâ»/ÉÊ]g9f]Á…‹Ø^K’ LªÇ)pYÊr•ä2´.«ºó)•h¹2]¥Å*–X!rBœóœê\$	qól£@%yÎRPa s-¯a~WÄ¡r’GALKIÔ•)KPËÍ:ë±\$ñÒPO„Ù\\‡Œ\0Ä<¶@æÐ–åìJ\\PÙr’B–HŠÜreÙÌBñùÎ^Õg1IJd}\0Lª1TP\$ñÌ\\u¢xŸ àP¨2 @t’¥¼¦S%¤Z:^“€PŒ:ƒcRÛ´\0æ1Œ#sœ(‰‡)\"^Ù)ÐC•G-ånÔªYIÆKqÊÞ7Ôõ*\\Ô2”©T…D¾QÔ†,]Ñ¯ž;'d´Ž;8Äñm“)ebvž¥¤a_?œ¹ÑÊC—InPsåYô¾<Ú4á¤ÍÚ9Q–­Ô\rIàPØ:L“(#“47ŒÃ0ØèŒ­Ôû:h0ÞÎ¸ò£pæ:ŒcN9Œ×À@6\rã;¢9…Hå·Œ#8Âè„@KV®ˆëXÖ{23‘	¤!ŠbŒÔãXÊ7/Ï‘täk¯>—‘â`¾¤±]‘	ñOìùùtÈŠ{¸Ò7Á(YP\$tZ†IÓ0ý©\nR²\"hÂ9¶“=çŽc¸Þ9U·@à4ëÃ \\ƒ-¯ÁèD4ƒ à9‡Ax^;þpÂ2q£pÊ9Þ¸ÎóÿåÒçÃ›»\rÀ¼/°äiƒ£ææá€†°D‚Hm6¹ðèxaÈ<ÔASdÕiª\rµÏ8•Ô»m~Á¸:§rà¼wÂý\n:«¢UÚ\"FÒ@è% Ó\\„JÈi)JŠñÌ#Å£–\n ( D!PB\nA‚†‚CL?rbUÊ“QÌ!„ˆè±„•žal‡„Ž%ÄÀ™9dP9…pµWn¢Fa8 	ùA,î„ùªQÊ\"…¡\$3\0òÖÃ iU¦qu7?M™¨kÁÄ:šuÔƒo\r € ¿FÈô“Ÿ¾IcS&^™¦7A@'…0¨x¤a¥\0¿-ñ6P£KFÂ!N!Ù\r\" à rÄÄVb ãi“2¬ÞšÆøüÚâ®\r!œ61£3F‰ñ`¨ànU¡¦	=uÔdü¡”rX9—ðKE –‚øC‘-JX %	 ðœ¨P*PA\0D¡0\"ÐÔ˜°\0åâ\r]ÑÎL”B!Djv®õj.8…A2†`Â¾Pv!²NžaP.Ç@§fì	ã´wñà'DP]žÁp\"ê!âìòxÇD#/J†F©C¤*~O™†E©(JªÐ™J0õ}2‰QÎ\$P¨kTü¤Ö:pŠWd\\EˆÌ!KqHâ\$D!XCÑH]b\0G¼§bXˆ‘n'*˜#!EV\0¤(JuÌ‰OãšPF˜”TèS\r!è2€ ‡(ƒƒ´®äÒ3`\rY<±ÊL¶ŒËª-¨DU)•6§Y[H­¤\\Z\n!Ê/XäRllsÜ[rgàæB@‹ª¤&Y\0¹§’|Ï¹û?Ï0§ r¦\nÀÑ]9¼bd^^R¬9“ÂzCÂ\0Q¨ãÌ/;i³—´^-j?ZÅÒÖ‚èí‹±mgËÍç>hhø„:¨`T!\$	8ýÃI§kxÍ†ù*k„î¯x¥‰ñJ:H¢u¼OŽ–tyÏ+‹\0¼*ÃKDø·1ã›bDÂ[Äqf>±z,GHŸñ¹°f.Å%gxäÇ™~©Õøˆ#—*\nƒÕj@x÷ålº#\0PL“ÀJîÊY%)¤è‹<âN\nqÎ®üs‹a'!Ðˆo+ê|—õîH/\0PÉ¢â_HDXÜ¹Ž²ö”WëDä`9tæ¢ˆ–ˆ4<¢T^œÅâ¨Rä L-Í¸B±p‡ªÑ0&\rˆQP:Dñ:1TŠç *ÅMwã˜M‹C¯JG:ªÊÈUR­ ª¤Q,Ï™ûdÕ«‚_cnßw÷)O‹š©mÝbÜŒos´ÔG©Ï@‚9@\n!3	h?*üFë4@ˆ˜°ˆß‡¯}Ž]û¼Öù%»ªå©k›q®D?¹×!Ò.%âêì]ÂèSFZ\$mKUUßíÚ·r½—0ù:ŒU]¦oZEi©Ã—î¶CÌêŸ(æ7¥¥1þJx&ßj¼ró¾…nY75á¬st4þ‘nù@‘½¢=8ßúØ…vFgÈAÇìŒ’r_?¶Dþ}OÉü-zVåì—{³ôNwÚû4ÿC7FéÖÑÊ\$ŽUÖ	HýXh©ÄA.ñ#h¢q r‰«â¼âFŸÞ»â7Ï]þD„\0€¸}Ï8dxJ\\ô7m¹Ÿ”ð%KÇek»ÜhÑRïoÝ›¶b™yúáhû¥©…4§çDèkÛ[ÿsÊ*¿;÷¾ãpm¯…o}ºìG“àQmÚXßÍY?às\nÃô°2écô_¯>š€Õ­H²Q:C‡0¯ZÞ8ƒÉ†O…ðŒbè[Ùòn­€~‚–*\"CûˆþÜ¬/öÿ¯´íEr®nl'‚¿ì­p\nDÐTâ|*Oú%¡6D\"DñjFùj´­ƒôÿëÑ.ÿ!scpApOAIÃçJRÐYíÿ*®÷mZ¼KÈLD½Pvø¯êèÐt½‹Ý&9kÚ¼Ï¼½}‹ÌEäbFdtùÏëCP®ÁÐ²ú°–ÁcêCp¸2 yàÐÄb.­Eª)a¯¦lhAD©¬dÌ@@\n	BnÈ`N)p‡\$MDÔÐ…\naz\"áp¢\\,ÀwÄ\"ák\rFUŒÄÚíŒãöëì”2 †k\0ØiX\r Æ\r`@†GÄ¦Jh6&Ø„\0ÒÆÞžtÉÄ„`êz\\3G\n ¨ÀZ\0@sàÇÃ¤7NJgÇ–Èl¼ŒB4#ŠºjŒPHnš@›Ñ`P.ÐÖ\rt9ƒ\nã–×„x¾«r»Ð«)hþ¯â;…N,Ò\rçæ:#¦	‘äq‡®3C\\6Æ\$®Âæd¡<^­–ÖáÎ,­¾åáÐ¡¨’Ü.šÛlÿÑÏfÏ¡&(E!ðp2 ¨_Œ42ã3)T\rààŒÖ´ŒHÜNðøo”*ªªÅˆXÂZ¹\ræÁ2ãJLó.(¤®9&Ò\nÓ,\"ÌwÇœz Ò¦kFÄ`@\nÌ2à\nÀÂ`ê ÛA\0 fg¡,<!f+¨SxNÍÉRÖÄø,£Í!Jˆ?#¡l Á¬’Ô©cÍ\"R(f¼5ã4m²)PD²å¤PñÁÌ™Ð FDh	\0@š	 t\n`¦";break;}$vh=array();foreach(explode("\n",lzw_decompress($g))as$X)$vh[]=(strpos($X,"\t")?explode("\t",$X):$X);return$vh;}if(!$vh)$vh=get_translations($ca);if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$wf=array_search("SQL",$b->operators);if($wf!==false)unset($b->operators[$wf]);}function
dsn($cc,$V,$G){try{parent::__construct($cc,$V,$G);}catch(Exception$uc){auth_error($uc->getMessage());}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($H,$Ch=false){$I=parent::query($H);$this->error="";if(!$I){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($I);return$I;}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result($I=null){if(!$I){$I=$this->_result;if(!$I)return
false;}if($I->columnCount()){$I->num_rows=$I->rowCount();return$I;}$this->affected_rows=$I->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($H,$o=0){$I=$this->query($H);if(!$I)return
false;$K=$I->fetch();return$K[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$K=(object)$this->getColumnMeta($this->_offset++);$K->orgtable=$K->table;$K->orgname=$K->name;$K->charsetnr=(in_array("blob",(array)$K->flags)?63:0);return$K;}}}$Xb=array();class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($Q,$M,$Z,$Xc,$We=array(),$z=1,$E=0,$Df=false){global$b,$w;$Ad=(count($Xc)<count($M));$H=$b->selectQueryBuild($M,$Z,$Xc,$We,$z,$E);if(!$H)$H="SELECT".limit(($_GET["page"]!="last"&&+$z&&$Xc&&$Ad&&$w=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$M)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Xc&&$Ad?"\nGROUP BY ".implode(", ",$Xc):"").($We?"\nORDER BY ".implode(", ",$We):""),($z!=""?+$z:null),($E?$z*$E:0),"\n");$Hg=microtime(true);$J=$this->_conn->query($H);if($Df)echo$b->selectQuery($H,format_time($Hg));return$J;}function
delete($Q,$Mf,$z=0){$H="FROM ".table($Q);return
queries("DELETE".($z?limit1($H,$Mf):" $H$Mf"));}function
update($Q,$O,$Mf,$z=0,$ug="\n"){$Th=array();foreach($O
as$x=>$X)$Th[]="$x = $X";$H=table($Q)." SET$ug".implode(",$ug",$Th);return
queries("UPDATE".($z?limit1($H,$Mf):" $H$Mf"));}function
insert($Q,$O){return
queries("INSERT INTO ".table($Q).($O?" (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$L,$Bf){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$Xb["sqlite"]="SQLite 3";$Xb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$zf=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($Ic){$this->_link=new
SQLite3($Ic);$Wh=$this->_link->version();$this->server_info=$Wh["versionString"];}function
query($H){$I=@$this->_link->query($H);$this->error="";if(!$I){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($I->numColumns())return
new
Min_Result($I);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($H,$o=0){$I=$this->query($H);if(!is_object($I))return
false;$K=$I->_result->fetchArray();return$K[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($Ic){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Ic);}function
query($H,$Ch=false){$re=($Ch?"unbufferedQuery":"query");$I=@$this->_link->$re($H,SQLITE_BOTH,$n);$this->error="";if(!$I){$this->error=$n;return
false;}elseif($I===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($I);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($H,$o=0){$I=$this->query($H);if(!is_object($I))return
false;$K=$I->_result->fetch();return$K[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;if(method_exists($I,'numRows'))$this->num_rows=$I->numRows();}function
fetch_assoc(){$K=$this->_result->fetch(SQLITE_ASSOC);if(!$K)return
false;$J=array();foreach($K
as$x=>$X)$J[($x[0]=='"'?idf_unescape($x):$x)]=$X;return$J;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$sf='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($sf\\.)?$sf\$~",$C,$B)){$Q=($B[3]!=""?$B[3]:idf_unescape($B[2]));$C=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($Ic){$this->dsn(DRIVER.":$Ic","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");}function
select_db($Ic){if(is_readable($Ic)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Ic)?$Ic:dirname($_SERVER["SCRIPT_FILENAME"])."/$Ic")." AS a")){parent::__construct($Ic);return
true;}return
false;}function
multi_query($H){return$this->_result=$this->query($H);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$L,$Bf){$Th=array();foreach($L
as$O)$Th[]="(".implode(", ",$O).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($L))).") VALUES\n".implode(",\n",$Th));}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($H,$Z,$z,$D=0,$ug=" "){return" $H$Z".($z!==null?$ug."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($H,$Z){global$h;return($h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($H,$Z,1):" $H$Z");}function
db_collation($m,$nb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($l){return
array();}function
table_status($C=""){global$h;$J=array();foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$K){$K["Oid"]=1;$K["Auto_increment"]="";$K["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($K["Name"]));$J[$K["Name"]]=$K;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$K)$J[$K["name"]]["Auto_increment"]=$K["seq"];return($C!=""?$J[$C]:$J);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$h;$J=array();$Bf="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$K){$C=$K["name"];$U=strtolower($K["type"]);$Lb=$K["dflt_value"];$J[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$Lb,$B)?str_replace("''","'",$B[1]):($Lb=="NULL"?null:$Lb)),"null"=>!$K["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$K["pk"],);if($K["pk"]){if($Bf!="")$J[$Bf]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$J[$C]["auto_increment"]=true;$Bf=$C;}}$Fg=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Fg,$de,PREG_SET_ORDER);foreach($de
as$B){$C=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($J[$C])$J[$C]["collation"]=trim($B[3],"'");}return$J;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$Fg=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*")++)~i',$Fg,$B)){$J[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$de,PREG_SET_ORDER);foreach($de
as$B){$J[""]["columns"][]=idf_unescape($B[2]).$B[4];$J[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$J){foreach(fields($Q)as$C=>$o){if($o["primary"])$J[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$Gg=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$i);foreach(get_rows("PRAGMA index_list(".table($Q).")",$i)as$K){$C=$K["name"];$u=array("type"=>($K["unique"]?"UNIQUE":"INDEX"));$u["lengths"]=array();$u["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$i)as$kg){$u["columns"][]=$kg["name"];$u["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Gg[$C],$Xf)){preg_match_all('/("[^"]*+")+( DESC)?/',$Xf[2],$de);foreach($de[2]as$x=>$X){if($X)$u["descs"][$x]='1';}}if(!$J[""]||$u["type"]!="UNIQUE"||$u["columns"]!=$J[""]["columns"]||$u["descs"]!=$J[""]["descs"]||!preg_match("~^sqlite_~",$C))$J[$C]=$u;}return$J;}function
foreign_keys($Q){$J=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$K){$q=&$J[$K["id"]];if(!$q)$q=$K;$q["source"][]=$K["from"];$q["target"][]=$K["to"];}return$J;}function
view($C){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($C))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($C){global$h;$Cc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Cc)\$~",$C)){$h->error=lang(21,str_replace("|",", ",$Cc));return
false;}return
true;}function
create_database($m,$d){global$h;if(file_exists($m)){$h->error=lang(22);return
false;}if(!check_sqlite_name($m))return
false;try{$_=new
Min_SQLite($m);}catch(Exception$uc){$h->error=$uc->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$h;$h->__construct(":memory:");foreach($l
as$m){if(!@unlink($m)){$h->error=lang(22);return
false;}}return
true;}function
rename_database($C,$d){global$h;if(!check_sqlite_name($C))return
false;$h->__construct(":memory:");$h->error=lang(22);return@rename(DB,$C);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$nf){$Nh=($Q==""||$Mc);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Nh=true;break;}}$c=array();$ef=array();foreach($p
as$o){if($o[1]){$c[]=($Nh?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$ef[$o[0]]=$o[1][0];}}if(!$Nh){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$C&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($Q,$C,$c,$ef,$Mc))return
false;if($La)queries("UPDATE sqlite_sequence SET seq = $La WHERE name = ".q($C));return
true;}function
recreate_table($Q,$C,$p,$ef,$Mc,$v=array()){if($Q!=""){if(!$p){foreach(fields($Q)as$x=>$o){$p[]=process_field($o,$o);$ef[$x]=idf_escape($x);}}$Cf=false;foreach($p
as$o){if($o[6])$Cf=true;}$ac=array();foreach($v
as$x=>$X){if($X[2]=="DROP"){$ac[$X[1]]=true;unset($v[$x]);}}foreach(indexes($Q)as$Jd=>$u){$f=array();foreach($u["columns"]as$x=>$e){if(!$ef[$e])continue
2;$f[]=$ef[$e].($u["descs"][$x]?" DESC":"");}if(!$ac[$Jd]){if($u["type"]!="PRIMARY"||!$Cf)$v[]=array($u["type"],$Jd,$f);}}foreach($v
as$x=>$X){if($X[0]=="PRIMARY"){unset($v[$x]);$Mc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$Jd=>$q){foreach($q["source"]as$x=>$e){if(!$ef[$e])continue
2;$q["source"][$x]=idf_unescape($ef[$e]);}if(!isset($Mc[" $Jd"]))$Mc[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($p
as$x=>$o)$p[$x]="  ".implode($o);$p=array_merge($p,array_filter($Mc));if(!queries("CREATE TABLE ".table($Q!=""?"adminer_$C":$C)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($ef&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$ef).") SELECT ".implode(", ",array_map('idf_escape',array_keys($ef)))." FROM ".table($Q)))return
false;$zh=array();foreach(triggers($Q)as$xh=>$kh){$wh=trigger($xh);$zh[]="CREATE TRIGGER ".idf_escape($xh)." ".implode(" ",$kh)." ON ".table($C)."\n$wh[Statement]";}if(!queries("DROP TABLE ".table($Q)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$v))return
false;foreach($zh
as$wh){if(!queries($wh))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$U,$C,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$Bf){if($Bf[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($Yh){return
apply_queries("DROP VIEW",$Yh);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$Yh,$bh){return
false;}function
trigger($C){global$h;if($C=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$t='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$yh=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$t\\s*(".implode("|",$yh["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($t))?\\s+ON\\s*$t\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$B);$Fe=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($Fe?" OF":""),"Of"=>($Fe[0]=='`'||$Fe[0]=='"'?idf_unescape($Fe):$Fe),"Trigger"=>$C,"Statement"=>$B[4],);}function
triggers($Q){$J=array();$yh=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$K){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$yh["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$K["sql"],$B);$J[$K["name"]]=array($B[1],$B[2]);}return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){}function
routines(){}function
routine_languages(){}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$H){return$h->query("EXPLAIN QUERY PLAN $H");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($og){return
true;}function
create_sql($Q,$La){global$h;$J=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$C=>$u){if($C=='')continue;$J.=";\n\n".index_sql($Q,$u['type'],$C,"(".implode(", ",array_map('idf_escape',$u['columns'])).")");}return$J;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($Gb){}function
trigger_sql($Q,$Mg){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$h;$J=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$x)$J[$x]=$h->result("PRAGMA $x");return$J;}function
show_status(){$J=array();foreach(get_vals("PRAGMA compile_options")as$Te){list($x,$X)=explode("=",$Te,2);$J[$x]=$X;}return$J;}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($Fc){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Fc);}$w="sqlite";$Bh=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Lg=array_keys($Bh);$Ih=array();$Re=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Uc=array("hex","length","lower","round","unixepoch","upper");$Zc=array("avg","count","count distinct","group_concat","max","min","sum");$fc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Xb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$zf=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($qc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$G){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($G,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Wh=pg_version($this->_link);$this->server_info=$Wh["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
select_db($Gb){global$b;if($Gb==$b->database())return$this->_database;$J=@pg_connect("$this->_string dbname='".addcslashes($Gb,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($J)$this->_link=$J;return$J;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($H,$Ch=false){$I=@pg_query($this->_link,$H);$this->error="";if(!$I){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($I)){$this->affected_rows=pg_affected_rows($I);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$o=0){$I=$this->query($H);if(!$I||!$I->num_rows)return
false;return
pg_fetch_result($I->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=pg_num_rows($I);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;if(function_exists('pg_field_table'))$J->orgtable=pg_field_table($this->_result,$e);$J->name=pg_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=pg_field_type($this->_result,$e);$J->charsetnr=($J->type=="bytea"?63:0);return$J;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($N,$V,$G){global$b;$m=$b->database();$P="pgsql:host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$P dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",$V,$G);return
true;}function
select_db($Gb){global$b;return($b->database()==$Gb);}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$L,$Bf){global$h;foreach($L
as$O){$Jh=array();$Z=array();foreach($O
as$x=>$X){$Jh[]="$x = $X";if(isset($Bf[idf_unescape($x)]))$Z[]="$x = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Jh)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).")")))return
false;}return
true;}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$k=$b->credentials();if($h->connect($k[0],$k[1],$k[2])){if($h->server_info>=9)$h->query("SET application_name = 'Adminer'");return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database ORDER BY datname");}function
limit($H,$Z,$z,$D=0,$ug=" "){return" $H$Z".($z!==null?$ug."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($H,$Z){return" $H$Z";}function
db_collation($m,$nb){global$h;return$h->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$H="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$H.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$H.="
ORDER BY 1";return
get_key_vals($H);}function
count_tables($l){return
array();}function
table_status($C=""){$J=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' WHEN 'mv' THEN 'materialized view' WHEN 'f' THEN 'foreign table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids::int AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v','mv','f')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
".($C!=""?"AND relname = ".q($C):"ORDER BY relname"))as$K)$J[$K["Name"]]=$K;return($C!=""?$J[$C]:$J);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$J=array();$Ca=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$K){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$K["full_type"],$B);list(,$U,$y,$K["length"],$wa,$Fa)=$B;$K["length"].=$Fa;$cb=$U.$wa;if(isset($Ca[$cb])){$K["type"]=$Ca[$cb];$K["full_type"]=$K["type"].$y.$Fa;}else{$K["type"]=$U;$K["full_type"]=$K["type"].$y.$wa.$Fa;}$K["null"]=!$K["attnotnull"];$K["auto_increment"]=preg_match('~^nextval\\(~i',$K["default"]);$K["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$K["default"],$B))$K["default"]=($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2];$J[$K["field"]]=$K;}return$J;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$Ug=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Ug AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $Ug AND ci.oid = i.indexrelid",$i)as$K){$Yf=$K["relname"];$J[$Yf]["type"]=($K["indisprimary"]?"PRIMARY":($K["indisunique"]?"UNIQUE":"INDEX"));$J[$Yf]["columns"]=array();foreach(explode(" ",$K["indkey"])as$qd)$J[$Yf]["columns"][]=$f[$qd];$J[$Yf]["descs"]=array();foreach(explode(" ",$K["indoption"])as$rd)$J[$Yf]["descs"][]=($rd&1?'1':null);$J[$Yf]["lengths"]=array();}return$J;}function
foreign_keys($Q){global$Me;$J=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$K){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$K['definition'],$B)){$K['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$ce)){$K['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ce[2]));$K['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ce[4]));}$K['target']=array_map('trim',explode(',',$B[3]));$K['on_delete']=(preg_match("~ON DELETE ($Me)~",$B[4],$ce)?$ce[1]:'NO ACTION');$K['on_update']=(preg_match("~ON UPDATE ($Me)~",$B[4],$ce)?$ce[1]:'NO ACTION');$J[$K['conname']]=$K;}}return$J;}function
view($C){global$h;return
array("select"=>$h->result("SELECT pg_get_viewdef(".q($C).")"));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$h;$J=h($h->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$J,$B))$J=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\\1<b>\\2</b>',$B[2]).$B[4];return
nl_br($J);}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($l){global$h;$h->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($C,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($C));}function
auto_increment(){return"";}function
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$nf){$c=array();$Lf=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Sh=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($Q!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$Lf[]="ALTER TABLE ".table($Q)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Sh!="")$Lf[]="COMMENT ON COLUMN ".table($Q).".$X[0] IS ".($Sh!=""?substr($Sh,9):"''");}}$c=array_merge($c,$Mc);if($Q=="")array_unshift($Lf,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Lf,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""&&$Q!=$C)$Lf[]="ALTER TABLE ".table($Q)." RENAME TO ".table($C);if($Q!=""||$rb!="")$Lf[]="COMMENT ON TABLE ".table($C)." IS ".q($rb);if($La!=""){}foreach($Lf
as$H){if(!queries($H))return
false;}return
true;}function
alter_indexes($Q,$c){$j=array();$Yb=array();$Lf=array();foreach($c
as$X){if($X[0]!="INDEX")$j[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Yb[]=idf_escape($X[1]);else$Lf[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($j)array_unshift($Lf,"ALTER TABLE ".table($Q).implode(",",$j));if($Yb)array_unshift($Lf,"DROP INDEX ".implode(", ",$Yb));foreach($Lf
as$H){if(!queries($H))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($Yh){return
drop_tables($Yh);}function
drop_tables($S){foreach($S
as$Q){$Ig=table_status($Q);if(!queries("DROP ".strtoupper($Ig["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$Yh,$bh){foreach(array_merge($S,$Yh)as$Q){$Ig=table_status($Q);if(!queries("ALTER ".strtoupper($Ig["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($bh)))return
false;}return
true;}function
trigger($C){if($C=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$L=get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = '.q($_GET["trigger"]).' AND trigger_name = '.q($C));return
reset($L);}function
triggers($Q){$J=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($Q))as$K)$J[$K["trigger_name"]]=array($K["condition_timing"],$K["event_manipulation"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routines(){return
get_rows('SELECT p.proname AS "ROUTINE_NAME", p.proargtypes AS "ROUTINE_TYPE", pg_catalog.format_type(p.prorettype, NULL) AS "DTD_IDENTIFIER"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema()
ORDER BY p.proname');}function
routine_languages(){return
get_vals("SELECT langname FROM pg_catalog.pg_language");}function
last_id(){return
0;}function
explain($h,$H){return$h->query("EXPLAIN $H");}function
found_rows($R,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Xf))return$Xf[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($ng){global$h,$Bh,$Lg;$J=$h->query("SET search_path TO ".idf_escape($ng));foreach(types()as$U){if(!isset($Bh[$U])){$Bh[$U]=0;$Lg[lang(23)][]=$U;}}return$J;}function
use_sql($Gb){return"\connect ".idf_escape($Gb);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){global$h;return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".($h->server_info<9.2?"procpid":"pid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($Fc){global$h;return
preg_match('~^(database|table|columns|sql|indexes|comment|view|'.($h->server_info>=9.3?'materializedview|':'').'scheme|processlist|sequence|trigger|type|variables|drop_col)$~',$Fc);}$w="pgsql";$Bh=array();$Lg=array();foreach(array(lang(24)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(25)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(26)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(27)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(28)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(29)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$x=>$X){$Bh+=$X;$Lg[$x]=array_keys($X);}$Ih=array();$Re=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Uc=array("char_length","lower","round","to_hex","to_timestamp","upper");$Zc=array("avg","count","count distinct","max","min","sum");$fc=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Xb["oracle"]="Oracle";if(isset($_GET["oracle"])){$zf=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($qc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$G){$this->_link=@oci_new_connect($V,$G,$N,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($Gb){return
true;}function
query($H,$Ch=false){$I=oci_parse($this->_link,$H);$this->error="";if(!$I){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$J=@oci_execute($I);restore_error_handler();if($J){if(oci_num_fields($I))return
new
Min_Result($I);$this->affected_rows=oci_num_rows($I);}return$J;}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$o=1){$I=$this->query($H);if(!is_object($I)||!oci_fetch($I->_result))return
false;return
oci_result($I->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$x=>$X){if(is_a($X,'OCI-Lob'))$K[$x]=$X->load();}return$K;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;$J->name=oci_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=oci_field_type($this->_result,$e);$J->charsetnr=(preg_match("~raw|blob|bfile~",$J->type)?63:0);return$J;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($N,$V,$G){$this->dsn("oci:dbname=//$N;charset=AL32UTF8",$V,$G);return
true;}function
select_db($Gb){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$k=$b->credentials();if($h->connect($k[0],$k[1],$k[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($H,$Z,$z,$D=0,$ug=" "){return($D?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $H$Z) t WHERE rownum <= ".($z+$D).") WHERE rnum > $D":($z!==null?" * FROM (SELECT $H$Z) WHERE rownum <= ".($z+$D):" $H$Z"));}function
limit1($H,$Z){return" $H$Z";}function
db_collation($m,$nb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($C=""){$J=array();$pg=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $pg":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $pg":"")."
ORDER BY 1")as$K){if($C!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$J=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)." ORDER BY column_id")as$K){$U=$K["DATA_TYPE"];$y="$K[DATA_PRECISION],$K[DATA_SCALE]";if($y==",")$y=$K["DATA_LENGTH"];$J[$K["COLUMN_NAME"]]=array("field"=>$K["COLUMN_NAME"],"full_type"=>$U.($y?"($y)":""),"type"=>strtolower($U),"length"=>$y,"default"=>$K["DATA_DEFAULT"],"null"=>($K["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$J;}function
indexes($Q,$i=null){$J=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($Q)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$K){$od=$K["INDEX_NAME"];$J[$od]["type"]=($K["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($K["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$J[$od]["columns"][]=$K["COLUMN_NAME"];$J[$od]["lengths"][]=($K["CHAR_LENGTH"]&&$K["CHAR_LENGTH"]!=$K["COLUMN_LENGTH"]?$K["CHAR_LENGTH"]:null);$J[$od]["descs"][]=($K["DESCEND"]?'1':null);}return$J;}function
view($C){$L=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($C));return
reset($L);}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$H){$h->query("EXPLAIN PLAN FOR $H");return$h->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$nf){$c=$Yb=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$Yb[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$Yb||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$Yb).")"))&&($Q==$C||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($C)));}function
foreign_keys($Q){$J=array();$H="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($H)as$K)$J[$K['NAME']]=array("db"=>$K['DEST_DB'],"table"=>$K['DEST_TABLE'],"source"=>array($K['SRC_COLUMN']),"target"=>array($K['DEST_COLUMN']),"on_delete"=>$K['ON_DELETE'],"on_update"=>null,);return$J;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Yh){return
apply_queries("DROP VIEW",$Yh);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($og){global$h;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($og));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$L=get_rows('SELECT * FROM v$instance');return
reset($L);}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($Fc){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Fc);}$w="oracle";$Bh=array();$Lg=array();foreach(array(lang(24)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(25)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(26)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(27)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$x=>$X){$Bh+=$X;$Lg[$x]=array_keys($X);}$Ih=array();$Re=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Uc=array("length","lower","round","upper");$Zc=array("avg","count","count distinct","max","min","sum");$fc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Xb["mssql"]="MS SQL";if(isset($_GET["mssql"])){$zf=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($N,$V,$G){$this->_link=@sqlsrv_connect($N,array("UID"=>$V,"PWD"=>$G,"CharacterSet"=>"UTF-8"));if($this->_link){$sd=sqlsrv_server_info($this->_link);$this->server_info=$sd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($Gb){return$this->query("USE ".idf_escape($Gb));}function
query($H,$Ch=false){$I=sqlsrv_query($this->_link,$H);$this->error="";if(!$I){$this->_get_error();return
false;}return$this->store_result($I);}function
multi_query($H){$this->_result=sqlsrv_query($this->_link,$H);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($I=null){if(!$I)$I=$this->_result;if(!$I)return
false;if(sqlsrv_field_metadata($I))return
new
Min_Result($I);$this->affected_rows=sqlsrv_rows_affected($I);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($H,$o=0){$I=$this->query($H);if(!is_object($I))return
false;$K=$I->fetch_row();return$K[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$x=>$X){if(is_a($X,'DateTime'))$K[$x]=$X->format("Y-m-d H:i:s");}return$K;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$J=new
stdClass;$J->name=$o["Name"];$J->orgname=$o["Name"];$J->type=($o["Type"]==1?254:0);return$J;}function
seek($D){for($s=0;$s<$D;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($N,$V,$G){$this->_link=@mssql_connect($N,$V,$G);if($this->_link){$I=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$K=$I->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$K[0]] $K[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($Gb){return
mssql_select_db($Gb);}function
query($H,$Ch=false){$I=mssql_query($H,$this->_link);$this->error="";if(!$I){$this->error=mssql_get_last_message();return
false;}if($I===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result);}function
result($H,$o=0){$I=$this->query($H);if(!is_object($I))return
false;return
mssql_result($I->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=mssql_num_rows($I);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$J=mssql_fetch_field($this->_result);$J->orgtable=$J->table;$J->orgname=$J->name;return$J;}function
seek($D){mssql_data_seek($this->_result,$D);}function
__destruct(){mssql_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$L,$Bf){foreach($L
as$O){$Jh=array();$Z=array();foreach($O
as$x=>$X){$Jh[]="$x = $X";if(isset($Bf[idf_unescape($x)]))$Z[]="$x = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$O).")) AS source (c".implode(", c",range(1,count($O))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Jh)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($t){return"[".str_replace("]","]]",$t)."]";}function
table($t){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$k=$b->credentials();if($h->connect($k[0],$k[1],$k[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("EXEC sp_databases");}function
limit($H,$Z,$z,$D=0,$ug=" "){return($z!==null?" TOP (".($z+$D).")":"")." $H$Z";}function
limit1($H,$Z){return
limit($H,$Z,1);}function
db_collation($m,$nb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($l){global$h;$J=array();foreach($l
as$m){$h->select_db($m);$J[$m]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$J;}function
table_status($C=""){$J=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$K){if($C!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$J=array();foreach(get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$K){$U=$K["type"];$y=(preg_match("~char|binary~",$U)?$K["max_length"]:($U=="decimal"?"$K[precision],$K[scale]":""));$J[$K["name"]]=array("field"=>$K["name"],"full_type"=>$U.($y?"($y)":""),"type"=>$U,"length"=>$y,"default"=>$K["default"],"null"=>$K["is_nullable"],"auto_increment"=>$K["is_identity"],"collation"=>$K["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$K["is_identity"],);}return$J;}function
indexes($Q,$i=null){$J=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$i)as$K){$C=$K["name"];$J[$C]["type"]=($K["is_primary_key"]?"PRIMARY":($K["is_unique"]?"UNIQUE":"INDEX"));$J[$C]["lengths"]=array();$J[$C]["columns"][$K["key_ordinal"]]=$K["column_name"];$J[$C]["descs"][$K["key_ordinal"]]=($K["is_descending_key"]?'1':null);}return$J;}function
view($C){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($C))));}function
collations(){$J=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$J[preg_replace('~_.*~','',$d)][]=$d;return$J;}function
information_schema($m){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$h->error)));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($l){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$l)));}function
rename_database($C,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($C));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$nf){$c=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($Mc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($C)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$C)queries("EXEC sp_rename ".q(table($Q)).", ".q($C));if($Mc)$c[""]=$Mc;foreach($c
as$x=>$X){if(!queries("ALTER TABLE ".idf_escape($C)." $x".implode(",",$X)))return
false;}return
true;}function
alter_indexes($Q,$c){$u=array();$Yb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Yb[]=idf_escape($X[1]);else$u[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$u||queries("DROP INDEX ".implode(", ",$u)))&&(!$Yb||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$Yb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$H){$h->query("SET SHOWPLAN_ALL ON");$J=$h->query($H);$h->query("SET SHOWPLAN_ALL OFF");return$J;}function
found_rows($R,$Z){}function
foreign_keys($Q){$J=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$K){$q=&$J[$K["FK_NAME"]];$q["table"]=$K["PKTABLE_NAME"];$q["source"][]=$K["FKCOLUMN_NAME"];$q["target"][]=$K["PKCOLUMN_NAME"];}return$J;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Yh){return
queries("DROP VIEW ".implode(", ",array_map('table',$Yh)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Yh,$bh){return
apply_queries("ALTER SCHEMA ".idf_escape($bh)." TRANSFER",array_merge($S,$Yh));}function
trigger($C){if($C=="")return
array();$L=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($C));$J=reset($L);if($J)$J["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$J["text"]);return$J;}function
triggers($Q){$J=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$K)$J[$K["name"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($ng){return
true;}function
use_sql($Gb){return"USE ".idf_escape($Gb);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($Fc){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Fc);}$w="mssql";$Bh=array();$Lg=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(25)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(26)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(27)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$x=>$X){$Bh+=$X;$Lg[$x]=array_keys($X);}$Ih=array();$Re=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Uc=array("len","lower","round","upper");$Zc=array("avg","count","count distinct","max","min","sum");$fc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Xb['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$zf=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$G){$this->_link=ibase_connect($N,$V,$G);if($this->_link){$Lh=explode(':',$N);$this->service_link=ibase_service_attach($Lh[0],$V,$G);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($Gb){return($Gb=="domain");}function
query($H,$Ch=false){$I=ibase_query($H,$this->_link);if(!$I){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($I===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$o=0){$I=$this->query($H);if(!$I||!$I->num_rows)return
false;$K=$I->fetch_row();return$K[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$k=$b->credentials();if($h->connect($k[0],$k[1],$k[2]))return$h;return$h->error;}function
get_databases($Lc){return
array("domain");}function
limit($H,$Z,$z,$D=0,$ug=" "){$J='';$J.=($z!==null?$ug."FIRST $z".($D?" SKIP $D":""):"");$J.=" $H$Z";return$J;}function
limit1($H,$Z){return
limit($H,$Z,1);}function
db_collation($m,$nb){}function
engines(){return
array();}function
logged_user(){global$b;$k=$b->credentials();return$k[1];}function
tables_list(){global$h;$H='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$I=ibase_query($h->_link,$H);$J=array();while($K=ibase_fetch_assoc($I))$J[$K['RDB$RELATION_NAME']]='table';ksort($J);return$J;}function
count_tables($l){return
array();}function
table_status($C="",$Ec=false){global$h;$J=array();$Eb=tables_list();foreach($Eb
as$u=>$X){$u=trim($u);$J[$u]=array('Name'=>$u,'Engine'=>'standard',);if($C==$u)return$J[$u];}return$J;}function
is_view($R){return
false;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"]);}function
fields($Q){global$h;$J=array();$H='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($Q).'
ORDER BY r.RDB$FIELD_POSITION';$I=ibase_query($h->_link,$H);while($K=ibase_fetch_assoc($I))$J[trim($K['FIELD_NAME'])]=array("field"=>trim($K["FIELD_NAME"]),"full_type"=>trim($K["FIELD_TYPE"]),"type"=>trim($K["FIELD_SUB_TYPE"]),"default"=>trim($K['FIELD_DEFAULT_VALUE']),"null"=>(trim($K["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($K["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($K["FIELD_DESCRIPTION"]),);return$J;}function
indexes($Q,$i=null){$J=array();return$J;}function
foreign_keys($Q){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($ng){return
true;}function
support($Fc){return
preg_match("~^(columns|sql|status|table)$~",$Fc);}$w="firebird";$Re=array("=");$Uc=array();$Zc=array();$fc=array();}$Xb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$zf=array("SimpleXML");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($Gb){return($Gb=="domain");}function
query($H,$Ch=false){$F=array('SelectExpression'=>$H,'ConsistentRead'=>'true');if($this->next)$F['NextToken']=$this->next;$I=sdb_request_all('Select','Item',$F,$this->timeout);if($I===false)return$I;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$H)){$Pg=0;foreach($I
as$Ed)$Pg+=$Ed->Attribute->Value;$I=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Pg,))));}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($I){foreach($I
as$Ed){$K=array();if($Ed->Name!='')$K['itemName()']=(string)$Ed->Name;foreach($Ed->Attribute
as$Ia){$C=$this->_processValue($Ia->Name);$Y=$this->_processValue($Ia->Value);if(isset($K[$C])){$K[$C]=(array)$K[$C];$K[$C][]=$Y;}else$K[$C]=$Y;}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($ic){return(is_object($ic)&&$ic['encoding']=='base64'?base64_decode($ic):(string)$ic);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$Kd=array_keys($this->_rows[0]);return(object)array('name'=>$Kd[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$Bf="itemName()";function
_chunkRequest($ld,$va,$F,$yc=array()){global$h;foreach(array_chunk($ld,25)as$gb){$jf=$F;foreach($gb
as$s=>$jd){$jf["Item.$s.ItemName"]=$jd;foreach($yc
as$x=>$X)$jf["Item.$s.$x"]=$X;}if(!sdb_request($va,$jf))return
false;}$h->affected_rows=count($ld);return
true;}function
_extractIds($Q,$Mf,$z){$J=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$Mf,$de))$J=array_map('idf_unescape',$de[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($Q).$Mf.($z?" LIMIT 1":"")))as$Ed)$J[]=$Ed->Name;}return$J;}function
select($Q,$M,$Z,$Xc,$We=array(),$z=1,$E=0,$Df=false){global$h;$h->next=$_GET["next"];$J=parent::select($Q,$M,$Z,$Xc,$We,$z,$E,$Df);$h->next=0;return$J;}function
delete($Q,$Mf,$z=0){return$this->_chunkRequest($this->_extractIds($Q,$Mf,$z),'BatchDeleteAttributes',array('DomainName'=>$Q));}function
update($Q,$O,$Mf,$z=0,$ug="\n"){$Mb=array();$wd=array();$s=0;$ld=$this->_extractIds($Q,$Mf,$z);$jd=idf_unescape($O["`itemName()`"]);unset($O["`itemName()`"]);foreach($O
as$x=>$X){$x=idf_unescape($x);if($X=="NULL"||($jd!=""&&array($jd)!=$ld))$Mb["Attribute.".count($Mb).".Name"]=$x;if($X!="NULL"){foreach((array)$X
as$Gd=>$W){$wd["Attribute.$s.Name"]=$x;$wd["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Gd)$wd["Attribute.$s.Replace"]="true";$s++;}}}$F=array('DomainName'=>$Q);return(!$wd||$this->_chunkRequest(($jd!=""?array($jd):$ld),'BatchPutAttributes',$F,$wd))&&(!$Mb||$this->_chunkRequest($ld,'BatchDeleteAttributes',$F,$Mb));}function
insert($Q,$O){$F=array("DomainName"=>$Q);$s=0;foreach($O
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$F["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$F["Attribute.$s.Name"]=$C;$F["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$F);}function
insertUpdate($Q,$L,$Bf){foreach($L
as$O){if(!$this->update($Q,$O,"WHERE `itemName()` = ".q($O["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}}function
connect(){return
new
Min_DB;}function
support($Fc){return
preg_match('~sql~',$Fc);}function
logged_user(){global$b;$k=$b->credentials();return$k[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$nb){}function
tables_list(){global$h;$J=array();foreach(sdb_request_all('ListDomains','DomainName')as$Q)$J[(string)$Q]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$J;}function
table_status($C="",$Ec=false){$J=array();foreach(($C!=""?array($C=>true):tables_list())as$Q=>$U){$K=array("Name"=>$Q,"Auto_increment"=>"");if(!$Ec){$qe=sdb_request('DomainMetadata',array('DomainName'=>$Q));if($qe){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$x=>$X)$K[$x]=(string)$qe->$X;}}if($C!="")return$K;$J[$Q]=$K;}return$J;}function
explain($h,$H){}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($Q){return
fields_from_edit();}function
foreign_keys($Q){return
array();}function
table($t){return
idf_escape($t);}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
limit($H,$Z,$z,$D=0,$ug=" "){return" $H$Z".($z!==null?$ug."LIMIT $z":"");}function
unconvert_field($o,$J){return$J;}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$nf){return($Q==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($S){foreach($S
as$Q){if(!sdb_request('DeleteDomain',array('DomainName'=>$Q)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($R,$Z){return($Z?null:$R["Rows"]);}function
last_id(){}function
hmac($Ba,$Eb,$x,$Qf=false){$Ua=64;if(strlen($x)>$Ua)$x=pack("H*",$Ba($x));$x=str_pad($x,$Ua,"\0");$Hd=$x^str_repeat("\x36",$Ua);$Id=$x^str_repeat("\x5C",$Ua);$J=$Ba($Id.pack("H*",$Ba($Hd.$Eb)));if($Qf)$J=pack("H*",$J);return$J;}function
sdb_request($va,$F=array()){global$b,$h;list($hd,$F['AWSAccessKeyId'],$qg)=$b->credentials();$F['Action']=$va;$F['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$F['Version']='2009-04-15';$F['SignatureVersion']=2;$F['SignatureMethod']='HmacSHA1';ksort($F);$H='';foreach($F
as$x=>$X)$H.='&'.rawurlencode($x).'='.rawurlencode($X);$H=str_replace('%7E','~',substr($H,1));$H.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$hd)."\n/\n$H",$qg,true)));@ini_set('track_errors',1);$Hc=@file_get_contents((preg_match('~^https?://~',$hd)?$hd:"http://$hd"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$H,'ignore_errors'=>1,))));if(!$Hc){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$ei=simplexml_load_string($Hc);if(!$ei){$n=libxml_get_last_error();$h->error=$n->message;return
false;}if($ei->Errors){$n=$ei->Errors->Error;$h->error="$n->Message ($n->Code)";return
false;}$h->error='';$ah=$va."Result";return($ei->$ah?$ei->$ah:true);}function
sdb_request_all($va,$ah,$F=array(),$jh=0){$J=array();$Hg=($jh?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$F['SelectExpression'],$B)?$B[1]:0);do{$ei=sdb_request($va,$F);if(!$ei)break;foreach($ei->$ah
as$ic)$J[]=$ic;if($z&&count($J)>=$z){$_GET["next"]=$ei->NextToken;break;}if($jh&&microtime(true)-$Hg>$jh)return
false;$F['NextToken']=$ei->NextToken;if($z)$F['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($J),$F['SelectExpression']);}while($ei->NextToken);return$J;}$w="simpledb";$Re=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$Uc=array();$Zc=array("count");$fc=array(array("json"));}$Xb["mongo"]="MongoDB (beta)";if(isset($_GET["mongo"])){$zf=array("mongo");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($N,$V,$G){global$b;$m=$b->database();$Ue=array();if($V!=""){$Ue["username"]=$V;$Ue["password"]=$G;}if($m!="")$Ue["db"]=$m;try{$this->_link=@new
MongoClient("mongodb://$N",$Ue);return
true;}catch(Exception$uc){$this->error=$uc->getMessage();return
false;}}function
query($H){return
false;}function
select_db($Gb){try{$this->_db=$this->_link->selectDB($Gb);return
true;}catch(Exception$uc){$this->error=$uc->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$Ed){$K=array();foreach($Ed
as$x=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$x]=63;$K[$x]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$Kd=array_keys($this->_rows[0]);$C=$Kd[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}}class
Min_Driver
extends
Min_SQL{public$Bf="_id";function
select($Q,$M,$Z,$Xc,$We=array(),$z=1,$E=0,$Df=false){$M=($M==array("*")?array():array_fill_keys($M,true));$Cg=array();foreach($We
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Ab);$Cg[$X]=($Ab?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$M)->sort($Cg)->limit(+$z)->skip($E*$z));}function
insert($Q,$O){try{$J=$this->_conn->_db->selectCollection($Q)->insert($O);$this->_conn->errno=$J['code'];$this->_conn->error=$J['err'];$this->_conn->last_id=$O['_id'];return!$J['err'];}catch(Exception$uc){$this->_conn->error=$uc->getMessage();return
false;}}}function
connect(){global$b;$h=new
Min_DB;$k=$b->credentials();if($h->connect($k[0],$k[1],$k[2]))return$h;return$h->error;}function
error(){global$h;return
h($h->error);}function
logged_user(){global$b;$k=$b->credentials();return$k[1];}function
get_databases($Lc){global$h;$J=array();$Jb=$h->_link->listDBs();foreach($Jb['databases']as$m)$J[]=$m['name'];return$J;}function
collations(){return
array();}function
db_collation($m,$nb){}function
count_tables($l){global$h;$J=array();foreach($l
as$m)$J[$m]=count($h->_link->selectDB($m)->getCollectionNames(true));return$J;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
table_status($C="",$Ec=false){$J=array();foreach(tables_list()as$Q=>$U){$J[$Q]=array("Name"=>$Q);if($C==$Q)return$J[$Q];}return$J;}function
information_schema(){}function
is_view($R){}function
drop_databases($l){global$h;foreach($l
as$m){$bg=$h->_link->selectDB($m)->drop();if(!$bg['ok'])return
false;}return
true;}function
indexes($Q,$i=null){global$h;$J=array();foreach($h->_db->selectCollection($Q)->getIndexInfo()as$u){$Pb=array();foreach($u["key"]as$e=>$U)$Pb[]=($U==-1?'1':null);$J[$u["name"]]=array("type"=>($u["name"]=="_id_"?"PRIMARY":($u["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($u["key"]),"lengths"=>array(),"descs"=>$Pb,);}return$J;}function
fields($Q){return
fields_from_edit();}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
found_rows($R,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}function
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$nf){global$h;if($Q==""){$h->_db->createCollection($C);return
true;}}function
drop_tables($S){global$h;foreach($S
as$Q){$bg=$h->_db->selectCollection($Q)->drop();if(!$bg['ok'])return
false;}return
true;}function
truncate_tables($S){global$h;foreach($S
as$Q){$bg=$h->_db->selectCollection($Q)->remove();if(!$bg['ok'])return
false;}return
true;}function
alter_indexes($Q,$c){global$h;foreach($c
as$X){list($U,$C,$O)=$X;if($O=="DROP")$J=$h->_db->command(array("deleteIndexes"=>$Q,"index"=>$C));else{$f=array();foreach($O
as$e){$e=preg_replace('~ DESC$~','',$e,1,$Ab);$f[$e]=($Ab?-1:1);}$J=$h->_db->selectCollection($Q)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$C,));}if($J['errmsg']){$h->error=$J['errmsg'];return
false;}}return
true;}function
last_id(){global$h;return$h->last_id;}function
table($t){return$t;}function
idf_escape($t){return$t;}function
support($Fc){return
preg_match("~database|indexes~",$Fc);}$w="mongo";$Re=array("=");$Uc=array();$Zc=array();$fc=array(array("json"));}$Xb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$zf=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($qf,$wb=array(),$re='GET'){@ini_set('track_errors',1);$Hc=@file_get_contents($this->_url.'/'.ltrim($qf,'/'),false,stream_context_create(array('http'=>array('method'=>$re,'content'=>json_encode($wb),'ignore_errors'=>1,))));if(!$Hc){$this->error=$php_errormsg;return$Hc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Hc;return
false;}$J=json_decode($Hc,true);if($J===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$vb=get_defined_constants(true);foreach($vb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$J;}function
query($qf,$wb=array(),$re='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($qf,'/'),$wb,$re);}function
connect($N,$V,$G){$this->_url="http://$V:$G@$N/";$J=$this->query('');if($J)$this->server_info=$J['version']['number'];return(bool)$J;}function
select_db($Gb){$this->_db=$Gb;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($L){$this->num_rows=count($this->_rows);$this->_rows=$L;reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$M,$Z,$Xc,$We=array(),$z=1,$E=0,$Df=false){global$b;$Eb=array();$H="$Q/_search";if($M!=array("*"))$Eb["fields"]=$M;if($We){$Cg=array();foreach($We
as$lb){$lb=preg_replace('~ DESC$~','',$lb,1,$Ab);$Cg[]=($Ab?array($lb=>"desc"):$lb);}$Eb["sort"]=$Cg;}if($z){$Eb["size"]=+$z;if($E)$Eb["from"]=($E*$z);}foreach($Z
as$X){list($lb,$Pe,$X)=explode(" ",$X,3);if($lb=="_id")$Eb["query"]["ids"]["values"][]=$X;elseif($lb.$X!=""){$eh=array("term"=>array(($lb!=""?$lb:"_all")=>$X));if($Pe=="=")$Eb["query"]["filtered"]["filter"]["and"][]=$eh;else$Eb["query"]["filtered"]["query"]["bool"]["must"][]=$eh;}}if($Eb["query"]&&!$Eb["query"]["filtered"]["query"]&&!$Eb["query"]["ids"])$Eb["query"]["filtered"]["query"]=array("match_all"=>array());$Hg=microtime(true);$pg=$this->_conn->query($H,$Eb);if($Df)echo$b->selectQuery("$H: ".print_r($Eb,true),format_time($Hg));if(!$pg)return
false;$J=array();foreach($pg['hits']['hits']as$gd){$K=array();if($M==array("*"))$K["_id"]=$gd["_id"];$p=$gd['_source'];if($M!=array("*")){$p=array();foreach($M
as$x)$p[$x]=$gd['fields'][$x];}foreach($p
as$x=>$X){if($Eb["fields"])$X=$X[0];$K[$x]=(is_array($X)?json_encode($X):$X);}$J[]=$K;}return
new
Min_Result($J);}}function
connect(){global$b;$h=new
Min_DB;$k=$b->credentials();if($h->connect($k[0],$k[1],$k[2]))return$h;return$h->error;}function
support($Fc){return
preg_match("~database|table|columns~",$Fc);}function
logged_user(){global$b;$k=$b->credentials();return$k[1];}function
get_databases(){global$h;$J=$h->rootQuery('_aliases');if($J){$J=array_keys($J);sort($J,SORT_STRING);}return$J;}function
collations(){return
array();}function
db_collation($m,$nb){}function
engines(){return
array();}function
count_tables($l){global$h;$J=$h->query('_mapping');if($J)$J=array_map('count',$J);return$J;}function
tables_list(){global$h;$J=$h->query('_mapping');if($J)$J=array_fill_keys(array_keys($J[$h->_db]["mappings"]),'table');return$J;}function
table_status($C="",$Ec=false){global$h;$pg=$h->query("_search?search_type=count",array("facets"=>array("count_by_type"=>array("terms"=>array("field"=>"_type",)))),"POST");$J=array();if($pg){foreach($pg["facets"]["count_by_type"]["terms"]as$Q)$J[$Q["term"]]=array("Name"=>$Q["term"],"Engine"=>"table","Rows"=>$Q["count"],);if($C!=""&&$C==$Q["term"])return$J[$C];}return$J;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$h;$I=$h->query("$Q/_mapping");$J=array();if($I){$be=$I[$Q]['properties'];if(!$be)$be=$I[$h->_db]['mappings'][$Q]['properties'];if($be){foreach($be
as$C=>$o){$J[$C]=array("field"=>$C,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($J[$C]["privileges"]["insert"]);unset($J[$C]["privileges"]["update"]);}}}}return$J;}function
foreign_keys($Q){return
array();}function
table($t){return$t;}function
idf_escape($t){return$t;}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($m){global$h;return$h->rootQuery(urlencode($m),array(),'PUT');}function
drop_databases($l){global$h;return$h->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
drop_tables($S){global$h;$J=true;foreach($S
as$Q)$J=$J&&$h->query(urlencode($Q),array(),'DELETE');return$J;}$w="elastic";$Re=array("=","query");$Uc=array();$Zc=array();$fc=array(array("json"));}$Xb=array("server"=>"MySQL")+$Xb;if(!defined("DRIVER")){$zf=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($N="",$V="",$G="",$Gb=null,$vf=null,$Bg=null){mysqli_report(MYSQLI_REPORT_OFF);list($hd,$vf)=explode(":",$N,2);$J=@$this->real_connect(($N!=""?$hd:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$G!=""?$G:ini_get("mysqli.default_pw")),$Gb,(is_numeric($vf)?$vf:ini_get("mysqli.default_port")),(!is_numeric($vf)?$vf:$Bg));return$J;}function
set_charset($ab){if(parent::set_charset($ab))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $ab");}function
result($H,$o=0){$I=$this->query($H);if(!$I)return
false;$K=$I->fetch_array();return$K[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$G){$this->_link=@mysql_connect(($N!=""?$N:ini_get("mysql.default_host")),("$N$V"!=""?$V:ini_get("mysql.default_user")),("$N$V$G"!=""?$G:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($ab){if(function_exists('mysql_set_charset')){if(mysql_set_charset($ab,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $ab");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($Gb){return
mysql_select_db($Gb,$this->_link);}function
query($H,$Ch=false){$I=@($Ch?mysql_unbuffered_query($H,$this->_link):mysql_query($H,$this->_link));$this->error="";if(!$I){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($I===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$o=0){$I=$this->query($H);if(!$I||!$I->num_rows)return
false;return
mysql_result($I->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;$this->num_rows=mysql_num_rows($I);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$J=mysql_fetch_field($this->_result,$this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=($J->blob?63:0);return$J;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($N,$V,$G){$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$N)),$V,$G);return
true;}function
set_charset($ab){$this->query("SET NAMES $ab");}function
select_db($Gb){return$this->query("USE ".idf_escape($Gb));}function
query($H,$Ch=false){$this->setAttribute(1000,!$Ch);return
parent::query($H,$Ch);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$O){return($O?parent::insert($Q,$O):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$L,$Bf){$f=array_keys(reset($L));$_f="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$Th=array();foreach($f
as$x)$Th[$x]="$x = VALUES($x)";$Og="\nON DUPLICATE KEY UPDATE ".implode(", ",$Th);$Th=array();$y=0;foreach($L
as$O){$Y="(".implode(", ",$O).")";if($Th&&(strlen($_f)+$y+strlen($Y)+strlen($Og)>1e6)){if(!queries($_f.implode(",\n",$Th).$Og))return
false;$Th=array();$y=0;}$Th[]=$Y;$y+=strlen($Y)+2;}return
queries($_f.implode(",\n",$Th).$Og);}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$k=$b->credentials();if($h->connect($k[0],$k[1],$k[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");return$h;}$J=$h->error;if(function_exists('iconv')&&!is_utf8($J)&&strlen($lg=iconv("windows-1250","utf-8",$J))>strlen($J))$J=$lg;return$J;}function
get_databases($Lc){global$h;$J=get_session("dbs");if($J===null){$H=($h->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$J=($Lc?slow_query($H):get_vals($H));restart_session();set_session("dbs",$J);stop_session();}return$J;}function
limit($H,$Z,$z,$D=0,$ug=" "){return" $H$Z".($z!==null?$ug."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($H,$Z){return
limit($H,$Z,1);}function
db_collation($m,$nb){global$h;$J=null;$j=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$j,$B))$J=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$j,$B))$J=$nb[$B[1]][-1];return$J;}function
engines(){$J=array();foreach(get_rows("SHOW ENGINES")as$K){if(preg_match("~YES|DEFAULT~",$K["Support"]))$J[]=$K["Engine"];}return$J;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){global$h;return
get_key_vals($h->server_info>=5?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$J=array();foreach($l
as$m)$J[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$J;}function
table_status($C="",$Ec=false){global$h;$J=array();foreach(get_rows($Ec&&$h->server_info>=5?"SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($C!=""?"AND TABLE_NAME = ".q($C):"ORDER BY Name"):"SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_\\")):""))as$K){if($K["Engine"]=="InnoDB")$K["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$K["Comment"]);if(!isset($K["Engine"]))$K["Comment"]="";if($C!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){global$h;return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&version_compare($h->server_info,'5.6')>=0);}function
fields($Q){$J=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$K){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$K["Type"],$B);$J[$K["Field"]]=array("field"=>$K["Field"],"full_type"=>$K["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($K["Default"]!=""||preg_match("~char|set~",$B[1])?$K["Default"]:null),"null"=>($K["Null"]=="YES"),"auto_increment"=>($K["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$K["Extra"],$B)?$B[1]:""),"collation"=>$K["Collation"],"privileges"=>array_flip(preg_split('~, *~',$K["Privileges"])),"comment"=>$K["Comment"],"primary"=>($K["Key"]=="PRI"),);}return$J;}function
indexes($Q,$i=null){$J=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$i)as$K){$J[$K["Key_name"]]["type"]=($K["Key_name"]=="PRIMARY"?"PRIMARY":($K["Index_type"]=="FULLTEXT"?"FULLTEXT":($K["Non_unique"]?"INDEX":"UNIQUE")));$J[$K["Key_name"]]["columns"][]=$K["Column_name"];$J[$K["Key_name"]]["lengths"][]=$K["Sub_part"];$J[$K["Key_name"]]["descs"][]=null;}return$J;}function
foreign_keys($Q){global$h,$Me;static$sf='`(?:[^`]|``)+`';$J=array();$Bb=$h->result("SHOW CREATE TABLE ".table($Q),1);if($Bb){preg_match_all("~CONSTRAINT ($sf) FOREIGN KEY ?\\(((?:$sf,? ?)+)\\) REFERENCES ($sf)(?:\\.($sf))? \\(((?:$sf,? ?)+)\\)(?: ON DELETE ($Me))?(?: ON UPDATE ($Me))?~",$Bb,$de,PREG_SET_ORDER);foreach($de
as$B){preg_match_all("~$sf~",$B[2],$Dg);preg_match_all("~$sf~",$B[5],$bh);$J[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$Dg[0]),"target"=>array_map('idf_unescape',$bh[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$J;}function
view($C){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$h->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$J=array();foreach(get_rows("SHOW COLLATION")as$K){if($K["Default"])$J[$K["Charset"]][-1]=$K["Collation"];else$J[$K["Charset"]][]=$K["Collation"];}ksort($J);foreach($J
as$x=>$X)asort($J[$x]);return$J;}function
information_schema($m){global$h;return($h->server_info>=5&&$m=="information_schema")||($h->server_info>=5.5&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" COLLATE ".q($d):""));}function
drop_databases($l){$J=apply_queries("DROP DATABASE",$l,'idf_escape');restart_session();set_session("dbs",null);return$J;}function
rename_database($C,$d){$J=false;if(create_database($C,$d)){$Zf=array();foreach(tables_list()as$Q=>$U)$Zf[]=table($Q)." TO ".idf_escape($C).".".table($Q);$J=(!$Zf||queries("RENAME TABLE ".implode(", ",$Zf)));if($J)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$J;}function
auto_increment(){$Ma=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$u){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$u["columns"],true)){$Ma="";break;}if($u["type"]=="PRIMARY")$Ma=" UNIQUE";}}return" AUTO_INCREMENT$Ma";}function
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$nf){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$Mc);$Ig=($rb!==null?" COMMENT=".q($rb):"").($nc?" ENGINE=".q($nc):"").($d?" COLLATE ".q($d):"").($La!=""?" AUTO_INCREMENT=$La":"");if($Q=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)$Ig$nf");if($Q!=$C)$c[]="RENAME TO ".table($C);if($Ig)$c[]=ltrim($Ig);return($c||$nf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$nf):true);}function
alter_indexes($Q,$c){foreach($c
as$x=>$X)$c[$x]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Yh){return
queries("DROP VIEW ".implode(", ",array_map('table',$Yh)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Yh,$bh){$Zf=array();foreach(array_merge($S,$Yh)as$Q)$Zf[]=table($Q)." TO ".idf_escape($bh).".".table($Q);return
queries("RENAME TABLE ".implode(", ",$Zf));}function
copy_tables($S,$Yh,$bh){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$C=($bh==DB?table("copy_$Q"):idf_escape($bh).".".table($Q));if(!queries("\nDROP TABLE IF EXISTS $C")||!queries("CREATE TABLE $C LIKE ".table($Q))||!queries("INSERT INTO $C SELECT * FROM ".table($Q)))return
false;}foreach($Yh
as$Q){$C=($bh==DB?table("copy_$Q"):idf_escape($bh).".".table($Q));$Xh=view($Q);if(!queries("DROP VIEW IF EXISTS $C")||!queries("CREATE VIEW $C AS $Xh[select]"))return
false;}return
true;}function
trigger($C){if($C=="")return
array();$L=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($L);}function
triggers($Q){$J=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$K)$J[$K["Trigger"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){global$h,$pc,$ud,$Bh;$Ca=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Ah="((".implode("|",array_merge(array_keys($Bh),$Ca)).")\\b(?:\\s*\\(((?:[^'\")]|$pc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$sf="\\s*(".($U=="FUNCTION"?"":$ud).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Ah";$j=$h->result("SHOW CREATE $U ".idf_escape($C),2);preg_match("~\\(((?:$sf\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Ah\\s+":"")."(.*)~is",$j,$B);$p=array();preg_match_all("~$sf\\s*,?~is",$B[1],$de,PREG_SET_ORDER);foreach($de
as$if){$C=str_replace("``","`",$if[2]).$if[3];$p[]=array("field"=>$C,"type"=>strtolower($if[5]),"length"=>preg_replace_callback("~$pc~s",'normalize_enum',$if[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$if[8] $if[7]"))),"null"=>1,"full_type"=>$if[4],"inout"=>strtoupper($if[1]),"collation"=>strtolower($if[9]),);}if($U!="FUNCTION")return
array("fields"=>$p,"definition"=>$B[11]);return
array("fields"=>$p,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$H){return$h->query("EXPLAIN ".($h->server_info>=5.1?"PARTITIONS ":"").$H);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($ng){return
true;}function
create_sql($Q,$La){global$h;$J=$h->result("SHOW CREATE TABLE ".table($Q),1);if(!$La)$J=preg_replace('~ AUTO_INCREMENT=\\d+~','',$J);return$J;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($Gb){return"USE ".idf_escape($Gb);}function
trigger_sql($Q,$Mg){$J="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$K)$J.="\n".($Mg=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($K["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($K["Trigger"])." $K[Timing] $K[Event] ON ".table($K["Table"])." FOR EACH ROW\n$K[Statement];;\n";return$J;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return"AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$J){if(preg_match("~binary~",$o["type"]))$J="UNHEX($J)";if($o["type"]=="bit")$J="CONV($J, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$J="GeomFromText($J)";return$J;}function
support($Fc){global$h;return!preg_match("~scheme|sequence|type|view_trigger".($h->server_info<5.1?"|event|partitioning".($h->server_info<5?"|routine|trigger|view":""):"")."~",$Fc);}$w="sql";$Bh=array();$Lg=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(25)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(26)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(30)=>array("enum"=>65535,"set"=>64),lang(27)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(29)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$x=>$X){$Bh+=$X;$Lg[$x]=array_keys($X);}$Ih=array("unsigned","zerofill","unsigned zerofill");$Re=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Uc=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$Zc=array("avg","count","count distinct","group_concat","max","min","sum");$fc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.2.4";class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/' target='_blank' id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
permanentLogin($j=false){return
password_file($j);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
database(){return
DB;}function
databases($Lc=true){return
get_databases($Lc);}function
schemas(){return
schemas();}function
queryTimeout(){return
5;}function
headers(){return
true;}function
head(){return
true;}function
loginForm(){global$Xb;echo'<table cellspacing="0">
<tr><th>',lang(31),'<td>',html_select("auth[driver]",$Xb,DRIVER,"loginDriver(this);"),'<tr><th>',lang(32),'<td><input name="auth[server]" value="',h(SERVER),'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th>',lang(33),'<td><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>',lang(34),'<td><input type="password" name="auth[password]">
<tr><th>',lang(35),'<td><input name="auth[db]" value="',h($_GET["db"]);?>" autocapitalize="off">
</table>
<script type="text/javascript">
var username = document.getElementById('username');
focus(username);
username.form['auth[driver]'].onchange();
</script>
<?php

echo"<p><input type='submit' value='".lang(36)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(37))."\n";}function
login($Zd,$G){return
true;}function
tableName($Sg){return
h($Sg["Name"]);}function
fieldName($o,$We=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Sg,$O=""){echo'<p class="links">';$Yd=array("select"=>lang(38));if(support("table")||support("indexes"))$Yd["table"]=lang(39);if(support("table")){if(is_view($Sg))$Yd["view"]=lang(40);else$Yd["create"]=lang(41);}if($O!==null)$Yd["edit"]=lang(42);foreach($Yd
as$x=>$X)echo" <a href='".h(ME)."$x=".urlencode($Sg["Name"]).($x=="edit"?$O:"")."'".bold(isset($_GET[$x])).">$X</a>";echo"\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Rg){return
array();}function
backwardKeysPrint($Oa,$K){}function
selectQuery($H,$ih){global$w;return"<p><code class='jush-$w'>".h(str_replace("\n"," ",$H))."</code> <span class='time'>($ih)</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($H)."'>".lang(10)."</a>":"")."</p>";}function
rowDescription($Q){return"";}function
rowDescriptions($L,$Nc){return$L;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$df){$J=($X===null?"<i>NULL</i>":(preg_match("~char|binary~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$J=lang(43,strlen($df));return($_?"<a href='".h($_)."'".(is_url($_)?" rel='noreferrer'":"").">$J</a>":$J);}function
editVal($X,$o){return$X;}function
selectColumnsPrint($M,$f){global$Uc,$Zc;print_fieldset("select",lang(44),$M);$s=0;$M[""]=array();foreach($M
as$x=>$X){$X=$_GET["columns"][$x];$e=select_input(" name='columns[$s][col]' onchange='".($x!==""?"selectFieldChange(this.form)":"selectAddRow(this)").";'",$f,$X["col"]);echo"<div>".($Uc||$Zc?"<select name='columns[$s][fun]' onchange='helpClose();".($x!==""?"":" this.nextSibling.nextSibling.onchange();")."'".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).">".optionlist(array(-1=>"")+array_filter(array(lang(45)=>$Uc,lang(46)=>$Zc)),$X["fun"])."</select>"."($e)":$e)."</div>\n";$s++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$f,$v){print_fieldset("search",lang(47),$Z);foreach($v
as$s=>$u){if($u["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$u["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$s]' value='".h($_GET["fulltext"][$s])."' onchange='selectFieldChange(this.form);'>",checkbox("boolean[$s]",1,isset($_GET["boolean"][$s]),"BOOL"),"<br>\n";}}$_GET["where"]=(array)$_GET["where"];reset($_GET["where"]);$Za="this.nextSibling.onchange();";for($s=0;$s<=count($_GET["where"]);$s++){list(,$X)=each($_GET["where"]);if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$s][col]' onchange='$Za'",$f,$X["col"],"(".lang(48).")"),html_select("where[$s][op]",$this->operators,$X["op"],$Za),"<input type='search' name='where[$s][val]' value='".h($X["val"])."' onchange='".($X?"selectFieldChange(this.form)":"selectAddRow(this)").";' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($We,$f,$v){print_fieldset("sort",lang(49),$We);$s=0;foreach((array)$_GET["order"]as$x=>$X){if($X!=""){echo"<div>".select_input(" name='order[$s]' onchange='selectFieldChange(this.form);'",$f,$X),checkbox("desc[$s]",1,isset($_GET["desc"][$x]),lang(50))."</div>\n";$s++;}}echo"<div>".select_input(" name='order[$s]' onchange='selectAddRow(this);'",$f),checkbox("desc[$s]",1,false,lang(50))."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".lang(51)."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($z)."' onchange='selectFieldChange(this.form);'>","</div></fieldset>\n";}function
selectLengthPrint($hh){if($hh!==null){echo"<fieldset><legend>".lang(52)."</legend><div>","<input type='number' name='text_length' class='size' value='".h($hh)."'>","</div></fieldset>\n";}}function
selectActionPrint($v){echo"<fieldset><legend>".lang(53)."</legend><div>","<input type='submit' value='".lang(44)."'>"," <span id='noindex' title='".lang(54)."'></span>","<script type='text/javascript'>\n","var indexColumns = ";$f=array();foreach($v
as$u){if($u["type"]!="FULLTEXT")$f[reset($u["columns"])]=1;}$f[""]=1;foreach($f
as$x=>$X)json_row($x);echo";\n","selectFieldChange(document.getElementById('form'));\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($kc,$f){}function
selectColumnsProcess($f,$v){global$Uc,$Zc;$M=array();$Xc=array();foreach((array)$_GET["columns"]as$x=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$Uc)||in_array($X["fun"],$Zc)))){$M[$x]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$Zc))$Xc[]=$M[$x];}}return
array($M,$Xc);}function
selectSearchProcess($p,$v){global$h,$w;$J=array();foreach($v
as$s=>$u){if($u["type"]=="FULLTEXT"&&$_GET["fulltext"][$s]!="")$J[]="MATCH (".implode(", ",array_map('idf_escape',$u["columns"])).") AGAINST (".q($_GET["fulltext"][$s]).(isset($_GET["boolean"][$s])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$tb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$nd=process_length($X["val"]);$tb.=" ".($nd!=""?$nd:"(NULL)");}elseif($X["op"]=="SQL")$tb=" $X[val]";elseif($X["op"]=="LIKE %%")$tb=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$tb=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif(!preg_match('~NULL$~',$X["op"]))$tb.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$J[]=idf_escape($X["col"]).$tb;else{$ob=array();foreach($p
as$C=>$o){$Cd=preg_match('~char|text|enum|set~',$o["type"]);if((is_numeric($X["val"])||!preg_match('~(^|[^o])int|float|double|decimal|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||$Cd)){$C=idf_escape($C);$ob[]=($w=="sql"&&$Cd&&!preg_match("~^utf8_~",$o["collation"])?"CONVERT($C USING ".charset($h).")":$C);}}$J[]=($ob?"(".implode("$tb OR ",$ob)."$tb)":"0");}}}return$J;}function
selectOrderProcess($p,$v){$J=array();foreach((array)$_GET["order"]as$x=>$X){if($X!="")$J[]=(preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$x])?" DESC":"");}return$J;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$Nc){return
false;}function
selectQueryBuild($M,$Z,$Xc,$We,$z,$E){return"";}function
messageQuery($H,$ih){global$w;restart_session();$ed=&get_session("queries");$jd="sql-".count($ed[$_GET["db"]]);if(strlen($H)>1e6)$H=preg_replace('~[\x80-\xFF]+$~','',substr($H,0,1e6))."\n...";$ed[$_GET["db"]][]=array($H,time(),$ih);return" <span class='time'>".@date("H:i:s")."</span> <a href='#$jd' onclick=\"return !toggle('$jd');\">".lang(55)."</a>"."<div id='$jd' class='hidden'><pre><code class='jush-$w'>".shorten_utf8($H,1000).'</code></pre>'.($ih?" <span class='time'>($ih)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($ed[$_GET["db"]])-1)).'">'.lang(10).'</a>':'').'</div>';}function
editFunctions($o){global$fc;$J=($o["null"]?"NULL/":"");foreach($fc
as$x=>$Uc){if(!$x||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($Uc
as$sf=>$X){if(!$sf||preg_match("~$sf~",$o["type"]))$J.="/$X";}if($x&&!preg_match('~set|blob|bytea|raw|file~',$o["type"]))$J.="/SQL";}}if($o["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$J=lang(56);return
explode("/",$J);}function
editInput($Q,$o,$Ja,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ja value='-1' checked><i>".lang(8)."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ja value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ja,$o,$Y,0);return"";}function
processInput($o,$Y,$r=""){if($r=="SQL")return$Y;$C=$o["field"];$J=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$r))$J="$r()";elseif(preg_match('~^current_(date|timestamp)$~',$r))$J=$r;elseif(preg_match('~^([+-]|\\|\\|)$~',$r))$J=idf_escape($C)." $r $J";elseif(preg_match('~^[+-] interval$~',$r))$J=idf_escape($C)." $r ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i",$Y)?$Y:$J);elseif(preg_match('~^(addtime|subtime|concat)$~',$r))$J="$r(".idf_escape($C).", $J)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$r))$J="$r($J)";return
unconvert_field($o,$J);}function
dumpOutput(){$J=array('text'=>lang(57),'file'=>lang(58));if(function_exists('gzencode'))$J['gz']='gzip';return$J;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable($Q,$Mg,$Dd=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Mg)dump_csv(array_keys(fields($Q)));}else{if($Dd==2){$p=array();foreach(fields($Q)as$C=>$o)$p[]=idf_escape($C)." $o[full_type]";$j="CREATE TABLE ".table($Q)." (".implode(", ",$p).")";}else$j=create_sql($Q,$_POST["auto_increment"]);set_utf8mb4($j);if($Mg&&$j){if($Mg=="DROP+CREATE"||$Dd==1)echo"DROP ".($Dd==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($Dd==1)$j=remove_definer($j);echo"$j;\n\n";}}}function
dumpData($Q,$Mg,$H){global$h,$w;$fe=($w=="sqlite"?0:1048576);if($Mg){if($_POST["format"]=="sql"){if($Mg=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$p=fields($Q);}$I=$h->query($H,1);if($I){$wd="";$Xa="";$Kd=array();$Og="";$Gc=($Q!=''?'fetch_assoc':'fetch_row');while($K=$I->$Gc()){if(!$Kd){$Th=array();foreach($K
as$X){$o=$I->fetch_field();$Kd[]=$o->name;$x=idf_escape($o->name);$Th[]="$x = VALUES($x)";}$Og=($Mg=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Th):"").";\n";}if($_POST["format"]!="sql"){if($Mg=="table"){dump_csv($Kd);$Mg="INSERT";}dump_csv($K);}else{if(!$wd)$wd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$Kd)).") VALUES";foreach($K
as$x=>$X){$o=$p[$x];$K[$x]=($X!==null?unconvert_field($o,preg_match('~(^|[^o])int|float|double|decimal~',$o["type"])&&$X!=''?$X:q($X)):"NULL");}$lg=($fe?"\n":" ")."(".implode(",\t",$K).")";if(!$Xa)$Xa=$wd.$lg;elseif(strlen($Xa)+4+strlen($lg)+strlen($Og)<$fe)$Xa.=",$lg";else{echo$Xa.$Og;$Xa=$wd.$lg;}}}if($Xa)echo$Xa.$Og;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$h->error)."\n";}}function
dumpFilename($kd){return
friendly_url($kd!=""?$kd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($kd,$ue=false){$gf=$_POST["output"];$Ac=(preg_match('~sql~',$_POST["format"])?"sql":($ue?"tar":"csv"));header("Content-Type: ".($gf=="gz"?"application/x-gzip":($Ac=="tar"?"application/x-tar":($Ac=="sql"||$gf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($gf=="gz")ob_start('ob_gzencode',1e6);return$Ac;}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.lang(59)."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?lang(60):lang(61))."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.lang(62)."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".lang(63)."</a>\n":"");return
true;}function
navigation($te){global$ia,$w,$Xb,$h;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download" target="_blank" id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($te=="auth"){$Kc=true;foreach((array)$_SESSION["pwds"]as$Vh=>$yg){foreach($yg
as$N=>$Qh){foreach($Qh
as$V=>$G){if($G!==null){if($Kc){echo"<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";$Kc=false;}$Jb=$_SESSION["db"][$Vh][$N][$V];foreach(($Jb?array_keys($Jb):array(""))as$m)echo"<a href='".h(auth_url($Vh,$N,$V,$m))."'>($Xb[$Vh]) ".h($V.($N!=""?"@$N":"").($m!=""?" - $m":""))."</a><br>\n";}}}}}else{if($_GET["ns"]!==""&&!$te&&DB!=""){$h->select_db(DB);$S=table_status('',true);}if(support("sql")){echo'<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=jush.js&amp;version=4.2.4",'"></script>
<script type="text/javascript">
';if($S){$Yd=array();foreach($S
as$Q=>$U)$Yd[]=preg_quote($Q,'/');echo"var jushLinks = { $w: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$Yd).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$w;\n";}echo'bodyLoad(\'',(is_object($h)?substr($h->server_info,0,3):""),'\');
</script>
';}$this->databasesPrint($te);if(DB==""||!$te){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".lang(55)."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".lang(64)."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".lang(65)."</a>\n";}if($_GET["ns"]!==""&&!$te&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".lang(66)."</a>\n";if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($te){global$b,$h;$l=$this->databases();echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Hb=" onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'";echo"<span title='".lang(67)."'>DB</span>: ".($l?"<select name='db'$Hb>".optionlist(array(""=>"")+$l,DB)."</select>":'<input name="db" value="'.h(DB).'" autocapitalize="off">'),"<input type='submit' value='".lang(20)."'".($l?" class='hidden'":"").">\n";if($te!="db"&&DB!=""&&$h->select_db(DB)){if(support("scheme")){echo"<br>".lang(68).": <select name='ns'$Hb>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':(isset($_GET["privileges"])?'<input type="hidden" name="privileges" value="">':"")))),"</p></form>\n";}function
tablesPrint($S){echo"<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";foreach($S
as$Q=>$Ig){echo'<a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q,"select").">".lang(69)."</a> ";$C=$this->tableName($Ig);echo(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($Ig)?"view":""),"structure")." title='".lang(39)."'>$C</a>":"<span>$C</span>")."<br>\n";}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$Re;function
page_header($lh,$n="",$Wa=array(),$mh=""){global$ca,$ia,$b,$Xb,$w;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$nh=$lh.($mh!=""?": $mh":"");$oh=strip_tags($nh.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ca,'" dir="',lang(70),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="origin-when-crossorigin">
<title>',$oh,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=4.2.4",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=4.2.4",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.4",'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.4",'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="',lang(70),' nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);"',(isset($_COOKIE["adminer_version"])?"":" onload=\"verifyVersion('$ia');\"");?>>
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(71)),'\';
</script>

<div id="help" class="jush-',$w,' jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
';if($Wa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$Xb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$N=(SERVER!=""?h(SERVER):lang(32));if($Wa===false)echo"$N\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$N</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Wa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Wa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Wa
as$x=>$X){$Ob=(is_array($X)?$X[1]:h($X));if($Ob!="")echo"<a href='".h(ME."$x=").urlencode(is_array($X)?$X[0]:$X)."'>$Ob</a> &raquo; ";}}echo"$lh\n";}}echo"<h2>$nh</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}}function
page_messages($n){$Kh=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$pe=$_SESSION["messages"][$Kh];if($pe){echo"<div class='message'>".implode("</div>\n<div class='message'>",$pe)."</div>\n";unset($_SESSION["messages"][$Kh]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($te=""){global$b,$T;echo'</div>

';switch_lang();if($te!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(72),'" id="logout">
<input type="hidden" name="token" value="',$T,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($te);echo'</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';}function
int32($we){while($we>=2147483648)$we-=4294967296;while($we<=-2147483649)$we+=4294967296;return(int)$we;}function
long2str($W,$ai){$lg='';foreach($W
as$X)$lg.=pack('V',$X);if($ai)return
substr($lg,0,end($W));return$lg;}function
str2long($lg,$ai){$W=array_values(unpack('V*',str_pad($lg,4*ceil(strlen($lg)/4),"\0")));if($ai)$W[]=strlen($lg);return$W;}function
xxtea_mx($gi,$fi,$Pg,$Gd){return
int32((($gi>>5&0x7FFFFFF)^$fi<<2)+(($fi>>3&0x1FFFFFFF)^$gi<<4))^int32(($Pg^$fi)+($Gd^$gi));}function
encrypt_string($Kg,$x){if($Kg=="")return"";$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Kg,true);$we=count($W)-1;$gi=$W[$we];$fi=$W[0];$Kf=floor(6+52/($we+1));$Pg=0;while($Kf-->0){$Pg=int32($Pg+0x9E3779B9);$ec=$Pg>>2&3;for($hf=0;$hf<$we;$hf++){$fi=$W[$hf+1];$ve=xxtea_mx($gi,$fi,$Pg,$x[$hf&3^$ec]);$gi=int32($W[$hf]+$ve);$W[$hf]=$gi;}$fi=$W[0];$ve=xxtea_mx($gi,$fi,$Pg,$x[$hf&3^$ec]);$gi=int32($W[$we]+$ve);$W[$we]=$gi;}return
long2str($W,false);}function
decrypt_string($Kg,$x){if($Kg=="")return"";if(!$x)return
false;$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Kg,false);$we=count($W)-1;$gi=$W[$we];$fi=$W[0];$Kf=floor(6+52/($we+1));$Pg=int32($Kf*0x9E3779B9);while($Pg){$ec=$Pg>>2&3;for($hf=$we;$hf>0;$hf--){$gi=$W[$hf-1];$ve=xxtea_mx($gi,$fi,$Pg,$x[$hf&3^$ec]);$fi=int32($W[$hf]-$ve);$W[$hf]=$fi;}$gi=$W[$we];$ve=xxtea_mx($gi,$fi,$Pg,$x[$hf&3^$ec]);$fi=int32($W[0]-$ve);$W[0]=$fi;$Pg=int32($Pg-0x9E3779B9);}return
long2str($W,true);}$h='';$dd=$_SESSION["token"];if(!$dd)$_SESSION["token"]=rand(1,1e6);$T=get_token();$tf=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($x)=explode(":",$X);$tf[$x]=$X;}}function
add_invalid_login(){global$b;$Ic=get_temp_dir()."/adminer.invalid";$Sc=@fopen($Ic,"r+");if(!$Sc){$Sc=@fopen($Ic,"w");if(!$Sc)return;}flock($Sc,LOCK_EX);$zd=unserialize(stream_get_contents($Sc));$ih=time();if($zd){foreach($zd
as$_d=>$X){if($X[0]<$ih)unset($zd[$_d]);}}$yd=&$zd[$b->bruteForceKey()];if(!$yd)$yd=array($ih+30*60,0);$yd[1]++;$wg=serialize($zd);rewind($Sc);fwrite($Sc,$wg);ftruncate($Sc,strlen($wg));flock($Sc,LOCK_UN);fclose($Sc);}$Ka=$_POST["auth"];if($Ka){$zd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$yd=$zd[$b->bruteForceKey()];$Be=($yd[1]>30?$yd[0]-time():0);if($Be>0)auth_error(lang(73,ceil($Be/60)));session_regenerate_id();$Vh=$Ka["driver"];$N=$Ka["server"];$V=$Ka["username"];$G=(string)$Ka["password"];$m=$Ka["db"];set_password($Vh,$N,$V,$G);$_SESSION["db"][$Vh][$N][$V][$m]=true;if($Ka["permanent"]){$x=base64_encode($Vh)."-".base64_encode($N)."-".base64_encode($V)."-".base64_encode($m);$Ef=$b->permanentLogin(true);$tf[$x]="$x:".base64_encode($Ef?encrypt_string($G,$Ef):"");cookie("adminer_permanent",implode(" ",$tf));}if(count($_POST)==1||DRIVER!=$Vh||SERVER!=$N||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($Vh,$N,$V,$m));}elseif($_POST["logout"]){if($dd&&!verify_token()){page_header(lang(72),lang(74));page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$x)set_session($x,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(75));}}elseif($tf&&!$_SESSION["pwds"]){session_regenerate_id();$Ef=$b->permanentLogin();foreach($tf
as$x=>$X){list(,$hb)=explode(":",$X);list($Vh,$N,$V,$m)=array_map('base64_decode',explode("-",$x));set_password($Vh,$N,$V,decrypt_string(base64_decode($hb),$Ef));$_SESSION["db"][$Vh][$N][$V][$m]=true;}}function
unset_permanent(){global$tf;foreach($tf
as$x=>$X){list($Vh,$N,$V,$m)=array_map('base64_decode',explode("-",$x));if($Vh==DRIVER&&$N==SERVER&&$V==$_GET["username"]&&$m==DB)unset($tf[$x]);}cookie("adminer_permanent",implode(" ",$tf));}function
auth_error($n){global$b,$dd;$n=h($n);$zg=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$zg]||$_GET[$zg])&&!$dd)$n=lang(76);else{add_invalid_login();$G=get_password();if($G!==null){if($G===false)$n.='<br>'.lang(77,'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$zg]&&$_GET[$zg]&&ini_bool("session.use_only_cookies"))$n=lang(78);$F=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$F["lifetime"]);page_header(lang(36),$n,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(79),lang(80,implode(", ",$zf)),false);page_footer("auth");exit;}$h=connect();}$Wb=new
Min_Driver($h);if(!is_object($h)||!$b->login($_GET["username"],get_password()))auth_error((is_string($h)?$h:lang(81)));if($Ka&&$_POST["token"])$_POST["token"]=$T;$n='';if($_POST){if(!verify_token()){$td="max_input_vars";$je=ini_get($td);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$x){$X=ini_get($x);if($X&&(!$je||$X<$je)){$td=$x;$je=$X;}}}$n=(!$_POST["token"]&&$je?lang(82,"'$td'"):lang(74).' '.lang(83));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(84,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(85);}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
select($I,$i=null,$Ze=array(),$z=0){global$w;$Yd=array();$v=array();$f=array();$Ta=array();$Bh=array();$J=array();odd('');for($s=0;(!$z||$s<$z)&&($K=$I->fetch_row());$s++){if(!$s){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($Fd=0;$Fd<count($K);$Fd++){$o=$I->fetch_field();$C=$o->name;$Ye=$o->orgtable;$Xe=$o->orgname;$J[$o->table]=$Ye;if($Ze&&$w=="sql")$Yd[$Fd]=($C=="table"?"table=":($C=="possible_keys"?"indexes=":null));elseif($Ye!=""){if(!isset($v[$Ye])){$v[$Ye]=array();foreach(indexes($Ye,$i)as$u){if($u["type"]=="PRIMARY"){$v[$Ye]=array_flip($u["columns"]);break;}}$f[$Ye]=$v[$Ye];}if(isset($f[$Ye][$Xe])){unset($f[$Ye][$Xe]);$v[$Ye][$Xe]=$Fd;$Yd[$Fd]=$Ye;}}if($o->charsetnr==63)$Ta[$Fd]=true;$Bh[$Fd]=$o->type;echo"<th".($Ye!=""||$o->name!=$Xe?" title='".h(($Ye!=""?"$Ye.":"").$Xe)."'":"").">".h($C).($Ze?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($C))):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($K
as$x=>$X){if($X===null)$X="<i>NULL</i>";elseif($Ta[$x]&&!is_utf8($X))$X="<i>".lang(43,strlen($X))."</i>";elseif(!strlen($X))$X="&nbsp;";else{$X=h($X);if($Bh[$x]==254)$X="<code>$X</code>";}if(isset($Yd[$x])&&!$f[$Yd[$x]]){if($Ze&&$w=="sql"){$Q=$K[array_search("table=",$Yd)];$_=$Yd[$x].urlencode($Ze[$Q]!=""?$Ze[$Q]:$Q);}else{$_="edit=".urlencode($Yd[$x]);foreach($v[$Yd[$x]]as$lb=>$Fd)$_.="&where".urlencode("[".bracket_escape($lb)."]")."=".urlencode($K[$Fd]);}$X="<a href='".h(ME.$_)."'>$X</a>";}echo"<td>$X";}}echo($s?"</table>":"<p class='message'>".lang(12))."\n";return$J;}function
referencable_primary($tg){$J=array();foreach(table_status('',true)as$Tg=>$Q){if($Tg!=$tg&&fk_support($Q)){foreach(fields($Tg)as$o){if($o["primary"]){if($J[$Tg]){unset($J[$Tg]);break;}$J[$Tg]=$o;}}}}return$J;}function
textarea($C,$Y,$L=10,$ob=80){global$w;echo"<textarea name='$C' rows='$L' cols='$ob' class='sqlarea jush-$w' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($x,$o,$nb,$Oc=array()){global$Lg,$Bh,$Ih,$Me;$U=$o["type"];echo'<td><select name="',h($x),'[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);"',on_help("getTarget(event).value",1),'>';if($U&&!isset($Bh[$U])&&!isset($Oc[$U]))array_unshift($Lg,$U);if($Oc)$Lg[lang(86)]=$Oc;echo
optionlist($Lg,$U),'</select>
<td><input name="',h($x),'[length]" value="',h($o["length"]),'" size="3" onfocus="editingLengthFocus(this);"',(!$o["length"]&&preg_match('~var(char|binary)$~',$U)?" class='required'":""),' onchange="editingLengthChange(this);" onkeyup="this.onchange();"><td class="options">';echo"<select name='".h($x)."[collation]'".(preg_match('~(char|text|enum|set)$~',$U)?"":" class='hidden'").'><option value="">('.lang(87).')'.optionlist($nb,$o["collation"]).'</select>',($Ih?"<select name='".h($x)."[unsigned]'".(!$U||preg_match('~((^|[^o])int|float|double|decimal)$~',$U)?"":" class='hidden'").'><option>'.optionlist($Ih,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($x)."[on_update]'".(preg_match('~timestamp|datetime~',$U)?"":" class='hidden'").'>'.optionlist(array(""=>"(".lang(88).")","CURRENT_TIMESTAMP"),$o["on_update"]).'</select>':''),($Oc?"<select name='".h($x)."[on_delete]'".(preg_match("~`~",$U)?"":" class='hidden'")."><option value=''>(".lang(89).")".optionlist(explode("|",$Me),$o["on_delete"])."</select> ":" ");}function
process_length($y){global$pc;return(preg_match("~^\\s*\\(?\\s*$pc(?:\\s*,\\s*$pc)*+\\s*\\)?\\s*\$~",$y)&&preg_match_all("~$pc~",$y,$de)?"(".implode(",",$de[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$y)));}function
process_type($o,$mb="COLLATE"){global$Ih;return" $o[type]".process_length($o["length"]).(preg_match('~(^|[^o])int|float|double|decimal~',$o["type"])&&in_array($o["unsigned"],$Ih)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $mb ".q($o["collation"]):"");}function
process_field($o,$_h){global$w;$Lb=$o["default"];return
array(idf_escape(trim($o["field"])),process_type($_h),($o["null"]?" NULL":" NOT NULL"),(isset($Lb)?" DEFAULT ".((preg_match('~time~',$o["type"])&&preg_match('~^CURRENT_TIMESTAMP$~i',$Lb))||($w=="sqlite"&&preg_match('~^CURRENT_(TIME|TIMESTAMP|DATE)$~i',$Lb))||($o["type"]=="bit"&&preg_match("~^([0-9]+|b'[0-1]+')\$~",$Lb))||($w=="pgsql"&&preg_match("~^[a-z]+\\(('[^']*')+\\)\$~",$Lb))?$Lb:q($Lb)):""),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
type_class($U){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$x=>$X){if(preg_match("~$x|$X~",$U))return" class='$x'";}}function
edit_fields($p,$nb,$U="TABLE",$Oc=array(),$sb=false){global$h,$ud;$p=array_values($p);echo'<thead><tr class="wrap">
';if($U=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th>',($U=="TABLE"?lang(90):lang(91)),'<td>',lang(92),'<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>',lang(93),'<td>',lang(94);if($U=="TABLE"){echo'<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="',lang(56),'">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td>',lang(95),(support("comment")?"<td".($sb?"":" class='hidden'").">".lang(96):"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=4.2.4' alt='+' title='".lang(97)."'>",'<script type="text/javascript">row_count = ',count($p),';</script>
</thead>
<tbody onkeydown="return editingKeydown(event);">
';foreach($p
as$s=>$o){$s++;$af=$o[($_POST?"orig":"field")];$Sb=(isset($_POST["add"][$s-1])||(isset($o["field"])&&!$_POST["drop_col"][$s]))&&(support("drop_col")||$af=="");echo'<tr',($Sb?"":" style='display: none;'"),'>
',($U=="PROCEDURE"?"<td>".html_select("fields[$s][inout]",explode("|",$ud),$o["inout"]):""),'<th>';if($Sb){echo'<input name="fields[',$s,'][field]" value="',h($o["field"]),'" onchange="editingNameChange(this);',($o["field"]!=""||count($p)>1?'':' editingAddRow(this);" onkeyup="if (this.value) editingAddRow(this);'),'" maxlength="64" autocapitalize="off">';}echo'<input type="hidden" name="fields[',$s,'][orig]" value="',h($af),'">
';edit_type("fields[$s]",$o,$nb,$Oc);if($U=="TABLE"){echo'<td>',checkbox("fields[$s][null]",1,$o["null"],"","","block"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$s,'"';if($o["auto_increment"]){echo' checked';}?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }"></label><td><?php
echo
checkbox("fields[$s][has_default]",1,$o["has_default"]),'<input name="fields[',$s,'][default]" value="',h($o["default"]),'" onkeyup="keyupChange.call(this);" onchange="this.previousSibling.checked = true;">
',(support("comment")?"<td".($sb?"":" class='hidden'")."><input name='fields[$s][comment]' value='".h($o["comment"])."' maxlength='".($h->server_info>=5.5?1024:255)."'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$s]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=4.2.4' alt='+' title='".lang(97)."' onclick='return !editingAddRow(this, 1);'>&nbsp;"."<input type='image' class='icon' name='up[$s]' src='".h(preg_replace("~\\?.*~","",ME))."?file=up.gif&amp;version=4.2.4' alt='^' title='".lang(98)."'>&nbsp;"."<input type='image' class='icon' name='down[$s]' src='".h(preg_replace("~\\?.*~","",ME))."?file=down.gif&amp;version=4.2.4' alt='v' title='".lang(99)."'>&nbsp;":""),($af==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$s]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=4.2.4' alt='x' title='".lang(100)."' onclick=\"return !editingRemoveRow(this, 'fields\$1[field]');\">":""),"\n";}}function
process_fields(&$p){ksort($p);$D=0;if($_POST["up"]){$Qd=0;foreach($p
as$x=>$o){if(key($_POST["up"])==$x){unset($p[$x]);array_splice($p,$Qd,0,array($o));break;}if(isset($o["field"]))$Qd=$D;$D++;}}elseif($_POST["down"]){$Qc=false;foreach($p
as$x=>$o){if(isset($o["field"])&&$Qc){unset($p[key($_POST["down"])]);array_splice($p,$D,0,array($Qc));break;}if(key($_POST["down"])==$x)$Qc=$o;$D++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($B){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($B[0][0].$B[0][0],$B[0][0],substr($B[0],1,-1))),'\\'))."'";}function
grant($Vc,$Gf,$f,$Le){if(!$Gf)return
true;if($Gf==array("ALL PRIVILEGES","GRANT OPTION"))return($Vc=="GRANT"?queries("$Vc ALL PRIVILEGES$Le WITH GRANT OPTION"):queries("$Vc ALL PRIVILEGES$Le")&&queries("$Vc GRANT OPTION$Le"));return
queries("$Vc ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$f, ",$Gf).$f).$Le);}function
drop_create($Yb,$j,$Zb,$fh,$bc,$A,$oe,$me,$ne,$Ie,$ze){if($_POST["drop"])query_redirect($Yb,$A,$oe);elseif($Ie=="")query_redirect($j,$A,$ne);elseif($Ie!=$ze){$Cb=queries($j);queries_redirect($A,$me,$Cb&&queries($Yb));if($Cb)queries($Zb);}else
queries_redirect($A,$me,queries($fh)&&queries($bc)&&queries($Yb)&&queries($j));}function
create_trigger($Le,$K){global$w;$kh=" $K[Timing] $K[Event]".($K["Event"]=="UPDATE OF"?" ".idf_escape($K["Of"]):"");return"CREATE TRIGGER ".idf_escape($K["Trigger"]).($w=="mssql"?$Le.$kh:$kh.$Le).rtrim(" $K[Type]\n$K[Statement]",";").";";}function
create_routine($hg,$K){global$ud;$O=array();$p=(array)$K["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$O[]=(preg_match("~^($ud)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}return"CREATE $hg ".idf_escape(trim($K["name"]))." (".implode(", ",$O).")".(isset($_GET["function"])?" RETURNS".process_type($K["returns"],"CHARACTER SET"):"").($K["language"]?" LANGUAGE $K[language]":"").rtrim("\n$K[definition]",";").";";}function
remove_definer($H){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$H);}function
format_foreign_key($q){global$Me;return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$q["source"])).") REFERENCES ".table($q["table"])." (".implode(", ",array_map('idf_escape',$q["target"])).")".(preg_match("~^($Me)\$~",$q["on_delete"])?" ON DELETE $q[on_delete]":"").(preg_match("~^($Me)\$~",$q["on_update"])?" ON UPDATE $q[on_update]":"");}function
tar_file($Ic,$ph){$J=pack("a100a8a8a8a12a12",$Ic,644,0,0,decoct($ph->size),decoct(time()));$fb=8*32;for($s=0;$s<strlen($J);$s++)$fb+=ord($J[$s]);$J.=sprintf("%06o",$fb)."\0 ";echo$J,str_repeat("\0",512-strlen($J));$ph->send();echo
str_repeat("\0",511-($ph->size+511)%512);}function
ini_bytes($td){$X=ini_get($td);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($rf){global$w,$h;$Mh=array('sql'=>"http://dev.mysql.com/doc/refman/".substr($h->server_info,0,3)."/en/",'sqlite'=>"http://www.sqlite.org/",'pgsql'=>"http://www.postgresql.org/docs/".substr($h->server_info,0,3)."/static/",'mssql'=>"http://msdn.microsoft.com/library/",'oracle'=>"http://download.oracle.com/docs/cd/B19306_01/server.102/b14200/",);return($rf[$w]?"<a href='$Mh[$w]$rf[$w]' target='_blank' rel='noreferrer'><sup>?</sup></a>":"");}function
ob_gzencode($P){return
gzencode($P);}function
db_size($m){global$h;if(!$h->select_db($m))return"?";$J=0;foreach(table_status()as$R)$J+=$R["Data_length"]+$R["Index_length"];return
format_number($J);}function
set_utf8mb4($j){global$h;static$O=false;if(!$O&&preg_match('~\butf8mb4~i',$j)){$O=true;echo"SET NAMES ".charset($h).";\n\n";}}function
connect_error(){global$b,$h,$T,$n,$Xb;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header(lang(35).": ".h(DB),lang(101),true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),lang(102),drop_databases($_POST["db"]));page_header(lang(103),$n,false);echo"<p class='links'>\n";foreach(array('database'=>lang(104),'privileges'=>lang(63),'processlist'=>lang(105),'variables'=>lang(106),'status'=>lang(107),)as$x=>$X){if(support($x))echo"<a href='".h(ME)."$x='>$X</a>\n";}echo"<p>".lang(108,$Xb[DRIVER],"<b>".h($h->server_info)."</b>","<b>$h->extension</b>")."\n","<p>".lang(109,"<b>".h(logged_user())."</b>")."\n";$l=$b->databases();if($l){$og=support("scheme");$nb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n","<thead><tr>".(support("database")?"<td>&nbsp;":"")."<th>".lang(35)." - <a href='".h(ME)."refresh=1'>".lang(110)."</a>"."<td>".lang(111)."<td>".lang(112)."<td>".lang(113)." - <a href='".h(ME)."dbsize=1' onclick=\"return !ajaxSetHtml('".h(js_escape(ME))."script=connect');\">".lang(114)."</a>"."</thead>\n";$l=($_GET["dbsize"]?count_tables($l):array_flip($l));foreach($l
as$m=>$S){$gg=h(ME)."db=".urlencode($m);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$m,in_array($m,(array)$_POST["db"])):""),"<th><a href='$gg'>".h($m)."</a>";$d=nbsp(db_collation($m,$nb));echo"<td>".(support("database")?"<a href='$gg".($og?"&amp;ns=":"")."&amp;database=' title='".lang(59)."'>$d</a>":$d),"<td align='right'><a href='$gg&amp;schema=' id='tables-".h($m)."' title='".lang(62)."'>".($_GET["dbsize"]?$S:"?")."</a>","<td align='right' id='size-".h($m)."'>".($_GET["dbsize"]?db_size($m):"?"),"\n";}echo"</table>\n",(support("database")?"<fieldset><legend>".lang(115)." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value='' onclick=\"selectCount('selected', formChecked(this, /^db/));\">\n"."<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n"."</div></fieldset>\n":""),"<script type='text/javascript'>tableCheck();</script>\n","<input type='hidden' name='token' value='$T'>\n","</form>\n";}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$h->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header(lang(68).": ".h($_GET["ns"]),lang(117),true);page_footer("ns");exit;}}$Me="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($xb){$this->size+=strlen($xb);fwrite($this->handler,$xb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$pc="'(?:''|[^'\\\\]|\\\\.)*'";$ud="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$M=array(idf_escape($_GET["field"]));$I=$Wb->select($a,$M,array(where($_GET,$p)),$M);$K=($I?$I->fetch_row():array());echo$K[0];exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$R=table_status1($a,true);page_header(($p&&is_view($R)?lang(118):lang(119)).": ".h($a),$n);$b->selectLinks($R);$rb=$R["Comment"];if($rb!="")echo"<p>".lang(96).": ".h($rb)."\n";if($p){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(120)."<td>".lang(92).(support("comment")?"<td>".lang(96):"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".lang(56)."</i>":""),(isset($o["default"])?" <span title='".lang(95)."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".nbsp($o["comment"]):""),"\n";}echo"</table>\n";}if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".lang(121)."</h3>\n";$v=indexes($a);if($v){echo"<table cellspacing='0'>\n";foreach($v
as$C=>$u){ksort($u["columns"]);$Df=array();foreach($u["columns"]as$x=>$X)$Df[]="<i>".h($X)."</i>".($u["lengths"][$x]?"(".$u["lengths"][$x].")":"").($u["descs"][$x]?" DESC":"");echo"<tr title='".h($C)."'><th>$u[type]<td>".implode(", ",$Df)."\n";}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.lang(122)."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".lang(86)."</h3>\n";$Oc=foreign_keys($a);if($Oc){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(123)."<td>".lang(124)."<td>".lang(89)."<td>".lang(88)."<td>&nbsp;</thead>\n";foreach($Oc
as$C=>$q){echo"<tr title='".h($C)."'>","<th><i>".implode("</i>, <i>",array_map('h',$q["source"]))."</i>","<td><a href='".h($q["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($q["db"]),ME):($q["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($q["ns"]),ME):ME))."table=".urlencode($q["table"])."'>".($q["db"]!=""?"<b>".h($q["db"])."</b>.":"").($q["ns"]!=""?"<b>".h($q["ns"])."</b>.":"").h($q["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$q["target"]))."</i>)","<td>".nbsp($q["on_delete"])."\n","<td>".nbsp($q["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($C)).'">'.lang(125).'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.lang(126)."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".lang(127)."</h3>\n";$zh=triggers($a);if($zh){echo"<table cellspacing='0'>\n";foreach($zh
as$x=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($x)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($x))."'>".lang(125)."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.lang(128)."</a>\n";}}elseif(isset($_GET["schema"])){page_header(lang(62),"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Vg=array();$Wg=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$de,PREG_SET_ORDER);foreach($de
as$s=>$B){$Vg[$B[1]]=array($B[2],$B[3]);$Wg[]="\n\t'".js_escape($B[1])."': [ $B[2], $B[3] ]";}$rh=0;$Qa=-1;$ng=array();$Vf=array();$Ud=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$wf=0;$ng[$Q]["fields"]=array();foreach(fields($Q)as$C=>$o){$wf+=1.25;$o["pos"]=$wf;$ng[$Q]["fields"][$C]=$o;}$ng[$Q]["pos"]=($Vg[$Q]?$Vg[$Q]:array($rh,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$Sd=$Qa;if($Vg[$Q][1]||$Vg[$X["table"]][1])$Sd=min(floatval($Vg[$Q][1]),floatval($Vg[$X["table"]][1]))-1;else$Qa-=.1;while($Ud[(string)$Sd])$Sd-=.0001;$ng[$Q]["references"][$X["table"]][(string)$Sd]=array($X["source"],$X["target"]);$Vf[$X["table"]][$Q][(string)$Sd]=$X["target"];$Ud[(string)$Sd]=true;}}$rh=max($rh,$ng[$Q]["pos"][0]+2.5+$wf);}echo'<div id="schema" style="height: ',$rh,'em;" onselectstart="return false;">
<script type="text/javascript">
var tablePos = {',implode(",",$Wg)."\n",'};
var em = document.getElementById(\'schema\').offsetHeight / ',$rh,';
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, \'',js_escape(DB),'\');
};
</script>
';foreach($ng
as$C=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;' onmousedown='schemaMousedown(this, event);'>",'<a href="'.h(ME).'table='.urlencode($C).'"><b>'.h($C)."</b></a>";foreach($Q["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$ch=>$Wf){foreach($Wf
as$Sd=>$Sf){$Td=$Sd-$Vg[$C][1];$s=0;foreach($Sf[0]as$Dg)echo"\n<div class='references' title='".h($ch)."' id='refs$Sd-".($s++)."' style='left: $Td"."em; top: ".$Q["fields"][$Dg]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$Td)."em;'></div></div>";}}foreach((array)$Vf[$C]as$ch=>$Wf){foreach($Wf
as$Sd=>$f){$Td=$Sd-$Vg[$C][1];$s=0;foreach($f
as$bh)echo"\n<div class='references' title='".h($ch)."' id='refd$Sd-".($s++)."' style='left: $Td"."em; top: ".$Q["fields"][$bh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME))."?file=arrow.gif) no-repeat right center;&amp;version=4.2.4'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$Td)."em;'></div></div>";}}echo"\n</div>\n";}foreach($ng
as$C=>$Q){foreach((array)$Q["references"]as$ch=>$Wf){foreach($Wf
as$Sd=>$Sf){$se=$rh;$he=-10;foreach($Sf[0]as$x=>$Dg){$xf=$Q["pos"][0]+$Q["fields"][$Dg]["pos"];$yf=$ng[$ch]["pos"][0]+$ng[$ch]["fields"][$Sf[1][$x]]["pos"];$se=min($se,$xf,$yf);$he=max($he,$xf,$yf);}echo"<div class='references' id='refl$Sd' style='left: $Sd"."em; top: $se"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($he-$se)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">',lang(129),'</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$_b="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$x)$_b.="&$x=".urlencode($_POST[$x]);cookie("adminer_export",substr($_b,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Ac=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$Bd=preg_match('~sql~',$_POST["format"]);if($Bd){echo"-- Adminer $ia ".$Xb[DRIVER]." dump\n\n";if($w=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
".($_POST["data_style"]?"SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$h->query("SET time_zone = '+00:00';");}}$Mg=$_POST["db_style"];$l=array(DB);if(DB==""){$l=$_POST["databases"];if(is_string($l))$l=explode("\n",rtrim(str_replace("\r","",$l),"\n"));}foreach((array)$l
as$m){$b->dumpDatabase($m);if($h->select_db($m)){if($Bd&&preg_match('~CREATE~',$Mg)&&($j=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1))){set_utf8mb4($j);if($Mg=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($m).";\n";echo"$j;\n";}if($Bd){if($Mg)echo
use_sql($m).";\n\n";$ff="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$hg){foreach(get_rows("SHOW $hg STATUS WHERE Db = ".q($m),null,"-- ")as$K){$j=remove_definer($h->result("SHOW CREATE $hg ".idf_escape($K["Name"]),2));set_utf8mb4($j);$ff.=($Mg!='DROP+CREATE'?"DROP $hg IF EXISTS ".idf_escape($K["Name"]).";;\n":"")."$j;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$K){$j=remove_definer($h->result("SHOW CREATE EVENT ".idf_escape($K["Name"]),3));set_utf8mb4($j);$ff.=($Mg!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($K["Name"]).";;\n":"")."$j;;\n\n";}}if($ff)echo"DELIMITER ;;\n\n$ff"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Yh=array();foreach(table_status('',true)as$C=>$R){$Q=(DB==""||in_array($C,(array)$_POST["tables"]));$Eb=(DB==""||in_array($C,(array)$_POST["data"]));if($Q||$Eb){if($Ac=="tar"){$ph=new
TmpFile;ob_start(array($ph,'write'),1e5);}$b->dumpTable($C,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$Yh[]=$C;elseif($Eb){$p=fields($C);$b->dumpData($C,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($C));}if($Bd&&$_POST["triggers"]&&$Q&&($zh=trigger_sql($C,$_POST["table_style"])))echo"\nDELIMITER ;;\n$zh\nDELIMITER ;\n";if($Ac=="tar"){ob_end_flush();tar_file((DB!=""?"":"$m/")."$C.csv",$ph);}elseif($Bd)echo"\n";}}foreach($Yh
as$Xh)$b->dumpTable($Xh,$_POST["table_style"],1);if($Ac=="tar")echo
pack("x512");}}}if($Bd)echo"-- ".$h->result("SELECT NOW()")."\n";exit;}page_header(lang(65),$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0">
';$Ib=array('','USE','DROP+CREATE','CREATE');$Xg=array('','DROP+CREATE','CREATE');$Fb=array('','TRUNCATE+INSERT','INSERT');if($w=="sql")$Fb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$K);if(!$K)$K=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($K["events"])){$K["routines"]=$K["events"]=($_GET["dump"]=="");$K["triggers"]=$K["table_style"];}echo"<tr><th>".lang(130)."<td>".html_select("output",$b->dumpOutput(),$K["output"],0)."\n";echo"<tr><th>".lang(131)."<td>".html_select("format",$b->dumpFormat(),$K["format"],0)."\n";echo($w=="sqlite"?"":"<tr><th>".lang(35)."<td>".html_select('db_style',$Ib,$K["db_style"]).(support("routine")?checkbox("routines",1,$K["routines"],lang(132)):"").(support("event")?checkbox("events",1,$K["events"],lang(133)):"")),"<tr><th>".lang(112)."<td>".html_select('table_style',$Xg,$K["table_style"]).checkbox("auto_increment",1,$K["auto_increment"],lang(56)).(support("trigger")?checkbox("triggers",1,$K["triggers"],lang(127)):""),"<tr><th>".lang(134)."<td>".html_select('data_style',$Fb,$K["data_style"]),'</table>
<p><input type="submit" value="',lang(65),'">
<input type="hidden" name="token" value="',$T,'">

<table cellspacing="0">
';$Af=array();if(DB!=""){$db=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$db onclick='formCheck(this, /^tables\\[/);'>".lang(112)."</label>","<th style='text-align: right;'><label class='block'>".lang(134)."<input type='checkbox' id='check-data'$db onclick='formCheck(this, /^data\\[/);'></label>","</thead>\n";$Yh="";$Yg=tables_list();foreach($Yg
as$C=>$U){$_f=preg_replace('~_.*~','',$C);$db=($a==""||$a==(substr($a,-1)=="%"?"$_f%":$C));$Df="<tr><td>".checkbox("tables[]",$C,$db,$C,"checkboxClick(event, this); formUncheck('check-tables');","block");if($U!==null&&!preg_match('~table~i',$U))$Yh.="$Df\n";else
echo"$Df<td align='right'><label class='block'><span id='Rows-".h($C)."'></span>".checkbox("data[]",$C,$db,"","checkboxClick(event, this); formUncheck('check-data');")."</label>\n";$Af[$_f]++;}echo$Yh;if($Yg)echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}else{echo"<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"")." onclick='formCheck(this, /^databases\\[/);'>".lang(35)."</label></thead>\n";$l=$b->databases();if($l){foreach($l
as$m){if(!information_schema($m)){$_f=preg_replace('~_.*~','',$m);echo"<tr><td>".checkbox("databases[]",$m,$a==""||$a=="$_f%",$m,"formUncheck('check-databases');","block")."\n";$Af[$_f]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Kc=true;foreach($Af
as$x=>$X){if($x!=""&&$X>1){echo($Kc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$x%")."'>".h($x)."</a>";$Kc=false;}}}elseif(isset($_GET["privileges"])){page_header(lang(63));$I=$h->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$Vc=$I;if(!$I)$I=$h->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($Vc?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".lang(33)."<th>".lang(32)."<th>&nbsp;</thead>\n";while($K=$I->fetch_assoc())echo'<tr'.odd().'><td>'.h($K["User"])."<td>".h($K["Host"]).'<td><a href="'.h(ME.'user='.urlencode($K["User"]).'&host='.urlencode($K["Host"])).'">'.lang(10)."</a>\n";if(!$Vc||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".lang(10)."'>\n";echo"</table>\n","</form>\n",'<p class="links"><a href="'.h(ME).'user=">'.lang(135)."</a>";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$fd=&get_session("queries");$ed=&$fd[DB];if(!$n&&$_POST["clear"]){$ed=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?lang(64):lang(55)),$n);if(!$n&&$_POST){$Sc=false;if(!isset($_GET["import"]))$H=$_POST["query"];elseif($_POST["webfile"]){$Sc=@fopen((file_exists("adminer.sql")?"adminer.sql":"compress.zlib://adminer.sql.gz"),"rb");$H=($Sc?fread($Sc,1e6):false);}else$H=get_file("sql_file",true);if(is_string($H)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($H)+memory_get_usage()+8e6));if($H!=""&&strlen($H)<1e6){$Kf=$H.(preg_match("~;[ \t\r\n]*\$~",$H)?"":";");if(!$ed||reset(end($ed))!=$Kf){restart_session();$ed[]=array($Kf,time());set_session("queries",$fd);stop_session();}}$Eg="(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\r?\n)";$Nb=";";$D=0;$mc=true;$i=connect();if(is_object($i)&&DB!="")$i->select_db(DB);$qb=0;$rc=array();$kf='[\'"'.($w=="sql"?'`#':($w=="sqlite"?'`[':($w=="mssql"?'[':''))).']|/\\*|-- |$'.($w=="pgsql"?'|\\$[^$]*\\$':'');$sh=microtime(true);parse_str($_COOKIE["adminer_export"],$xa);$dc=$b->dumpFormat();unset($dc["sql"]);while($H!=""){if(!$D&&preg_match("~^$Eg*DELIMITER\\s+(\\S+)~i",$H,$B)){$Nb=$B[1];$H=substr($H,strlen($B[0]));}else{preg_match('('.preg_quote($Nb)."\\s*|$kf)",$H,$B,PREG_OFFSET_CAPTURE,$D);list($Qc,$wf)=$B[0];if(!$Qc&&$Sc&&!feof($Sc))$H.=fread($Sc,1e5);else{if(!$Qc&&rtrim($H)=="")break;$D=$wf+strlen($Qc);if($Qc&&rtrim($Qc)!=$Nb){while(preg_match('('.($Qc=='/*'?'\\*/':($Qc=='['?']':(preg_match('~^-- |^#~',$Qc)?"\n":preg_quote($Qc)."|\\\\."))).'|$)s',$H,$B,PREG_OFFSET_CAPTURE,$D)){$lg=$B[0][0];if(!$lg&&$Sc&&!feof($Sc))$H.=fread($Sc,1e5);else{$D=$B[0][1]+strlen($lg);if($lg[0]!="\\")break;}}}else{$mc=false;$Kf=substr($H,0,$wf);$qb++;$Df="<pre id='sql-$qb'><code class='jush-$w'>".shorten_utf8(trim($Kf),1000)."</code></pre>\n";if($w=="sqlite"&&preg_match("~^$Eg*ATTACH\b~i",$Kf,$B)){echo$Df,"<p class='error'>".lang(136)."\n";$rc[]=" <a href='#sql-$qb'>$qb</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$Df;ob_flush();flush();}$Hg=microtime(true);if($h->multi_query($Kf)&&is_object($i)&&preg_match("~^$Eg*USE\\b~isU",$Kf))$i->query($Kf);do{$I=$h->store_result();$ih=" <span class='time'>(".format_time($Hg).")</span>".(strlen($Kf)<1000?" <a href='".h(ME)."sql=".urlencode(trim($Kf))."'>".lang(10)."</a>":"");if($h->error){echo($_POST["only_errors"]?$Df:""),"<p class='error'>".lang(137).($h->errno?" ($h->errno)":"").": ".error()."\n";$rc[]=" <a href='#sql-$qb'>$qb</a>";if($_POST["error_stops"])break
2;}elseif(is_object($I)){$z=$_POST["limit"];$Ze=select($I,$i,array(),$z);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$Ce=$I->num_rows;echo"<p>".($Ce?($z&&$Ce>$z?lang(138,$z):"").lang(139,$Ce):""),$ih;$jd="export-$qb";$_c=", <a href='#$jd' onclick=\"return !toggle('$jd');\">".lang(65)."</a><span id='$jd' class='hidden'>: ".html_select("output",$b->dumpOutput(),$xa["output"])." ".html_select("format",$dc,$xa["format"])."<input type='hidden' name='query' value='".h($Kf)."'>"." <input type='submit' name='export' value='".lang(65)."'><input type='hidden' name='token' value='$T'></span>\n";if($i&&preg_match("~^($Eg|\\()*SELECT\\b~isU",$Kf)&&($zc=explain($i,$Kf))){$jd="explain-$qb";echo", <a href='#$jd' onclick=\"return !toggle('$jd');\">EXPLAIN</a>$_c","<div id='$jd' class='hidden'>\n";select($zc,$i,$Ze);echo"</div>\n";}else
echo$_c;echo"</form>\n";}}else{if(preg_match("~^$Eg*(CREATE|DROP|ALTER)$Eg+(DATABASE|SCHEMA)\\b~isU",$Kf)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($h->info)."'>".lang(140,$h->affected_rows)."$ih\n";}$Hg=microtime(true);}while($h->next_result());}$H=substr($H,$D);$D=0;}}}}if($mc)echo"<p class='message'>".lang(141)."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(142,$qb-count($rc))," <span class='time'>(".format_time($sh).")</span>\n";}elseif($rc&&$qb>1)echo"<p class='error'>".lang(137).": ".implode("",$rc)."\n";}else
echo"<p class='error'>".upload_error($H)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$wc="<input type='submit' value='".lang(143)."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$Kf=$_GET["sql"];if($_POST)$Kf=$_POST["query"];elseif($_GET["history"]=="all")$Kf=$ed;elseif($_GET["history"]!="")$Kf=$ed[$_GET["history"]][0];echo"<p>";textarea("query",$Kf,20);echo($_POST?"":"<script type='text/javascript'>focus(document.getElementsByTagName('textarea')[0]);</script>\n"),"<p>$wc\n",lang(144).": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".lang(145)."</legend><div>",(ini_bool("file_uploads")?"SQL (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$wc":lang(146)),"</div></fieldset>\n","<fieldset><legend>".lang(147)."</legend><div>",lang(148,"<code>adminer.sql".(extension_loaded("zlib")?"[.gz]":"")."</code>"),' <input type="submit" name="webfile" value="'.lang(149).'">',"</div></fieldset>\n","<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),lang(150))."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])),lang(151))."\n","<input type='hidden' name='token' value='$T'>\n";if(!isset($_GET["import"])&&$ed){print_fieldset("history",lang(152),$_GET["history"]!="");for($X=end($ed);$X;$X=prev($ed)){$x=key($ed);list($Kf,$ih,$hc)=$X;echo'<a href="'.h(ME."sql=&history=$x").'">'.lang(10)."</a>"." <span class='time' title='".@date('Y-m-d',$ih)."'>".@date("H:i:s",$ih)."</span>"." <code class='jush-$w'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$Kf)))),80,"</code>").($hc?" <span class='time'>($hc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".lang(153)."'>\n","<a href='".h(ME."sql=&history=all")."'>".lang(154)."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Jh=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$C=>$o){if(!isset($o["privileges"][$Jh?"update":"insert"])||$b->fieldName($o)=="")unset($p[$C]);}if($_POST&&!$n&&!isset($_GET["select"])){$A=$_POST["referer"];if($_POST["insert"])$A=($Jh?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$A))$A=ME."select=".urlencode($a);$v=indexes($a);$Eh=unique_array($_GET["where"],$v);$Nf="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($A,lang(155),$Wb->delete($a,$Nf,!$Eh));else{$O=array();foreach($p
as$C=>$o){$X=process_input($o);if($X!==false&&$X!==null)$O[idf_escape($C)]=$X;}if($Jh){if(!$O)redirect($A);queries_redirect($A,lang(156),$Wb->update($a,$O,$Nf,!$Eh));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$I=$Wb->insert($a,$O);$Rd=($I?last_id():0);queries_redirect($A,lang(157,($Rd?" $Rd":"")),$I);}}}$K=null;if($_POST["save"])$K=(array)$_POST["fields"];elseif($Z){$M=array();foreach($p
as$C=>$o){if(isset($o["privileges"]["select"])){$Ga=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ga="''";if($w=="sql"&&preg_match("~enum|set~",$o["type"]))$Ga="1*".idf_escape($C);$M[]=($Ga?"$Ga AS ":"").idf_escape($C);}}$K=array();if(!support("table"))$M=array("*");if($M){$I=$Wb->select($a,$M,array($Z),$M,array(),(isset($_GET["select"])?2:1));$K=$I->fetch_assoc();if(!$K)$K=false;if(isset($_GET["select"])&&(!$K||$I->fetch_assoc()))$K=null;}}if(!support("table")&&!$p){if(!$Z){$I=$Wb->select($a,array("*"),$Z,array("*"));$K=($I?$I->fetch_assoc():false);if(!$K)$K=array($Wb->primary=>"");}if($K){foreach($K
as$x=>$X){if(!$Z)$K[$x]=null;$p[$x]=array("field"=>$x,"null"=>($x!=$Wb->primary),"auto_increment"=>($x==$Wb->primary));}}}edit_form($a,$p,$K,$Jh);}elseif(isset($_GET["create"])){$a=$_GET["create"];$lf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$x)$lf[$x]=$x;$Uf=referencable_primary($a);$Oc=array();foreach($Uf
as$Tg=>$o)$Oc[str_replace("`","``",$Tg)."`".str_replace("`","``",$o["field"])]=$Tg;$cf=array();$R=array();if($a!=""){$cf=fields($a);$R=table_status($a);if(!$R)$n=lang(9);}$K=$_POST;$K["fields"]=(array)$K["fields"];if($K["auto_increment_col"])$K["fields"][$K["auto_increment_col"]]["auto_increment"]=true;if($_POST&&!process_fields($K["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),lang(158),drop_tables(array($a)));else{$p=array();$Da=array();$Nh=false;$Mc=array();ksort($K["fields"]);$bf=reset($cf);$Aa=" FIRST";foreach($K["fields"]as$x=>$o){$q=$Oc[$o["type"]];$_h=($q!==null?$Uf[$q]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($x==$K["auto_increment_col"])$o["auto_increment"]=true;$If=process_field($o,$_h);$Da[]=array($o["orig"],$If,$Aa);if($If!=process_field($bf,$bf)){$p[]=array($o["orig"],$If,$Aa);if($o["orig"]!=""||$Aa)$Nh=true;}if($q!==null)$Mc[idf_escape($o["field"])]=($a!=""&&$w!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$Oc[$o["type"]],'source'=>array($o["field"]),'target'=>array($_h["field"]),'on_delete'=>$o["on_delete"],));$Aa=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Nh=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$bf=next($cf);if(!$bf)$Aa="";}}$nf="";if($lf[$K["partition_by"]]){$of=array();if($K["partition_by"]=='RANGE'||$K["partition_by"]=='LIST'){foreach(array_filter($K["partition_names"])as$x=>$X){$Y=$K["partition_values"][$x];$of[]="\n  PARTITION ".idf_escape($X)." VALUES ".($K["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$nf.="\nPARTITION BY $K[partition_by]($K[partition])".($of?" (".implode(",",$of)."\n)":($K["partitions"]?" PARTITIONS ".(+$K["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$nf.="\nREMOVE PARTITIONING";$le=lang(159);if($a==""){cookie("adminer_engine",$K["Engine"]);$le=lang(160);}$C=trim($K["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($C),$le,alter_table($a,$C,($w=="sqlite"&&($Nh||$Mc)?$Da:$p),$Mc,($K["Comment"]!=$R["Comment"]?$K["Comment"]:null),($K["Engine"]&&$K["Engine"]!=$R["Engine"]?$K["Engine"]:""),($K["Collation"]&&$K["Collation"]!=$R["Collation"]?$K["Collation"]:""),($K["Auto_increment"]!=""?number($K["Auto_increment"]):""),$nf));}}page_header(($a!=""?lang(41):lang(66)),$n,array("table"=>$a),h($a));if(!$_POST){$K=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($Bh["int"])?"int":(isset($Bh["integer"])?"integer":"")))),"partition_names"=>array(""),);if($a!=""){$K=$R;$K["name"]=$a;$K["fields"]=array();if(!$_GET["auto_increment"])$K["Auto_increment"]="";foreach($cf
as$o){$o["has_default"]=isset($o["default"]);$K["fields"][]=$o;}if(support("partitioning")){$Tc="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$I=$h->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $Tc ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($K["partition_by"],$K["partitions"],$K["partition"])=$I->fetch_row();$of=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $Tc AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$of[""]="";$K["partition_names"]=array_keys($of);$K["partition_values"]=array_values($of);}}}$nb=collations();$oc=engines();foreach($oc
as$nc){if(!strcasecmp($nc,$K["Engine"])){$K["Engine"]=$nc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo
lang(161),': <input name="name" maxlength="64" value="',h($K["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST){?><script type='text/javascript'>focus(document.getElementById('form')['name']);</script><?php }echo($oc?"<select name='Engine' onchange='helpClose();'".on_help("getTarget(event).value",1).">".optionlist(array(""=>"(".lang(162).")")+$oc,$K["Engine"])."</select>":""),' ',($nb&&!preg_match("~sqlite|mssql~",$w)?html_select("Collation",array(""=>"(".lang(87).")")+$nb,$K["Collation"]):""),' <input type="submit" value="',lang(14),'">
';}echo'
';if(support("columns")){echo'<table cellspacing="0" id="edit-fields" class="nowrap">
';$sb=($_POST?$_POST["comments"]:$K["Comment"]!="");if(!$_POST&&!$sb){foreach($K["fields"]as$o){if($o["comment"]!=""){$sb=true;break;}}}edit_fields($K["fields"],$nb,"TABLE",$Oc,$sb);echo'</table>
<p>
',lang(56),': <input type="number" name="Auto_increment" size="6" value="',h($K["Auto_increment"]),'">
',checkbox("defaults",1,true,lang(163),"columnShow(this.checked, 5)","jsonly");if(!$_POST["defaults"]){echo'<script type="text/javascript">editingHideDefaults()</script>';}echo(support("comment")?"<label><input type='checkbox' name='comments' value='1' class='jsonly' onclick=\"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();\"".($sb?" checked":"").">".lang(96)."</label>".' <input name="Comment" id="Comment" value="'.h($K["Comment"]).'" maxlength="'.($h->server_info>=5.5?2048:60).'"'.($sb?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="',lang(14),'">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}if(support("partitioning")){$mf=preg_match('~RANGE|LIST~',$K["partition_by"]);print_fieldset("partition",lang(164),$K["partition_by"]);echo'<p>
',"<select name='partition_by' onchange='partitionByChange(this);'".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).">".optionlist(array(""=>"")+$lf,$K["partition_by"])."</select>",'(<input name="partition" value="',h($K["partition"]),'">)
',lang(165),': <input type="number" name="partitions" class="size',($mf||!$K["partition_by"]?" hidden":""),'" value="',h($K["partitions"]),'">
<table cellspacing="0" id="partition-table"',($mf?"":" class='hidden'"),'>
<thead><tr><th>',lang(166),'<th>',lang(167),'</thead>
';foreach($K["partition_names"]as$x=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'"'.($x==count($K["partition_names"])-1?' onchange="partitionNameChange(this);"':'').' autocapitalize="off">','<td><input name="partition_values[]" value="'.h($K["partition_values"][$x]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$pd=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);if(preg_match('~MyISAM|M?aria'.($h->server_info>=5.6?'|InnoDB':'').'~i',$R["Engine"]))$pd[]="FULLTEXT";$v=indexes($a);$Bf=array();if($w=="mongo"){$Bf=$v["_id_"];unset($pd[0]);unset($v["_id_"]);}$K=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($K["indexes"]as$u){$C=$u["name"];if(in_array($u["type"],$pd)){$f=array();$Wd=array();$Pb=array();$O=array();ksort($u["columns"]);foreach($u["columns"]as$x=>$e){if($e!=""){$y=$u["lengths"][$x];$Ob=$u["descs"][$x];$O[]=idf_escape($e).($y?"(".(+$y).")":"").($Ob?" DESC":"");$f[]=$e;$Wd[]=($y?$y:null);$Pb[]=$Ob;}}if($f){$xc=$v[$C];if($xc){ksort($xc["columns"]);ksort($xc["lengths"]);ksort($xc["descs"]);if($u["type"]==$xc["type"]&&array_values($xc["columns"])===$f&&(!$xc["lengths"]||array_values($xc["lengths"])===$Wd)&&array_values($xc["descs"])===$Pb){unset($v[$C]);continue;}}$c[]=array($u["type"],$C,$O);}}}foreach($v
as$C=>$xc)$c[]=array($xc["type"],$C,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),lang(168),alter_indexes($a,$c));}page_header(lang(121),$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($K["indexes"]as$x=>$u){if($u["columns"][count($u["columns"])]!="")$K["indexes"][$x]["columns"][]="";}$u=end($K["indexes"]);if($u["type"]||array_filter($u["columns"],'strlen'))$K["indexes"][]=array("columns"=>array(1=>""));}if(!$K){foreach($v
as$x=>$u){$v[$x]["name"]=$x;$v[$x]["columns"][]="";}$v[]=array("columns"=>array(1=>""));$K["indexes"]=$v;}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th>',lang(169),'<th><input type="submit" style="left: -1000px; position: absolute;">',lang(170),'<th>',lang(171);?>
<th><noscript><input type='image' class='icon' name='add[0]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=4.2.4' alt='+' title='<?php echo
lang(97),'\'></noscript>&nbsp;
</thead>
';if($Bf){echo"<tr><td>PRIMARY<td>";foreach($Bf["columns"]as$x=>$e){echo
select_input(" disabled",$p,$e),"<label><input disabled type='checkbox'>".lang(50)."</label> ";}echo"<td><td>\n";}$Fd=1;foreach($K["indexes"]as$u){if(!$_POST["drop_col"]||$Fd!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$Fd][type]",array(-1=>"")+$pd,$u["type"],($Fd==count($K["indexes"])?"indexesAddRow(this);":1)),"<td>";ksort($u["columns"]);$s=1;foreach($u["columns"]as$x=>$e){echo"<span>".select_input(" name='indexes[$Fd][columns][$s]' onchange=\"".($s==count($u["columns"])?"indexesAddColumn":"indexesChangeColumn")."(this, '".h(js_escape($w=="sql"?"":$_GET["indexes"]."_"))."');\"",($p?array_combine($p,$p):$p),$e),($w=="sql"||$w=="mssql"?"<input type='number' name='indexes[$Fd][lengths][$s]' class='size' value='".h($u["lengths"][$x])."'>":""),($w!="sql"?checkbox("indexes[$Fd][descs][$s]",1,$u["descs"][$x],lang(50)):"")," </span>";$s++;}echo"<td><input name='indexes[$Fd][name]' value='".h($u["name"])."' autocapitalize='off'>\n","<td><input type='image' class='icon' name='drop_col[$Fd]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=4.2.4' alt='x' title='".lang(100)."' onclick=\"return !editingRemoveRow(this, 'indexes\$1[type]');\">\n";}$Fd++;}echo'</table>
<p>
<input type="submit" value="',lang(14),'">
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["database"])){$K=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$C=trim($K["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),lang(172),drop_databases(array(DB)));}elseif(DB!==$C){if(DB!=""){$_GET["db"]=$C;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($C),lang(173),rename_database($C,$K["collation"]));}else{$l=explode("\n",str_replace("\r","",$C));$Ng=true;$Qd="";foreach($l
as$m){if(count($l)==1||$m!=""){if(!create_database($m,$K["collation"]))$Ng=false;$Qd=$m;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($Qd),lang(174),$Ng);}}else{if(!$K["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($C).(preg_match('~^[a-z0-9_]+$~i',$K["collation"])?" COLLATE $K[collation]":""),substr(ME,0,-1),lang(175));}}page_header(DB!=""?lang(59):lang(176),$n,array(),h(DB));$nb=collations();$C=DB;if($_POST)$C=$K["name"];elseif(DB!="")$K["collation"]=db_collation(DB,$nb);elseif($w=="sql"){foreach(get_vals("SHOW GRANTS")as$Vc){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$Vc,$B)&&$B[1]){$C=stripcslashes(idf_unescape("`$B[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($C,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($C).'</textarea><br>':'<input name="name" id="name" value="'.h($C).'" maxlength="64" autocapitalize="off">')."\n".($nb?html_select("collation",array(""=>"(".lang(87).")")+$nb,$K["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mssql'=>"ms187963.aspx",)):"");?>
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="<?php echo
lang(14),'">
';if(DB!="")echo"<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=4.2.4' alt='+' title='".lang(97)."'>\n";echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["scheme"])){$K=$_POST;if($_POST&&!$n){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,lang(177));else{$C=trim($K["name"]);$_.=urlencode($C);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($C),$_,lang(178));elseif($_GET["ns"]!=$C)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($C),$_,lang(179));else
redirect($_);}}page_header($_GET["ns"]!=""?lang(60):lang(61),$n);if(!$K)$K["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($K["name"]);?>" autocapitalize="off">
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="<?php echo
lang(14),'">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n";echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["call"])){$da=$_GET["call"];page_header(lang(180).": ".h($da),$n);$hg=routine($da,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$nd=array();$ff=array();foreach($hg["fields"]as$s=>$o){if(substr($o["inout"],-3)=="OUT")$ff[$s]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$nd[]=$s;}if(!$n&&$_POST){$Ya=array();foreach($hg["fields"]as$x=>$o){if(in_array($x,$nd)){$X=process_input($o);if($X===false)$X="''";if(isset($ff[$x]))$h->query("SET @".idf_escape($o["field"])." = $X");}$Ya[]=(isset($ff[$x])?"@".idf_escape($o["field"]):$X);}$H=(isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($da)."(".implode(", ",$Ya).")";echo"<p><code class='jush-$w'>".h($H)."</code> <a href='".h(ME)."sql=".urlencode($H)."'>".lang(10)."</a>\n";if(!$h->multi_query($H))echo"<p class='error'>".error()."\n";else{$i=connect();if(is_object($i))$i->select_db(DB);do{$I=$h->store_result();if(is_object($I))select($I,$i);else
echo"<p class='message'>".lang(181,$h->affected_rows)."\n";}while($h->next_result());if($ff)select($h->query("SELECT ".implode(", ",$ff)));}}echo'
<form action="" method="post">
';if($nd){echo"<table cellspacing='0'>\n";foreach($nd
as$x){$o=$hg["fields"][$x];$C=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$C];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$C]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="',lang(180),'">
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$C=$_GET["name"];$K=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$le=($_POST["drop"]?lang(182):($C!=""?lang(183):lang(184)));$A=ME."table=".urlencode($a);$K["source"]=array_filter($K["source"],'strlen');ksort($K["source"]);$bh=array();foreach($K["source"]as$x=>$X)$bh[$x]=$K["target"][$x];$K["target"]=$bh;if($w=="sqlite")queries_redirect($A,$le,recreate_table($a,$a,array(),array(),array(" $C"=>($_POST["drop"]?"":" ".format_foreign_key($K)))));else{$c="ALTER TABLE ".table($a);$Yb="\nDROP ".($w=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($C);if($_POST["drop"])query_redirect($c.$Yb,$A,$le);else{query_redirect($c.($C!=""?"$Yb,":"")."\nADD".format_foreign_key($K),$A,$le);$n=lang(185)."<br>$n";}}}page_header(lang(186),$n,array("table"=>$a),h($a));if($_POST){ksort($K["source"]);if($_POST["add"])$K["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$K["target"]=array();}elseif($C!=""){$Oc=foreign_keys($a);$K=$Oc[$C];$K["source"][]="";}else{$K["table"]=$a;$K["source"]=array("");}$Dg=array_keys(fields($a));$bh=($a===$K["table"]?$Dg:array_keys(fields($K["table"])));$Tf=array_keys(array_filter(table_status('',true),'fk_support'));echo'
<form action="" method="post">
<p>
';if($K["db"]==""&&$K["ns"]==""){echo
lang(187),':
',html_select("table",$Tf,$K["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="',lang(188),'"></noscript>
<table cellspacing="0">
<thead><tr><th>',lang(123),'<th>',lang(124),'</thead>
';$Fd=0;foreach($K["source"]as$x=>$X){echo"<tr>","<td>".html_select("source[".(+$x)."]",array(-1=>"")+$Dg,$X,($Fd==count($K["source"])-1?"foreignAddRow(this);":1)),"<td>".html_select("target[".(+$x)."]",$bh,$K["target"][$x]);$Fd++;}echo'</table>
<p>
',lang(89),': ',html_select("on_delete",array(-1=>"")+explode("|",$Me),$K["on_delete"]),' ',lang(88),': ',html_select("on_update",array(-1=>"")+explode("|",$Me),$K["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="',lang(14),'">
<noscript><p><input type="submit" name="add" value="',lang(189),'"></noscript>
';}if($C!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$K=$_POST;if($_POST&&!$n){$C=trim($K["name"]);$Ga=" AS\n$K[select]";$A=ME."table=".urlencode($C);$le=lang(190);if($_GET["materialized"])$U="MATERIALIZED VIEW";else{$U="VIEW";if($w=="pgsql"){$Ig=table_status($C);$U=($Ig?strtoupper($Ig["Engine"]):$U);}}if(!$_POST["drop"]&&$a==$C&&$w!="sqlite"&&$U!="MATERIALIZED VIEW")query_redirect(($w=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($C).$Ga,$A,$le);else{$dh=$C."_adminer_".uniqid();drop_create("DROP $U ".table($a),"CREATE $U ".table($C).$Ga,"DROP $U ".table($C),"CREATE $U ".table($dh).$Ga,"DROP $U ".table($dh),($_POST["drop"]?substr(ME,0,-1):$A),lang(191),$le,lang(192),$a,$C);}}if(!$_POST&&$a!=""){$K=view($a);$K["name"]=$a;if(!$n)$n=error();}page_header(($a!=""?lang(40):lang(193)),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>',lang(171),': <input name="name" value="',h($K["name"]),'" maxlength="64" autocapitalize="off">
<p>';textarea("select",$K["select"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($_GET["view"]!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$xd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Jg=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$K=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),lang(194));elseif(in_array($K["INTERVAL_FIELD"],$xd)&&isset($Jg[$K["STATUS"]])){$mg="\nON SCHEDULE ".($K["INTERVAL_VALUE"]?"EVERY ".q($K["INTERVAL_VALUE"])." $K[INTERVAL_FIELD]".($K["STARTS"]?" STARTS ".q($K["STARTS"]):"").($K["ENDS"]?" ENDS ".q($K["ENDS"]):""):"AT ".q($K["STARTS"]))." ON COMPLETION".($K["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?lang(195):lang(196)),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$mg.($aa!=$K["EVENT_NAME"]?"\nRENAME TO ".idf_escape($K["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($K["EVENT_NAME"]).$mg)."\n".$Jg[$K["STATUS"]]." COMMENT ".q($K["EVENT_COMMENT"]).rtrim(" DO\n$K[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?lang(197).": ".h($aa):lang(198)),$n);if(!$K&&$aa!=""){$L=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$K=reset($L);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(171),'<td><input name="EVENT_NAME" value="',h($K["EVENT_NAME"]),'" maxlength="64" autocapitalize="off">
<tr><th title="datetime">',lang(199),'<td><input name="STARTS" value="',h("$K[EXECUTE_AT]$K[STARTS]"),'">
<tr><th title="datetime">',lang(200),'<td><input name="ENDS" value="',h($K["ENDS"]),'">
<tr><th>',lang(201),'<td><input type="number" name="INTERVAL_VALUE" value="',h($K["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$xd,$K["INTERVAL_FIELD"]),'<tr><th>',lang(107),'<td>',html_select("STATUS",$Jg,$K["STATUS"]),'<tr><th>',lang(96),'<td><input name="EVENT_COMMENT" value="',h($K["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$K["ON_COMPLETION"]=="PRESERVE",lang(202)),'</table>
<p>';textarea("EVENT_DEFINITION",$K["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($aa!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=$_GET["procedure"];$hg=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$K=$_POST;$K["fields"]=(array)$K["fields"];if($_POST&&!process_fields($K["fields"])&&!$n){$dh="$K[name]_adminer_".uniqid();drop_create("DROP $hg ".idf_escape($da),create_routine($hg,$K),"DROP $hg ".idf_escape($K["name"]),create_routine($hg,array("name"=>$dh)+$K),"DROP $hg ".idf_escape($dh),substr(ME,0,-1),lang(203),lang(204),lang(205),$da,$K["name"]);}page_header(($da!=""?(isset($_GET["function"])?lang(206):lang(207)).": ".h($da):(isset($_GET["function"])?lang(208):lang(209))),$n);if(!$_POST&&$da!=""){$K=routine($da,$hg);$K["name"]=$da;}$nb=get_vals("SHOW CHARACTER SET");sort($nb);$ig=routine_languages();echo'
<form action="" method="post" id="form">
<p>',lang(171),': <input name="name" value="',h($K["name"]),'" maxlength="64" autocapitalize="off">
',($ig?lang(19).": ".html_select("language",$ig,$K["language"]):""),'<input type="submit" value="',lang(14),'">
<table cellspacing="0" class="nowrap">
';edit_fields($K["fields"],$nb,$hg);if(isset($_GET["function"])){echo"<tr><td>".lang(210);edit_type("returns",$K["returns"],$nb);}echo'</table>
<p>';textarea("definition",$K["definition"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($da!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$K=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);$C=trim($K["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,lang(211));elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($C),$_,lang(212));elseif($fa!=$C)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($C),$_,lang(213));else
redirect($_);}page_header($fa!=""?lang(214).": ".h($fa):lang(215),$n);if(!$K)$K["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($K["name"]),'" autocapitalize="off">
<input type="submit" value="',lang(14),'">
';if($fa!="")echo"<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n";echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$K=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,lang(216));else
query_redirect("CREATE TYPE ".idf_escape(trim($K["name"]))." $K[as]",$_,lang(217));}page_header($ga!=""?lang(218).": ".h($ga):lang(219),$n);if(!$K)$K["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n";else{echo"<input name='name' value='".h($K['name'])."' autocapitalize='off'>\n";textarea("as",$K["as"]);echo"<p><input type='submit' value='".lang(14)."'>\n";}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$C=$_GET["name"];$yh=trigger_options();$K=(array)trigger($C)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$yh["Timing"])&&in_array($_POST["Event"],$yh["Event"])&&in_array($_POST["Type"],$yh["Type"])){$Le=" ON ".table($a);$Yb="DROP TRIGGER ".idf_escape($C).($w=="pgsql"?$Le:"");$A=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($Yb,$A,lang(220));else{if($C!="")queries($Yb);queries_redirect($A,($C!=""?lang(221):lang(222)),queries(create_trigger($Le,$_POST)));if($C!="")queries(create_trigger($Le,$K+array("Type"=>reset($yh["Type"]))));}}$K=$_POST;}page_header(($C!=""?lang(223).": ".h($C):lang(224)),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>',lang(225),'<td>',html_select("Timing",$yh["Timing"],$K["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>',lang(226),'<td>',html_select("Event",$yh["Event"],$K["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$yh["Event"])?" <input name='Of' value='".h($K["Of"])."' class='hidden'>":""),'<tr><th>',lang(92),'<td>',html_select("Type",$yh["Type"],$K["Type"]),'</table>
<p>',lang(171),': <input name="Trigger" value="',h($K["Trigger"]);?>" maxlength="64" autocapitalize="off">
<script type="text/javascript">document.getElementById('form')['Timing'].onchange();</script>
<p><?php textarea("Statement",$K["Statement"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($C!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$Gf=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$K){foreach(explode(",",($K["Privilege"]=="Grant option"?"":$K["Context"]))as$yb)$Gf[$yb][$K["Privilege"]]=$K["Comment"];}$Gf["Server Admin"]+=$Gf["File access on server"];$Gf["Databases"]["Create routine"]=$Gf["Procedures"]["Create routine"];unset($Gf["Procedures"]["Create routine"]);$Gf["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$Gf["Columns"][$X]=$Gf["Tables"][$X];unset($Gf["Server Admin"]["Usage"]);foreach($Gf["Tables"]as$x=>$X)unset($Gf["Databases"][$x]);$ye=array();if($_POST){foreach($_POST["objects"]as$x=>$X)$ye[$X]=(array)$ye[$X]+(array)$_POST["grants"][$x];}$Wc=array();$Je="";if(isset($_GET["host"])&&($I=$h->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($K=$I->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$K[0],$B)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$B[1],$de,PREG_SET_ORDER)){foreach($de
as$X){if($X[1]!="USAGE")$Wc["$B[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$K[0]))$Wc["$B[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$K[0],$B))$Je=$B[1];}}if($_POST&&!$n){$Ke=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $Ke",ME."privileges=",lang(227));else{$_e=q($_POST["user"])."@".q($_POST["host"]);$pf=$_POST["pass"];if($pf!=''&&!$_POST["hashed"]){$pf=$h->result("SELECT PASSWORD(".q($pf).")");$n=!$pf;}$Cb=false;if(!$n){if($Ke!=$_e){$Cb=queries(($h->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $_e IDENTIFIED BY PASSWORD ".q($pf));$n=!$Cb;}elseif($pf!=$Je)queries("SET PASSWORD FOR $_e = ".q($pf));}if(!$n){$eg=array();foreach($ye
as$Ee=>$Vc){if(isset($_GET["grant"]))$Vc=array_filter($Vc);$Vc=array_keys($Vc);if(isset($_GET["grant"]))$eg=array_diff(array_keys(array_filter($ye[$Ee],'strlen')),$Vc);elseif($Ke==$_e){$He=array_keys((array)$Wc[$Ee]);$eg=array_diff($He,$Vc);$Vc=array_diff($Vc,$He);unset($Wc[$Ee]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$Ee,$B)&&(!grant("REVOKE",$eg,$B[2]," ON $B[1] FROM $_e")||!grant("GRANT",$Vc,$B[2]," ON $B[1] TO $_e"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($Ke!=$_e)queries("DROP USER $Ke");elseif(!isset($_GET["grant"])){foreach($Wc
as$Ee=>$eg){if(preg_match('~^(.+)(\\(.*\\))?$~U',$Ee,$B))grant("REVOKE",array_keys($eg),$B[2]," ON $B[1] FROM $_e");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?lang(228):lang(229)),!$n);if($Cb)$h->query("DROP USER $_e");}}page_header((isset($_GET["host"])?lang(33).": ".h("$ha@$_GET[host]"):lang(135)),$n,array("privileges"=>array('',lang(63))));if($_POST){$K=$_POST;$Wc=$ye;}else{$K=$_GET+array("host"=>$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$K["pass"]=$Je;if($Je!="")$K["hashed"]=true;$Wc[(DB==""||$Wc?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(32),'<td><input name="host" maxlength="60" value="',h($K["host"]),'" autocapitalize="off">
<tr><th>',lang(33),'<td><input name="user" maxlength="16" value="',h($K["user"]),'" autocapitalize="off">
<tr><th>',lang(34),'<td><input name="pass" id="pass" value="',h($K["pass"]),'">
';if(!$K["hashed"]){echo'<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';}echo
checkbox("hashed",1,$K["hashed"],lang(230),"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".lang(63).doc_link(array('sql'=>"grant.html#priv_level"));$s=0;foreach($Wc
as$Ee=>$Vc){echo'<th>'.($Ee!="*.*"?"<input name='objects[$s]' value='".h($Ee)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");$s++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>lang(32),"Databases"=>lang(35),"Tables"=>lang(119),"Columns"=>lang(120),"Procedures"=>lang(231),)as$yb=>$Ob){foreach((array)$Gf[$yb]as$Ff=>$rb){echo"<tr".odd()."><td".($Ob?">$Ob<td":" colspan='2'").' lang="en" title="'.h($rb).'">'.h($Ff);$s=0;foreach($Wc
as$Ee=>$Vc){$C="'grants[$s][".h(strtoupper($Ff))."]'";$Y=$Vc[strtoupper($Ff)];if($yb=="Server Admin"&&$Ee!=(isset($Wc["*.*"])?"*.*":".*"))echo"<td>&nbsp;";elseif(isset($_GET["grant"]))echo"<td><select name=$C><option><option value='1'".($Y?" selected":"").">".lang(232)."<option value='0'".($Y=="0"?" selected":"").">".lang(233)."</select>";else
echo"<td align='center'><label class='block'><input type='checkbox' name=$C value='1'".($Y?" checked":"").($Ff=="All privileges"?" id='grants-$s-all'":($Ff=="Grant option"?"":" onclick=\"if (this.checked) formUncheck('grants-$s-all');\""))."></label>";$s++;}}}echo"</table>\n",'<p>
<input type="submit" value="',lang(14),'">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$n){$Md=0;foreach((array)$_POST["kill"]as$X){if(queries("KILL ".number($X)))$Md++;}queries_redirect(ME."processlist=",lang(234,$Md),$Md||!$_POST["kill"]);}page_header(lang(105),$n);echo'
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" ondblclick="tableClick(event, true);" class="nowrap checkable">
';$s=-1;foreach(process_list()as$s=>$K){if(!$s){echo"<thead><tr lang='en'>".(support("kill")?"<th>&nbsp;":"");foreach($K
as$x=>$X)echo"<th>$x".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($x),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"../b14237/dynviews_2088.htm",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$K["Id"],0):"");foreach($K
as$x=>$X)echo"<td>".(($w=="sql"&&$x=="Info"&&preg_match("~Query|Killed~",$K["Command"])&&$X!="")||($w=="pgsql"&&$x=="current_query"&&$X!="<IDLE>")||($w=="oracle"&&$x=="sql_text"&&$X!="")?"<code class='jush-$w'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($K["db"]!=""?"db=".urlencode($K["db"])."&":"")."sql=".urlencode($X)).'">'.lang(235).'</a>':nbsp($X));echo"\n";}echo'</table>
<script type=\'text/javascript\'>tableCheck();</script>
<p>
';if(support("kill")){echo($s+1)."/".lang(236,$h->result("SELECT @@max_connections")),"<p><input type='submit' value='".lang(237)."'>\n";}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$v=indexes($a);$p=fields($a);$Oc=column_foreign_keys($a);$Ge="";if($R["Oid"]){$Ge=($w=="sqlite"?"rowid":"oid");$v[]=array("type"=>"PRIMARY","columns"=>array($Ge));}parse_str($_COOKIE["adminer_import"],$ya);$fg=array();$f=array();$hh=null;foreach($p
as$x=>$o){$C=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$C!=""){$f[$x]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($o))$hh=$b->selectLengthProcess();}$fg+=$o["privileges"];}list($M,$Xc)=$b->selectColumnsProcess($f,$v);$Ad=count($Xc)<count($M);$Z=$b->selectSearchProcess($p,$v);$We=$b->selectOrderProcess($p,$v);$z=$b->selectLimitProcess();$Tc=($M?implode(", ",$M):"*".($Ge?", $Ge":"")).convert_fields($f,$p,$M)."\nFROM ".table($a);$Yc=($Xc&&$Ad?"\nGROUP BY ".implode(", ",$Xc):"").($We?"\nORDER BY ".implode(", ",$We):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Fh=>$K){$Ga=convert_field($p[key($K)]);$M=array($Ga?$Ga:idf_escape(key($K)));$Z[]=where_check($Fh,$p);$J=$Wb->select($a,$M,$Z,$M);if($J)echo
reset($J->fetch_row());}exit;}if($_POST&&!$n){$ci=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$eb=array();foreach($_POST["check"]as$bb)$eb[]=where_check($bb,$p);$ci[]="((".implode(") OR (",$eb)."))";}$ci=($ci?"\nWHERE ".implode(" AND ",$ci):"");$Bf=$Hh=null;foreach($v
as$u){if($u["type"]=="PRIMARY"){$Bf=array_flip($u["columns"]);$Hh=($M?$Bf:array());break;}}foreach((array)$Hh
as$x=>$X){if(in_array(idf_escape($x),$M))unset($Hh[$x]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$Hh===array())$H="SELECT $Tc$ci$Yc";else{$Dh=array();foreach($_POST["check"]as$X)$Dh[]="(SELECT".limit($Tc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$Yc,1).")";$H=implode(" UNION ALL ",$Dh);}$b->dumpData($a,"table",$H);exit;}if(!$b->selectEmailProcess($Z,$Oc)){if($_POST["save"]||$_POST["delete"]){$I=true;$za=0;$O=array();if(!$_POST["delete"]){foreach($f
as$C=>$X){$X=process_input($p[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$O[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$O){if($_POST["clone"])$H="INTO ".table($a)." (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a);if($_POST["all"]||($Hh===array()&&is_array($_POST["check"]))||$Ad){$I=($_POST["delete"]?$Wb->delete($a,$ci):($_POST["clone"]?queries("INSERT $H$ci"):$Wb->update($a,$O,$ci)));$za=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$bi="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$I=($_POST["delete"]?$Wb->delete($a,$bi,1):($_POST["clone"]?queries("INSERT".limit1($H,$bi)):$Wb->update($a,$O,$bi)));if(!$I)break;$za+=$h->affected_rows;}}}$le=lang(238,$za);if($_POST["clone"]&&$I&&$za==1){$Rd=last_id();if($Rd)$le=lang(157," $Rd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$le,$I);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(239);else{$I=true;$za=0;foreach($_POST["val"]as$Fh=>$K){$O=array();foreach($K
as$x=>$X){$x=bracket_escape($x,1);$O[idf_escape($x)]=(preg_match('~char|text~',$p[$x]["type"])||$X!=""?$b->processInput($p[$x],$X):"NULL");}$I=$Wb->update($a,$O," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Fh,$p),!($Ad||$Hh===array())," ");if(!$I)break;$za+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(238,$za),$I);}}elseif(!is_string($Hc=get_file("csv_file",true)))$n=upload_error($Hc);elseif(!preg_match('~~u',$Hc))$n=lang(240);else{cookie("adminer_import","output=".urlencode($ya["output"])."&format=".urlencode($_POST["separator"]));$I=true;$ob=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Hc,$de);$za=count($de[0]);$Wb->begin();$ug=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$L=array();foreach($de[0]as$x=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$ug]*)$ug~",$X.$ug,$ee);if(!$x&&!array_diff($ee[1],$ob)){$ob=$ee[1];$za--;}else{$O=array();foreach($ee[1]as$s=>$lb)$O[idf_escape($ob[$s])]=($lb==""&&$p[$ob[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$lb))));$L[]=$O;}}$I=(!$L||$Wb->insertUpdate($a,$L,$Bf));if($I)$Wb->commit();queries_redirect(remove_from_uri("page"),lang(241,$za),$I);$Wb->rollback();}}}$Tg=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(44).": $Tg",$n);$O=null;if(isset($fg["insert"])||!support("table")){$O="";foreach((array)$_GET["where"]as$X){if(count($Oc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$O);if(!$f&&support("table"))echo"<p class='error'>".lang(242).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($M,$f);$b->selectSearchPrint($Z,$f,$v);$b->selectOrderPrint($We,$f,$v);$b->selectLimitPrint($z);$b->selectLengthPrint($hh);$b->selectActionPrint($v);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$Rc=$h->result(count_rows($a,$Z,$Ad,$Xc));$E=floor(max(0,$Rc-1)/$z);}$rg=$M;if(!$rg){$rg[]="*";if($Ge)$rg[]=$Ge;}$zb=convert_fields($f,$p,$M);if($zb)$rg[]=substr($zb,2);$I=$Wb->select($a,$rg,$Z,$Xc,$We,$z,$E,true);if(!$I)echo"<p class='error'>".error()."\n";else{if($w=="mssql"&&$E)$I->seek($z*$E);$lc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$L=array();while($K=$I->fetch_assoc()){if($E&&$w=="oracle")unset($K["RNUM"]);$L[]=$K;}if($_GET["page"]!="last"&&+$z&&$Xc&&$Ad&&$w=="sql")$Rc=$h->result(" SELECT FOUND_ROWS()");if(!$L)echo"<p class='message'>".lang(12)."\n";else{$Pa=$b->backwardKeys($a,$Tg);echo"<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$Xc&&$M?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(243)."</a>");$xe=array();$Uc=array();reset($M);$Pf=1;foreach($L[0]as$x=>$X){if($x!=$Ge){$X=$_GET["columns"][key($M)];$o=$p[$M?($X?$X["col"]:current($M)):$x];$C=($o?$b->fieldName($o,$Pf):($X["fun"]?"*":$x));if($C!=""){$Pf++;$xe[$x]=$C;$e=idf_escape($x);$id=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x);$Ob="&desc%5B0%5D=1";echo'<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">','<a href="'.h($id.($We[0]==$e||$We[0]==$x||(!$We&&$Ad&&$Xc[0]==$e)?$Ob:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($id.$Ob)."' title='".lang(50)."' class='text'> â†“</a>";if(!$X["fun"])echo'<a href="#fieldset-search" onclick="selectSearch(\''.h(js_escape($x)).'\'); return false;" title="'.lang(47).'" class="text jsonly"> =</a>';echo"</span>";}$Uc[$x]=$X["fun"];next($M);}}$Wd=array();if($_GET["modify"]){foreach($L
as$K){foreach($K
as$x=>$X)$Wd[$x]=max($Wd[$x],min(40,strlen(utf8_decode($X))));}}echo($Pa?"<th>".lang(244):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($L,$Oc)as$we=>$K){$Eh=unique_array($L[$we],$v);if(!$Eh){$Eh=array();foreach($L[$we]as$x=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$x))$Eh[$x]=$X;}}$Fh="";foreach($Eh
as$x=>$X){if(($w=="sql"||$w=="pgsql")&&strlen($X)>64){$x=(strpos($x,'(')?$x:idf_escape($x));$x="MD5(".($w=='sql'&&preg_match("~^utf8_~",$p[$x]["collation"])?$x:"CONVERT($x USING ".charset($h).")").")";$X=md5($X);}$Fh.="&".($X!==null?urlencode("where[".bracket_escape($x)."]")."=".urlencode($X):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$Xc&&$M?"":"<td>".checkbox("check[]",substr($Fh,1),in_array(substr($Fh,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($Ad||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Fh)."'>".lang(245)."</a>"));foreach($K
as$x=>$X){if(isset($xe[$x])){$o=$p[$x];if($X!=""&&(!isset($lc[$x])||$lc[$x]!=""))$lc[$x]=(is_mail($X)?$xe[$x]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($x).$Fh;if(!$_&&$X!==null){foreach((array)$Oc[$x]as$q){if(count($Oc[$x])==1||end($q["source"])==$x){$_="";foreach($q["source"]as$s=>$Dg)$_.=where_link($s,$q["target"][$s],$L[$we][$Dg]);$_=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$_;if(count($q["source"])==1)break;}}}if($x=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Eh))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Eh
as$Gd=>$W)$_.=where_link($s++,$Gd,$W);}$X=select_value($X,$_,$o,$hh);$jd=h("val[$Fh][".bracket_escape($x)."]");$Y=$_POST["val"][$Fh][bracket_escape($x)];$gc=!is_array($K[$x])&&is_utf8($X)&&$L[$we][$x]==$K[$x]&&!$Uc[$x];$gh=preg_match('~text|lob~',$o["type"]);if(($_GET["modify"]&&$gc)||$Y!==null){$ad=h($Y!==null?$Y:$K[$x]);echo"<td>".($gh?"<textarea name='$jd' cols='30' rows='".(substr_count($K[$x],"\n")+1)."'>$ad</textarea>":"<input name='$jd' value='$ad' size='$Wd[$x]'>");}else{$ae=strpos($X,"<i>...</i>");echo"<td id='$jd' onclick=\"selectClick(this, event, ".($ae?2:($gh?1:0)).($gc?"":", '".h(lang(246))."'").");\">$X";}}}if($Pa)echo"<td>";$b->backwardKeysPrint($Pa,$L[$we]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($L||$E)&&!is_ajax()){$vc=true;if($_GET["page"]!="last"){if(!+$z)$Rc=count($L);elseif($w!="sql"||!$Ad){$Rc=($Ad?false:found_rows($R,$Z));if($Rc<max(1e4,2*($E+1)*$z))$Rc=reset(slow_query(count_rows($a,$Z,$Ad,$Xc)));else$vc=false;}}if(+$z&&($Rc===false||$Rc>$z||$E)){echo"<p class='pages'>";$ge=($Rc===false?$E+(count($L)>=$z?2:1):floor(($Rc-1)/$z));if($w!="simpledb"){echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".lang(247)."', '".($E+1)."'), event); return false;\">".lang(247)."</a>:",pagination(0,$E).($E>5?" ...":"");for($s=max(1,$E-4);$s<min($ge,$E+5);$s++)echo
pagination($s,$E);if($ge>0){echo($E+5<$ge?" ...":""),($vc&&$Rc!==false?pagination($ge,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$ge'>".lang(248)."</a>");}echo(($Rc===false?count($L)+1:$Rc-$E*$z)>$z?' <a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" onclick="return !selectLoadMore(this, '.(+$z).', \''.lang(249).'...\');" class="loadmore">'.lang(250).'</a>':'');}else{echo
lang(247).":",pagination(0,$E).($E>1?" ...":""),($E?pagination($E,$E):""),($ge>$E?pagination($E+1,$E).($ge>$E+1?" ...":""):"");}}echo"<p class='count'>\n",($Rc!==false?"(".($vc?"":"~ ").lang(139,$Rc).") ":"");$Tb=($vc?"":"~ ").$Rc;echo
checkbox("all",1,0,lang(251),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Tb' : checked); selectCount('selected2', this.checked || !checked ? '$Tb' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(243),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(239).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(115),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(235),'">
<input type="submit" name="delete" value="',lang(18),'"',confirm(),'>
</div></fieldset>
';}$Pc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Pc['sql']);break;}}if($Pc){print_fieldset("export",lang(65)." <span id='selected2'></span>");$gf=$b->dumpOutput();echo($gf?html_select("output",$gf,$ya["output"])." ":""),html_select("format",$Pc,$ya["format"])," <input type='submit' name='export' value='".lang(65)."'>\n","</div></fieldset>\n";}echo(!$Xc&&$M?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($b->selectImportPrint()){print_fieldset("import",lang(64),!$L);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ya["format"],1);echo" <input type='submit' name='import' value='".lang(64)."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($lc,'strlen'),$f);echo"<p><input type='hidden' name='token' value='$T'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$Ig=isset($_GET["status"]);page_header($Ig?lang(107):lang(106));$Uh=($Ig?show_status():show_variables());if(!$Uh)echo"<p class='message'>".lang(12)."\n";else{echo"<table cellspacing='0'>\n";foreach($Uh
as$x=>$X){echo"<tr>","<th><code class='jush-".$w.($Ig?"status":"set")."'>".h($x)."</code>","<td>".nbsp($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Qg=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$C=>$R){json_row("Comment-$C",nbsp($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$x)json_row("$x-$C",nbsp($R[$x]));foreach($Qg+array("Auto_increment"=>0,"Rows"=>0)as$x=>$X){if($R[$x]!=""){$X=format_number($R[$x]);json_row("$x-$C",($x=="Rows"&&$X&&$R["Engine"]==($Fg=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Qg[$x]))$Qg[$x]+=($R["Engine"]!="InnoDB"||$x!="Data_free"?$R[$x]:0);}elseif(array_key_exists($x,$R))json_row("$x-$C");}}}foreach($Qg
as$x=>$X)json_row("sum-$x",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$m=>$X){json_row("tables-$m",$X);json_row("size-$m",db_size($m));}json_row("");}exit;}else{$Zg=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Zg&&!$n&&!$_POST["search"]){$I=true;$le="";if($w=="sql"&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$I=truncate_tables($_POST["tables"]);$le=lang(252);}elseif($_POST["move"]){$I=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$le=lang(253);}elseif($_POST["copy"]){$I=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$le=lang(254);}elseif($_POST["drop"]){if($_POST["views"])$I=drop_views($_POST["views"]);if($I&&$_POST["tables"])$I=drop_tables($_POST["tables"]);$le=lang(255);}elseif($w!="sql"){$I=($w=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$le=lang(256);}elseif(!$_POST["tables"])$le=lang(9);elseif($I=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($K=$I->fetch_assoc())$le.="<b>".h($K["Table"])."</b>: ".h($K["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$le,$I);}page_header(($_GET["ns"]==""?lang(35).": ".h(DB):lang(68).": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".lang(257)."</h3>\n";$Yg=tables_list();if(!$Yg)echo"<p class='message'>".lang(9)."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".lang(258)." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' name='search' value='".lang(47)."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!="")search_tables();}echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);">';$Ub=doc_link(array('sql'=>'show-table-status.html'));echo'<th>'.lang(119),'<td>'.lang(259).doc_link(array('sql'=>'storage-engines.html')),'<td>'.lang(111).doc_link(array('sql'=>'charset-mysql.html')),'<td>'.lang(260).$Ub,'<td>'.lang(261).$Ub,'<td>'.lang(262).$Ub,'<td>'.lang(56).doc_link(array('sql'=>'example-auto-increment.html')),'<td>'.lang(263).$Ub,(support("comment")?'<td>'.lang(96).$Ub:''),"</thead>\n";$S=0;foreach($Yg
as$C=>$U){$Xh=($U!==null&&!preg_match('~table~i',$U));echo'<tr'.odd().'><td>'.checkbox(($Xh?"views[]":"tables[]"),$C,in_array($C,$Zg,true),"","formUncheck('check-all');"),'<th>'.(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($C).'" title="'.lang(39).'">'.h($C).'</a>':h($C));if($Xh){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($C).'" title="'.lang(40).'">'.(preg_match('~materialized~i',$U)?lang(264):lang(118)).'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($C).'" title="'.lang(38).'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",lang(41)),"Index_length"=>array("indexes",lang(122)),"Data_free"=>array("edit",lang(42)),"Auto_increment"=>array("auto_increment=1&create",lang(41)),"Rows"=>array("select",lang(38)),)as$x=>$_){$jd=" id='$x-".h($C)."'";echo($_?"<td align='right'>".(support("table")||$x=="Rows"||(support("indexes")&&$x!="Data_length")?"<a href='".h(ME."$_[0]=").urlencode($C)."'$jd title='$_[1]'>?</a>":"<span$jd>?</span>"):"<td id='$x-".h($C)."'>&nbsp;");}$S++;}echo(support("comment")?"<td id='Comment-".h($C)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".lang(236,count($Yg)),"<td>".nbsp($w=="sql"?$h->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$x)echo"<td align='right' id='sum-$x'>&nbsp;";echo"</table>\n";if(!information_schema(DB)){$Rh="<input type='submit' value='".lang(265)."'".on_help("'VACUUM'")."> ";$Se="<input type='submit' name='optimize' value='".lang(266)."'".on_help($w=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'")."> ";echo"<fieldset><legend>".lang(115)." <span id='selected'></span></legend><div>".($w=="sqlite"?$Rh:($w=="pgsql"?$Rh.$Se:($w=="sql"?"<input type='submit' value='".lang(267)."'".on_help("'ANALYZE TABLE'")."> ".$Se."<input type='submit' name='check' value='".lang(268)."'".on_help("'CHECK TABLE'")."> "."<input type='submit' name='repair' value='".lang(269)."'".on_help("'REPAIR TABLE'")."> ":"")))."<input type='submit' name='truncate' value='".lang(270)."'".confirm().on_help($w=="sqlite"?"'DELETE'":"'TRUNCATE".($w=="pgsql"?"'":" TABLE'"))."> "."<input type='submit' name='drop' value='".lang(116)."'".confirm().on_help("'DROP TABLE'").">\n";$l=(support("scheme")?$b->schemas():$b->databases());if(count($l)!=1&&$w!="sqlite"){$m=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".lang(271).": ",($l?html_select("target",$l,$m):'<input name="target" value="'.h($m).'" autocapitalize="off">')," <input type='submit' name='move' value='".lang(272)."'>",(support("copy")?" <input type='submit' name='copy' value='".lang(273)."'>":""),"\n";}echo"<input type='hidden' name='all' value='' onclick=\"selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")."\">\n";echo"<input type='hidden' name='token' value='$T'>\n","</div></fieldset>\n";}echo"</form>\n","<script type='text/javascript'>tableCheck();</script>\n";}echo'<p class="links"><a href="'.h(ME).'create=">'.lang(66)."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.lang(193)."</a>\n":""),(support("materializedview")?'<a href="'.h(ME).'view=&amp;materialized=1">'.lang(274)."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".lang(132)."</h3>\n";$jg=routines();if($jg){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.lang(171).'<td>'.lang(92).'<td>'.lang(210)."<td>&nbsp;</thead>\n";odd('');foreach($jg
as$K){echo'<tr'.odd().'>','<th><a href="'.h(ME).($K["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($K["ROUTINE_NAME"]).'">'.h($K["ROUTINE_NAME"]).'</a>','<td>'.h($K["ROUTINE_TYPE"]),'<td>'.h($K["DTD_IDENTIFIER"]),'<td><a href="'.h(ME).($K["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($K["ROUTINE_NAME"]).'">'.lang(125)."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.lang(209).'</a>':'').'<a href="'.h(ME).'function=">'.lang(208)."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".lang(275)."</h3>\n";$vg=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($vg){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(171)."</thead>\n";odd('');foreach($vg
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".lang(215)."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".lang(23)."</h3>\n";$Ph=types();if($Ph){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(171)."</thead>\n";odd('');foreach($Ph
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".lang(219)."</a>\n";}if(support("event")){echo"<h3 id='events'>".lang(133)."</h3>\n";$L=get_rows("SHOW EVENTS");if($L){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(171)."<td>".lang(276)."<td>".lang(199)."<td>".lang(200)."<td></thead>\n";foreach($L
as$K){echo"<tr>","<th>".h($K["Name"]),"<td>".($K["Execute at"]?lang(277)."<td>".$K["Execute at"]:lang(201)." ".$K["Interval value"]." ".$K["Interval field"]."<td>$K[Starts]"),"<td>$K[Ends]",'<td><a href="'.h(ME).'event='.urlencode($K["Name"]).'">'.lang(125).'</a>';}echo"</table>\n";$tc=$h->result("SELECT @@event_scheduler");if($tc&&$tc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($tc)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.lang(198)."</a>\n";}if($Yg)echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}}}page_footer();