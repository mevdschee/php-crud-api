<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.2.3
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
remove_slashes($If,$Jc=false){if(get_magic_quotes_gpc()){while(list($x,$X)=each($If)){foreach($X
as$Gd=>$W){unset($If[$x][$Gd]);if(is_array($W)){$If[$x][stripslashes($Gd)]=$W;$If[]=&$If[$x][stripslashes($Gd)];}else$If[$x][stripslashes($Gd)]=($Jc?$W:stripslashes($W));}}}}function
bracket_escape($t,$Na=false){static$th=array(':'=>':1',']'=>':2','['=>':3');return
strtr($t,($Na?array_flip($th):$th));}function
charset($h){return(version_compare($h->server_info,"5.5.3")>=0?"utf8mb4":"utf8");}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nbsp($P){return(trim($P)!=""?h($P):"&nbsp;");}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($C,$Y,$db,$Nd="",$Pe="",$ib=""){$J="<input type='checkbox' name='$C' value='".h($Y)."'".($db?" checked":"").($Pe?' onclick="'.h($Pe).'"':'').">";return($Nd!=""||$ib?"<label".($ib?" class='$ib'":"").">$J".h($Nd)."</label>":$J);}function
optionlist($Ve,$tg=null,$Oh=false){$J="";foreach($Ve
as$Gd=>$W){$We=array($Gd=>$W);if(is_array($W)){$J.='<optgroup label="'.h($Gd).'">';$We=$W;}foreach($We
as$x=>$X)$J.='<option'.($Oh||is_string($x)?' value="'.h($x).'"':'').(($Oh||is_string($x)?(string)$x:$X)===$tg?' selected':'').'>'.h($X);if(is_array($W))$J.='</optgroup>';}return$J;}function
html_select($C,$Ve,$Y="",$Oe=true){if($Oe)return"<select name='".h($C)."'".(is_string($Oe)?' onchange="'.h($Oe).'"':"").">".optionlist($Ve,$Y)."</select>";$J="";foreach($Ve
as$x=>$X)$J.="<label><input type='radio' name='".h($C)."' value='".h($x)."'".($x==$Y?" checked":"").">".h($X)."</label>";return$J;}function
select_input($Ja,$Ve,$Y="",$vf=""){return($Ve?"<select$Ja><option value=''>$vf".optionlist($Ve,$Y,true)."</select>":"<input$Ja size='10' value='".h($Y)."' placeholder='$vf'>");}function
confirm(){return" onclick=\"return confirm('".lang(0)."');\"";}function
print_fieldset($jd,$Vd,$Zh=false,$Pe=""){echo"<fieldset><legend><a href='#fieldset-$jd' onclick=\"".h($Pe)."return !toggle('fieldset-$jd');\">$Vd</a></legend><div id='fieldset-$jd'".($Zh?"":" class='hidden'").">\n";}function
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
where_link($s,$e,$Y,$Re="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$Re:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$M=array()){$J="";foreach($f
as$x=>$X){if($M&&!in_array(idf_escape($x),$M))continue;$Ga=convert_field($p[$x]);if($Ga)$J.=", $Ga AS ".idf_escape($x);}return$J;}function
cookie($C,$Y,$Xd=2592000){global$ba;$F=array($C,(preg_match("~\n~",$Y)?"":$Y),($Xd?time()+$Xd:0),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$F[]=true;return
call_user_func_array('setcookie',$F);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$X){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Vh,$N,$V,$m=null){global$Xb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($Xb))."|username|".($m!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Vh!="server"||$N!=""?urlencode($Vh)."=".urlencode($N)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($A,$me=null){if($me!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($A!==null?$A:$_SERVER["REQUEST_URI"]))][]=$me;}if($A!==null){if($A=="")$A=".";header("Location: $A");exit;}}function
query_redirect($H,$A,$me,$Sf=true,$wc=true,$Dc=false,$ih=""){global$h,$n,$b;if($wc){$Hg=microtime(true);$Dc=!$h->query($H);$ih=format_time($Hg);}$Fg="";if($H)$Fg=$b->messageQuery($H,$ih);if($Dc){$n=error().$Fg;return
false;}if($Sf)redirect($A,$me.$Fg);return
true;}function
queries($H){global$h;static$Mf=array();static$Hg;if(!$Hg)$Hg=microtime(true);if($H===null)return
array(implode("\n",$Mf),format_time($Hg));$Mf[]=(preg_match('~;$~',$H)?"DELIMITER ;;\n$H;\nDELIMITER ":$H).";";return$h->query($H);}function
apply_queries($H,$S,$sc='table'){foreach($S
as$Q){if(!queries("$H ".$sc($Q)))return
false;}return
true;}function
queries_redirect($A,$me,$Sf){list($Mf,$ih)=queries(null);return
query_redirect($Mf,$A,$me,$Sf,false,!$Sf,$ih);}function
format_time($Hg){return
lang(1,max(0,microtime(true)-$Hg));}function
remove_from_uri($jf=""){return
substr(preg_replace("~(?<=[?&])($jf".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($E,$Db){return" ".($E==$Db?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($x,$Kb=false){$Hc=$_FILES[$x];if(!$Hc)return
null;foreach($Hc
as$x=>$X)$Hc[$x]=(array)$X;$J='';foreach($Hc["error"]as$x=>$n){if($n)return$n;$C=$Hc["name"][$x];$qh=$Hc["tmp_name"][$x];$wb=file_get_contents($Kb&&preg_match('~\\.gz$~',$C)?"compress.zlib://$qh":$qh);if($Kb){$Hg=substr($wb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Hg,$Yf))$wb=iconv("utf-16","utf-8",$wb);elseif($Hg=="\xEF\xBB\xBF")$wb=substr($wb,3);$J.=$wb."\n\n";}else$J.=$wb;}return$J;}function
upload_error($n){$je=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($je?" ".lang(3,$je):""):lang(4));}function
repeat_pattern($tf,$y){return
str_repeat("$tf{0,65535}",$y/65535)."$tf{0,".($y%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($P,$y=80,$Og=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$y).")($)?)u",$P,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$y).")($)?)",$P,$B);return
h($B[1]).$Og.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($If,$md=array()){while(list($x,$X)=each($If)){if(!in_array($x,$md)){if(is_array($X)){foreach($X
as$Gd=>$W)$If[$x."[$Gd]"]=$W;}else
echo'<input type="hidden" name="'.h($x).'" value="'.h($X).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Ec=false){$J=table_status($Q,$Ec);return($J?$J:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$J=array();foreach($b->foreignKeys($Q)as$q){foreach($q["source"]as$X)$J[$X][]=$q;}return$J;}function
enum_input($U,$Ja,$o,$Y,$mc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$ee);$J=($mc!==null?"<label><input type='$U'$Ja value='$mc'".((is_array($Y)?in_array($mc,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($ee[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$db=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$J.=" <label><input type='$U'$Ja value='".($s+1)."'".($db?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$J;}function
input($o,$Y,$r){global$h,$Bh,$b,$w;$C=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$Ea=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Ea[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Ea);$r="json";}$bg=($w=="mssql"&&$o["auto_increment"]);if($bg&&!$_POST["save"])$r=null;$Uc=(isset($_GET["select"])||$bg?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ja=" name='fields[$C]'";if($o["type"]=="enum")echo
nbsp($Uc[""])."<td>".$b->editInput($_GET["edit"],$o,$Ja,$Y);else{$Kc=0;foreach($Uc
as$x=>$X){if($x===""||!$X)break;$Kc++;}$Oe=($Kc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($o["field"])))."]']; if ($Kc > f.selectedIndex) f.selectedIndex = $Kc;\" onkeyup='keyupChange.call(this);'":"");$Ja.=$Oe;$cd=(in_array($r,$Uc)||isset($Uc[$r]));echo(count($Uc)>1?"<select name='function[$C]' onchange='functionChange(this);'".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).">".optionlist($Uc,$r===null||$cd?$r:"")."</select>":nbsp(reset($Uc))).'<td>';$vd=$b->editInput($_GET["edit"],$o,$Ja,$Y);if($vd!="")echo$vd;elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$ee);foreach($ee[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$db=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$s]' value='".(1<<$s)."'".($db?' checked':'')."$Oe>".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'$Oe>";elseif(($gh=preg_match('~text|lob~',$o["type"]))||preg_match("~\n~",$Y)){if($gh&&$w!="sqlite")$Ja.=" cols='50' rows='12'";else{$L=min(12,substr_count($Y,"\n")+1);$Ja.=" cols='30' rows='$L'".($L==1?" style='height: 1.2em;'":"");}echo"<textarea$Ja>".h($Y).'</textarea>';}elseif($r=="json")echo"<textarea$Ja cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$le=(!preg_match('~int~',$o["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$o["length"],$B)?((preg_match("~binary~",$o["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$o["unsigned"]?1:0)):($Bh[$o["type"]]?$Bh[$o["type"]]+($o["unsigned"]?0:1):0));if($w=='sql'&&$h->server_info>=5.6&&preg_match('~time~',$o["type"]))$le+=7;echo"<input".((!$cd||$r==="")&&preg_match('~(?<!o)int~',$o["type"])?" type='number'":"")." value='".h($Y)."'".($le?" maxlength='$le'":"").(preg_match('~char|binary~',$o["type"])&&$le>20?" size='40'":"")."$Ja>";}}}function
process_input($o){global$b;$t=bracket_escape($o["field"]);$r=$_POST["function"][$t];$Y=$_POST["fields"][$t];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return($o["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Hc=get_file("fields-$t");if(!is_string($Hc))return
false;return
q($Hc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$Wb;$J=array();foreach((array)$_POST["field_keys"]as$x=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$x];$_POST["fields"][$X]=$_POST["field_vals"][$x];}}foreach((array)$_POST["fields"]as$x=>$X){$C=bracket_escape($x,1);$J[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($x==$Wb->primary),);}return$J;}function
search_tables(){global$b,$h;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$Qc=false;foreach(table_status('',true)as$Q=>$R){$C=$b->tableName($R);if(isset($R["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$I=$h->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$I||$I->fetch_row()){if(!$Qc){echo"<ul>\n";$Qc=true;}echo"<li>".($I?"<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>\n":"$C: <span class='error'>".error()."</span>\n");}}}echo($Qc?"</ul>":"<p class='message'>".lang(9))."\n";}function
dump_headers($kd,$ve=false){global$b;$J=$b->dumpHeaders($kd,$ve);$hf=$_POST["output"];if($hf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($kd).".$J".($hf!="file"&&!preg_match('~[^0-9a-z]~',$hf)?".$hf":""));session_write_close();ob_flush();flush();return$J;}function
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
as$Gd=>$W)$J.="<tr>".($X!=array_values($X)?"<th>".h($Gd):"")."<td>".select_value($W,$_,$o,$hh);return"<table cellspacing='0'>$J</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if($Kf=is_url($X))$_=(($Kf=="http"&&$ba)||preg_match('~WebKit~i',$_SERVER["HTTP_USER_AGENT"])?$X:"https://www.adminer.org/redirect/?url=".urlencode($X));}$J=$b->editVal($X,$o);if($J!==null){if($J==="")$J="&nbsp;";elseif(!is_utf8($J))$J="\0";elseif($hh!=""&&is_shortable($o))$J=shorten_utf8($J,max(0,+$hh));else$J=h($J);}return$b->selectVal($J,$_,$o,$X);}function
is_mail($jc){$Ha='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Vb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$tf="$Ha+(\\.$Ha+)*@($Vb?\\.)+$Vb";return
is_string($jc)&&preg_match("(^$tf(,\\s*$tf)*\$)i",$jc);}function
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
get_token(){$Pf=rand(1,1e6);return($Pf^$_SESSION["token"]).":$Pf";}function
verify_token(){list($T,$Pf)=explode(":",$_POST["token"]);return($Pf^$_SESSION["token"])==$T;}function
lzw_decompress($Ra){$Rb=256;$Sa=8;$kb=array();$dg=0;$eg=0;for($s=0;$s<strlen($Ra);$s++){$dg=($dg<<8)+ord($Ra[$s]);$eg+=8;if($eg>=$Sa){$eg-=$Sa;$kb[]=$dg>>$eg;$dg&=(1<<$eg)-1;$Rb++;if($Rb>>$Sa)$Sa++;}}$Qb=range("\0","\xFF");$J="";foreach($kb
as$s=>$jb){$ic=$Qb[$jb];if(!isset($ic))$ic=$di.$di[0];$J.=$ic;if($s)$Qb[]=$di.$ic[0];$di=$ic;}return$J;}function
on_help($pb,$Ag=0){return" onmouseover='helpMouseover(this, event, ".h($pb).", $Ag);' onmouseout='helpMouseout(this, event);'";}function
edit_form($a,$p,$K,$Jh){global$b,$w,$T,$n;$Tg=$b->tableName(table_status1($a,true));page_header(($Jh?lang(10):lang(11)),$n,array("select"=>array($a,$Tg)),$Tg);if($K===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($p
as$C=>$o){echo"<tr><th>".$b->fieldName($o);$Lb=$_GET["set"][bracket_escape($C)];if($Lb===null){$Lb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Lb,$Yf))$Lb=$Yf[1];}$Y=($K!==null?($K[$C]!=""&&$w=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($K[$C])?array_sum($K[$C]):+$K[$C]):$K[$C]):(!$Jh&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Lb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$C]:($Jh&&$o["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]' onkeyup='keyupChange.call(this);' onchange='fieldChange(this);' value=''>"."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($Jh?lang(15)."' onclick='return !ajaxForm(this.form, \"".lang(16).'...", this)':lang(17))."' title='Ctrl+Shift+Enter'>\n";}echo($Jh?"<input type='submit' name='delete' value='".lang(18)."'".confirm().">\n":($_POST||!$p?"":"<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$T,'">
</form>
';}global$b,$h,$Xb,$fc,$pc,$n,$Uc,$Zc,$ba,$ud,$w,$ca,$Pd,$Ne,$uf,$Lg,$dd,$T,$vh,$Bh,$Ih,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$ba=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);session_cache_limiter("");if(!defined("SID")){session_name("adminer_sid");$F=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$F[]=true;call_user_func_array('session_set_cookie_params',$F);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Jc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);$Pd=array('en'=>'English','ar'=>'Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©','bg'=>'Ð‘ÑŠÐ»Ð³Ð°Ñ€ÑÐºÐ¸','bn'=>'à¦¬à¦¾à¦‚à¦²à¦¾','ca'=>'CatalÃ ','cs'=>'ÄŒeÅ¡tina','da'=>'Dansk','de'=>'Deutsch','el'=>'Î•Î»Î»Î·Î½Î¹ÎºÎ¬','es'=>'EspaÃ±ol','et'=>'Eesti','fa'=>'ÙØ§Ø±Ø³ÛŒ','fr'=>'FranÃ§ais','gl'=>'Galego','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'æ—¥æœ¬èªž','ko'=>'í•œêµ­ì–´','lt'=>'LietuviÅ³','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'PortuguÃªs','pt-br'=>'PortuguÃªs (Brazil)','ro'=>'Limba RomÃ¢nÄƒ','ru'=>'Ð ÑƒÑÑÐºÐ¸Ð¹ ÑÐ·Ñ‹Ðº','sk'=>'SlovenÄina','sl'=>'Slovenski','sr'=>'Ð¡Ñ€Ð¿ÑÐºÐ¸','ta'=>'à®¤â€Œà®®à®¿à®´à¯','th'=>'à¸ à¸²à¸©à¸²à¹„à¸—à¸¢','tr'=>'TÃ¼rkÃ§e','uk'=>'Ð£ÐºÑ€Ð°Ñ—Ð½ÑÑŒÐºÐ°','vi'=>'Tiáº¿ng Viá»‡t','zh'=>'ç®€ä½“ä¸­æ–‡','zh-tw'=>'ç¹é«”ä¸­æ–‡',);function
get_lang(){global$ca;return$ca;}function
lang($t,$Ee=null){if(is_string($t)){$xf=array_search($t,get_translations("en"));if($xf!==false)$t=$xf;}global$ca,$vh;$uh=($vh[$t]?$vh[$t]:$t);if(is_array($uh)){$xf=($Ee==1?0:($ca=='cs'||$ca=='sk'?($Ee&&$Ee<5?1:2):($ca=='fr'?(!$Ee?0:1):($ca=='pl'?($Ee%10>1&&$Ee%10<5&&$Ee/10%10!=1?1:2):($ca=='sl'?($Ee%100==1?0:($Ee%100==2?1:($Ee%100==3||$Ee%100==4?2:3))):($ca=='lt'?($Ee%10==1&&$Ee%100!=11?0:($Ee%10>1&&$Ee/10%10!=1?1:2)):($ca=='ru'||$ca=='sr'||$ca=='uk'?($Ee%10==1&&$Ee%100!=11?0:($Ee%10>1&&$Ee%10<5&&$Ee/10%10!=1?1:2)):1)))))));$uh=$uh[$xf];}$Ea=func_get_args();array_shift($Ea);$Pc=str_replace("%d","%s",$uh);if($Pc!=$uh)$Ea[0]=format_number($Ee);return
vsprintf($Pc,$Ea);}function
switch_lang(){global$ca,$Pd;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$Pd,$ca,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ca="en";if(isset($Pd[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ca=$_COOKIE["adminer_lang"];}elseif(isset($Pd[$_SESSION["lang"]]))$ca=$_SESSION["lang"];else{$ua=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$ee,PREG_SET_ORDER);foreach($ee
as$B)$ua[$B[1]]=(isset($B[3])?$B[3]:1);arsort($ua);foreach($ua
as$x=>$Lf){if(isset($Pd[$x])){$ca=$x;break;}$x=preg_replace('~-.*~','',$x);if(!isset($ua[$x])&&isset($Pd[$x])){$ca=$x;break;}}}$vh=&$_SESSION["translations"];if($_SESSION["translations_version"]!=39597072){$vh=array();$_SESSION["translations_version"]=39597072;}function
get_translations($Od){switch($Od){case"en":$g="A9D“yÔ@s:ÀGà¡(¸ffƒ‚Š¦ã	ˆÙ:ÄS°Þa2\"1¦..L'ƒI´êm‘#Çs,†KƒšOP#IÌ@%9¥i4Èo2ÏÆó €Ë,9%ÀPÀb2£a¸àr\n2›NCÈ(Þr4™Í1C`(:Ebç9AÈi:‰&ã™”åy·ˆFó½ÐY‚ˆ\r´\n– 8ZÔS=\$Aœ†¤`Ñ=ËÜŒ²‚ž0Ê\nÒãdFé	ŒÞn:ZÎ°)­ãQŒµ™öú£°Ak¾ßÄê}äˆe‹çADÍéœêaÊÄ¯ ¢„\\Ã}ö5ð#|@èhÚ3·ÃN¾}@¡ÑiÕ¦«ÁËžN›t¼Å~9‚ˆ™ÈöBØ­8¦:-pÎüˆKXÂ9,¢pÊ:ë8Öã(ß\0À‹(˜ž½­@ò¨¬-BüÆŽN’üŠ@.£®9Â#Èý3ˆ«®Ó‰ƒzÔ7:‹ðÚÞŒ­€@Fñ.1©¬ÚâÔ\r\"²\"Óˆ#c:9˜Ê;RŒ¦Ð¢Í<;·ìèÚ†\$#òÎ!,Ë3¾‚›2È€PŒ:Ò#Ê¾K#8Î€ŒìäïAcÐ7£Èîð -BÎ¼ŒŠHÇ®ð3––¶Â£‹Ç£;¿,ÎÍ|ä:¦Râp9ŒmëP(‰\\6Çmd²:³ØÆ€À-‚ÌùÇ›M,ÊKðA#FNœµ_TvhøƒÐKÃ.#gfXÖx É2 ’±Q`PŠ<í’2ÙvŠ.X“¦)Ù¶:û!¯2”JÄ Ð[¸3ÃbÖÑ¹q²\n¼Šƒz5V(Úù&Ñã˜æ3TülàŒ¼‘O«[~7'éÚÙ3¡p€àt.„xN†È†%‚º-‹MA67V\nJP½ŽÃ\rôˆb˜¤#2ãx×…ÁÜß;èÌ³¦jÖ”F£=þƒá\nNN64š´îõŽJ2b(íÈìe8Æœ7%	TA*\\Z©úî¿¢‡‰Ð€ŒÁèD4ƒ à9‡Ax^;ðrA™¯ÁrÎ3…ñïñG£œî„MäÊŽ›Ð¾‹7£XD[{j:xÂ'éô1\$¿ù‡0²ÔxØk8V¶„„—*!î§\"’èÈ”0./#?­î @î²ï©ÜÑi¨@(	ƒÖñòO0@(JD€¤YÊLÑfãvsÕZüzØçL2T–%É†h6¾ò§™&~’Jä‰òž£É©5h§U±“Äê²ŽÁè/D@‚bîHJYM/­ Ï“âM›½Æ˜Èâ£IcŒƒ¾hi•%ß—¦Â˜TWèÅ¢…\"j“LñFF/-*µg^i(\n¨×’Sœ“ñ¯Wíy8J¢ª7¦dEC;FUõ2F‚£Ö?Æýn\"ðI áDn%9pÊZXÃCCà(×(’ŽxNT(@‚(\n €\"P˜dÈ\rá°—±„PiÂ‚(a_Hð’4S*l'–4î~N8f*€¦¾sg\"•cëK!’RRÍQ•æ¨£‡tq\rƒl°4ìá’BºQ™(?kE“ãjº=Wæ\rÜÀ\$…aœÄ:keœDÁ0š×\rì™¡ÀXi4Gå™Àê~b\${!¸:—š`Ã¨g\rMê½wŠýOOHëÎÙó\r ÙIPaE†Èï%ç¨'Fž‚&k3Ò!5?S0½>izHV*Î%X4¥z—dTŒ\r¨à½¨Ðð}=5…=6Pä£èC—Aêñ)Ê²m£€ ŽR\\´O°ä~`ñÿ§¦U…dqòú\rÈL'«\0à¬#hrGeä)/õö~B)6¬…”gNÉ~[ÁÈÁÒ Añef ¼&CaI!0ffÄé`cf¤„'„¶\"Ìk™\"_6\0šíZOZp¯`‚¾×úäa	ða°tEá–â4ªÕkýh6&½1ÚÝZ+Å'³¯J¾±æch(ëþ´V.Ò­ëVrÛ)µÌü”BpG\"ª/¶Ä\nÜû4½¢ZºxE4œH‚¸eW_x„~B’t‹‹†ðàòØÁ~¬©!%ðØÁnÑg?!!rÊÎ²%.Ñü¤ÄbŽ»¾³)Fœ™œoy‹'Ó%ŒÄ}ÓC¿WÊeügl¨T4WÂýß60&aóÁ8/ßÂb”æv\nK¸3B:¿†p\\–S+ìýYE)«:ƒ(¨¿—†¶™±a±6'›âè•%§Œ[T®“ÌcM‡p¹~¾øðIƒçHdkÛ\"èï‚’Ý\$Í<ÃX\$\nàé—u°”ÂF+«*_,@d}•ÊYsah~3[ZyVe3¬1ef¥`›	v·l½•°†X™Ë±jæ\\­™ðA¤Î¹û6«Öæ²/mUVïBB7ðMluoLH3XG†tQ±yY³G- Æt•‘²z¨ÆðÏC+Ó™^fÙPN5=:Õ:7 è}^@iÌrÖš=ÒåjÏús‘Æe9ÊlÇ‡\$(MFY›i/Þ×Ë]&»Ël8ë#l‰¾o	:½%±ÝéOC…Xj‚Ë‚©‘M\\Ô0Å d¡+6\$›ôu0j¼Ý¬­JúÓ<êÚ7¿5ÞÎ}*ïÅ½V¶Nw¾˜FgU—×­7þ‡âÈûUëË+JJw«Ë’°^E9KúÞUÜYH(F…Û3cD¤Æ°¦tf«à¹g›Õm7Ä›6†™ÜãŸàÙ•Ç‰G a‰×™SE|dfÜ7Q9Å¥'E:Ž:¡0j<2\$þnƒÈKÚ2ÖËÁ8¥•MÝ›_ñÞÖ{f]èÝ7ô\r»#Ye÷¼änå9Þ“<'’LîAØûÕ`ñR¡«îuÚa_J›û¡`Ÿ%á3GvKh´ÔOF<”—%¦Ÿ—“ßãº¬çžŸÉúž33½g˜Ô ëž_Ñ\r8G‰\nÚf„iÙP›š¬5’b/¥þ[jÆ[ed‹§³8•¹‹’â[B_Æú—ç×j;\nÌKÁaÇÓ#+iM,J\r€®ÆöÙ#”Äa†òî˜)x=\$ãjß&.`¨ÀZ€5Å\"âP°”ÕbZwM®-B¾ÈÀ¨ÊÔ‚&Ác0]é i%D4àšþÀÒÿ¾ Îd?#jôÃ±éº©k6—/î`¨N'Ïæ%	\":**%ú\$s&4ÍœE‘b \"JJ>.p\$ L,I„êó0ŽùŒ~ÂÉr1¬&K¯Ç	LþºÊ;\n°ù¬,ð0¹\n&c¬@\n-Â\$\$¬®„ÜP)æÜïª¡ Š@ÌHÊ@@	‰6PjJ)ðï% ‹â4êª®‚TJiÄ_Bv\$.K	À¯B^I<cbvK\"Ø1&cÀýî¾m¦¼§Ž¬?‰fþ‡–ÚmœË‘B‘@à¼îªbýðÎáª<ícfÜ©ÈY®º\\à‚)¢Ô«C.ôjÜ ZGbLÖˆ&*P!„\r®ÈŠÀ";break;case"ar":$g="ÙC¶P‚Â²†l*„\r”,&\nÙA¶í„ø(J.™„0Se\\¶\r…ŒbÙ@¶0´,\nQ,l)ÅÀ¦Âµ°¬†Aòéj_1CÐM…«e€¢S™\ng@ŸOgë¨ô’XÙDMë)˜°0Œ†cA¨Øn8Çe*y#au4¡ ´Ir*;rSÁUµdJ	}‰ÎÑ*zªU@¦ŠX;ai1l(nóÕòýÃ[Óy™dÞu'c(€ÜoF“±¤Øe3™Nb¦ êp2NšS¡ Ó³:LZúz¶PØ\\bæ¼uÄ.•[¶Q`u	!Š)èÍ&ã<Òq)æÖ ˜ÈF>Ø¡Ps7Xì5g5¸K®K¦Â¦àØ÷á—0Ê‡Æ¢¶§\nS ü›r\$ ¯jÄ(î¢v†°Ì¶!Jbž¸¡‰q««0\n¸ŽÊÚV¨?\$W¡‰¡FÃÂE{ü‡-‰:>W9ÏJ|Á¨eRhY¨+dxB&…[Í*¯³lƒêŽ (B&÷¾ÆÉè4S!ÄÀËdPB¾ñä=ÈtO¢	ãë?‰:²X£ªØ¢eJ	\$£éÚ\n&Œ3Þœ:îšã•ÊÃ‡OìK¦‰Ð¬ÈJÓX›´m\$*³Ó!Rt­.Ã\$äªTIn¬Q@ ‰\r([O±eK°4€•1¥ª¬›ºÈ’,2Nê?N-2÷<¤‘|P¬®5jp–£åÊiR&ÅZÔ=\$R®ˆÏUm)aÉì†lOd½e6!¬^R×£ÎÃ¨Ø66Ž^ŒcÝ0¤êr)Š\"eZYWËò—NRª<µ!Åjhã<léWÊL„é5º“Â=¡8“¬Mˆl[Ü¬[ó2)†G’¿™Yn…­qf1AãTÔøê1…3pSwå¹wWHumSØ¦ÃÉ#¼ëûGN8´;SÍ¿`MYuZ›h‘pä:\r€S<Ð#“J7ŒÃ0ØíŒ¬+ð­U¤\r7&àP¨7µmô<„¨Ü9Ž£ÆÙc5ä\rƒxÎíŽach9oÎ0»a\"×ƒk¶:·a@æ©é:Y¦)È\"¨¤ª#¨V…Ù\0ñhËkÞ¸Òñö†Æ3\\ÛŒE{zŒÂ§4FÙmÉ\"ù;±«êÙÖdÈBöC¡5‚ƒ(b®Cfª\\A ‘\\è½mt‰AÑ•’f&Œ#›v95?Hæ;ã•x2€Ó±hx0´;ÌAhÐ80tÁxw@¸0†G,ƒ(rÏÄ3‚ðÊ °x7mì4†ø0—¨r6!Ò\0ó†¾ƒX\"Á\$6‡^`¸t€¼0ƒâ–lá½\rêðÚ‚ìÍ(i†¦·h ƒ¡O?døë½ÆJOÚ¨1©i½\"äìÈJ?ˆDÈ\n÷LUI*C¥mr3’‹TÙ©\rÁ×3ö`ÈkPtåZ1¢²J{5jj]ò¨è¾ê\"¶PdØT“6ÁŒ3Ê+l…F/Ž¡(e£Ÿ#–”Ôs­Œi¨2O¼7&a\$“> iW†ž!‡8/\rñ³lAÄ:›(†ƒo\r € ÀæÐû\rìÂÊãi,_i±Ä6%¨gpôB€O\naP…‘4¥€&2i)¦5H^ÒœL(„›,·]3c„i!ç>n«ÕÂ±©Jg^8Ãv`µ+;h5Ú\0ì§_!¹¼ÂàßAüA¤3‚\0\0f5Æ”Ö¿ÀŒ…	\rÊð4Â×ãâ—2îW#IiÇB…TV½Ò´BÒFPjƒ‘ñP‚xNT(@‚-8§A\"„À‹PÁPgì–Çz’˜ÐÂ-Ñ€ÿtD‹×3LŸ+}€ ˆC0a^Q;Ù-X‘uJG([RÔ)š\$.ÕZp²|\\žñ.()2	,ŠÑà1H”ø1TæÓÔ¼zc’69º™Pd#ÀLdØXúú²e‰S-M RXK®Å3ÒyR«Ù°óÅ¨±¹Ô¬Húui©z³…Úd=‹uMÔZbl é‘.!½'b˜ÔöVar¼c® »E¨ØOê2SòcOÏ\rAúñ\">'7a†«•¥géªÝWY\0 ¦CÐeA]1|‚˜e5áŒÝ†FH‰Aí³Ì‘—ÛÅocË“ÌSª²õÞÕiSZ\rQ‘#ÕÕL«Ó&Â¶›	46Š†‚(,yS¨uÙ[IÝo*ä¤Ì“Z\\N)ƒ:‹…Ž!%9‰ësÆ‘tš4IP’‘9M¼È\nÄ^QHùô¸%É¸,6¦‹Ñ[X2HþNƒøÍÚ;(=Ã&tÀ@ Œ¬QÏu¬ƒ›Yú_ÉÊ\0^Ý.=ì‘8;s*ˆIIï×4«BðCVmfRAAØšêp“.RÉ—–‡X1Y	¶»ª­`ˆø°²YÜ”\\÷š\$KA-^)‚ò‰¨.9Ùƒç=Ÿ5k:	\$ês!‚‹Þ®Ó (&QÚC.C¹xÒ“ìG°ÉS!CSªÆ“U\$Ë ê].˜Œ¾TÝÇC73j¥ôØ`éµ|%:~¨¡¤T¡’šÓ¹žß” Ö\nØ«Ìw4Qœ¡p@†ˆ(.öæ´:PÅº­F%TW`#ÞÃ°»mC\n‰Y—»'€ÜŽV¤“Mð—ÆPOÚéâ—e6€+¿uBÇŠÙB~ ÕŒ™ãœZî—.Ra9^Y·\nÁ¥óRŠ/VxH›*«<ùÆÅ…´¶d‹JJbyc9ªZfÅQäôÃ‡ã °~’bT’è\nK‡>'Â“V1ü’¾”G„»ãÖ/ƒ©VH)E÷‹®<Mº­\rˆc6nÅÙ'¢ìI\n^c	ù‘ôíJ™•£.V•\nq^e¿»Í¬fñMñSôÇÈ†ñ6i©w×šÒOš´O#ÎÚnº‚ì¯ÂL»Ç2~g†}g+òø—–²Ûš-ìêÖã•»h¹àYIÔÉ¦\$C8­¥ô6tœæ#EêM7a)jd8ø·èèZ^Ô|²®ìGéë‘õÓÇ­µ\r'ét7—÷ñ‡ØEX?½aÔP 1¨—ÑP÷v›TFækSŽeÐDG*¯ìÿ°1/öÚlÀOlÄ?ŽÒŒ-0¥Ê˜ý¢\\Ä+,þ+Hò„(uÅ(/¨¢wOêIÒ¹‚÷0Â<\nRüÌ\\.oÒO^çG\\?-ðÄLHQJØÇ& ©ˆÈ&/dûN..ETR¯žL¯ªãÚÏÄôÐ‘Ð’)ïø0†ÁŽºú.ÊAVû.¿%Æ²æ/\\ü‰@ð¾å‰É>ËPÎ\"kÎ]…H\"mêhÊ¬zÞM%fbU#Ð‚‚hçž÷Xîå.øc®Ð´ó+lÐÀüo‚“Ñø†ÕnZBmÝï¶v\"úh%Q	«ØÑpÒõåÙoxªÎÌä0zHÏOC¨Gî¨Ñp—\rQ^zmÝïhRña\rÑcä\n0›q/.!\0.Ío^CC10¯Ñš%QFßÑ¢YÑŒõ%.Çd½0Pq´CíYQ²[á_q\\ÉoƒåÈCpc§W\r®ääÔDÍ­¶Ë‹<Kñ•QêLÑî[Ï*¥É‚¥-&°AdÃç	RñJèƒ\"NžÌïN1‹ž­Íð/'(Ë†@¬âÝg\\Yj¯R2Å\"i!î\$c…lßCþÑGt)/œ¾`è@Øiˆ\r Æ\r`@ƒÊ\nÊ¬ãxn¨v\r Ìo„&`Œ¢h|§Ô\0Äˆ*\n ¨ÀZ\0@‚àÇ(£¸â¯|“d¼Ô‚é¥Ü#¥~0âFÑ<[„bæ…Ž1@›(²%%üa%8öpp@eú'±2~\0Dåˆ@=P€ó' ²¡MŽ¶>¢ž(¢RŒ «bÚ>À˜ éR;y2È|~#J7#‚DÒ/¯[\rŠT°ªà\r’:‰´0Nm\n¤B®³UÎTÎÃ¸’Ü(g±6+Øå@¨^Ãd4#F4²¢˜@Þ\0è×Ëâ0c6Jý„xÂ²Á…¡ÌÍ6óXçdÔç¢ &Žàö©˜\\¦vBŸ;ç]è´?è°¯2s#,€}Ö\r*Ì¾\0ÊW€¬\r Êà\nÀÂ`ê Újî©¦®­D€8âl]Gb:Mni¦HYÊèxƒ'É*ò&0ñŽþß‚N¯t'A2>à †lCt4¦í>së9r?Sù¢ñ2bÒZe¬Ý¢?Œ¤EÀ	\0t	 š@¦\n`";break;case"bg":$g="ÐP´\r›EÑ@4°!Awh Z(&‚Ô~\n‹†faÌÐNÅ`Ñ‚þDˆ…4ÐÕü\"Ð]4\r;Ae2”­a°µ€¢„œ.aÂèúrpº’@×“ˆ|.W.X4òå«FPµ”Ìâ“Ø\$ªhRàsÉÜÊ}@¨Ð—pÙÐ”æB¢4”sE²Î¢7fŠ&EŠ, Ói•X\nFC1 Ôl7còØMEo)_G×ÒèÎ_<‡GÓ­}†Íœ,kë†ŠqPX”}F³+9¤¬7i†£Zè´šiíQ¡³_a·–—ZŠË*¨n^¹ÉÕS¦Ü9¾ÿ£YŸVÚ¨~³]ÐX\\Ró‰6±õÔ}±jâ}	¬lê4v±ø=ˆHî·ƒâ’ÀDê²¹%’>L*H›8ß@¤ª¤——P|.Õ3dŠ¯m XúÂé3’‡²ð!rÔ'HS†˜¹1k6A>éÂ¦”6Ëÿ5	êÜ¸®kJ¾®&êªj½\"Kºüª°Ùß.-Òä:Dfã5Mb(¬<¨ùOÈhù(™G°Zi2=é^ËÁ¨¬ÄÂ9-bk¨®1l™#äšÀä©j©Î4ˆúùÉ-jAA1c‰A/ˆK»ÃÆ>•BOÃÇKm\r%2!1<ðh1²Ìã§\\èhF‰\n¯äœO°“K8ý&ä¦,´(à,ªãô”Ôå\r*Á©úÊÖÉtøá¬Ö®¡ïÍ“N·m-š²G´»ËC\r¼Y-Šú±>ÅÄ02!­RÒ‰!-ÑKÝjÝl¯W0½i7.Lþ%åÅE0ŠDž“)ËÝÌhTjH¬VªË¶‰4ªF\0Ù¸((@6®žÂ5[’Z4‹êT¶/Í¿|KÀMêÄW&¦è*O·ŠjTŸ-ë½»Ñm°ñ<ÏB˜¢&!±ƒˆ”¿Hù í¢“äÈŠNLÂ}'È­\\Î¨Þø¬M^Õ-ðëAu¦¯–eGfÝP½}±Tù¥©´ÚÛ[N‰Uw§OØX/_ëµîqU,}¼¸œá·Lµ#½¸ºnì4¥ÄÈB&ÂÙ\\­Ë`ûì/ÀlYóO kO:?¶ºÈmSPè	½[²¶Áô PØ:MÊ_\$Eˆk6 !òz¸Â\nž<ãìêÅëhêÍ3´Ï%iÊGœ¤ÊªQ÷Û+jêÔlŽZDjóæñErÚX£çŽ]ÈjÅ êØ\\ÒN7—fþr½è/>œõ‰Iö|J`†6â÷•cá9/Œ »Ô~ßKÌ±w¾ñzHÚ¡Ì,òªFO‘Á?YFø¾´’ê#‰ .!ªÜ’³W¤ù )2æQ½§ã¢OØ¹»Iè„G•|jÑ7ÏÁÖÈp\rCÑ/Dês0\\H\nL@Pô­–ÄHTÔÉ1x í÷\"EßTX;èÌÌ'âžž	„'Ž4“5¨ðcF;îˆ¬AÂ^lÉä*„€äC0=A :@àÁÐ/áÞFàÂhi\rÁ”9àÞƒ8/¡ºM€é&Ã˜i\ròp\0èdÀe’/† ØCpk@øh<U.UOÂ,€¼0ƒçØâì6cï…Ô¸â|#Õì-6ìÆ9TšfÛ¬y^l|ã¹f\0ÕË[æ)3ì°Í)ª;®©Q—£nTåÉW+'0áœôjeŠ²RÌqŠ’Ò‘‘xvFÍ) ÙÛ½\n (Nô#gœS\0 ·’ó˜rÛNdª\rGR™àçJêY,¨¤BÎIŒup¸”cöRZ[6?Ë¦‹š4¸œj-†”XÖN§†CJ2'‹æ\r¬Ñ\"Dù‘ûN7¯E^0c¿¦S{ g”ðª(uŽã::JX[‚\0ƒ\$\$””˜î!Gz¶L¼ß0i¡T5Ê‚Š{®S6Àó\nt]yïæ‘£¸TšŠ‰Ï¦Àì8VìÛÜ|Eµ,ˆ5‚ÁO¡±m˜5Âê¬Ó!~=‘¼£j”ùÉNö&rVÔ'6IªZ;ïBÇ–@ÑšD8HE¬šjª‚¥€§è†¿Â^å»2°9¸9ü£ÊqnE‚ÆšŠBGÚQ³G)µ\\¶x\r[uv7C%*KÚë“;ë5¥ó“×”µ4ÎŠ¶©ÅaOÔjŸJO h'¥<Þ‹ŸÐ´þºÕ„ÔFB`¦RöA9Ô»<@¢i´#¤zB}}kªòAe	KÉ¼uÀ°ç U0’±f†d¥DB ðÊdUwe5Qb£cÂ£u\nŽºšò>¨UÕ¢E¸¶Bªìò–V*®ðbëÄeÐáqX®À,ZHSi\\È–w#/æ,¡\ràºgMJéºÙÚ“5f'7Ú4 \nn-ÑÅË3“ü¥þT+VÐS¦ç“øfRü²›,AÄMºåbŽ©‘wšq¾geoÕzGð\$Ô¹lO²’¢ÐO3­½Ïª)÷Š™Ïu¥Ä’Ûq{ˆIž#v¸•\nbƒÀ^ÜAÏˆ†\\ÏA,êj]*ŸÑ%~ïéf˜ÊŠNXZ«9fß(L5Î?‰)Ž!‘ )¬>ºn…g¸³ÝpmI+Š\\Ö„Ìô¸u©½ à®¹\$JE[åöÔ³kvÔgL°8wØ9sC§Ë¿U:¡É#!9tÞgØ¦›ìüoÎ9]ÝµFåSý°JhIÕâP®`;Ü&vBl¯'ÚÁçF§åv®ƒŒÓP2dâì®X4KŽYDo·Ñ\n¡7\níà~|‡‰èË'Qù;\0fÙhXr¾<¥’¢E}%s—–=EÄì9Ê¥W¢r¸”W…¼èœæ—Æœg#ä½H–õNSxïª4‡¡õÎQœµ_S+ý}Ý‘ñ7mÔÆàèžÄÜæt™ðªØ-åM]NîMZìIÜìµwN\\jk&Zˆz¼»~£Wù.¸Ì³—B× qÿjç}[Áùe|ôñß†‚ÎÖ¦ÕÂ¢p5°ÓTEGébu!E„|RÂ3µwŠéþ¬úc\nj6KÁ.qg®(ÁfdÏqÆ‚y‹’ÅYo<y4XP¸üªüÃiª€ÉKÄuõt¦j™ŒñãwºnØ1éÇG-ªËÍþ×ÐÍ[ÓrOÙ¬ÛCùßÄ«åL²ê©¤aðýï²‰Çxàe~×ðBúÜHÿ\$ð)*Œv¿ôR„š¹çòkëþTJ:ô&*6%t×èx'%zÝF°ç[Ž8¬†ø‰.ø¿cjCNž×Œ†l‡¬pÿËÇ\0|½h&YÍ}\rdD¼,€Pš®¨Nëâ\0R»F*ÆùÌh]0þcžpŒz=,^TNo\nïžÿ­¤î°°Ã½ÅAOø†ä’sâqJÍ\reu&à€°Þ¦HFù‡ñ\rG<oâpï,U˜uøÕ.I·LD+\$zŠ^Þ÷/B£‘p·±©/þíÔïÈÒ3Í\rq>ômhŸðþÿÍðš¥Ž&N|ãgÖ;îŠ+ŽjnfT1RBop³eœº^dbç¨)ŽƒGîb©K„8ÍÔâ±¬uð»å-1oE§ðç‘°¸ŠÒÚ±·k}<m	\rjÆH®Øj&žäÌÊÂ<',œ#|³®ÊR„hÁã@bBlŒ¦DiÀRéÆ˜Îà+Š²ÄYË»	+Ê†dQä¶eF)Gº7†³ŠE.’ÂQ´v/ÚÒ¹\"JüØ­”mGbÛœÁ‡!íjv)lÕ¬ÉP³~ëîÓ&†M&Ñ¨¯ÍC¨¬å¡&±þQ/Q2ûåÿ	!D/'‹ØsÍüfOù²‚Ç¯uÆ*ª~1Í'üñQ%+è	*Æ£(ïû).	’º¸k¢×†îß²Ò_à’ŸòÀž¤È&¬Nda C¦#raczÉÄ¦ÂøbH‚N\$;e ž,I.Q†ßQË&êÝoê=Â3qé‘Çoå,‘¿MìÊ£e3áÐã)QÓ\0002ä×e®4á_M€?¥52ç6¬s5Mó²›6ö„Dž_e÷R½)Ì9%•2ó„~ÝÂê+mêÜ¦r‚FN:¸3\r\0²~v¸þÉ§1ìÉ*=;ÊÇÒ‘5òßë…Õ3¸íp0BSÙ‹¡'3á%+¤qI>s·=0hs£y8“šÝå;SÐÏÓÔÞ°…4“ôÜoé(D¢£}=´=æ3óh¯ò*t6t†YÆb½†ßbºÛT3?C3”,Î­±B”[¦ç4ç‡FTTÛ(}+Ï6CÍ—7ÑíGmÇ8rõA'GFiq0ñªb²©.æg„°áhy-”m(Æ+Sâ£bÀßÄ¸4”±+,\nËT;<®Kô­LT}-Ð) ¨œÀM?7“ *ÌÂßM@¡<ˆ€7Û\rð>”}¦\$\$Ždì5ÊÊØ¥xàçì/†rýqÖ÷vñ.°ø¤&¤`ÂUg+³PsºoO±²Ç‘sK•T²rû/Ìè„ÐèÒ„ÅÀ†w\0Øbú:bbÂ¥ÀËðg>äþ+j¶°	ÐüÆD€òÔ–cñ ëi\0@\n ¨ÀZLÑHF&år(ŽXèÆD‹pC«tT§ç[òŒüµ#*Æs„¤…¼*¨˜éâ®'d^§iD¦\0m\"=üÙŽhËŠP)c7 ããi7Cþó&¾E(|£¢V¤ö”¨\r,’TqLhE‘%M*tÇ7;,a…\\NÎa£ãdÊFÚ&¾H¤ÎÆr<2h\\ƒë\\0dC:Æ\$mcÕÔp’ †ˆì}gP!gwgÑIŠÕhuù9(hðz¨g´ô2?\0MgvŸV1+qœÕö¯h¶³]g²%¦¨4Ê‘N–™kêÊº®¥*K•FS&æxYÐÅWðmofbÃÜQG½°¾èÈ±o-&ùc?D×ç4v\"ˆE.š•ìnŒ¾Ý†LM¦+1kÎ±\"m³çk¾\$…<JuÞa«çlŽálõ4ž4teñ6v\\!-¬…‹æÏwYÓ@«‡TÏ{D¥Àš¦0IñMïèÄ6”0-FÖo@ÔróDLYÆÉ1…bS!{s\\õÍr¨IAÔ\nÈäÑ9ï\0Ôa%24ÞñHEåð8\0";break;case"bn":$g="àS)\nt]\0_ˆ 	XD)L¨„@Ð4l5€ÁBQpÌÌ 9‚ \n¸ú\0‡€,¡ÈhªSEÀ0èb™a%‡. ÑH¶\0¬‡.bÓÅ2n‡‡DÒe*’D¦M¨ŠÉ,OJÃ°„v§˜©”Ñ…\$:IK“Êg5U4¡Lœ	Nd!u>Ï&¶ËÔöå„Òa\\­@'Jx¬ÉS¤Ñí4ÐP²D§±©êêzê¦.SÉõE<ùOS«éékbÊOÌafêhb\0§Bïðør¦ª)—öªå²QŒÁWð²ëE‹{K§ÔPP~Í9\\§ël*‹_W	ãÞ7ôâÉ¼ê 4NÆQ¸Þ 8'cI°Êg2œÄO9Ôàd0<‡CA§ä:#Üº¸%3–©5Š!n€nJµmk”Åü©,qŸÁî«@á­‹œ(n+LÝ9ˆx£¡ÎkŠIB›Ä4Ã< ŒÀ šâ5mÊnÂ6\0êÀîjÀ€9èzžÐ ª,X‘¶í2À§§Î,(_)ìã7*¬è¶n¢\rÁ%3l¥ÃM”ˆ¨ \r²öã¢m¢ä‡KÑKp€LKÂúÙC	‹€S.ëIL•G3ÔW9ÊS·2bÙ!¯«|–Æð;I7ÅÒäŠë#´Û=ÀÐõMó“TŒRí/Ô\rÒž®­ÓY'ERj!*§¹ôâØƒÅ5eO¯;w4ÓÓ…‚Á°³’ÜWFóò‰,ÏÊ}!ITdÿX/‚Z¶*5¹O5ÚSyB§”+eÉQ„âŸ’ô1QT0¥*«qÈÈuáy)èM{SŒMƒ!°­Êð‹¶”†E©÷‰LPGŽ5ÒEòÂ0DÔÓ{ˆ¼DJQ}áj}X4E•Ûî.:’Ör*½„Ô–<|T–f\\@£c\$ñW“àHKdŽÔã´9s–àjšÙ„^r£‹Î³6NèÒ{n¼ñý`ØÄ€Sk£wE+Úý%æµþ¶V–°¼+¸dÝU”Ö…7µkÁqT	Û‘¡Ñ”¬ ‰DÍäÂˆÑnzÝEn@Œ:ƒcç\0½É\0Æ0Ñˆ¢&³rc|WÖÉzdœ„ÆÁ|UµÜ*ˆ«Øe6Â—ïöT!ÖBšùMt¸·\\÷vã1TìõM®ë]nI‚Sú’k¸3zkåÄŒ1OÃÃ>˜]RØÎ-Ë‡ªÂúûõ’ÔñÉê1+|­¾÷CXÂÃèMJ|ÑÁY_·³Y·7+“'¶âòizŽýñWÈ“Kén¬°ã¬wðÁ‘*ó\rÐ9\0£ºwÃr<¼3`Ø*Pä‡ÁL¤_ÈT\rçœ6¹Àò¨naÔ1†3âÃ3”°7†thÁaóPÜ0†pÂPgà€6£@ê~@s0¨­¼7¸)Á\0C\naH#)fÐkKq)¥™ÿbVÐQËÍ/AŽ¾Å4.†©±£z›Ú“wdj4íª‚Ü[·[f€·:¦TCˆšŒå\\(ÂŒ^âI\0…Ð`›/¨X¼™J1¨§ÐÂÏÐr=œ9‡pÞ™ÐeÀ4Â È\0<'‚`zƒ@tÀ9ƒ ^Ã¼ÉÁ„2EPÜC.•áœ†PÝ5CÁú‡A¤7ÍpDåÃ‘ð’ü/ '8Á>	!´8àÛ5ƒ <á„å;ÏàogGÒ*ÖyHt=BÌðÜ!QƒìD¨¬ð½›K¬:ê*P¦É4É\$Š_6Jé1öQ\nŒƒ)R!ˆ±âN™AÔ\n (*d0½K\"£”„ÛÒ3\0\n)ŽHô®DZ½ãå&/*Ï%LÆÐ*âxOát¨8ºWR‰ ,(‰c–V\n!3LñÅÁrØí9Y@ªiÅ½˜º¿«	D5bºP¶i?%ŒTk >QVöè˜ŒÃ»Mæä¬§uØkØ‘…¬¶QÇbœHøy;À€2–ty¨sšÓìþŸ(DC©ñ A˜9ðÚÍ…¨þM`@â%’>vVUŸT¦Ò‰@d\0^\0 Â˜T!Ï¬ZåÙ9NðŒ>Â[DYmj‘×äÒR‹:ÇaË–…³•Š!‘îÂÀC^úWƒöÎC‰Úæ` —aˆ4†p@Üø Ç´òÉv‚¥-sŒè4ÎÉ_@¨\rò³¶~É#Ç4K³ˆ-Ó¨¬XcA:ÍˆÂãˆºT`Ÿ)õ>Ý¾ò1†°r¿‘L	nšŠÊ¬VîW+khqKpª)î6Šg§0Û)j (\"PÌ\\¥Á„6Y–¬ˆÓzþO\"™Æ;¦ÊXRkM…ì¥J´ßD\$IÅ+¦Z)Ûè¦\"õ¹8evÙ™òJ9Ç\"˜â¤…X³/dÖñ¡ÀãnsÔtMO;´F¨ŸrP \\¤%E‰Øú|’¥»BXgÃps³Ä‚¸ÖN4ËÒ 4£Ãº@¼@òÞC 3ÜHp%é¾¾Þ©n€Ò•ˆ)˜Á5¡¹üS4wÎà(Öœ0LYl˜R¢u:žÑ%;Òº[VÐJo¦Š2›d…*ßŒš_!ÕRž”r6|´RËÏ™’<.wÚ¡+Q·É’Æ}Å„óÚŒ€nãYŠvªÃHz (!Ùàá÷˜S§¸1Ÿ ÈÕ™~„šS\nhºg\"þV}a®èçÜ°DLÝO¿rhŒ\\õP>cÌ;µªñ‚‡˜3öîÐ…ã1Ç@ˆ§ÚïX£¼qÉO&[˜%`´ÝnL9ÌGR¥}q·îžjçï8St;XòzØzN!¹fZ`q]V`“Ë«º/”óÞl®¯å’,|¶ž›ÑOHiE5õîCÇKÈ¦3Ñ¤¢&¾8Ÿ4}½w+\\·©=YÞî—t[UÒ®\\Ã´/jëlšhÓÁx g'W7‹ö|ÐWc=¢ŽºMsßž/1vLÂA}	±<†nqÍkTx,ì°j¶µïš2¸Š@Þü·`g­<9êôGô3Ñêvèµ:é°’Ž“Ö(ãcy/›éh!?h…Þî±h‰bÚ†S¯ƒ ö\n«Ùw”\nYÑ?Àx~v¼n¿íþ'¹/~>÷¹÷C²]ÜçN›³ò5•ø8~J!”þy÷	FæPö®dùfB	‹úÀ+:âBiÆ„PèÞö¬&Niïe0&wæfEtÜ%‚r\n*Ñ(òýI\n@¥Ê0¯Ä[f\0-ÈÐ)ê”€PLÆ°RŒ`-Bå¥dÆX¢ØF\\Uf^ì¯H-Çà!ÐV+ïS¤z)é\"J#&ª\"Ø€ÃTîð€ì‹ÀbBÜb‚ñÎÒ­\r²ì0bPŽôYBjdÏÊóCŒ[ÆÝaLfdÖ7&ÔÓ/œà/ö3Pˆ{/:®ŒUÅƒ\rÆI)E,.6èøÔª,õOÒŽf\"Æj(2þ­jI’î¦aÐE/‹­Ò-ÐØdÍŽñPIiïh©ÒcÐBøiðÏ'ÞîíD_'¿°N%Ì<Åƒ²âîÒüäšëÍXïðU/œËLL×¬êXæ¢§ã­bðÚ\$ô‘‘›ñžÂD\rðì±¸VŠ¸[‘„á¥`ííjU2HÑ\$1VD#³í1xãÍ`ÌÞvƒVwÐÊWà@dïðÆä¾&Ä¢d¯ôÒH'ŒÉÇq1võ®âÎ²~1€V\"ú#ŠXBÑs\"Qé\"’×OÆI‘lörC=\$‹€îR/%a\0”{11%õŒôxM<|ÇµìÀ‚.{1BàM\r’\$þeqmH\$y†]ãuOU)R[mnyGÕïmÒVÛ.£)Š8%.ÄëqÁãxPñ\"i0./!PÂ:ñÿªt÷Æ¶üPØõ1MBšõä1\nÅ‚ùfM&ñç/u-Å-*râ!²\0¦.®´ô²ð¦3*ñ8,å(ç‘q!¤£(ÍÀà‘u\$r°Ük3N¥&qXeq0‘0ÓG3\njÁ’RûÒÕ43]ƒ~ê@TcrSN‹„.âÒð*>-­7&~PÁUÂØ&¯\0’Æ“.³8âÃ3†ÄSsŒPàÌ±×4áLMz!Ó34‹¨í|&L:Ã.ìåRmJ ª°®ËI6ÂGJ!…6\r™6L_:Ó„p|d±š¢eHüÊQû#±(çFÐÊ-xXæ15á\rR¿5³-d³Bç3°êJ²×4Q9C®Q6mG*’÷¯MCÒ£%RÔçÎÒísÔN4?‘G\"2q,OŽ-ÔhÉ›+&Æ·\$Sot|¦®ÛE75”W%Ô’Ù”—BÒ»H…ZÇÝJQ•Eóhç®›	§gü8«Œ­Lô°¤l°Y\0BÙL³¤Vò­l©AätMä)\0Î\nìq¶f‹D3AHÔ6Ptôë.½HRk5t‹GqOPRÌ#¤Ô4aIÒÙ2âØj\n8PÑ5PEKÔÎn‚¢Xç€Xôà[pÏ&‘[JÈP¤pÑ£K”R¼.š¸ÃWSòKTQÇRºé’ÊX*–(†¤xLbÍj ¢HÜ+ôA!ôER­'1®†^Š×I“6²“,5øõœJ5¡X¯ùTÕ5EMZõ„ëu¶nµ\rTõJì(ÉµÊÙUÐ¯S’-9”oRGRÀEUe_9µáZu%Yty@5èÊ‚0HQ!3UÕ:¶'õ#WN‡AŒ‘n·3Ò …sm_n\$n‹¥=õ»51ãC4Ÿ4oåbV=W_Z•/•øô¶;NV?Bò½F.›d¢1bt™<Uä¬AFt”U4°ëšùµGïcY…>-h–cJµÒo6WEŽéhun r€Ô•2¶”øæîòä\nÛÒÿOl¥:ðl€N5vXã<ÂïISÇå.s¶Ö³!\r‚”ftƒdU&°ÏÙnìA\n0Vésnõ´§eV¹`gY,¤**½!¢ÂMa1ŸŽÍ\r·Sˆ§ps†i –ã.ìøõ¦ÚÀ†ƒ€ØkP\r Æ\r`@›«Ô†È£ö†‰ô\r Ì†ê. Œ¾ˆ¨©P\0Ä \0Ü\0ª\n€Œ p	¬wzF¢ësõ÷‡[p¢¿1âYíO7T·q”5k¶ÿ{3*spÓ!|#|V÷|–G‘hd°6Ò†—aCW:5Ö„(Z\0›w·Mˆü¥â€“]’MÆ¤HÆ´Än”quÏ[çpXá2WG`×\$ÃcÔ½c0°ô èY7\$iUX6án@˜½F¸]†¨•ãÈ?\rN¯C\$I8Á¯ƒr8³\0;UÁD˜…t0Ì(“í–ÒXE·`5­e˜—E\08ƒ±~UÃŠÔ	ˆdOpÕëbÕ“i6\n‡0>#À<CÉy+L\rààÞIoŠñjÙÊáô]n­m¸ÀÿgnÆÇbÜÂ‰­Ñ'v<Æ˜ÆÇh\"”ÃY7m[y ySæ\0ÚVŠÙ,¸mÇZIL• ÒÈâ¦t\nÀÒ î@¬ Æ ê\r¬Ö8’ÏÇËsSô0§áqLá`ÎA“Ù|Y)H¦üøâˆÕæ-µÆ`2K&Ù#É‰ÌÎËVèöhy8ž¨OÎË°Æ&¸´ÞˆD?#È†¹I”ØéwW•µ×Xy„A¼jtâ0qÖvµdótÒ¸ôÇ, 	\0@š	 t\n`¦";break;case"ca":$g="E9j˜€æe3NCðP”\\33AD“iÀÞs9šLFÃ(€Âd5MÇC	È@e6Æ“¡àÊr‰†´Òdš`gƒI¶hp—›L§9¡’Q*–K¤Ì5LŒ œÈS,¦W-—ˆ\rÆù<òe4ž&\"ÀPÀb2£a¸àr\n1e€£yÈÒg4›Œ&ÀQ:¸h4ˆ\rC„à ’M†¡’Xa‰› ç+âûÀàÄ\\>RñÊLK&ó®ÂvŽÖÄ±ØÓ3ÐñÃ©ÂptŽ0Y\$lË1\"Pò ƒ„ådøé\$ŒSÓÞLà®\$ÓyÉò¨ü†ðËÎ)ínÔ+OoŸŠ§M|°õ)àN°S†,ê,}†ÏtÒD¢£¨â\n2\rÃ\$4ì’ 9ªŠ²’¬I¤4«ë\nb*\r#ƒæ)ã`NùŽ©(ÒË£(9ºƒ\nHã0K« !£îú†KÌD	(ðÈã+Ð2Ž‹³ &?ŠüPø«ïH¦—µÃ\"ëCøç®ÀP‡È#\n7,€…-#ªzp£EHÜ4ŒcJhÅ Ê2a–n|Ü4Î\rZ‚0Îøé9#ƒÓ¨±ŒP&¢òÈA(rê1ŽˆS!B1É[C¦rGôŒÑ5¦ŒKË´©@Ê¡9Á(ÈCËpÔÕEUÉsìþ½B2EYÅÎÏ3Lá+%ì(š1ØƒŽÃzR6\rƒxÆ	ã’ZLƒ¿iÏba†V¦ÖÌ¼Qµ:Œ”·( ÏÓ¤ã[YŒ@Âß Ì(ÝhZL @)Š\"c\"1²• è?OBöYã|L2S%1MRs`Å0C“\rRM%5„ê‹QÅì£ü7\$ãž6ô JU„Å‰Š\rk^„Bˆš*º¤€PŠ<\"Ã–j!ãÏÊõw1L†ƒâ0æ'’Ž¸àÏB’f6H SFÒ¤¨èÞ3Ïäòà(c<ÑŒ€¨7«‰ô¹ŸJsôÜ31T8Þ¼2OÄ‚<£Ã8Â¼¸ÙZ›\rÏÐÊaL.7nø@!Šb¼ŽÈø2ÁÆ9gðÜ×\$©:¬ºº\ní®zðÝ<§“®¼92›\nb™Í¨ÅÔÓ+£€Ò9E[’ëÊï3DÔ9³Î|Æb’Óp“Ðæ;®µ<	Ù2œ€@&ƒC(3¡Ð:ƒ€æáxïï…Èþø—…Ë¨Î»ÿD\nï£0H^]Ã“b:z¢ú7<\ra|Š>µôxaÈ,š¤\0Ð¦M™5.ã/ò€›2z&(À”±¶B{IäèTT<†ÊyuÈ%%cWP2oN%øÁ“		Ðé²@¥   \rìå( @\n\nˆ)CˆP‹&s}ÞißM%ì‚——(|%\n`œÍ<e”KÑZ=š“²zÑL)A€3/ÇüHÉ¡Q&!\$ˆ‡“IÕ9[_émS›¤(£ \$¨9€@C#ã\$ÆéÃ5šÑ#±ô&ÅÕ›\$Æl‚€O\naPƒ'@OˆÁ4Wiâ1… ÊIaPò:Âó—òœˆn¤öfNè‰Y	vŠøY ³E×‘ù>¡¼‘åP]×ºù)p9€@‚¤9O\nœž³•ÿ4}\r©´9‚`•±È¹<¢†¼EdZ6–‹@'\0ª A\nr\0ˆB`EiA˜E”Cj´/ÓMqš²J@ÊNHa\r\"„ˆI[±8ZÁ\\@Êƒ	Š_ò¸64”¬ãBU!˜„¢RwñÎPQ£5)É£<§„ÖÓ*SLŽ1ÇwÌ JtµnÊ2\nÐäu2(dÅX†UÒ KDei‘+3Óÿ¥uIL5\nƒ\$TVSÍbÎMÄ\\dD»Ð6Réì+øT‚ÁÔ(•C±—ÖÓ©O†ðä¨ÑwGQ‰\"ÿ›õ¦ºÉé¢×Qyèx­Á^®ªDk	ñL!+‘VüŸ+ÄŸ9çŠ—VÇ)¤P&äÄ+4ÖÅb,\rŸ&@aˆÐÜQƒÂƒS,YM¹¢\n¶í:E,Pâ¶é;2nŽÊ*Ÿ!¨‰*›–íF™\\“ƒ’¹£†Æß2{+HúO¡¹f†)Ó´O	èç³Jl­\\â*AHý”fMA#E‰³ÀÊÇÏÊSFáÔRNÈc¢Jm@È*Ð^j§i†€2ªÌÌ0\"(JæJ‰!\"\\ÏÑžÎ¢¼V´ô~niÄÖÕ±pè€N¿h­Tl\"NÙu•˜X‘áŒgÚq\r¸uM‡HJŒ<ß™dü¬â\\ I&º­¿X4®âbIŠ>+_Øƒ!BJ%°~'6Y'\nä¶m”Y¨L'±b>‡urH	+\$E ¬\"d	Ã&`\rÒÑ¢•r”€í¸ b%âÜwtâÉ“I©<# òLTXI„ÞûpÊ²¾FBH;2®uí/¹ˆ¬<“f2_s2„4Ð­“¢›k‰=õ¹ (\$4Ñ†,’“§”¼\"œÀÂ`9³OtàšS¸!AÊÚÐ(ÅŒWþ¹Œø|çÅC¬d‰}y­ª‰F­Šfµ¶[Ø*vÐTM‡-ÖÓh/k¨ÌŠ™Bžxí¢¦ÍÄ±˜tIõyfÜ›²ÄhâŒaÙ<Vtî¡\"mðJÁ!ª(Ü“ÖoyÇ»ªGØÒ_UþJ-x­¶6¥¡˜@	í…¨¢ö‰Ÿ‚…š—\0u€¥lýke)ë¦-2mØ^åÓW%:wrÒžW#â–×Ûûj 4^qË¶Å¬áÌ£žÔº‡So{¿ª\\ù‰ëÍ£ÊXË\"i\$û s½—Ô˜ç@Æ{g«²h‘wõâü¦Ûh9^Rõ‹£ÆÃ}o¡\"¬AØK±·e”övr¡‹Új'è8{œíQ®!ö¸NÐ½u®¸/Ï‚›~›ó¦=¶®¥ñiáàÌ§=çÉ².¥ÝÃÈ@…i¦d„¬ÏÒ|n%ì §âüù†çÖÛ°G 7›Q„‘bå†Éé’ø”š©9J(L€»8'â®‡h<ùDÛ„aÌ=Ë9Vÿ×\r¯Û0ó(RÄ“ tÿ1l÷Uñÿkðô†>¥l÷& Ýÿ`±›Ó±5çØÆ»/÷þ+ßûC/õ·=·ú]ËÜ¾òÿÊ0ºëˆ]ä^ÂJìÏG2«#Œ€ýO¼ìŽÌñ£4þN†MŽèFÏìñi/\nÿf.eØÍkb°B(ê²ZÃ_ÏÌéPFœoþgÃV°T¥Ãœ „62Ôr‹ÄéÏØe#ºaQ(0ÆMƒpŠ‰oë”°„‰ÂcË[\n0§\n¨—ªŸ	p©	¤Õ~(ïT>p6æCâÈK'ÐÙÆAîïÊx×\0N¹ëŒº)®þ/ý°ô¸âë\r*Û0ù\nï¬ëä×« ¹\nTg´fÏßîý¤@DPží±0¾G>ýN¬ƒñ<\r\"b	´\r\$¼ŽêGOi<Y'\nýDTQÅþU°R)„-h¹ÍÜmŠ¶Æî>¿§•`Þ\$‚ø1zýP-Ç”×H%NïoæU­˜OHJÞ‚\nÌ`†H ØiM	|Ìj(¾Èƒ\nw…š&,ú˜‡:`Ä#¦ð\n ¨ÀZîkÃä€™¦iÎÒÆCO…Æu 4DèÖfg\\^VHjs-Ì´@+Æ%\nß‰>1ãÔ?cúÙk¨1k®øcÍ‘Ï¢L(ô¢b÷mú1e¨\$£(v‚d—‘ö:`™&Ì8^Ãn2\rÔÆÍ@DìÆÎLd\0Ø#dSÎlæ>«¬ï)k)±¦kÇe*cy*®úO×ê|ÛnŽ\nŠÀ6C5P§‡cØ&Ër”÷Cûdfe‚P*fpÏu)‹UrjäXäMÊ”Š™'3\0\\-Êã\$ãB\0x£Y€Ò!MæeåEB^MCù-à@³ ÊêºW êŸ\n-£ú\\âô?€è=ê»2æ/\"íì2\0003¶Ò¡\0‘Ær¦ ÒŠª“i\$R¤JÍO+/Ì7xs0\r345Ó:NP·Df	\\£PdÆeüC…\0O`	\0t	 š@¦\n`";break;case"cs":$g="O8Œ'c!Ô~\n‹†faÌN2œ\ræC2i6á¦Q¸Âh90Ô'Hi¼êb7œ…À¢i„ði6È†æ´A;Í†Y¢„@v2›\r&³yÎHs“JGQª8%9¥e:L¦:e2ËèÇZt¬@\nFC1 Ôl7APèÉ4TÚØªùÍ¾j\nb¯dWeH€èa1M†³Ì¬«šN€¢´eŠ¾Å^/Jà‚-{ÂJâpßlPÌDÜÒle2bçcèu:F¯ø×\rŽÈbÊ»ŒP€Ã77šàLDn¯[?j1F¤U5›/r(ß?y\$ßºâ¡±Š¡»”Í¦Ö´JòMxÃÉŠ‹(¨³So\0ë4šŽ‘Êu¾˜=\n Ü1µc(Ö*\nšª99*Ó^®¹ïÃXýƒ˜Öa¯£ ò8 QˆF&£˜Ø0B#Z:¾­ûˆ0¡Æ)02Ž ô1Œ P„4§£“L\ni©ŠRB8Ê7±€ä4Æ¢˜Ê=#Ãl:)*406Çƒ(ä P‹!	¨ P2ÄC|JÖ°lj(\"ÃHÐé#›z9Æ¢¤®0ºKèá4Íi¾ž.â´69¸è¢þC{ÜòMã¢–5µêX(\rãÐÚÒ\rÍê%5µ}#I´­ëfÁ\rcªÕºˆ“p5Ä(ÈCôÕUe]\rV]Zý.o`á@1b0ê7\rq  ŒãÊ3¹‘¬ýLP@PÖ2@ÉÐÒ;J¨°ÂÔ±s‚¶84dØ&&ˆ‰0mûö<•Èƒ`Ìã’æ1˜AN«óPIâˆ˜›²åmP=Xm‚4\$Àv4Š71c{ö;_¬[7¿…7J7´ÊPNu!IbŠ=á)Ä“ðèœÍ8ðÑG˜ùRñ»“ Å3HBÐÛ±Ø’6¢C“\"Ë‘dˆ»]{¶ V-—ãNTñC´þó\r”SÎ£3Ã0Ì¡\rÃ*V'Œ“ÌÚÈÍÊj¡;á\0Ú7\r÷‹PŽk˜@Nè¾½=´Á`@=mÚüI[þßÖ#lpØ6ÀNÃ±;.Ï´îë¶•û}ù¹M›¢k»o~ôØîû@í¿Á_76/\r~ì‰÷µ\"[fÝ¸O©C>¼ÆòŽs›ï?»ð:3HŒF:&…îö5§\0†)ŠB0\\kƒ+¾ïC2R6°SÑ3ÎïÚÞ»Ùv‰»ä14“Z4;8»)PªsÜ7Éü7wvqí¸ÍQ¿½Næ+O«º6Ê=á¶‚ŒY4Í¨4&Füˆ\n{Do<ò@C0=A :Evx/ðŒ-wF•q)à¼1‡0^VOØn}á¸‚%ìƒ:0ƒA|1\"5€ó7íƒ óöxaÍ™2˜T±€\$Ýá‘‚4”…	;}¡Î¿å8‹ƒfqäÕV1zI	Á:O‚¤•—’÷Oz;èøL»BøC!E5ëqa}ãê\0\"A‘œœgŠ¼\0P	@Gæ+H³á@¼†kcø'|ã8È0ÅÑB<†Ç&‘Äy'Œ—™Âg#I;x§UF‚tM^xZiÏìŽþ}PJšT*¬55BüOá1ë\\ b®D‘t\r-ÜÉ	Èv/è×¹ÂŒÌÖa‘Ôý’·+]I?((\\Ÿ\0žÂ£-/òåƒ§¶ôÅŠ¹(nòìÎÀ‚&Ú\rz~˜4†pêpÄi¦;¥c(Å§æVq˜5ôII9V\r¥ÌÇ£8G‰\"–Á´7Éâl‚¤Œ7äÁŸbHÚƒÑN	]+@0†CÔd:\$ÖU²RjÉèv\$Hí°Í68iM\"M\$4ñÓ‘BŽÂrf}	„:‡…TZKè„\$U¨‚¢D«‘TÂtèVŒËÁHÆEâ[ØR\$	id=ª”EÔ-;Ç€V×tÀ¯É1\$¤¥Q6þÚ\rÜ'Jåè¨sD™ 4GQ£¦bV‰šfU’–)‘9¾Y©…=–:y1v2{hDtÕ’kJÒ-:JI„úËähäyò‹åÁõ©Dƒ•1AÌ\\9NäL‹‘ªFGÉT+»ùONÍø† ÂQ.-Ð	á‰Ï6\ndÍ\rC.áQ¢CPJzG„HâRþbÂ}³•Vñ®Yõ+cÓ’Œ!Í¥†ÌÚIØdWÚVP¦Fj¨e`)‚-\0ð‡XÜ_7¨ã!Ð´jA\r±¨L\$|My9´ä›S±Zq0Gðä9aBqÔUÅ˜¤Ö'ŒD×ùŒŒËlg¯H­Í%5)›ðÌ¯×aÏ„Ê=ë0ÈCÍ©d €û¥³ZPQ¨C\r´ìØ¢þ•±å}X¾¥ Õ©–lO¬<æœÌÕÌç_ïùò	´Ör&VkŠ…»V‰MQÙ«¡nåµ&‚çNØ—ñäÎ–SU«Tf®}³Þ/©J ªêu³IÚ9h©}s¾ŽÍúFÍ‘(¥¡V:e&—8ÚdÌ«q&«þ) vœ€¯­%jÇYh™øôfxÑï­ÂëÅû­4^v\r‘OQg§ÙšuêÿmÚF>wÓ³ ñT‚¤£-õÂI32!ä~pFB‘FTpNÜ„Š¡TýÌ‚ÛsY¡RÄžòV©’VK\nˆªn‹ŒG\0w¤¢¡2²7MpSi7 µ‹-ò–©kÀöÔ•\n¡ØÌ¶·ŠV„¼J1)I°âr\0èdL9Æõ†;54©Íþ~7áÎ¦Ô;ýËØ€¾U”ßÝs_4ƒÒ¤©üÝHs¡Ï	ù¸'œß*c)MýžQVJtËËÓà~€ê¤¯¦®^Ó²”u#Æj©/l\n‡e¼u&µÚÙ‰'õpC@())Èi\n¶„í˜†L—:íX¦/ ‰÷ðØ¨‚DÿaHw•˜§Ÿ¢ŸZ4¶Š°‡\0A…\nÎüÁÃ\0Q’ÅJå\$>©&;2ÒzGR L×›äû`G9”§\rL¡v?Mi½‡P~]‡¥Ùv]f½’öÍÕ1_~ÆpS¿º”z®¨iw³)dì¯¬>|¢Ðw©Sùyù¾i_¡½È:<ÛiRÒ)9M„{Igÿ¼üu^„¶špù~ZÖ\rÿé–ýöùÞÒícštÏÈÈoÎø/Âý`Âý¯ºÕ ÐMX¶\\Ãjp§C¤ÄáÔ¦Þ‹ìR‚V¦îàÄÃ‰O…ð*Ä°/lü÷o°\rÍîÃ\0Þ\rM¶7ÅælpfªŠ¬#‡°hÈ&!Z(ãö\rIfPEHxÄ4ì#ÅV¤Â2¨AzpBócšŒPx&Æ^Œã¸ƒpö¯.\rÌŒp<‰²„É\nˆÈ+.L¥ÐM0R¬7ÍÚìÎœÃÆ:º*óSE™Þ¿ð÷oœf°üÀ04ìZ%oˆÊe.À,”Éˆö1ëq‹(ôýÞæàªÉq)ïuËT÷¥4Ðz±4#-»+W‘1`´+Ú3£Ö®f²Á`–\"¡|ÉnÜ\r4±D¾hÈ<ªØBl‚þÐ÷Q\"4®ˆþ°ÿ\rN©œÑ”üÑ™Ëœæà´Ãà@Èå€9°èS¨Ñ*TQP7±´X#q¾ÈOÌTJ°Ãß¢ü¬D”\rb€@orñŽöÑç¤hëï¯ñô@ÑùïóëÿB By‘Ð#qé!cœò°5.¸Cqë ñ±ëPh%<¬DäÆD­\"p8êqÅ2DAW²PÅrGq¨ìMï#lTÆrÆ2\\K\$>E‘'ÃtBL®”Ñ\$¯WÄ´ZrƒÒŽK’„”°Y À\r*0Æ.0E4ýC#©Ø<£”‰L±z§’×‘”m\r,H§,‡à¾p\0¶ÄÀtÒÄ#RÜ4rÌm\r.G %`–#'<<Åb^‡Jƒ¡-á22Ämã´Zmþ0þ`-“(CDÒÐ þM72iJù³2ð2\r5`†Q@Øc¢(eºoN\0TÊx¢ˆnÅJÈú^hoRAMýhÉ\nâH}.hòÝª\n ¨ÀZW1jX%#c8“32 Û-m'9¦tö°37.¯.gœö­TÓ5b b*\"íL¦œWl`¼¥Eðê\nÀô/ì¶JªåC\"	b8òBüC8­ê\0Šb\$Ê£òoPÂ@î1'€·©À¬© À* ÝkÂ'ÄàÜjB\$jô‘ëJEè¢œDCPÜNº0JÙ‡æ-¢ÞÒÎ¸¼¯Òfâ°çKEnÏD¦î(€à&£å8)E”i4wFo mààäãÆ(NƒGTd_icP­ òY…§ÐSã\$EàA†NÔ\$nØ½ˆ€åš¢B…KâHó\0ðW ¬'HÃÎB/03r%£öHîgIŒOÎJ(Ã\" ‰N±„\"<ÙtŽ<À´@E'J\\f#åfDæ0-æÀ’ æ°\"šGú²¦’¯Õ*±YFÔqQr<tæ\r5\0´\n)O«!ñì€Š†1†Z–dV!Æ²";break;case"da":$g="E9‡QÌÒk5™NCðP”\\33AAD³©¸ÜeAá\"©ÀØo0™#cI°\\\n&˜MpciÔÚ :IM’¤ŽJs:0×#‘”ØsŒB„S™\nNF’™MÂ,¬Ó8…P£FY8€0Œ†cA¨Øn8‚Ž†óh(Þr4™Í&ã	°I7éS	Š|l…IÊFS%¦o7l51Ór¥œ°‹È(‰6˜n7ˆôé13š/”)‰°@a:0˜ì\n•º]—ƒtœŽe²ëåæó8€Íg:`ð¢	íöåh¸‚¶FÛþÈA´ŒàwZv \n)Þ0Å3Ëh\n!Ž¦~Çkjv¥-3Še,Ã’k\$SøV¢‰G¤Òä˜)ÎOÙíÂŽ‡“…üœ—8ƒ“Ð\rî;j˜ŒŽ€èž®#+°µ°œ2Žƒ´\"5¸C*É\n-\0P˜§¦°¦<ª(¦…<ðß­ƒ°Ü‰éÏˆê0¨óµÁ\"‚È¢ãsB­Qx¬Â\r¨ÉB²ž‚Ác¨Ö:°†C4ˆÀì4Œ£¸+Ë-J|	ÃËBØ\"èhÈS0Ê„³\\ÚšŽrlîÈ¬¦4è¼D0® Ü34rÖî\niÓ¸4Ë8æ²3Iû¦Ü/ô Ø‘>ðÒ6,0¨¦§cF3¤@PÉƒ<ÒóØŽc\$è\n\"`Z5¬’\0È7Bê±„€ÆžÐL1†B®Ñ{e/Ë#K%Ž‘¼s0YÈÀæ„² PžêÂˆ-°0ÀvˆÅ>¶ø(-Úðµ/âHÚ8RŠ•Þ“\rm²ÕphZPp§sIÓ¨ÙBÈÞ‚-(Þ3ÕR©6£¬*\rð,€<£ƒpæ:Œcê9ŒÃ«=\"-c˜X˜XÀÂ3Œ+[’¡ÍtàÝ_Œ¡@æ¤â¨Î<ÒëKB!ŠbŒ¬hJ–„\r}å)S[n9PI8˜ä<áÀÕ,`è“Äãš\r>®j%Q³C¤jnûÂñ´1â2Ä\$éJ 9VñŒ49\$S:±§[0\\ƒ@4'£0z\r¸à9‡Ax^;òrC™/+8Î©\\ÀðšãSàÜ„K ä¹œ8¾1&cpÖ×r<Ø)QxŒ!óÊ8‹DÛ,êçÞ -\0@3§V}ºþê—c®cüò\nŽÞ­\r®¶êÐ­Q¶ë:“®B82Ko\\sî®z¯vŠ¤C’p2ìØ@(	€[‰|)ò€€…\n R¦ ,ïˆ)iâ.Lå³Òä!ÉMa¼\"F–oÛ‰*%„¸Ï¤'¨‰ðtE¦ 7¢•®oVëHQMYµ†sÈ{Ëy,”Öƒ{Òi¤À4\$òzC©õ4!˜ëð‚£ý3E,1‘ò\rxpel<”’·ÞÂ˜T HÙþx<á[ì±âU˜3äE~ÃVP¡ë'dôö°Òï›ªƒ-)TÐ9â”IÌx \rfHŽâ@îË™8w¡MZ‚ÓÒÕƒK‚ÁP( b2»×‰ŒPñÁ?tSÀPFX‡2ÑpÌ \nQëØ…(u´\0U\n …@‹)Á\0D¡0\"Êä`GÈ±J(¹s°•\0…l»EáPþ à™PpV-§p\"UÈv-°å(bÂKüÇÈ’‚š)ŽxF\r‰˜ã‡	38Îa|“!¨ö€¦tÏ\rôS\\K’<#eÆP\rABu”ð=#¤MZÚvÉ&y/Õ´·c_“Ý.€ÞÇƒ™â9ó(´YBÖŠTN¥>§<ôˆpOÁù?H\\ýˆÁDb’RÉH)SJGŠŠp\0¥>JÍÊñ”ÁPº—rþÃHzAÁ²h“fY†‡ZsNøô–ù'IÉv›SÒÜÃ|¸M%À‘²þµ\r*<Tü%’UJF¥-ÕBJ‰Ðj6Òl¾IéA[K@g7õ¶·×PZMúçGï)!@‚Ö†Û`f‚L–s\"a‚’¿-eü\$7Ä_ÑªÑ ëä1âþƒ(j3Ñ½§ŸPàñK‘ìM@€•dâoY	N	¬Å\nc€‚YmMlJ¸³BÂ['µöÔÆN)RØr!-lÛ•[o-¿¸,ÂØ[b@n=É¹oq”µp U@o(O\nè¶kãÝÏ–õ{€­œz·O~ö]\"NÞ*šS†„ëtêRñ#ä†LÍÜâ­­+vJpå%QA\ná”1Ib!¦í*¿ìÛT!#N´%¹€Ç¢*m±¦DœƒÓbtYbá~x1œPÚEÛÑŸèP“ãlq`bÐ*4Z8Pƒ›ÂG„žž£Y‚qÝÉ´ø¥Æˆ\0µr•VÉå\nj“*´A¶–tªKàB%ô¿…LIŠ}Ä2õ{)Øì€³vuÎ,k1\$qLÞâ«•Œ9O’eŒµÜ«¤âbËtújE4.\$ˆ¦I„¸WîU 3î~ã¤)—ôÅ)a¡„›lBNdÂž³Î|d\n¨,Î™Šº#Yµ»B×!Ð[ëw\$e¹®ñÎ]ÓúÕ›\0Ã¯4>WÑ\$NÝ\0«\"LRU¼«Úá[KbF.Èi¹Xðìû'¦¯¥ÑÚ·VÛÜjÓvµ¬š6r»e²DvÝSZN¨­Üh¶Vé®›ÖOï}„ûh\reRá•¤ˆÁZ•ÅZÉ¥ÁËµ¬ %?gõ“¾•¼õ¶(1¸úDëŽî+J¯á:<¥2s‘Ty/p¥Dž»ó;ÅÌò DGnºë½uh­K‰1ÖÊm_EÅrärå&¥Àï²7ÂY 5O£ãáÀ*—FéÿP&Y£Ñ•5–¥ƒ§ê+•úÞ³ß4¯ŸHÛ«²öµ­Ž­Z¥ð·CGmG4c7\0Ø¯Õ2)I¥ðÛ2+ÖñiBlŸŒ'gY-£¯w‰zðÍ‡dô¯´<dåí4µ²UžÖba:´<¾%TÛáÚzó‚ãf<@ÉîÎB‰W‰¯âšx×‘ë»×”­[—5´\r~ÃÛøÜ°IûY@÷~Û[C/†Æ©´ÅëšûäŸÝÁÕ;RÍ4¾·â“\r+Í{ù~&›}’£¸5¦RûÈ3´}ÎÖ‚ìôŸ¢½úÜ‚{-—;§çò{:ŠþÿI÷ÿÏíy/¸Tàæ3K ñc„\r ìô°)%Ø@O°1b`\$¥Æ.KVój Œj\"Wì¾¾0(cëÆÐ.ê&—V,e¢-ÀƒÎî0Ë^M\r°Üí´»kã‹±Í¶  †A`Ø`Ö<@ÖÜÁJvî2Ð€3ãBÖƒL5¬\nÉç¦3Ð‚#Þ\n ¨Àph€ÊçTF%\$ë†ÚèªSg¢Èkák¬(B¤’	HÙkrËŠã\$’#xŒä^çÂö&lö/ãzÆOø7‚øÆ@ZUPziðˆÿGŒ\"ÃQ\"úkŠN”H\\9ê¸¦‡î0R9Çp**\nE\"#Zš@BŠªÉÃÚ(-6/\r:<åp”Œ³ÍÙL\r@ÊhÏ(ªÓ…ºW\0àÐ1N§ÑdñA(ÐÑVŸ…º‚b2*%;IKdºN¥“ê\n#%\\” šÌ¤Ö-\$T„ÐbW%J“HÞ_œ\$\"þ%\$B‘#Ä¨DÖé„'@ìcc¸[qŠ-¢ž/à‚-‰Çà¨‹¨”'¤ñJ0ÉÄœŽ^Uæ×s £«n/à†'±6w6¢±Òï‘˜KÄNøñõb<V` ­'‡\0ÃPA\0\"àÔ";break;case"de":$g="S4›Œ‚”@s4˜ÍSü%ÌÐpQ ß\n6L†Sp€ìoŽ‘'C)¤@f2š\r†s)Î0a–…À¢i„ði6˜M‚ddêb’\$RCIœäÃ[0ÓðcIÌè œÈS:–y7§a”ót\$Ðt™ˆCˆÈf4†ãÈ(Øe†‰ç*,t\n%ÉMÐb¡„Äe6[æ@¢”Âr¿šd†àQfa¯&7‹Ôªn9°Ô‡CÑ–g/ÑÁ¯* )aRA`€êm+G;æ=DYÐë:¦ÖŽQÌùÂK\n†c\n|j÷']ä²C‚ÿ‡ÄâÁ\\¾</‡ÛærQÓ¯@Ýš…S´—¬†J97%?,äaäa#‡\\ç”ÎÂ1J*Ž£nªªÅ.2:¨ºÏÛ8âP:®¦ŽŽž—\r	fÂÏã:9#c2/KÞ-)SÞ¡µîz-:`T`æÍ0èíH49BpÊÎ:CÖã(Þ6Çë Ê	¤V‘£ƒÃ ƒËÔ6»h`ì¸Ãòâ(#˜æ;ãéÊt¥ÉƒxÎ€SÅ2LÈ;Âï1Œ»v:ÌlÔTåƒêÞŽ®¬¦Î¨¯x¬­á49 Rú¿¶ôqIH<qèÊ:¡ŠÒ9¤cÒˆCÊH„µ%L–ÍXAD&(ò@Ï+z4¤x‚3¨Ã(Î‘×Û”:¹e(­J*åX@RüõQ(õ^ÍÈÜÿŠƒ(ð:\r”zX5½gZ°!\0è¿-è8Ç)»bˆ˜‰r:r\r÷ø7…¢LjáÉj¤¬œVÊ2˜×KSSœá.…áˆcÔÛÏ3LÖ5Ã*r5-\\–\$£„Ë\n¡xŠ<dS3„÷ÒlÓ‰\$˜¦	5`ÎÞ0UƒÞ6P.Ú´ƒ (Þ3ÃbÏ\\6#l`´ÝÊÖ^9ÃzV6\rí @&MÈZ+bV\"Ìnƒßdä¨ë@–„\n ‰¨øƒ\rÈ¸Ðž )ÈØ:z=© Èf««ë(6¹7ÚþÂäl›2ƒ´íy^ÝŸî•Rn°í]¼¡[àÝ¿&b¦)Á\0¨7´Ï%®ÈçŠ/#\0 Í’#L£hêŒÄJxú?ØÅ!=jf éL\0Èÿwü=z¯3ìU¬3Žc ÃNPÃXŸ%s[dìýú÷àÊz^šªL<äÂê³”Ç‘î*w…íúþîÈƒBáŒÁèDWÃ p`è‚ðïÁq\r­9äÊÁyëhÅ‚@Áæ0ä°:?à¾ˆÊ5@ùÞ¿Y!Ã\rÀð†|Aû¶*ÍÎ#ô2FÍj-n9/28SÍÈ '+™…SâÌ‹Ó\$æDê…\0hS%°XÌD\$ù\r\râj%lƒ—¢f^Z8 ¡Èé¢!)Äé£³)P)Ï:…8È™Å]¢„cŒ§R4ÐPTAKñ)ä|9% `â0gvT–\0‚èÞPe_!¹ªÃÕ€®LDgää›·ç~OŠ‘áé“¸â¤‰ÕBŠ8^ðä†£g&M•ÚC7~\nA0a\\Ž9wjlå”>ò4®šµdGBdeìê’Ãh¤\ny¢/ïyu¢´R! vÍj)FbfxS\n€µ=ƒ¡J0o)MÔ¼°ôå¡„¿ Á£”’–|qKaÈ£‰°xç‰±4’ñ: ÆåWŒ”(ªK˜3@Ê@nXNˆƒN™°AtäJš\0Œ¡oDe¦¢ãb”Èé6H9O¶âÈY–&a~D0·Eâb0á«”*¬ÂxNT(@‚)r¨A\"„À‹R:1a¸0¤„{U]«pLÝ\$G5\$‚RbÞIa<8Sõš y£H%<”âÞd×ˆm…Šr{L˜N?\ríµžúôèO)Ú§Äù¬Ó.ÅÎ|ŠŽÄ3¾ƒÅÍ wP´–ØRÀÌìC×O¢‘?Ù†ïØ™‚N-¨Î¦&Œz€PV0á¥tUÎoƒ©bKƒ©mÊ|x±èéÆu¯××cRD§“¨p	¾8!¶ÓÃCT‘¶´SÒ°ÉÐkwnY{2XÓó<Ivù“êÍÁÅ+à‚ÅXÂf¢Ã(wº*P·ÕÄ—Ñ²´·à›JÃTˆU•í¤ÿ#&¤†„a*ÒšÓs#N‰Øh®ÁÖ¼2Âè¯ˆTÂä°êá%«…‹zä0Ñc¨ÖÈ\nCŒd°1Ûbî\$²g\nA¼þ4sØ.6ŒÌý9ä?h¢•ªU E:èËÈÓ\r%¹°^XœÙ—TqT<¤f{IÉdÀƒY¢X{CBf5¹EOª Zö9+&'»¼sbnjz\nåƒ;™ÛSDB€Ž×æz²©Mó®Õß›2ãÍjÏ=Ðåìàds	`Ê´cC†,¶¬\\6‹8e{7eý ™ž:|Î)?:™¼î_Ö¡b¥—²˜R{á-1m³:SH_¦q\nªHþ÷¤r–‹Œ¼x{Q»€„¬Ö£1†“d2Þ¡ƒq¢¼F0'(Z<Jvy»`Fº”äÊk¶c&0 ©S®b-î«#™L='ELHC_)fk\$ˆ7‚@»Ó2™Ä½ÈÛ¢ÓÆJË²Õ+À-„9<én{.ú+dÏƒ.žÌu—¯I\"^*’ÎáÍVík´{SZKýk Õµn+ãßVÐ­fž½8˜~b°kõXã ƒ˜¥‚¨!\$¿—é¸Î%¨:Ú¡R°½v@L¬@¦«Õkgø¿\n<{òÇõÞkƒlÓ¥q‚¥N/+òdf›¯ôe/¾ìwe`üa™;ÑÃÞÞò5f»õþèÏ;ã]ãˆöþ&½²^=øÏ—½Ý¾4îšG1åmû»KþhÏDÈøÄ+ã¸~ŽÎ!ÓÊëS1ˆ7™Ï/Û1ªlF0y´'}fòõºgƒ}…9ö^?€öå1eé§®ÁÞèÀ{ÇÚ8É3\n*pÀ‚ÚLšsìŽ†ßbi)Uì-èÓÓDH	­né1G%;I~€ú_QÑò¶™YÖg”Ã'øÛgy[4‰ëë|B:[D(¦OZ\r¯^%O®\rŒ0Î¾„–Á,éËÄ4,&Â£¾ðŽŽ²ð,øÂxëCâ½åŽÿPBïæLÓ`ÎÅÐEË.Ç‹P0ðÎ‘ÐR)°Dù°QNŽÆðwÐLPl>6@”°Š¯æöŽ ‚ÔM>yŒHú†8Æ>áÎý‚fóÈÃ/0©ný\0V…l¬Ì\0S  ´ÚÐ{„kÐ‚´`Þ3§–:°âé€à Hh\nC\"`ÖWîRÿKbŠ@âS…«ŽòÜNöK1\n#ÚìëB²ñ	Ñí¯±Î9@Ë±ï¾ð…»B¾â‘C1#Ðó\r°ðÈ\\ÂÂŠÃVö°>RL6S°¸îm1qÒâ‘n:±Y1\\fDf€0Ê1°~¶\$ºAãªö‹,CdÇñrðñ›‘|ù\"*L\"¦ñ«ÆI@=à®\r\$\nPGºTny\rOÊ™Àè\ràà¬§\0spÓh¦Þ\r½+.	f°Y§6Iœª¤Î‘í¤;G6&T4ÂvõLÒB\0†P Øqøx¥^E£\n;\rÓ@@è\"Z*†~BOÈ†€ª\n€Œ p4©òBÏÀ0lÈ‚­ìëâpÕÄ-o,Ô¤øÂ;&-déšLiJçn>\$í°×\"TËƒÆcƒ\0¡£ÞÜã²=ñ®›(b4„šJƒr6.ÝÌ@‰€†’8c>·¢ÜGàôè@˜#D–	¢RØ¥\\¤ƒÞH¥@\r£¨ÅŒ\\¾q^#®#§¶.ê<¥Ö\$€RâŽ¥&\$!Jú0n?/\rÞ# ×g.Æ)';‚ž\0Èm@á0s\$0S)*o1jMÑlB˜#³<º!ŽHq„–2éúžÆ>R\0ñ6i°õ£„l¦J+Æf3-M-\$ .ƒ€AËR?\0êæŠÉ4+¸‘âtJË¹\r###Rúd”…D™/ƒI/Å\rÓ®¨_M´@£,bË>Ÿgˆ©¦¶I^!E=åâ¸c†J…8kXhÓŒ‹kåqDã¦„ÅØií %ŒX#ƒIà/b";break;case"el":$g="ÎJ³•ìô=ÎZˆ &rÍœ¿g¡Yè{=;	EÃ30€æ\ng%!åè‚F¯’3–,åÌ™i”¬`Ìôd’L½•I¥s…«9e'…A×ó¨›='‡‹¤\nH|™xÎVÃeH56Ï@TÐ‘:ºhÎ§Ïg;B¥=\\EPTD\r‘d‡.g2©MF2AÙV2iì¢q+–‰Nd*S:™d™[h÷Ú²ÒG%ˆÖÊÊ..YJ¥#!˜Ðj6Ž2Ö>h\n¬QQ34dÎ%Y_Èìý\\RkÉ_®šU¬[\n•ÉOWÕx¤:ñXÈ +˜\\­g´©+¶[JæÞyžó\"ŠÝô‚Eb“w1uXK;rÒÊàh›ÔÞs3ŠD6%ü±œ®…ï`þY”J¶F((zlÜ¦&sÒÂ’/¡œ´•Ð2®‰/%ºA¶[ï7°œ[¤ÏJXë¦	ÃÄ‘®KÚº‘¸mëŠ•!iBdA\$šž*¬M\n@Pd0ÈÂ0œ7‘ä7®‰lHæ¡®‚W/Jj°¥(\nï>Îr¸™Ï¼bgfyª/.JŒ®?éœPEˆ¢WK¤rC«…º¹)ï”¹/ª£ö§Jª\"½\0*®b×§¥ÒªÊ;\nšÖÁ0¬:Ø·1Š\"¬²ŒTIF™äl–Ìh¤ÊªÂFtŠ.KLê\$ºË@Jyn”ÅÒ\$m/Jé4¤J¼˜%o<Ó¤(e­¨|¶Þ½‹àä\$Ú=*ñœQÓ6…^§¹6K>ª{˜‚ ïÅ¤š¬oiœÙÓÖµlèWÔ3[iArLï¼ÕjÌ^ºêAj©KÞÌÄâ¾œN’§LßÊ¼Ìà++‘v³Ï\"\\‘±Öíî•\$¸ú§ï®&^¸µÄ¥ão¤”NPŠ¯>)ô¢Ù#ã“B¹B@‹ül“«4Lž¡Î|ÔgË.J2ò: N¤éc*>€2Xt%Ù²:„ÈÅiC{iK%Æ6©¯6Ä'–Ï½A›µ\nÊvª¢j–º8k•ñ'Ã{aœSBÍÔ¤æ¤\rmIcÄä.Ò¢xû)êŠÆˆ¹Kª¸‡;8ÄÏ.mH¤äÜ/4«©•j©IY_½—Ò\0’nÄ˜)Š\"d|ÿ+öÅ@¶!•6ó3tw*ä‡lÑd+ AûÑI’¾y¯oƒ^)\r1™ø°mÐ ª<Ùkv’Ek¾Ûþº÷ú0¿¨µ_kw¦¹ù\$£e»ºËò6úèç½šÇNáÊßŒµ`û—´©V9\\fnÜ°²^KÔž±RÊã—ËázEèÖæ«X\rÐ9\$uHZA\\ ¾+óþE‘ý'ý›ÕDÉˆ,\"€é†Bp«Ø{Øq¤¥¯“¨hÕMrYæá–R\n¥³•†¥RBD\"Ec>¦•‚¨†\$3Ÿ£¢:ðpÁf`.-Q·˜`†Ë,3FŠ¢s˜±!ÑÖ5,Î™8‚}¢)a,¼ˆ(’ÈPtMZ–(“YÈLUs`ƒŠÃ\n–T1>)¿§òRKBS\nA­CöCê{vmšÅ°I£é“A¡ÀD,ƒOLO,)5†Ã’Ž‹Œ(—Džcª\\ÊŒ1Š\"\$™#\0	Zm–qÎ74÷.ã,†\$\"AŸdRI‹ šZ®\rÄ’i¤{lKÈ@eÀô€è€s@¼‡yÜƒd\r¡¤7Päƒxrà¼2†éø`na¤7ÏàD aŸA”:N@¾ƒ`a\rÁ¬çNZv>¥ÉOŸ°xÃ>@(r¡cêÅA‚.%Ì¿ êIPs¹*ó^07RXÉ\\;…dìžæ~ÿÑ±8…Jg°ã˜385ðøªŸ‡pÙÁ–ŒP®ÁI)³6°ì“BÕ\n¡ÏÊŠVÅÐ§«|M\n‚!U,ˆA´äàÅ³±¨PÕBAã'XkPP	@ƒ\nX™à)é#+âVZNáy`¢Üß•D³0i--[Nù²C\"¸j©*0¢”ÉÂ(]Ùº|*%Åh%)XVŠäXoˆŠˆWh©K+qÐgºXš%úk.“	,S‡Gb sAÚ\"	.Jy2˜çôÖRèm1£Ÿ¬ê\0¡\0ƒ<§¤ö—°~cšX®³àÙü²çÞ‘È0Jp±|ì½ÌGùM£9\n<)…Há“É«¼(½œ2oS…«&\$™ÙwpJ @otýcJ“\n*ývÏ¹(Â@À™O3ÉFRzOÔE3ƒŒ]%èØyˆ2¥¼:À™hŠ ‰*WÆv‡ðpƒ¯¹Ñ¹HžL“ýÎ^«mÄ>µ +üÈ(¤£à4wË’¾€(1†ðÙDC¥\rÕŒH˜eDIŠbª¨Üg,å—Q—Ë™xHæ,–™TC9\næß3PÎ\\‹ÚþÁ´YŽzJ'¶_%x²Ò“\$SGÍi8iPø\"áöÅ%Hî-'Ð€ v’\$nñ‹³‚ÁN“À.aýS˜Ù)Ðu\$µJ­(¹ˆ­Ñºe)5–«ùiÝÉ´ÂúÁk+C­fª5H†P­ˆ”}cÖ~oR!®<€\\ò‰\0ŸÇ–Ød’E¢YUèx^ØØÃÊ‹˜ûQ*?›ZäÎAî*(¼“nLËx6C¨g9¥âI®ði+'ú\0ƒéZÇr«¼8èJAJÅY¸:¥!Ï\\d‰ø25„¥®½WÃøjšÿÕ¦MµÔòë:DN}\r€ ‡•²ÆZc5èÒÌå)6³ˆWIÚFË6ŽS¡»úr¤-’D¶Ú,h¤ƒfH¢šU ZØ|íŽº®Vn­Ò/|+…Ì*èJÑfDUæŸWžÁ¸Ñè&u]Ó&…^ü¤´(î'­Ñ¦NñÕ—­¼mƒ\$Ó‚¯¦Éè“y7\"_Ö«eE„l÷\"ð5Q1ð%é¸hžØ,Õ`ñ…[Ž†ýd-Þ¸b [zÎÎÍüƒ›¦¾±ê#¨]éRÚ1n{¹_^ç{h™t6ªÜøRÎ(Ðl²\"¥i“ cOà€Œ´ŠðWcNøÊ\$í\r£Ž'¿º%Î¯É}ÀµÁ&ÚBj;é“µjx\n7”§å¤}±²÷½(©à]/ªHþ½nû#;íýØp[p×áøsò^ošÒ£\n^ƒ ©g<2ÄŒ,GRcê|ƒ®²'¨®bQ¢¬÷ÏØúböiâG§0±/ÄÄo¶ý˜gïÖï'00ýðùÏäÿèÁ4É.²—/*î*†K2¦¥ÞÿÏÖÞìæDF\\8ë¤1(Òµ©–‡DŒÈ\næÝ\nŠ.E^-\"úÈHÊ.ÄXðDMC,=j°GÌ‚ÞKtbÅ¾©¤|RÅ\"ádü­¸[ŒŒÏÀ@àÊG#/6eNï\nðˆ²pº2L 5¯@pÅjz±ÈÜaçzgª~¦­'Pm*^F¬q¢Öñ\0÷G¾[!2´«2]ÍþBÉ~}ÐpÐ*¼—eXÞ‚òV\"¾K§JU(:h\$®h‹Éî‚Û(À7‰c-®èQZµ‡±„,Ûbm7¤°>é;\"?Ž-+Ú'üêv„\\ùYj0¡?d\n•#p+g˜ë„îBñC©Æu&ÜÇöIqwÐi>g)€\$\\-ÈÊÔ.äŒÉšçˆo*nßÌ¼UÏkgŒÖjH™&æ)çÆà²Ïf,DÂ™ ÑþÒ˜`±øÚK\n)„\rf‘ºA±¾Û…0Ñml”Î°T¦Bèb¯¢ÊÑç1Ö\\§zÎ\r¨bn\rµLÞ€rbUgS%Ïõ1{'#Í›;'ìÞÝ­ž|Â‚x‘¸£q½'Ñ¦ö¼öGø|’—E\${²&Gß&’¥+D@é\"ç(ocò£RÄé¼=ñµ)å7-2l 0áäÌ–FJ?ÊƒÉo°7ì•¯ð\$hœÿh¨ü±ˆüè·/g/N¡/­P:³*s'³'Âvÿ¯Ž;hLúíOÚbâÈ»Îø1Á_+Ä¬Û£&Ó@ÉBÛ4j‘4©šÊ\")±·	råFæ÷³a“fHŒ ^³R^²ˆèÒ,-¢CìŽóg8“b²ìñZCÅ8º¤ôíNŽ‡ªvDùÎÖD*\\¸‹Ð{2›\$~—³´8,p¥¥&®ðÄÇ5\$l™#\nÜ¸ÒLÖ…Á;h¨3Ù¥,JK‰4,–únz°(ð¾+Ôr'é@lš,s…4åPrñ™†ƒó¾ZLºaë’:-L‡Îèª*šê­/zc‹ØÂÞíÄ*£‘Ó7’’Ø\\cÑZÚÑ_5´]DŽ™DñË,ò‹7rzôy9\rÓFšf¤ú`!Ñ1Ÿ5’kEÔ‘ô—#S#R¡#“”ý\"MI\$nñ,Ò«-±-NÛJÂ T·JOTñ§¬úpmHJÍK”¦z©–ñB(ª²A´ñÈÝ	ÍþPêF¸”d‰gT5KCŠšN#óò*³IªïIò‘1Îô¬sJ®º>ÔÇ&Õ(ô’÷8Ô‚Ý7Jœ¨®¾¤Œ ñ´àE”T®ßMÎ]°¦9\rHÃGªÌYÑˆkuVêGñT/g5Mä•1GUŽr•³òÙA®KXØ\"·<ÔF†Ô4ŒR2)_,¤«±aL’’·nª‚¬Ý5AVô…Tu'ZU¿Z¢%ZëûSŸST[)‡75_Pë —UÔ-Ä]V´Ý*Â¬ÕïZÏ]¢gZF’Á[–\rYæMa5ûLUã*c\rUÒ×ö>d§WõÈÝIc0êúzHK¥aTK6DñD5µÝ7UÍb–RðW[TV&yrábðäµ‚dSP©M’¨{5púgÒíœåjÎ”ÕKÅ¥¥ÎL…­Kõ³Fµ%b– ö«€ssqg27fñ•j%Ò­Ö©f¤Weã\nšõ‡]ôY(áj\$F¼n åkrLd¾sFôä(Ý4ÒneX{âh\\ÿ­å5f–¶)–ÿ·³7}pÃŽkÈLVí&qötä¦ž*Š§FCÐ2vü“ÐKŽpÒ/¾ÿ33WhŒ‹h[tó	/÷â¤è1ƒ\0V.P8O`†‚€Ø`Æ\r€Ò`ÖøDªÓ%4ÓyU.Œ!e²âL¬Ef­\nÌXÖ³¶§¬œDw¸PÉ°ÁÕßTà@\n ¨ÀZ”“2Ã&ÇqŠ-Ñ‹W6ùŠuÑˆ/1dÛ¯Y@.X°©Jà@ÕNtjëÉÎ£Lµ3Tî1-Œz‘ˆZM2î×\$E§,ö­fò7¦kœˆˆæó'=DRÝ&.jVDÓÙzTVö×«P7¢¦ì_oà!‹Ò5\"C1EÂ@o>ìhh%˜z“³bäŠH‰‚L÷QL¸Ž4¾î1Jèëª²2,ÒìZS‚³Be¢¶q.“¢½0Âw“™‹q¯‹²tð‘X³ÕãŒs—‹NXH(Èu\r?[Tl…ØÉŽì€\nédÕ#3P³‹1Å‘œ'ðP1-…µÍÔ%Œêé:‚M´ŠùÔ0mÕ>på‰¥ìK>Æþ‡˜âëM^NBmw%Qœ^˜“xÑÅ¹•2-\$…‚õ«\".bì\$¨e²oÍ’‚@µÁ…´`Ù%Dñ2-16ó—JOá‘y^¤ÍoLPHEB™Žv-Ö‘v,‡ˆ„ˆÎVU—>NÍB¿\$K/?}ãó‰'1\$òƒ+-ñœ¢*ÛÎ_ëw]h4ßcÂç˜«˜Ykk”‰Dï/voõÙC¨\"ÐÂž{÷Hõe¦ƒ”`CÂÓœñ94„Þ(²5Z(ár";break;case"es":$g="E9jÌÊg:œãðP”\\33AADãx€Ês\rç3IˆØeM±£‘ÐÂr‹s Òv7‹DYT˜Úaa¬b¦ØâE2H%’é„Z0%9¦P\nÊ[/Š›¢¦YôË2†Ìh5\rÇQ¸Òn3°×U Q¼äi3ÙÌ&ÈNªt2›„hñ„ç2&›Ì†“1¤Ç'Lç(>\")»ÞDËŒMçQ ÂvT£6ó±¦>g‹Þâ§SÃx½Ë£ÈüÈŽu“ëŽ@­¾æN <ˆfóqÒÏ¸”prcqÞ\n)çìæ}ç#u› Ò]üri¼Þ&fÉËvIÁ›æà¢©ÏP·Ùÿ‰Ö :›Œ\"\n€Ø¿2Ã´4¸J¥¾ê à?j Ò«&B Ò#\n\n³9ÈÂH”¿›‘\"kPÚ2²àPŒ2¥¯Û‚4-Ã!Œ*ôO4@)9MàÊõ£ äa•±p™¤Ã˜ÀŽ‹ú1/Éú×I20§4®svöÃîx†âGÒjsRkù'5èØ&\rëˆÜê·ÉC†âŽRñc\nÐ{pòMüß\r.tŽË®K,:Œc¢0,\nÃ¥\r*D0L#ß¶‘pœ:Œª,pÊÇÎxJ2ò¼4ýCQ¢óû,ÄÏÈÇ\rÕKÊF34¶æ°ÃI†YÍnsš Ñpž9FLB‚9ŒkËðŒ³;ÊñM@ÓCTêð<I,HÇW×s]Z6&£\n=`0ó\\¶›¹¨¨¦(‰€P’7ldFâ¢£ë\$§…ŒáCm8·pRa?ÑTšQ0¾ò|Ë#Q4•£4ÃÖ!±ú/ˆŒ¯ZŒ&óC1aRˆ(42HÂJF·\$ÍØŠ<\$™l_Š¥¨&a3&EâQs)\"D£d|Ì³i[\rã0ÌòV)‡`*/]W€P¨7§cÜà¿0õ¶‹Žc0ê•\r“JÎ9…‹ØäàŒ#8Â³»!L6¸ëÀP9…0ˆÞ5²B¦)ÎÈì¼Žp\\\nÔÀØ;?phÜÒ·û,+…ÌiPÌ·\r»O&Rš9n¾K”ñ¿sx@a•)ô“Îê}2P&Ó\r¾i…x£¯Ü<á?í<7S	ƒ\0¿/	@à¿cºÝP*ƒ€ÒÆœ8xý`Ì„C@è:˜t…ã¿ÄF;¥b9ËpÎ¯?e°¼£Ž ^/i;P:{úú7\ra|Êƒ^aÐðÂ›‘DaÑ*’	»|\$!ÐŒ¢EÐxID¡ˆÉvZgW¦ZnŒò0AŸŠ±3<Ï¨€¡I:gäýŸØL€_‚°5!@\$\nÙŒ\$\0 ¤’Œ@ˆ!ƒdh³.2d–Ù ¼Š†7z“Š_dT³œ0äc(a)aád˜3\\+Z8Æ¹P/’|ÇOé‡ehj-4úFÜ9ð%Ôø¯hH:î\"!å¢Æ`@T ¡9¦Å™0ÊÆ	ò!A´Èù‘!±2QX’#^9¨&A@'…0¨\r|5c%ø4«P@bÚÑApèáØ£‡	±8'M •‡XÿãÏEÆ1äÞaHBq[Šò“#4g)ø€!½’µB\\ë	Ž„‚ 0T‡ÒÄ²²Kä‘êjAÈÐ>„_ÈÄ/D‡é#3ÿ2ÓXA›a!…@«>‚HZ!HÄÍ°„ÂR eÔ6†&Cxl—ÈÌŠPÚH' p,…5d&sÖ‰qZ€('‡^R4>mŽ\n8Ê\$³W9áŠ&\$Å˜Óv`gkF-é1?Ó•ÄCQÏ&‡”ý¶%BQ;1z0beQÐ«:#d¦¢BGXGÖÚ°7õ%lÍ\$;Á?lâ¤UäŒÔ{)dÅ´ŒœÚâ#é€dü‘#Ÿ™… @™¬—\\©ª3y 7@aä>)	4†Y\\p×õ}±hà3ÅbÜ÷j‰¬*W\"ütHz¦¨8/uš”êÁx‡Žª²àæÇÙgpb…Â“T{V³È¾ˆÑ4\\»Ìm`Œ8ß–{‚ªVp/ *\rÎsØj‹1\nÎ›;Ã>H'rFa¼tâ•••5mÄ¢%]åjËƒt÷\$Â5¥˜tš}EÁÌ&VG[Qå<)˜\"šéJX[3±Ä¢(ú…ãé*¡©/tôqóBEÊ˜••LÏÌ°oTªƒ)ÔŒ­ð‰&\"Ø01àã\\Úp»'Ã\$¬3L5j€N ¥ˆ7b`ÃŠ0æ*ÃØ³!’dcÍJ#³wàØ>Y‹Aj/VBXÛeM\"¯wAÇcZìéKuM1ÿdõ˜¼%l'Ê˜#D*™‹²á3ÊÆ!!·H(Bƒ»)œÐ}ø\0ËøcÙÖ¨‡3<G¡Wƒ\$\\þ´ª[ŒIN(…`%HîJ¼9«2’€ƒ¢Šƒ#\$ì[%—íE°E7_çvˆåµ™¨U–A!\"+²Þ¿+†ReÇ-J\$Ì¦ÚS<›€­qŠ×óuöÛ_©ÒvNÝv¶Öt¾ÕMxkž‚\nFému³WŽÚÔV‡TƒþýKêý\ré\$Ý×ËeÊG±Ôý!4IUÉÄ7ä“w¯¸t‘¶ågxO‹n\\Ër©¸Ôç•\r|SÎ>£Äi\$p²må\r§ê!¶U¤µMÛ¨ÑU)ã®Ë–Ö«Œ†©˜Â¥E%Oãµ&©ížSÇÏ,[QIíf)€Á#ãÄÎ×³ÝÈm³<•g	Š¸nyl6žÂ×¡0ÿ“swŒ°–dÄ¹_Hå8B±äapØÇc>¥º®2ýge€‡áÅÚA¼ƒvÆ)ßuûOØ7›v‹³Å9vÖ	ˆ{[ë[®Qz8+ã\"ƒÑÛr°A¯â÷GÛO‡»ÝçŸ‚õÃ®9N‚÷Þ&€\n	*ð—<à!ÎÄE^²\$/9Hç&88d'•&Á‰]\nÜÓ»³ïí[_o¤ø=sîÒ7wRñœ+{çíºD?}Ïjöëqˆƒ/låÿ=Òô^ÝÍÍúŽ\$ÄÎÿ@ÿ£Uz5ý¿}'ºt»z-¶º,~%é€ÿî[+¿x¢bÎ‹Ý!‰%VB\0£Ó~]D‹î\rèÊ¿EèçíÚ¶ÆI\0‹ònÆùŽkKð0p\0îòýNhaåZÌºø/Ø­pƒÀýï°e\\³oàxÐ'\0Å²BN?ª\\IB@Çûd¦Ä¯V•°åðnSÀú­´íÐ{/—.^ýf ÐqðRjP–ÊDÍtü\r–£îˆÛP0éFj£ðš8Â4¹‹ºÓd­nŒ»ˆ—Cã\r†ƒ0Â»ãããÂQËÌJÊhVç\r«Î£Æ3ïä9ì\n@È¶Ñ'pŒèÑ\níz	ü\r\r|^âä·…àÝCÎ\$kò7eM\nÚÑ„øëq2¿\nÜLq:	ÞÞQ0y‚ôI\"L.ˆ5\0001N%&2ü`ÂÅ®´&,7ªqfÇ±Hd|\r€VŠÃ‡íºCbxÍ6\"ÍhFÊ&@ŒdÈ >È(õæà\n ¨ÀZ48c-dÅ.®‹ŒæÅñnôâ0\$H‚áL€CB6Èm«\nN¨©€fË¢-|ú,òÞíÅCØ8ÃÈY\$8/+ÔcËòÏKÌ‘ÎOL¶ö‘H\nMD\\-F„'ëF#§\"¨Úà*’gÂ.ÆoZÿ‚>[.ö6k<#<ñ(î›ÑòªÃ \$ü4¤H8ˆÑ\$‚ú3\r˜ó¨€•£]&ÒK‚üÚ%Ç\$Îàƒƒ\$ˆŒn‹Dz/x@‚ûK>CìaêÌóMÀ„ÄþÜ‹âàêZ®v¤%§+n®Y¢\0xêN?Â:1‘ï&5äH•¤ð9G<\0îßìJ—ÊHŽ´+¦?GFéëH!D˜7dp¼ÍË%mD§ÆK¦>æ*Ì§°Kgœ³*6nx²à´2å&ëp~HÃYD\\¢ôú-§#²¸%jÕ`@š	 t\n`¦";break;case"et":$g="K0œÄóa”È 5šMÆC)°~\n‹†faÌF0šM†‘\ry9›&!¤Û\n2ˆIIÙ†µ“cf±p(ša5œæ3#t¤ÍœÎ§S‘Ö%9¦±ˆÔpË‚šN‡S\$ÔX\nFC1 Ôl7AGHñ Ò\n7œ&xTŒØ\n*LPÚ|ž ¨Ôê³jÂ\n)šNfS™Òÿ9àÍf\\U}:¤“RÉ¼ê 4NÒ“q¾Uj;FŒ¦| €éž:œ/ÇIIÒÍÃ ³RœË7…Ãí°˜a¨Ã½a©˜±¶†t“áp¨QŸ–lÛï7×ŒüÕÁ9äóÐQ.SÃwL°Þìëá(LŽ¦èG›ye:^#&X_v ¤RèÓ©‹~2§,X2­Cj€(L3|²ˆðÄ4Œ€Pœ:£Ô  Îê†88#(ìÞ·ãZ‘-á\0000°€!-£ä\nÉxä5„Bz:ëHÖB8Ê7¯èµ/âd(\\‚ÿ )0Þ7´ñx§3q|óŒ-ðÜ“,ïHå'­òHÉ%¤h°˜7­ˆ«ÁBS‚Þ;h<‚†¡‘‚FÞ1“ë	8*“~Â¨£Z¦¢,âjúß²I Êø…°’\"Šñåª7íŠŽP­¡­@TŒ9Ä#Hä5¨‚ÿ*@HKS£#¢Îï2H»×A'R|·ÈÊ“·R‰ã¢t2CE•%ŒÓÓ¬[2ž²C`è\nMD¿Š‘E\\•\r#XÖ£Dí ínÃ¨Ø64Ë’\nŠŒlc\0(‰h ì9 P‚óÈ»g\"´ãéCtúÞBÃ\n0@U@è7mú~¦Ëý&¿ÌÉ&¯”¢+!ÓT;3³ÔÍ6¢^RPË&'H¬D2 Q†J­x\"\$©Xä’B*s™f˜à@¡¶“É‰ds+Œcñ}·XÙÑ{*ËÅÉHÞ3ÈÚzšÌóJ\\R\ròá'¸¬`óÊÆ1°ƒ˜Íq/B9…0å¯Œ#:2ö!OÄä…<ã(P9…- ß£\n¦b˜¤#m£ƒÔö%qKÒ²Ò6çc«v4¦±Ž°ß\r›UvŽ–£rzÂ¨Í¦Ê4ÖÈÙŒïZ©Äñ{JÙÈ(|¼ÔÄŒ©ªnÂÀ‰R9Ç9˜@2…DƒÁ\0xßÊ3¡Ð:ƒ€æáxïí…É%v9ËHÎ¾Ÿ ðÖl=@Ü„W+³Eú\"ûdÆ\ra}˜,‚7à^Añø I×òiÚê\"H• GO_ã¦1. 7«xf‰!Fü6×U	¨E*<½ Ò}!ß0	Q‚\"V¹Ï£#†EÁò@P„Ð ûTjRë5?Á¬´¼åhcš{&èÀ“ÂZpZÊŠb!É‘â\na‹ÓÉ=0tö\"‰\n‰)? (\$‘@òe% ætø˜2ix yÁÅËCàÌ—Ü ALd 9Gè0qÀÁ;ãHMB€O\naP´X×^›ª:¤™FÕ9‹WXD.0±D„‰/SêN9Jƒ@p¦\rEC)Iì5.v›ôÁ\0S]€€3'#%\0F\né<À¶b±àYñŽé\0ŠÂÇÀŒ	z2%ÂÔäàP‹IOç±”xY\"ÂRÅ¼'„à@B€D!P\"€©Ê E	v#ÆQA[\$ëAæÈäú,áPàà´ÊÛ\"ÁX™-’¨‚#Ï`Káf¹cºÙ†EÊxêœHvUÝe§¼˜BV±UË­OŒ0Òr\nÍYA2/ÅÀõ¦8?'“Ó\$&©‰‰“¢^)1kâ…læhm8§ªy®3Ê”ÐH\nÐKêùÓÉòI¢P§:›ä\"èÑS\"Ò*«X* m1h&qƒjO…!²´ƒ\0šÉK-…êº‘`ªå¤áp83‰Ÿòâ\\ÈÝ_\r!éR„4€Ì+ ¡ŒÖ!¼éSoäÅÁ‡6NàjC‚Z–{ CœLjB,<ß¢NSØA\\kf¨˜§›¦j}DMk	z®Zà¢•¶AÁE\0æ9#ËxJ® ¤¸ÈÔ* ’Â8E\nHñw‹ÂtÔƒ\\ÐstÔ‹¹4ïT’ƒ…*¯‘ä”Ë‘¨E\nÁ'@¦)âgU:µ¥†´»èùÍ(Ï:9~Ü•0 àƒ–ªg€Pn—½Ñ²ŒÛCi/\rIb,Hä„­u/a.â£K Ué5UwC\0á*‚¦¤©O¦‡•UTAÐæ-¥X¾¡Ÿ×ŒÓôY;¹\0ð¤bN|Røw\"Å0‘ÚJHI%¤91˜¬a&R%I“’,„”â¤-Yù2fæÔõàC§0¢€´,6QÇƒ’y‚ˆ#\$Í¸,âkCœ®µhS2n-Ò!”D%\rY‰ý–ð££¬DÖ¿Æ?¤p°s@ê‰RJz€A±‚ø(5¸XY%¨1é;ørj[G\"N§¨XÄãE«l9\rÖZ„ø¹Ø\r®,-K€) 2Dœ”Jv[)q’µs±XÊ^UÊú\n%¹ø¶fVû_lí]…>ÜÖÏeÑ’Ô“©¬tþ³_ÖNd+QkÙ* Ö”ì£WŒ¶Š2<	Ûü²Mwªj.¬/{õ2ïübG«½ŸP×!pBÁµrÕ¼9’±æ4G7a~Òî‡I:Z˜j0ÅhU@±®!µ^56“nxÚuù{äŒeNrsŠ_u¾#È…ü(U;ÕÍgUZú¢JáŒ5À°ü)ÄNfß\\	¨G9w\0å:‘‹Y¥pR\rO§ç³¢/jC2Uêöÿ¨uÍÕ¯x‘{	–ÖÔ@šž™›@˜x8g\$]¼`Ž·¯^ø¨;äŽ ¢ñã6ÒuÜg»­!‹“º—(5LN-ÑU¶×\"Š¯‹\n­ºÇÆ÷w‡ÞVA1éZßÍ;…mƒ -œz&Ž*#âS´RQª=Hón¿Îm\rVöj@ónÊ½ºQÞó›kèSÚªnQ?Ú#À§{“ê8ÇßêOž//|ƒÝ›—ñŸ­ô1ú|G˜»¥E©èªýà0çúH(¾WÐ*_ˆ;¢;Xµî§„\$àòÿm^ê<7Þû¢ Bd\$Ðª‹Ö¯Æå\rÈNz½-@PŽ´öÎqN}°ûRøÍZµ‰xVm¨VÊ¶bÀáp,ïÚ FÎ\rÅhÚ®>r¨]E8Ô¦ätƒ\nðj	BH7ðÕP\"Õ°|bƒ÷°Íi0Büê¼H¦¹\n+A¯÷Î¦ÈJ	\nÀàø®ÒüÆ,ÞO	†¹JÀŠUÄi/«K¢¸Æ˜dN¶ÇŒbûÌ„¯è]\rðÕÏÊÑ,Y\r*ýepù0ò‘\0F€Pº«®»+¶^DLúï²<ªØ:pÙ-ZJä7ï·Ž½	ÌF=Ä³	q8×£ªÈ@¸¢Ì„ P	X@È»ld’aª`p ØÁð61.lñ¬j‡ñ^À¡‚6„°Sˆ&¹V÷°ƒH	m|\rÊ.ßDÎD&Î¢TbêékÄÜIÖ£0O,d†\r€V\rbfSF!¢–—ÏÂ>\"æcØ\n ¨ÀZ†\rÀÆ€Ãš&§ð-\"JZìVÁÀÂ&­rÉ¥šK‚zxcüÓt&ÑøÀò…`Þ½@ëâþÜ*>Ún<ìî'#Ú­’;\"B!Bj€ÊXL~#ãœó(T¤Î\$…ã&\$ä›(ÓªÍe.¸ãL\\FPÜq„ÄØ0æë£âA€ÐTÚÕ²‚„©Æ”ŽZJTÔ’*˜¨€Þî¦ì*)Ò‰†/k\$03BR.hÿ+%\\\$ë,R¾:e²©ÜÚ‚Mâ§\$Ê@HÈf'ô>ˆ°ÛFBOIÞêÜà#“[Š?Èä(iö\nL@&ÌüH‚7- @\nÈNäìsÀá-iî,ä’&OWà–‚¤† ‚6ÚäòZ‚Ë)Kw*D°4ÂžûFDØÊE*j/+E:gœÏÆº5“(±c4 Ë3P”¹Žƒèl†ø^C|1ebI(K)ÄDBÞ	\0@š	 t\n`¦";break;case"fa":$g="ÙB¶ðÂ™²†6Pí…›aTÛF6í„ø(J.™„0SeØSÄ›aQ\n’ª\$6ÔMa+XÄ!(A²„„¡¢Ètí^.§2•[\"S¶•-…\\ŽJ§ƒÒ)Cfh§›!(iª2o	D6›\n¾sRXÄ¨\0Sm`Û˜¬›k6ÚÑ¶µm­›kvÚá¶¹6Ò	¼C!ZáQ˜dJÉŠ°X¬‘+<NCiWÇQ»Mb\"´ÀÄí*Ì5o#™dìv\\¬Â%ZAôüö#—°g+­…¥>m±c‘ùƒ[—ŸPõvræsö\r¦ZUÍÄs³½LÂv4›ŒýK©\"ÑÊ[˜–±GXU°+)6\r‡ž*«’>n?a ¥&IYd„—ÈcC1È[fâÁê„U6©	Pœ¶H*|¡jÚ®¬¡\$+TÉ¬ÉZU9P“&—!”×%E‹ðö2Íz˜'esÎª 0“´–ˆr«41\"Èˆ=Ò	P¥?Ä:¢‰–oñÄèR@ÒÊ’\nÒ¤lœd¨ª,\\¥²ïªbÅÉ„#®é½i4¼ŽÁ,òZÂM‘«úC³RêË<–1\"K ÒÛí°p´þ•ÎèéÙ;‰*°p£.À¾\n´1»ŒÓtÏ7‰+þ¸d#Q'oÔÄà•éò,2=TáT„µcëW0êŒ)B¤Ìô°ÂÏ]tÉ ,ƒ²DB:…–1{S£¨\nÓ\nBñ{0ƒÑJ›)±h\"P=¨‰TÀ uC!>ï[¯l%vüM&!|ÂâSö»BüËÁ\0¦(‰•ªhúSë]É•\$%•¤Ç\\®‹´ÿ;0…lÎ0­:Ñe7F§”„oI·v[)Œ¶´–R)„®Îj†(þ9ì\"‡¶êÓ<Ì«6þÜ©\rˆÁ³«ãÑ-ãPÎF'Cå“ÆIäp•••\0Pä:\rƒd’”J³þÏ ñ‚7ŽKž5Sä50eÞá(òSŒ`ª2DF(U“úA&ÄQnÎi\$„B%mêFŽH/lêêÏµëDÞÏ¶;ß¹î³ú=¼ïuI¾¤¯×\0ðT]1Â¢)ø!ŠbŒƒxÖ2ÜZöZ\ntL‡Ü²Ã°O³b\\¦WfÅYÄ,~Û¼[É-pô·–êÕjÈ1>ONBPn®?H^èÿ j¿uYË®œVâÄ­ŽÓK¨\$Ä2œy³»i÷3Õ:¡¤¬è@!\0Ðƒ(f ˆ4@è˜:à¼;ÀÐ\\C m<!”9àÞƒ8/vh<G`ÃHo\rÀ¼:ÀÃ(t€a|1ÀÂƒX\"Ì@´•ˆ€<á„&7ÈÞÔ“Xk¨A¤R\0TySlLAæ³fAÐ+q*/D‡*Ô²Ì	šm*á¾’'M‰ÃA…™0;4nŒV:]¥,ë*vâaÚHn((€ ÉÒN`‘Aº?P\n\n)x¥„Õ™G!ZûIè¥6»Sp‚`¬m,ºF¦c”¶É/)­ù\n#ELÊÊ\rqD>·šØkñw/q\0¿ˆ‰’ýrÂ±’4Cxu4ªÀÜÃ¡v\n°:€ÒÁ\0!Ô2‡9‚ƒo\r € Á&`hv\0€1†ÀÞÃ,Ù˜à€8ÎdºÀˆ¯È×(÷ÚŒJ™-~ná¹5N‰BîJËù;¡²ÈõŽ1×#èÔ’JçôzB)e¤“Æ8¢WãŸ®”åz×£ê»>Óù•âp½Âdõ&ÊžƒÆóN™ÛpF\n‘Ýð,’&¿\rCÛEü¤xúCSéa\$ŒÌ)rºØ“I>JÆyåé\$bÑ¹§\räðœ¨P*Z›SÂ E	ª­TÃ\rÕÚÔŒ©Š&&TÂÒú‹,+	p“sð¤aª!Ë4Šä\náiÊèÉ—¢\"+WÓög©æœ~ˆü[%-î=¹õj„ë­ŠMÏ‰ˆºE¨äÏˆh©É£•'åXäª1+vU”Ç:‰g›Ú•\$• ³‡ž Õ»PzlI:N¶Z§\r³svv|&Å>ªŒQù‹%¥RèÆ³Q¸º:I^¾žµJµHh®%à!Ç:dÝùUÑDmˆhÝ\nf5–L’‹—¯=Õ¼/€¹3—R¥J©Š¡kÔ5(°.AGgVNÇ´õ\ršUªKŒi‘S¶Õ¨±+nˆÝšèÑ¤bg÷‰\"ô¢‘)³ru'ákìuÐa*0	XþÙ¬2vÌý*…•®ÔKQS-GWé¾ßiaŠØC¦-ôü,÷ÝTc~ØÊÌ'íñµ9'ÌU\"Z†•n\$û¡ŒŒÁšth““ÔÅU‚\0^[Œ7¤êÁYf“[LæÐÆÐ{Zîs	<¤øêå¨|fRPHTêDâŒÙ¬Iæ¹ÓfÐAiŽÍÖ¼æÛ˜@VÚ\$T¹‰ð¥zZœÉyÈ{tv·ir\\Ž#îu)ÅpöY+öŠÃ’§	½ü´@dÐ¹<§-4àçí]G«áÃoV­3SS³Qr±xä\nŸK#k•±¶G6l¥gv¦ŽÖ\r!)94«Š–›•™µ–¿kªcÕ¬Ü‘iÄê>æò-2ÆÝ \nænlq-VÛ}\r¯â}¥*ŒaÂ8™@þo,Ë”öúTG\\°Ñ¤¾ˆ¬KÎ§wn¼JôÀÍªJIèn `ø•+ØcªrUÆ+§	sM4ßáR—…è\rÅ\nv?F<dåK\\ŒxY.V\n¡5x€Y»hÊ­²lÞ;â±Û«JÊÐnt3›:/ÚKy“\rñ·=§[\\œnvŽÆÝÛòCu^“°!dÙ^nè’Éd\\|¶¿³´ÊwÊ·¾î¥ ’ŸFpÑ^õáÄ®é^É¼œ®rÔl¼•É½ür?z®]öîS)œs5;ð„‡ÃoŒ\\ÇÞYb@½sytKæj?XÃ\\³ÎŠ›ƒçê4Qh|urJŒ±Ô Cc¹¢T«ªV\"(¤¢lø¶¢­7’,yì`qr&ô'“#!Lêg1RF8Þ±`Ée½ºÓÏûßÎ}¯¬Ü=^ýõ½«b©”õ’ÿÝ})ÒÉÿ°Æ7wì³ÝDàþ-ÍûðßòNØOú±ÿôQFt@Î|zãî!DÖWD˜‘\n<(ÃöpŠ­H0‡àÔîð½àýC”ÖkÿHµð8ßoÂcïîî\rŒdLDÚF_ËÚ8¤b¬kodK|c¯Y¬¦O®:e¤b‹£¬Œfº¼ðj1-yCèênäRÐ<_ÐJbì7øêp¥ISÐ­	/Y	î²aêÕ¯É\nÌf¶†ýÊÑDåpœµä(ÆŒ±ÏìûPLcÛ¦õê·fFGƒíïÐ5ì¤×®ÈßÏŠL\\Ôpær|¨\r0µ'Ð\$ï€Ýjbd&ZÖf`²äX K˜ptŸænZŒÂ¯-Òä¨Èeã×q!É4úM…Â)ÄÒr«îÛQH¸¤žË±J[ÍÖ †Dò¬ÞÌ†°T±zòb˜vÍÜž\n‰	­¾×ÃRá\nì`è@Øiº\r Æ\rl²Ü´áÑ|‹&¸~C`ª\n€Œ pøBì¢‘tò#\"f¯ò8íí	‹\"¡È¶*\$ÎT\rëxt°U\rD~j\0ø™#xÕ\"[Ù±˜LÉG!EüæGŠ nÆÔð~G…h+Ze¡D6¤Î^pË„¥ÉbË=%lÖ%gÞ%mJŠ¢L;ŠÐXäÖ,å\$h\róÄÔAÍ¾¨DØµ¯ˆÝò~8Ë`²#ˆ·­å(¯”÷\$˜á’šåÒz¾²nZµòŸ*ñ\$7æ÷(’©(ÏrŸï¶k’Y…†FãV@²™”®Ž\nMîs)l˜\\®ê,:äåæ†Îø6Í@KŠNÃï¾ãeÆ?ƒ¬­šdÚ`b+Ç|‡à=ãÓ©àÜCÜ“¨Ž;Q\n2e\$Ÿ*Ùò’±#‰G­\"¼s. oƒD¿«“7*QBg0dü³C'5ð˜É°øiÊ[£æ6P‚X#~lc8";break;case"fr":$g="ÃE§1iØÞu9ˆfS‘ÐÂi7\n¢‘\0ü%ÌÂ˜(’m8Îg3IˆØeæ™¾IÄcIŒÐi†DÃ‚i6L¦Ä°Ã22@æsY¼2:JeS™\ntL”M&Óƒ‚  ˆPs±†LeCˆÈf4†ãÈ(ìi¤‚¥Æ“<BŽ\n LgSt¢gMæCLÒ7Øj“–?ƒ7Y3™ÔÙ:NŠÐxI¸Na;OB†'„™,f“¤&Bu®›L§K¡†  õØ^ó\rf“Îˆ¦ì­ôç½9¹g!uz¢c7›Ž‘¬Ã'Œíöz\\Ã/;{ºíxúkG'•®œ,shy»¤f3a}á¸ÎîB«¶6\r#›+£ª€“µc¬¦`NÂ%\nJž< LˆÒì¡*¢®¬©Šâ¼¢¹ë@*#‚•((Â7\0Pœ7£*Žˆ‘zPÝ„DÊBÐ0˜es\nŽˆKðÓB“82Œ#¨#²q£&±'	Ü\n#¢˜òç˜eCt\nhcSÀQhçF,R¢¤µtMt+\n»#s&°t|í1©¬_\r¾Ìé?»jÕìµˆb†Â»C+\0ü)Š”2O3Ú: Ò‰´\"ž¹ã“:7“Æ1Êì(ÐO@Óéó‘IFc«R6˜ØÉ½¢.2xÆ€HK`XV\$»]¶Âº\"3³gCŒ\0ÎÍ•#=û\nVl|9SÎ‹L–\$)}‚a—18ä®C#&1¶iÂô‰‰ciI	ŽËÿ¥#ª|2Ãƒj>Â˜ÇyªIò&)ë“É£(â:˜eV)Š\"c!xWƒ+´J#¤iAât’Éuº8ó›-¾\0U_Tá¡\0Å;a4ÀÝ=3æ_&Cšm^2\r°˜0ˆæ~T¨s&Ž¡á#b{™ÀÙ­3œ£¢…Ö»×e@Ï>#÷*èˆ£Æ¼ÇˆzTÂÖK8¨NéN§>`ÃF€@É=†3î‹F„W8²”4%ÍzøÂ§B%ß<à%Ô7ŽK±›ñ0årT¦È=4+×òÕW.\0Ü²JðÉyÃ¶\0Úî Ap*,|láÇ°ª/%wð¦©Ì s_6Õ·á?[t)OHXáN7AÈt*\rã^<b˜¤#=«,¤º°D óŒ¨Üƒsjêd3%Ãk<‡²©ÓÍ¨4–3'sBDc„—=ó<Î ÛæB¢]w®üÔ¥>ñƒzo%´‘’‚zÀ²Ø: ðž†ƒ*è\"\rð80tÁxw„@¸0†GŽNIpgìz°4vAx\"VAÉ­‡H2É2ó\r`ˆ5ÕvÒñ@ð†|ÌCjWp	Àª2hfS2{ÆÊ¨åçM	f¬ý³RøŠR\$j9œ¨\\Iaa,jÙY§Ó0ÐºD\0àu\ryM\0PU¡¦+æ09’ÜINJ}Pñ@°sÂf]£–g0Ï£S*ñŠ!,¡µÇ\$2@SÎy)2p0É\n—³žä\\¡^“<™J¬4ŽøÓš“W\nóß\ráäÉ£vÃ«b¬0¤‡BB&\"1ÌwLÔsœ8¬0Öµ·\nÛÈHP	áL*çZºóBÇU'\nÉ1ÜãNVOì©°°WòQ•‘t“×¬¿\"a±xs©Ç“Cþ–Û	ŽÁ@ÑK3o-z\r¾´C2µÉK+dÁŒÄâWB0TñÕîLIY-%åvbÌrbJ0rLçQ Ãò•èþL)0°ÀÆÓ j½A<'\0ª A\nÓÐˆB`E¨hÉ4Òzv([©’rsÑpÃEA½Dè¥|/£ºŒBxp‘ät+uøki!“?(9 £EzúÂy1€Ö4†D\0S†!Á§µXS©:=d5æQ×ÒaÍy(jÜüŸ´èÍƒ6g(ˆ=bð‰ŠÁ	m†Å<3xúvJŠW—¦v=®¸’Õ	ÐSYŒh3ØÔ¬óThIí³Ø«!gl™^¨–v×U„îH@\n¬«­Y¥ÓA[@rŽl&&ƒ§ˆBK¹=BL9?JsäT\0&’õçæ>ÉAÎ*‰40†j\0‘JÙÑ	*EpS„\rN‚¥ÅDä=î\$Ž`Ãbdµr>É‚€æ\nS\$z>D°Ç·€õJ=—4Hø¶ †ê‰…2\$<2ã\0i9	\"Q22dB¦Âê¤ÀW&¿B[E7—´Áy†zf¤«Õ7cÊxÜ)¼MC¥”\$á»ÂpfQPrQñÔ²´²/I¬.e‘Ñ†\"C²a0ªõM‹fÎ[=	Aé­6\0äeMÃÂŽ“ª`±Fü¯Á\0/¡s\n±–mHìFa7äF»Ðr{d¤1ÇÆÓss9€ÛˆÃJ{uKw:°Æž¦z57?hQ ž&qpe+Cªj#r«;µG§{£Ü¥s'O2Ì4v4†’ÏšW@º­XÄ³2\\Îú§HµL÷¥îÖ§KXkÃ½]>'6ÇM‘ÖºK±;E+E4þR½@S†ÓDRÎEÐÓ”dy³ØSJÀPFD2¸Ø¯íÎ¿¸e[H)j%µ_ÕÅuç°sb	Èf`:&(í8‚I:½Ã%{/£ò:Ù{d¶0ý÷˜ƒ FžØà]1Ö>Om©6”–2¯ÇL?á\\€TëÞ2 y1;åª ÄÞYËˆ„¥‚Dí‡+6@äùpe?ëEsÆÒL¹¼½Ó¼Ãp“Îº½c‚§¢£:¨J'SRZ.Ü*Íh¾9­jø(	…h]—³ÆJ§S¨¹Û‘ýx“ã\\&À9}Û1–­¢¢RJÃvÁøD”Š¢¾ÍÆ\0êÝ×ÙßÒy¤ÀvžÌ4ûnÛ­‰Jò²JùB¯åšŽó\$'Íõ>‹Ó¼m¸¾o¥÷¤LÙm¦(¶Þ‡Õ[\"°Ñ›“H'¾oÉZncíÙ÷¹iž•l{úPÒýßQä^·O¾¨öI9ü'±¬í¶7ª½ºMfí\r¢4P	éßReóþC®þËøÓ;3ïŸ˜¦¼ù\n‡ý˜âáQ%þ¿CÐ6§ÿ<X¦OîêÎýïøþLVå¯êÅïÌå®¤ø®š)J q8#Œ<Gh¯ªÛ\0ÞÛè‚o£z_§Œb£t'Ê¸s€mÃh\0òÏp6Ë,6ï:Œ'!d-)=–²Hú[\0Ì=ìf¥1†>q\$J¥€†ÿÐÅ¬^¾bÎU„\nOl,ãC¢,n¶¢ÂèÅ[\0PùoÁ\0°»n‚ÿONžÃ»2nŠö°öEX@\0˜å¢§¯xÀO|”Îd2pëî>ùNòù°ú0þ®WOM†vÇüÊQÈÝÑ\r\nt¯B†á£¢\n…™c¢H@Ââl2\$Ì&&œP²\$~×®Œü­Ozä°Ð¼åÐò£4É‘^üñDÑ|Bz|Œxîq~f#äXC¾T¬®¡Â²Znçp±ïöœä€EüN*dDbéÉJd¬y«GQeº;±¿\rNE¯ã¬gÀÓÎ‹©Õ‘¿p±Œ>öàè«‘Ðäo&øÐHïÏ‰\r‘Ñ\rídUÌQ %ðB¥ÞÇl{±b´è]ÌtÆd|Ì/Y2+!ò0_’ê’\n’\"ÌdÇ’3\n°¯\$²=%~Dñƒ Éñ§PæE„Ë’AN„±¯~Bl¶M‚»#qá’o(,»±'@?OrÉdXÂ@Ž¦%|[¢yÌÑK€ô‘ìÃ6bÎLÎ|!bFo‹A+­õ,ö'P’;#x¤¢aB¿ ƒ-&¾Í:ˆ\0r9,RòÊ…‚còù(®øbÄ\r€V¦àÒd£W0àžìÂ6ñbr'b”ÛKcS0F,’ìf1c8—*|\n€Œ pÕo»p¾,\nDûMm5\"•,ïÎ\\ þ<%¨Ç	äà”¦ìí&ëP¦‘¥¶b&œ¬`ùƒM2r.°Çà@SHe2S(8‰~% ¥ŽÊkeÚ!‰	±@†‘\"=3Âkcâ\r†øôKrE°3£>Eér;mŽ)N´!3e5bÄ;)„Ô2éóí0SW\"Êøè“ù>‹‹0+C5c°~Óm?³ëAyÔ\n!4,àÅ9ÏÎqƒ¶téJyPœÙdy¢:[¥Â\\,Ä±4(¾DÝ%åò?Ê¾¤….ÊÔZñ`¤^Â Š®*=²q\n!RKOÚ¸PÒ(mz¸’s\n@¬²êv¬Eì¥#\0\rÂŽKä=èI©FìÎ,,`Üd£¢¯T¯ËB’ïRó×KË\rç]‘¡1ô†Eô¨Á4:¿ASÒÈ@%Êá&a!máCä]ä\nG>\rÀ";break;case"gl":$g="E9jÌÊg:œãðP”\\33AADãy¸@ÃTˆó™¤Äl2ˆ\r&ØÙÈèa9\râ1¤Æh2šaBàQ<A'6˜XkY¶x‘ÊÌ’l¾c\nNFÓIÐÒd•Æ1\0”æBšM¨³	”¬Ýh,Ð@\nFC1 Ôl7AF#‚º\n7œ4uÖ&e7B\rÆƒÞb7˜f„S%6P\n\$› ×£•ÿÃ]EŽFS™ÔÙ'¨M\"‘c¦r5z;däjQ…0˜Î‡[©¤õ(°Àp°% Â\n#Ê˜þ	Ë‡)ƒA`çY•‡'7T8#DßÀÚq·NJ•ÍƒB;ºPQ\nòrÇ“;°ùTç(^e†·ÈëÉ:àð¼3„ðÒ²CI†Y²J¨æ¬¥‰r¸¤*Ä4¬‰ ¨4£oê†–Ê{Z‰[îì.¸œÌ\rªR8ƒ\nN°„Bòßˆc\n†ßˆNêQBÊ¡BÀÊ7Ä£ äa•­ûÔÝ`P§4©Ì”¥5*ƒ*÷D¸†ŠÈC\n:¾,´ªŽéÊãpÊÙ>\nRs3jP@1¢³;@ëŠc*@1Œq\nú”ÌQ8‚6£ŽÚ9­’ß‰£{¢·\rKtQ4Z\\Ü7ò&7¾«\nAÓ2òÒ!-AQ4²Lë;Ï(«#?3ÌÉBÎÍŒñ”N!>ãŠªˆ4š¸Ì¡Žsk¢À<‚dˆ¦Y¨ª€ÙÔ\n‚n±SÂñ@€R_LÉ\\à’\$¦Ý°ìH+Ív°¦(‰Œ€Ü1³tåÌ0Ž³|P©Ó€0ŒL \\»L­\"4Ñ‰H…/ªsUàøKr8Ž£,œ!³t)‹7è6œáµ0áòH Ô5P|N\$¤‹ÊNÊˆ£ÂK—ÝxÊSJÝK£“’LrN=ŠÉÈ5Y=7ìû*ÑÚïìá3(˜(Lì#Î[ƒtQŽ#µÓúñÙj©¥Áõ˜X‘S¶`Â¡\$*ý2À*µ˜7_#x\"kNµ²@îC°i°&Ç®S»>Cµ%{eLmûŒ’*\rã^Ø!Šb²ÈÙ\rÁ\0Š7r¥lÁ´Ó	^½’ªiXÌ¼¬ôn7¦š‚^7¾é\nƒ#µœÞ°#ŸYuÆT/`vz¦Ä>C3èù63k‡Áô0F—,Ëk«NîÏ#‡¥_ðëÌ‡Œ(ÐÍŒÁèD4ƒ à9‡Ax^;ýte·©Arò3…ìêÿ°ê*„IºPÃ(t|A|PÖó,\nm³À^Añ*qa1­b¬kAóM¨t¤”³ª³*µ?®Ñª¡`Ê›aœeèµ€£\r`@ù\0;UºYù0‹œþ­‡ó	A\0P	@‚†öfŒ’Ð X›“xTÐ'dxF0ŽÌy(B%!÷VXA{¿yç¡è†Èšw\\¨¡råA­àðòŠy…+È‘A1BP{,´þ‡ÔSPÒˆ/ã’•ð½‰	V&‰Ôò,`\rI±&ôÝ•úÕXjË‚A2?R³´~%è:J‡~‘C¤\n<)…FNZÊÖVçUd9”töM¹*BÎ‘ßÈx@ð\"›6A¤;²BÒÉi=\nÉ gZ¢1G4ü ’ŒWAï	Œ†YšHöN‰à s¦#Hˆwi&.­¢M³&”KÊë0ØÓCàä_RHx\rá´&ó^lŠQ¦	À6ÄTžJµ&Á!…@ªB`IA)D ž\0U\n …@‹BB	6A<)*)E¨ÀD¡0\"ÑêE*çvá°:†Òú¥é‰T\n ¤™A1iÐêxp™ŠÐ+N²RIXhfNIY 6bôuÜÚ¹1­Lñ6U ¦q(/EÒ¯ÏI]ÝXrí¼Ç°¶vÃ›ÓÔ<éÈÅ-êÖwH\n;Ï\0þ³£LÏä‹NÉV§°A[œúçg¬Ô2›†Ôakó!O©%#¢²¨Rmhž¦—¦\0Hñº:AX¥Cb,UÒ˜	eÊŠ™w\r!û¶§Q\r.´âš²ã\rö¤«#ÊŒÚÉ1áb}ÏÕ}2Í-Á‰Tƒâ+BB¢éKUo“´¬]Cª2ª®Â5ZìHÑ³0l|ÂÆ‡,æ\0PVI†þè›ÕÔ•é¥67ãF\\g*ú’¸ä\\Vßk4±Øejäîv\"¤ÙFG6QÏKa=ÍøDŠ&½)_Š³‚Óæ=	J¡†•r¥\njƒõx)›S†‚3¨aèå|£f}=ê'E6.+›„¨êÖðr)õÛ™#<IÔø àRª‡ImÈ¨&ƒ\$”ÊgLú	|Ä†ÆáòI°ªVàÅ\0œŸò–T4‡+ª²C[Ìqµ¤@Òí×j5çû1‚háÚ^PEe‹:¼´áŽ«¤ˆÙ/<æ{”îÎkvú4h(ÝL©êZã3™	Ó\nÊÙG:ð)—0U4É]„ÁÌÂø]˜É£teRw%4eB2\nÓL†wêð@á=µf:Bk ³¯NÏDŸ\"ÊúÍ²•OÓú9°ã¤Nb/Kù…—m‚·Žz”QUªð÷c¬öwx8m÷1‰42&M\"ne4ÅšìŠ»í½Ø•Ñ{«®äÞ®ÈÃoˆ¬f÷Ý«ºPÆœïu, •©¨våYˆ±rkdliä¢KªêŸ<v—Vi&˜0èƒÅ	uÞáeæü>R«É9&µ\"_ã8„¤ýå¦56ÛkãB\rËN£†Z_UwžÛöA‘×oŠú%à=·Ø®ú[\"é¶Lšo®‡Ô¬OT±†âÄY&KÐv÷+bmºõ\rÜg/'UQL —pxû\$V0„äÊ„>çÀH P…8¾æ\\™–«¡ÃÐ}Ú=÷‚	ÞÑ·~Ìï5DˆÚk¿aß˜4ÏbûÚ¯×Qò˜?ËØÏ5<ü«øÂÐ ´ ßÍâN¬/YM,ŽøÚ!A2n•ÄÈòSˆÛc(p ÿ\$É¨E¹÷‘±&‚SYñd¡VEŽ½>\n¼Û´la¾ÇÞà@åÜ§¡¹4ÝœLf\nû¼\r³LÇáz·Lþ2ˆíe¨¨âNbüí½{ýõÝÙY´â½}ƒ·`Lo0íÊì@ÊÿçvìÐ	\0Ðb@‹\0Î¶%0k¥ää#®Ö&¬F,N%ÄH€#pMk’ÿÜ³\0ÞyMàÝ%jäâk2‹\rÄþûMëó\0CpV iÍÈ7eÐ\$Æ¢RÅb»Ð€4ðKÌb¨bd)Šá†>£>Ûèêâ»(²nÐa\nŒ©\níòýe&ê0ªb¯¡«ô7Ã9P­f|þ-Ü÷àÞæ0Ánæ0ÓDìCg¬Ãbó°\$\"„ÃEtúï<ÝÐûñCpÂPüÂ‰ã±!Œ8\n†,¨P#	/ Û¯ú‹Ê¯Q>3§W.ÅB&€KB`ŒXï„`\"°L2¤t>«ŽÈ0zØ§NÍâ†)ÃBÉqr5§N¯FÎžçCpæØLbNK¦é1”Ýîñ±0NoLÒð.žH@Ø`ÆràÆˆ¦‰Ä©È0AÍ²C¤Ô\"†f6‰ÃpNÊ·\"À\n ¨ÀZ5KÊÒèÐl±†·È`Râ.#\$*Š‚BhKºâÎßja+| ÄòV„v1Ä¦ÞÀ@rì>¶O*æ‰1‡Ëö…BC	±iéN¦ã03â‚w€äW#­&ŽÈ¸²`¸,Á…È€#®Ú¢Žå*ö‰/º¥µªôÞÃû(¨¬ˆÄ2’vR–ºOò2…)Mú7ÈÚ©\"œ)ŒA*U*R²1\$“(¤Xþä’W‹„O‡Ir¨«î¨jŠZŽ²ëêˆçjŒL\"Bø.j ¬QÀÞŠb>ÀMbÉ«Ò½gEC¾6£nÄò€&C+‹À6ã*\$¸6Ã]H.‘h±2³\"ÚòŽ¬\"T_(2²+\0I3Jî²3oòþó¹&ìró7äë\rh´I ‚Êc¢7â(ZæZlŽhW@‘À";break;case"hu":$g="B4žŽ†ó˜€Äe7Œ£ðP”\\33\r¬5	ÌÞd8NF0Q8Êm¦C|€Ìe6kiL Ò 0ˆÑCT¤\\\n ÄŒ'ƒLMBl4Áfj¬MRr2X)\no9¡ÍD©±†©:OF“\\Ü@\nFC1 Ôl7AL5å æ\nL”“LtÒn1ÁeJ°Ã7)ž£F³)Î\n!aOL5ÑÊíx‚›L¦sT¢ÃV\r–*DAq2QÇ™¹dÞu'c-LÞ 8'cI³'…ëÎ§!†³!4Pd&é–nM„J•6þA»•«ÁpØ<W>do6N›è¡ÌÂ\n)êîæpW7­Ñc\r[è6+Ž*JÎUn\\tó(;‰1º(6?Oàôÿ'ïZ`AJ–‚cJ²92¬3ž:)é’h6¢²­« PŒ”5Oëþa–izTVŽªÞÀ¢ƒh\"\"‰@ô\r##:ð1e³Xò #d·‰f=7ÀPŽ2¤ªKdï‰Š¶œ7£ ÄŠ+q[95Œt>6D0„	IC\rJ\rô¦PÊ¬BP«Žˆ\"¯£=A\0åB Â9;cbJðƒê5¥Lk¾'*ì”‰–i æÌ/nôòŠ/©GRë¾a“CRB««0\0J2 É èÔu*‰SÕ38Ô:B[fÿÀTŒ<:ÃXÆ4ÄƒZp3Œê@Ï¢µŠãG¾³8ä4;\0Þ9IŠ7.l[ê¼¥c[7Fã]ž«5„Y2mJÃ<¦)bÖ6Õ€Œ:Ã¶â„˜Æ0Ï\0¢&6Ýð¼§ª6·ÊäT©¥wdÜÉí2NtË)JŽ.‚S(«¾)ªø\"%SÍ4ðc©Œ4¤YŒ^5‰Ìò­ë’BƒdÚ>ƒ8Ò:£}|\$£…ž½ÜxŠ<gÓå&¾/ÐÍA”\rùU\$0Ê9jƒ’8 ŽÕ¤\$îIKÓ5ÛZ7ŒÃ2€…&õ“é6¾¢ Þ×àA\\c¨Æ1°£˜ÍxC#~l7abB9)€Î0®áT«¾2…˜R›˜dL°«´u\nb˜¤#&ÐÞ7cfZØ6•#Ô9&#ëu>c}\n<\nåŽA»[¢ã×XÃˆ©0ÈÊ5\"“çÊ¶Îtç: ïIt5v;ùß£˜æ;Ùõ Ë¢\r*@ÉÔ‰ˆÐ¤ÁèD4ƒ à9‡Ax^;þv¡Æ¡C]gŒázÿƒÁYp¥Ñ‚ðDpÃg)/¨/©Uró<Ùˆ‡@xÃ>AdH¤¬ÅH@ÉÑ„qE(Œ‡&ârP¨mx/„ÊÈPkE¼À@Ü‚ˆD\n…\\ì•£Xï	By¡¸4œc^]â#HD&àœ]âA“p©¬£™°ègTø¡g.¾Ð@@P‰(>&`PSPs#îQË5‘RæL°n&	EB’vOOû+Fu1Å ÞR¢¢|.N¡D.GY9Ÿ0F:¤MÂI&œDjkŠTjZ‡\0á€âL)JÁÈ’‚\0‚hK¹8l1§èÕ'(p0(›Ÿt†´2&!@'…0©Íð!sŠ<[-£’Õ#²˜\n,«”ƒ”v–nÿHi“È9ÿ*ÌˆŠ»†À¼r7iù¨dHS_dÈÚšÓhLB0TŒKáRÖŠRq2”„‚5%‚5\$œ\nŽA­x0¤AÍaÏRŒ ¨öDrÖñŽ%BØù\"‚y†OÁÀ©†SXÌWñF{*ŸPŠÒçT`8+µz‹Ã(f+À¥M Ù()“2¡œ<­bÞê— tNqa”²¦ ÈÒÙ'>€(&S¨›ÉIÇaŒ–÷*åãyÚŽ3-©2žÔX©%1M*¾™«Ik\$ýZ²58§š…hM\rL#€òðÍó:AXÿ3,ÕðÃ+ÅÛGòARÉ[D’8¦8(À,ao1-¬ÖY<èu\n´ò„”Ü|ZAWÁL€†PÉ*)+'€Ë2²*…d-qµÌU§šËÚ©#ª\$¤´u+F(Ðo\0(\$­G¿î%Æ}FºU\"wë¨rNë!ÃÃÊÈ.s\\	4ÍÐ@Ù*-GeaPÙ,4žo,\nK™:KÄ¤‚A³7Ëy§+{WrÏ'ÈÈ&]ëÐEFˆ<±4<ˆ*ÂÎöThvÊïŠÑœÆØ5ÌÕªtH:ùU ¼¯ª’,•B¤Ãø…z¬ú™ð±Z=ÍÝç7–e5J¾i8,<³ÏIG.åeö‚àSp©GÂç-zâÓ‹Ê¾1ÆaÓ”¼EŽ&n;)(SâŒ…Š²&,0˜º9cPq aÆÙ>õå”É¼O2\0ƒ/c,ÀfŽæ–NÀÈ|=‘ˆ.Å4ø›×ÁS’³}L'³æRrÞ¹2%N¨œ»LT4MJÑ‡XÛfÅðHM®L·F%ägP\0W¡ˆéÏëÖTPÁLCÚE»ž~ƒNÈç*90ÉµiÎôº5:ÆÑ&w/òÖ–ôøÑCéU„³Ú0GI+˜F·£‰ÂŸ+¡OÑBV\rb™ûR†=¥!¶l>ÒT'µ1˜ÚÍ´KÚ•3î°7Ö[tNwKIbíÔ›n…(ÒY;Ç%xöß4“ü*OË9 f8 —æÙ ƒa’QE*fœ£¯‚‚{¥]º5‰X“¡(¤	óŠ+ËÆø.Á”’ÓU~r\nu.åÌ<BùZÉKM;hvâòÅ?IÔ•tTpiœ\nmß\0'	Ö¸±JçX·fî)ýÞ†NŒË‘\$[ƒ”ÕÊÓ¾^@¶ßW¢ÕÛ˜£©¥géç|²–FÇ-Îë¬›Ÿ´1î±¾ÝÇmR×cz;ƒÃA˜?7û‰ëS'ÞEhvÉ¸ß2ã¬Ï@O|q,3Àx,Å“±/…6^*x®ýÞ;×ƒÌ˜çÉãÇqvÍ½ ½#µÛ¯A@ç£ëä°ÜK¹è®þyi{ë­;‚ ³î™ÐÈŽ¨Û:\rÁ†]:'H^ŒÂ)Qâëâ<jyC[‚&>ðT¡ða—+¸ä¶oŸ\\è|×Ê¡4ØþRº/Ãûª€­DCZa\0ô>§ØÚ{¼Ný|'õûW\\€¸L½ÌRBrßåõnêB°xªÆÝ­Ï\0«x)NÞö¬Ó&”+˜iÃ¾ê¬ŽÀŽÕÍÞN°:¶°õ°8ÀpImøÀB?æª£¿<ì¦šd`–+K`ÏÈ<¯´_#\$ã*§Ê\"‘:B¶Ú%ï°>éP¿íjîLNÐåöø]åräP\n yB÷0¶›…%tãÐ©&F ÙÐÁ4¯jHƒ”Nã–%î*ëFYæš=	€§Påð¬î1\0=æõ°þ”‘ðÄcqOfìÍ‚ç–ÜêLùQe1,ù&_æ\rÆFÞÒ•PûçÕ­ë‘T•PTwÉë×ÆGkÌ½qDek¶Fðd¶­¢©DºÁDI­ÞÑD¸Á\$…m‡qb&ãöc6¶,MàÜ‡Hx>ê}\r”5n,X¥RÊì¯\$©´ÛâþÄ‘È;1ÌxÑÒ3*Í‘Ê`‘Ï-4m,tŠV%m”ÈèäTlOƒïØCÌóÌ|U-·!\r!LI!¯8ÊMøe\r€V•®(†GFœÊl”r\"B.\r Ìp¤&àŒ­|b”z'\n ¨ÀZ>/G,ìóiìgãÿoqF{'‚'Òu(\$ù'«t#Â@\$BH\$°kB_^&-âF#Ë\$rJ¿¤Ö.DMJÙÃd¼'é¯+ãª=‚šOÊiÉ\0000HåáR†Ql\"¢(e\"n;z@;j˜\ræ <rþœ¦r)	*7Å6Ñþ¬GÄÀ…×í^Þ\rî&*”0Ãˆ¨ñä·K@/­zF#6‡®¦ˆÓ6\\dF\"|\"Í±3Mî×±O3Cˆ6Â\n5H~ ç6¸N&q£|mû3¬‰b²WÐn-ÏÄ‹38 ÖZ%ò	¨þÄÀš™«zæ§¾\\Í”beêH…¢¶t£cÊ7Â4\r Â(r\0¬ˆ î¯`Â`êg\nY6ó¾ #þª?°Ôy°‹ ”5e ÀàÙ2Ó¯?+3BQƒÑ4â¸êÎŽZ\"Ö44®\"ª¨º‚‘;‚tAó½<äÍ“ÈYÑ¯+‚²\r±ºîæ üçFÁ\"Ã\"Ök\0à@Ú\r ";break;case"id":$g="A7\"É„Öi7„¢á™˜@s\r0#X‚p0Ó)¸ÎuÌ&ˆÊr5˜NbàQÊs0œ¤²yIÎaE&“Ô\"Rn`FÉ€K61N†dºQ*\"piÑÐÊm:Ïå’Á€Äd3\rFÃqÀäk7œÍñàQ¼äi9Â&È‰¦…¥É’Â)’”\n)Ü\r'	ýÖï%˜Ü%…“yÔ@h0Œ¢q¼@p·&Ã)ž_QËN*µDÑp¨˜LYÉfÛ„ë¶iÅFNu›G#Æ[ñÓ‘„ð~Ö@¸Üp›X,æ‰'\rÄ¶G*0‚ˆò4ã£1éˆ#æîï\"çE˜1ÆSYÎ¬n¸Ñ¥rÙ¥@æuI.òÂTwP8#£;Æì :Rˆ§æÚ(ºõ0¢Þ¶HBN	LJ<ïã(ÞŽBCH\"#2–98or®À\$ì”P(@0~€ÄBTÔ4ŽÈš•+ Tvû¢°\0ä6§è(3cJIBd”Œ¡ð’²õE¨Ä¢©m{6ïJÒÃT2®‚(Ý±ê…‰*”ìÉd”É\0Î¸BÎ93±¸!± Rü§¨„Š³2–„·C¬Ì„ÉÃjþ('TÛ=«ªòÈèB4µ+Ð@Î#ÉHá#¤èB–’\nbˆ˜	hèÂ4§á\0ž:CèÊàJË²¸¸´\$®’JîKh¥RêH9j»²!²…‘e0LˆÄXR` Ì³ixÊ	-zÜ¯háoÙ’‚ó0Wºm&\nv“²8I#@6B@SÇ&,˜Þ3ÓpÜ2¥•hÙfÅ ÞËHƒpò\$¸Æ1¥ã˜Ì:”øÞ3¡˜X¨ŽXXÂ‘!BÍ4pÜ:ªÁ@æ¥˜5’ b˜¤#dCpì¹¢ap@%+xÛ†(‰ÈÌ·+pä¦¤ì‚ãŠÙ8bÖ¥ôã ¤ãH|·XÈ’?)d~«&HÀæ9ŽëtÒ2„ð2gAâ4O0z\r è8aÐ^Žûè\\¡dÉ8\\·áz;Ãzâµ…áR93Ã¦æ/µiÀÖÖèàÎ7C xŒ!óäŒ£ Ð7Í5¥däHÔ…„££¢X\"+3“j9ê,zbÜ(#Z¤3/oN*H£l9wó³pÅO…8(	‚nœ¯Ã'jœ…\n8R¨ªh®Áä®É`‚ö³èFo7mÀê6¨‰\$Ì¨Hk‰õúc:tž'Î5³*YÓ¤	äV\nÄ£’À’CƒÉ'I¤Ê‘§p@M1¨OÄ:’ò4ƒ’28déˆè a°´™7LØû\0Ddd…\0žÂ£Ç(Œ™“ŽÎÔR	Sˆä ”³‰462èðBÐƒ0i#ð\0øÀUíƒµ4P¡Ôý•HL\$Î4@Â0TzDá4œEÆˆÑJ‹peŸ»€ä‹˜	 jq–ÂÐQ O	À€*…\0ˆB EQè@Š,A80­8î‡ä\\PG\"60ˆ‚\rÊH¶öðˆ‚ eÁ…Š§ÏUbv\$ÅÕ~CÝ*`\$l(ìÈÅ`DTQ ;çPˆ#e««çg'Z_”²fšQ›'FB^ÄÚ’–¢8…„µf‘¥ƒ4¦2WLÐ­/]Á\nÆ%/—@¦RÏTâ\$ñ5¼º0É\nìy§Åè=\"Ž‘áw	]£ä‹	O!!,7Ç„D')ÃKl!¡ó¨U‘aœeX2K³ª»VTÁg¦„%¦‚‚Ô©„µnä±ezš¤áMõ’dPÎÄ\0WÄŽVÊð×£¡q-‰ 1¦z;+×…=A ÚºôŠBN“KN\rŒ€ ¤Ê‚0-ç¸4 èV±+®F'qVóÎd\nC‘ ‚›ªTÐx ¬ói[„¸*[æ<É\rŒm’&SPØLÁ¡–—bÐš§a‰Œ¬“¥\$ÐJÕg¬µÂ—W+yÃu‰C6 ï(ØÕC¹\n¤„¢Òâj©òr\$U‚c“Ru%U8vf&XFô.S­4nEÀ€;†PÅ?ì›–6¶x•cjJ¯ë\$˜>Ó¼t¥¡©£ÊÆâUó¼ª¨a ¦ø§ÐaKìjwaå¦;ÒQ»/Ó0ÜË¼§,má'QÝµÕÁyÊ=q½Eøä˜;Bõéis,éÞZ@˜/•û/ÁÕ_²ÙË€fQ~W\$d–HÅ¦¹Ë¡§R--Þ€ÂƒŽò	Ò2u‘É‰RN˜:Iá¼G…i,ï=¸\"ñœHÏä˜&“)Z	HÁ\0(6p3‚™\"‘&\$Ø wë¤ù›W\\ÀÈ˜´‘&58y!M]K!Þp[²ÉS¬__&¢Pšù%bQ…§’ïæGÌÙVd_<±5MjîË¸âB–ÈMO*E\0«>ÛÖ‚XÅs(É¦¶jñ+Ø.9éçÒŠ_‚3uÓBIëÍ«Ê·èæPiÓöÍŽþŸ=;§ã®¢ÊÙ/Ç=NNsÍø2‘A£ï+‰:!ôÄÚ™ÌnJºI à€5c(xs_±0Ê,î‚ëmxP5ó¼#Š97l:UŠÎ>\\LÁ©]mvMÚ¬§€àßö*L!²\\WôÔ¢ÈúIGWƒAÖZ¶Vïwªñmä>{Ã<k,²Sf­ÊÞÄ&©¤ƒµ–ú™Ê–ªpG‹³¯á¹²Ç`¬áJ\n*Bà×G0Õª§ÁÑÓUôF¯\" ¦éK²£ªJžÝeœ˜9-Nª‡ð®ež÷žuÑœÓ|­ÿÆ	##ÉÑcMøJõ‘EY‹iÉ:t£1ÑÔT—\rÆ¡+íS½(SÄÖçº“#õ‡K¿¸¿^ëY·+ïN‹;úÏ\"ÄÒõ.©Öò5þ?½L¤wÑv/tí]å[ÓÃÍu,Î\r4÷œã3á8w¨\r3ôï‚ºLüKZw8OòÈÂæ`H|Ç‰âõ\$4ÀUÍÎN æ\$5Ö~Ÿ8xM¿±!2)Šê­\nYt	ÈïWWc\\4=zÓd°!¡ Ø\náƒ\"¥®+JxLÂ@iÌ,¥ÀŒ¶HÙ¸ëLÖ>@ŒAÀ #¡è‘âY]t.²ŒÅ¸–{BDÅvšñS« &ý§S¥’t7…üížEb‡ÅüCz°cÔ\"£t#é^êcžf«Ü:Bˆa l4äP	€Þ(MËÈª\r¢Ü2eØL	r\$ŠäÜÍd-ÔT+UŽ^.ºðR¿\0áëŠ!¿.àæÐ`b®\ràà*Dˆ\r‹îÀí²K.OkX‡ŠÄgì GÆ¢à…\"RdHX‰4ÇŒfÆ¢!\n\"%Å‚:Ê¦ŸÀ.ÄÜ¡dÒ\nÀÒ îIÆ§§Öpz8‚æ0¢\0g’T‚Þ=¤Ø\$ä®VD N@Ì2SBF¹ƒ&Ìl¸9î	\\6&p! †O22i*T¦qH½°ÎìD0(D.… ¯äwÃlÞB*";break;case"it":$g="S4˜Î§#xü%ÌÂ˜(†a9@L&Ó)¸èo¦Á˜Òl2ˆ\rÆóp‚\"u9˜Í1qp(˜aŒšb†ã™¦I!6˜NsYÌf7ÈXj\0”æB–’c‘éŠH 2ÍNgC,¶Z0Œ†cA¨Øn8‚ŽÇS|\\oˆ™Í&ã€NŒ&(Ü‚ZM7™\r1ã„Išb2“M¾¢s:Û\$Æ“9†ZY7Dƒ	ÚC#\"'j	ž¢ ‹ˆ§!†© 4NzØS¶¯ÛfÊ  1É–³®Ï+k3ëö3	\r¬ç‚ÕJ´R[iÒ\n\"›&V»ñ3½NwîÔÃ0)µ¤Òln4ÑNtš]¡RÓÚ˜j	iPÒpôÆ£ÞÜfÚ6ã«Êª-ãª(ˆB#LâCfç8@ÊN¤)° Ž2è¤ êµP\"\0©Œ©Ë^Á2Ã“³Âb‚t9Žë@ÉÁcu	ˆ0*Ý¯£ÓÏ	‰ƒzÔ’Žr7Gp˜¬Õ7®ô=<\r3%±hÓ'¦\n˜åˆü¼/Kâ`Î*rúò½¢Mbèñ/ÂrÈ;#ÜKè8ÈCÊ¨„³¼òª!¢œå\$‹ðŒÄÐ@ Œã8ä2±´L&!°KêÎ±Ãˆë	‰ã’ô¶KÒRŠ£H´€éÀ‚c3ÂRÃ@òN¢\r\$PïÔ¦¥#Ü‡CµÐÈŒ\nbˆ™EÀHÂÖ1ÑéšÌ0³L+¶ÚÌÓÒÒ®Q³ŽLBú†p”L!ÑòÍ»¶w{j.q¸(3lë\n\$£‚Ð¹:ä9^—\0Ê˜Z«ªýtZÐ˜§s/Î:AD¯Ãcœ2’ ã0ÌéI	hŠÂB ÞŒHãË–Äc3¨àÙ!8Ác@9cÃµ„„ú\r­â¨aKê7h¨@!ŠbŒ§\$­“¥_…Á0µ³‰€Ø˜\"6èÒò1ÎË¹*”3.ÁmÂŸdIØÞ–ÐIÜn#\$0åCt‹\"C’j˜¤S~Çl'J äÌÅñ<¨Å2i!â`4Qã0z\r è8aÐ^Žü¨]´æ²@ä-8^ŠóãÃÊš¤xDÖLðéÅ‹ãž7\ra}x	”ã|õfÈÐ¼´àÃžæ#£3#WQÚZ&\$.>Ì’?#,àÌ0ìB¹£é[LªÞ½Îô¤r%ãî2vï§ÏBò\"½#Ð\n@ †4wºäÓ…\n0R˜ÞÞ€ÄPIjúT¨ù+4@@ÑƒI>¤8ƒpDÏÃI\nŽ™RÐõÐ2;aç¨¤°òdIŠw\$oò'pèjMZSGŽ@Úds0R³àÆÉÎ9¨5MðÏ@°ßOÊR€á¤˜\0žÂ£I\nP\$¨öbémË*\r´òb£Üpi6Åé¯â<Òò’ƒŒ2ÒJhÙ;iÁÿ†p@°Ba@)­4`¨üÕó1^+ÍâÂÔ:CA‚€&¤ßžöô’\0Q¹MŠÌ'„à@B€D!P\"€© E	Jô:HdQ\$TÀŠ7ÀäDÐÉÏ>ËÈ—*µZ”\$°pQ&\"PÌÛ˜T-ªm^Õ”¬ThiUg¤æœð¦¼“+ô5ó!¬ ê¢XmMòÑ£x\rB4Z³X2ØnÛ\"ƒ<éFm­uôLsvŠ¥k*nLÉl\$Ôb!ùÒ5ïÝ:…cû‰	FNò:>ÃÌMßƒò=K‘#BnH¥(Ê.`–…@Ã|‹Gìd¹—V•Ôšé’\0ÆU™Ñ›Ë•oN‚Ÿ6¼þ/Tq5´õxÉÃr 0è•-„Î˜™ˆn§†)¹Ô“%Ÿû[‹IÕl¦*)3ƒqj#°\\ÆVzXÉi3È©FU\n¤„i‚%Å¬5¼pä‘ê<K1(Ó'PŒZ	Éf\nFDÝÈ€ŠeŸ*\n7d9pš\$Xt‘‰É!6VË° à‚Ä–ÂŸ¹iBKÔ2(Äxbµ‡cÁ<%²¦gcªz0è,\0–/eC­—_ÖM²ÀAg,õ‘1ˆJÐ½bvöÉhN0æ%¯Kå|F\r)ïRÔ4¨òZÌìÕÂŒj.¿FBaÛµ†	†Jå_·=±1crë5xÄ;ÒÔeA#1IÏrû/ã‘!TO`éOÂZ‚ˆáÇH¤pÊ¯Ò)¾4.ÓÜ»ã>áûô*Óä´–hÉçKØ*ˆEÚŠu\n”ä˜ZššRëŽN³ºøM×3[X³¶N‘®Š‡)¾Ýñ\"t(Õý¶î(í…ÄÇP¹\\sƒm?¡ÍWSR`²Þ=“Ò•~¦ÀpÂJ-¥ ô™ Ê~‹Y+0¨¹|%yÇY—Y7rÏ%’á˜²ñ7ž¹MS²zr\nÒ/³ŒŸuPˆ\r!§(É\\RÀ)Ì³jv>³¥‰Éf„`&,‘è†ï^´)¸\\:'Hh¼â¶±E|_s­€šöT4><nì–é,“¨ôþ—LZ\$!ÈDM\\Ðk”¹Ûcm«ã;xôë\në¬â%qm…Ù*ÃŠ©µÕ¸V•P3Õ`Ëuußjµ½GÕPAUÙ¦BÎ{Oflæ=’-!.»9íæÔeLmÈÑS:–©é§võŸK'!Š\09—ìmÎQ2Ç¾ýxZéãÍd±ZPÓ“ÀôwQlŒ\\\n Ÿ×õƒtÎ›P2íj¯M-Xo©1e8â&ÿËõ]˜UDôðU@•ÆªÈd·”M£¸yn¦Ü3ž!¦S¡^\r;Åì[œ1Íµ¦k¾+Ü'­·¤4ÑÄç¥üô(Ei¬¤¶Í0¡Ž7¨g<nµûaóBºk-AJòV¾ëÜ«m’ÞÄ’9–Jè¤Á’q7ÚçˆodMªSô’:¢(ß43]Ë+¥é †H%å\"¢xWÄyw`jªÃ¥ÓâÃ/&“p÷ä»·—S~#:¯\"|~ñ±þ<Huý}w¾X?—\0ÿúD“Ú[¿p7~{ÕzKèÛzæžÎàKl²h}º\0÷(L*U¨)Î´ÏÅ1•olç/“ñ›ßCö<ý•üºÅîþ„–”äGô°«é~F‰ûþ¿Ê~/Kô‰hH'HIötZ‘ªWN\nY™÷¹çÛÑÄV—úÏ#=\"Öÿ\"ÊÎ€†§üff`\"âä-Ã\0Eâ]â80fJŸˆº>\rŽØ@NkÔ´¢”1j×ƒr<ÄH¨00NE”\r\"ZÀÂ= †9ÀØhn *Ê1–—FN‰ÄŠoo(FO#ÜšB¦O.\n ¨ÀZ \rÃrSàÎ¸íŠ&d~ËHºK\$8¨ö_\r”PFlë0_Œ~¥ÂJ\$æ®Z\"ö«0iìÈò†­\nL¬šÓ\nÍ\räÄ‰ÈV*b0hÈ.%¤\\Hbýbd: Þm#€%ÑNì‚‰ÅÐP0B1JØ,Ç˜MJ<!‚H#Ê4àæ,bÊÙQ\"É¥q­æ{b™‘8\$1<Ü£1ë²?KGÕ‘R~íì¸È¢@5c(ßbègÈ~7fjL®ÇÊj}nj÷E*'ê|Ê)Zª)^œ„êUQœÐàò›CÒ:BèBëfB`š{b\"JÑ€Nä– îÍb@É,‹1~–\0‚-„œ–\n0\"ÂÉÈ–Ìîê\nq4^‰Ž\ré’f	Šõ‰Ê`QHW‘Xé#N®#‘L®ˆqÌðÏ6–\0 ˆƒÐ©À‚UèöëÊŸ,l@	\0t	 š@¦\n`";break;case"ja":$g="åW'Ý\nc—ƒ/ É˜2-Þ¼O‚„¢á™˜@çS¤N4UÆ‚PÇÔ‘Å\\}%QGqÈB\r[^G0e<	ƒ&ãé0S™8€r©&±Øü…#AÉPKY}t œÈQº\$‚›Iƒ+ÜªÔÃ•8¨ƒB0¤é<†Ìh5\rÇSRº9P¨:¢aKI ÐT\n\n>ŠœYgn4\nê·T:Shiê1zR‚ xL&ˆ±Îg`¢É¼ê 4NÆQ¸Þ 8'cI°Êg2œÄMyÔàd05‡CA§tt0˜¶ÂàS‘~­¦9¼þ†¦s­“=”Ð(§ª4›Œý>…rt/×®TR‚ò‰E:S*LÒ¡\0èU'¹«Õû(T#d	ƒHûE ÅqÌE”')xZœÅJA—©1Èþ Å®ƒè1@ƒ#Ð 9ªˆò¬£°D	séIUº*òÀƒ±\$Ê¨S/äl˜ ÑÎ_')<E§¤©`­’éé.RœÄËsÄ<r‘J8H*ìAU*‰¹•dB8WÇ*Ô†EÂ>U#‰ÂŽR‰8#åÊ8D*„<r_£ˆa˜EÉÎTÇIBý#êdÿ+ÆñÉlr’j¨HÎ³þA‘3Ì÷>Ç%Ê¨—E‚®Y§¥pîäÔ£•Eu\"9=Qd~ž”äYÒ@=Èá&Ž±É\$ ‘'16Z/´»¬%u‰cYI@BœäÙ]ÂäáÌDÈJê¼ðt%ÁÌE?GI,QÒ0ÉÔ„ðs„áÎZNiv]œÄ!4B´\\Ãw“\$m¤ÊJ…µîB'²Œ§*Á'I*[ÄÉJÛ PŒ:ƒcvä¶Á\0æ1Œ#s¼(‰ˆùfŽÈæWL]äFs’²åÕ7ûœòºU6AÏÔìAXe%‹cÍ_Ö~‘JZZbA“ÏKÖö×Õxž•KånÔhá;KÏúÀAL”Å²Y8–¥VÍ·°u¥>hî’êYeßrÜïÐØ:M#L#“X7ŒÃ0ØðŒ®eZÕéI`b Þ×¹(ò£pæ:Œcr9ŒØà@6\rã;Â9…ØåÏŒ#8Âð„ÀKo¯êá˜Ræ…Ás°ÑUb˜¤#Nó.\\ÆG)\rƒœÆ„qœÃÑ\r†ru\nPó)]¥Hþ(A¨y]šŸúü©=H+òÕêGä%Ö¨´:Ïy>ˆX`M!Ìá#aÃ˜w\ráÉo†PðKŠ€¸ÀÂjPf ˆ4@è˜:à¼;ÂÐ\\C#½\rÁ”9è&Áxe\rÐä<'DC|;L|9€éÂùÊd¡¬à’C¶\r°è:À^Aò#Lâõ¾o\"Øa\rf°4‡Ca\rì3\rÁÑÉ>·Ú Ÿ{ñ\$ÄøDžÄì«ëßC¢ÀwÆOPbBHt!CAŒñ ,…˜ž\0JA¨=¡1zCÄAQ!äÍ÷Ø—Þˆ‚%2€A–\$Laú«‘fâ¼w’A“a.rŠŒ¼Šä|(ò\n¼²|P\nDÈiU0»Ux’ØÐ&#B÷DûÔ*+¢QDB«,Qê@‡¨‚I.2•¾k£0s‡Q|â›§C©¹ŒÁ˜9ðÚ1r8âC @Ýdê7s¶›ƒ˜xS\nŒùZ§ÄTPI¨&â†^¥nê\$¦ˆ!tI‡(°h†=ÁÎ\\Z V£ÚA0h”4Ê>À‡iÙ ntD7Ãià€)²€@©¬6|#@ ârß\r1B	ÆhËQç¬÷AÈÕÃRò)°ém©Q\n)×“¢é„ðœ¨P*P[\0D¡0\"×Rò•T‚’—\"\ndXò™Ø“€çÖ–Ë`(f,r3`Â'Šheé¹—§†¬{sÅG4\\\$Cä)\n–´’¹åKìGÛÃANªj†©ÅjÐÖð´ð²\"#F­…¶hD™r.eÑ\0æä||H	†‹Ð)£ÜÆµêÚá5â/VÒÜ*„µP>ÅñO¸¦õ}b®áÎ\"…°æ©¨®jšŸƒ.!âjö½A#‚„’RV^\"5>å/™Q*’Ä1Yßy™õž´Šã[kSmçx4‡ Ê‚öÿ…0ÊmƒÂ‡¼øŸ2ê!hŠŽé±µ5.¢¿k?á\0I+úI^â‰	Rê¾1ê	iË °„šÂ€Oµä:¿Xk|XV}¬=¶Gð>5ÊØ³,“›•èƒR0Ž%ë:‰åäC‹£Ø&ËÈ½Ç‚ñ˜& Yrh)	úÎÛFî£Uª;hÊíf¦Íš2ò×E€AŠ’`·\0/@Í¦†Ó£%Š€XdÍÛÈ4Lk»vj´e¡§¦„µ D…‘ô ™{-Í*bC˜SbdfÐÚ/DR\r9«í½ ÄD€j±‚eSªóÔ;¢I„QJ»p|ò’î)u3³Ñ9H\$«7i¦\rªÀ¤àŒø¢;BšSSK\n,@êøë¯ö8W¡ŠŽ0-Ö‰Š6Ú¿Ûc|˜)«¼FŒÑÛ±g\nh¼ŠÈå+hV¯£KþÜ\"üŠÎ)Àå)0V¬Ì-„@åÂí\0ÑXîv‚ð]ëMjè«s‰IÁÓü­j-hæ±Ò‚¢æZ¤¨­.kË‡1–3¢ßcaÛéº>}aôn‘©Z<ç}ŽæÝ¿®½ÙKO¦õU”I,7ei§<ÜñG(€>„s1µ2ü Ôp#ÅI©~ßÜcŽyíØ÷ŽæË¬7i>˜ï õ\rO×	ð‚ñ¬äÎ•¼˜±(‚M—•\"F†~¸-æÛôžaÓ<Ošºžrá¬Û9DI7êgl/Cp=²Å½e¹ú~ÝYÿ²·Ûz+b§PµØnmïfI«Ò¹‰bõÖÿ·Ö¨I³½j9–øeïG(‘ƒ—6–©1šžxÍ3Wígåòæ’ßÔ¨ýŠÁX«\"ÂõÄlOß”~.š÷Ÿ×'ÿ¤V¯h[¤LŒR¡lì’#ì–”‰œYÆ \"´`2ä†ÜÇ– Å(\"çLX‘CD,ê2ôl”ÉŽCáVñdB3­n{0*0db+èMc	Ín™é›ëRÿáxéÌpÉÏ úÔ´¨ÆLhÿMLúïøWÅ€þOúLc	ð\0ÐŽ¶ùNg	ÌfXP¬Ä‹vÿ÷\rS\nÏÜê#öëEÞÁ¥r.¡jAÈC(Á^ÁÊcô V[ÊÃfv:/¾RïÄìpnÀ#‘\n¥ðÌÎÏÂzmøK´]EØHÌ…	lˆ”§Ê}å\0¾”YÑ1\r1*çA]¢YdsÅ±Eº[k¼OÈDÎ}Är1 ÷p£	®äV±lükpú1u‚?®Æ÷q1\0q„QˆN¬‘yñLg0PvOäzGäƒïŽþÄê‘¤QÄx–Ñ°NPˆjèû®»í)o0×\"9b?¯·IpHq¢LL®LºóÐ¿^Mñ÷¯¬êR\0öñôËŒ§£Û\nRË# RàºI¡]Bx*ìøNí‘üÄÑã#ñæø0Ð	\r\0ÊÄqLòÆºkå°a0x¡k†¼.¶YÁÎ>™Ä’ÔQN–HÜödæðß\"ýDÈ–FT…ä¥a*G)2—)°ä×FˆZr÷ †p€Øj\0\r Æ\r`@ˆ*~²Ë08g8‹ÀÒÇ>Œ£˜Ê’‹`êŠ€ŒŠt\n ¨ÀZ\0@‡@Ç.CÄ9DýfÂfÆ`R„11¼êÌ\$ëŠp00¢iV,à	²å.‘D9ÃîR2lÒSH2#&ÕªN*„\n½âz'ò˜1À˜§©Ê<M‘7¶‚cX8/!\nâÁjÌÁ9°h‡t&H8P¥2Œo9sTáv¦/:.¿:†T#(â29Fàþqÿ2Nš\n†@7#P5CX@ÊŸÀÞ\0èÙL,ƒsÄ Í	\rò¾^¬w5Äæ×Æ¾d÷\n±,~Îa+Aì£ê\$3B™:8(h\r+.Â²Z\0¬\r Êà\nÀÂ`ê Û6a\0\\„‚‹TJ\r8æèÏ(bVm¦YÄ€@¨SBŠþX-¹@Ê6ôTó­;|#®bë5;ÍgBˆÂ´,qóêiC¤Ñ1–P/‰ÎÉiŠ2¤¤–Ò0JŽI#\0uE€t#\$";break;case"ko":$g="ìE©©dHÚ•L@Ž¥’ØŠZºÑh‡Rå?	EÃ30Ø´D¨Äc±:¼“!#Ét+­Bœu¤Ódª‚<ˆLJÐÐøŒN\$¤H¤’iBvrìZÌˆ2Xê\\,S™\n…%“É–‘å\nÑØžVAá*zc±*ŠžD‘ú°0Œ†cA¨Øn8È¡´R`ìM¤iëóµXZ:×	JÔêÓ>€Ð]¨åÃ±N‘¿ —µô,Š	v%çqU°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€é²:œ†¦¼èh4ïN†æ‚ìP +ê[ÿG§bu,æÝ”#±õ¦“qŸ«ÒO){¡þM%K¤#Ëd£©`€Ì«z	Ëú[*KŒÉXvEJôLd£ ÄÉ*é„\n`¾©J<A@p*Ä€?DY8v\"¦9ªê#@N±%ypÄCµ²0T«ï“¡Á‡i0J¯äAW¯ðóìBGYXÊ“ÄƒC\0«L´ˆuˆÊ“daÚ§ ÑØ	,RÌxu•EJ\\NÈ¤i`­¤\$&†É¤TEAä\\Èv‰e\"Äg«GYM'—\$!Öûe‘,ÏM3Z!å\$Š—E»*NÑ1u°@@„áx—&u%+KÑ'\\Í4MRÝ:v%„ŠY–“ÚYaz‘0óë[×%•vƒ•³Rö”äbbRBHÈÈö–e)¯ä!@vs\"T‰ÂþË ð2édLŠU	‰@ê’§Y@V/ä»ôD?ÚÍ]ÈÒD”K«Ðb¡KÉˆ\nsÃ¨Ø67ÎcrcÂ7<\"ˆ˜ö•Ii@\\¯òIÖG“'aLN¾ÏÄ–óºtUYGM±×\\WKüÜvE!ÖS‘[Hæ–hù¾¯½]Ö2Ùm+¯æBèEq˜¨È¤ZA5®˜Ã1Q)dYDž—YUTYiFÐ´z½7eÈc™¤3¥¯lC`è94íH@0ŽMxÞ3ÃcÈ2¨55,³;¤Ù\nƒ{d6áãÈ@:Ã˜ê1Œmàæ3`Á\0Ø7Œï æ7Ã—0ŒãÈta-ž6¼ƒ«ŠaKžÂLÙÖH&b¦)È1\rk%€\\ö (UnÄéÇaF”pì?ï´¦þJð<èÊ©Îgedg~÷CÏoTC~J¥(\"hÂ9¸£“góŽc¸Þ9Yã(ð8\r;¨Éß‡ƒWºŒÁèD tÌð^à@.!‘ÔàÊsïà¼2†è(+\r!¾&ØtÁ|æ°ðÖðI\r¡ÀÜ†Ø*à/ ù‚\\qÃzÏ7ðØ0†³^C¡³î\"àèsÄ#ÔAd©<¡‘Rø^Sä\$H9!\$(h\r/4Á@\$ƒÏH P²<”G`¹A@„ X‹‹!,ñi•ô*“´{Ä-¿©…ØI‰Ë!B„™”‚”S:‚&DÝ\nQxG‰Ù„\rC Pë‘Ç´¾§äøôR	\$t<· ÈVy±ˆ!Î\nÃ£o[¨q¦ò †`äÃh 01½¾£A\0crò°ßJ÷ÖnÊP	áL*ÕV£TfJ¬V´®/M)‘™ÍyF”ÒžTdÔ‚î¢Ô,Pš\n†©ÐR#t,_@¦“ñEæ7TÃƒs‹…¾·0@ƒHgM‰\0Ìn\ry·A*Eæ³ÃL+}ñ Pio.e`r5Ð@¿‰‘p:Å´ˆf+±w/\0ž\0U\n …@Š©8 &Z\\¼JÚ}OåüXUbJÅb`3©Á-‹†\0µgh G2†`ÂÁ¢v!²Y—ñz%X©µjÃèÈKøƒ%ýè2ü½¨óŽñåRÌö¾š›)3“d 2i Ê‚nœ(\\ý\n9%#¥uk¬ž¸×–e&ÛRØ±AñÏQØ Ù­ƒ®ö±²¥’²ÖhíŠ—½5\"Å¡LŒ¬é-ë VÁü*‡µ;TUä\\‹Ã¶*F¨¤ãâ+HŽ°–²^„NÔi‘w«ÆªbÏiA”9pUÌ\na”Ü†3ŠÉû­NÅÙÈV^ÙÙ¢³jJÉª+á)N+‰\$ÊeL*¡cgí#7Ä•²-…‚'ÕšÁWc²R\nEaç_gÕrÏ)ÏyœžÀìò°)¥8+E¨)Åü[@u\0´bŒTÑ“B…JJ¦·(ÔdQ«X³\r0võG<¤D2h¿:`@ÁÎ Ä¿âé=^È –K#	1˜ïe‹\"ÜŒsØC&²27—Æ¯P—p¹‹'lm‹q}A±DDäÚé”2æ	”FŠËpî‰	XœBb àf¦PÉ9+%¤¼˜³î‹+[³!\"^JåØêT)Ý>)ÒBæ@Ã(bŒéØ•g‰o4±Y±3G4¬iŒUÒ*SŒH™fEŒÅ+ÖY\$H¡ô<¼OÒ»5ùs®‘&MŒ™•2åéb¦,žkíÚ3ëÅŒ…µïk_aØƒjÖ&ÇÓh\\Í‰á™¤¹’W¸„Åëñ°vÆO¸×›%_­Âi¯.ÜZD©ë¬³C±6ÎãÝD{Ó³Bc:DŠÂÌ\\a\$Uðògz¼\0Eð#\nI8ìz»ÐÄÓ½ü_ïh½õêMß™³r)¦½wºÏÔD——ùZ<C†¤üK\\e†È|ýîtcd«}x²¸ÆN]Ø´GP¾2ºgWnce{Ý­kwóÞ`Ø9M•èY,^òëÉù•ð²íif³‹ÀZìG,¯Ý8çÝöuÖ0=q²³–ÑÒ÷7ÐÕÖþQspÇ^ÃË÷J‰ƒ+…záSYù'iñn›Ú¶/m¿Ä³ØŠýû'‚¤>\0003n/¼7Š¿ý©ÎÞyÆc©eh­AˆóÚRí9+_¥1±ÒO!&Û'KØi& Í\$ÄªbÛ6€vêÒ<.êŸ%ÇzQþ\$¤oç¤ê™XâÀAÊð•öËÈßßÎw‘‰¹úœ`Æ|ÊïhW]“ìEn³¸<ñû³ƒŠù^‹æ,·*]\r­ë=…ä\r7~ûŸ›Ëö¶ûÓ/•ê²„OØBZ{/òfE££ºb Á6‰ƒ¬=\$ŠîL>ÅN¨iŽâÃ°\"ú*îp\$ý¥¶[¤zÏð|c¢ñÅ†¥¸'6ÿd?oØY¥«a2',2ND‚¯á\0:N(œOCÁÛî‚±ìoÂò%èÑ´ñîz[¤>N°I°,k/Ú‰¤öI\"<©Lca:ÛÏÀþêOLQ	ÜG\$võ¦«ÎÄñ0ÄFÉPÌN!;	ð­dmeäå&¦Á,a`ìŒÁQ\0â®™ü)ñì&CLÖÿïÖÿLXHA`OBLFÄðÜFÎ´^°ÚÅ/©±C…d	Î\r\0Ê»2Ãæ„h…J¤#B^ÔhoPn[‹æÇK4³š2°rB!`Aêü#Ð\0î%”ÎþÅf«´#ðætÄ·ã÷P…œ¯m’ \r™\nêfÞ\r€V˜@Ò`Ö8ŸÊ¤ªƒŒpèr\r ÌqH€( Œ¡l§ÐŸè~Ÿ ª\n€Œ p*qæ<­žïc>ÚfŽ’#ý\r´¸íÖŒæÖ±l§Ã\"€	±ç¤¶…rdˆ×#,3fÂL!%\rv2d+ÂÈÿ(àfÍIø”ãÊ@™'(l}ã^8c–Ö¥ÔB!d	\$ú&¬BÆÞq†8±Ûo¥\"ä@Â%<Ý2¦ÉQ¤C)M»\r1Fì€¨aCx5cZ5àÄ©€\rààŒØ¹gï,êioÔçÉº\\k\\ÍîIÒôMD\"¨Â´â|âdDä\$P^\$…Ö`r>8ˆ\r*¦¹Q^\0¬\r Êà\nÀÂ`ê Ú/â’:Q\"DŠÐ[H¨ÆV¬p€å)Ó\$H¢“O8ê€¯K~O¦8äK(š¹¦ë2Hx}3(oRäo3p¡ÈDÊ”[ã¤©B=DðCÀt¤B>\0";break;case"lt":$g="T4šÎFHü%ÌÂ˜(œe8NÇ“Y¼@ÄWšÌ¦Ã¡¤@f‚\râàQ4Âk9šM¦aÔçÅŒ‡“!¦^-	Nd)!Ba—›Œ¦S9êlt:›ÍF €0Œ†cA¨Øn8‚©Ui0‚ç#IœÒn–P!ÌD¼@l2›Ž‘³Kg\$)L†=&:\nb+ uÃÍül·F0j´²o:ˆ\r#(€Ý8YÆ›œË/:EŽ§ÝÌ@t4M´æÂHI®Ì'S9¾ÿ°Pì¶›hñ¤å§b&NqÑÊõ|‰J˜ˆPQO’n3‚·­¯}Wâð±ãY¤éË,—#H(—,1XIÛ3&òì7÷tÙ»,AuPˆËdtÜº–iÈæž§ézˆ£8jJ–’\nÃäÐ´#RìÓ(‹Ê)h\"¼°<¢ Â:/»~6 Ê*©D@†ˆƒ°Ê5±Î›<+8×!¢8Ê7±ŠÈ¥¹®[‚9ª8Ê•¹£(å,ˆl¶ÊRÔ)Äƒ„@b—Ãzk)1èÝ	½#ÒØ\nhÒ5®‚þ((\rì—?S4Ðè%KP‚:<c[ˆ2K«Œh)KNÚ<³ÑŠUŽOò½¯­à@; ƒÐÉE8ôkˆ¸.HÛ‚÷ŽªZ^Å*âÔŒÒï(\0MIS ƒ:	UTµ8è»S¼ò¿ˆÓHÖ1Ìãz Œî5]^HHÊ®\"«û69Ž£) #Jüò¥rÂØ5%H°éHPÈ&%UDO¸h³8³IÃ*9¥hmr6\r[ZÊŽcÂ79¢ˆ˜²ÄnÙ¶U¨êÐ„HÜ1¸ÒðèCãJö9;`Sðê=ÔZùi„äx¸ÌÄL¼×S†^£DŽð\nt-šâd¹;˜\"O²ü0­‰~[\$L£K6Î×¨h’6ŽV©FƒÊyTS›ùcRö;1îhÇ“Iýnò£–sÈÁÌ¨Þ3ÃbÎ2¤“ºS9Œëø¨7¢ÉXÜ<ßƒu˜1Œløæ3·ŠD³nÁcOˆBÎûÉÍJ6¬øÊaJH‡®i²ÏW%â¦)Í;â¸¨p@!^é›åz@>±µö3˜µXxAÁîZH%Pé|?µÍ#;úÊÊJ#u°“µõÕvÌ¥N©}OßéOEœ÷ƒwNû«Œ³f5\$i,Û%?J\0æ;¬u(Ê<\ròõÑ‘ÐãÁèD4ƒ à9‡Ax^;ÿpÂaB@¸±†p^\\`8x.mØ4†ðÜÁ«Fx:? ¾kW¸k@ùŸŸ´Ž\\C <á„  @MBZsÐœ“™S¼~’Sr„)™ôÎ„ÈŠ\$ !åvšušGƒ‡8„a¶\"·&b	û?¡¦–²ÚˆJ>†]ì˜r‰Qâ\n (£ø%Ïò\0\0 9\"ŒY—#ÆeË6Å²ëØÛsxÁXßDW	Bu%¤¼¸0ä°XjA!°8D&wQI6zoý‡#c¼eIÑ¯!aäÈ1–e±.*”Ô£ŒC©Ÿ„|9#À@`g7æ ¸‚\0ÆHƒ™•“¤¼ˆ™âH{6€€(ð¦#ƒR.à”­Q}#3QcˆD²0áC‘é|\$Ôš½iìàpf,ª¬G\\ðN‡‡ÚH€¦¿+—ºü?a½ÿ¸ULYf\"ú#æpÊ™´B‚¤]t§Ý 4#ï(Ã4¥\r²i%¤£^W3 ‡“£ CË€yªÔ:…:Y×»7	âŒ#šR\$!t3JFõÚ™pa…•ð©	«DÈgÁ±tâ\\ˆ¤<H2’û(Ô-§š8¢CYÊ“Œpï	p·HÜCê>:˜Áf™Q#„y,\$pò¾b¢lÇ’3¹RRtÊfJ±ªFaZ›5|%¡h—%}-Ê¾FÉí˜×@ÊC[+#ÔX5jÕ_“\$¥o!ÎA\$%B(KPK,èÆ\"óÊË  ä½&6°Â¡4…7ñn.Äª–¦y:±1µÞœ^†P­ µIÞÂY3Ê(Š3¤á2)§¢‘CÕChð88ä’\\s”¢±[jËkAjé¦\0¤T‘j·Šf/Ñöû![3>\rÁ‘r\$F,¥íã\\„¸Q@K#\n']hág©U§jêQÖ¡Žg4ôxeIHrüD·€”H¯¥”Í™b“)KÙÒ+ˆ¹‘®çX‡ËRe\ríä2MÅ|`q;´í˜‡’`,AÈ@¥\0—‹Úü_È—ª†ªÁyNUjQ5`viÇøò«\0 «ŒØ!#ˆ™¢	FŠ9@qYÇº‘Åòÿ%Ù(WäÃ\nS%ä-(ä{œªAvWÉlìeì˜r„áÊyÆÄâÝ“\"Ê_¹gXÂîAÕ.{ËFË6‘LšS1þ‚Ï®»%èc]ôNkÏÚ5èt£‹úàq’ŽR‡uÜLNÄÎíš““ã8„ÈÆ¢Ô™HüDWC„Ì± ¥7€­LŽ!1ø ‰2&…m0G‰œeÜÖdÒ<gèË³Æ™@œB:öQ/lùr£òÂn*¼ìaeÞÃÉyø£…ËWíü«-3áxÛ›“¢Ò¢2ß·±}ðÜÝÈI.ÛN-‡8äíåw7ÚÌ°-#|o:äDiuº-Kp€Þê@Jàmàç!x¼sÖÇ9ˆ`ß5-IaÍ;¡È9Ÿô‰Ç9!ÿ¤|&“¢óÄ·ìòŠDwîh:W¨”-¤*”éà5@¡s“`SJ9e­ó\n¶o²#]î÷].eôÑ/]%ßÝRµ³N¯À™]Õë•Ç«ó†E¿±CK˜=UšWû¦J÷­¬}£·¢ÁÁ³X‰;§kí*ÄpÖ›™s7fË¸7çgÊÞ½x=)¥³žfTQ¯¾f€ã0êˆðšcÃ*\\è€{6Q â†„Ÿò_£¹ÞÛÄÜzY=Cr—¡Ý^×z`Í·†¯½×Á®iW|Ñ›6è%ÐÐCõMˆó\"\$tÏ¡F‚à¶xs¬rz|0ØQ„>,ŸUœJ,{J\\=,üÔÙnZ±7ÚØå£­?hxýzz-D\0”V=öÓmõ(ç8¥¨;¾SLºë²Ý\rúÕðÚnâ%‹'\0Å#îÞ.Ò8… »&9ƒÄCTõNåmÖÄ\").øÜ°<;¯pàmâÛeÑ©œÁP\"#ÐT#èþ,\$ØyâÂ<âíäàbcf:£ÊóPêP„óOôKÃo	º –ìí€WEˆÅÆDOHÖ±PšQ.6Þ¦zÐ«°M0˜ó0¸@ˆþ¤Î|¦D’C0îkª†°á	èhE.÷\0¢I\n,Æ“ILR–0þFªe08\$ŠbÊPžxÐøuB:\r‡oœÀÈ3Ä›ÍÈxÌÐA\0±5¬®Ã¤Àñ-[Ä•\0˜D¢ÕPHºÌVJ%<Š­ÆÞ\$žÅ‡¸íhå	&FA‘fB1÷'Œ½ÀÒ \"üÃ0µÂÂe'+\n(TE\n/åV30˜ü¬OfþDÇñ¬±jâÂo-°´ÒqÅmüÅè¾åV×E–Ö œ`qÇÙÏ\"ÜÓñJðìÏpB%ñü+Œêdð\r€V•àÒm ÉÜ¨)B…gZ& Ìnƒ¼'©è„ênTÈ\\q ª\n€Œ pâd´râI k Sâ2ª-%JÕ*£¯<òJ¬Ô2\\r`Ê#äG„BkJöiŽ·à›\$ò*Yàò+Œ8Å¾àœ,bØ/g8«ìQÃŒæ\$'´£Úzò˜96u¬,d´vÄÈ%ÄªFŠd°+â[éØš£¢	’Þ„âÆ2£J,%–ÊCŒJ~Ãß+|yÀêÅÌ+‚¶#ü4'0¾–Š²ª*îßíôz,\"§ÒM£1r†ÝW2 ¨5‚à%ã&EÒ8• ÞJÅÂ¸ Èà®2ƒ¯k²<¥ŒY°äÿ¨džá¤hìdè«Äü…Ì¦„i¢m0‹8\r\$bÃíØ²Ê\$Âæ,5@@Ž€Êñd`ê Ú@Ÿ5/ƒÜ\"ÐlÓÄMf KœM„df\"\n…û1×1ê¶;f©¡‹©ê´/à—4äÎ¾à†8Ä>2¢W:\"Á<Âôª“¯\rì?\r Â›DL¦Ì 0£\"‡KBö= ä";break;case"nl":$g="W2™N‚¨€ÑŒ¦³)È~\n‹†faÌO7Mæs)°Òj5ˆFS™ÐÂn2†X!ÀØo0™¦áp(ša<M§Sl¨ÞeŽ2³tŠI&”Ìç#y¼é+Nb)Ì…5!Qäò“q¦;å9¬Ô`1ÆƒQ°Üp9 &pQ¼äi3šMÐ`(¢É¤fË”ÐY;ÃM`¢¤þÃ@™ß°¹ªÈ\n,›à¦ƒ	ÚXn7ˆs±¦å©4'S’‡,:*R£	Šå5'œt)<_u¼¢ÌÄã”ÈåFÄœ¡†àQO;zºnwf8°A®0œÆñ—æ¡§xÿ\"Tê_oæ#‘ÔÓ‹õû}âOÃ7›<!”ð¢jðæ*ƒš°­%\n2Jê c’2@Ì“Ø÷!ƒ’”2¦C2ô4˜eZþƒÈà’2I3ÈˆŠxþ°/+…¤¬:ô00p@Ž,	š,' NKà2ãj»Œ P˜¤±B†ÚŒ#šH<É#(Úæ¡®\$\$ùB£›¶0Êb¸Â1 î¦¸ TRÁI²(’7%ã;ÀÃ£ÃR(ê\rÈä„6Œ”r7*rrä1¥ps˜Æ¬H¨èöÐ¨ê9B²¼;„ á&ÉÔjŽÒ)=&9Ò Pœ¯´€Ò•Êa*R1)XS\$ULH%À@PŒ:ÔbÆÄÌˆ´Ÿ¹k«ˆ0¯¢ší@²\"Ì—ÄiC2ÄnT^5¤¡\n3¥`Pƒ[D•›Ú6É`æ1·¢˜¢&{Z9Kó\r¬:µA\0ÜžHK¼êºÙ,Ìé·³<™'S#u7NŠs¤î<ƒPô¼28\n6»˜e{}SJ+a€P¤2Ì\n \$£…††²\"(ñV%,Áß¸s\"×Ms›Š P×X”;0ÍR1°Þ3XëÐÊšŠµÛ7Ð7(\$ø:ŒcH9ŒÃ¨Ùi#kÐæëPúHÂ3ÆŠ*ôª%#jõv¡@æ·ª:2/\0†)ŠB2|å…ÁÅ”SŽƒ c2ì£ÈmÊ8+£-C hHÛÁ¤àÎ2h„N+ÊŠ¦âY @¿ð,÷ÂÔ*‹–hlºo\$¸÷üÆâ¿¹kn¡ã¸4AÃ0zL#£táxïß…ÉŽÄ½ŽArì3…éŸ’ÿÇCJÄ„M äŽ¸¾Û\$ãXDc‰t¤™Žà^0‡Ð.Œ\rzSvåJŠfèÿj)éðŒŸ¨œd¾:\r,ô>BHù†/çÿ ¼dŽAm„p\0l\$ˆ)0ö\"vA\0(*­ ‹¶¤ðÂ¡ymIí“rrNÉêtDÇ\rµœ\"Fƒxtn­Ýô‘´\nMBI,á¶ÂœEI›ë6EMêQÁ\0f)„ô †G†à‰Âd½~f¤Èá5\n<)…@ZËá³*,¦Ã&ìb‹“_?¤ïÂIL`\\¤PâCPÎuÉaUŒ±! Î¢Ê^&¦d‚®Šk	y1R\$‰¶®%È†‹‘Ã\r'p#H VÊ‹Xoº\$Ä¸€Ž!5ÅØ2—‚ŠC€\n†@–\".\0U\n …@‹+Á\0D¡0\"Ë`ÏÊAKiL(”¸@ˆlÃ1ˆ‰\"„Âfµ)¹ˆ\"PÌZ‘Ë#€ †Rn\$ÇeFŸ“ölq?Má<6Çb.\\r<g•Â1¡`b)8š±Òåç˜j8ÎA3\$¹ö·ˆëdÊyP“¯A“H\n\n1§´iÙ’f\r„’fòE£ÑÄ@!•G¤„@àt€¯6<‘`‚IÓ³kR!± Yäv¨i‘›ò²i˜Å.‰Î`S\r\$*o\$àÙ¢%iå»°SÍ= ôbl,0“UC½>0rþ`¥4ÖLƒÁ‘«çøá)%(dBL9Ÿ—Ú^¿«9Ì”pÀ3ÊpÊÖ‰;*PeÝ7Ò,+á8éÒ½Q\"üg¤/F- ‡C£+›(tJŠ!…‰)žœDY}%t(à¬ aW²v: Aˆhy\"¤‚Veú«%&TÈ…ŽšIî…€ŸœS¬««Œ]Š\0›mjH\"£·ˆ~ßÛ2?HiÔ\rpÊUÌC8Vè•ËeÕe¨·U¦QRÂÔíÕË8 ºÙZ{n”/#M\$—žäÛ³½oSÍ»ç1#¶\$Ã¹+(-È‚`LŽf) –ÈœlïI\$L‰µÕcî“¥\rD\0001aƒˆ‚°]6ÁRbÝ_³šjƒ‚É‘ª\$™ª0Cqjmù²ÄdKúß6H`™•,6T”èADåL‘£êÄ©!`r©È~d„èGÝÔ	*’=£ wè!èe%Þº´¦2zÌI·S-f\n`Àî!5Ì¡²eLö}‰ÊÙÔuß9`Š\$v_ãüÆê	ÁçvJ¨ÕŒÅÏóMwD»kc÷(f8q¢‰TÌ«„¼ž‚…¦JÁJžÐÔ–Ýê@çí_„íðÛA'òüÌ6Jéê;£3%ÕËì–ZzÂ˜IË´\\0Ía«.¦½;„q‚°wâ,u½24L7´àÉeï­ê—6ØbËt®.ÌÙÛCØý¦Ø6­Ð¸zµYJIL%Fºž™z¹ÊZëº+¾°Ê2‹snýÓªöÁX­@µzÚêìá~ó ¢Í²ŠßPlÇò9\"G\0Pn:Îƒ&^« NŽ<8Î\0B¥?€‡ãñR`ˆé¯Cä²94I÷¥t®Öª¶ÓGi¹[žºM Ó¾djºÌ;ÍF¨ýÕ@²gE«ÿ|ô®…^p¡Ì³/€’S—7]ês‹ª¿þ‡£€W[ }[¦fžÃfˆfSŒ‡´2ž£œ.'\\Ìo å—3áÛ?Ô¦†“¡e6m–FÝc¤eíµàµ®gèžg£mñÙ•šµÐ©NøÍ¡å‘[¹^ùoÔëo'kH¢4©j®žÉ]eù†_PÓ».ä~ž¼–lB?±µç®ˆþ§ªûvP}Ñ3ö*LÎ¨&_ñû“âðý‹ïþI,ø–ÁxO‘`Å‚Þ]ƒìWÛ™öjúŸ~¸vº÷öm <äé\"ö+<{þ®Ÿé'ÆÏþM¬¿zö7P¿™Àæ äò\nL\\Íã!bf/c˜Me!ezUƒFð\"¦5P¸°²¯Ìq‚J\\Ë¨‰\r&œÃEXkãTœe‚Å’µåFJO¶ÖKÛ Ú*n¾ÿ\0†PàØ`Ö#ÂB\\Ãú8Lè;#øç¢d!Kº92àŒ4Ï¤¥¢\$kL\n ¨ÀZX†ØN¢j¸>ë§X#†é4d¢½kÚ¶‚ŠêË¡°¾%n’#4(\">\$.njb OÊç`š}@ÒËTbâ„šb,È£ÿ.:#Ìb\0E”z0€°…£Š6XùãÀ‹F¶FbâA„’HÌïà˜ÀçîFÈÀKÎ.J¤AÀæ›\$ËêL(\"æË*~0±X8Cˆ%Ñ1ca#„`î\"ãÅÌ+Î’ÍqeÎ\nþL¼ËBä*c8sÂF8P4'J†vUQhQâ,WpkÂŠŸJ\"ÆDH¥ôZIžZªÆÑm/–nÃ*bËž9‚nP)&#Â%.‚£ ÆQD¦šBtX¥%¬;`ØJü›éÄ)‚äÃ@¯ÂV/©œMæïÂ†*d¶°bÇ\rDH²7€è\"É€¼PI¼AÃ^hÃ^.ñùi\$«N÷j*eð\0jI¢\r`ObTEÀ	\0t	 š@¦\n`";break;case"no":$g="E9‡QÌÒk5™NCðP”\\33AAD³©¸ÜeAá\"a„ætŒÎ˜Òl‰¦\\Úu6ˆ’xéÒA%“ÇØkƒ‘ÈÊl9Æ!B)Ì…)#IÌ¦á–ZiÂ¨q£,¤@\nFC1 Ôl7AGCy´o9Læ“q„Ø\n\$›Œô¹‘„Å?6B¥%#)’Õ\nÌ³hÌZárºŒ&KÐ(‰6˜nW˜úmj4`éqƒ–e>¹ä¶\rKM7'Ð*\\^ëw6^MÒ’a„Ï>mvò>Œät á4Â	õúç¸ÝOŽ[¶¬ß½à0´È½Gy›`N-1¬B9{Åmi²Õ¼&½@€Âvœl±”ÝçH¥S\$Ñc/ß¾õ¡C ò80r`6° Â²zd4ŒŒèÐ8îúØa”ÍÀœÁŽƒ²ïã*ÊÁ­-Ê 9b˜ò¨¬Ìå9oÄ…-£°Ü\nó:9B0Pè»#Ã+rç·«dn(!LŠ.7:Ccž¶O ØÞŒXÃ(ª,&ñƒ«–\"µ-Xì4Œ£¸05HÄ~Ø-âpòâ1hhÈô)\0ÎcêþÊ)øÎÈªZ5\rè¼R0°@Ü3AcrÙ?ŠiÛ¼4ËC:6³*\0èÀ­@6­ˆKS!\nc[7! P¨§#íÎÆBC\$2<Ë•\0:¶-zðŽc\$ÀŠ\"`Z5¬²PÈ7Bê²T)õM´Ã‚.#­ÜÏ0£¬× ÚóJ\n5C+\"	é,éwÅ+ÇÒƒtÜ7 ´ÌkÊÖÀ	#háN°*[}·÷%ÍWMˆm]Õ%ÕqŠÊ€\rÈú|¦c`Z4'cËp,è ÂçÃ5jªÈc;{eÕCxÞISz*9Ž£ÆþŽc5pŽIøˆXÏÍí°Â¶0ª\$çP\rÖXÊaJR*ŒãÈØ¿.A\0†)ŠB6(7ÔA\0Z0MK§oÞ#ŒŒ÷f\n£¤“Qá<Ø(C”˜dÀÖéYcbv8:ZÞ 7<Ã;ÑµÈ¨°@88ctê:%)Z¢9£„t´Njó½ñ\0x0„B|3¡Ð›˜t…ã¿T1z\"ô´áz—Ù	\"4Ð¡xDºŽK˜éÐ‹ã;TAõò8/6zã|öÁ#ß>Þ£‡²§m[é@ƒ””¥ñ€Vë»×ƒ¢v›#k†;C\r]ÒðŒ“ŸR¥+Šæ¦Ysæ °ÿ»Ü|™:¡é…\0kùBü šàPQAIM ,U²”²æàY#LiÍAÂ¸ˆ£È2‹-D9¨FÎJÊy/&&I«ÌOÃ¢5)½>òúØÛñKp'¡IgêDCË H@àÞº\nZs¡,“àâOéÒÁÈÏÈë ™™)'e\r’.e ÒóHÂR¯#¥°.¶æá(\$4Ac™Ùx(pöØ]™öXj“t¼G¡0s/Äù»†”<øLx \rfHŽânH‰!tŒÄ)¬ZIƒcn\r.p#@ ƒR*ú_hºE79ÑK)9@Ü¤Œ \nGh¡G®@œ¨P*Y| E	b‘0Þ“ä2G}D å4‚¢HA2;\$ ¬[“øDª1\\ ì[¢„ÎQ/˜	¸É|¡:¤@ÇƒIõžä]„eÃ5ÛCMiå¨%`ÄIJí ð4Œ†>zO1„g`>¤•(2Ü7Q7°Š—˜o]ôMÍæ?(Þ€\nhý.‡2h¡¬&OU1¹È\r Sû#’»æ¾¥é<íšLE2 w•Y-8®^…Bí‘HiI!–PàÑ’ŒàSa*O˜5@ÚŠð]d¥†¦UUSØ0K™êi—KWêØ0µ¾9‘2N¬i¦-é äYàÅI,´/²Ü\\7\"ÞK&*Fæ¿Û\0„ËRIxÉ>8RÕI|f²–(F‚ÀPRYe±~±<»Na½=HÌå„`ÊIÈÉ¾?® žÞž\0/*öàÅDîœíé€	eºP¬°ÌöNO	lîÞ·i“r!.0Ü5sq®@ ¹W2à²†üîÓ~¦ ¦,E¬Ã|{4÷`ž2Kq\$î¸t¸äòä„°]oä•Ä°ßÝ«ìDÃSÙDÊ€éE@ïKŠJN\$dtËÜ&0a31ªOjøB1Š ¤)\0 ®C°!R~ØSÀ—€IáñBRa·ÒKkË{\r4TÕÂòN¬Q9hLŠ¨“Ä¸ã‰ 7!+¼S\nCÎÐäx%>‚Ú@%ìÅ”\\žÐYÒHÄ¦§&Âé’h¦LË±ë\$’e²åh6Y>L.|Åš¦mˆå‘£óRÇÃ\"0/Æ›ò¡	ŠB9ô™ÂUŸþ…‘3Hò#ÄÈrër¬>¥3äÍ#R¦ÔÎš9WÀR‚qïFô) ”Ê@^i¢Y†HQ˜çh}Ç¦ÅkMEBuv_ 9·%êÕ·«ô¢Ø|+”í°J<·+alyƒ^’“Ž‘C×¡ðìó#²ó6Â%7X·Ú,%®¯Ýò¹q8?+ n“s;zÒf]Ã|Íþä¸\$ðn‹Ä ,¶RD'5ìÍ©,×µ°–pi\\1¾xüÜNŠíºîZÚ}B•‹,M6Pøž° ª!PZY6™ÛÛe­ö”\"˜[+¥Ï4üOŠÖ¹¢ÎÐs>ª\\âN2¤O€ã*²’“î:÷Õ…ß„ª½&²ð·kí¶Z¶MäÈöÁ¨M4[§õ•¿ÒÂeê<3&Q½k9ºzg´Ûƒ«ðÞÄø8.Úìé3…°>±_\n¦`[Â^åJôI×Yjl\$aÓÈœÙ±±Þüô÷f?hmKÊú°½øžÓÔünßÝÝqð÷J ´27òÇn‘Ö4¶\"çòê£Ì÷?Eç\ndóö„Á¥ä	Nb\0€ö\\˜`ƒ_³í½Ó³{u»¸1)òÅÜ”º]èX'Äöjªmx½›ó&líÝ›ËzÿAôÉ–™±D©nïlø~ÝŠ4?àª«qýÞnòµÊÈ~/LÁ?j\nˆAXÄ˜þíañŸà„íŸ ÿ¤úl˜V@æ3%6Ý…¦èØ;i)Eî9k)ÃØbªU+põhê&ïmÕè¨¤b†=ð6ë\0–šä&HŽ-Å6 íe6¹­Ì«Ã«º1èÜíÒ| †B`Ø`Ö<ÂåCÚÏHØÃH8m*5†ÎÁ\"èã'ØC(Ö˜\0¨ÀpbŠüU\0Þƒ‚Sž\r)T7ì¦¿\rç°¾EÂ¸nNnLZJdÔÍB–éŠ'éÐã–8¬„ÿŽj8ÌFÓ¢1Â	\näŽãøÅ­–Cit¤£˜qñ:DŽ„¬E2#pœ¤0jÎËÃ\\Ôê ÕC¤=å‰Á\rÑ6¡íR0†DqlßJÊ\":Eˆ\rqXùÎ°ÌcbÒmQéð&c\"<ÈçŠ •	DLª\\R+\nãÇ8Ž#–	¨Ž-JÐø0êé¬2L‘”É°l%Q.-\"ÜªL\\¬¤Ì¥bw êOåËÑÂ® ‚-©ì® ¦\\\"õ‡\$9E’ÑBS`ŒžÃ°\$ñMŽ‘úqiC\0b}æYéF<Ê¦NdÆ¬Ï|øÃ\0þ`ÈgWà zñ<MOè\"àÒ";break;case"pl":$g="C=D£)Ìèeb¦Ä)ÜÒe7ÁBQpÌÌ 9‚Šæs‘„Ý…›\r&³¨€Äyb âù”Úob¯\$Gs(¸M0šÎg“i„Øn0ˆ!ÆSa®`›b!ä29)ÒV%9¦Å	®Y 4Á¥°I°€0Œ†cA¨Øn8‚ŽX1”b2ž„£i¦<\n!GjÇC\rÀÙ6\"™'C©¨D7™8kÌä@r2ÑŽFFÌï6ÆÕŽ§éÞZÅB’³.Æj4ˆ æ­UöˆiŒ'\nÍÊév7v;=¨ƒSF7&ã®A¥<éØ‰ÞÒvwCù»ÝN¬ A¹g\rÈ(ªs:èD®\\×<˜¡ç#Ð( r7œÏ\\±…xy¤Àô¦ã)žV¹>Óä2½ˆA\n‚¦ª o³|­!êà*#‚û0j3<‘Œ Pœ:°#’=?Œ8Â¾7Á\0Æ=(È¨È Ãzh¼\r*\0åŠhz’ã(ßŽƒ’ì	ŠË„\nLLXÖC\n\np\"h9;ÉŒ3#ï8‘¥#zñ'(,Sr1\rØØ7Œî0æ4¹nhÂº¹kãX9 £TÚ(\rãXÂ˜´HòÜ)È#¨ÖÂ#­jüØK¬…ÀƒšA#¼ÛD¡í¢M¢td2È‰Œ‰3:!-C&NKSÔl¨îµO3ÙxÃ¨Ü5´ëp‚Ž?£\rs(Tã ô‡¨Ãb†óŠcxäÂ0ÉèØ2ÎÄ(Ç/H«¨èÃ¥#«ü„¿(:tÂH†7(ñØ®ž#:‚†%/ãü…À£œõt:ú‚¾PîkèŒ¡\0¦(‰€P‚:©Á\0’7l„BàCxè;²¯`9Ïm)EÉ¯™3>Ìs.7Ks\"]»Øž*¹d£FOmŠy2z:TH@äÌ¢«80Ãh‚ìúÊÃ¤5,ÕÀP’6Žu¶\"§ZMŸ”â…›ÙK“n;0£ÙÄ¡™eàôþê¤+®\r’Æ‚ èH@7ŒÃ2Dþ&×\\Ï4°Í“Dû%ihë1g£*1œdèŒ!b0Îoî6“|%«šƒS«ˆ:9ap»›Â®2ïzÌÉ¿||®Ü59q-g,\$dPòX@óËsÖõ¾süGCÀÍõÓwC7ñoØF¸Bl'!ùÚ2K£º§\rh€@!ŠbŒ`^éiHÂüŒÖpÚ:ƒ§Õç»ˆóÑ£É^’6¥Ú~‡¦Òˆæ5(>•ÜøD…qÍÍ5&Æ>û	kqVK¡p Ð—  ä¥W/\"Vÿ €a{€ð †ƒ è\"\rÐ:\0æx/ð¬Èä .YÁœ‡\0ØÃ(x á¹5¼@^hrá”:B¾ŸJ·@øÙ–´ØzÐ€¼0ƒâ„øƒ˜n‚ÈÄC}\nƒ†/¨\\ƒ3ÄØRˆ!,(1””“SÐOWq@?Dµ†(\0·£Zu5!Ü\0Áz1á½5ô\n¾€PÅp¸þ9!P#_RÑø(R^LI™vZ¡¾´’SÑ[>`)¬ú&;Ù»Ÿ@¹¸æÍ\rÚ'r7<ÀÊóƒKÐ%DÑ0à¾Šš\rgÁ¼BVOIÒì'ò ‘\"°Ä}•/à€-ã–N‹’\nläÄ×Êç¤É„­¨Õ‘„‚ñr0½ H‹hk#æ±„§•Ñ0Zü\0~%Ì“Ë4îCÜQ%lùGTì&Jt\r•!¡À‡W\0¦°™›ÍEèµ\0f\r)¤ŽÉÀÕEÐHsn0l0lHÍK	ŽD˜Â\n\\ƒ¹|e*9'@ä”ÈXokÅÄ`©%iÚ¡E‘9§çHK‰°K\rÖPÇPÆ[štR,\0¹”\0ÖÑBºô !ÂJ(n\rÕYkÈV®’RØ­ 0cHa9'\0@²QÝ­”Aw¾¤ßuBhUn%¼ºD8\n	áÁ_…wÕBJAJ4oÐ„“ô:Ñù/ŒXÄxÕ,Žáº=óäðšøØªw^¶t¡#*JNñà<RÚª“ââf35 T\0Ì\$ëfç¨`z>%ð”ÆJÐœcrë=REšŸJ\0ÔY,FR¢S±ûŽ‘c*ô\rõ<9´V7E“ù|0„d+¨×ùHPAPqÔä—†9PT3½_\$	þkÂFB{Ðe˜žåTª=­ªæY	šå¦FˆyE°\n\$”VnÑ\"¾·H”ïÙÔ<óLì¹z\$	–²ò¦£TyÂ:ô¿XðßRÃi@hÁ¸2#tÈÍ\n5Ä³&D‹—P,åÒ^eØ¨£ÅeL]o©h®§Vó]L¡0æ'½,‚7Ob6óÎ‹‹è»JÑó2ƒßtÍ(uDÔ†el®!è1R!„Dýì²hN±=‰>Ø­+_ä~½9\0^Wœ‚YÁ‘U˜ó#žÃÎ}ÏFNë<æH‘ÀO×‘ú¿pÊá»>¶9ç?™7i¡‹ãÑ/E¿=Kt…¶¡×çå<ìÜ¾˜ªšl HÝ=cu_ÒZ“J)å\\òð1¢‚áçELíc¶š×šsZT-U@JxØ8¡l=ZSö2Ó%ÙËl­?¢6tûrÊÞGÝ¢Œ2Ù\r,Ðø{¹Lœm'\$„hŽU=ÒUUt¯Ù¹¾b·bF”î=È2ñS]òNõyLˆþGnªôl’	'¦²>V:¸*ðb“âeÌßdôŸ\$ÜLÁ\0 ‘–rC]h­ú£³`Þùò\$5, §‹»ÉgÔðôâìÒF•¨\\È”¸åIði·W¬›rü÷x­ÔlZé¾`©ŠI·F³ój°áDê<òé?§:wPæ=( °‰À{;­«îÿìøG#V£Ö­u²Ñ(P°ç\$5LnåÞ–|-ÕÎ·UÏiÍ…†YýÔØ0¼VNûS:‰âFä(\rö\$FêÈbä\n%Õ §µWD¾ë¨‘É}—šÀbøòû]²¡~©ñk.¾P-¯¨·Óª15‚úÀBLÏ©z¿m¨úÀUeMJS\$ënÛ.f~óš[úÎÒDÿS³{ùÐþZã4ø¼÷¯j>pxhGçºbe•øú§éGÿ#Pÿo´56{Ú¿µÌþþ¸ì¯ä.­8þ­fÿ\r0OöËúënÈ>°þŽÒeC\0ínJ”©‚ä\ràÄ“¸õ®n©,w06.¹#s0Ç¯¸÷ÎÑìZÅìb­ÃªËÎ­ÊàÄ\"‚|ãä¹ƒð)B^`æ®åæ8BÖpÆ’!ÂZ\rÄ‚Z?,TFÔ×JŸ¥¨­ì>®\"@YÄœr\"Ø>h¸HÐš±Mƒä\"\n<ÞÐ.Ç4“Ž²}0¤(‡Æ¥*ŒÐÇ0n‹C˜\n02,5Ž¦ê/(÷Ýe ­Ïàõ¬õñEŠ¦÷ŽË€&Ï”j'×Œ4M¥ÖÌf¾q¯à%nªõË‚18”Ox?ñqKÎ¹\$ò¢lÅ\r›c¥«’zQh-ÄðEh¶\\P,x‚cÐ8ŒZì`\$ô<‡Õ¦~i*´ˆ„rG|\r*ôÊêŸq ú®­Q°ýÐüøÏÊí1¿Q>±_QdËÅn9C™C9L´M±lù€AŒÁ–}oùqÞê:k#T¯„¢\rbha‹¿ñBN.± ²4ñÂö¯»²22!/ÿÎ±Dé ÐÌ ë‘Ò;\"äÚòð;.q\$ÏáÎÁnqP‰\$&§&%ÖÈìy%rúçÝ&Ãm±ÇÒj:ƒ'®•%½ÑdÈÒ„Éêjr”'Ì ZÌQš”Dª>ìÖCb­'='R®Jò´ú’~üæ‚hbFúƒ¬k1b(oÔ_1u¢:;Ç	\$†Á¥,3c;.Ä:³d¤ÛEBRA\n\\OöÅòÿh@Ó0²þØ¢…«ö2ã3bª0¥@´£ÀQOÙ0ÀÓc€ÝÃ¤ºíG\0Îtv‘4O4Ïí4mKƒ,&À†H Ø`Ö*©æ(Nè¨Ä\$â•¨Êf©#ªM2°¸MbM®h/‚ò°¢\n ¨ÀZlÖ¬÷,@Â¨†”wÍQ:Ã'Ž”3²i·.-;Ã(2ÑNqÓ´ñkÖLp`':K¢0€ÊrB:?/R.Eø5ðä@ÎrÈ,Ã7ó,\n¤¬5Œœ\$£ñ\0@ŒoŽ\\#è:§òœìDæP˜ñ.I¢Z#T6ÈªÓ\n«ŽzK‡)ÎTåƒ¤éâü`/à JtÅâböï,¿ÔXë‚§bZ‡­íEB‰F³Â#Œ6‡}FtV÷‹}´‰G´Œæ à8E¤èT†ì4Š5\"Œ2R,|>E„á†ÜÂE??¬‚L ¦\rná8„‚ê}JM#oMž'J°ÃéQ@Ôd¢ÜH©œ(3\\UåDä.ÂDèb<]ñ0ªcÐäˆ°Tš™N…2À‚(2À¦yÇ NÔyÕFxžs6”FÔ4o2?„˜¶ÔÛ/Ã>q~6”clfuè5¤«±\nM²#âÜK`ä%åÐ¦@Ú°Fn\r¤TE„Ö-ÂZ";break;case"pt":$g="T2›DŒÊr:OFø(J.™„0Q9†£7ˆj‘ÀÞs9°Õ§c)°@e7&‚2f4˜ÍSIÈÞ.&Ó	¸Ñ6°Ô'ƒI¶2d—ÌfsXÌl@%9§jTÒl 7Eã&Z!Î8†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘ZÔž»	&))„ç8&›Ì†™ŽX\n\$›Žpy­ò1~4× \"‘–ï^Î&ó¨€Ða’V#'¬¨Ùž2œÄHÉÔàd0ÂvfŒÎÏ¯œÎ²ÍÁÈÂâK\$ðSy¸éxáË`†\\[\rOZõƒ?£ÅåÞ2wYné6M”[Æ<“‹7ÏESž<¡tµƒ®L@:§pÙ+ˆK\$a–­ŠžÃJ¢d«##R„Ì3IÀ¨4£ÍÈ2¦pÒ¤6C‚JÚ¹ïZ¤8È±t6 èø\"7.›Lº P†0ÃiX!/\nê¹\nN ÊãŒ¯ˆÊóÇBc2Á\"ŒKh–Ãa\0„Ã°ªÜDÊ•E¬+?ñ(Ó®’Ò}Êoô£,EÂ+œ91âjºLnRÉÌòÓ^1®+Ì¡EÌJ½8%­‹Î:Žƒ¬à1,[å%JôkF±‰‹•CTE‰ÃxìŒÈ,ûh‡\0Ä<¡ HKRÔèJ()¤£,øæ±â0ê¬ºðJ( ºµËb\n	°ÇM¸Ã‹†6XÈ8@6\rìrö'ŽPÜüCc:9 Ît‡%\r£Jœ§iê#(HñQˆ.³±[\r‰315è›7FÏŠz¤˜¢&2u¬€¥\r @ ÑŠ„çŒk“òC;¿8±T«–Í2¼¯@I¸BŽvKä!®´¾:: 1¨‹‘ä³+0Mˆ¥‚4µÈÚï	#j<„1â(ñ›°N6@•¥·{\nR¦YŒ=9CäÎÔQpØóMJ–J£xÌ3=cpË öìü‰¶)\n0œêz<¿ìê1 É\0Ì:¤ÖbîÉ˜å´#8Â¼åVkÔ@ÊaL,7i@@!Šb¾¥*Ö¤ÁÜ•9Izè6î	bâÕ-Ñe´œV	ú„ŽZôp‚a(çµì)¼µÓ2êààšõ{®nü¿t,ß‹tšÃuë9Žë¥KÛ&®§* ƒC:3¡Ð:ƒ€æáxïï…ÑÆ¼ƒ…Ë Î¥EÎ”sè^7ÃÏ#ú¢ýàža}šŽ\rDà/ ù¸ŽOÕ+'Ž%¾‡B:×Ië'Ù7L®’±\$ J;òÜƒ±—\rM¾Ã°‰@h@—äH`ÀP	@‰›bè`¡h(*\0¤“•ä&bÃ™CÄ6ƒÞÀXa]F\\¼g\$‡Ã	8\n'çE¢PJE…‰TÇ3b?ÝJÞCñ|®cˆ©÷%§éO\$\0ÀR©PˆÄH<šD‡ÍTO\$Þ#:²Jñù&Ä	^>6‚LÃqY‡ø:G×ŒüÉÀP	áL* \$b•‰ãíP\0€3§\0Ü†ÜªAÔ…’ã|O	ñŽÁ†7­¢Ìì‹g07œ\"YŽMF;/3þÿCz8•áˆ»/•ö~CJñs\0€#Hh½Ûì^!6AÀ‰ r'Ó’D ÉëówQ„®ÓrŸ@PO	À€*…\0ˆB E3¬\"P˜gŠ^E’XæÅn§úQ\n°aŠ\$XyË’#Ë‚TùÒRºEèrV4ð@[§òCiç#ââ•á1O§(Ö1fQ\n2ŒSË(8ÇY©TÙxÉÁS7°ðœÙGm5±‡!…“Š4î4t@IÏ[ª@n‘X«6¾ÊéêYgç(7)âÑSSK))I&X³]‰\nÎx¡C2ÒaÁr\nÄ±K§·MÊp‰Â¥\r7ÖÌ¼2†…@\$¦ô¾hoH.(’ôYðo\r‘(ë¶2ta,Z¯Lthø‡ž•‘	€) ”jtÉØñ‰±=Ê\0 ¬fV=ˆ\\AÑ¹ü^@PÃ²|˜«õ(ÆÈÐ­¶¶t—Wæh™^/ÊÛ©cHjqÊ›†¡*©‰ÂU‘¨T·ÏÌ9+³rZ\rÓ ë5£œ²ËÀk;1(V›„æÍÉrX5€Å¿ôÚIr.FI’Õ2Sª]¡È«—™hëÚz5oà¼°·ö˜’ÃzªT¸ÐJ6Ú°	~VJ!Ü”üg°AÉ@àƒð‚ÂKë°Æ\rÃXr4XR€d¨_¶šÌ&ÏIÃa8C1ÒM±#«9—ó?ö·‚¯ûpI„L8ãðñÝY²a9ÁdbpÎ²Æ[‹xÎðîEä79F4¥žŒÂÎ%Ê`ÌˆA\rÎ[Á8„dñ¥ÄÊƒ³)GÎ‰n1’ÐîC„Ë5•R˜°)r… F89”{›.!<ç+FäbO¤ HIt˜º°šúQq¡é1p8½µC†I)ì/6—Sš\0Æ”¶¬Å&Ð¨9ÇÐ±ƒ0µ#U:½sk5zŽÖ5Çëµ¬JóŒúbæúÖ\0¢Œ“í1z.ˆ(Ö\$'QR‘u!‰ZÖo¢6ÝWêv}›€A¶Ž|¹Ú+1kÛguÐQFØF;Ð­nmÚCœ³üŒª¸ƒx)ÙUà2ÝyRªP«Q|ÎÕTY¯¸%F‹ûˆp©-Q÷”IÙ5MŠSÎE-\$@:§lev”ë\r¥ä,§Œ¨ûKrÉå‰Ç•Û(ŒO…Ún+­8{d®iy¶3šÎ/†7ZPeË5787N,kROo›·6ptÛ¡°xÕCé]SIõgpAyMC‚“öæÒ]oœS¸UV™³Æ¹ 0s(ÆÍöê†úY&§ü-òIÝùÊV+²²Å\rpÎYÁŒ	érPŸ\$ßx¹½êm#n§zïNº:êÅøn×¤w™¹Œ–ï»aiêï-ØdãÔb.IÔj­å#­_Z.’Ù5ð`^¿U» ‹îŠ°Þžûàv\rð¾Ê÷ì¹qÇ-ðé\"Vh4¢£gV°º[NÄeÖ¿Ü8q¯\\f(¿3ƒõeøN§ã¾=c—~u…úowÆÃ´«Ð’Õl®ÅÅbdw÷Þß˜FÏlmïðloœ«ïÄ½Ârî¤À£ðJ&˜ZíKEŒaT_ÂVü­V¨eap*òäÙ06°)ÂõMè¨oôÒ€ËI\0€lXò(ÞÐ0þphâ‹K&‚î°\\9Cž¡k¤.Ë©«K ÏpMË´ô®RùêŒºŠ@ºïI\n–'\"¡o–¾#æLDÈP® ÷¢p\n°¼P[	+K‹ñð>v@0ÀÐ³€Þ9ë`ÁèÌ»gøý#Œoðv#fk¯ÌÃÐøýâ@‹í®üÎ’Y…¦oîØ6ƒ/m´1æþ[Ã6èÌX&ì‘ƒ\$çF0›cÎ\r€VcÖY*.!DÑ Ä3©M¼¥ÂNÔ`Â¥˜*i’J§8#r	Ø\n€Œ pð1nšÇ.pÃ-@ÌG(É‹ñŽgZ„\"š#„2}¨ˆl÷\n¢Ø«þƒ+80­Ä\"’8ÐÔDÆª¼\0Ü\roØ¸Êf ‚ôuX’\"„ndjatiâŠ.@˜˜1„;±ö˜BCp0@Zî|°*5åGCnÅoãdßÅ2_Ãr§¤e!ƒdÄh K<Š±ã^6O.0‡a'nyÒ0Ùƒ#r;ƒ×òF4Ë˜TÀÊq@Þž[ õ%R49e\"I‹¸dc29N/22óƒ¥M 'JÞæZ¡Ž\0LüÞ’¥£¬#\$”Ã;æšI²*d1ÌT«N îÚ%†@	Ó'kT\"òDÃ­bêcq¾ÆƒºRb\nd<ÊhâÒ¢1*t£`áÆ@²*pÂ%rÆöòÍPE¢VWgæ“ñêf¦„7ð2FòF€";break;case"pt-br":$g="V7˜Øj¡ÐÊmÌ§(1èÂ?	EÃ30€æ\n'0Ôfñ\rR 8Îg6´ìe6¦ã±¤ÂrG%ç©¤ìoŠ†i„ÜhŽXjÁ¤Û2LŽSI´pá6šN†šLv>%9§\$\\Ön 7F£†Z)Î\r9†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘‹ªË„&)A„ç9\"™*RðQ\$Üs…šNXHÞÓfƒˆF[ý˜å\"œ–MçQ Ã'°S¯²ÓfÊs‚Ç§!†\r4gà¸½¬ä§‚»føæÎLªo7TÍÇY|«%Š7RA\\yi¸ÏÛäuL¢bû0Õ4à¢\$ ËŠÍ’rFùè(ªsÊ/‚6¿ö:³\0êž„\rëp² Ì¹†Z¶á°­«ªh@5(ló@œŠƒJBÜƒ(ÌÀ*‰@”7C˜ê¡¯«Ò2]\r¨ZDö7Ãœ C!Œ0ëLP¼BËB8Êú=ëìl&3ìR.)É¨<l)¡ij’Í¾ñ9C»i[]1Ï;Ç1xŠèÆ¬Ø˜7¯ãtF9'£rVƒK­¨Æ¼°)ƒz¤¢âjDõ<M0ê:±¨ ˆ4Ò%©\"7CÑ(]õPt,l'\rêü„Ò½KÐJ2òƒ4ýCQ¶ó¨Ë;º Œ:¬%<Tˆ,‘‡YAˆ¸ ÓŒt³6š0I¢\rˆ	ã”tÊC£F9¡NˆÊIŠŒèÎ*\nñ ÃÀè½5ºÄUãbRÅMª,1§Ñ»èŸ*¢˜¢&2£uœƒÎhàƒA¾Š¦1¯L[Î?c)DQN¨…0Ûs\$ùHa)ƒoa>¢•‰x¤l\"ã#¬¥†ápÇ=ÅõÚl4ˆòÿ‰#jB†2‚(ñ—¾¾.á±ƒdl1a™Ê‹ã˜Ö÷U“ÈD³mSX—¼cxÌ3\rŒ\0Êã,Òt7¨)ðó2ã¨Æ…\$c0ê”Ø³hæ £–¶0Œú¬ÜÀAÕ¢é Á@æÃxÖ•„¦)Ï\"X¡ê*H\\LékªŽËàÛ±¥ëËb»E¶–¨’·µC!L“zã6ôrÇ™³QÈÃ´eïãü˜l¸ð[\0ÔÊy9ê`PšÇQI9Žëå@²Ô‡Ã‡‘ÐÑŒÁèD4ƒ à9‡Ax^;úts¹¡arø3…é_»o%cœð„Nä3½þP¿t§ÃXDe£ƒkÊŽà^0‡ÐsqŽŠ@·Á=og:&ôâœÎ1»/†ý‚F¬Ðàe6ÜøÓÊ›†3„p4!TøSÁKÈ\r c‚I\"¹@\$-™„&`’¢Ì…Ls\$!¸›‚r|“˜iCë±qÓ\0œ!T\$ä(C£“B(…ž5ØË‘ONI pðçbë‡?DÀþ“r`P´PüŠ‡“VJ¡±€¦`ìœ„hÖf?†œ„+W°Lë|k\0¿Ó„cµ\n<)…DÈb–Ù=|I”tjvZ˜ HA:âbpÖÉñ¡ú8JðŠ™va¬\0007!ðÎ¥¢)Aà)¥’|€ŸoG \"üL?Œ ñ¸ @‚¤.^’,È	Ï¡J¯ešâNÍ1>}”‹°Ìo¡O	À€*…\0ˆB EYŒ\"P˜gII	ç†Å`¥çšc\n¼aŠ'øzÐÉ!'DðŸ¹=ˆz4(•`˜òî~ˆýp&ŠuC§(¥Û)•†S¹õOÄž3³ÀÒÒB(ô‘02\$ÄÏÜH.%¨p@ÈS/O‡ð7†™y\"kŸUT\\˜S†É»%ÄÁØÊ¦yK˜r/I…š*’xèQxVr%“™ðÇQÚ\nÄ-Ñ? tþ¥â€‰¥#(>‚Œì,…Åaj&É(À\n=g®B ÒCŒØC\rìêXÐ6rcŽÝZv	—(5¦•±Š 3:Çâ<IƒAXÏ®2wa×töGcFÒØ‚’&–ÓZ…’_ˆ=,Æp)Ò¡è²x:¡k:Á%æÚ†\n…ô3¾€äEÕ­§·Râ\\`\n>NkÀ³Àæ°FqÆú”†ó¥b)':(¼\"3ömRç\"&¢•|9rÀŒ¥b&Q(ÙSòÒ©œ4ê•P_”šiêIÐ¾R@²*µé›Eø4—ü™cÞ™Ap	°Mvù˜l\rX];q4X,Ó\" Ãƒ«	¨„DýœôâUdB5ÂÊôø•M|[c\$§âÇLsïn”¸Gà,bcˆ°qÆãºcpÀ1ÉŠÇu\"cdÔQŠ‘¢\ráÜ‹¿uI™^/YY˜K–Jl?¦a‚¶îˆaš@¤pó%bø¡Ð‰_*¹µ“\0îCúÉ™˜Â˜Mîy/<D!v2xÈYëOÓd˜hiJJ¯j/		4a‹2úÀ¡FÅ5|ëËÅÌ²\$ÖS´òŸ!ÓkˆIÈOÔ7éÆSÚÒu‰ƒZ©MàÂ±©æD9žÏ˜ÝpJ2¨AkÖu®	Ø{ÅëçO–q.¨JaÏEÐc@QG[æn­,Užîƒ r‚4ÔBA›çÞi¡*§jRøVKÊ…Û¥ñT„óqi-j\rq¨Ô„l•\$ŸÂÐätVï›C=Á\0(ÉT7‚™ä‹iµFgÔïgÓöØé³?§H‹Šš7b‹xÇg¼lÜq]£Èv'ª<—WoäkPªS\nä|¯P4<8¨a²ºÍÄY~q«¹?<æÌœÛl!5h!›\nWxÀVì›Íî	¿ºŠ÷aüá€OK»ø¯¨aœ«\rÇVÄ&>›[Ã_o¦ÉÞ®—dsºk±;1°·ókµâ®‹²»{}·¼õ@v®ÙÉ’VÃÈö{Ácqå9¶nÅm’ry³\\6å‚ð&Ð‡`™‡ÍX–ÖQmš%7ƒ´Y‘ÁKhsˆåþÃ¸oqäï%<ÆˆóAÈœ÷Ñßn\n6ØÕUø²ôŸŒ”C`öåV“	½=éµœ¬½ß÷Ÿ”ayÏnÌÿ<Îø\r¥My‰0Q«U^óÛx¿B¼PæròqÍ­Úóü…iÎ¯Þ¼wŸøþ•êIUbä(ÈÝÓ(r8¯äÁâ`£#nJ¦“N˜0/À¨.òëNšÙŒÙpO¬åŒŒ…`°¦µJ¬ \$†(Åòþ0V%Æû0:Œè/JàbìÛÆ4m¶v*lJ‚h eì%Ðå	€°jPnFP*ÙphDð|õð ï·é¥°P—šÕPW.y\np‚üð6Qb¦ PMbõ\nKšXo¢ü/Ïü¸ÐŽßðÊØ°ÂŒŽ€ý’b0Ùâ·”ø°æ¸°ê\n‚ Oä[í@K*)\n×D¶rOÊèíUÄR×‚üà1ÀÐH0FÌ&s°ê~0>3eL£0<\$oÔ ¢ é®±ª¯Xß‘D‹m„Ä@†X¦ŒTÏ[ã0mÒ2…L*CBç,@Âø€‡Â§‘TìF~ö£Ô\r€V`ÒXB,\ràÄ4i?£öÅ*Ü:àÂ¥Š' Œ˜ˆ@\n1‡œ€¨ÀZT^ÀÞ2C¼ÅÎ¦ÕpÓL¯±ÚÁ‘R'‰˜f‘Šƒb¬ÜâF‡¢R3ì¹ixÙ‹@ýÀÌ\$‚1­Ö\"ð>f ª*mbi«¨\rÀÖ:Ã'\0m€1ÒýåØcOh¹â†M¤latQ\"Œ/DÖG#\0;òVnMè‘älYì~*°\0ÔåÀ7w£E`]„+rtÙ¦u'’4JÃCˆA®ö1‰\rç‚xe(k(Í€nl)EÓ)ŽÎsFù*¦* õ*Rv9Ïž¡@„@:åkß*ƒO«¼Íå°áŠŽ¼Òæ'îó«NZf8‘n#„˜ÃG!.ÀvÃ|3*ý,e@³€Êà«Ez@e‘,*þ`ãÖ#(¬búøN”±¨3k‡'ã(¤e‡‚bPlTåJ£ªX°@á!,³€3IR\"T[1¤»	^¹Ð;\$lØ„hŠ¥+zFØ/€Â";break;case"ro":$g="S:›Ž†VBlÒ 9šLçS¡ˆƒÁBQpÌÍŽ¢	´@p:\$\"¸Üc‡œŒf˜ÒÈLšL§#©²>e„LÎÓ1p(/˜Ìæ¢i„ðiL†ÓIÌ@-	NdùéÆe9%´	‘È@n™hõ˜|ôX\nFC1 Ôl7AFsy°o9B&ã\rÙ†Ž7FÔ°É82`uøÙÎZ:LFSa–zE2`xHx(’n9ÌÌ¹Äg’IŽf;ÌÌÓ=,›ãfƒî¾oÞNÆœ©ž° :n§N,èh¦ð2YYéNû;Ò¹ÆÎê ˜AÌføìë×2ær'-Kk{3ùºš>²±1¢`÷½“¢ÈL@Î[àQ2ÁBz2§Ë¨Þ„ ¨:Ã/a6¡îÂò2¡Ä´J©'©û²¡&Ëš::ì8Ô0§¢ Ò/!àÒÂ¸+ËMc\"1Ic²à)	ìü\r)¤[¥cÂ1¿P\$T80KÜ&\nH!6òˆã(Þ6Œ££ZþÄp §0®’t™ÆìBpÆQ¢ð\nšê0BÃ1TÏËÌè˜7Œðšp8&j(Ü2 Lè¦Ê²cØÎˆ2TH÷+)¤˜†N‚hÞÌ¥ÉCÜò õD<o-5N\r4ó”É‰¨¿´\rbºœ\rÍ“:Œ\0ßG€Mq]QÐLÌÊÑÎˆŒ€ŒpHÓ\0Œï%òBÐKºò€°î’ñRL;Vò5pŒÞÿ)ƒ£ú€ŒêCFàBé¨ëeªÐJXãblÈŒP«V0Î¢&ˆê™6‹È˜I©`ÂËlS;onE²9¹ô{KS4ë®Á°±tòXÆ5Jb#*‹ƒbÕÒ’Ç–X–cƒ*¸°  Ý7ƒ-Óe‰#hám³¢(ñŸŽW0†û=µ[(c“Ä]=eÃFM:46#6öCd¼6(Ý]Ã0Ø½²Ìò˜Ú ÞÜPÃÌÐ£®9Žc2†6P Xà[pÃ@Á°m~¦,P9…)è†)ŠB3€7t@A ÀãHÄÞÁ«/)Òp3/\n*«ò{;4m>ä¬E2\n†Ð¡(4ŽBÚŠÅoc•\0„:ã³®íÐò`ÃÒ3,\rj:§¢hÂ¬¦hÿ–9ŽëÅr±+ÃÌ‡‰`ÐòÁèD4ƒ à9‡Ax^;ýr•Â'‹ÀÎÑ€ñ!.à^9OÜ»ï÷ÍøÁ>g¡ÀÊ¥ÂxaÅD§%ÃŽ¦Üyñr.L­(@ä¡•!Í+¥Ù!T¼Cï'Ìë’å^sž'¤i<Çjý	‘¦…¦,ó™#xuáHc æá¨‚ÎÛaÇ¸'šPª/M7æ(FÃ‚r\r„°¬µšé”œ+¨àšbŠQÈò/\$ªÄÖ¤ršÏáK—B¤±Ð’8ŒM™yA¨¼<2\r	èI\"áäÙ\"àÒ®U©Z4!¹\\œs’yU%®è–Ù\nñÇrA¼€r\ntQ7Ï\$¬ÔPÂ€O\naR¨3ì|O#™\n…år¥bQH9 A*§˜¸žQ	I/ŽñE%@èºêá.!i)³(üy`i'hl9›úJÌ	Ão)Ú9pÎšÿ+hTÝ’ÀŒŽMŸ-¸)\"ÒÙ9Dì98¦¤AáèrPà(íÅ4wt	„°6©¶2ªV¬û=çèß-\0ˆ¢\"ÛÖ%“Ô7¯Æe#©v.®ð“×8n])q\0¬’¼ÑØeÌ-­\0ì_XÑKj‘	ÁÄbC¨g:ñO2€ª£¡Î›\npIt§‡â‚ DìÒY¡£1eî“¶0ÈYS©„QŒzZ“†KP9ZaÌÐ•T`“½Tf¬ Ò2¦8‰Xú´VÆ”ÿ’X¨UÙX2‰¼+RØleN’Ü\nÕr(rXTÔu…ùÃàÒK€Hœ%I\0ºBö—ŒS¨6Æö|îƒ˜pB,Z•Ob\r>I’Q‡I @†–É QmXð€ªˆLÏàSe‡\\½¹‘R eT!•Q%ª-v´óL7Ó>aÃÁYl‰TÛIX®QÒ!ÒÛ Þþdt½…Ó#ÜÉI”/&wÒÐy(¿	Š¡«BG]Ó®ç=\0 ÃÞpÝzQ¨)¥ë€ëÁh0¢o*zª„Èì­\0ŒèLRpwE\\2\\£ÞAÛ±'YD çµ\0ŠNáLdñ4vSÑêGAƒ‰“F)@‘-ô‰«^1i©ŒŠÍ_+˜Æ·ÊêË\n,\r¾»Uµ£{WøÝY\"‰v¨Y8í‚cçRdr	QÆÆ«\"¢Ùúª	Y‹TèL™™8,Xÿ(ÕŠÛvcÉæ(cVÈ-ÁÙ« ‡SN\\ÍM2'ç:VÐw§ŠÁ\$ª¢\\‡âê¯0\nx•O’·¢+™^Š¤âÇ“<Áu	í&óªvâ¸ˆ,„Ó‰£>døK§ÑÒ‹WVî­‚¦\"¹0ÄêAI\"[×¬1)”g…d¼Xu¢Cyh'‰”œÌ¬r#IG‘ÚFÚ´&LØrÓ(7l•*×ãeYÆJÔÍU\rÎ¶Tù*[7mBgÑMÁ({f7U½¥ºUfë«»+Ïü³¼¦òÙÎ ûM3B\nd§_åV¬´cv+¬Ó”åî]X|Pil´¼µJ5yBšBX8\në44z¾¡¤áD¥ðu3×>ä—˜ÖF÷ÞõS©éÖ¤''ÉrË¸t6ò_5[F—Pa¿H¨:*Ú¢ÇY¦Ý›?hí:ŽÓ™®äÇÃñº ÉïG¬]y•£YRª‡Rè0Óªä|±º+#Ii½NÕ2þ•Ñ\rÒªÉ©^Ï¿:ÇPj-O·ò¬“T\n„2§D õÜé”/î<*c!e<g‘º^ÞÛ ÷Ý÷ßâ¹®85%x\\eŽ\rqåk»e–Êç|T°³Èëøš¶„öŸ f^ˆýs_ç{ª°÷‹ÒïÕýŠ¡Ñ®HžHBAî¡rÞ”«÷±Š'È?ÁÝl2·¸?ïáà,f/¤¢÷¸kƒpÅg]_r4Ý÷a„ý«T=–bôw’‹ÜXjî½ÙË\nB˜]éqêU·võR°®ºöpÿED¥‰NôÍ í-§\0Ky\0…Ööíúý:åA\0k|Z.QÔ MôÛMÜÏP.Ã%ImèÉ\rîÏl1\"D&Ï)E¦P-üþMì<NÃFPe ËdºÚ‚®µ#¤Á†@ä;%Ì'åZ£¦:¤J8mN…&(Znòe0íïNíNå	ì\n/_ŽÁ\nÏINÞ÷p¹YS0Hð0 INÂ„°È ËM#Ü®®C:Iâ†<‚Dö¢òYa„n6Ã\n!„p¥\0ïPªûå1ðîQQ±\0q²ëðÃãÝ Çbp×pýQq>j.CN]\0ÃôÏL<¬®6ç‘FH±æ“-¸¢âò¾-AŠ¸E1z °D+PBTë°Ày14o‘’Mp½ñ†MTgÐMh\n¤b‰ŒEª „Ûñ–å0µñÉÄkš@yf¤Œ\r#:\n\nsÎF?LÀ*äë£ôp‹\"WðäuóhÝ \$¤1rðJºZ&ð¯Æ°V2\"lW\n//ØñÏ9#®Èl¨Œ£- ïÿ\"q\$/'KÀØi(U ÖÓcp©«ÖPeH&‡hm´C¦r(Šv+C&åà@\n ¨ÀZ,\$éü£LÌW äŒerr†ŠÍŒÝ)âLòƒæœ²¦ËHd#¢>\$\"Fj¥2*ªÃàbìdF\nJ«<ãÃÂ3Eªá2j#ê1b\\ñNVRk#‰?¢l„#‚,\núó±N'¤â]\"øBjF&NOâ”=ú¡¥rŸ­˜8¤èØÀ@TS1E\\¸Xªj®ßgS2¹4äïþÎ­ð2³Y4‹®°æA5S`ªÒí\r¤l³@2¢œ6ƒl2g\$ºó´ É5âpGð'l\0FÀ†arô§2ÐIÄVZ%øF, ]o™:Ã»;&œ/kê;#¤Š%äÕÇ,M`ólyCôáÓŒ\0¬&@îJêu(¶@žŠTnø/ˆ˜³‹N Gtïf°ÿD&3 †ØOÆ.\$,R0\"û/JÎ=Ó¶	´4«Nz££ã(³Ú/³Þ7`Ë>púQq; ËžY¢:Ú„€gÂ‡4¥I\0@š	 t\n`¦";break;case"ru":$g="ÐI4QbŠ\r ²h-Z(KA{‚„¢á™˜@s4°˜\$hÐX4móEÑFyAg‚ÊÚ†Š\nQBKW2)RöA@Âapz\0]NKWRi›Ay-]Ê!Ð&‚æ	­èp¤CE#©¢êµyl²Ÿ\n@N'R)ø´@%9¨í*I.’Z¤3¹Â{“AZ(š˜ÂTq\0(`1ÆƒQ°Üp9Œ¯ðXi\$fi'BÝãðûæ2’•,l±Æ„~C>Ò4P·üT!ÕHæˆkš‚®hRðóHbúˆ°šÊ4ø½i6FFc{Y”…3¦-j´rÉ¼ê 4NÆQ¸Þ 8'cI°Êg2œÄO9Ôàd0<‡CA§ä:#Ü¹”)#d¡µîÃ ŒÀ©),zn™¥LÓŠÖ®ém&êÜ0¸NÄ.„A%Â\noÒ7ðd\r«‹’”ÂŒC8¡”h…*ôš¨ªhéZ¨]9kcFhÉ0¦:î2¢FHÈ1s ©SŒÑ¯*in‚²hÙÉ‰9!©ôL«.™Hµ—hé¡\rË,	Á°²dÄ¦«šë3H¡(¤J’XãD’ÂØí4ÆNì()|Œ’‰€¿F³Úí†‰¦Ð¹t™ÒŠ#Œšë\nÇ1Pqsåšã,îJšSæ„\në³î\rHhR±Ìæ»ÉÔ‚„-rOB°Í»Ñ,;´¨×\$ý-ÊhÊ¾¬§ðúÀØ­:ï+¸hÉ<æ%¶ŠPÀ‘éQd RRÏ\$šZ±&š³QÛŽC  VÉ‹„Á-”³M0äi7÷DqEÂ19 L&K<eÒ÷ªØÝàÈÕ¡K]®­xº!(ÈÔ§I¨“eÝ/•äøÖ\\ÃÑ¥íKHe\"bŸ)d2š\\#\$‚]t¶}\\#7Õ à£7}\nGcU¢UZ³…¬\\’à®‡Dg„£9IkIÈÉ6¦©î}JÝ,õ¥Æõ-tXZ°Œ:ƒcç\0½È¸Æ0Ñ@¢&%Ic­­¤Úš)ÙÃ±T¡J\rFãK4†âRÌ#µ5bI+¥à¤\\š¦AÐ„Õ|b˜G7…e²ªTà6eƒñ½\\u€44æ:ëŽEÚÀ÷<iaø*}0Õ+(^–ö=Ã|Ã+iU:F'ÆÊ)Œ•®¡k:ºd×Fm²ZÜ»6;ä:¾\\pxˆo¦ª™½üå\rƒ ä;®øÂ oÁ˜6\"°Ê\\È	¥L@(*óÎ\\\0yÔ70êÃña™¼\0ØÃ:+`°ù‡(\$C8aE`‚²ÀÚŠÃ©úÌ—3¦†™œG*))ª¢¬Â˜RÏ™}¦\\J—9‡aŒ<ç˜rÖXƒ%Hð¯B³Q›deqé,ØŠ‰ˆy7KÀÏ¯\"\nÙÁypå=‡~P\\‰LDÂà•FRlWÅÔ\$*d\r“á|¼#ñÇ]Ë1.èÈºÐƒ(á40‡3ôDaÜ7‡&NCÀp\r0\0002DpxO\0Àô€è€s@¼‡y\\ƒd…á¸2‡ ]%C8/¡º]ƒõCHo—€‰½‡#à% _@N\0005‚ |Chp=Á¶]‡@xÃ>-çÊjÀÞÉÏ  ‚¬òèz%¬–¸: DòPc›ËJKÒ—d¿Ê\"£*\"8h¹Ã\r’V0)Ì;bªtú0ÄÄëÇâÿ\rÒ/ý2‡;!DÉ}‘¥¸pPÐÚ&lnéç\0P\\!­;Q,ç(T© \\ª&S¬…BCÕqáâÌ)±‘œ…°Jš•\$¦q4XÂ#ûÂ{ÓÂ¥CÚ`á[lýa(™Ê¹67T£‰‡D“ÈæPÂÂl¢ó1h\n2ˆ´ÜzëZSl£„’,Nð ¥“žiÎåÜà?§Ê\0ê|g8fA¼6‚\0ƒ, 4?’ì8?^{’'Âwª,¯š“Q¥Ö\\ãbî’ÄSò@'…0¨VóÍ6U‘}Y{-ZÝ©S–]5¥¥ê4m\nœ}Ë}Ù:v…	ŠÈªâµÃ¯O‰jµT\$ª«òsQX#F)§Ø.7—A^ñÃ1\r6¿ÊâßÃtšA¾X‚	@ƒHgMÁ‚\0Ì{O!ì”*Ì™8iš2VsÎkÝ`ì-xGŽ[.\"}åUiõI !êBS—Æ{(Ü¢7l§šK—¶Æª@Œ,ÄZùÃK¡Ì\"U~FÖãcÁ5…jPŒRó\nk•¸èBå ‚2ŸÕjÀcmµ¹VéŒ@PD¡˜0·‰Îƒl¯ädMržÅˆy·rôgÙçÄT-% ©ÄòÖ§ÁYÁç­bÐü²û¬(Žp[‘šÌp-z°ZÊHÙ2Zá­Ýª¥Ím¤eì*úd#ÅA4(°’’dø}…j)Zø‰cäŸtÁìîAsÎXÊñÒF§,qF‹>Ž%š½Ï—Y¤bH5tQÄZ±\0(±Éf\0u6Ê£	@ÑZ.¦õ†.	&A’TÏOáÁÖûh	æ5‡XQ7Çk‹Ì#GXvªx`º>z®ú„Z(\r!è2€ ‡a„1Ü¡L2žàÆ~ƒ&n[ÙÄè±êV„NÎÏ4æ'Ðð´Û8z©±\"ên6ù ÉFê+ç†õÉñ;MÀ;L¡š£8©|U‰êÚ¤ç(¦!«eëº¦.¬*29Ï—5”\$Îç,ôú3ðCã|¦ÑZ)hãœ§+ºÅlSyÁEË•¤)å¿¾É9',D~\$œëGµS•ÐDŒ¦ø ñ‰©®™´Ldâ5­`*àFv÷š:¿A¶ÝÑ5¥r¥_^Ò–SUžïiÊ¹\\ô/ÉÈ˜eCÜ¬°˜ÖYWU fP¬BgâüBÄ#\"\\–øMT:+¥|^Çª7lp;m-ìÅÃ28Ê#p	QÃêæ+90ód;Ï1VæÞS,ð\r,\\zŸWå\\G¯dY‚û?;}³«uqÿÝz]9Ý*&·3'chòÖ¢î*”Ô°aqQþoÀõßh±}ÏB/HëßÁ“Ôþ[B–ê{ü¯Gó—˜´uÿX¾ý¾“ñüŠ:-ê¢„î(/ð²èüÐð\$gNA`˜¿Kü°`î#~\$\"^`¢%‡n\"r/bxôC²(oˆòb[âb%Žý„àZþmÈáBŠöG†ßÄ^ÎøŽßÄâ.Zc´Ip^!tÖ/XrÐ\nLGËP|\\Í²ÚnÓäjØÂš5EFÖ\"êJB¤rd´¶ŽúWäž3ˆ zÅÎz¬H_\r¦[ÄBsðÌ#Ëp*ôÃ%\"bÎj.p’ùä&ÊÊ\$à‡WÐçØ-…0Ol)ÚOÍ¼²Æ|xâ¨/¤åÎºl1ùLþ±àæ5Q\$éb~Ó­\"ÆÅdÅLb|Ñ2}.*U‚|9	ü£(¼NBŸ…RD®fÚCVâJ®Ÿ£E¹‚¢Ü&<ÅìLN¤c*Ðáå¬¹BÆ§BYN\"!®(PO>âïpqP‘n&)ŽÉ©æá®ü0m‘n,]¬`ª…´5e0êkzžÑLmÍ\$,?ìù\r2\\ù¨¶CÊda'{±î_²q‘PÑÑÏ¬ðÑÒ\r\"e»ïo!ÅŒ8ÑR~ähÑm1#Kz~,½Íç.æÐ0Ú|w\rú‹#¯’û²@1é\$…µoâ*‚YÅ0òÎÂàDî+HýÐè\$òK(1#Ï•¯T2¡\0‡D*ì)\"A)oø:Ïy å%ÏA!}*Ñû+ŽôP¨\$²Žº!a,die,„»*Ru,åÆ\"æ,òÉ¢ +Â»›0	öŸ³KÏA0Á{11KjWÓ0R&ÚòG0îbÀTj #éæ®É!e^FŠ<ã\$@Z¼|Å\0ì‘ôyÈô]ä<Ñ‹6kP0ædñ.ë0-‘Ø5“H-„è!ÑøåŽ3†àSg8E\n£G°|.žSˆ,&\0Nç4ÇðÞ¨úýs.æNiCµ7§	“vŸƒ	&f2}wgS,ätT°ü‰ŽXªÅ%4&:à\r€àQbW#Š“/Pßîàsýô0’-3?t\r 4’Ë\"­\0ÿR^k¦@³ûBí\$.ØU‡+BOíôBÔ<l4A/'4|TP»TC(\n(Ô‡ÆÆM=î/tiEìCÒG	´vžôzÅ\n¥Ae&Õ1!ábBCn,Mbµ¥\"5Jø‹.ûÌ\"@äc¬å+ƒµ)/YÒA?D\r.2½²@R\\ÄMAMÃ#\\.ó; N,Ûf0ìÂgB;Êä³àî´¼ìR’c®×Gôòìæ{OÔ/\$’·Mòº&\\RD1ï='ä*‚­€AVz\n†b†Z.F*Hü«¡Dãí	õ-ÒdY•<Û§Kæ>_ÕJ¥êFuT(õgJUEVêsWNˆ:U,ÑÁ\$qOoVl'X0ßW'¥UUQ§ËYÏàÃõFqÅ§TÕwXÁvÆâšô?ÉÝR§`/åSS`PbçYl.cµ´|î•å\\nlVâðç\"0uY \$OÎn/Ñ1ô`5òè	_³7B‡™]ôXçÏ¨¶­^V_–, <¦t]HT:iJmXE¤¥ÕýD‚¢óþYÄ¨¦õI[²žéuÐ¶Tèj\\&U£fýF”ê.aK/ÐÝ-¨ýA´ÏR\"±fÒ²žsãb·	„‡-P?J­føÏGQöŠÔrÓFOaJÄÎùv«-ôúÔbAk1L©6¤óRkòŒå .l›>çNDt09o h¯˜Þ0çk¢¡“!Y1okïœd–Ècvg*ië)ž&w,¶ÿ#êqRìú †@Øs0)¥FMQv&Qn«È„‰ú©ØŠj'pîNõ\0Ëàœ@ê‘À@IÊ¼ ª\n€Œ p	vi¾E`Ïbž{&²Mp/¡oßÏTb—ƒ:SuVè»xî~‹ï}y±xvƒÖîñˆÒJ\0N¶QWfYÄï\r	ñ9ªb%qaqdÜ ›w Ì3Å9ôúŽ`à\"•<ÖHVáu\$À©\n¡sñsAzžìøE	£]m,0.”-“DgM„uW¥@ë“ÚáõŸ[B¦ì0	‹È®dXX@¼ Ú’£È?\0i¤óÍ<‹Š_ÕÅ&8PTD¢K\r4Ÿøg}˜k/\n!\0í€V¸v4‘1‡ÍB‹'\$.í9nC^ÐØ{=˜“†Ò€Ž•ÿ?Ø \n†ø>#À<CÉvK\ràà Ü‰;Š-¿4ö­KôÛeª.åzI\r=n9žÇèÙËA0Í­%œ\\ËnXù®4n EÂÎ .ç*jŠ‘‚åDI‘àÒÉ-Æ¦N\nÀÒ î@¬ Æ ê\r¹\0003K´m\"e{6æ…ìwHÒ]MëLÆ¸Ìö—p©>„‡åâÌäË§k\r,Âuõ\$hdîÒÎTÑ’#íMc¬Óit“‰·ö: †€ò<ˆ!’™-ŒÀ@=™9Sµ?X9g6oTê‰Z¡ 7Ã‘\0Æ—ãO ¹ûX†Û…àt’™î@¡B";break;case"sk":$g="N0›ÏFPü%ÌÂ˜(¦Ã]ç(a„@n2œ\ræC	ÈÒl7ÅÌ&ƒ‘…Š¥‰¦Á¤ÚÃP›\rÑhÑØÞl2›¦±•ˆ¾5›ÎrxdB\$r:ˆ\rFQ\0”æB”Ãâ18¹”Ë-9´¹H€0Œ†cA¨Øn8‚Ž)èÉDÍ&sLêb\nb¯M&}0èa1gæ³Ì¤«k02pQZ@Å_bÔ·‹Õò0 _0’’É¾’hÄÓ\rÒY§83™Nb¤„êpŽ/ÆƒN®þbœa±ùaWw’M\ræ¹+o;I”³ÁCv˜ÍìMÔÎ\nßò±ÛDb#Ì&Æ*…†­¦0•ì<šñ§“—P9P¼æÙçÐÊ96JPÊ·©#Ð@ Ã4Œ£Zš9ª*2¨«¶ªÒ¸ì2;’Ù'ã˜Öa•-`ò8 QˆF<ã˜Ø0B\"`­?ˆ³Œ0¡¢Ê“½ƒÊKª`9.œÆã(Þ6Œ££2ô I˜ÛŠcÊ³\r¨sþžŽ@P ÏC%l6ŸÀPÕ\$hÂÛ­±cð4b`9¸œX*NLÝ´³lÞœÁ˜á¹A\0ÉÅ‚ÐÞú½ŽË%£Xèˆ)L78ÐÐŸ¯””ø¢6ì€:Bs£MØ×£ @1 ƒ TÕuhóWÕU`ÔÖŽÓõ\0ÆÃ¨Ü5Œsè‚3ŽC(Îè¯o._/ŽP5ŒhÞŸ§¯•\r%Aƒ#\$J´8.b\\4Ž‘iˆ]2;X«×\0Pƒ`Y5èØ65Œp†cÜ‡\n\"`@µ¼õ8õw­h@\$Á6-'rã¢l1ƒ«¾É½TÛ–Ø°mA-TœâéJ•\0¬<áË’ˆ9äHÛP\nyK×ALøÉB=D¢~\0PŽÈÅ)	#j5\0B(ñŸÜ¹Kˆ9tëPcÒ‡eÑ`í×l˜Ù%Lê’Ž©ƒxÌ3\r‹¨Ê”‰ã\$ôPÎ`¨7¤/XÜ<„ðæ:ŒqÐæ9ŒØ@.ƒpæ5ƒ–à0Œã\nêpõ€Úºà£(P9…)HœŒÅc¢t^µŽrb˜¤#ÁÊí&7\"˜3\"y\\ÜP¢ƒÓFäì›7V9ÏŠbÖ2ŒC,ÚŽ×úäÍª‹U8\rãsúµ¼¯ÃÀO=œ9_ïÈæý„s0¥)Z²ÿßñ æ;¢uR®8\r6(ÉÐ‡ˆ²H2ŒÁèD4ƒ à9‡Ax^;ÿrùÅ£\\DÃ8/'0<&ü^(/KÔ9èû‚ù¸_A¬æz	Ã€¼0ƒä@t\rmÌÂ\0ÂÊbä_çý·èð›¼xÎÝI“¤BÊÓAä¢RnNQ)/%ì¾™‚yO:ÅRˆì' Ä –ñ¯†À€í™b˜ˆÐdgï]Ë(Œ¢@­‰Gœ‚œäU”LñMæ£G®°Ja#ˆ\\!w¢ƒOÉÆˆ`õ’Ò^L[{¾AÑßbqCC¾MÂµÐ…£ /T[¶zOP§’BÃÉžPA¥U9írª„FÔÌPâMT„ÇäþÈÿä\"saŒ;CXm\rXpp-ÁZØO)<L}…\0žÂ¢‚P’5IžWM2…	8\$à‰=Y\$A#-ì4¤ €Ì\\Ã©Å¡”5IµŠ£Óp’­fM/—ŒkÉ|8*¬¹‚\0¦¿Aß^æ(‹`¨¡qø‰ÈHU*Ò9Jçü”„0êÔN\rdüˆG¢ÔDÎAv91,ðœ¨P*Z;GÂ E	’ªÚr`t\\áÁ|ÒægL%Ñ%„\$”DF¹—A@EYi‹èv‹_`abR;J€Ò<.GòöN(Âxã½5JøˆHF±jÓs'K¡‹“u@èÔAŒraÍ›³’,ÓSI)ŒÅ§36àD› #ed¶\nuOibõÑ6Žpyf	¡™ªëƒ	ü-a½»Šµ\rQ/êä+ú\"EŠp:ƒèé\0‘@Ì`<Ñ‰Ú ú¨Ùå\0Ãsœ7Ú\"GC¯[ilü³’aFÓèT0\nxÂàÒ‘ØCHáÁÆ¥bpÍd£¡’¾)Z£S–Dà4%G°–ƒzËS7À˜4Xéº”1€¦´CÂ%b·\\å—[á|ƒ!ù\r@(! Â~¦¯¥T#…1Ððõ(˜¾¢¢6ž‘àÎj\\P+cŸôµÔ.rõè20#lŠÉ¯AÔ¢ù{eD¡TŽKPèQj„°Ì=J¥Ì—“:`E4C»ýÈ ê¨•å`fC!ÃV†b\"L—’\n\n¹?öGws×£½gù4:¸\nðõTœ{)ª«³4œ€NS¬+;¨í–þ)5à4æs\n°Ì¶A'æŒÕ›¾WÍîû(g2nHXîw‘ê–Ôœr\"•ˆ¬5ŸDPBúA„¦:å“âñWÕ²Ñ™' æ;Zž™ŠjÃR\rM¡ôÆ Ñz±†žÍ |ôÉŒ\\N.BîCH\$ÓE1é•5#°kéÐ¯Ñ;b”zaâ|>öCP¤êÙb\"…;K‡wpr(K´Úäx‡\\Â²œvÑéF–mJ‘à@tòLQD¢•Y»ñíG	Ta‹4–ÈÎ2[f’˜¢ˆ*I(7SC¢nwCÉë eØ”¥¾ªøyÁQÁÔñÜx¸L8®‡]!‡nWƒºnâ\0¡%7’âpäW‡.­~å<®áÞn1ËôMåT÷šÔ.oÄ?3¦ËuÞ´¢€‰H¿CÁ¿‹Ó¤Fè‰L›Ry…\"´fË‹*bé­ Ê(N¥îôõàØ¨Aê—ºP•zîMó¯9Ï­¸ŽÚeé½aŽ2†EÏÈÁOC²ÕÎÆ>ÌUÖè^™xnMÔŸç~2ºøî2ÔúLÞ—nåæš64(•ÂÆµºÊ¼ïˆ¯¼è¨µæBe¾—øÿ?È7T†YÇã(1tI|9÷EÛ/Gonæ3ÖŽ²9øü£¯}ð=±‰áÿ›÷Ãªó'ÊÏ¹§æâŸê~Ó&gjÿÓ¤OÉÌÖG[Ðê!‚( º8ÜßÕx§/Cp7ðÁ_ÈFÿOŽÿÞ¤þ/æËï`\"hö% ´¿ Þ\rEFD\",Žêb¦dt„\0ê‡(L(‹z&d>sbTg0„FpfUP\$ÐDqp*½EóˆpŒˆvôgØ.®>sì*éæ#fãäBPi¢\"Èp/`@B‚²zâO\0\0LÁkø¿ÐTÙEê¼ª„Àv#Ì9b²¦kØ¼ÄV¯Œúëdä0¾þŠöñ.dþð¼SÀÓÏ3lfdÎ´¼0Ø;Z(BˆñðÎõn„ÅƒÇ–öÐÄçpü–°òòæHö/4àƒª(Šâ†2oCFãñ\"ÝNLã†©çŠA‹Ú	bLÅýÀŠBu\0Béä6ÄïœRSoì÷yï¾ø1â¯ºùïS\0èÆçkæ8òWå‚±Æ<‡±vRE1)eák{JlÂJW\rE€àJÀÖ'¤ôºÐõ‘¹Åƒ±™ç…¢sñpÑQh QDÀÓE‘Ùå@§ÀáÑÅÕÏéÐ¼r8µ&DQ¶N‚æÂ\0æ/Îål\"L¾ÿì\"'¹\0ÑÓ ñ‚S’.ÂÑ'!¬(ÂL„iÑ >ìlCLr'ò'rK`êK¤¿&R3Azä2nÆòrÒ#ðÔBF\$ÁCÑ\\ûÊxKi[rŒCæfYÍ:n1Nœl6V&nÍ^¯%x±P»r´û æ0 Ó£]*èö‹ÒÆÅ\0æÖà–\$^YÅ`G@Ø(\$ª\n²®[r´äC\"A®n\$#ƒ\0òg2Ö\r\nI@Ø`Öl ÖR„&i<ãŒ('\0QÂ&»c¤GD!0’Äb>)ˆp‡rîÊ@\n€Œ q¤#c¬Óˆì%Æ‰íÏlÏ,îà sf£rÄû/ÖûrÑ7JòÙ7ÌøÖîXib**¨²#¢>w†¨¤ä1€›5ÀÌD ¬ŒJ\$dJ5î\nè®Rb’6En\$.¦a¦à#R~™ðxÊ³½¢P³OVTê.EDrà	€Þ/ƒ­?3öU@ÛE’ìÔI>Ì’>S’çÏjfn-ÑÉAeÔñçn¬F\n÷\$íêòédþŒP|æ©Bn3PÓCì5I²4%V*ÇŒ\rààÅç¹Îç”Bpg}ó°0¾P0€šNŠç²¤:Jz§ë:0q\0šŠ˜t.ð1ªŠŠg•.˜\nLšD¢V6C2l4d\0¬A€î1 ÂÀ êJ¦mF:è…œ\"fìÐ1€¦A”Ðã’1†m;ãdt-óÀ¬Jº¬®ìœ”ò¤J?\n¶¬cª:·¥œeŠÇ(MK÷KD'”½±ÚY  ueö\nÊb_CÌDf! 	\0t	 š@¦\n`";break;case"sl":$g="S:D‘–ib#L&ãHü%ÌÂ˜(6›à¦Ñ¸Âl7±WÆ“¡¤@d0\rðY”]0šŽÆXI¨Â ™›\r&³yÌé'”ÊÌ²Ñª%9¥äJ²nnÌSé‰†^ #!˜Ðj6Ž ¨!„ôn7‚£F“9¦<l‹IŽ†”Ù/*ÁL†QZ¨v¾¤Çc”øÒc—–MçQ Ã3Ž›àg#N\0Øe3™Nb	P€êp”@s†ƒNnæbËËÊfƒ”.ù«ÖÃèé†Pl5MBÖz67Q ¢ž>Ügâk5Û3tâÿr¡ÏD“Ñ‹(ÅPß	FSÔìU8F®—ÂÊzi6‹3ÞiŠI2Ôósy’Oõ”ÏÂ\nE.š¡¾Ššæ›/bè†;Zä4ŽáŠP ,°Â)ƒ êŽ6ˆHÂŠ°Nè!-Ãä†Bj\n‘D‚8Ê7£(è9!1 ¦î#Ãk^Ò .—È`ÖïÀÃP§œZECšA¬Ð›Ê4¦Ì(2B£Z5#Ìœ ÇÂn¢êÊ oÀè–B€Þ5Œ)L=íhÈ1-\"š2Å­“Â3²ã#‰9Î«’è»-\"pÞýÎc\$Z:!ï°Ä˜Ž€HKEQƒ\rH\rI-&Qt­éº£+(Ã¨Ü5Œr„¨-ƒë5B.›°„¯ƒZŒ9'‰Óˆ\$²ºÈÛ&#z*	BI	ˆƒxÙ5K)b©\n®P£`ØÎ.Œº(1¡nüÐÞŠbˆ˜â(ÈÉf­\ng_ŽÈ]žú àPæåFSãâ“QcÔãy6W|è´Š©õÓ0_HË“:&÷¬¨ò¸Ã¨*ŽÃ|<êa°õú:_óòë%Þ°›W‚CM;O‘xÅ1‘¢3ÉÒ —‰ã\$¢“r ¨7²Cj<³Ãpæ:ŒxPæ9ŒÖˆ@-¹ÓÕçæÚ6”xA\rÃªaJ^‹§2‹âÎLúØ†)ŠB0\\LÎÃp÷„246Ú1@ì>Z:%ò|¢›Ž£˜à2»óUf¦ê4Â–\rŠ¶Èóo@Þõ<+@íræ2Ö^€¥âl6€ŽH69ŽèÓì2jõ±‡‰»X2ŒÁèD4ƒ à9‡Ax^;ösm¨SÁr43…ïz< 9ÐÒ7ÁxEjLÈéÕíB5„Að’6Ž¼ê:xÂ?ŒÝ4>ºæž0¨‰\"OfÊ€ÝºL·cÄÞ&ùŒµ´ÂH“EƒxÏ_¯Š¬‡È)½‰ˆýb¤Öß	á„’†ƒîhOÓðl (\0PRI\$Ée†›€ÞÕÃ+Y1å@É°’\\L	‘4®ì!ÒH¼(Ä2p@œsf\$ˆøÁ÷yÈËŒPp©FpæKÂI&,“†“ìZ	û1\rÇØ:C6ACˆu3Dü3b8T1nSÆ­†2@äb©¥sFeºRrNÌ”\n?*	\0žÂ£cO¤5ˆŠÛÅ.†É1ÇB>I\nç!JTãž„`‘ýdq1lÓ>H\r° `¥°-Ð˜Úay0Ü#H*BÏ±è=„ýóEÔX”Ã‘3D¼*¢LÍÀuV\0(ê†“b³È:agàÔ,àêYÖ4«ªc½2O–0p[M¹£Z¡ÍjUAˆQc,„&I\n='¤•f`Â´Iúé\r‘h´X|K˜r›„ ÝÈäòpLÂN#oÙ?¹äyX k6P¸2Ò|lL!.ÉE,±’^‹4Ï2AèÇ‡(xÊÔâ_^…™~/äEÔ’^©Å.&Ùò›NDlø¶pì™êJYOÒl÷AÓÝ2eÉ@8 Mè¤‚¥!2™D£\rÎi<”æ¢ðæLÓP\nGº_³\$þeÎ#J\r¤•™—d=ª*‡šÅ„oÄ40Fêþ“É|\n•] ØÞÃÓŠgD×¯‚L[—kf*q†Ï ‡ÃR{¥ˆ‘bÏC8n¸7\$&ÅN^‹å&\$P‚Y`Ø“+è!sÁ¡–ä~uö€3 ”¡0ŒÚÉKíšÁMÇö-ªf‚ñ‰±SÖx’;Ba80‡ÈMÔ ocÄÍ7—ÆœÊÃN0†l){¦IU-Ö0·`2Ý«¨ûnXeMïÆ&òÞÛé’¼!‘Âž¦õbá›(çÚë˜r¬S5ëQiL¢Þfôß\nå½w¶Î_æE™ü¾—lÃ†]~.Pz¹—íÈ¸+Ï€0¼X÷§Cãè–\n'1…`ûó†¯üÂ×þô›<Q‡Ä3\r09Á],HÕÉ0u[qÒ ß¨>wñf2XTÀÜ†œ.\"<7êû¯ÛÑ°Eä²/\$f’ñAîÁù;d<‡‘r¡\nZÙ_á2\\ræ-È™O#æ#%™/ÔHÅñ`£b~yƒº#öX ¢X HûJ¦Yô¡»ú\"ûjü´ó{AÛâ=¸HPÿ¦ƒkg¸t*sH\"‚vc*%f¢ä˜ÐèZ:\\Ò‘R6·Ü¦tÒHÈ¢á2D{V*{n ÑíVRöOÈùp \nhv=2ƒ™·‰CèsÃ0àÅ>;/bB‘¡Ã±©Òºhz(a(»ÿ®l^ù`\\=>òUÛ¸­Š\"+ã&©§.ÉQ;¼JŠeCÒ.”Eè´kÄÌkCÒã'I…öðI	œÔ H€—nL÷äã/&½Ø&añŠó–ˆ0æX’q+µx‚Ôo’`wC²L¨.oÑa|ÿ¨zMÙÄôCÕÓºh‡+¿Û´9nþU¹pêuçÖö©Š8ÀÙ¶Þ¢»„ÕVÞ“»ÿ>c}>gñÒ™¥Á¥ð%“©+¡ÏrÓÙä©½†»ÝÕ·.6º—ß®ßcšà»Âì…³àeó‚{UØÁÀ'¶õþáûoì½×sâ)›ð]ÔÌýô…öØütÜÝ	yãKçˆî¤´²J]Þ•¸9xnóFïÎÐpþÓJ¾n\\ún¡»½S#FÈÚ*SqÝæˆem=÷óRJlÌ2a‚\nÙPàØÂz*¾ýú{\0tt¿¶KÏMK¡R*„Ûæ Ôdˆ(fSÇÅÈˆ	ƒ½_¤õ¢4XnM÷“…±[žÌŸƒw4+¿º}©âñz~¬­ïø>ÎXéoC\0òÐæòçˆf/\n<LîO+l>¢†óî\\õEŠ¶ð&pOPÝ–P\$ÐÏ^ç¯T¥oè>ð0GîˆLê¤%~%‰ÚÑ*òÛ'È`ê&|Ö\rc\råà<‰Æò0@ NZ¢êÞ¶p2ê®í®ç#=°þdúm%DT„ ^ëüÐ\$Æ‚TeJûì€ç±	bú5¬ø©¶F`Ö&`Ü[(éƒˆ(pØaP	Îa0Ö>0éNÐ5Dø_0åMN·Æc0Ú- ¨ãôU á°jü3‰·\$*MK>'m>ª¦OE\"Gp™pž¥k<GÑ ê1%\nì#½Ñ_K@Cp\"°\$€¸TpQ<Eñ@@±yù	1v=±zçqY*Ì'‚ö6\"ÒLÐ²›ˆ:/†ZÍòFÐbÍ¯Æ£ì³¦|ÁéÝ„²*Œ”<Æ|íŒÂ9i‡êP3N÷d4†ÊñÐ3E%îºx‰|&#‰KŒ7ed4±0HòŽÞòå\nPì ïS®ñâôPëï!ÍÐâñÎÙ„\\ïr,ÆO-#-«/ÚEàØn²ÐÈ8â\"|‚@ê7êd%àŒ”&Ÿ%0 Ch\n ¨ÀZ\0ABö\rÀÎ/Ü1êñ+°É²†ô&a\"/0ïL·)#âÄ.ò0ìÎa‰Âò²‹)£„x#l\\:ÂRbÍæD£ê\r Ì \nBì0¾kk%«Ä·„‚màYÎˆm¿GâO‚Ý.Ã8ßkÄß¢J5Q€\rÐZƒ‚B`˜\rãl8à1i2~‚4\$&aE¦àXQ\rÆÞo\"€ÖJèü£6ZÑÚO‰øÄ\r¸bìB'‡D´sS3‘ÛoB„íÆ2ã61Ã .¨JFÍò“^ZÃiòâUÁBWï„?2îZÈ\röÞÊh'By%i€³¢ŽVùëIÈŽ‹:š°\nÌHD¢RSÀÒó~\0¬\r Êâû-€êBà	óxXCºW@‚-æ=« 	eÂÊ0ÿ4CÊ\0fÊ0bNUGöèÅì¨ªD‰Ý5«b<§ÆsÎ'SÒ0ÛæadF;Ãö%\r64gixž€";break;case"sr":$g="ÐJ4‚í ¸4P-Ak	@ÁÚ6Š\r¢€h/`ãðP”\\33`¦‚†h¦¡ÐE¤¢¾†Cš©\\fÑLJâ°¦‚þe_¤‰ÙDåeh¦àRÆ‚ù ·hQæ	™”jQŸÍÐñ*µ1a1˜CV³9Ôæ%9¨P	u6ccšUãPùíº/œAèBÀPÀb2£a¸às\$_ÅàTù²úI0Œ.\"uÌZîH‘™-á0ÕƒAcYXZç5åV\$Q´4«YŒiq—ÌÂc9m:¡MçQ Âv2ˆ\rÆñÀäi;M†S9”æ :q§!„éÁ:\r<ó¡„ÅËµÉ«èx­b¾˜’xš>Dšq„M«÷|];Ù´RT‰RÔ)·ãHÜ3½)CØ÷‚öµmjˆ\$í¢¥?ÆƒFÏ1EÁ¢D4æ„8±ª‘t’%L‚nú5æ8¦¤ì‘x‚&‘45-èJÌh%¬éz‚)Å¢«!I‹:Û¬ˆÐµ *úð±H¨\"ŽÖh\"|˜>‰‚r\\-q,2ž5ÏZÈû¡¬”¦¬E\$‹+\$’JòÅðz¢Å,mZHQ&EÔ‚A6”€Œ#LtU8²’i’RÚrX\$ŠTf·À´|˜^@­b1'¢ñ\"ÜÈËŠÒÈ_>\rRFÅ‘\nl¸¶ê «ÌqÌ…\"¤„ýúÐfDÅ<ï”¥YÈu¬.Î³ô´ÝV­©¤+Y22-Îè»Ë;Q(±\0ŠµZøÌeœ#Z­œqf3Œòj\n#l¥Îõ¥PŒˆ#>ó¡€MÙw(²åvÜW‚^ó\$•ýÅaE%#ÊNÄ2n³@¬ììö±*¢¾þÖ3„ÖŒ3¶Õq2J	m%¶=6¤?o;º³µq0Â”%p›CX6.J<´õtI“³é‹’	™£ƒCT\\;[Òî(”¦±DŸ Íb¹³l]ƒ¿âˆ™E,uoç	Ú^§²Þ†DHIÃ˜ªPÈž<o+o±­7]êz+)E•uÃTm»{ïµW!I´°Ö‡Ãi‘yr2—|±‹¥‰%1{Â§*\n–¡¶«¥úÆrÅº†Å±8¤É¦Ø’n5^é­¸UkÄÎ5«%Ußû0Ø:MËv#“‚7ŒÃ0Ù«Y=/5í*\rî Ú0ÃÈ@:Ã˜ê1Œnpæ3£`@6\rã<9…Ž€åé#8Ãeæ6ÀC«®aJÖ¢,r%(Aâ¦‚3TG ¸‚,‚ì¶Öº5.¥9>¹’!-m¸ˆ“ãX‡\nëuy'˜µ²\n@Éá¬\",õtcàºK'•®©Å™¬!uf5Ì” šC™×G0îÃ’í¡à8—|  <&õß`zƒ@tÀ9ƒ ^Ã¼YÁ„2?\0ÜC.ˆœ†PÝCÁ×z¡¤7ÆpDtéÍ‘</÷ Á>	!´8°Ûƒ <á„Ð#ùÙ\rë´èÈ€ÂÎi‡0<ø¾ƒ¡kEh™ÈE‹¡QÄÅlA¥¦‡YuP„žBAjZÌÂ )Ž±È:æ.Q%sX#(ñC1hb”WCB\0%›XUåÅ°rjmVk1bõû“'ô„æz¥s(DµÀgbWÛâ;/%Ñ«3¨F¨Œé5Ë¹3žõ¾åÈÑ*….ÌH<ˆEH°ƒ\"äVâú%i’B]Ød\r+´áÉ0ç¤aÚ9îø8‡S\$Ã0r\rá´ºñ!ÙÙŒÀ€1¾\nt(”<9³u@\$ôZ—æ(O\naR_:Òg>¤Ú¸Hå5fˆ†‹5–¤ÍPÏØf¦\nU.‚É·§Ôï\0ˆÈÑ‚JPÓ¦x‹bßpIÖRP	Êº7è=8úâã¼ˆ4†p@Ú Ç(àœ˜–‚¤Èz´4ÇÈ\$ä•r£Tr‡‡#OKši¹;	’vVßÊ,®¦£\$ÚØ€O	À€*…\0ˆB E\0¢‘)ú§ÍR<'”º`žâT,H\n³@€\"P˜m\r£´¬d‰4dÚ,RÙaä\nØ®S©…•P(Ù\n”ETD®K\$ej!\\'2\$/ÓK12Œ]ã˜–y8ÀPD¡˜0½Ù&ƒl¢ÊjOÏFÂ Ku(¨A¤­÷øŠDûU)Ff•u´‰˜õíC7öd´“PY.Y®såÚU{]K‹qó.|ª–ä&ª„,Aª¡påÂ¹†ˆÆ:VJä¹Ø9ÑÃJ™‡\\`·np.e7ujI‰ö\raJìŒ\r•¬½µDªYuFI[\nÑ!DtçÐˆ^H:«ðÌÒ“6Üæ4ÈøÕ&Î:¾Äar´>äDº›”‹A\$Ö¬™3+è¬­Ð%A[4â²‚˜iA”:6–|\na”å†3®ÞKhq»	Ñ3et'‚¶PùMÙA.¶&…W°“ÀÅ|M˜ìæC­¹o-uBFµ6Èè]²ß )‰¸™[¤Ékßh{Ök¢lêÇaš’üÊ+h¥ÉÌ¤‹	¡’UÚý[S¢sir«_¤óä± ßÑ5>O@P5£(…v+?Eßn¢YãŸ3®‡1@+‚Ë€ÐlJT.Œ:yvªÑ#«´‚\rölµ¢÷àHXp&Þ¹Ø¹©ß(Øh*R ÁMÃÉ¾S•WÊ¼Ö·qÚ\\˜¹è€K˜áyxðø.cxLâ³Ó‹®Öß†ñšÙ-Ü{JòMÄA{Sˆr‚\$åVtáå¼-›~u/þãž…6XQ9uBnu\\ÿŠAû\\CŠšUrRëÉÓï)è%Wu¢ëPFç|™Âö©Êœ/K4<­¤.»Ãºÿmâ]¿±ô²ƒ¢z®ŒA2¾Ø4É%…Mº7bÜÍU«Ç.jˆ§UT)Ê9! ×Æ–ÒÂp¯ŠÃwï'1Kâä<ü)HÇ=´\$âd,P‚ÂS˜hnftÐSwŽõ,éÓ.J8r¯>ØòÓ[ÖªÆ÷¡dXèeec\",á1Uùçz¡VN•UáÍIyI!Ô.jÙbIö%p”y™—º¦ Dö,ÜdË—a7TA§÷JþEÔ@¤?è6¹sö§M4ónŽvd0Ä/Ø-oü_èU\0#þcLÿ¬ì,p\0ý€&J¶jïÚÅktÀÅD5\n±p3¥(ö©L¸äØšË©jš.ÉHV+å†)°\\u`úÐ:¦°j\$%d©¤,Ô\n¸„b ÆpŽ–K¬LMN¾ÍDbäJÓ¥t´‰~=¦d>KŠ'\$ä0¹åX¾J†üïã\0OÔÇOëKŽÂP¼ÃNŽÝŒ¬]\0¬,êl&ÆÈ@þ0&Á†V*Î›Œ34ƒù¢ÖÛp-œ^…Tæ0Ó‚HÑÆ­ðýp,-q„¦ŠP+±+¢k±îM,žÎ¿	´H‚ºä…¦\"ÄÂ>N†ã/ÐæN:ìŽBöÇ*ýŽ»*º*ÑZÔ®ÓO*æqqKÑPÛÆf…iåÑxáÖãŽ”1£Â±I„F	ä±ñ!fÐ#1¢Q-t±‘ª×Ñ!Ñ´üóÍz=nân×LI¤L«#î»â¨«&ŒÁ\"jÊ­œÆc>íâû¯*i¤Ä GÊgmbWKQÂ¯(^‘ù	mR•±Ê*ñús†?åÂið\0ò…pBJ˜Ú”­ÎùL<!1äÄqÉ£â±«\$`CQæfÓpŽÖÍŒ¹J°\\l[KêGÏÑÃXþ‰©c''±®Ýäu2ŠÖ‘Óòš­ÖÒ’A)ci&ÍÄƒÇ	#E(bÙâ¿+ÃñÇ+ã',+çRfBCâÿr®(­ÔÅ†ËrâdPH& ™dHÙÄ\nH’\$#¢0fGV•Cêï¢babHÛ±T»r\0‘'1±ŒWRrÉS)1ñ)¥½34o1x>á`ft»æN÷­HÖ…†¬~y¤oÇrÓ4£Ú`’g³dÛ3h<ïˆÇÍh?tEŽT-©Ö««°¸Çg21%,©p)îº‚y4	«9s/&,³W-Í )òæÝ…z>#];Ìë	S¯0É(s‘3Ð))òÚ«R\0'«â5Š¦e‡\nL®Ø\r’ØS™='ŒØ-—,r‚ì“ô\"T-S?=ÓE5ƒâ)ÓöÙbI‚1Ç—”@ÐtP²Ü\"Q+ØÝóÆSû2¼KP	D4;2¼F4@·³ÙØJç³AM¹2¢­&ÑÜE­€Lb¡mþ´³€„Nîc	ÇNHRÈ`ÞãÛtT’Ý”†õ®IIéœïÄß[/ÅŸKŽÂ]ŒJÐãn+À&±aô¥LÏ…\$D‚ÆÖæ‚æì®]LïÌYãNcLïà†w\0ØlEÒ\r8¤\$©Âï1%3Üb„Êè‘\0ê‡*Ö’ Ü³€¨ÀZ\0@ŒÀÆ‘dî³R™Jê\0Yn>àÑyI©þµ‘‚ã–<Ô‹UÔ´ÁbÊ¢&ÆjxêŒMCP5#¨	µ@ÀòØ[Q;(YCìB”\\Dfêu”¬f\\ðU•”‘·\"#€òzhŽû”ßEªØuÆµ\"ò&§\"Pt–âE\0ùÂ\nÉ-3btíO×<EN±^²1^îcCN )#L•õüÎð‡IÅD§÷\$Ìêÿö\0ÆÅ)\0õþ!ôâ—ƒg1Žb²bi\$éÜ¦%ƒ0ÌhñÅŒAu~4	Ð\$„WÐ@Ä£T»0©2V¦Ç\$»S:2’¸D\n¹c>uŽÝuÚbáA5ŽHn‡@Ò½,ô¥Ú\nÀÒ î@¬ Æ ê\r´z«¶:ùÆØg\"¬¥ì plÁ8I‚_CìÚm&tB ÁOk`HEYÕtYÃÚ”1nTåv“mgco\$ÂÀãKaƒNg|:Ã‚yö¡jLö]£“k?\0T€Û‚Páì\0[†ÛQL¸T(qD*.`";break;case"ta":$g="àW* øiÀ¯FÁ\\Hd_†«•Ðô+ÁBQpÌÌ 9‚¢Ðt\\U„«¤êô@‚W¡à(<É\\±”@1	| @(:œ\r†ó	S.WA•èhtå]†R&Êùœñ\\µÌéÓI`ºD®JÉ\$Ôé:º®TÏ X’³`«*ªÉúrj1k€,êÕ…z@%9«Ò5|–Udƒß jä¦¸ˆ¯CˆÈf4†ãÍ~ùL›âg²Éù”Úp:E5ûe&­Ö@.•î¬£ƒËqu­¢»ƒW[•è¬\"¿+@ñm´î\0µ«,-ô­Ò»[Ü×‹&ó¨€Ða;Dãx€àr4&Ã)œÊs<´!„éâ:\r?¡„Äö8\nRl‰¬Êüž¬Î[zR.ì<›ªË\nú¤8N\"ÀÑ0íêä†AN¬*ÚÃ…q`½Ã	\no\0Ò7ð2k,îSD)Y¤,«:Ò„)\rkfä¸.b¬á:®C• ÁlJ¾ä”ÂNr\$ƒÂÅ¢¯‘)2¬ª0©\n¶Ëq\$&‚ í¹±*A\$€:S®·ºPz±Çik\0Ò¸Ü9#xÜ£ ÊU-¬P¼	J8“\r,suY©ËÔBæ¸Ú\"¨\"+I\\Š•Ô²#6Æî|\"Ü¢Êµ(„+är\0Ü7¨¼CUÄðRl·,ÊA\\«'\rí{E­H_*Ñ4èØ©ðP)ŽDXÕÒ\$B\0Tº2º&4\ršR¾BÕ\$žÏ.k{¡Îk=8ÞFá@Ž2ãhËfµN=ÂÞ®}Îß%t\\)Äý“YcÈæû¶‚®«Š±2§,5Í–2ŽOåƒSHr­OTÙe\n£ž!ƒVHýrC\nRR¥BÍ„Áä54BÆåhŽ5)Õ–¼1+%’\\à«I‘‘À•B¤I’qi)ôSGZ¸0‹m—·0¥‡oMór•3_5LCmDŠa¤RË«†Ô‚SÉúÒ\"¾X¬ÃW©JwK¹šŒPn)Ô”¼Úæû§¢5†‘.:ºõ_opÌ\\\\Ðm6È+¾Êá(ÉU¢òÜÂXÙ_°Æ[Pë2BmªmŠF®¦Õ‚0ê7c¤û=«üdÙU)ÝHP Œã8äö¾Ýžá&ÑýZ€auŠ(¦Î‘/KTwýK,ó‰~¯¦Ûš#äÊrûµnöš!pD1€Ä/²Æ6ÒfÒjóéEÊ^-¨u£¨Ø6>/óØcÜŠˆL)¿26dnJøpëO¾'ÎÛ²!Å­fšËèf/½º\$—Ø”ài¡q¥¾5õ\"ÙÞò@W®\r»BðS•ù±fô6ØTæ\\!Hqèa9´&â^ƒà`ïÑŸ+4ka2…	¸˜Cw>\\›¥.ÏÑ !&èÕ  î¨·½¨N¤RÖ4q]Ü6ç²©ÞSß\"I“ð’iÃxrŒB&ä‰cb_Èù~Á‘\\àaÕ‡qª¶”/	 ¹tkŒˆ³	ó¥‰eÉB—\"«Sw)¥2?\"ž¾CbÍGlî†~xfÁ±†S€gËÉoKe%@ÞyCkþ ×‡0êÃïa™û†ÑXs‡Ä9K°ÂÃ\n+IÎ†ÔVO¸(`¤¯0¦‚1H6fDD\$vôÝZø7¤Ò©„p¸S”lƒÎƒ¤èþècR&G«M9&”Íl¯L®;¨v\$a\ng)ÁÒ/e†N(u	‹°ÀÄ +…»X-­BrèŒ>W'<·ÀYä Arºžª¾|6×¦ÑHG~m­ïPCbšœ‡0ï\\¸eÀ4»ðÉJAàa;Îü3ÐD tÌð^êÀ.(³X71\0]C8/¡º±'šÆŸð/Oä9àéS‚ùÿÁ¬èÞP5c€ð†|_Ï‚î?!½ËŸ A.CYâ\r!Ðó1	sWCpt¢ÒzŒ¢ÎR\rAXŒ‘78Ð¢Q©d.h4¾fÌè'É( H>15Rü\n*zfìW&²ÐJÖƒS¨–€  …˜ƒvnš&åÊÆÓ“¢Œ«¤À[“¯:ÎÊÇ|²Éå–‹H[Ü›æ{l2å•+voá’;Qqä³ÎX Dgó[¥E¾AFäÛôS\rBÉXÕ}— \nº{›Óp¡áü&Ú/D¤µz—¥'¥7\r{º™:Ö ñ~Nä½^QKR0œŸƒæ¶÷-\\\0¬gúŒA\$‡“¸ irç’Æ1àÝaOÑðwáÄ:žûƒ’í2UÊv~k e\rcOqÀ@—–#Ò˜ùá\nÔ*!@'…0¨…rä5ö«,AŒ´ý…rEÓY÷:Œu'°.xz?âûb'á?`ÒÃ¨rx)ûTPÊìOHe·.;¬Cj¥'¡º^\"ˆåêPbÎà€)ÀAŸÙê©A*\\üåÃLpŽSOãÚHƒ DÆ‚@ºtÜÍømÈI”¬;å?`O	À€*…\0ˆB EZè@Š.ÁgRy²åG¬\"yTy¨ñH¦eªÛk3HÈ‰4‚€¡)ƒ\r‚cî{k]6Ý›â¶ËžÊR€å‡iÜ¢öÍæ[ÐˆC0a~Ö0;ÙJúQoH>û%(ù‘•ÃH‘sVmÈÓh.-.+äÂçˆv‰–v|M!	OfqÅ™µç}|o¥\$™=¯2Qv¼cg[»4ÌçÑ\nºt†~\$ÐUHaÀ³R/-íI¨XUÜŠ<û“æBãh°A)^¹HFs®YäjBˆÐw¡é4opqI¢éœã¡ˆ\"§2ìŠÒ;—Ï.«ŸZ@²îÈ‹Jo#\$QÚoNø:õ¡(g™>°\0­)ƒKú=ìPdBÎ	O…ïMEeŸÐèfÙ>ˆÁ\n³YùÇ!Ô3†€Aoî\r±¬îÎÀ/\$B½ØÄ±áÂ7Ì»Â'éˆaÁK|;ðæT7„Û[Û}±j:T~pH 4‡ Ê‚ícã…0Ê{ˆe›«28™'ø)£‰ÇWÞÚÝ¤¨:eÃ‘ÂÈŒ€’·ì¬ráL1†ƒLfä™KºÐîÖùI²ûµlÃÌ<,ã¨†Nxæp\0Ö+ºüÌ^¨B\0Hüµ£¨(Ý ðÐkªÞˆb4aç	\"ŒÐ4ú©ï,JNÞþ…~Õä:Žtìâ\nHÂæ˜8P2¿®”ëÎ{‡H‚-àGðM\0­¢…¤õftµ‡ÚMD»Ëú†„4q*Ý…Ì¥g4JA,hBj…vé\"~Èâ—(æ+äÚBÈ\n/nø¦\"ëïï°^éìÞeEôê4„&fM©í*H„.S	‹òìbÞ1®Âå¨DHh’8Ç:‹b6rñÃrs‘ê‘Îã\rMÜNøçÉÒ^éî¯`AnŽCEæø(:)–s±Ú	è„0-æÏ&» \\0îGQ.·¯(µêKÐéD½o*11KìßˆžÖG§ÀÐßì²Â ²mÊê.}‘wËØËøg¦b€q\\oî‡icÐük£ÄßÏò]kwÄˆ±{“ä¥¨mqpäPoÉ=Q}Qâ¸kÓÑDS±¢~1Üæñ› „ä 	B±`@Ç î\$#QçÐžŽ+‰h„k^(\"†(°#lâÛq¥R>¡ê( \$/µÎS‘rsPfQè ç2äqNAðü¶‡!±\nÝÉ<FÇTÚå·)Ëèþn\nô²Q†Ð÷Ãª³ÆXèN\"inºAæŽ)êÞŽêîfˆ¢l@‚p¨,êeÅVp±¾Ù²`KÆÊöKË+ZâQËqTˆ06bZ\0†=‰L`ÃZN²\nIY„BÎTP0í*Ç@¤e„}ÎØˆRøìSÔáÇ# mâç=ó?	l?Ó3'S6¢³;(ò¬Í¨Ü`‹s&©&ëC’5bú8!1\0pRÏ2Ómq[±Á3v†Oð¦’¥RúWÒq!óU8ña9Q7èZnÔº³‡%2âÁS­ñøD)\0‰MÈ¦nFxá\\ÐÐGGJRe*NDÀ*\\'íîß-öÐkÉ%+”èdo+çª-îçã›@#/(„V”Û‹“,Í«=„Â†èàˆkA)\$ˆQ‹,`ÎŠ„ðsœ…ó¡6èQ:h\r:¦ù\0mŸèZÝCª„\0¨ àÐM–ÿ©ÿé;0'ÚÝg¤b‘nÜÐÖËÓÇ‘å’ç2®Q/_8ÔOîH‘\0ì…TzSÎi4…D-Z‚S‰'3—EEN]J¨zsµè}-4»:T¿JWJQ!!ÎËL´µ“£“}MË‡LTåL“ìó!3ÔÑÎŒsøÂï·84—MS½IÓÀ„©)B¦iQ55Î×;´›73©OH÷PÓ%Q	/N±WD”½:õ85¦ÏuDÐÅIˆ²o’ÛS	+U’xR¦.\"†Í	GuD†¬þç3”¢±dáÐÀŸ	ìœô6zuPÖ4™50ÃV£zfn™W2‡U—W±–æ5:sF‘XC›bSZ’²BŽëèÕIM•M3•ÍKpKux|4í]´ñ7JQ)UÎÕÕèëH?LñÓM3Q4Û^t7Ë>8³ƒGÕGV\0…’ˆX#[O‘04aetÂ²Dir¢†óO3\rÿÄçÀPö€Ìb\nÆ˜'.×à¨+rtpv»dhDQ;HìÐÕîf°\\Áfi/É%±\"3EŒc•Ñ>«hòMÖ\n5¯Gg™=Î|çqkWQ~ž4è`4d  «r¶Õ”þ¶q6tŠ²¹gËL¥¦–Õuû1õb3ÃO,ß8ŸaiJQ•i´oV¹@ö#	;gNÛÆÙ+Än_[—àu¡]óYqõåWô•]”×_57a…rGtÍ25/YöG<TÁt5å1.R¨y;“éˆ„ñ	:dèÚ\0Š<+\"·.‹2ñýr·USv°Î7¢a×v¯P)9êxTóa‹×m`qyWxŽnÑPVs”ï;ñF8¦twªdÄÈ¡ÃIwW³y´EpNC¡]|³ÛÕy—·R×d\$¤Cõ6{ƒŠârÿw2ò`Ël/…·Ug!€Ô^¢Ï\\ö÷Îè¿%‚,¥A\\%\r`”0¦µT8s4sU’X7VWSz7/XØ:6x>ç×'K•SEëa¿„õZçÖtõS8O<\\vdÏ•íÇ1ú‰©/q]u§Ó‡m‡Á]†·òí¤¥\"ˆëˆØfÉÓ\"DÈÁp©“«põ'T4{s˜[‡7Â|”W[ÆÞ·ïv8±†÷¡_I_b¨W[Få{õ8ÃŽø¨Ìl57ÚxÕpÙ\0ÌHq;7M‰÷ÿ¬'ãSF·}\nE7Ñ9÷’’mé	‘×ƒ„xéø¿jíq09=}˜‘HÑ1pë{˜mŠåJ[nðQŒ·€½ùIsøK\nX^‰91%M\r_Á“Nu9ƒ'c˜•ë‰¹Ž6“MQä‘–Ù…]6•–9k™·	_øî‡7a”9©‘ó*tçá}÷yÚôÅ6×	í0å*u’ó‹…ËªT…2P}ž®ìc9ñˆðIŒõY\n­'/Q\ní ”³œó·9GšÖ5€§/Üúg×Xù·…&™0èñBgîG¯(ÎÍ·nÁçXDñÑc‹Â¹¢oè’ÑöysÔžSó^+y[4§Žj¥úouÂã™1÷|Nžïb0dýFÃFBÔW	ôs¹M¦uÿ(¥„AåuÄ•r³)…l\nñ[æëJ{šW¹¬WáUú\rTf¼^zÑ(\0†Y Øl†\r Æ\riPÑŠ”ý,j>)p°€ÒÉv±b¼ÃÖ<@ÚòKÑ€ª\n€Œ p[±X+Ú_ŽÈZŒò·T%&®èã{ZXÃBR^øç—Ów­v“’V¶Œj+Ç¤ˆÜÔ[Y`!µøùŸ‹­(xv÷‘h>x’„µÑÛ¥ªg%„” ¸ò1êo±3¬q²ÜYOh\rŒöOg‡Usa8:Í‹S\$Úy	s\"™sHò¦¶“ËVv±–'&K‰È-õ1»ÌE'50XÈ…0Îzà˜ÑäVE¼(«Ž#Ä>£ûFŒ{Ö\$üŠ›¨µÖóÛ’ƒîŠ¹w¸y3¹\$G^£î(ÓyÄ´ão‚éæ©ª|Išøý[¹ìNsÊaºàð¦+–ú³Í\n™ía{ÃÃn…¸Cu-rÓ’\n>¾< A²Œ‚\rãQ\"¯Œ¨ü;S|?PoiÄTQ\0Î‡/TÃã«Èü½É0bv²XgŒ¿b=™á,×tE‰ZxpÙµ×'×HÄp%Ïî`_ ˆ>Í6wïüÍŠp>ãÐßÏŠú@@\nÀÒ îNþ`ê Û3¹y4Ø1oâ~	ü²šÏŒð„0VÝ2ƒ@N%@Á¸5'1Œ0ÇžPÍ¹Ÿ‚“ÒHøò\0©Å`>Ú dC®VKOš´WgªrÑqvZüdn¬\"I}¦ãR’ä<~_ †wýˆ°ý‰Ò)YË`@=]1”Ö/&­êà+«h«ç¸öõÍØÁoîF1y89Øê›Ø6\0	\0t	 š@¦\n`";break;case"th":$g="à\\! ˆMÀ¹@À0tD\0†Â \nX:&\0§€*à\n8Þ\0­	EÃ30‚/\0ZB (^\0µAàK…2\0ª•À&«‰bâ8¸KGàn‚ŒÄà	I”?J\\£)«Šbå.˜®)ˆ\\ò—S§®\"•¼s\0CÙWJ¤¶_6\\+eV¸6r¸JÃ©5kÒá´]ë³8õÄ@%9«9ªæ4·®fv2° #!˜Ðj6Ž5˜Æ:ïi\\ (µzÊ³y¾W eÂj‡\0MLrS«‚{q\0¼×§Ú|\\Iq	¾në[­Rã|¸”é¦›©ž7;ZÁá4	=j„¸´Þ.óùê°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€èù£€È0Žxè4\r/èè0ŒOËÚ¶í‘p—²\0@«-±p¢BP¤,ã»JQpXD1’™«jCb¹2ÂÎ±;èó¤…—\$3€¸\$›Ú4Ã<3«°ô/¬m£Jæ¹î‹®®å†á'ê6¯¹DÚ²Š6ªÉ@»•)[t‡¯ÌÀÁ+.Ú~¶ Êñs0/íŠpé#\r“Rµ'éL[IÎ“Ê•EhD)1q7±óŒhæ§ Þ\rlŸ\n(‹ÂE¤£9ÁîÂÀ¨*P“³>—t\\›8Ò*/¨ÔTI9—Ü&€‹35 khð§¤Ë_ÈñÒH\"U¹³Œ°×Fò™q8Åã·.§Îe|€Õö’&“l UPÛIú¶ž¦sLìJ«/\$ý'§¥Ûa·òÊæ‘jYfIŠŠ²¿Û±ÅaY93dÅ\\!W™qJC”Mc=a6¥¬ïT	Ü^RÛQShžÑ+;¤ŸÄ…íF«ù!pYÞë›.øêá^°Óƒ,EŠªg+^ñ;ybãFbíÓ·D©“r­¦iûÃD£‹ËmU2Å>ÇÔQ£·¨°6ZP‹ê§wÎZ¼Dð¸7‹Oa6%>žÔNÞÍZamãŒ‰3•\r%×ös`9ûŽ¬¬0ãÂäS¸\"Ç×Väã\r'ó‰B¬ MŠ»JYzé;hÓ¥lïiû³Pë2ÆP¶ÙMÍž¹¼øÚO\nËÑ»pá)È;©êwQ'³Š·poÖrh^Y.QV+³²»·#`PŒ:ƒcý?!\0æ1Œ#wi“­\\:Ð\nbˆ™mI+‚wÑd°ãm£äµ›ý’w8%¦»Eª‘ý•  ü1½ëÆ¾è	«o‡…jœ\"ºÏ‘c\"oÍ©ª‰_è‡zAŒ4PÚJËLLG–	ÁX.‚œ‚Á…A;¶³UÊáLP%Y(2ÖÜ°˜kmé	<6Wá{›;ìòœ6œÖ[*ÜOmÁJb³\nœh.Áè0ÞÒÃ;Bà(6@äAê!È÷†ðÌƒb<¨=3Â ]Ó2ôdFä*óåÃpyÔ70êÃüa™æ\0ØÃ:<`°ÿ(äC8aG€‚E‚VêQàu@  9‚“ŠsZI`I¸¢ÖØS\nA»Rà”‘yÛ6±í–XtÅ%b-båö\"É·>väÊSRQïµÇQ1s¥¾\08ÈV»Õ*bå`)Ç ÒÃr‚–®‘6ÂÚ2‚˜	 œªÆ|Ç!f®Z7%¿1%ÂÜR*Ü¬ÐÂÐ(r>s¼9‡pÞ›¨eÀ4ÅÀÈ\0<„¢.`zƒ@tÀ9ƒ ^Ã½Á„2I\0ÜC.žáœ†PÝGCÂŽ³>‚'žØt á}½PÖðI\r¡Àü†Ú<à/ ùK‚\nlÃ{u?ôø0†³ÞC¡ó£Â› ùVwÍAÍU)Øª°e\$`žäÎšS#ž†”!ÝPéÒ8óø¦%akIÉD-ÄìNá1à@\$\0@\n@)PHQÿ¨—lxÈAn\nÙ¬Â“”UJ¹Y‰RÈ¨UÓ*}OoÇ™×FWT1jEí.kºJâxK\nvKUN¢Âº[±Â6	ÍeXvÞ4Ú[“q5\$ˆf’Ûô·Rå`\$’PòzA\0d\r-ÔøÔçGª?±p8‡SùRC0r\rá´+§’£À€1ÇûŽ®Tó?h>ÅÀ¦ù_…jª0ª¢×>VÊé=ª¥\$\\cMká€™PDÎÚWçN·³v¶Ê,é\nZˆš-ð.ìÙ*KÐc©é\0&nD½©8òQÁmeÈšÓÏp¤Ñ@1þŠHƒHg{xcð{Ï¼\$ÁR»=Vêiœ÷©5#Ý+©qÃ‘î£/]Ï§•:LØñg¥ÁÎ\" ²\\lgrÊäðœ¨P*\\«•Â E	.¯ù4t‘a3E‰a´h#33Í\0ç¶c„NÎ‰Í8(±¦çj\\ê£×N5þ\0;•v²•ë|ŠMü\"PÌ^eIÁ„6\\â³4æ²¬R‡\\>n£t\0Ã	EàÁpÎíO.ªX6vDâuKl	`ð–5Ç“RÃ¦!	^XZXìu…²ªcž¯ >Å¼ÉbÈdís6:ÚŠ2õ‰@kÙ,v\\=iºÊNl®wö\\å2\rÎ!6\rG\n¬šOœhjÌäåã¡Ðá¥lKDµ%(RˆÉ	ý¶eÀLƒ¬\".zã+µ«v•·pŸ«uRðõ8°ÖJçïáßÆ Ýµ)h÷Fe8eÅe\$)•NviáL4‡ Ê‚ÓK“ÌÓòÐ(dJæà=8)g6ÂTy:É-„œS³jä;”ð=|Ö„sqÏÎ‘0ºLã^ÉóyëGËŸÔóB¾šÙ¬ëîvÆ:íÓ	ú©Õ ´ÓØÜ<‹Ò°”áD«ˆ´”(RøoÙ÷µ¤¢u!qIûŠè‰;\"§w±Ýx:µ¿n-_rd;Škq”cŒ†µÑ?E÷ ®-­7gw8¸ ÐÓ¯4É{O\n±Tl?Õxõð¡·‡G(ës©Rû%ŠÙ‘À€™v‰R—BÔëq“µŒÀÛæ{>Fd¶•v;uöÉ=¢Ãm\0\\õ\\ç7»¸½…ìŒyáÁæ<Ç²S8þ2\"õB”¬{õ·÷°¯‘;œìíýVöñ~Å€ù©T|Eøî\0`˜Çxº@îb²}o†}®.Jƒ&S„Ê°z5pÁ6FÈþonøgèh­Î°f0D—æö_%ö;îø\nàÊL€ÈLZÅî-Ï¼a%ƒ”2Ž”ÒæÀ-=D(tph¬dZ[Åô9¨Ê˜bâëO¾t‹ÖhÎ¥èUŽU‚~\$œnY'äobf¨\0ï„J9\\EdÃi8šgfè†ÛMš;mžÿm£\nä\"COÎ³£ÂÔ0ÖÉðàYe2%ãPPðãaFPPÚogÂÀ­¡ŽfdH‚QH‡\rÉ”8£·B¦+qÔ#QÒAè4õ‡ÃˆŽsi–Î0ˆoÑ.4ìâÿ<ª\rªÞïJnâb¨ÓäZ²Ma\n|S¤(NÇO‚¶h¡D+1tÏ°eÄÉ6³ìèÿQx†~ó±f5®ÊÎ¦€08êÎ˜ëŸ1Kˆ`Á1]dÂë/ºèå”é\"¢®ïºÐeàå–1”ÍŽbqbo‘\no‡ÏOù§þñËäXÛÏ…Ž¿Ñ8_­¸€‘ìÙM~ã%IâU‡ûîÑ(O!¦+!ñI!(}!q^‰2ëè@„H/†DQö*ú‰¨G%èôòA#²Jæï¦DÊ¤êC¤ãŒ‚2\\©‰\rp@õÎ@QO6˜‚»±kÍD/«“…rùâ^ú&ì;oƒ&ïê²Ïî¿1AîÜ™ŽîCŒî‰90ß\"Qû®ß,‘\"+Øü2°ê&ù\"Ñ±'Òi-RÀû¬’îoå1;&rÑã©^ükþ™)ƒ\"ˆ6¾‚všÃ¼Ý/ßÞO…:ç¦²SQË‘Å#rU†ŠíêÖv\"¿i5\rŠ<30h®š.e?	ƒ ¨–o‚åÆüð­ÐwŒÔDLÛ2ŽÂÛŽÆT2½(.àýò÷,l˜zîE2rìKþ\\ÂVdPïªÑ23tQŒÞXèN2•'2çæ¬í1C0.~†µ%1õ'ãºè2ã	m¶lòîU‘·€k†öóç.ô/FñÍ,òY\"c›>ÂÙ?‡;sÁÒw\"òí<O<Y4Só=rÿ=Ô.H@òêlsëA‘ °s&SÝ?ô4ÝÅ¹?2€í…z:#hàk;\r'-A¤j[Bw F÷£Â1åEOòÉð–<%@¤= èŒRasùûH)%H’ã1S»BÓ¿#AT•Hj/H¤ŸB#…3û-4B®ÏBè–\rÎ`¤‘ý;È lcæºHò€ê‹µ1jåL´ÎšæõÚ\rôßN.OS9¥\\B‘˜[f ñâà0”vÍŽh™«š£ÈóK\rœ7òiQËLÃßBBT»µ-R3Nó;”Àl£A5:™€ËQõ1RC‘TŽÍTÔÖ€q¼„WRõ#SR?S”‘>8fYPs×HåM-5\n5RýSt·=ƒ”+pëP\"Ptó\$Z…[OTcË\\ªÅnL€¨> ÎðU]%R\\o£ÏKõb€OCi]UË]•u=µ›=õa@ÔÃ^4Ç^ZãN\0£µ\0ÓTC@HhÙðõu¾õµÂÚÕõ@²é_Ñµ[¥g\\\"õ‹óÙNR`–\"L2‰cÑ\"@àÐaR)`ô+L³«R'¥ØÜÈ †ö½Ò¨ÝHÔÝ”vÎÑóäDÓ4&rÇGÃhfè„±ÆRB“¢wEÖˆo†Ø+/ ýÑDE/ìx’¹k†›hïê”¬\r€V» Ò`ÖÀQšÎIÏYó Ý:%b°Ð`\r êž\0@JŽš ª\n€Œ p ¨\$xïÚúC*õDÉÂºúÏ%“ÞØ0–Ð–…g&úŒÃÅGˆ†&k@›q\0Ì-.âvQ'F9ä8+¨doVäDåÂKö\$ðŒ8éRªï0Æ\\6Ü9ÌÎœõ²|Ô)]òn­­@Ë¾„hcngPå€	€Þ¢—z7¦‘éî=äAfqÏìY³…q?¼®è¬Ž‡¨@©,Ðó“,³ÌO-¸O6j¶•+W;}òxñî,v5›qó]%u{@¨zø=cÚ=öü»`Þ†’LŸ÷Üè”¸o†C>e–v‡\$¾—(L»€Ÿ;6ò3’FôÏßÄ[uwûtìîls„É95XHê|ÎTWGþ4­o	OƒtD£\0ÒÒŽJ¦ê\nÀÒ î@¬ Æ ê\r³¥²d4sHd~…\\'¡=;òû­Bd'4éc‚Ê&LQ\$X×PMx;eò:e’vQŽ`â³~Dš*eRTG\$-{…\$DE‘NÖô8Q‡V’LV˜h¹ˆªˆž8ŽŒ8&ï‰ÕmUˆóžte(+°{G”H/°…a|.·“Âæv`	\0t	 š@¦\n`";break;case"tr":$g="E6šMÂ	Îi=ÁBQpÌÌ 9‚ˆ†ó™äÂ 3°ÖÆã!”äi6`'“yÈ\\\nb,P!Ú= 2ÀÌ‘H°€Äo<N‡XƒbnŸ§Â)Ì…'‰ÅbæÓ)ØÇ:GX‰ùœ@\nFC1 Ôl7ASv*|%4š F`(¨a1\râ	!®Ã^¦2Q×|%˜O3ã¥ÐßvMóÃA†\\ 7\\Îó´ÀÎe9ˆ—3©ÀÈa:sFƒNdépÉð'˜éÐ«ÖËtFKÅèÝ!¦vtÓ	´@e×ñÐ#>¿±ÇœÍæã‘„×ßßÌ ¢œ‚%Ö%M†Ã	º™:ž»§I÷r…?ÏÀÌF˜ù¸Ò 5ö»”	ý\"iñh`tÊtëTù;©ðÆ¡Ž‹Àä£î£òŒ#’Ý#Cd<CkºëLºPX9ã`Ò*˜#Œ£z˜:A\"cJÐÁ¤V‘:ƒ¨Ü:©í|\0ú@eˆ(A£{¸\nÉx@·ŒPt#½ƒJÊI‹ÞÆ¼…Œ0Èæ2˜e;0Ž	óX£ÐæÐÁÂ:49/rð6¯\nˆÊ©ÉDøèöAëŠpž*J¢Ë9ÁÂÌœøAe‹\\Œ‰³:4%<¸2Ä´#9cZ’6ðk_5Œ­Ã¦ ¹ SI,½c’è#®¢‚¶JƒÄùCš|úOµR†ðÆC`ê©Ž«èòÜAíóO;3Pk{*\nbˆ˜øDÉÕr'³p´æ5„ä£2È5¸îªØ2+èúMÓ„÷:¤òE@Ü3Ôår\\Ð°A³ØëH6å#-ÏWGIJVÛ£ÐÜ³!#[O‰òË¨x.:®W}myAÉuì¸HÀUËsÕ´p6EKA­Þ3ÐðÜ2¤æŸ\rxRÌ*\rëœ,7!d9Æƒ09ŒÎÐ@¹èæ3C–r0Œã\nX–QHfÐ…˜R“Ä˜äƒA\0P!ŠbŒ„S€åŽ¡pAHCjxÐnmD’;c\nN!8[Ï]¢òÎa™.’ãÊ2'É=™yŽ­ðç3zf6ƒ®6/ Ì˜³C.ã£JËÀË¯¨&Œ3<(æ;¤´(Ê<`Ê2mAâ.4C(Ì„C@è:˜t…ã¿Œ#&¤É(Î¦>€ðý ÎX^X#“.:w‚úâîa|\$£…47à^0‡Ê#3}\nÍ ŽsD4°£‚=›¦#§NÃ“‰MÎ™8ðèsÈ>BÁ°Ÿ8D¤IÂ©â}º‘#0Ü	+ a@\$£Sš Dt‚‚ŠÙø§T'¼þó\nžJª#QÄy®\0ÒPñˆ_Ä±‹æ2ª;Œù‘¿!epnÇ*åÈE]\$zæH–š¯\$á\$‡’DðT)‘0©\\Ž3JÈq°\\`ä‰–‹Ê Nœ:‡0Ë’WŒÆeÔ™vZ!Ì96/ä¼-\0 Â˜T6D|ƒ4ˆzOzª-‰D“S>û™!ndi•½§ƒ¨yèÉ‰,% E	óÇœ7sOÝgO˜7¼–HMƒHgc†b`KCIÁRÕ\rÃ%0¯â6Æ÷G˜±Hpt0»äy–º\r‰BÄî'²‚…€PO	À€*…\0ˆB EkÁ!Ù»¦à{ÍY„7®¤øHbW3†q„@Š,és´3NðA<T»Ÿ¹­†YöÑñËd9¬\$Nîh™>-ÈAjCYÔ†l¬é0‡tNÑ…Å²5²(Rb2=\$@åœØ>tÂÍ a‰€ÓÍ´@ÂÊšo\"~RÚÖE<4!,÷¯sèI×«øc\nTó‘\nMPHU8¡¥u¬Ÿ¢´=[«áx1D6YMÃCEä.!>ËÛŽ\"˜E'/@¼\r é÷4ˆ¥ óš„”÷“¿)NjÐh¤}ÏÊˆ–,I9o/FmTI¹PÖœàH…ÊlRô‚&èé…52C¡ˆº£Ã6·R×Òk	4¦¶ Í};Á„\$[oü\"])Å>`òŽp\n„t3VÙìH±sóRk*+tÂ¡À\r4”·]¥¡uÎ4(åC3æ”@S.f !”³\réqŸ‡\nX'Æø½	z6n¨à¡ÖTä¼Î£Î²](%EÊºŠ[	}D(§’pÀ/hž\$Vô—¢Y-ŒÊ,ÍÈ_”.0¸.y:LjÀ.!O(l.,[à ÃWŠo%+ˆ(žÄ”'CìSzD>ºIÈ  Éb´ZÉ0¥Ô“¨£•…1pŸ§xÇáÌ‹‡œ*‰Ä&Ç'Ê<£”ðÈ§ÈXÔó¹3DJ@)Ã¹)\$ÔŒ‘²:ÂºaÎÄ¼€ÀhpÃa'\nhÉ`4/ƒ¸eDCBöxTOºü\"GÝ/ã,Å3R	€‹ßåæÈ»‘AÇŽ³àAO1CÎ®˜“C\$²@R]Ù !è¾D×mEáQ6µÆãO\"Ê±ý0¤d^æ|vñEY×ª\n)]r9²¬Ùs×ðh‚çrU`_è\0vœ‘ÚÔeÐÞf×¢\rÔ	~\"§˜¨ÀB„R²[9Jô_ÞÐãxo¤×¹.vïaõ€*-°ºöÖ?¸³[W‚ñnK”%V†Ý[‰ðë>Â\r«ª5pm=ŸV˜ºÞUê¼\\ûÁç¾Ûä6©ßÖ'àm+o–r\$ÁÊO*æœs—/`Æ—iãØý®í¼â9‘'èº†zÜNsÙpa¨9¬Å+å¥ºŸÌ¸|¢e¼t L.=ƒ8¤õ^¯†ŠŸ['Øãö¶UÑºw\"êÕmÜfŸt`÷l’Þf¯{èüÇpÜk´|v¹‹#ˆži2¸+áÛŽ±(Úõ=ñ‡,óIz°¿É±ÚF^]0ü,'Ã·H–UŠ•¦–CdéK\\·t·K•ÎéÈ:ˆqnˆí¦Åßüã„ì¤Ì-«Êj¯]Ûj[?‘®\r÷ƒÜÏãüÿàç\röùœì˜.ùÂ;öÊ¾¿{étŸ»¥~'çb\\ú\0\$Ê†ñaÞŠ‰\n¡rÞ…¯šîÉ4½ÒÑ®Ì7¯¶Çïþ7Ïˆü)\\u°\0ü¯\nR\0ÜRI m¾¸ ²“ƒBäîšÛ …\$\r%(ýjÍb7°<çäH[ƒh#bðsï\$¯\$0=î†î+{m¾üÎ.ŸV’làbWL\0á¥Eë\"@Ð|ðŽgÚý0«ºYðÚ½p\r	«·¯¦²+´€¯‰œû\0´Xc¼ü`ò¿Cæ@Jºªí”;+÷ÎoïÀçPÕ«Æç¦)\në”A¦n•Oý\n`OÎÞê1,z âØ•b˜êÐ\$JhR¢8ÊìÌ²´Ç)—'ó‰È5@Þ,Gã6|Ð\0PŒ‘ÁNÀÏÎàÅL6.ÛÆÙKÚàÉêHOˆ)… ½ÁN%v=£DdP\r€VJ\"þP)[)~mÄÆ&Çî `ª\n€Œ p7íŒ~CˆÉ¥±pHCœ`ëN¼ÄqO%¹jwíÄX\n½%4«G€ÍbRCÂÊÄä6‚ò×‰è*qi\rÄùÎJ½âd×f\0)‹ÊëÎ'Åø\\ã\rgD8@òˆ%Z9c¨3‚J\"Iª\"è‚Ö‚.¬Iƒ¤O%¤fZÍ¢ñÂÈÊFA«nñÊz²Ñ²ZsŒ“…Q&1Î³‡9RfºÂ”)F c\$\"0»O‹'\$|sƒÎ¯¬Þæ\$ä’êÄXQÚÝv£Î(W[€ô£ò´@Þsê¢Ù`è›HL‰‚CÂôP ¬\r Êä€\"žq\"û'éD”’†4G¶N†\\#@ôMbøž†W,«°7£Ø\0Š5ÒÀaf@ýÑç#ª¶å¢~\"ò^£BÞ§Ê!&Ä~gr4DYÂ^-‚vi-ðZE¢Þ\rc*‡>ª(2BÀ3å<P ä";break;case"uk":$g="ÐI4‚É ¿h-`­ì&ÑKÁBQpÌÌ 9‚š	Ørñ ¾h-š¸-}[´¹Zõ¢‚•H`Rø¢„˜®dbèÒrbºh d±éZí¢Œ†Gà‹Hü¢ƒ Í\rõMs6@Se+ÈƒE6œJçTd€Jsh\$g\$æG†­fÉj> ”žCˆÈf4†ãÌj¾¯SdRêBû\rh¡åSEÕ6\rVG!TI´ÂV±‘ÌÐÔ{Z‚L•¬éòÊ”i%QÏB×ØÜvUXh£ÚÊZ<,›Î¢A„ìeâÈÒv4›¦s)Ì@tåNC	Ót4zÇC	‹¥kK´4\\L+U0\\F½>¿kCß5ˆAø™2@ƒ\$M›à¬4é‹TA¥ŠJ\\GB›Œ4Ã;äõ!/«î¿(+`˜²ê’P¤¿ê{\\’µ\r'¬²TÏSX6„‹VZ(è\"I(L©` Œ¹ Ê±\nËf@¦‘\\¦‹’š¦.)Dæ‰™«(S³kZÚ±-êê„—.ëYD’¡~ÈHMƒVƒF: ‚£E:f¡FèÑ(É³ËšlÉGÓL•·‘A¡;–Szu CD´RöJ©‘`hr@=„¼®Á†BƒÎs;ãMNrJ¨Û­)ŠS3NéjfB£TÝ…ÑˆÑ54T4´62(Ñ>É«)ŒF#DMRD¨kgVhI…t˜—;ršFêöH‹¡ªeŒ_7iŠ]EÚA	MªüH”±\0Õ¨µ.AÂjã}c\\ñf‘·-Ýë7ß³bÐ\$›Gm¶¯úJ«Ý)ŒÊ ¢c\"Ð,IxâP¦*ÏbøÎ)f%óyenEÊÍ×O”Z 4k¡.´,Éå­ÍžÄ‚5oA¡Ü%­[4d5¼ñA0é²„„P„E­(™JÈ}3;áP\n’X3¨rvÄT0Ã¨Ø6:ï+¤ŒcÝŠ\"d>•áäa\r&žŽÙ²Rno7Õü¤‡!°Z5B·ÍãÓéKéFÂ÷ýî™ÀxÕÒ§©zuÉ)<f”h¨îÂP¦ˆ4ƒÊ]EzS]S7Rcõ?3Usw/e¤f^hÕKÖÍeœh±úëßÝû·Z˜tÜ\\=jB˜)£ƒçv¹pö[×Tt{e’ï`PØ:@S‚áŒ#“7ŒÃ0Ù«Z«5¢ Þå»pò£pæCc:¡Ì36`@xgBÍ>GöC8aB\0‚	±€@P€u;À 9‚’ÖfÚ†.«f\0†ÂFk«ÂâG]Jeº)aX¡\\,£DD”JÅ»ò&¤-’BN÷ÒD3ˆbÝ¥+Sl.Z®*%ÐG·7Œ½Ì‰%FåDF#Ä\\ÏQ©¡G	“en¡¡5Œ\"Ê&¤5Eù\rHÄð&†æwƒ‘ÌŽÁÌ;†ðäÄƒ(x¥õH\\	Ä}A˜‚ Ð p`è‚ðï%Ápa`7Pä£ðgá”7J0ðwŸði\rò”6äu¤ç™·°D‚HmH6Ê@èxaÉb†SÀØ‘Ø‚á„5œ€Òdž2t7H¢…VÈÑçé7\n†Yâà?Ì5Ó¬D ù¶k‡ñË¥3f£La7Çô¤¤¨˜@P³±(Îãê•ÁAg(ò¢œâY\nB*…<hˆæB#\nˆ‹Íøÿ&¤BŒé!Gí“=õ~CÄ³³¤õÕÒžZÚÅ>ÅÙjBˆñŠS¥ô|†½sz¿\nA½MPÝp˜†ÁEÜë ›Šù‘BâÒŒã[G\$ª/8äÞà™Ìj†åœž’.N ¥‰© å\$É<'Yõêuf€fA¼6‚\0ƒ&ß„y<8X½cGPô4èbÞQé`ªz”Ñb´“¸¼@'…0¨Ð*«¨Ç¥©’ê£CÈ! °ãFÄC?Aªs(éH®Ãi¸Œ(ê”¡.fwµâ¤l¦\"g\$¸œ4·Ù¨—8e¶†çù.Ã|š\$1Î›q˜èœƒ¡\"B0T\n71 Ó.£ôÐ™÷.µÖÚÀŽ<ŸBl)q¸5ÆA©F¡É¹E<vD†ÉYw()›.Q i„Á=\$ùÞ‘Á³ïÁ \"aAb&Þ!µ¿Æea¦Ç>ÞHYû4jfNEHÓz£R¨¼&2¦/Ó²*kTÕër‚ eÁ…³M\0ìCegVE6Ê­E.¹ÃØyðõ¡_e^¶Ur¤}¤Â®ñùQA	|¹ÕÒÉ\"+¨Sëš•ª§®ìV#št­aD‡dV;5lÀ•<£9Ä±kj+}Ê»0ö*\nÈt1Z9ä@†‹+–J9ç0=¬|}a¢??GñéÍ†Dç&úäÎiâ†F£\"™¹K\0êØÏyó>ÕìíJŽ«D°·#2Ë‰(˜›¡u¥>%ŽFÈÚ)³öo”*íC“šú)”ÇgÞ“-A¡¤=Pë`pƒZø)†S¤ÎðdÊÅé<8@âM5sî…×‹…m—áº˜t˜°CE}Uš¾)¬­»Â’SS_PVQ€e\"ç¹írDhÊ©Ã`REÍ	Žš§”}”±ôdè~òC*AaoM\rW#@Q;uö«Ôþ95=w^W™ºj7Äé¿;úcµªÜt	½&!•ŠDÑmtå—¡7C·½#)Ê÷B¤hT73k’ÞPòÉ3Îr©çSóXŸ9ÑU4(éÅfëÊ °//PYKí¢š.˜é¸êÆT\\užª¸i»#¥º9LËlšÚ Œ×¸º%8åSh[“j¤Ÿª.þ¬¹Áp	ìl;³=õM{V ÷˜÷í={Wu_ª(w®È§gïí8“ø-_á÷†Ý½Ì³1.¾âµ…{½9Ê2'3Ñ÷“Þ†äžAfÙ|~Ü~Sµ´¾\r»Ï®]^C&•?UàJ‡¶í¨ƒÜ±ŸwÓõ‡’öj«ÊüÛˆþ×íÔÖ„Ë¯vëXw#=îø®' €^yaY„	ýÞ|lyŒßŠ¤Ü·hÙëÐ£§¶zpZžˆš«È2¯{Éoñ‹»bÚE`EÂ„ÿ*]åÈñãöø\"¤ü/Ú>CVLª‚>¸Ðd„¨eF*bŒ×Kì…ˆ€Mfö3­ú§(†0ð.ée4mdÈÈ¨Eˆ²Ð\$xcLæÄ\rÎCPü¯x,ÄAŒììÎøpaðt‹íòCï.0€ûr,ðw°lzäÓ|LMºDÇ¦¡°›§¿ïpÛp4G`ÌeH+o6kp©æÒPˆFìè)à%IÒËÌz\r½\r+Ú]â ª%˜Bo¨2FªAfæŠÂ<D\$ÜÞmj*„ü+HÓ\nÇ*0ñJ`¬CnŸ‘\"l#Ó­8Þ§z!­Ð¦hÖ°²´âñºá„ÈÝñ<Þ'FH¬\"B£F†àP§¢ÄbT1&ÂÇ¼Ë§.ÏŒ´±FõHÙ¤Ë…LÍìûÖ ÂÉ#|²¤Tù‘±|{1”gŠCg›\rð¦X1¬ã0±NÑq¶ÝÌõ~{m¨¡ló´GÐ¸ú1ØuqÅEhîh¢{ˆáhŽå	'æLëGDcG®õ\$LŒ†·ƒ w®l¡†LGtï„‡FñŠïDe…I!R\n¯Ò1 „.p©:ô„†ˆqá’5R9!•\$,­\$nk\$Ä_\"\"È¦ ²1 MŽöà¯†\\n_‹×#å‘ô¼b¼®ÜPËÑ)#'ñK	N=2ˆ¼Ò¥ ŽñîÖQÏ)®€aL\$C0HGÍ¥Ð?Â®.¢VéRÞ>¤Eðªeªp2ÃòCrÍ\nêBS†›Îdœ1Ð‡'íÔaN|¤.LûÁ,¢q*ÔÒÐ2>‹j†Ê#ÒÔ¤d¼.Ç„ Jû+r¢ãr¦½Nß‹D1¢Xk°Ñ\nå2Ý‡&qŽÇE­1^=‘bd…ö(Íµ*Ò_ N,Û#w)Q†(±‹7“ˆ’Ât±ó	1ÌÎ¯z¥s|_Ð6ça8ÌÍ)’Ê„h[S’…;Â»;1ý\r²Ç	3e0FIsÊ{lètìí“¾¡®2O‘\\Edóp®X Ü\"dÕlŠWS?7È¬ÿ%.Jpÿ\rG\0¢r'læ’Jæåç;Là¾qNí	Br\$Íò[ò¯94#!ãOC±ßO+,SŸ+4BsÂneGŒf¦=ft7D®q³âèCð”`e“ÞèÏ>to\"4ruŒ< ê‡¨-4.*¢.2NŽHEKÊl\nyCð};”32Åøq4¬KË1<ñðtòÈ\\ÂêÐ)Æ Ô¯Ltµ#3Å®÷#SçKÔÕL\"éKá\rÑÐãÔ¿”ÙLHlÛŒ?BÑçNT’ó›Gq¸¯´èâ„ÉOt‡R>Ã®\0µ\rK’„áªââ¿<ôá 1OS“†Q•O’ÉFÜ¡5Jã…:FRåbäO³¯>¥2Ü.Šh®2=S·9ÉWDÒèÅpO“ÃTR…X…kˆ²ÊôQ=W(AJB¤§1„A@”%G8À± œ­šÝpªþSØSò;	ÏwAßAOc*9D…°ï*Wô\0§ó]]òH›E&5èþÔ´…„ŽRRæuá'¡d-efˆÓ@WœõÍb(â›@p•`)ý0õ¶[ƒZ5C(.é'o`(5å\\ðµ(°)R+d*cdv9dÐ¥`¯ŽT/B×çÈ\r€W+Ã|2«Ê´Òa±5AsIƒÕsf\\t\$Š'€Œ¹¨.¨î\0Ä™Ë|\n ¨ÀZ\0@”€Æ™ ïZóÎíuñŸ0G/ˆëÖÂñ–ÈwÆˆÂÙm/ëoML–Êy]n1N„&KtÎÎ[ÆMR^z€›k€Ì\$&E¤7BRë€>¤J@óBSòè•‹o#VY¨}lÓ.iÑ\0 «5h•Ê&Ò Ž#'ÍkfòÆâ’GB4§Ç ý@	‹‚«d#v·n‚èü9¸<‡ÐÈn>¬ö§lyMnz-¿04Þ1\$6ly	7“³#šŸõù,—§\nÆ[*ÅÕïÇ[G\n­rœÄLÒ—XJA÷•ÑFLÂ@?rèðâS|IÑ×Ûz¤2_S–PAP^>ÎÏ'Ðé{…¦Y@¡ô,J³k;€EW«ÓÍÛ1V5ÐBžª]LR OÏŠäàŽ¨ð\r,`×€Êb@¬\r Êà\nÀÂ`ê ÚÄ·ä(dßx¶PFbð\r‡ÂÏåÚÒxr]ï»6 ÐZCxÉ°È*?ÑTpc›lôËñ×ˆé‰‚5{óËr­~}Cº9ó„xJ×¦\$:WJtÿMd@ãQa«Ò&-¶ ìadö2m¤\0";break;case"vi":$g="Bp®”&á†³‚š *ó(J.™„0Q,ÐÃZŒâ¤)vƒŽ@Tf™\nípj£pº*ÃV˜ÍÃC`á]¦ÌrY<•#\$b\$L2–€@%9¥ÅIÄô×ŒÆÎ“„œ§4Ë…€¡€Äd3\rFÃqÀät9N1 QŠE3Ú¡±hÄj[—J;±ºŠo—ç\nÓ(©Ubµ´da¬®ÆIÂ¾Ri¦Då\0\0A)÷XÞ8@q:žg!ÏC½_#yÃÌ¸™6:‚¶ëÑÚ‹Ì.—òŠšíK;×.ð€¢™„ìi¶n÷»øì¬ÛÀ€ðÁEƒ{\rB\n'î¹»Ší_ÌÁˆ2œka§‚!W¹&Asv6Î'HáÈÞÆ»ÉÛä÷ ÉvO„IvL®Ã˜Â:‡J8æ¥©©B‚a”kºjÊ*Ì#ìÓŠX„\n\npEÉš44…K\nÁd‹ÀñÈ@3Äè!ªpK P›k¼<ÈH\n3°Ã|•’/Ð\"1J'\0\0P¦¦‹RÙ!”1²dœì2V‚#I²pN¾¦ï&	¨	Zþ)è	RÜˆf1B‰§CÖË\r‘Ü˜„ˆA¯¯™Z8B<@Ë(4=9%3÷.—sdn4Ê®ØÊëÏì»3-PH Æ€”±äa—Hl`Â\nxëD˜e`Üô9M‚ß&0î²2/#Èè2…˜SO1B„§Jv7RUâpJ®ÈñGF\n•«®5¸%û½¯åN]•2†Q7,tW¥Ã³FG	AQ±6’>hv4D4È	 íI/+|´¢ÊÑ4¶\n#©†T¿ƒ£ºP ‹t‚¯omÎÍ\rŠl¬)Š\"c\rh¤±&IƒÅ>\rÃ41¶J¤‚¦\"dL>c(Zi æ™Sì*˜\rèž€6°¯quT¿µbw›g\0VÕmcúÔ ´£ÁE%©u;»qö–:0ÒVŠØ­ƒõ>@ïS+Q\$ÍÎ~4h VTÅ\r‹@,ìÐÂ9¡\0Þ3ÔÜ2©cCºPì˜eª&0¤ƒ¢Š’)òv2ÓáÓÜS~ã X\"ålŽ½8ê±É³A-€ùUàÜÊŒ)t‡Û‰Áë­\nl)Ü˜ÓÑô±´SJ%2RH1D4ü—EXê—P²\";Å¿ƒÃþ3¥Â…ù3¨…®ç©©Ü/¾eøéâC‘#’xåÕä«´å:>s½Íô;/åòKA\0<(a¡À`zƒ@tÀ9ƒ ^Ã¼Á„2Ó C.\ráÈ3‚ðÊ ðxXa¸9†“þÁoáœ2‡HÃlJ¡¬ãzH0¡&O„6ƒÀ^Aó<#êm·®1#‘@h%Í(ø}Âs\"a”9ÂSþK‹¡QCQ8ùÄÔ‚S(3å¼»°x.…¹ü\n (Eºfˆð—?¤á“&ŠR\n[—V.*2 ä<aÖéüuOÌ¤5‘uC£\$:¦\$\0PõPÈvMBìQŸÅâNWÂJvhÄþÉ1:]Ž)?J;EÆqñø?Gñæ;§ž@^)%Á\$‰–úzƒJÀ\rÁ¼þ8>°èih\$2šˆ¨1þ:á\nÁpäM ù\r¾_Fé†,%Á·¨2Hb*%€¼(ð¦áÞy\$æ\0‡ÛÚÛ&ìŽÉ2tO	D|îD¨ƒJª#‚µJÀ¡~1éÀ(I!H–QŒÐÅ·QÊ¹#Ÿ–¤Ü]‚0T¦ø£?çG+jOg%?MÕôÑÚËs3¨9ª[UÚEC,’*wäJ(ód\"Ä‘íäÍEWûeá„ëœ”d)rAP§ê‹0…ÙLbìF«pˆC2o €;ØC*ûU„Òy¥•zbNÁÂQˆðÔ»¢	8Š²«%‹î¶‘ò*k#a’{\$¹Oš€LxQ-eØöÁEØ‹ôPÄ²=UAl­È³vD•°sK¤_×–BÝVáP´š¤Eé{Þ\r/´!\$#!ADk¡–Aø¬­zÆAX¿žªúG=¹7Eë eïØºFt¦1ƒdKÉ‰3ž¤ÜœÕ²+QJû'Tí¸³˜ÑÊ™Z±Ð”1ÒMê´VÔ2çžäÙá8)œup¬*ó@×ØðÕªž­Ñ¾íÄ-·K=InÁã›«WEC[ýk2q…D’+„A\"ÀA¥c)i€PRo¡Ò‘D`‰É&ªÔ™Q´1BÑSMÔSGÙ‹ÌëÛ.ë¢uˆ{²ë\0/:a™\$“\$‚˜\$î‚â«öÝo&dÖê	òì‰ŽÈXâ,Ð<B²!\n’Ý\"¥\$» lyy±ñ3|ë0:r.Å	™*.\$œfŒ›°t?‡ø;‘F‡DŽ)=®ir,ùHœª¢„9±kM…(m›t\\©i\"Ðø2aY‚í2”ÂM*5GÔi–øçYð”ÉÀ«.Å>š—Œnoˆ»¾yþ·£ô‚<;9\"¶îÓå^PÊºá×/\$ØÇ¨\$%6~tçg½l/fW)Kdó¼K²°äu³4=¸vÒD(2LQÏÆÍh«hI”‹:òRn#™æ^³¨´\"{é>âEÙ{ËS/Åt.…‰làbˆ‚O¨uYŸ°áŽ’—-öž÷í‰Ñ—êú¾m¶†w]ÔÝ­°Âj“¨øáÆ!·¹KÈô¢ÅØ\0iXëf¹Øm+¿¶vÝ\\½š\\\n+`vª*ø¾Ê³Ž‚M7/<f¶Y\nYK%³\\[Fn#£ô6ŠÜÚUf¹žõ.²£nÝJÚÕ|£cüq#‡t{“®¾{–ÌŽ]1}F–¼«·yÉî˜'»g>CA¯½ï“÷á#»7sD‰r­—*¸oê	üB÷F.iî›Õ‹Í®Ž'Ñ,±yEôåXäÆøÏ'èãn<ÍÁAôƒ®L£•ŠªÐt=Þ°F\nÝoÓÖn·™£/:ØN¡eflÈº¶°ýþJxsz>9›ù:SØ‹ÞoOÈ _/Ãò/‹úoDVW©[õ	ÔrqB¥ë]'®þ2Çº«fmŸ§ø`?çûñU“èŸ»è@ï\$J)7 –ÂCªU¤’d€¦…c\0Â.U§F†°ÓáXçD2±„Äh.ýnÚç®Îí'Êh°?j‡¥ð¸Nø*#ÁN\$«ìÅÆŠÎãLz»%ß„±Mú/j¸5d¦êŒîîpqoâ²ƒ tÆØ.ŽØb‡	\$l¨ÇýŽÜM°”¨Ïôh§Ï\n\"ÕP0Å'ïÄóC5ïðyÏTP\nO0ÎPŽÆÛÄöóªîIP›Ðä±péN¬öBù¥sæ PÙåÝˆnS\"HG:ÄïðÐÌsÀÎ“ÄÚMðë,bMq*îL“q3J-Ä„HŒ;éÜ|K€ò…¬­eP%PjƒX0Éì'q^5enÈH;+<VÌäú£ÖÖG¸9€Â¤\".%)\r`q€Wïd‰¬æíX%Àœ>aJ €†-\0ØñâŒ\\Æ·¤qMüaBA	Ä(Ôðø\$‹”â‰Ô/N4¤zNÂ\n ¨ÀZŽ£ÂPª,ÈðÒõŠP‹)@#Â@nñú›ÆâÀf¤¤ªt‚šP/0/Át—°ÍN‘73bŠ6¢ÎDªÞjòìRB3d”Q€°SêÈ­C Å,æ&bª˜Â#„?Œ2/m²÷ªÛ¢Uîä÷mÀ¦/ñ'‰N°‹šÞP‰#nr÷o¹(ÉB\$ƒq(f2#oRüo´½e²…¶[¥æõr\\ULt‡\"vÞDvmdÆ8Mî7ò<à–¬¢ir\rrâò‹¦'	î¿/D¾É¹,JNß*ôWŽË„à%†E8P ô¥€\nÀÒ ï+ Ãár[Õ*ƒxN*ÊÊCçtw’@þÊ¦ã\n	‹ˆA\$~=¤zj…\$¥î ¦Ö¤’ê›ãF‡Jé5Ï¨H#›)ŒGg1i1`Ó1¥€9ó%0¯ª–	Ø\$²·ƒ:S5ŠîYl*»#F* ";break;case"zh":$g="ä^¨ês•\\šr¤îõâ|%ÌÂ:\$\nr.®„ö2Šr/d²È»[8Ð S™8€r©!T¡\\¸s¦’I4¢b§r¬ñ•Ð€Js!Kd²u´eåV¦©ÅDªX,#!˜Ðj6Ž §:¥t\nr£“îU:.Z²PË‘.…\rVWd^%äŒµ’r¡T²Ô¼*°s#UÕ`QdÞu'c(€ÜoF“±¤Øe3™Nb¦`êp2N™S¡ Ó£:LYñta~¨&6ÛŠ‹•r¶s®Ôükžó{¾”òf“qŸw¹ß-œ×ü\n–2‹Œ #*«B!@éL©N…zµÐ¨@F«÷:QQãW­àÏs¡~™r.“ndJ¥ÊX’¨ËŠ;.ÚM(ìbx¦¥¹dè*ŒcÚTÄAns–%ÙÊO-Ç3¨ì!J—ç1.[\$¹h´¤¹ÎVÈÉdŒDcìMœ¤Al²¤‹‚N-9@€§)6_¥éDî’ë£Þs–eÛ‚‡%ÊyPœ¤Ìž÷B¥ºF­ys”\nZÃ±()tI¬„Ì4^’­ÙÌF'<Ý\$Î'I\0DœÄYS1RZLÇ9H]8\$™ÌO±\\s…ÉÐSÒ1}GR’ê¥)v]PJ2ÐE%“Ôù?H%í\0\$Ý*H	i Nå¤–“—g1¡—¤iÎ^•ÉiÀD}`L©öKÆFr4Vž%ÅaÍBPÅÓÀHG1ÙÊE€#£`ØÒ6Lø@9ŒcÜ\nbˆ˜r’(ñvñ9Uo•)DO\$=”þg)xôœ»sLR5rÍxarsÁyeG1Å?ŠbØÑ‡Íg1LA4Ìs¤·0—Ž®Xrë>3ORtÏ@ÍSf9ƒYUTúTC`è91¬x@0ŽL¨Þ3Ãc˜2¶§1fT\$£Ò*\rìÀÛw!\0ê7c¨Æ1´C˜Ír„`Þ3¹ƒ˜XÒZèÂ3Œ.`A»µ Úæ­XP9…:‹\0†)ŠB0@“”‡9F*Ø	’S¤y#=&«©ÊF’°V§ª­¸Eì`§²#xÝRÁÏ±!‘³ãÉr“´ßÎ®âhÂ9µc“3ÝŽc¸Þ9Tƒ(ð8\r:HÈàÂÈé#0z\r è8aÐ^Žþè\\0Œ›ØÜ2ŽAw†3…ã(Ýô\r^ÁÔýaÐ94#§¦/¶wpÖÂHÚøm}AÐðÂŠ1£€F´7ªCJØk2¡¤:—ÈÖßn†ÕÓ‡0æü(¿£¤P‹±Ð(…Y	èMäò\0-åÄN'Á(+Óšu'@€(€ !ÿH¢>žâ\"\n9()Á‰QÌji1ƒ [W\\K‰20\$Ô›“‘ˆ0®ª€ˆò¬yòÿ[â‚˜À’DÃËF¥Rx*ßT5Æ¤‡êh ¨fA¼6‚\0‚øZ{¾5¯¨6Õ\r\${wæ„Ú“ö);\n<)…H€ÇÌY+f< ‰£ÄAz	è×A\0é«	b/Eì)aŽ2µÕšvÔø8 A¤3‚â\0f3ÆTÎ¼ðŒ!úîT¥ÿ¼8+&Lƒ±à9GÊZ –j«s\n°+ÅÈ\n	á8P T³ªv@Š,òE‚^0‹T¾Zx‚Pý!¤8¬¨¿b™X'¸I:B eÁ…rÁPìCd%®|Cˆ¢0.À¸ÐF3\0`¨øŠ\"¢îˆºVY8»<‰a)Ø€“1ˆ5êgNYŒgÉú &ÆfÆÄ±ˆ”äñ‹ñ69Å@‹G)5MŽQ&#)dGH@&bŽEM7‚±Ä‘x#YëBpô(DSk·Biv²‡3º-Ü¡-œÃ–t56ÃHz (!È@àßl§3áŒÕ†CºwÏ\n°¢y©	VvÅâš”RÕø÷Õ2È®˜2qa*=H«‘EhIhºM¨ñ@!Ø‘-èhE\nc8„¢ÅRbš«	³gDCf¢žÞ9k~ZØº Âht‰1|9„qƒ/l˜×¦ZÅÑ`ªIg“°Jº¢¨ê!.!bZ'Å)ä´ìÅª‰•Fx ½ô’óÞ‘^(à§¤„’Šñ*ì[È ¿b<K¤‘b9D˜…°ÐDËg	Å]ù¤†3\0²‚ãz/U<tK}ˆ›ô(\\wÂX€É©6\$w®È,”òB(\nQ=)¢à, 9Ù4,ÄBvô¯¤ª·ÒÂZA\\2†,~•íþ,ÕÀû	\nI’’\nÚ‚eaÊ Dàæªì]ˆU®¡T=í<‚¼´å*#Ñ˜æŽÈœbô_Tvu#› )(xçµ´ía6-¦yÏeß\rC …r	Ð™ÖŸŸ•£S:?EÓÛ…¥	bNŸö„s	1¬Ø˜&ÂrˆxwT¨ŒQe\r–äsªYˆÖoS„¤­- Žà–ZkCAujLˆã¦„Ð¸”Z‚ÂâÃ[SÜïQtƒ’–Éhi[ÇµIe<×N¥Ô	pY¥EÙ¹ÚŸ±Vy¤6¾æ³WmÙxÌ]Ç@°hNìÝ¶ #ð†ñÞq³àI„06Á[[FêIÃ8ô†Û¶ü#‚\\.nPUªªc”IÌõk„?„P‘\rZñ\rsÐ¸!<XJ}€‡‰S^rñ‘%Èøåãp”¹ Qp*µö»:\$dJkóÝ©Ç3CFõèNnmgfÛl´F«kg¶Ð¿´ŠJÍ\$}ÑÁTš•êÜ5šu•-N÷ŸëÉqð[¼S8ORS=œ”u{…Û	IwÛ}ÀîöñuwÖó-…¹D²„¨+ØÀ®¤¢!n	ÂMáº§›ð•µTw¿iê~;{,žÜÍ<§òÝËµ)`«Œ;u×oºùè6eãôuF¦óÑ6'¹>®Ñ™ß{Õ?.§ý¯/òJgÜ‰sÂ–OPì7+àòþËý·ÕtEûÿ:.}¥SÿGÅõ‹‰omÿ»R6ïì%¯•÷.7ÞóOð[ì…ê¾¿á=ùU¢¾éõ~Eåÿkè/•\\Ð±Œ	ì4[ó+¸`a¦æR-têf½ã¶Fë¶Æáv¦ì¶œžGBÐ¡b&ÁB(Ë80 Il;mªÌ\n:¬Á#f†\r€V‘ÀÒ`ÖT˜*.£#XkH\r Ìk¨(6 Œ™h §x˜H&u`ª\n€Œ pÔpr9£jßÌ@ña^e£÷â4#z¨aR<‹ÒS`›0w¡f†.!ÌŒÜ9Ô>ŽV8âø¹«žº&P:ÏŸÍJŠ„!j!:Ih°!->	€Þ|˜9Ñ˜\0Úxc*5#b%¡t.@eÄ€ÃLÖ,¦j.­ zŠVÓ8ñaInâÛ/f¦qH\n…Ò4C\"2c*@Ê‘€Þ\0èÄëyqJâ®ÆRîTIÄÅn´ÉN-\rvÓ­>”íˆ¡At¡Žr±š¡kÂ1Q8E\$fÉïBwGz\r*0°/ü\0¬\r Êà\nÀÂ`ê Ú#x*AÍPQkVÁFt+ÐQÂbLÔ±8<qB¥drS¡\nÊÁ\\mÅD¦0\$[«i#T2¦·±¿`@3±Ë\0ÉHøÍõŽTNn2 ïØE@	\0@š	 t\n`¦";break;case"zh-tw":$g="ä^¨ê%Ó•\\šr¥ÑÎõâ|%ÌÎu:HçB(\\Ë4«‘pŠr –neRQÌ¡D8Ð S•\nt*.tÒI&”G‘N”ÊAÊ¤S¹V÷:	t%9Sy:\"<r«STâ ,#!˜Ðj6Ž1uL\0¼–£“îU:.–²I9“ˆ—BÍæK&]\nDªXç[ªÅ}-,°r¨“ÖûÎöŒ¿‹&ó¨€Ða;Dãx€àr4&Ã)œÊs3§SÂtÍ\rAÐÂbÒ¥¨E•E1»ÞÔ£Êg:åxç]#0, (§˜4›Œü\r÷ñˆÅG‘qäZ†–¢SÅ )ÐªOLP\0¨ýÎ”«:}µï»áÚr¢òå´yZî¤se¢\\BœÅABs–¤ @¤2*bPr–î\n¦ª²/kÞÁ)ÒP“Ç)<·Ä©p¨’êY.R®DùÌLGI,I¥¥i.Oc’t’\0F¢å±dtì)Ê\\—È*ð’ëÛâ»/ÉÊ]g9f]Á…‹Ø^K’ LªÇ)pYÊr•ä2´.«ºó)•h¹2]¥Å*–X!rBœóœê\$	qól£@%yÎRPa s-¯a~WÄ¡r’GALKIÔ•)KPËÍ:ë±\$ñÒPO„Ù\\‡Œ\0Ä<¶@æÐ–åìJ\\PÙr’B–HŠÜreÙÌBñùÎ^Õg1IJd}\0Lª1TP\$ñÌ\\u¢xŸ àP¨2 @t’¥¼¦S%¤Z:^“€PŒ:ƒcRÛ´\0æ1Œ#sœ(‰‡)\"^Ù)ÐC•G-ånÔªYIÆKqÊÞ7Ôõ*\\Ô2”©T…D¾QÔ†,]Ñ¯ž;'d´Ž;8Äñm“)ebvž¥¤a_?œ¹ÑÊC—InPsåYô¾<Ú4á¤ÍÚ9Q–­Ô\rIàPØ:L“(#“47ŒÃ0ØèŒ­Ôû:h0ÞÎ¸ò£pæ:ŒcN9Œ×À@6\rã;¢9…Hå·Œ#8Âè„@KV®ˆëXÖ{23‘	¤!ŠbŒÔãXÊ7/Ï‘täk¯>—‘â`¾¤±]‘	ñOìùùtÈŠ{¸Ò7Á(YP\$tZ†IÓ0ý©\nR²\"hÂ9¶“=çŽc¸Þ9U·@à4ëÃ \\ƒ-¯ÁèD4ƒ à9‡Ax^;þpÂ2q£pÊ9Þ¸ÎóÿåÒçÃ›»\rÀ¼/°äiƒ£ææá€†°D‚Hm6¹ðèxaÈ<ÔASdÕiª\rµÏ8•Ô»m~Á¸:§rà¼wÂý\n:«¢UÚ\"FÒ@è% Ó\\„JÈi)JŠñÌ#Å£–\n ( D!PB\nA‚†‚CL?rbUÊ“QÌ!„ˆè±„•žal‡„Ž%ÄÀ™9dP9…pµWn¢Fa8 	ùA,î„ùªQÊ\"…¡\$3\0òÖÃ iU¦qu7?M™¨kÁÄ:šuÔƒo\r € ¿FÈô“Ÿ¾IcS&^™¦7A@'…0¨x¤a¥\0¿-ñ6P£KFÂ!N!Ù\r\" à rÄÄVb ãi“2¬ÞšÆøüÚâ®\r!œ61£3F‰ñ`¨ànU¡¦	=uÔdü¡”rX9—ðKE –‚øC‘-JX %	 ðœ¨P*PA\0D¡0\"ÐÔ˜°\0åâ\r]ÑÎL”B!Djv®õj.8…A2†`Â¾Pv!²NžaP.Ç@§fì	ã´wñà'DP]žÁp\"ê!âìòxÇD#/J†F©C¤*~O™†E©(JªÐ™J0õ}2‰QÎ\$P¨kTü¤Ö:pŠWd\\EˆÌ!KqHâ\$D!XCÑH]b\0G¼§bXˆ‘n'*˜#!EV\0¤(JuÌ‰OãšPF˜”TèS\r!è2€ ‡(ƒƒ´®äÒ3`\rY<±ÊL¶ŒËª-¨DU)•6§Y[H­¤\\Z\n!Ê/XäRllsÜ[rgàæB@‹ª¤&Y\0¹§’|Ï¹û?Ï0§ r¦\nÀÑ]9¼bd^^R¬9“ÂzCÂ\0Q¨ãÌ/;i³—´^-j?ZÅÒÖ‚èí‹±mgËÍç>hhø„:RÄø¥¤Q:ƒÞ'ÇK:<ç•Å‚\0^a%¢|[˜ñÍ„p˜¢	á-â8³FØ½#¤O‹øŽ\\Ø3b’3¼HcÌ‹¿TêüD\n‘ËÅŒAêµ\0 <Q…2H€(&NÉà%we,’”ÒtHEž\\'8æ~9Å°“‡è@‰Ä7Eõ>K‰z÷\$€(äÎbq/Š„\$\",nGÄ¹'?«u†br0¹´s\nÑDKDQ*/Cá¡T)	r&æˆ2!\nX¸CÕh‹˜ÎÄ(¨\"øŠœîªEs¿Íub¦»ñÌ&Å¡×¥#Ud*©V»UR(–f|Ó­*ÕÁ/±·e;û”§ÅÍT¶î±\nìö7´šjN£Ô‚ç A \0™ˆ´•~#tò DLXDns×¹‡.èÛikrÝ«rÔµÍ¸×\"Üë‡éìñuv.át)£-6¥ªªïöE[¹\nË˜|sF*®¾7­\r¢´ÔáÆ¶³!ãÕO‰ñËÒÒ˜ÿ<G“e549y7-·,›o†9´Ú3·|LHÞÑœoýlBºÏ)bÐÈcõž2Æ˜Û•[\">§äþ¼×htû½Ô¹&êÝF¡›£tëhåG*ë\n„¤~‡,4Tâ —x‘¯89DÕŽð\rÖñ\n£Oì½æ^Õ\r¢B\0@[êçœ2<%.z¶Ü{¿öÂ¥Þr\rÝë”^)NÍ²®ÍÛ1L¼ýod}Í”ÂšS…ó—òºµèmÿ¤âu_“zG²ö/­·¾‰NôÓÉ€ð(¶êŒoÜ,uêøÝa÷¸óo‡ù‡ÂÀžù@	jÖ¤Y(!Ã˜W­nòA„dÃ'ÂøF1t-ç¸AÀ>íK!ø„Y¬?›ô|^ª®kŸ!/ÿàª×ü7öTäø©~‚ZdB\$Nì¤ol«JØ?OÔ½ïÈ0ýÆ7oíP\np>p/-ïôÝPªïLÓÄ¼„Á«ÕÏ`üc«Ø½Ð8c\\½«Ìù+Ñ0^¼Ä^F\$fGOrüFÁ„8°LÌ>¤7ã\"	ž\r\0Ê¶üZJúfÆ„JšÃ¬š\0 ”&ì†\0P4àR—rAÑ­HP¡F¢.z%ÁbÉg|@B.°ÒÑÅXÉ­„Ö!?a1”Æ£\"f°\r€V•€Ò`Öd|Jd¦ƒbmˆ@\r Ìméà7@ŒœHF§ UÃ4q\0ª\n€Œ p>q.:Ctâ|yl\\É(Ä#B8«¦¨Âd†ç\0	±/%\0á8\r6Ô£˜0°„9mNG‹ê·+¼þJ¸Ï–áÊûƒ¸TáÊ€Þ~c¢:`™gzã45ÃlbJì.fJÅêÖÍDâÊÙN4z*‰\r˜ç\rŒÍPÚÞóÌÐb„P±ñc\"\n…ø4ã,34@Ê•@Þ\0èÊËH{ÌiÎÄû/fõ\$Â*ªªÅˆXÂZ¹\r½\"®\n¤ÏßêJàò+ÍÂ,ÄÏòyÇ¢\r*f´p¦\0¬\r Êà\nÀÂ`ê Ûa\0 fg¡,<!f+¨SNNÍŸ¡RÔ\$ø,£Íjˆ?#¡l Á¬’°©cÍqúf¼5ã4m²g&²&E'bZÀ+†ZA\$þ®òÁéddF€	\0t	 š@¦\n`";break;}$vh=array();foreach(explode("\n",lzw_decompress($g))as$X)$vh[]=(strpos($X,"\t")?explode("\t",$X):$X);return$vh;}if(!$vh)$vh=get_translations($ca);if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$xf=array_search("SQL",$b->operators);if($xf!==false)unset($b->operators[$xf]);}function
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
select($Q,$M,$Z,$Xc,$Xe=array(),$z=1,$E=0,$Ef=false){global$b,$w;$Ad=(count($Xc)<count($M));$H=$b->selectQueryBuild($M,$Z,$Xc,$Xe,$z,$E);if(!$H)$H="SELECT".limit(($_GET["page"]!="last"&&+$z&&$Xc&&$Ad&&$w=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$M)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Xc&&$Ad?"\nGROUP BY ".implode(", ",$Xc):"").($Xe?"\nORDER BY ".implode(", ",$Xe):""),($z!=""?+$z:null),($E?$z*$E:0),"\n");$Hg=microtime(true);$J=$this->_conn->query($H);if($Ef)echo$b->selectQuery($H,format_time($Hg));return$J;}function
delete($Q,$Nf,$z=0){$H="FROM ".table($Q);return
queries("DELETE".($z?limit1($H,$Nf):" $H$Nf"));}function
update($Q,$O,$Nf,$z=0,$vg="\n"){$Th=array();foreach($O
as$x=>$X)$Th[]="$x = $X";$H=table($Q)." SET$vg".implode(",$vg",$Th);return
queries("UPDATE".($z?limit1($H,$Nf):" $H$Nf"));}function
insert($Q,$O){return
queries("INSERT INTO ".table($Q).($O?" (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$L,$Cf){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$Xb["sqlite"]="SQLite 3";$Xb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$_f=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
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
query($H,$Ch=false){$se=($Ch?"unbufferedQuery":"query");$I=@$this->_link->$se($H,SQLITE_BOTH,$n);$this->error="";if(!$I){$this->error=$n;return
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
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$tf='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($tf\\.)?$tf\$~",$C,$B)){$Q=($B[3]!=""?$B[3]:idf_unescape($B[2]));$C=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
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
insertUpdate($Q,$L,$Cf){$Th=array();foreach($L
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
limit($H,$Z,$z,$D=0,$vg=" "){return" $H$Z".($z!==null?$vg."LIMIT $z".($D?" OFFSET $D":""):"");}function
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
fields($Q){global$h;$J=array();$Cf="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$K){$C=$K["name"];$U=strtolower($K["type"]);$Lb=$K["dflt_value"];$J[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$Lb,$B)?str_replace("''","'",$B[1]):($Lb=="NULL"?null:$Lb)),"null"=>!$K["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$K["pk"],);if($K["pk"]){if($Cf!="")$J[$Cf]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$J[$C]["auto_increment"]=true;$Cf=$C;}}$Fg=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Fg,$ee,PREG_SET_ORDER);foreach($ee
as$B){$C=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($J[$C])$J[$C]["collation"]=trim($B[3],"'");}return$J;}function
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$Fg=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*")++)~i',$Fg,$B)){$J[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$ee,PREG_SET_ORDER);foreach($ee
as$B){$J[""]["columns"][]=idf_unescape($B[2]).$B[4];$J[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$J){foreach(fields($Q)as$C=>$o){if($o["primary"])$J[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$Gg=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$i);foreach(get_rows("PRAGMA index_list(".table($Q).")",$i)as$K){$C=$K["name"];$u=array("type"=>($K["unique"]?"UNIQUE":"INDEX"));$u["lengths"]=array();$u["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$i)as$lg){$u["columns"][]=$lg["name"];$u["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Gg[$C],$Yf)){preg_match_all('/("[^"]*+")+( DESC)?/',$Yf[2],$ee);foreach($ee[2]as$x=>$X){if($X)$u["descs"][$x]='1';}}if(!$J[""]||$u["type"]!="UNIQUE"||$u["columns"]!=$J[""]["columns"]||$u["descs"]!=$J[""]["descs"]||!preg_match("~^sqlite_~",$C))$J[$C]=$u;}return$J;}function
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
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$of){$Nh=($Q==""||$Mc);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Nh=true;break;}}$c=array();$ff=array();foreach($p
as$o){if($o[1]){$c[]=($Nh?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$ff[$o[0]]=$o[1][0];}}if(!$Nh){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$C&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($Q,$C,$c,$ff,$Mc))return
false;if($La)queries("UPDATE sqlite_sequence SET seq = $La WHERE name = ".q($C));return
true;}function
recreate_table($Q,$C,$p,$ff,$Mc,$v=array()){if($Q!=""){if(!$p){foreach(fields($Q)as$x=>$o){$p[]=process_field($o,$o);$ff[$x]=idf_escape($x);}}$Df=false;foreach($p
as$o){if($o[6])$Df=true;}$ac=array();foreach($v
as$x=>$X){if($X[2]=="DROP"){$ac[$X[1]]=true;unset($v[$x]);}}foreach(indexes($Q)as$Jd=>$u){$f=array();foreach($u["columns"]as$x=>$e){if(!$ff[$e])continue
2;$f[]=$ff[$e].($u["descs"][$x]?" DESC":"");}if(!$ac[$Jd]){if($u["type"]!="PRIMARY"||!$Df)$v[]=array($u["type"],$Jd,$f);}}foreach($v
as$x=>$X){if($X[0]=="PRIMARY"){unset($v[$x]);$Mc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$Jd=>$q){foreach($q["source"]as$x=>$e){if(!$ff[$e])continue
2;$q["source"][$x]=idf_unescape($ff[$e]);}if(!isset($Mc[" $Jd"]))$Mc[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($p
as$x=>$o)$p[$x]="  ".implode($o);$p=array_merge($p,array_filter($Mc));if(!queries("CREATE TABLE ".table($Q!=""?"adminer_$C":$C)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($ff&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$ff).") SELECT ".implode(", ",array_map('idf_escape',array_keys($ff)))." FROM ".table($Q)))return
false;$zh=array();foreach(triggers($Q)as$xh=>$kh){$wh=trigger($xh);$zh[]="CREATE TRIGGER ".idf_escape($xh)." ".implode(" ",$kh)." ON ".table($C)."\n$wh[Statement]";}if(!queries("DROP TABLE ".table($Q)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$v))return
false;foreach($zh
as$wh){if(!queries($wh))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$U,$C,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$Cf){if($Cf[0]=="PRIMARY")return
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
array("Statement"=>"BEGIN\n\t;\nEND");$t='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$yh=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$t\\s*(".implode("|",$yh["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($t))?\\s+ON\\s*$t\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$B);$Ge=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($Ge?" OF":""),"Of"=>($Ge[0]=='`'||$Ge[0]=='"'?idf_unescape($Ge):$Ge),"Trigger"=>$C,"Statement"=>$B[4],);}function
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
set_schema($pg){return
true;}function
create_sql($Q,$La){global$h;$J=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$C=>$u){if($C=='')continue;$J.=";\n\n".index_sql($Q,$u['type'],$C,"(".implode(", ",array_map('idf_escape',$u['columns'])).")");}return$J;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($Gb){}function
trigger_sql($Q,$Mg){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$h;$J=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$x)$J[$x]=$h->result("PRAGMA $x");return$J;}function
show_status(){$J=array();foreach(get_vals("PRAGMA compile_options")as$Ue){list($x,$X)=explode("=",$Ue,2);$J[$x]=$X;}return$J;}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($Fc){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Fc);}$w="sqlite";$Bh=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Lg=array_keys($Bh);$Ih=array();$Se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Uc=array("hex","length","lower","round","unixepoch","upper");$Zc=array("avg","count","count distinct","group_concat","max","min","sum");$fc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Xb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$_f=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
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
insertUpdate($Q,$L,$Cf){global$h;foreach($L
as$O){$Jh=array();$Z=array();foreach($O
as$x=>$X){$Jh[]="$x = $X";if(isset($Cf[idf_unescape($x)]))$Z[]="$x = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Jh)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).")")))return
false;}return
true;}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$k=$b->credentials();if($h->connect($k[0],$k[1],$k[2])){if($h->server_info>=9)$h->query("SET application_name = 'Adminer'");return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database ORDER BY datname");}function
limit($H,$Z,$z,$D=0,$vg=" "){return" $H$Z".($z!==null?$vg."LIMIT $z".($D?" OFFSET $D":""):"");}function
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
indexes($Q,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$Ug=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Ug AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $Ug AND ci.oid = i.indexrelid",$i)as$K){$Zf=$K["relname"];$J[$Zf]["type"]=($K["indisprimary"]?"PRIMARY":($K["indisunique"]?"UNIQUE":"INDEX"));$J[$Zf]["columns"]=array();foreach(explode(" ",$K["indkey"])as$qd)$J[$Zf]["columns"][]=$f[$qd];$J[$Zf]["descs"]=array();foreach(explode(" ",$K["indoption"])as$rd)$J[$Zf]["descs"][]=($rd&1?'1':null);$J[$Zf]["lengths"]=array();}return$J;}function
foreign_keys($Q){global$Ne;$J=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$K){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$K['definition'],$B)){$K['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$de)){$K['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$de[2]));$K['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$de[4]));}$K['target']=array_map('trim',explode(',',$B[3]));$K['on_delete']=(preg_match("~ON DELETE ($Ne)~",$B[4],$de)?$de[1]:'NO ACTION');$K['on_update']=(preg_match("~ON UPDATE ($Ne)~",$B[4],$de)?$de[1]:'NO ACTION');$J[$K['conname']]=$K;}}return$J;}function
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
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$of){$c=array();$Mf=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Sh=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($Q!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$Mf[]="ALTER TABLE ".table($Q)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Sh!="")$Mf[]="COMMENT ON COLUMN ".table($Q).".$X[0] IS ".($Sh!=""?substr($Sh,9):"''");}}$c=array_merge($c,$Mc);if($Q=="")array_unshift($Mf,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Mf,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""&&$Q!=$C)$Mf[]="ALTER TABLE ".table($Q)." RENAME TO ".table($C);if($Q!=""||$rb!="")$Mf[]="COMMENT ON TABLE ".table($C)." IS ".q($rb);if($La!=""){}foreach($Mf
as$H){if(!queries($H))return
false;}return
true;}function
alter_indexes($Q,$c){$j=array();$Yb=array();$Mf=array();foreach($c
as$X){if($X[0]!="INDEX")$j[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Yb[]=idf_escape($X[1]);else$Mf[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($j)array_unshift($Mf,"ALTER TABLE ".table($Q).implode(",",$j));if($Yb)array_unshift($Mf,"DROP INDEX ".implode(", ",$Yb));foreach($Mf
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
found_rows($R,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Yf))return$Yf[1];return
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
set_schema($og){global$h,$Bh,$Lg;$J=$h->query("SET search_path TO ".idf_escape($og));foreach(types()as$U){if(!isset($Bh[$U])){$Bh[$U]=0;$Lg[lang(23)][]=$U;}}return$J;}function
use_sql($Gb){return"\connect ".idf_escape($Gb);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){global$h;return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".($h->server_info<9.2?"procpid":"pid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($Fc){global$h;return
preg_match('~^(database|table|columns|sql|indexes|comment|view|'.($h->server_info>=9.3?'materializedview|':'').'scheme|processlist|sequence|trigger|type|variables|drop_col)$~',$Fc);}$w="pgsql";$Bh=array();$Lg=array();foreach(array(lang(24)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(25)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(26)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(27)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(28)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(29)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$x=>$X){$Bh+=$X;$Lg[$x]=array_keys($X);}$Ih=array();$Se=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Uc=array("char_length","lower","round","to_hex","to_timestamp","upper");$Zc=array("avg","count","count distinct","max","min","sum");$fc=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Xb["oracle"]="Oracle";if(isset($_GET["oracle"])){$_f=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
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
limit($H,$Z,$z,$D=0,$vg=" "){return($D?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $H$Z) t WHERE rownum <= ".($z+$D).") WHERE rnum > $D":($z!==null?" * FROM (SELECT $H$Z) WHERE rownum <= ".($z+$D):" $H$Z"));}function
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
table_status($C=""){$J=array();$qg=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $qg":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $qg":"")."
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
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$of){$c=$Yb=array();foreach($p
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
set_schema($pg){global$h;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($pg));}function
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
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Fc);}$w="oracle";$Bh=array();$Lg=array();foreach(array(lang(24)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(25)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(26)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(27)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$x=>$X){$Bh+=$X;$Lg[$x]=array_keys($X);}$Ih=array();$Se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Uc=array("length","lower","round","upper");$Zc=array("avg","count","count distinct","max","min","sum");$fc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Xb["mssql"]="MS SQL";if(isset($_GET["mssql"])){$_f=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
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
insertUpdate($Q,$L,$Cf){foreach($L
as$O){$Jh=array();$Z=array();foreach($O
as$x=>$X){$Jh[]="$x = $X";if(isset($Cf[idf_unescape($x)]))$Z[]="$x = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$O).")) AS source (c".implode(", c",range(1,count($O))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Jh)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).");"))return
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
limit($H,$Z,$z,$D=0,$vg=" "){return($z!==null?" TOP (".($z+$D).")":"")." $H$Z";}function
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
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$of){$c=array();foreach($p
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
set_schema($og){return
true;}function
use_sql($Gb){return"USE ".idf_escape($Gb);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($Fc){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Fc);}$w="mssql";$Bh=array();$Lg=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(25)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(26)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(27)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$x=>$X){$Bh+=$X;$Lg[$x]=array_keys($X);}$Ih=array();$Se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Uc=array("len","lower","round","upper");$Zc=array("avg","count","count distinct","max","min","sum");$fc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Xb['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$_f=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
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
limit($H,$Z,$z,$D=0,$vg=" "){$J='';$J.=($z!==null?$vg."FIRST $z".($D?" SKIP $D":""):"");$J.=" $H$Z";return$J;}function
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
set_schema($og){return
true;}function
support($Fc){return
preg_match("~^(columns|sql|status|table)$~",$Fc);}$w="firebird";$Se=array("=");$Uc=array();$Zc=array();$fc=array();}$Xb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$_f=array("SimpleXML");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')){class
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
Min_SQL{public$Cf="itemName()";function
_chunkRequest($ld,$va,$F,$yc=array()){global$h;foreach(array_chunk($ld,25)as$gb){$kf=$F;foreach($gb
as$s=>$jd){$kf["Item.$s.ItemName"]=$jd;foreach($yc
as$x=>$X)$kf["Item.$s.$x"]=$X;}if(!sdb_request($va,$kf))return
false;}$h->affected_rows=count($ld);return
true;}function
_extractIds($Q,$Nf,$z){$J=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$Nf,$ee))$J=array_map('idf_unescape',$ee[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($Q).$Nf.($z?" LIMIT 1":"")))as$Ed)$J[]=$Ed->Name;}return$J;}function
select($Q,$M,$Z,$Xc,$Xe=array(),$z=1,$E=0,$Ef=false){global$h;$h->next=$_GET["next"];$J=parent::select($Q,$M,$Z,$Xc,$Xe,$z,$E,$Ef);$h->next=0;return$J;}function
delete($Q,$Nf,$z=0){return$this->_chunkRequest($this->_extractIds($Q,$Nf,$z),'BatchDeleteAttributes',array('DomainName'=>$Q));}function
update($Q,$O,$Nf,$z=0,$vg="\n"){$Mb=array();$wd=array();$s=0;$ld=$this->_extractIds($Q,$Nf,$z);$jd=idf_unescape($O["`itemName()`"]);unset($O["`itemName()`"]);foreach($O
as$x=>$X){$x=idf_unescape($x);if($X=="NULL"||($jd!=""&&array($jd)!=$ld))$Mb["Attribute.".count($Mb).".Name"]=$x;if($X!="NULL"){foreach((array)$X
as$Gd=>$W){$wd["Attribute.$s.Name"]=$x;$wd["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Gd)$wd["Attribute.$s.Replace"]="true";$s++;}}}$F=array('DomainName'=>$Q);return(!$wd||$this->_chunkRequest(($jd!=""?array($jd):$ld),'BatchPutAttributes',$F,$wd))&&(!$Mb||$this->_chunkRequest($ld,'BatchDeleteAttributes',$F,$Mb));}function
insert($Q,$O){$F=array("DomainName"=>$Q);$s=0;foreach($O
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$F["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$F["Attribute.$s.Name"]=$C;$F["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$F);}function
insertUpdate($Q,$L,$Cf){foreach($L
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
table_status($C="",$Ec=false){$J=array();foreach(($C!=""?array($C=>true):tables_list())as$Q=>$U){$K=array("Name"=>$Q,"Auto_increment"=>"");if(!$Ec){$re=sdb_request('DomainMetadata',array('DomainName'=>$Q));if($re){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$x=>$X)$K[$x]=(string)$re->$X;}}if($C!="")return$K;$J[$Q]=$K;}return$J;}function
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
limit($H,$Z,$z,$D=0,$vg=" "){return" $H$Z".($z!==null?$vg."LIMIT $z":"");}function
unconvert_field($o,$J){return$J;}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$of){return($Q==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($S){foreach($S
as$Q){if(!sdb_request('DeleteDomain',array('DomainName'=>$Q)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($R,$Z){return($Z?null:$R["Rows"]);}function
last_id(){}function
hmac($Ba,$Eb,$x,$Rf=false){$Ua=64;if(strlen($x)>$Ua)$x=pack("H*",$Ba($x));$x=str_pad($x,$Ua,"\0");$Hd=$x^str_repeat("\x36",$Ua);$Id=$x^str_repeat("\x5C",$Ua);$J=$Ba($Id.pack("H*",$Ba($Hd.$Eb)));if($Rf)$J=pack("H*",$J);return$J;}function
sdb_request($va,$F=array()){global$b,$h;list($hd,$F['AWSAccessKeyId'],$rg)=$b->credentials();$F['Action']=$va;$F['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$F['Version']='2009-04-15';$F['SignatureVersion']=2;$F['SignatureMethod']='HmacSHA1';ksort($F);$H='';foreach($F
as$x=>$X)$H.='&'.rawurlencode($x).'='.rawurlencode($X);$H=str_replace('%7E','~',substr($H,1));$H.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$hd)."\n/\n$H",$rg,true)));@ini_set('track_errors',1);$Hc=@file_get_contents((preg_match('~^https?://~',$hd)?$hd:"http://$hd"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$H,'ignore_errors'=>1,))));if(!$Hc){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$ei=simplexml_load_string($Hc);if(!$ei){$n=libxml_get_last_error();$h->error=$n->message;return
false;}if($ei->Errors){$n=$ei->Errors->Error;$h->error="$n->Message ($n->Code)";return
false;}$h->error='';$ah=$va."Result";return($ei->$ah?$ei->$ah:true);}function
sdb_request_all($va,$ah,$F=array(),$jh=0){$J=array();$Hg=($jh?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$F['SelectExpression'],$B)?$B[1]:0);do{$ei=sdb_request($va,$F);if(!$ei)break;foreach($ei->$ah
as$ic)$J[]=$ic;if($z&&count($J)>=$z){$_GET["next"]=$ei->NextToken;break;}if($jh&&microtime(true)-$Hg>$jh)return
false;$F['NextToken']=$ei->NextToken;if($z)$F['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($J),$F['SelectExpression']);}while($ei->NextToken);return$J;}$w="simpledb";$Se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$Uc=array();$Zc=array("count");$fc=array(array("json"));}$Xb["mongo"]="MongoDB (beta)";if(isset($_GET["mongo"])){$_f=array("mongo");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($N,$V,$G){global$b;$m=$b->database();$Ve=array();if($V!=""){$Ve["username"]=$V;$Ve["password"]=$G;}if($m!="")$Ve["db"]=$m;try{$this->_link=@new
MongoClient("mongodb://$N",$Ve);return
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
Min_SQL{public$Cf="_id";function
select($Q,$M,$Z,$Xc,$Xe=array(),$z=1,$E=0,$Ef=false){$M=($M==array("*")?array():array_fill_keys($M,true));$Cg=array();foreach($Xe
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
as$m){$cg=$h->_link->selectDB($m)->drop();if(!$cg['ok'])return
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
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$of){global$h;if($Q==""){$h->_db->createCollection($C);return
true;}}function
drop_tables($S){global$h;foreach($S
as$Q){$cg=$h->_db->selectCollection($Q)->drop();if(!$cg['ok'])return
false;}return
true;}function
truncate_tables($S){global$h;foreach($S
as$Q){$cg=$h->_db->selectCollection($Q)->remove();if(!$cg['ok'])return
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
preg_match("~database|indexes~",$Fc);}$w="mongo";$Se=array("=");$Uc=array();$Zc=array();$fc=array(array("json"));}$Xb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$_f=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($rf,$wb=array(),$se='GET'){@ini_set('track_errors',1);$Hc=@file_get_contents($this->_url.'/'.ltrim($rf,'/'),false,stream_context_create(array('http'=>array('method'=>$se,'content'=>json_encode($wb),'ignore_errors'=>1,))));if(!$Hc){$this->error=$php_errormsg;return$Hc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Hc;return
false;}$J=json_decode($Hc,true);if($J===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$vb=get_defined_constants(true);foreach($vb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$J;}function
query($rf,$wb=array(),$se='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($rf,'/'),$wb,$se);}function
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
select($Q,$M,$Z,$Xc,$Xe=array(),$z=1,$E=0,$Ef=false){global$b;$Eb=array();$H="$Q/_search";if($M!=array("*"))$Eb["fields"]=$M;if($Xe){$Cg=array();foreach($Xe
as$lb){$lb=preg_replace('~ DESC$~','',$lb,1,$Ab);$Cg[]=($Ab?array($lb=>"desc"):$lb);}$Eb["sort"]=$Cg;}if($z){$Eb["size"]=+$z;if($E)$Eb["from"]=($E*$z);}foreach($Z
as$X){list($lb,$Qe,$X)=explode(" ",$X,3);if($lb=="_id")$Eb["query"]["ids"]["values"][]=$X;elseif($lb.$X!=""){$eh=array("term"=>array(($lb!=""?$lb:"_all")=>$X));if($Qe=="=")$Eb["query"]["filtered"]["filter"]["and"][]=$eh;else$Eb["query"]["filtered"]["query"]["bool"]["must"][]=$eh;}}if($Eb["query"]&&!$Eb["query"]["filtered"]["query"]&&!$Eb["query"]["ids"])$Eb["query"]["filtered"]["query"]=array("match_all"=>array());$Hg=microtime(true);$qg=$this->_conn->query($H,$Eb);if($Ef)echo$b->selectQuery("$H: ".print_r($Eb,true),format_time($Hg));if(!$qg)return
false;$J=array();foreach($qg['hits']['hits']as$gd){$K=array();if($M==array("*"))$K["_id"]=$gd["_id"];$p=$gd['_source'];if($M!=array("*")){$p=array();foreach($M
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
table_status($C="",$Ec=false){global$h;$qg=$h->query("_search?search_type=count",array("facets"=>array("count_by_type"=>array("terms"=>array("field"=>"_type",)))),"POST");$J=array();if($qg){foreach($qg["facets"]["count_by_type"]["terms"]as$Q)$J[$Q["term"]]=array("Name"=>$Q["term"],"Engine"=>"table","Rows"=>$Q["count"],);if($C!=""&&$C==$Q["term"])return$J[$C];}return$J;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$h;$I=$h->query("$Q/_mapping");$J=array();if($I){$ce=$I[$Q]['properties'];if(!$ce)$ce=$I[$h->_db]['mappings'][$Q]['properties'];if($ce){foreach($ce
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
as$Q)$J=$J&&$h->query(urlencode($Q),array(),'DELETE');return$J;}$w="elastic";$Se=array("=","query");$Uc=array();$Zc=array();$fc=array(array("json"));}$Xb=array("server"=>"MySQL")+$Xb;if(!defined("DRIVER")){$_f=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($N,$V,$G){mysqli_report(MYSQLI_REPORT_OFF);list($hd,$wf)=explode(":",$N,2);$J=@$this->real_connect(($N!=""?$hd:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$G!=""?$G:ini_get("mysqli.default_pw")),null,(is_numeric($wf)?$wf:ini_get("mysqli.default_port")),(!is_numeric($wf)?$wf:null));return$J;}function
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
insertUpdate($Q,$L,$Cf){$f=array_keys(reset($L));$Af="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$Th=array();foreach($f
as$x)$Th[$x]="$x = VALUES($x)";$Og="\nON DUPLICATE KEY UPDATE ".implode(", ",$Th);$Th=array();$y=0;foreach($L
as$O){$Y="(".implode(", ",$O).")";if($Th&&(strlen($Af)+$y+strlen($Y)+strlen($Og)>1e6)){if(!queries($Af.implode(",\n",$Th).$Og))return
false;$Th=array();$y=0;}$Th[]=$Y;$y+=strlen($Y)+2;}return
queries($Af.implode(",\n",$Th).$Og);}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$k=$b->credentials();if($h->connect($k[0],$k[1],$k[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");return$h;}$J=$h->error;if(function_exists('iconv')&&!is_utf8($J)&&strlen($mg=iconv("windows-1250","utf-8",$J))>strlen($J))$J=$mg;return$J;}function
get_databases($Lc){global$h;$J=get_session("dbs");if($J===null){$H=($h->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$J=($Lc?slow_query($H):get_vals($H));restart_session();set_session("dbs",$J);stop_session();}return$J;}function
limit($H,$Z,$z,$D=0,$vg=" "){return" $H$Z".($z!==null?$vg."LIMIT $z".($D?" OFFSET $D":""):"");}function
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
foreign_keys($Q){global$h,$Ne;static$tf='`(?:[^`]|``)+`';$J=array();$Bb=$h->result("SHOW CREATE TABLE ".table($Q),1);if($Bb){preg_match_all("~CONSTRAINT ($tf) FOREIGN KEY ?\\(((?:$tf,? ?)+)\\) REFERENCES ($tf)(?:\\.($tf))? \\(((?:$tf,? ?)+)\\)(?: ON DELETE ($Ne))?(?: ON UPDATE ($Ne))?~",$Bb,$ee,PREG_SET_ORDER);foreach($ee
as$B){preg_match_all("~$tf~",$B[2],$Dg);preg_match_all("~$tf~",$B[5],$bh);$J[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$Dg[0]),"target"=>array_map('idf_unescape',$bh[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$J;}function
view($C){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$h->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$J=array();foreach(get_rows("SHOW COLLATION")as$K){if($K["Default"])$J[$K["Charset"]][-1]=$K["Collation"];else$J[$K["Charset"]][]=$K["Collation"];}ksort($J);foreach($J
as$x=>$X)asort($J[$x]);return$J;}function
information_schema($m){global$h;return($h->server_info>=5&&$m=="information_schema")||($h->server_info>=5.5&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
error_line(){global$h;if(preg_match('~ at line ([0-9]+)$~',$h->error,$Yf))return$Yf[1]-1;}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" COLLATE ".q($d):""));}function
drop_databases($l){$J=apply_queries("DROP DATABASE",$l,'idf_escape');restart_session();set_session("dbs",null);return$J;}function
rename_database($C,$d){$J=false;if(create_database($C,$d)){$ag=array();foreach(tables_list()as$Q=>$U)$ag[]=table($Q)." TO ".idf_escape($C).".".table($Q);$J=(!$ag||queries("RENAME TABLE ".implode(", ",$ag)));if($J)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$J;}function
auto_increment(){$Ma=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$u){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$u["columns"],true)){$Ma="";break;}if($u["type"]=="PRIMARY")$Ma=" UNIQUE";}}return" AUTO_INCREMENT$Ma";}function
alter_table($Q,$C,$p,$Mc,$rb,$nc,$d,$La,$of){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$Mc);$Ig=($rb!==null?" COMMENT=".q($rb):"").($nc?" ENGINE=".q($nc):"").($d?" COLLATE ".q($d):"").($La!=""?" AUTO_INCREMENT=$La":"");if($Q=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)$Ig$of");if($Q!=$C)$c[]="RENAME TO ".table($C);if($Ig)$c[]=ltrim($Ig);return($c||$of?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$of):true);}function
alter_indexes($Q,$c){foreach($c
as$x=>$X)$c[$x]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($Yh){return
queries("DROP VIEW ".implode(", ",array_map('table',$Yh)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$Yh,$bh){$ag=array();foreach(array_merge($S,$Yh)as$Q)$ag[]=table($Q)." TO ".idf_escape($bh).".".table($Q);return
queries("RENAME TABLE ".implode(", ",$ag));}function
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
routine($C,$U){global$h,$pc,$ud,$Bh;$Ca=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Ah="((".implode("|",array_merge(array_keys($Bh),$Ca)).")\\b(?:\\s*\\(((?:[^'\")]|$pc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$tf="\\s*(".($U=="FUNCTION"?"":$ud).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Ah";$j=$h->result("SHOW CREATE $U ".idf_escape($C),2);preg_match("~\\(((?:$tf\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Ah\\s+":"")."(.*)~is",$j,$B);$p=array();preg_match_all("~$tf\\s*,?~is",$B[1],$ee,PREG_SET_ORDER);foreach($ee
as$jf){$C=str_replace("``","`",$jf[2]).$jf[3];$p[]=array("field"=>$C,"type"=>strtolower($jf[5]),"length"=>preg_replace_callback("~$pc~s",'normalize_enum',$jf[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$jf[8] $jf[7]"))),"null"=>1,"full_type"=>$jf[4],"inout"=>strtoupper($jf[1]),"collation"=>strtolower($jf[9]),);}if($U!="FUNCTION")return
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
set_schema($og){return
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
support($Fc){global$h;return!preg_match("~scheme|sequence|type|view_trigger".($h->server_info<5.1?"|event|partitioning".($h->server_info<5?"|routine|trigger|view":""):"")."~",$Fc);}$w="sql";$Bh=array();$Lg=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(25)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(26)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(30)=>array("enum"=>65535,"set"=>64),lang(27)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(29)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$x=>$X){$Bh+=$X;$Lg[$x]=array_keys($X);}$Ih=array("unsigned","zerofill","unsigned zerofill");$Se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Uc=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$Zc=array("avg","count","count distinct","group_concat","max","min","sum");$fc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.2.3";class
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
login($ae,$G){return
true;}function
tableName($Sg){return
h($Sg["Name"]);}function
fieldName($o,$Xe=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Sg,$O=""){echo'<p class="links">';$Zd=array("select"=>lang(38));if(support("table")||support("indexes"))$Zd["table"]=lang(39);if(support("table")){if(is_view($Sg))$Zd["view"]=lang(40);else$Zd["create"]=lang(41);}if($O!==null)$Zd["edit"]=lang(42);foreach($Zd
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
selectVal($X,$_,$o,$ef){$J=($X===null?"<i>NULL</i>":(preg_match("~char|binary~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$J=lang(43,strlen($ef));return($_?"<a href='".h($_)."'".(is_url($_)?" rel='noreferrer'":"").">$J</a>":$J);}function
editVal($X,$o){return$X;}function
selectColumnsPrint($M,$f){global$Uc,$Zc;print_fieldset("select",lang(44),$M);$s=0;$M[""]=array();foreach($M
as$x=>$X){$X=$_GET["columns"][$x];$e=select_input(" name='columns[$s][col]' onchange='".($x!==""?"selectFieldChange(this.form)":"selectAddRow(this)").";'",$f,$X["col"]);echo"<div>".($Uc||$Zc?"<select name='columns[$s][fun]' onchange='helpClose();".($x!==""?"":" this.nextSibling.nextSibling.onchange();")."'".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).">".optionlist(array(-1=>"")+array_filter(array(lang(45)=>$Uc,lang(46)=>$Zc)),$X["fun"])."</select>"."($e)":$e)."</div>\n";$s++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$f,$v){print_fieldset("search",lang(47),$Z);foreach($v
as$s=>$u){if($u["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$u["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$s]' value='".h($_GET["fulltext"][$s])."' onchange='selectFieldChange(this.form);'>",checkbox("boolean[$s]",1,isset($_GET["boolean"][$s]),"BOOL"),"<br>\n";}}$_GET["where"]=(array)$_GET["where"];reset($_GET["where"]);$Za="this.nextSibling.onchange();";for($s=0;$s<=count($_GET["where"]);$s++){list(,$X)=each($_GET["where"]);if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$s][col]' onchange='$Za'",$f,$X["col"],"(".lang(48).")"),html_select("where[$s][op]",$this->operators,$X["op"],$Za),"<input type='search' name='where[$s][val]' value='".h($X["val"])."' onchange='".($X?"selectFieldChange(this.form)":"selectAddRow(this)").";' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($Xe,$f,$v){print_fieldset("sort",lang(49),$Xe);$s=0;foreach((array)$_GET["order"]as$x=>$X){if($X!=""){echo"<div>".select_input(" name='order[$s]' onchange='selectFieldChange(this.form);'",$f,$X),checkbox("desc[$s]",1,isset($_GET["desc"][$x]),lang(50))."</div>\n";$s++;}}echo"<div>".select_input(" name='order[$s]' onchange='selectAddRow(this);'",$f),checkbox("desc[$s]",1,false,lang(50))."</div>\n","</div></fieldset>\n";}function
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
selectQueryBuild($M,$Z,$Xc,$Xe,$z,$E){return"";}function
messageQuery($H,$ih){global$w;restart_session();$ed=&get_session("queries");$jd="sql-".count($ed[$_GET["db"]]);if(strlen($H)>1e6)$H=preg_replace('~[\x80-\xFF]+$~','',substr($H,0,1e6))."\n...";$ed[$_GET["db"]][]=array($H,time(),$ih);return" <span class='time'>".@date("H:i:s")."</span> <a href='#$jd' onclick=\"return !toggle('$jd');\">".lang(55)."</a>"."<div id='$jd' class='hidden'><pre><code class='jush-$w'>".shorten_utf8($H,1000).'</code></pre>'.($ih?" <span class='time'>($ih)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($ed[$_GET["db"]])-1)).'">'.lang(10).'</a>':'').'</div>';}function
editFunctions($o){global$fc;$J=($o["null"]?"NULL/":"");foreach($fc
as$x=>$Uc){if(!$x||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($Uc
as$tf=>$X){if(!$tf||preg_match("~$tf~",$o["type"]))$J.="/$X";}if($x&&!preg_match('~set|blob|bytea|raw|file~',$o["type"]))$J.="/SQL";}}if($o["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$J=lang(56);return
explode("/",$J);}function
editInput($Q,$o,$Ja,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ja value='-1' checked><i>".lang(8)."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ja value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ja,$o,$Y,0);return"";}function
processInput($o,$Y,$r=""){if($r=="SQL")return$Y;$C=$o["field"];$J=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$r))$J="$r()";elseif(preg_match('~^current_(date|timestamp)$~',$r))$J=$r;elseif(preg_match('~^([+-]|\\|\\|)$~',$r))$J=idf_escape($C)." $r $J";elseif(preg_match('~^[+-] interval$~',$r))$J=idf_escape($C)." $r ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i",$Y)?$Y:$J);elseif(preg_match('~^(addtime|subtime|concat)$~',$r))$J="$r(".idf_escape($C).", $J)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$r))$J="$r($J)";return
unconvert_field($o,$J);}function
dumpOutput(){$J=array('text'=>lang(57),'file'=>lang(58));if(function_exists('gzencode'))$J['gz']='gzip';return$J;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable($Q,$Mg,$Dd=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Mg)dump_csv(array_keys(fields($Q)));}else{if($Dd==2){$p=array();foreach(fields($Q)as$C=>$o)$p[]=idf_escape($C)." $o[full_type]";$j="CREATE TABLE ".table($Q)." (".implode(", ",$p).")";}else$j=create_sql($Q,$_POST["auto_increment"]);set_utf8mb4($j);if($Mg&&$j){if($Mg=="DROP+CREATE"||$Dd==1)echo"DROP ".($Dd==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($Dd==1)$j=remove_definer($j);echo"$j;\n\n";}}}function
dumpData($Q,$Mg,$H){global$h,$w;$ge=($w=="sqlite"?0:1048576);if($Mg){if($_POST["format"]=="sql"){if($Mg=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$p=fields($Q);}$I=$h->query($H,1);if($I){$wd="";$Xa="";$Kd=array();$Og="";$Gc=($Q!=''?'fetch_assoc':'fetch_row');while($K=$I->$Gc()){if(!$Kd){$Th=array();foreach($K
as$X){$o=$I->fetch_field();$Kd[]=$o->name;$x=idf_escape($o->name);$Th[]="$x = VALUES($x)";}$Og=($Mg=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Th):"").";\n";}if($_POST["format"]!="sql"){if($Mg=="table"){dump_csv($Kd);$Mg="INSERT";}dump_csv($K);}else{if(!$wd)$wd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$Kd)).") VALUES";foreach($K
as$x=>$X){$o=$p[$x];$K[$x]=($X!==null?unconvert_field($o,preg_match('~(^|[^o])int|float|double|decimal~',$o["type"])&&$X!=''?$X:q($X)):"NULL");}$mg=($ge?"\n":" ")."(".implode(",\t",$K).")";if(!$Xa)$Xa=$wd.$mg;elseif(strlen($Xa)+4+strlen($mg)+strlen($Og)<$ge)$Xa.=",$mg";else{echo$Xa.$Og;$Xa=$wd.$mg;}}}if($Xa)echo$Xa.$Og;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$h->error)."\n";}}function
dumpFilename($kd){return
friendly_url($kd!=""?$kd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($kd,$ve=false){$hf=$_POST["output"];$Ac=(preg_match('~sql~',$_POST["format"])?"sql":($ve?"tar":"csv"));header("Content-Type: ".($hf=="gz"?"application/x-gzip":($Ac=="tar"?"application/x-tar":($Ac=="sql"||$hf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($hf=="gz")ob_start('ob_gzencode',1e6);return$Ac;}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.lang(59)."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?lang(60):lang(61))."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.lang(62)."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".lang(63)."</a>\n":"");return
true;}function
navigation($ue){global$ia,$w,$Xb,$h;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download" target="_blank" id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($ue=="auth"){$Kc=true;foreach((array)$_SESSION["pwds"]as$Vh=>$zg){foreach($zg
as$N=>$Qh){foreach($Qh
as$V=>$G){if($G!==null){if($Kc){echo"<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";$Kc=false;}$Jb=$_SESSION["db"][$Vh][$N][$V];foreach(($Jb?array_keys($Jb):array(""))as$m)echo"<a href='".h(auth_url($Vh,$N,$V,$m))."'>($Xb[$Vh]) ".h($V.($N!=""?"@$N":"").($m!=""?" - $m":""))."</a><br>\n";}}}}}else{if($_GET["ns"]!==""&&!$ue&&DB!=""){$h->select_db(DB);$S=table_status('',true);}if(support("sql")){echo'<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=jush.js&amp;version=4.2.3",'"></script>
<script type="text/javascript">
';if($S){$Zd=array();foreach($S
as$Q=>$U)$Zd[]=preg_quote($Q,'/');echo"var jushLinks = { $w: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$Zd).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$w;\n";}echo'bodyLoad(\'',(is_object($h)?substr($h->server_info,0,3):""),'\');
</script>
';}$this->databasesPrint($ue);if(DB==""||!$ue){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".lang(55)."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".lang(64)."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".lang(65)."</a>\n";}if($_GET["ns"]!==""&&!$ue&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".lang(66)."</a>\n";if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($ue){global$b,$h;$l=$this->databases();echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Hb=" onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'";echo"<span title='".lang(67)."'>DB</span>: ".($l?"<select name='db'$Hb>".optionlist(array(""=>"")+$l,DB)."</select>":'<input name="db" value="'.h(DB).'" autocapitalize="off">'),"<input type='submit' value='".lang(20)."'".($l?" class='hidden'":"").">\n";if($ue!="db"&&DB!=""&&$h->select_db(DB)){if(support("scheme")){echo"<br>".lang(68).": <select name='ns'$Hb>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':(isset($_GET["privileges"])?'<input type="hidden" name="privileges" value="">':"")))),"</p></form>\n";}function
tablesPrint($S){echo"<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";foreach($S
as$Q=>$Ig){echo'<a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q,"select").">".lang(69)."</a> ";$C=$this->tableName($Ig);echo(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($Ig)?"view":""),"structure")." title='".lang(39)."'>$C</a>":"<span>$C</span>")."<br>\n";}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$Se;function
page_header($lh,$n="",$Wa=array(),$mh=""){global$ca,$ia,$b,$Xb,$w;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$nh=$lh.($mh!=""?": $mh":"");$oh=strip_tags($nh.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ca,'" dir="',lang(70),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="origin-when-crossorigin">
<title>',$oh,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=4.2.3",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=4.2.3",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.3",'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.3",'">
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
page_messages($n){$Kh=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$qe=$_SESSION["messages"][$Kh];if($qe){echo"<div class='message'>".implode("</div>\n<div class='message'>",$qe)."</div>\n";unset($_SESSION["messages"][$Kh]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($ue=""){global$b,$T;echo'</div>

';switch_lang();if($ue!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(72),'" id="logout">
<input type="hidden" name="token" value="',$T,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($ue);echo'</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';}function
int32($xe){while($xe>=2147483648)$xe-=4294967296;while($xe<=-2147483649)$xe+=4294967296;return(int)$xe;}function
long2str($W,$ai){$mg='';foreach($W
as$X)$mg.=pack('V',$X);if($ai)return
substr($mg,0,end($W));return$mg;}function
str2long($mg,$ai){$W=array_values(unpack('V*',str_pad($mg,4*ceil(strlen($mg)/4),"\0")));if($ai)$W[]=strlen($mg);return$W;}function
xxtea_mx($gi,$fi,$Pg,$Gd){return
int32((($gi>>5&0x7FFFFFF)^$fi<<2)+(($fi>>3&0x1FFFFFFF)^$gi<<4))^int32(($Pg^$fi)+($Gd^$gi));}function
encrypt_string($Kg,$x){if($Kg=="")return"";$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Kg,true);$xe=count($W)-1;$gi=$W[$xe];$fi=$W[0];$Lf=floor(6+52/($xe+1));$Pg=0;while($Lf-->0){$Pg=int32($Pg+0x9E3779B9);$ec=$Pg>>2&3;for($if=0;$if<$xe;$if++){$fi=$W[$if+1];$we=xxtea_mx($gi,$fi,$Pg,$x[$if&3^$ec]);$gi=int32($W[$if]+$we);$W[$if]=$gi;}$fi=$W[0];$we=xxtea_mx($gi,$fi,$Pg,$x[$if&3^$ec]);$gi=int32($W[$xe]+$we);$W[$xe]=$gi;}return
long2str($W,false);}function
decrypt_string($Kg,$x){if($Kg=="")return"";if(!$x)return
false;$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Kg,false);$xe=count($W)-1;$gi=$W[$xe];$fi=$W[0];$Lf=floor(6+52/($xe+1));$Pg=int32($Lf*0x9E3779B9);while($Pg){$ec=$Pg>>2&3;for($if=$xe;$if>0;$if--){$gi=$W[$if-1];$we=xxtea_mx($gi,$fi,$Pg,$x[$if&3^$ec]);$fi=int32($W[$if]-$we);$W[$if]=$fi;}$gi=$W[$xe];$we=xxtea_mx($gi,$fi,$Pg,$x[$if&3^$ec]);$fi=int32($W[0]-$we);$W[0]=$fi;$Pg=int32($Pg-0x9E3779B9);}return
long2str($W,true);}$h='';$dd=$_SESSION["token"];if(!$dd)$_SESSION["token"]=rand(1,1e6);$T=get_token();$uf=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($x)=explode(":",$X);$uf[$x]=$X;}}function
add_invalid_login(){global$b;$Ic=get_temp_dir()."/adminer.invalid";$Sc=@fopen($Ic,"r+");if(!$Sc){$Sc=@fopen($Ic,"w");if(!$Sc)return;}flock($Sc,LOCK_EX);$zd=unserialize(stream_get_contents($Sc));$ih=time();if($zd){foreach($zd
as$_d=>$X){if($X[0]<$ih)unset($zd[$_d]);}}$yd=&$zd[$b->bruteForceKey()];if(!$yd)$yd=array($ih+30*60,0);$yd[1]++;$xg=serialize($zd);rewind($Sc);fwrite($Sc,$xg);ftruncate($Sc,strlen($xg));flock($Sc,LOCK_UN);fclose($Sc);}$Ka=$_POST["auth"];if($Ka){$zd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$yd=$zd[$b->bruteForceKey()];$Ce=($yd[1]>30?$yd[0]-time():0);if($Ce>0)auth_error(lang(73,ceil($Ce/60)));session_regenerate_id();$Vh=$Ka["driver"];$N=$Ka["server"];$V=$Ka["username"];$G=(string)$Ka["password"];$m=$Ka["db"];set_password($Vh,$N,$V,$G);$_SESSION["db"][$Vh][$N][$V][$m]=true;if($Ka["permanent"]){$x=base64_encode($Vh)."-".base64_encode($N)."-".base64_encode($V)."-".base64_encode($m);$Ff=$b->permanentLogin(true);$uf[$x]="$x:".base64_encode($Ff?encrypt_string($G,$Ff):"");cookie("adminer_permanent",implode(" ",$uf));}if(count($_POST)==1||DRIVER!=$Vh||SERVER!=$N||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($Vh,$N,$V,$m));}elseif($_POST["logout"]){if($dd&&!verify_token()){page_header(lang(72),lang(74));page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$x)set_session($x,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(75));}}elseif($uf&&!$_SESSION["pwds"]){session_regenerate_id();$Ff=$b->permanentLogin();foreach($uf
as$x=>$X){list(,$hb)=explode(":",$X);list($Vh,$N,$V,$m)=array_map('base64_decode',explode("-",$x));set_password($Vh,$N,$V,decrypt_string(base64_decode($hb),$Ff));$_SESSION["db"][$Vh][$N][$V][$m]=true;}}function
unset_permanent(){global$uf;foreach($uf
as$x=>$X){list($Vh,$N,$V,$m)=array_map('base64_decode',explode("-",$x));if($Vh==DRIVER&&$N==SERVER&&$V==$_GET["username"]&&$m==DB)unset($uf[$x]);}cookie("adminer_permanent",implode(" ",$uf));}function
auth_error($n){global$b,$dd;$n=h($n);$_g=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$_g]||$_GET[$_g])&&!$dd)$n=lang(76);else{add_invalid_login();$G=get_password();if($G!==null){if($G===false)$n.='<br>'.lang(77,'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$_g]&&$_GET[$_g]&&ini_bool("session.use_only_cookies"))$n=lang(78);$F=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$F["lifetime"]);page_header(lang(36),$n,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(79),lang(80,implode(", ",$_f)),false);page_footer("auth");exit;}$h=connect();}$Wb=new
Min_Driver($h);if(!is_object($h)||!$b->login($_GET["username"],get_password()))auth_error((is_string($h)?$h:lang(81)));if($Ka&&$_POST["token"])$_POST["token"]=$T;$n='';if($_POST){if(!verify_token()){$td="max_input_vars";$ke=ini_get($td);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$x){$X=ini_get($x);if($X&&(!$ke||$X<$ke)){$td=$x;$ke=$X;}}}$n=(!$_POST["token"]&&$ke?lang(82,"'$td'"):lang(74).' '.lang(83));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(84,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(85);}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
select($I,$i=null,$af=array(),$z=0){global$w;$Zd=array();$v=array();$f=array();$Ta=array();$Bh=array();$J=array();odd('');for($s=0;(!$z||$s<$z)&&($K=$I->fetch_row());$s++){if(!$s){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($Fd=0;$Fd<count($K);$Fd++){$o=$I->fetch_field();$C=$o->name;$Ze=$o->orgtable;$Ye=$o->orgname;$J[$o->table]=$Ze;if($af&&$w=="sql")$Zd[$Fd]=($C=="table"?"table=":($C=="possible_keys"?"indexes=":null));elseif($Ze!=""){if(!isset($v[$Ze])){$v[$Ze]=array();foreach(indexes($Ze,$i)as$u){if($u["type"]=="PRIMARY"){$v[$Ze]=array_flip($u["columns"]);break;}}$f[$Ze]=$v[$Ze];}if(isset($f[$Ze][$Ye])){unset($f[$Ze][$Ye]);$v[$Ze][$Ye]=$Fd;$Zd[$Fd]=$Ze;}}if($o->charsetnr==63)$Ta[$Fd]=true;$Bh[$Fd]=$o->type;echo"<th".($Ze!=""||$o->name!=$Ye?" title='".h(($Ze!=""?"$Ze.":"").$Ye)."'":"").">".h($C).($af?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($C))):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($K
as$x=>$X){if($X===null)$X="<i>NULL</i>";elseif($Ta[$x]&&!is_utf8($X))$X="<i>".lang(43,strlen($X))."</i>";elseif(!strlen($X))$X="&nbsp;";else{$X=h($X);if($Bh[$x]==254)$X="<code>$X</code>";}if(isset($Zd[$x])&&!$f[$Zd[$x]]){if($af&&$w=="sql"){$Q=$K[array_search("table=",$Zd)];$_=$Zd[$x].urlencode($af[$Q]!=""?$af[$Q]:$Q);}else{$_="edit=".urlencode($Zd[$x]);foreach($v[$Zd[$x]]as$lb=>$Fd)$_.="&where".urlencode("[".bracket_escape($lb)."]")."=".urlencode($K[$Fd]);}$X="<a href='".h(ME.$_)."'>$X</a>";}echo"<td>$X";}}echo($s?"</table>":"<p class='message'>".lang(12))."\n";return$J;}function
referencable_primary($ug){$J=array();foreach(table_status('',true)as$Tg=>$Q){if($Tg!=$ug&&fk_support($Q)){foreach(fields($Tg)as$o){if($o["primary"]){if($J[$Tg]){unset($J[$Tg]);break;}$J[$Tg]=$o;}}}}return$J;}function
textarea($C,$Y,$L=10,$ob=80){global$w;echo"<textarea name='$C' rows='$L' cols='$ob' class='sqlarea jush-$w' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($x,$o,$nb,$Oc=array()){global$Lg,$Bh,$Ih,$Ne;$U=$o["type"];echo'<td><select name="',h($x),'[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);"',on_help("getTarget(event).value",1),'>';if($U&&!isset($Bh[$U])&&!isset($Oc[$U]))array_unshift($Lg,$U);if($Oc)$Lg[lang(86)]=$Oc;echo
optionlist($Lg,$U),'</select>
<td><input name="',h($x),'[length]" value="',h($o["length"]),'" size="3" onfocus="editingLengthFocus(this);"',(!$o["length"]&&preg_match('~var(char|binary)$~',$U)?" class='required'":""),' onchange="editingLengthChange(this);" onkeyup="this.onchange();"><td class="options">';echo"<select name='".h($x)."[collation]'".(preg_match('~(char|text|enum|set)$~',$U)?"":" class='hidden'").'><option value="">('.lang(87).')'.optionlist($nb,$o["collation"]).'</select>',($Ih?"<select name='".h($x)."[unsigned]'".(!$U||preg_match('~((^|[^o])int|float|double|decimal)$~',$U)?"":" class='hidden'").'><option>'.optionlist($Ih,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($x)."[on_update]'".(preg_match('~timestamp|datetime~',$U)?"":" class='hidden'").'>'.optionlist(array(""=>"(".lang(88).")","CURRENT_TIMESTAMP"),$o["on_update"]).'</select>':''),($Oc?"<select name='".h($x)."[on_delete]'".(preg_match("~`~",$U)?"":" class='hidden'")."><option value=''>(".lang(89).")".optionlist(explode("|",$Ne),$o["on_delete"])."</select> ":" ");}function
process_length($y){global$pc;return(preg_match("~^\\s*\\(?\\s*$pc(?:\\s*,\\s*$pc)*+\\s*\\)?\\s*\$~",$y)&&preg_match_all("~$pc~",$y,$ee)?"(".implode(",",$ee[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$y)));}function
process_type($o,$mb="COLLATE"){global$Ih;return" $o[type]".process_length($o["length"]).(preg_match('~(^|[^o])int|float|double|decimal~',$o["type"])&&in_array($o["unsigned"],$Ih)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $mb ".q($o["collation"]):"");}function
process_field($o,$_h){global$w;$Lb=$o["default"];return
array(idf_escape(trim($o["field"])),process_type($_h),($o["null"]?" NULL":" NOT NULL"),(isset($Lb)?" DEFAULT ".((preg_match('~time~',$o["type"])&&preg_match('~^CURRENT_TIMESTAMP$~i',$Lb))||($w=="sqlite"&&preg_match('~^CURRENT_(TIME|TIMESTAMP|DATE)$~i',$Lb))||($o["type"]=="bit"&&preg_match("~^([0-9]+|b'[0-1]+')\$~",$Lb))||($w=="pgsql"&&preg_match("~^[a-z]+\\(('[^']*')+\\)\$~",$Lb))?$Lb:q($Lb)):""),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
type_class($U){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$x=>$X){if(preg_match("~$x|$X~",$U))return" class='$x'";}}function
edit_fields($p,$nb,$U="TABLE",$Oc=array(),$sb=false){global$h,$ud;$p=array_values($p);echo'<thead><tr class="wrap">
';if($U=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th>',($U=="TABLE"?lang(90):lang(91)),'<td>',lang(92),'<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>',lang(93),'<td>',lang(94);if($U=="TABLE"){echo'<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="',lang(56),'">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td>',lang(95),(support("comment")?"<td".($sb?"":" class='hidden'").">".lang(96):"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=4.2.3' alt='+' title='".lang(97)."'>",'<script type="text/javascript">row_count = ',count($p),';</script>
</thead>
<tbody onkeydown="return editingKeydown(event);">
';foreach($p
as$s=>$o){$s++;$bf=$o[($_POST?"orig":"field")];$Sb=(isset($_POST["add"][$s-1])||(isset($o["field"])&&!$_POST["drop_col"][$s]))&&(support("drop_col")||$bf=="");echo'<tr',($Sb?"":" style='display: none;'"),'>
',($U=="PROCEDURE"?"<td>".html_select("fields[$s][inout]",explode("|",$ud),$o["inout"]):""),'<th>';if($Sb){echo'<input name="fields[',$s,'][field]" value="',h($o["field"]),'" onchange="editingNameChange(this);',($o["field"]!=""||count($p)>1?'':' editingAddRow(this);" onkeyup="if (this.value) editingAddRow(this);'),'" maxlength="64" autocapitalize="off">';}echo'<input type="hidden" name="fields[',$s,'][orig]" value="',h($bf),'">
';edit_type("fields[$s]",$o,$nb,$Oc);if($U=="TABLE"){echo'<td>',checkbox("fields[$s][null]",1,$o["null"],"","","block"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$s,'"';if($o["auto_increment"]){echo' checked';}?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }"></label><td><?php
echo
checkbox("fields[$s][has_default]",1,$o["has_default"]),'<input name="fields[',$s,'][default]" value="',h($o["default"]),'" onkeyup="keyupChange.call(this);" onchange="this.previousSibling.checked = true;">
',(support("comment")?"<td".($sb?"":" class='hidden'")."><input name='fields[$s][comment]' value='".h($o["comment"])."' maxlength='".($h->server_info>=5.5?1024:255)."'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$s]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=4.2.3' alt='+' title='".lang(97)."' onclick='return !editingAddRow(this, 1);'>&nbsp;"."<input type='image' class='icon' name='up[$s]' src='".h(preg_replace("~\\?.*~","",ME))."?file=up.gif&amp;version=4.2.3' alt='^' title='".lang(98)."'>&nbsp;"."<input type='image' class='icon' name='down[$s]' src='".h(preg_replace("~\\?.*~","",ME))."?file=down.gif&amp;version=4.2.3' alt='v' title='".lang(99)."'>&nbsp;":""),($bf==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$s]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=4.2.3' alt='x' title='".lang(100)."' onclick=\"return !editingRemoveRow(this, 'fields\$1[field]');\">":""),"\n";}}function
process_fields(&$p){ksort($p);$D=0;if($_POST["up"]){$Qd=0;foreach($p
as$x=>$o){if(key($_POST["up"])==$x){unset($p[$x]);array_splice($p,$Qd,0,array($o));break;}if(isset($o["field"]))$Qd=$D;$D++;}}elseif($_POST["down"]){$Qc=false;foreach($p
as$x=>$o){if(isset($o["field"])&&$Qc){unset($p[key($_POST["down"])]);array_splice($p,$D,0,array($Qc));break;}if(key($_POST["down"])==$x)$Qc=$o;$D++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($B){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($B[0][0].$B[0][0],$B[0][0],substr($B[0],1,-1))),'\\'))."'";}function
grant($Vc,$Hf,$f,$Me){if(!$Hf)return
true;if($Hf==array("ALL PRIVILEGES","GRANT OPTION"))return($Vc=="GRANT"?queries("$Vc ALL PRIVILEGES$Me WITH GRANT OPTION"):queries("$Vc ALL PRIVILEGES$Me")&&queries("$Vc GRANT OPTION$Me"));return
queries("$Vc ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$f, ",$Hf).$f).$Me);}function
drop_create($Yb,$j,$Zb,$fh,$bc,$A,$pe,$ne,$oe,$Je,$_e){if($_POST["drop"])query_redirect($Yb,$A,$pe);elseif($Je=="")query_redirect($j,$A,$oe);elseif($Je!=$_e){$Cb=queries($j);queries_redirect($A,$ne,$Cb&&queries($Yb));if($Cb)queries($Zb);}else
queries_redirect($A,$ne,queries($fh)&&queries($bc)&&queries($Yb)&&queries($j));}function
create_trigger($Me,$K){global$w;$kh=" $K[Timing] $K[Event]".($K["Event"]=="UPDATE OF"?" ".idf_escape($K["Of"]):"");return"CREATE TRIGGER ".idf_escape($K["Trigger"]).($w=="mssql"?$Me.$kh:$kh.$Me).rtrim(" $K[Type]\n$K[Statement]",";").";";}function
create_routine($ig,$K){global$ud;$O=array();$p=(array)$K["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$O[]=(preg_match("~^($ud)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}return"CREATE $ig ".idf_escape(trim($K["name"]))." (".implode(", ",$O).")".(isset($_GET["function"])?" RETURNS".process_type($K["returns"],"CHARACTER SET"):"").($K["language"]?" LANGUAGE $K[language]":"").rtrim("\n$K[definition]",";").";";}function
remove_definer($H){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$H);}function
format_foreign_key($q){global$Ne;return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$q["source"])).") REFERENCES ".table($q["table"])." (".implode(", ",array_map('idf_escape',$q["target"])).")".(preg_match("~^($Ne)\$~",$q["on_delete"])?" ON DELETE $q[on_delete]":"").(preg_match("~^($Ne)\$~",$q["on_update"])?" ON UPDATE $q[on_update]":"");}function
tar_file($Ic,$ph){$J=pack("a100a8a8a8a12a12",$Ic,644,0,0,decoct($ph->size),decoct(time()));$fb=8*32;for($s=0;$s<strlen($J);$s++)$fb+=ord($J[$s]);$J.=sprintf("%06o",$fb)."\0 ";echo$J,str_repeat("\0",512-strlen($J));$ph->send();echo
str_repeat("\0",511-($ph->size+511)%512);}function
ini_bytes($td){$X=ini_get($td);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($sf){global$w,$h;$Mh=array('sql'=>"http://dev.mysql.com/doc/refman/".substr($h->server_info,0,3)."/en/",'sqlite'=>"http://www.sqlite.org/",'pgsql'=>"http://www.postgresql.org/docs/".substr($h->server_info,0,3)."/static/",'mssql'=>"http://msdn.microsoft.com/library/",'oracle'=>"http://download.oracle.com/docs/cd/B19306_01/server.102/b14200/",);return($sf[$w]?"<a href='$Mh[$w]$sf[$w]' target='_blank' rel='noreferrer'><sup>?</sup></a>":"");}function
ob_gzencode($P){return
gzencode($P);}function
db_size($m){global$h;if(!$h->select_db($m))return"?";$J=0;foreach(table_status()as$R)$J+=$R["Data_length"]+$R["Index_length"];return
format_number($J);}function
set_utf8mb4($j){global$h;static$O=false;if(!$O&&preg_match('~\butf8mb4~i',$j)){$O=true;echo"SET NAMES ".charset($h).";\n\n";}}function
connect_error(){global$b,$h,$T,$n,$Xb;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header(lang(35).": ".h(DB),lang(101),true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),lang(102),drop_databases($_POST["db"]));page_header(lang(103),$n,false);echo"<p class='links'>\n";foreach(array('database'=>lang(104),'privileges'=>lang(63),'processlist'=>lang(105),'variables'=>lang(106),'status'=>lang(107),)as$x=>$X){if(support($x))echo"<a href='".h(ME)."$x='>$X</a>\n";}echo"<p>".lang(108,$Xb[DRIVER],"<b>".h($h->server_info)."</b>","<b>$h->extension</b>")."\n","<p>".lang(109,"<b>".h(logged_user())."</b>")."\n";$l=$b->databases();if($l){$pg=support("scheme");$nb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n","<thead><tr>".(support("database")?"<td>&nbsp;":"")."<th>".lang(35)." - <a href='".h(ME)."refresh=1'>".lang(110)."</a>"."<td>".lang(111)."<td>".lang(112)."<td>".lang(113)." - <a href='".h(ME)."dbsize=1' onclick=\"return !ajaxSetHtml('".h(js_escape(ME))."script=connect');\">".lang(114)."</a>"."</thead>\n";$l=($_GET["dbsize"]?count_tables($l):array_flip($l));foreach($l
as$m=>$S){$hg=h(ME)."db=".urlencode($m);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$m,in_array($m,(array)$_POST["db"])):""),"<th><a href='$hg'>".h($m)."</a>";$d=nbsp(db_collation($m,$nb));echo"<td>".(support("database")?"<a href='$hg".($pg?"&amp;ns=":"")."&amp;database=' title='".lang(59)."'>$d</a>":$d),"<td align='right'><a href='$hg&amp;schema=' id='tables-".h($m)."' title='".lang(62)."'>".($_GET["dbsize"]?$S:"?")."</a>","<td align='right' id='size-".h($m)."'>".($_GET["dbsize"]?db_size($m):"?"),"\n";}echo"</table>\n",(support("database")?"<fieldset><legend>".lang(115)." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value='' onclick=\"selectCount('selected', formChecked(this, /^db/));\">\n"."<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n"."</div></fieldset>\n":""),"<script type='text/javascript'>tableCheck();</script>\n","<input type='hidden' name='token' value='$T'>\n","</form>\n";}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$h->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header(lang(68).": ".h($_GET["ns"]),lang(117),true);page_footer("ns");exit;}}$Ne="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($xb){$this->size+=strlen($xb);fwrite($this->handler,$xb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$pc="'(?:''|[^'\\\\]|\\\\.)*'";$ud="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$M=array(idf_escape($_GET["field"]));$I=$Wb->select($a,$M,array(where($_GET,$p)),$M);$K=($I?$I->fetch_row():array());echo$K[0];exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$R=table_status1($a,true);page_header(($p&&is_view($R)?lang(118):lang(119)).": ".h($a),$n);$b->selectLinks($R);$rb=$R["Comment"];if($rb!="")echo"<p>".lang(96).": ".h($rb)."\n";if($p){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(120)."<td>".lang(92).(support("comment")?"<td>".lang(96):"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".lang(56)."</i>":""),(isset($o["default"])?" <span title='".lang(95)."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".nbsp($o["comment"]):""),"\n";}echo"</table>\n";}if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".lang(121)."</h3>\n";$v=indexes($a);if($v){echo"<table cellspacing='0'>\n";foreach($v
as$C=>$u){ksort($u["columns"]);$Ef=array();foreach($u["columns"]as$x=>$X)$Ef[]="<i>".h($X)."</i>".($u["lengths"][$x]?"(".$u["lengths"][$x].")":"").($u["descs"][$x]?" DESC":"");echo"<tr title='".h($C)."'><th>$u[type]<td>".implode(", ",$Ef)."\n";}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.lang(122)."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".lang(86)."</h3>\n";$Oc=foreign_keys($a);if($Oc){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(123)."<td>".lang(124)."<td>".lang(89)."<td>".lang(88)."<td>&nbsp;</thead>\n";foreach($Oc
as$C=>$q){echo"<tr title='".h($C)."'>","<th><i>".implode("</i>, <i>",array_map('h',$q["source"]))."</i>","<td><a href='".h($q["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($q["db"]),ME):($q["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($q["ns"]),ME):ME))."table=".urlencode($q["table"])."'>".($q["db"]!=""?"<b>".h($q["db"])."</b>.":"").($q["ns"]!=""?"<b>".h($q["ns"])."</b>.":"").h($q["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$q["target"]))."</i>)","<td>".nbsp($q["on_delete"])."\n","<td>".nbsp($q["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($C)).'">'.lang(125).'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.lang(126)."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".lang(127)."</h3>\n";$zh=triggers($a);if($zh){echo"<table cellspacing='0'>\n";foreach($zh
as$x=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($x)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($x))."'>".lang(125)."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.lang(128)."</a>\n";}}elseif(isset($_GET["schema"])){page_header(lang(62),"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Vg=array();$Wg=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$ee,PREG_SET_ORDER);foreach($ee
as$s=>$B){$Vg[$B[1]]=array($B[2],$B[3]);$Wg[]="\n\t'".js_escape($B[1])."': [ $B[2], $B[3] ]";}$rh=0;$Qa=-1;$og=array();$Wf=array();$Ud=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$xf=0;$og[$Q]["fields"]=array();foreach(fields($Q)as$C=>$o){$xf+=1.25;$o["pos"]=$xf;$og[$Q]["fields"][$C]=$o;}$og[$Q]["pos"]=($Vg[$Q]?$Vg[$Q]:array($rh,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$Sd=$Qa;if($Vg[$Q][1]||$Vg[$X["table"]][1])$Sd=min(floatval($Vg[$Q][1]),floatval($Vg[$X["table"]][1]))-1;else$Qa-=.1;while($Ud[(string)$Sd])$Sd-=.0001;$og[$Q]["references"][$X["table"]][(string)$Sd]=array($X["source"],$X["target"]);$Wf[$X["table"]][$Q][(string)$Sd]=$X["target"];$Ud[(string)$Sd]=true;}}$rh=max($rh,$og[$Q]["pos"][0]+2.5+$xf);}echo'<div id="schema" style="height: ',$rh,'em;" onselectstart="return false;">
<script type="text/javascript">
var tablePos = {',implode(",",$Wg)."\n",'};
var em = document.getElementById(\'schema\').offsetHeight / ',$rh,';
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, \'',js_escape(DB),'\');
};
</script>
';foreach($og
as$C=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;' onmousedown='schemaMousedown(this, event);'>",'<a href="'.h(ME).'table='.urlencode($C).'"><b>'.h($C)."</b></a>";foreach($Q["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$ch=>$Xf){foreach($Xf
as$Sd=>$Tf){$Td=$Sd-$Vg[$C][1];$s=0;foreach($Tf[0]as$Dg)echo"\n<div class='references' title='".h($ch)."' id='refs$Sd-".($s++)."' style='left: $Td"."em; top: ".$Q["fields"][$Dg]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$Td)."em;'></div></div>";}}foreach((array)$Wf[$C]as$ch=>$Xf){foreach($Xf
as$Sd=>$f){$Td=$Sd-$Vg[$C][1];$s=0;foreach($f
as$bh)echo"\n<div class='references' title='".h($ch)."' id='refd$Sd-".($s++)."' style='left: $Td"."em; top: ".$Q["fields"][$bh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME))."?file=arrow.gif) no-repeat right center;&amp;version=4.2.3'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$Td)."em;'></div></div>";}}echo"\n</div>\n";}foreach($og
as$C=>$Q){foreach((array)$Q["references"]as$ch=>$Xf){foreach($Xf
as$Sd=>$Tf){$te=$rh;$ie=-10;foreach($Tf[0]as$x=>$Dg){$yf=$Q["pos"][0]+$Q["fields"][$Dg]["pos"];$zf=$og[$ch]["pos"][0]+$og[$ch]["fields"][$Tf[1][$x]]["pos"];$te=min($te,$yf,$zf);$ie=max($ie,$yf,$zf);}echo"<div class='references' id='refl$Sd' style='left: $Sd"."em; top: $te"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($ie-$te)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">',lang(129),'</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$_b="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$x)$_b.="&$x=".urlencode($_POST[$x]);cookie("adminer_export",substr($_b,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Ac=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$Bd=preg_match('~sql~',$_POST["format"]);if($Bd){echo"-- Adminer $ia ".$Xb[DRIVER]." dump\n\n";if($w=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
".($_POST["data_style"]?"SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$h->query("SET time_zone = '+00:00';");}}$Mg=$_POST["db_style"];$l=array(DB);if(DB==""){$l=$_POST["databases"];if(is_string($l))$l=explode("\n",rtrim(str_replace("\r","",$l),"\n"));}foreach((array)$l
as$m){$b->dumpDatabase($m);if($h->select_db($m)){if($Bd&&preg_match('~CREATE~',$Mg)&&($j=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1))){set_utf8mb4($j);if($Mg=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($m).";\n";echo"$j;\n";}if($Bd){if($Mg)echo
use_sql($m).";\n\n";$gf="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$ig){foreach(get_rows("SHOW $ig STATUS WHERE Db = ".q($m),null,"-- ")as$K){$j=remove_definer($h->result("SHOW CREATE $ig ".idf_escape($K["Name"]),2));set_utf8mb4($j);$gf.=($Mg!='DROP+CREATE'?"DROP $ig IF EXISTS ".idf_escape($K["Name"]).";;\n":"")."$j;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$K){$j=remove_definer($h->result("SHOW CREATE EVENT ".idf_escape($K["Name"]),3));set_utf8mb4($j);$gf.=($Mg!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($K["Name"]).";;\n":"")."$j;;\n\n";}}if($gf)echo"DELIMITER ;;\n\n$gf"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Yh=array();foreach(table_status('',true)as$C=>$R){$Q=(DB==""||in_array($C,(array)$_POST["tables"]));$Eb=(DB==""||in_array($C,(array)$_POST["data"]));if($Q||$Eb){if($Ac=="tar"){$ph=new
TmpFile;ob_start(array($ph,'write'),1e5);}$b->dumpTable($C,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$Yh[]=$C;elseif($Eb){$p=fields($C);$b->dumpData($C,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($C));}if($Bd&&$_POST["triggers"]&&$Q&&($zh=trigger_sql($C,$_POST["table_style"])))echo"\nDELIMITER ;;\n$zh\nDELIMITER ;\n";if($Ac=="tar"){ob_end_flush();tar_file((DB!=""?"":"$m/")."$C.csv",$ph);}elseif($Bd)echo"\n";}}foreach($Yh
as$Xh)$b->dumpTable($Xh,$_POST["table_style"],1);if($Ac=="tar")echo
pack("x512");}}}if($Bd)echo"-- ".$h->result("SELECT NOW()")."\n";exit;}page_header(lang(65),$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0">
';$Ib=array('','USE','DROP+CREATE','CREATE');$Xg=array('','DROP+CREATE','CREATE');$Fb=array('','TRUNCATE+INSERT','INSERT');if($w=="sql")$Fb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$K);if(!$K)$K=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($K["events"])){$K["routines"]=$K["events"]=($_GET["dump"]=="");$K["triggers"]=$K["table_style"];}echo"<tr><th>".lang(130)."<td>".html_select("output",$b->dumpOutput(),$K["output"],0)."\n";echo"<tr><th>".lang(131)."<td>".html_select("format",$b->dumpFormat(),$K["format"],0)."\n";echo($w=="sqlite"?"":"<tr><th>".lang(35)."<td>".html_select('db_style',$Ib,$K["db_style"]).(support("routine")?checkbox("routines",1,$K["routines"],lang(132)):"").(support("event")?checkbox("events",1,$K["events"],lang(133)):"")),"<tr><th>".lang(112)."<td>".html_select('table_style',$Xg,$K["table_style"]).checkbox("auto_increment",1,$K["auto_increment"],lang(56)).(support("trigger")?checkbox("triggers",1,$K["triggers"],lang(127)):""),"<tr><th>".lang(134)."<td>".html_select('data_style',$Fb,$K["data_style"]),'</table>
<p><input type="submit" value="',lang(65),'">
<input type="hidden" name="token" value="',$T,'">

<table cellspacing="0">
';$Bf=array();if(DB!=""){$db=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$db onclick='formCheck(this, /^tables\\[/);'>".lang(112)."</label>","<th style='text-align: right;'><label class='block'>".lang(134)."<input type='checkbox' id='check-data'$db onclick='formCheck(this, /^data\\[/);'></label>","</thead>\n";$Yh="";$Yg=tables_list();foreach($Yg
as$C=>$U){$Af=preg_replace('~_.*~','',$C);$db=($a==""||$a==(substr($a,-1)=="%"?"$Af%":$C));$Ef="<tr><td>".checkbox("tables[]",$C,$db,$C,"checkboxClick(event, this); formUncheck('check-tables');","block");if($U!==null&&!preg_match('~table~i',$U))$Yh.="$Ef\n";else
echo"$Ef<td align='right'><label class='block'><span id='Rows-".h($C)."'></span>".checkbox("data[]",$C,$db,"","checkboxClick(event, this); formUncheck('check-data');")."</label>\n";$Bf[$Af]++;}echo$Yh;if($Yg)echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}else{echo"<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"")." onclick='formCheck(this, /^databases\\[/);'>".lang(35)."</label></thead>\n";$l=$b->databases();if($l){foreach($l
as$m){if(!information_schema($m)){$Af=preg_replace('~_.*~','',$m);echo"<tr><td>".checkbox("databases[]",$m,$a==""||$a=="$Af%",$m,"formUncheck('check-databases');","block")."\n";$Bf[$Af]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Kc=true;foreach($Bf
as$x=>$X){if($x!=""&&$X>1){echo($Kc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$x%")."'>".h($x)."</a>";$Kc=false;}}}elseif(isset($_GET["privileges"])){page_header(lang(63));$I=$h->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$Vc=$I;if(!$I)$I=$h->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($Vc?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".lang(33)."<th>".lang(32)."<th>&nbsp;</thead>\n";while($K=$I->fetch_assoc())echo'<tr'.odd().'><td>'.h($K["User"])."<td>".h($K["Host"]).'<td><a href="'.h(ME.'user='.urlencode($K["User"]).'&host='.urlencode($K["Host"])).'">'.lang(10)."</a>\n";if(!$Vc||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".lang(10)."'>\n";echo"</table>\n","</form>\n",'<p class="links"><a href="'.h(ME).'user=">'.lang(135)."</a>";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$fd=&get_session("queries");$ed=&$fd[DB];if(!$n&&$_POST["clear"]){$ed=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?lang(64):lang(55)),$n);if(!$n&&$_POST){$Sc=false;if(!isset($_GET["import"]))$H=$_POST["query"];elseif($_POST["webfile"]){$Sc=@fopen((file_exists("adminer.sql")?"adminer.sql":"compress.zlib://adminer.sql.gz"),"rb");$H=($Sc?fread($Sc,1e6):false);}else$H=get_file("sql_file",true);if(is_string($H)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($H)+memory_get_usage()+8e6));if($H!=""&&strlen($H)<1e6){$Lf=$H.(preg_match("~;[ \t\r\n]*\$~",$H)?"":";");if(!$ed||reset(end($ed))!=$Lf){restart_session();$ed[]=array($Lf,time());set_session("queries",$fd);stop_session();}}$Eg="(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\r?\n)";$Nb=";";$D=0;$mc=true;$i=connect();if(is_object($i)&&DB!="")$i->select_db(DB);$qb=0;$rc=array();$Yd=0;$lf='[\'"'.($w=="sql"?'`#':($w=="sqlite"?'`[':($w=="mssql"?'[':''))).']|/\\*|-- |$'.($w=="pgsql"?'|\\$[^$]*\\$':'');$sh=microtime(true);parse_str($_COOKIE["adminer_export"],$xa);$dc=$b->dumpFormat();unset($dc["sql"]);while($H!=""){if(!$D&&preg_match("~^$Eg*DELIMITER\\s+(\\S+)~i",$H,$B)){$Nb=$B[1];$H=substr($H,strlen($B[0]));}else{preg_match('('.preg_quote($Nb)."\\s*|$lf)",$H,$B,PREG_OFFSET_CAPTURE,$D);list($Qc,$xf)=$B[0];if(!$Qc&&$Sc&&!feof($Sc))$H.=fread($Sc,1e5);else{if(!$Qc&&rtrim($H)=="")break;$D=$xf+strlen($Qc);if($Qc&&rtrim($Qc)!=$Nb){while(preg_match('('.($Qc=='/*'?'\\*/':($Qc=='['?']':(preg_match('~^-- |^#~',$Qc)?"\n":preg_quote($Qc)."|\\\\."))).'|$)s',$H,$B,PREG_OFFSET_CAPTURE,$D)){$mg=$B[0][0];if(!$mg&&$Sc&&!feof($Sc))$H.=fread($Sc,1e5);else{$D=$B[0][1]+strlen($mg);if($mg[0]!="\\")break;}}}else{$mc=false;$Lf=substr($H,0,$xf);$qb++;$Ef="<pre id='sql-$qb'><code class='jush-$w'>".shorten_utf8(trim($Lf),1000)."</code></pre>\n";if(!$_POST["only_errors"]){echo$Ef;ob_flush();flush();}$Hg=microtime(true);if($h->multi_query($Lf)&&is_object($i)&&preg_match("~^$Eg*USE\\b~isU",$Lf))$i->query($Lf);do{$I=$h->store_result();$ih=" <span class='time'>(".format_time($Hg).")</span>".(strlen($Lf)<1000?" <a href='".h(ME)."sql=".urlencode(trim($Lf))."'>".lang(10)."</a>":"");if($h->error){echo($_POST["only_errors"]?$Ef:""),"<p class='error'>".lang(136).($h->errno?" ($h->errno)":"").": ".error()."\n";$rc[]=" <a href='#sql-$qb'>$qb</a>";if($_POST["error_stops"])break
2;}elseif(is_object($I)){$z=$_POST["limit"];$af=select($I,$i,array(),$z);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$De=$I->num_rows;echo"<p>".($De?($z&&$De>$z?lang(137,$z):"").lang(138,$De):""),$ih;$jd="export-$qb";$_c=", <a href='#$jd' onclick=\"return !toggle('$jd');\">".lang(65)."</a><span id='$jd' class='hidden'>: ".html_select("output",$b->dumpOutput(),$xa["output"])." ".html_select("format",$dc,$xa["format"])."<input type='hidden' name='query' value='".h($Lf)."'>"." <input type='submit' name='export' value='".lang(65)."'><input type='hidden' name='token' value='$T'></span>\n";if($i&&preg_match("~^($Eg|\\()*SELECT\\b~isU",$Lf)&&($zc=explain($i,$Lf))){$jd="explain-$qb";echo", <a href='#$jd' onclick=\"return !toggle('$jd');\">EXPLAIN</a>$_c","<div id='$jd' class='hidden'>\n";select($zc,$i,$af);echo"</div>\n";}else
echo$_c;echo"</form>\n";}}else{if(preg_match("~^$Eg*(CREATE|DROP|ALTER)$Eg+(DATABASE|SCHEMA)\\b~isU",$Lf)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($h->info)."'>".lang(139,$h->affected_rows)."$ih\n";}$Hg=microtime(true);}while($h->next_result());$Yd+=substr_count($Lf.$Qc,"\n");$H=substr($H,$D);$D=0;}}}}if($mc)echo"<p class='message'>".lang(140)."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(141,$qb-count($rc))," <span class='time'>(".format_time($sh).")</span>\n";}elseif($rc&&$qb>1)echo"<p class='error'>".lang(136).": ".implode("",$rc)."\n";}else
echo"<p class='error'>".upload_error($H)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$wc="<input type='submit' value='".lang(142)."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$Lf=$_GET["sql"];if($_POST)$Lf=$_POST["query"];elseif($_GET["history"]=="all")$Lf=$ed;elseif($_GET["history"]!="")$Lf=$ed[$_GET["history"]][0];echo"<p>";textarea("query",$Lf,20);echo($_POST?"":"<script type='text/javascript'>focus(document.getElementsByTagName('textarea')[0]);</script>\n"),"<p>$wc\n",lang(143).": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".lang(144)."</legend><div>",(ini_bool("file_uploads")?"SQL (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$wc":lang(145)),"</div></fieldset>\n","<fieldset><legend>".lang(146)."</legend><div>",lang(147,"<code>adminer.sql".(extension_loaded("zlib")?"[.gz]":"")."</code>"),' <input type="submit" name="webfile" value="'.lang(148).'">',"</div></fieldset>\n","<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),lang(149))."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])),lang(150))."\n","<input type='hidden' name='token' value='$T'>\n";if(!isset($_GET["import"])&&$ed){print_fieldset("history",lang(151),$_GET["history"]!="");for($X=end($ed);$X;$X=prev($ed)){$x=key($ed);list($Lf,$ih,$hc)=$X;echo'<a href="'.h(ME."sql=&history=$x").'">'.lang(10)."</a>"." <span class='time' title='".@date('Y-m-d',$ih)."'>".@date("H:i:s",$ih)."</span>"." <code class='jush-$w'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$Lf)))),80,"</code>").($hc?" <span class='time'>($hc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".lang(152)."'>\n","<a href='".h(ME."sql=&history=all")."'>".lang(153)."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Jh=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$C=>$o){if(!isset($o["privileges"][$Jh?"update":"insert"])||$b->fieldName($o)=="")unset($p[$C]);}if($_POST&&!$n&&!isset($_GET["select"])){$A=$_POST["referer"];if($_POST["insert"])$A=($Jh?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$A))$A=ME."select=".urlencode($a);$v=indexes($a);$Eh=unique_array($_GET["where"],$v);$Of="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($A,lang(154),$Wb->delete($a,$Of,!$Eh));else{$O=array();foreach($p
as$C=>$o){$X=process_input($o);if($X!==false&&$X!==null)$O[idf_escape($C)]=$X;}if($Jh){if(!$O)redirect($A);queries_redirect($A,lang(155),$Wb->update($a,$O,$Of,!$Eh));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$I=$Wb->insert($a,$O);$Rd=($I?last_id():0);queries_redirect($A,lang(156,($Rd?" $Rd":"")),$I);}}}$K=null;if($_POST["save"])$K=(array)$_POST["fields"];elseif($Z){$M=array();foreach($p
as$C=>$o){if(isset($o["privileges"]["select"])){$Ga=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ga="''";if($w=="sql"&&preg_match("~enum|set~",$o["type"]))$Ga="1*".idf_escape($C);$M[]=($Ga?"$Ga AS ":"").idf_escape($C);}}$K=array();if(!support("table"))$M=array("*");if($M){$I=$Wb->select($a,$M,array($Z),$M,array(),(isset($_GET["select"])?2:1));$K=$I->fetch_assoc();if(!$K)$K=false;if(isset($_GET["select"])&&(!$K||$I->fetch_assoc()))$K=null;}}if(!support("table")&&!$p){if(!$Z){$I=$Wb->select($a,array("*"),$Z,array("*"));$K=($I?$I->fetch_assoc():false);if(!$K)$K=array($Wb->primary=>"");}if($K){foreach($K
as$x=>$X){if(!$Z)$K[$x]=null;$p[$x]=array("field"=>$x,"null"=>($x!=$Wb->primary),"auto_increment"=>($x==$Wb->primary));}}}edit_form($a,$p,$K,$Jh);}elseif(isset($_GET["create"])){$a=$_GET["create"];$mf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$x)$mf[$x]=$x;$Vf=referencable_primary($a);$Oc=array();foreach($Vf
as$Tg=>$o)$Oc[str_replace("`","``",$Tg)."`".str_replace("`","``",$o["field"])]=$Tg;$df=array();$R=array();if($a!=""){$df=fields($a);$R=table_status($a);if(!$R)$n=lang(9);}$K=$_POST;$K["fields"]=(array)$K["fields"];if($K["auto_increment_col"])$K["fields"][$K["auto_increment_col"]]["auto_increment"]=true;if($_POST&&!process_fields($K["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),lang(157),drop_tables(array($a)));else{$p=array();$Da=array();$Nh=false;$Mc=array();ksort($K["fields"]);$cf=reset($df);$Aa=" FIRST";foreach($K["fields"]as$x=>$o){$q=$Oc[$o["type"]];$_h=($q!==null?$Vf[$q]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($x==$K["auto_increment_col"])$o["auto_increment"]=true;$Jf=process_field($o,$_h);$Da[]=array($o["orig"],$Jf,$Aa);if($Jf!=process_field($cf,$cf)){$p[]=array($o["orig"],$Jf,$Aa);if($o["orig"]!=""||$Aa)$Nh=true;}if($q!==null)$Mc[idf_escape($o["field"])]=($a!=""&&$w!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$Oc[$o["type"]],'source'=>array($o["field"]),'target'=>array($_h["field"]),'on_delete'=>$o["on_delete"],));$Aa=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Nh=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$cf=next($df);if(!$cf)$Aa="";}}$of="";if($mf[$K["partition_by"]]){$pf=array();if($K["partition_by"]=='RANGE'||$K["partition_by"]=='LIST'){foreach(array_filter($K["partition_names"])as$x=>$X){$Y=$K["partition_values"][$x];$pf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($K["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$of.="\nPARTITION BY $K[partition_by]($K[partition])".($pf?" (".implode(",",$pf)."\n)":($K["partitions"]?" PARTITIONS ".(+$K["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$of.="\nREMOVE PARTITIONING";$me=lang(158);if($a==""){cookie("adminer_engine",$K["Engine"]);$me=lang(159);}$C=trim($K["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($C),$me,alter_table($a,$C,($w=="sqlite"&&($Nh||$Mc)?$Da:$p),$Mc,($K["Comment"]!=$R["Comment"]?$K["Comment"]:null),($K["Engine"]&&$K["Engine"]!=$R["Engine"]?$K["Engine"]:""),($K["Collation"]&&$K["Collation"]!=$R["Collation"]?$K["Collation"]:""),($K["Auto_increment"]!=""?number($K["Auto_increment"]):""),$of));}}page_header(($a!=""?lang(41):lang(66)),$n,array("table"=>$a),h($a));if(!$_POST){$K=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($Bh["int"])?"int":(isset($Bh["integer"])?"integer":"")))),"partition_names"=>array(""),);if($a!=""){$K=$R;$K["name"]=$a;$K["fields"]=array();if(!$_GET["auto_increment"])$K["Auto_increment"]="";foreach($df
as$o){$o["has_default"]=isset($o["default"]);$K["fields"][]=$o;}if(support("partitioning")){$Tc="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$I=$h->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $Tc ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($K["partition_by"],$K["partitions"],$K["partition"])=$I->fetch_row();$pf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $Tc AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$pf[""]="";$K["partition_names"]=array_keys($pf);$K["partition_values"]=array_values($pf);}}}$nb=collations();$oc=engines();foreach($oc
as$nc){if(!strcasecmp($nc,$K["Engine"])){$K["Engine"]=$nc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo
lang(160),': <input name="name" maxlength="64" value="',h($K["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST){?><script type='text/javascript'>focus(document.getElementById('form')['name']);</script><?php }echo($oc?"<select name='Engine' onchange='helpClose();'".on_help("getTarget(event).value",1).">".optionlist(array(""=>"(".lang(161).")")+$oc,$K["Engine"])."</select>":""),' ',($nb&&!preg_match("~sqlite|mssql~",$w)?html_select("Collation",array(""=>"(".lang(87).")")+$nb,$K["Collation"]):""),' <input type="submit" value="',lang(14),'">
';}echo'
';if(support("columns")){echo'<table cellspacing="0" id="edit-fields" class="nowrap">
';$sb=($_POST?$_POST["comments"]:$K["Comment"]!="");if(!$_POST&&!$sb){foreach($K["fields"]as$o){if($o["comment"]!=""){$sb=true;break;}}}edit_fields($K["fields"],$nb,"TABLE",$Oc,$sb);echo'</table>
<p>
',lang(56),': <input type="number" name="Auto_increment" size="6" value="',h($K["Auto_increment"]),'">
',checkbox("defaults",1,true,lang(162),"columnShow(this.checked, 5)","jsonly");if(!$_POST["defaults"]){echo'<script type="text/javascript">editingHideDefaults()</script>';}echo(support("comment")?"<label><input type='checkbox' name='comments' value='1' class='jsonly' onclick=\"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();\"".($sb?" checked":"").">".lang(96)."</label>".' <input name="Comment" id="Comment" value="'.h($K["Comment"]).'" maxlength="'.($h->server_info>=5.5?2048:60).'"'.($sb?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="',lang(14),'">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}if(support("partitioning")){$nf=preg_match('~RANGE|LIST~',$K["partition_by"]);print_fieldset("partition",lang(163),$K["partition_by"]);echo'<p>
',"<select name='partition_by' onchange='partitionByChange(this);'".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).">".optionlist(array(""=>"")+$mf,$K["partition_by"])."</select>",'(<input name="partition" value="',h($K["partition"]),'">)
',lang(164),': <input type="number" name="partitions" class="size',($nf||!$K["partition_by"]?" hidden":""),'" value="',h($K["partitions"]),'">
<table cellspacing="0" id="partition-table"',($nf?"":" class='hidden'"),'>
<thead><tr><th>',lang(165),'<th>',lang(166),'</thead>
';foreach($K["partition_names"]as$x=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'"'.($x==count($K["partition_names"])-1?' onchange="partitionNameChange(this);"':'').' autocapitalize="off">','<td><input name="partition_values[]" value="'.h($K["partition_values"][$x]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$pd=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);if(preg_match('~MyISAM|M?aria'.($h->server_info>=5.6?'|InnoDB':'').'~i',$R["Engine"]))$pd[]="FULLTEXT";$v=indexes($a);$Cf=array();if($w=="mongo"){$Cf=$v["_id_"];unset($pd[0]);unset($v["_id_"]);}$K=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($K["indexes"]as$u){$C=$u["name"];if(in_array($u["type"],$pd)){$f=array();$Wd=array();$Pb=array();$O=array();ksort($u["columns"]);foreach($u["columns"]as$x=>$e){if($e!=""){$y=$u["lengths"][$x];$Ob=$u["descs"][$x];$O[]=idf_escape($e).($y?"(".(+$y).")":"").($Ob?" DESC":"");$f[]=$e;$Wd[]=($y?$y:null);$Pb[]=$Ob;}}if($f){$xc=$v[$C];if($xc){ksort($xc["columns"]);ksort($xc["lengths"]);ksort($xc["descs"]);if($u["type"]==$xc["type"]&&array_values($xc["columns"])===$f&&(!$xc["lengths"]||array_values($xc["lengths"])===$Wd)&&array_values($xc["descs"])===$Pb){unset($v[$C]);continue;}}$c[]=array($u["type"],$C,$O);}}}foreach($v
as$C=>$xc)$c[]=array($xc["type"],$C,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),lang(167),alter_indexes($a,$c));}page_header(lang(121),$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($K["indexes"]as$x=>$u){if($u["columns"][count($u["columns"])]!="")$K["indexes"][$x]["columns"][]="";}$u=end($K["indexes"]);if($u["type"]||array_filter($u["columns"],'strlen'))$K["indexes"][]=array("columns"=>array(1=>""));}if(!$K){foreach($v
as$x=>$u){$v[$x]["name"]=$x;$v[$x]["columns"][]="";}$v[]=array("columns"=>array(1=>""));$K["indexes"]=$v;}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th>',lang(168),'<th><input type="submit" style="left: -1000px; position: absolute;">',lang(169),'<th>',lang(170);?>
<th><noscript><input type='image' class='icon' name='add[0]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=4.2.3' alt='+' title='<?php echo
lang(97),'\'></noscript>&nbsp;
</thead>
';if($Cf){echo"<tr><td>PRIMARY<td>";foreach($Cf["columns"]as$x=>$e){echo
select_input(" disabled",$p,$e),"<label><input disabled type='checkbox'>".lang(50)."</label> ";}echo"<td><td>\n";}$Fd=1;foreach($K["indexes"]as$u){if(!$_POST["drop_col"]||$Fd!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$Fd][type]",array(-1=>"")+$pd,$u["type"],($Fd==count($K["indexes"])?"indexesAddRow(this);":1)),"<td>";ksort($u["columns"]);$s=1;foreach($u["columns"]as$x=>$e){echo"<span>".select_input(" name='indexes[$Fd][columns][$s]' onchange=\"".($s==count($u["columns"])?"indexesAddColumn":"indexesChangeColumn")."(this, '".h(js_escape($w=="sql"?"":$_GET["indexes"]."_"))."');\"",($p?array_combine($p,$p):$p),$e),($w=="sql"||$w=="mssql"?"<input type='number' name='indexes[$Fd][lengths][$s]' class='size' value='".h($u["lengths"][$x])."'>":""),($w!="sql"?checkbox("indexes[$Fd][descs][$s]",1,$u["descs"][$x],lang(50)):"")," </span>";$s++;}echo"<td><input name='indexes[$Fd][name]' value='".h($u["name"])."' autocapitalize='off'>\n","<td><input type='image' class='icon' name='drop_col[$Fd]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=4.2.3' alt='x' title='".lang(100)."' onclick=\"return !editingRemoveRow(this, 'indexes\$1[type]');\">\n";}$Fd++;}echo'</table>
<p>
<input type="submit" value="',lang(14),'">
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["database"])){$K=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$C=trim($K["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),lang(171),drop_databases(array(DB)));}elseif(DB!==$C){if(DB!=""){$_GET["db"]=$C;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($C),lang(172),rename_database($C,$K["collation"]));}else{$l=explode("\n",str_replace("\r","",$C));$Ng=true;$Qd="";foreach($l
as$m){if(count($l)==1||$m!=""){if(!create_database($m,$K["collation"]))$Ng=false;$Qd=$m;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($Qd),lang(173),$Ng);}}else{if(!$K["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($C).(preg_match('~^[a-z0-9_]+$~i',$K["collation"])?" COLLATE $K[collation]":""),substr(ME,0,-1),lang(174));}}page_header(DB!=""?lang(59):lang(175),$n,array(),h(DB));$nb=collations();$C=DB;if($_POST)$C=$K["name"];elseif(DB!="")$K["collation"]=db_collation(DB,$nb);elseif($w=="sql"){foreach(get_vals("SHOW GRANTS")as$Vc){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$Vc,$B)&&$B[1]){$C=stripcslashes(idf_unescape("`$B[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($C,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($C).'</textarea><br>':'<input name="name" id="name" value="'.h($C).'" maxlength="64" autocapitalize="off">')."\n".($nb?html_select("collation",array(""=>"(".lang(87).")")+$nb,$K["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mssql'=>"ms187963.aspx",)):"");?>
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="<?php echo
lang(14),'">
';if(DB!="")echo"<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=4.2.3' alt='+' title='".lang(97)."'>\n";echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["scheme"])){$K=$_POST;if($_POST&&!$n){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,lang(176));else{$C=trim($K["name"]);$_.=urlencode($C);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($C),$_,lang(177));elseif($_GET["ns"]!=$C)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($C),$_,lang(178));else
redirect($_);}}page_header($_GET["ns"]!=""?lang(60):lang(61),$n);if(!$K)$K["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($K["name"]);?>" autocapitalize="off">
<script type='text/javascript'>focus(document.getElementById('name'));</script>
<input type="submit" value="<?php echo
lang(14),'">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n";echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["call"])){$da=$_GET["call"];page_header(lang(179).": ".h($da),$n);$ig=routine($da,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$nd=array();$gf=array();foreach($ig["fields"]as$s=>$o){if(substr($o["inout"],-3)=="OUT")$gf[$s]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$nd[]=$s;}if(!$n&&$_POST){$Ya=array();foreach($ig["fields"]as$x=>$o){if(in_array($x,$nd)){$X=process_input($o);if($X===false)$X="''";if(isset($gf[$x]))$h->query("SET @".idf_escape($o["field"])." = $X");}$Ya[]=(isset($gf[$x])?"@".idf_escape($o["field"]):$X);}$H=(isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($da)."(".implode(", ",$Ya).")";echo"<p><code class='jush-$w'>".h($H)."</code> <a href='".h(ME)."sql=".urlencode($H)."'>".lang(10)."</a>\n";if(!$h->multi_query($H))echo"<p class='error'>".error()."\n";else{$i=connect();if(is_object($i))$i->select_db(DB);do{$I=$h->store_result();if(is_object($I))select($I,$i);else
echo"<p class='message'>".lang(180,$h->affected_rows)."\n";}while($h->next_result());if($gf)select($h->query("SELECT ".implode(", ",$gf)));}}echo'
<form action="" method="post">
';if($nd){echo"<table cellspacing='0'>\n";foreach($nd
as$x){$o=$ig["fields"][$x];$C=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$C];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$C]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="',lang(179),'">
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$C=$_GET["name"];$K=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$me=($_POST["drop"]?lang(181):($C!=""?lang(182):lang(183)));$A=ME."table=".urlencode($a);$K["source"]=array_filter($K["source"],'strlen');ksort($K["source"]);$bh=array();foreach($K["source"]as$x=>$X)$bh[$x]=$K["target"][$x];$K["target"]=$bh;if($w=="sqlite")queries_redirect($A,$me,recreate_table($a,$a,array(),array(),array(" $C"=>($_POST["drop"]?"":" ".format_foreign_key($K)))));else{$c="ALTER TABLE ".table($a);$Yb="\nDROP ".($w=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($C);if($_POST["drop"])query_redirect($c.$Yb,$A,$me);else{query_redirect($c.($C!=""?"$Yb,":"")."\nADD".format_foreign_key($K),$A,$me);$n=lang(184)."<br>$n";}}}page_header(lang(185),$n,array("table"=>$a),h($a));if($_POST){ksort($K["source"]);if($_POST["add"])$K["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$K["target"]=array();}elseif($C!=""){$Oc=foreign_keys($a);$K=$Oc[$C];$K["source"][]="";}else{$K["table"]=$a;$K["source"]=array("");}$Dg=array_keys(fields($a));$bh=($a===$K["table"]?$Dg:array_keys(fields($K["table"])));$Uf=array_keys(array_filter(table_status('',true),'fk_support'));echo'
<form action="" method="post">
<p>
';if($K["db"]==""&&$K["ns"]==""){echo
lang(186),':
',html_select("table",$Uf,$K["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="',lang(187),'"></noscript>
<table cellspacing="0">
<thead><tr><th>',lang(123),'<th>',lang(124),'</thead>
';$Fd=0;foreach($K["source"]as$x=>$X){echo"<tr>","<td>".html_select("source[".(+$x)."]",array(-1=>"")+$Dg,$X,($Fd==count($K["source"])-1?"foreignAddRow(this);":1)),"<td>".html_select("target[".(+$x)."]",$bh,$K["target"][$x]);$Fd++;}echo'</table>
<p>
',lang(89),': ',html_select("on_delete",array(-1=>"")+explode("|",$Ne),$K["on_delete"]),' ',lang(88),': ',html_select("on_update",array(-1=>"")+explode("|",$Ne),$K["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="',lang(14),'">
<noscript><p><input type="submit" name="add" value="',lang(188),'"></noscript>
';}if($C!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$K=$_POST;if($_POST&&!$n){$C=trim($K["name"]);$Ga=" AS\n$K[select]";$A=ME."table=".urlencode($C);$me=lang(189);if($_GET["materialized"])$U="MATERIALIZED VIEW";else{$U="VIEW";if($w=="pgsql"){$Ig=table_status($C);$U=($Ig?strtoupper($Ig["Engine"]):$U);}}if(!$_POST["drop"]&&$a==$C&&$w!="sqlite"&&$U!="MATERIALIZED VIEW")query_redirect(($w=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($C).$Ga,$A,$me);else{$dh=$C."_adminer_".uniqid();drop_create("DROP $U ".table($a),"CREATE $U ".table($C).$Ga,"DROP $U ".table($C),"CREATE $U ".table($dh).$Ga,"DROP $U ".table($dh),($_POST["drop"]?substr(ME,0,-1):$A),lang(190),$me,lang(191),$a,$C);}}if(!$_POST&&$a!=""){$K=view($a);$K["name"]=$a;if(!$n)$n=error();}page_header(($a!=""?lang(40):lang(192)),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>',lang(170),': <input name="name" value="',h($K["name"]),'" maxlength="64" autocapitalize="off">
<p>';textarea("select",$K["select"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($_GET["view"]!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$xd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Jg=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$K=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),lang(193));elseif(in_array($K["INTERVAL_FIELD"],$xd)&&isset($Jg[$K["STATUS"]])){$ng="\nON SCHEDULE ".($K["INTERVAL_VALUE"]?"EVERY ".q($K["INTERVAL_VALUE"])." $K[INTERVAL_FIELD]".($K["STARTS"]?" STARTS ".q($K["STARTS"]):"").($K["ENDS"]?" ENDS ".q($K["ENDS"]):""):"AT ".q($K["STARTS"]))." ON COMPLETION".($K["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?lang(194):lang(195)),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$ng.($aa!=$K["EVENT_NAME"]?"\nRENAME TO ".idf_escape($K["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($K["EVENT_NAME"]).$ng)."\n".$Jg[$K["STATUS"]]." COMMENT ".q($K["EVENT_COMMENT"]).rtrim(" DO\n$K[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?lang(196).": ".h($aa):lang(197)),$n);if(!$K&&$aa!=""){$L=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$K=reset($L);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(170),'<td><input name="EVENT_NAME" value="',h($K["EVENT_NAME"]),'" maxlength="64" autocapitalize="off">
<tr><th title="datetime">',lang(198),'<td><input name="STARTS" value="',h("$K[EXECUTE_AT]$K[STARTS]"),'">
<tr><th title="datetime">',lang(199),'<td><input name="ENDS" value="',h($K["ENDS"]),'">
<tr><th>',lang(200),'<td><input type="number" name="INTERVAL_VALUE" value="',h($K["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$xd,$K["INTERVAL_FIELD"]),'<tr><th>',lang(107),'<td>',html_select("STATUS",$Jg,$K["STATUS"]),'<tr><th>',lang(96),'<td><input name="EVENT_COMMENT" value="',h($K["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$K["ON_COMPLETION"]=="PRESERVE",lang(201)),'</table>
<p>';textarea("EVENT_DEFINITION",$K["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($aa!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=$_GET["procedure"];$ig=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$K=$_POST;$K["fields"]=(array)$K["fields"];if($_POST&&!process_fields($K["fields"])&&!$n){$dh="$K[name]_adminer_".uniqid();drop_create("DROP $ig ".idf_escape($da),create_routine($ig,$K),"DROP $ig ".idf_escape($K["name"]),create_routine($ig,array("name"=>$dh)+$K),"DROP $ig ".idf_escape($dh),substr(ME,0,-1),lang(202),lang(203),lang(204),$da,$K["name"]);}page_header(($da!=""?(isset($_GET["function"])?lang(205):lang(206)).": ".h($da):(isset($_GET["function"])?lang(207):lang(208))),$n);if(!$_POST&&$da!=""){$K=routine($da,$ig);$K["name"]=$da;}$nb=get_vals("SHOW CHARACTER SET");sort($nb);$jg=routine_languages();echo'
<form action="" method="post" id="form">
<p>',lang(170),': <input name="name" value="',h($K["name"]),'" maxlength="64" autocapitalize="off">
',($jg?lang(19).": ".html_select("language",$jg,$K["language"]):""),'<input type="submit" value="',lang(14),'">
<table cellspacing="0" class="nowrap">
';edit_fields($K["fields"],$nb,$ig);if(isset($_GET["function"])){echo"<tr><td>".lang(209);edit_type("returns",$K["returns"],$nb);}echo'</table>
<p>';textarea("definition",$K["definition"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($da!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$K=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);$C=trim($K["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,lang(210));elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($C),$_,lang(211));elseif($fa!=$C)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($C),$_,lang(212));else
redirect($_);}page_header($fa!=""?lang(213).": ".h($fa):lang(214),$n);if(!$K)$K["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($K["name"]),'" autocapitalize="off">
<input type="submit" value="',lang(14),'">
';if($fa!="")echo"<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n";echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$K=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,lang(215));else
query_redirect("CREATE TYPE ".idf_escape(trim($K["name"]))." $K[as]",$_,lang(216));}page_header($ga!=""?lang(217).": ".h($ga):lang(218),$n);if(!$K)$K["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".lang(116)."'".confirm().">\n";else{echo"<input name='name' value='".h($K['name'])."' autocapitalize='off'>\n";textarea("as",$K["as"]);echo"<p><input type='submit' value='".lang(14)."'>\n";}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$C=$_GET["name"];$yh=trigger_options();$K=(array)trigger($C)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$yh["Timing"])&&in_array($_POST["Event"],$yh["Event"])&&in_array($_POST["Type"],$yh["Type"])){$Me=" ON ".table($a);$Yb="DROP TRIGGER ".idf_escape($C).($w=="pgsql"?$Me:"");$A=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($Yb,$A,lang(219));else{if($C!="")queries($Yb);queries_redirect($A,($C!=""?lang(220):lang(221)),queries(create_trigger($Me,$_POST)));if($C!="")queries(create_trigger($Me,$K+array("Type"=>reset($yh["Type"]))));}}$K=$_POST;}page_header(($C!=""?lang(222).": ".h($C):lang(223)),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>',lang(224),'<td>',html_select("Timing",$yh["Timing"],$K["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>',lang(225),'<td>',html_select("Event",$yh["Event"],$K["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$yh["Event"])?" <input name='Of' value='".h($K["Of"])."' class='hidden'>":""),'<tr><th>',lang(92),'<td>',html_select("Type",$yh["Type"],$K["Type"]),'</table>
<p>',lang(170),': <input name="Trigger" value="',h($K["Trigger"]);?>" maxlength="64" autocapitalize="off">
<script type="text/javascript">document.getElementById('form')['Timing'].onchange();</script>
<p><?php textarea("Statement",$K["Statement"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($C!=""){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$Hf=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$K){foreach(explode(",",($K["Privilege"]=="Grant option"?"":$K["Context"]))as$yb)$Hf[$yb][$K["Privilege"]]=$K["Comment"];}$Hf["Server Admin"]+=$Hf["File access on server"];$Hf["Databases"]["Create routine"]=$Hf["Procedures"]["Create routine"];unset($Hf["Procedures"]["Create routine"]);$Hf["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$Hf["Columns"][$X]=$Hf["Tables"][$X];unset($Hf["Server Admin"]["Usage"]);foreach($Hf["Tables"]as$x=>$X)unset($Hf["Databases"][$x]);$ze=array();if($_POST){foreach($_POST["objects"]as$x=>$X)$ze[$X]=(array)$ze[$X]+(array)$_POST["grants"][$x];}$Wc=array();$Ke="";if(isset($_GET["host"])&&($I=$h->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($K=$I->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$K[0],$B)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$B[1],$ee,PREG_SET_ORDER)){foreach($ee
as$X){if($X[1]!="USAGE")$Wc["$B[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$K[0]))$Wc["$B[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$K[0],$B))$Ke=$B[1];}}if($_POST&&!$n){$Le=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $Le",ME."privileges=",lang(226));else{$Ae=q($_POST["user"])."@".q($_POST["host"]);$qf=$_POST["pass"];if($qf!=''&&!$_POST["hashed"]){$qf=$h->result("SELECT PASSWORD(".q($qf).")");$n=!$qf;}$Cb=false;if(!$n){if($Le!=$Ae){$Cb=queries(($h->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $Ae IDENTIFIED BY PASSWORD ".q($qf));$n=!$Cb;}elseif($qf!=$Ke)queries("SET PASSWORD FOR $Ae = ".q($qf));}if(!$n){$fg=array();foreach($ze
as$Fe=>$Vc){if(isset($_GET["grant"]))$Vc=array_filter($Vc);$Vc=array_keys($Vc);if(isset($_GET["grant"]))$fg=array_diff(array_keys(array_filter($ze[$Fe],'strlen')),$Vc);elseif($Le==$Ae){$Ie=array_keys((array)$Wc[$Fe]);$fg=array_diff($Ie,$Vc);$Vc=array_diff($Vc,$Ie);unset($Wc[$Fe]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$Fe,$B)&&(!grant("REVOKE",$fg,$B[2]," ON $B[1] FROM $Ae")||!grant("GRANT",$Vc,$B[2]," ON $B[1] TO $Ae"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($Le!=$Ae)queries("DROP USER $Le");elseif(!isset($_GET["grant"])){foreach($Wc
as$Fe=>$fg){if(preg_match('~^(.+)(\\(.*\\))?$~U',$Fe,$B))grant("REVOKE",array_keys($fg),$B[2]," ON $B[1] FROM $Ae");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?lang(227):lang(228)),!$n);if($Cb)$h->query("DROP USER $Ae");}}page_header((isset($_GET["host"])?lang(33).": ".h("$ha@$_GET[host]"):lang(135)),$n,array("privileges"=>array('',lang(63))));if($_POST){$K=$_POST;$Wc=$ze;}else{$K=$_GET+array("host"=>$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$K["pass"]=$Ke;if($Ke!="")$K["hashed"]=true;$Wc[(DB==""||$Wc?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(32),'<td><input name="host" maxlength="60" value="',h($K["host"]),'" autocapitalize="off">
<tr><th>',lang(33),'<td><input name="user" maxlength="16" value="',h($K["user"]),'" autocapitalize="off">
<tr><th>',lang(34),'<td><input name="pass" id="pass" value="',h($K["pass"]),'">
';if(!$K["hashed"]){echo'<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';}echo
checkbox("hashed",1,$K["hashed"],lang(229),"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".lang(63).doc_link(array('sql'=>"grant.html#priv_level"));$s=0;foreach($Wc
as$Fe=>$Vc){echo'<th>'.($Fe!="*.*"?"<input name='objects[$s]' value='".h($Fe)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");$s++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>lang(32),"Databases"=>lang(35),"Tables"=>lang(119),"Columns"=>lang(120),"Procedures"=>lang(230),)as$yb=>$Ob){foreach((array)$Hf[$yb]as$Gf=>$rb){echo"<tr".odd()."><td".($Ob?">$Ob<td":" colspan='2'").' lang="en" title="'.h($rb).'">'.h($Gf);$s=0;foreach($Wc
as$Fe=>$Vc){$C="'grants[$s][".h(strtoupper($Gf))."]'";$Y=$Vc[strtoupper($Gf)];if($yb=="Server Admin"&&$Fe!=(isset($Wc["*.*"])?"*.*":".*"))echo"<td>&nbsp;";elseif(isset($_GET["grant"]))echo"<td><select name=$C><option><option value='1'".($Y?" selected":"").">".lang(231)."<option value='0'".($Y=="0"?" selected":"").">".lang(232)."</select>";else
echo"<td align='center'><label class='block'><input type='checkbox' name=$C value='1'".($Y?" checked":"").($Gf=="All privileges"?" id='grants-$s-all'":($Gf=="Grant option"?"":" onclick=\"if (this.checked) formUncheck('grants-$s-all');\""))."></label>";$s++;}}}echo"</table>\n",'<p>
<input type="submit" value="',lang(14),'">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="',lang(116),'"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$n){$Md=0;foreach((array)$_POST["kill"]as$X){if(queries("KILL ".number($X)))$Md++;}queries_redirect(ME."processlist=",lang(233,$Md),$Md||!$_POST["kill"]);}page_header(lang(105),$n);echo'
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" ondblclick="tableClick(event, true);" class="nowrap checkable">
';$s=-1;foreach(process_list()as$s=>$K){if(!$s){echo"<thead><tr lang='en'>".(support("kill")?"<th>&nbsp;":"");foreach($K
as$x=>$X)echo"<th>$x".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($x),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"../b14237/dynviews_2088.htm",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$K["Id"],0):"");foreach($K
as$x=>$X)echo"<td>".(($w=="sql"&&$x=="Info"&&preg_match("~Query|Killed~",$K["Command"])&&$X!="")||($w=="pgsql"&&$x=="current_query"&&$X!="<IDLE>")||($w=="oracle"&&$x=="sql_text"&&$X!="")?"<code class='jush-$w'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($K["db"]!=""?"db=".urlencode($K["db"])."&":"")."sql=".urlencode($X)).'">'.lang(234).'</a>':nbsp($X));echo"\n";}echo'</table>
<script type=\'text/javascript\'>tableCheck();</script>
<p>
';if(support("kill")){echo($s+1)."/".lang(235,$h->result("SELECT @@max_connections")),"<p><input type='submit' value='".lang(236)."'>\n";}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$v=indexes($a);$p=fields($a);$Oc=column_foreign_keys($a);$He="";if($R["Oid"]){$He=($w=="sqlite"?"rowid":"oid");$v[]=array("type"=>"PRIMARY","columns"=>array($He));}parse_str($_COOKIE["adminer_import"],$ya);$gg=array();$f=array();$hh=null;foreach($p
as$x=>$o){$C=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$C!=""){$f[$x]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($o))$hh=$b->selectLengthProcess();}$gg+=$o["privileges"];}list($M,$Xc)=$b->selectColumnsProcess($f,$v);$Ad=count($Xc)<count($M);$Z=$b->selectSearchProcess($p,$v);$Xe=$b->selectOrderProcess($p,$v);$z=$b->selectLimitProcess();$Tc=($M?implode(", ",$M):"*".($He?", $He":"")).convert_fields($f,$p,$M)."\nFROM ".table($a);$Yc=($Xc&&$Ad?"\nGROUP BY ".implode(", ",$Xc):"").($Xe?"\nORDER BY ".implode(", ",$Xe):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Fh=>$K){$Ga=convert_field($p[key($K)]);$M=array($Ga?$Ga:idf_escape(key($K)));$Z[]=where_check($Fh,$p);$J=$Wb->select($a,$M,$Z,$M);if($J)echo
reset($J->fetch_row());}exit;}if($_POST&&!$n){$ci=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$eb=array();foreach($_POST["check"]as$bb)$eb[]=where_check($bb,$p);$ci[]="((".implode(") OR (",$eb)."))";}$ci=($ci?"\nWHERE ".implode(" AND ",$ci):"");$Cf=$Hh=null;foreach($v
as$u){if($u["type"]=="PRIMARY"){$Cf=array_flip($u["columns"]);$Hh=($M?$Cf:array());break;}}foreach((array)$Hh
as$x=>$X){if(in_array(idf_escape($x),$M))unset($Hh[$x]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$Hh===array())$H="SELECT $Tc$ci$Yc";else{$Dh=array();foreach($_POST["check"]as$X)$Dh[]="(SELECT".limit($Tc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$Yc,1).")";$H=implode(" UNION ALL ",$Dh);}$b->dumpData($a,"table",$H);exit;}if(!$b->selectEmailProcess($Z,$Oc)){if($_POST["save"]||$_POST["delete"]){$I=true;$za=0;$O=array();if(!$_POST["delete"]){foreach($f
as$C=>$X){$X=process_input($p[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$O[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$O){if($_POST["clone"])$H="INTO ".table($a)." (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a);if($_POST["all"]||($Hh===array()&&is_array($_POST["check"]))||$Ad){$I=($_POST["delete"]?$Wb->delete($a,$ci):($_POST["clone"]?queries("INSERT $H$ci"):$Wb->update($a,$O,$ci)));$za=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$bi="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$I=($_POST["delete"]?$Wb->delete($a,$bi,1):($_POST["clone"]?queries("INSERT".limit1($H,$bi)):$Wb->update($a,$O,$bi)));if(!$I)break;$za+=$h->affected_rows;}}}$me=lang(237,$za);if($_POST["clone"]&&$I&&$za==1){$Rd=last_id();if($Rd)$me=lang(156," $Rd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$me,$I);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(238);else{$I=true;$za=0;foreach($_POST["val"]as$Fh=>$K){$O=array();foreach($K
as$x=>$X){$x=bracket_escape($x,1);$O[idf_escape($x)]=(preg_match('~char|text~',$p[$x]["type"])||$X!=""?$b->processInput($p[$x],$X):"NULL");}$I=$Wb->update($a,$O," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Fh,$p),!($Ad||$Hh===array())," ");if(!$I)break;$za+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(237,$za),$I);}}elseif(!is_string($Hc=get_file("csv_file",true)))$n=upload_error($Hc);elseif(!preg_match('~~u',$Hc))$n=lang(239);else{cookie("adminer_import","output=".urlencode($ya["output"])."&format=".urlencode($_POST["separator"]));$I=true;$ob=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Hc,$ee);$za=count($ee[0]);$Wb->begin();$vg=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$L=array();foreach($ee[0]as$x=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$vg]*)$vg~",$X.$vg,$fe);if(!$x&&!array_diff($fe[1],$ob)){$ob=$fe[1];$za--;}else{$O=array();foreach($fe[1]as$s=>$lb)$O[idf_escape($ob[$s])]=($lb==""&&$p[$ob[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$lb))));$L[]=$O;}}$I=(!$L||$Wb->insertUpdate($a,$L,$Cf));if($I)$Wb->commit();queries_redirect(remove_from_uri("page"),lang(240,$za),$I);$Wb->rollback();}}}$Tg=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(44).": $Tg",$n);$O=null;if(isset($gg["insert"])||!support("table")){$O="";foreach((array)$_GET["where"]as$X){if(count($Oc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$O);if(!$f&&support("table"))echo"<p class='error'>".lang(241).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($M,$f);$b->selectSearchPrint($Z,$f,$v);$b->selectOrderPrint($Xe,$f,$v);$b->selectLimitPrint($z);$b->selectLengthPrint($hh);$b->selectActionPrint($v);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$Rc=$h->result(count_rows($a,$Z,$Ad,$Xc));$E=floor(max(0,$Rc-1)/$z);}$sg=$M;if(!$sg){$sg[]="*";if($He)$sg[]=$He;}$zb=convert_fields($f,$p,$M);if($zb)$sg[]=substr($zb,2);$I=$Wb->select($a,$sg,$Z,$Xc,$Xe,$z,$E,true);if(!$I)echo"<p class='error'>".error()."\n";else{if($w=="mssql"&&$E)$I->seek($z*$E);$lc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$L=array();while($K=$I->fetch_assoc()){if($E&&$w=="oracle")unset($K["RNUM"]);$L[]=$K;}if($_GET["page"]!="last"&&+$z&&$Xc&&$Ad&&$w=="sql")$Rc=$h->result(" SELECT FOUND_ROWS()");if(!$L)echo"<p class='message'>".lang(12)."\n";else{$Pa=$b->backwardKeys($a,$Tg);echo"<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$Xc&&$M?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(242)."</a>");$ye=array();$Uc=array();reset($M);$Qf=1;foreach($L[0]as$x=>$X){if($x!=$He){$X=$_GET["columns"][key($M)];$o=$p[$M?($X?$X["col"]:current($M)):$x];$C=($o?$b->fieldName($o,$Qf):($X["fun"]?"*":$x));if($C!=""){$Qf++;$ye[$x]=$C;$e=idf_escape($x);$id=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x);$Ob="&desc%5B0%5D=1";echo'<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">','<a href="'.h($id.($Xe[0]==$e||$Xe[0]==$x||(!$Xe&&$Ad&&$Xc[0]==$e)?$Ob:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($id.$Ob)."' title='".lang(50)."' class='text'> â†“</a>";if(!$X["fun"])echo'<a href="#fieldset-search" onclick="selectSearch(\''.h(js_escape($x)).'\'); return false;" title="'.lang(47).'" class="text jsonly"> =</a>';echo"</span>";}$Uc[$x]=$X["fun"];next($M);}}$Wd=array();if($_GET["modify"]){foreach($L
as$K){foreach($K
as$x=>$X)$Wd[$x]=max($Wd[$x],min(40,strlen(utf8_decode($X))));}}echo($Pa?"<th>".lang(243):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($L,$Oc)as$xe=>$K){$Eh=unique_array($L[$xe],$v);if(!$Eh){$Eh=array();foreach($L[$xe]as$x=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$x))$Eh[$x]=$X;}}$Fh="";foreach($Eh
as$x=>$X){if(($w=="sql"||$w=="pgsql")&&strlen($X)>64){$x=(strpos($x,'(')?$x:idf_escape($x));$x="MD5(".($w=='sql'&&preg_match("~^utf8_~",$p[$x]["collation"])?$x:"CONVERT($x USING ".charset($h).")").")";$X=md5($X);}$Fh.="&".($X!==null?urlencode("where[".bracket_escape($x)."]")."=".urlencode($X):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$Xc&&$M?"":"<td>".checkbox("check[]",substr($Fh,1),in_array(substr($Fh,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($Ad||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Fh)."'>".lang(244)."</a>"));foreach($K
as$x=>$X){if(isset($ye[$x])){$o=$p[$x];if($X!=""&&(!isset($lc[$x])||$lc[$x]!=""))$lc[$x]=(is_mail($X)?$ye[$x]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($x).$Fh;if(!$_&&$X!==null){foreach((array)$Oc[$x]as$q){if(count($Oc[$x])==1||end($q["source"])==$x){$_="";foreach($q["source"]as$s=>$Dg)$_.=where_link($s,$q["target"][$s],$L[$xe][$Dg]);$_=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$_;if(count($q["source"])==1)break;}}}if($x=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Eh))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Eh
as$Gd=>$W)$_.=where_link($s++,$Gd,$W);}$X=select_value($X,$_,$o,$hh);$jd=h("val[$Fh][".bracket_escape($x)."]");$Y=$_POST["val"][$Fh][bracket_escape($x)];$gc=!is_array($K[$x])&&is_utf8($X)&&$L[$xe][$x]==$K[$x]&&!$Uc[$x];$gh=preg_match('~text|lob~',$o["type"]);if(($_GET["modify"]&&$gc)||$Y!==null){$ad=h($Y!==null?$Y:$K[$x]);echo"<td>".($gh?"<textarea name='$jd' cols='30' rows='".(substr_count($K[$x],"\n")+1)."'>$ad</textarea>":"<input name='$jd' value='$ad' size='$Wd[$x]'>");}else{$be=strpos($X,"<i>...</i>");echo"<td id='$jd' onclick=\"selectClick(this, event, ".($be?2:($gh?1:0)).($gc?"":", '".h(lang(245))."'").");\">$X";}}}if($Pa)echo"<td>";$b->backwardKeysPrint($Pa,$L[$xe]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($L||$E)&&!is_ajax()){$vc=true;if($_GET["page"]!="last"){if(!+$z)$Rc=count($L);elseif($w!="sql"||!$Ad){$Rc=($Ad?false:found_rows($R,$Z));if($Rc<max(1e4,2*($E+1)*$z))$Rc=reset(slow_query(count_rows($a,$Z,$Ad,$Xc)));else$vc=false;}}if(+$z&&($Rc===false||$Rc>$z||$E)){echo"<p class='pages'>";$he=($Rc===false?$E+(count($L)>=$z?2:1):floor(($Rc-1)/$z));if($w!="simpledb"){echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".lang(246)."', '".($E+1)."'), event); return false;\">".lang(246)."</a>:",pagination(0,$E).($E>5?" ...":"");for($s=max(1,$E-4);$s<min($he,$E+5);$s++)echo
pagination($s,$E);if($he>0){echo($E+5<$he?" ...":""),($vc&&$Rc!==false?pagination($he,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$he'>".lang(247)."</a>");}echo(($Rc===false?count($L)+1:$Rc-$E*$z)>$z?' <a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" onclick="return !selectLoadMore(this, '.(+$z).', \''.lang(248).'...\');" class="loadmore">'.lang(249).'</a>':'');}else{echo
lang(246).":",pagination(0,$E).($E>1?" ...":""),($E?pagination($E,$E):""),($he>$E?pagination($E+1,$E).($he>$E+1?" ...":""):"");}}echo"<p class='count'>\n",($Rc!==false?"(".($vc?"":"~ ").lang(138,$Rc).") ":"");$Tb=($vc?"":"~ ").$Rc;echo
checkbox("all",1,0,lang(250),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Tb' : checked); selectCount('selected2', this.checked || !checked ? '$Tb' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(242),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(238).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(115),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(234),'">
<input type="submit" name="delete" value="',lang(18),'"',confirm(),'>
</div></fieldset>
';}$Pc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Pc['sql']);break;}}if($Pc){print_fieldset("export",lang(65)." <span id='selected2'></span>");$hf=$b->dumpOutput();echo($hf?html_select("output",$hf,$ya["output"])." ":""),html_select("format",$Pc,$ya["format"])," <input type='submit' name='export' value='".lang(65)."'>\n","</div></fieldset>\n";}echo(!$Xc&&$M?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($b->selectImportPrint()){print_fieldset("import",lang(64),!$L);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ya["format"],1);echo" <input type='submit' name='import' value='".lang(64)."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($lc,'strlen'),$f);echo"<p><input type='hidden' name='token' value='$T'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$Ig=isset($_GET["status"]);page_header($Ig?lang(107):lang(106));$Uh=($Ig?show_status():show_variables());if(!$Uh)echo"<p class='message'>".lang(12)."\n";else{echo"<table cellspacing='0'>\n";foreach($Uh
as$x=>$X){echo"<tr>","<th><code class='jush-".$w.($Ig?"status":"set")."'>".h($x)."</code>","<td>".nbsp($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Qg=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$C=>$R){json_row("Comment-$C",nbsp($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$x)json_row("$x-$C",nbsp($R[$x]));foreach($Qg+array("Auto_increment"=>0,"Rows"=>0)as$x=>$X){if($R[$x]!=""){$X=format_number($R[$x]);json_row("$x-$C",($x=="Rows"&&$X&&$R["Engine"]==($Fg=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Qg[$x]))$Qg[$x]+=($R["Engine"]!="InnoDB"||$x!="Data_free"?$R[$x]:0);}elseif(array_key_exists($x,$R))json_row("$x-$C");}}}foreach($Qg
as$x=>$X)json_row("sum-$x",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$m=>$X){json_row("tables-$m",$X);json_row("size-$m",db_size($m));}json_row("");}exit;}else{$Zg=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Zg&&!$n&&!$_POST["search"]){$I=true;$me="";if($w=="sql"&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$I=truncate_tables($_POST["tables"]);$me=lang(251);}elseif($_POST["move"]){$I=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$me=lang(252);}elseif($_POST["copy"]){$I=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$me=lang(253);}elseif($_POST["drop"]){if($_POST["views"])$I=drop_views($_POST["views"]);if($I&&$_POST["tables"])$I=drop_tables($_POST["tables"]);$me=lang(254);}elseif($w!="sql"){$I=($w=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$me=lang(255);}elseif(!$_POST["tables"])$me=lang(9);elseif($I=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($K=$I->fetch_assoc())$me.="<b>".h($K["Table"])."</b>: ".h($K["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$me,$I);}page_header(($_GET["ns"]==""?lang(35).": ".h(DB):lang(68).": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".lang(256)."</h3>\n";$Yg=tables_list();if(!$Yg)echo"<p class='message'>".lang(9)."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".lang(257)." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' name='search' value='".lang(47)."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!="")search_tables();}echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);">';$Ub=doc_link(array('sql'=>'show-table-status.html'));echo'<th>'.lang(119),'<td>'.lang(258).doc_link(array('sql'=>'storage-engines.html')),'<td>'.lang(111).doc_link(array('sql'=>'charset-mysql.html')),'<td>'.lang(259).$Ub,'<td>'.lang(260).$Ub,'<td>'.lang(261).$Ub,'<td>'.lang(56).doc_link(array('sql'=>'example-auto-increment.html')),'<td>'.lang(262).$Ub,(support("comment")?'<td>'.lang(96).$Ub:''),"</thead>\n";$S=0;foreach($Yg
as$C=>$U){$Xh=($U!==null&&!preg_match('~table~i',$U));echo'<tr'.odd().'><td>'.checkbox(($Xh?"views[]":"tables[]"),$C,in_array($C,$Zg,true),"","formUncheck('check-all');"),'<th>'.(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($C).'" title="'.lang(39).'">'.h($C).'</a>':h($C));if($Xh){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($C).'" title="'.lang(40).'">'.(preg_match('~materialized~i',$U)?lang(263):lang(118)).'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($C).'" title="'.lang(38).'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",lang(41)),"Index_length"=>array("indexes",lang(122)),"Data_free"=>array("edit",lang(42)),"Auto_increment"=>array("auto_increment=1&create",lang(41)),"Rows"=>array("select",lang(38)),)as$x=>$_){$jd=" id='$x-".h($C)."'";echo($_?"<td align='right'>".(support("table")||$x=="Rows"||(support("indexes")&&$x!="Data_length")?"<a href='".h(ME."$_[0]=").urlencode($C)."'$jd title='$_[1]'>?</a>":"<span$jd>?</span>"):"<td id='$x-".h($C)."'>&nbsp;");}$S++;}echo(support("comment")?"<td id='Comment-".h($C)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".lang(235,count($Yg)),"<td>".nbsp($w=="sql"?$h->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$x)echo"<td align='right' id='sum-$x'>&nbsp;";echo"</table>\n";if(!information_schema(DB)){$Rh="<input type='submit' value='".lang(264)."'".on_help("'VACUUM'")."> ";$Te="<input type='submit' name='optimize' value='".lang(265)."'".on_help($w=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'")."> ";echo"<fieldset><legend>".lang(115)." <span id='selected'></span></legend><div>".($w=="sqlite"?$Rh:($w=="pgsql"?$Rh.$Te:($w=="sql"?"<input type='submit' value='".lang(266)."'".on_help("'ANALYZE TABLE'")."> ".$Te."<input type='submit' name='check' value='".lang(267)."'".on_help("'CHECK TABLE'")."> "."<input type='submit' name='repair' value='".lang(268)."'".on_help("'REPAIR TABLE'")."> ":"")))."<input type='submit' name='truncate' value='".lang(269)."'".confirm().on_help($w=="sqlite"?"'DELETE'":"'TRUNCATE".($w=="pgsql"?"'":" TABLE'"))."> "."<input type='submit' name='drop' value='".lang(116)."'".confirm().on_help("'DROP TABLE'").">\n";$l=(support("scheme")?$b->schemas():$b->databases());if(count($l)!=1&&$w!="sqlite"){$m=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".lang(270).": ",($l?html_select("target",$l,$m):'<input name="target" value="'.h($m).'" autocapitalize="off">')," <input type='submit' name='move' value='".lang(271)."'>",(support("copy")?" <input type='submit' name='copy' value='".lang(272)."'>":""),"\n";}echo"<input type='hidden' name='all' value='' onclick=\"selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")."\">\n";echo"<input type='hidden' name='token' value='$T'>\n","</div></fieldset>\n";}echo"</form>\n","<script type='text/javascript'>tableCheck();</script>\n";}echo'<p class="links"><a href="'.h(ME).'create=">'.lang(66)."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.lang(192)."</a>\n":""),(support("materializedview")?'<a href="'.h(ME).'view=&amp;materialized=1">'.lang(273)."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".lang(132)."</h3>\n";$kg=routines();if($kg){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.lang(170).'<td>'.lang(92).'<td>'.lang(209)."<td>&nbsp;</thead>\n";odd('');foreach($kg
as$K){echo'<tr'.odd().'>','<th><a href="'.h(ME).($K["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($K["ROUTINE_NAME"]).'">'.h($K["ROUTINE_NAME"]).'</a>','<td>'.h($K["ROUTINE_TYPE"]),'<td>'.h($K["DTD_IDENTIFIER"]),'<td><a href="'.h(ME).($K["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($K["ROUTINE_NAME"]).'">'.lang(125)."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.lang(208).'</a>':'').'<a href="'.h(ME).'function=">'.lang(207)."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".lang(274)."</h3>\n";$wg=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($wg){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(170)."</thead>\n";odd('');foreach($wg
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".lang(214)."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".lang(23)."</h3>\n";$Ph=types();if($Ph){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(170)."</thead>\n";odd('');foreach($Ph
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".lang(218)."</a>\n";}if(support("event")){echo"<h3 id='events'>".lang(133)."</h3>\n";$L=get_rows("SHOW EVENTS");if($L){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(170)."<td>".lang(275)."<td>".lang(198)."<td>".lang(199)."<td></thead>\n";foreach($L
as$K){echo"<tr>","<th>".h($K["Name"]),"<td>".($K["Execute at"]?lang(276)."<td>".$K["Execute at"]:lang(200)." ".$K["Interval value"]." ".$K["Interval field"]."<td>$K[Starts]"),"<td>$K[Ends]",'<td><a href="'.h(ME).'event='.urlencode($K["Name"]).'">'.lang(125).'</a>';}echo"</table>\n";$tc=$h->result("SELECT @@event_scheduler");if($tc&&$tc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($tc)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.lang(197)."</a>\n";}if($Yg)echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}}}page_footer();