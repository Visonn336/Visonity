# Visonity 3.6


## Azərbaycanca
### Lahiyə haqqında
Visonity 3.6 - Məqalə paylaşmaq və oxumaq üçün web platforma. Siz burada müxtəlif kateqoriyalar haqqında məqalələr yaza bilər, vəya digər yazarların məqalələrini oxuya bilərsiniz. Lahiyədə HTML, CSS, JS, PHP, SQL kimi texnologiyalardan istifadə olunub. Lahiyə başda XAMPP ilə, sonradan isə Heroku ilə yayımlanmışdır.

### Necə istifadə olunur
Hesab yarat - Ad, Soyad, İstifadəçi adı, Şifrə və Profil Şəkli seçərək yeni bir hesab yarada bilərsiniz. Bütün bu məlumatları sonradan dəyişə bilərsiniz.

Giriş et - İstifadəçi adınızı və Şifrənizi daxil edərək giriş edə bilərsiniz.

Visonity - Əsas səhifədir. Üst hissədə sabitlənmiş məqaləni görə bilərsiniz. Bu məqalə adminlər tərəfindən seçilir. Alt hissələrdə isə, yüklənmə tarixinə görə digər məqalələr sıralanmışdır. Ən üstdən digər səhifələr arasında keçiş edə bilər, Ən altdan isə github və instagram səhifələrimi ziyarət edə bilərsiniz. Məqalələr üzərində bəzi butonlar, və link yazıları var. Məsələn: Məqalə yazarının adı üzərinə basaraq onun profil səhifəsinə keçiş edə bilərsiniz. Məqalə başlığına basaraq məqaləni yeni səhifədə, böyük halda oxuya bilərsiniz, həmçinin məqalə başlığının üst hissəsindəki butona basaraq, o mövzudakı digər məqalələrə baxa bilərsiniz. Sağ üstdəki upVote və downVote butonları ilə məqalə haqqında fikrinizi bildirə bilərsiniz.

Kateqoriyalar - Mövcud olan kateqoriyalardan birini seçərək, o haqdakı digər məqalələrə baxa bilərsiniz.

Kəşf et - Məqalələri daha ətraflı filtrləmək üçün üst hissədəki axtarış butonundan istifadə edə bilərsiniz.

Populyar - Üst hissədə, indiyə kimi ən çox upVote almış ilk 3 məqalə yer alır. Onların altında isə, upVote sayılarına görə digər məqalələr sıralanmışdır.

Kömək - Platforma haqqında məlumat almaq üçündür.

Haqqımızda - Mənim haqqımda qısa şəxsi məlumat, həmçinin platformanı yaratmağımdakı məqsədim haqqımda məlumat ala bilərsiniz.

Profil - Üst hissədə Profil Şəkliniz, İstifadəçi adınız, Ad və Soyadınız yer alır. Profil Şəklinin üzerinə basaraq yeni şəkil seçə bilər, İstifadəçi adının üzərinə basaraq isə hesabınız haqqındakı hərşeyi dəyişə bilərsiniz. Orta hissədə özünüz haqqında qısa məlumat verə bilərsiniz. Həmçinin burada toplam paylaşdığınız məqalə sayısı və indiyə qədər aldığınız toplam upVote/downVote sayısını görə bilərsiniz. 

İdarə - Buradan yeni məqalə yaza bilər, həmçinin öncədən bitirdiyiniz məqalələri redaktə edə bilər vəya silə bilərsiniz.

Admin - Yazar və Kateqoriya əlavə edə bilər, həmçinin mövcud Yazar və Məqalələri redaktə edə bilər vəya silə bilərsiniz.

Silinmiş - Hansısa bir istifadəçi silinərsə, onun yazdığı bütün məqalələr "Silinmiş" istifadəçisinə keçir.

Kateqoriyasız - Hansısa bir kateqoriya silinərsə, onun seçildiyi bütün məqalələr "Kateqoriyasız" kateqoriyasına keçir.

### Necə yazılıb
İlk olarak HTML və CSS istifadə edərək lahiyənin Front-end hissəsini bitirdim. Öncədən hər səhifəni və hər xüsusiyyəti planlaşdırdığımdam, bu hissədə dizayn olarak problem yaşamadım. Yaşadığım ən əsas problem, məlumatsızlıq və təcrübəsizlik idi. Front-end hissəsində müəyyən qədər məlumata sahib olsamda, Back-end hissəsinə sıfıra yaxın məlumatla başladım. Ümumi olaraq 45gün, gündə ortalama 4.5 saat bu lahiyə ilə məşğul oldum. 45günün 20gününü işlədəcəyim texnologiyaları öyrənməklə keçirdim. Təxminən qalan 25günün 10günü Front-end, 10günü Back-end və 5günü database ilə məşğul oldum. Front-end bitdikdən sonra, XAMPP quraraq Back-endə keçiş etdim. Başda sadəcə PHP işlətsəmdə, upVote və downVote xüsusiyyətlərindəki bəzi problemlərə görə lahiyəyə JS'də daxil etdim. Database tərəfdə toplam 5 tablodan istifadə etdim: Users, Articles, Categories, DownVotes və UpVotes. Bu tablolar haqqında bəzi məlumatlar:

Users - id, firstname, lastname, username, password, avatar, is_admin, about_me

Articles - id, title, body, thumbnail, date_time, category_id, author_id, is_featured, up_vote, down_vote

Categories - id, title, description

UpVotes & DownVotes - id, article_id, author_id

## Türkçe
### Proje hakkında
Visony 3.6 - Makaleler paylaşmak ve okumak için bir web platformu. Burada farklı kategorilerle ilgili makaleler yazabilir veya diğer yazarların makalelerini okuyabilirsiniz. Projede HTML, CSS, JS, PHP, SQL gibi teknolojiler kullanıldı. Proje ilk olarak XAMPP ile ve daha sonra Heroku ile yayınlandı.

### Nasıl kullanılır
Hesap Oluştur - Ad, Soyad, Kullanıcı Adı, Şifre ve Profil Resmini seçerek yeni bir hesap oluşturabilirsiniz. Tüm bu bilgileri daha sonra değiştirebilirsiniz.

Giriş - Kullanıcı Adınızı ve Şifrenizi girerek giriş yapabilirsiniz.

Visonite - Ana sayfa. Üstte sabitlenmiş makaleyi görebilirsiniz. Bu makale yöneticiler tarafından seçilmiştir. Alt bölümlerde ise diğer yazılar yüklenme tarihlerine göre sıralanıyor. Üst kısımdan diğer sayfalar arasında geçiş yapabilir, alt kısımdan ise github ve instagram sayfalarımı ziyaret edebilirsiniz. Makalelerde bazı butonlar ve bağlantılar bulunmaktadır. Örneğin: Makalenin yazarının ismine tıklayarak profil sayfasına gidebilirsiniz. Makale başlığına tıklayarak makaleyi yeni bir sayfada, büyük boyutta okuyabilir, makale başlığının üst kısmında yer alan butona tıklayarak o konuyla ilgili diğer makaleleri görüntüleyebilirsiniz. Sağ üstte yer alan upVote ve downVote butonları ile yazı hakkındaki görüşlerinizi belirtebilirsiniz.

Kategoriler - Mevcut kategorilerden birini seçerek bu kategoriyle ilgili diğer makaleleri görüntüleyebilirsiniz.

Keşfet - Makaleleri daha ayrıntılı filtrelemek için üstteki arama düğmesini kullanabilirsiniz.

Popüler - En üstte şu ana kadar en fazla olumlu oy alan ilk 3 makale listelenir. Bunların altında diğer makaleler olumlu oy sayılarına göre sıralanır.

Yardım - Platform hakkında bilgi almak için.

Hakkımızda - Hakkımda kısa kişisel bilgilerin yanı sıra platformu oluşturma amacımla ilgili bilgileri bulabilirsiniz.

Profil - Üst kısımda Profil Resminiz, Kullanıcı Adınız, Adınız ve Soyadınız yer alır. Profil Resmine tıklayarak yeni bir resim seçebilir, Kullanıcı Adına tıklayarak hesabınızla ilgili her şeyi değiştirebilirsiniz. Orta kısımda kendiniz hakkında kısa bir bilgi verebilirsiniz. Ayrıca burada şu ana kadar paylaştığınız toplam makale sayısını ve aldığınız olumlu/olumsuz oyların toplam sayısını da görebilirsiniz.

Yönetim - Buradan yeni bir makale yazabileceğiniz gibi, daha önce tamamladığınız makaleleri düzenleyebilir veya silebilirsiniz.

Yönetici - Yazar ve Kategori ekleyebilir, mevcut Yazar ve Makaleleri düzenleyebilir veya silebilir.

Silindi - Bir kullanıcı silinirse, onun yazdığı tüm yazılar "Silinmiş" kullanıcıya aktarılacaktır.

Kategorilenmemiş - Bir kategori silinirse, o kategori için seçilen tüm makaleler "Kategorilenmemiş" kategorisine taşınacaktır.

### Nasıl yazılır?
Öncelikle projenin Front-end kısmını HTML ve CSS kullanarak tamamladım. Her sayfayı ve her özelliği önceden planladığım için bu bölümü tasarlarken hiç sorun yaşamadım. Yaşadığım en büyük sorun bilgisizlik ve tecrübesizlikti. Ön uç hakkında biraz bilgim olsa da arka uç hakkında neredeyse sıfır bilgiyle başladım. Toplamda 45 gün bu proje üzerinde günde ortalama 4,5 saat çalıştım. 45 günün 20'sini kullanacağım teknolojileri öğrenerek geçirdim. Geriye kalan 25 günün 10 gününü Front-end, 10 gününü Back-end ve 5 gününü veritabanı ile geçirdim. Front-end bittikten sonra XAMPP kurulumu yaparak back-end'e geçtim. İlk başta PHP'yi yeni çalıştırdım ancak upVote ve downVote özelliklerindeki bazı sorunlar nedeniyle projeye JS'yi ekledim. Veritabanı tarafında toplam 5 tablo kullandım: Kullanıcılar, Makaleler, Kategoriler, DownVotes ve UpVotes. Bu tablolarla ilgili bazı bilgiler:

Kullanıcılar - kimlik, ad, soyadı, kullanıcı adı, şifre, avatar, is_admin, hakkımda_me

Makaleler - kimlik, başlık, gövde, küçük resim, tarih_saat, kategori_kimliği, yazar_kimliği, öne çıkan, olumlu oy, olumsuz oy

Kategoriler - kimlik, başlık, açıklama

Olumlu Oylar ve Olumsuz Oylar - id, makale_id, yazar_id

## English
### About the Project
Visonity 3.6 - A web platform for sharing and reading articles. Here, you can write articles on various categories or read articles by other authors. The project utilizes technologies such as HTML, CSS, JS, PHP, and SQL. Initially developed with XAMPP, it was later deployed using Heroku.

### How to Use
Create Account - You can create a new account by providing your First Name, Last Name, Username, Password, and Profile Picture. All this information can be updated later.

Login - Enter your username and password to log in.

Visonity - This is the main page. At the top, you can see a featured article selected by admins. Below, other articles are listed based on their upload date. You can navigate between pages from the top, and visit my GitHub and Instagram pages from the bottom. Articles have various buttons and links. For example, clicking on the author's name takes you to their profile page. Clicking on the article title opens the article in a larger view. You can also browse other articles on the same topic by clicking on the button at the top of the article title. You can express your opinion about the article using the upVote and downVote buttons on the top right.

Categories - By selecting one of the available categories, you can view other articles related to that category.

Explore - Use the search button at the top to filter articles in more detail.

Popular - At the top, you can find the top 3 articles with the most upVotes. Below, other articles are listed based on their upVote counts.

Help - To get information about the platform.

About Us - Short personal information about me, as well as the purpose of creating the platform.

Profile - At the top, you can see your Profile Picture, Username, First Name, and Last Name. By clicking on the Profile Picture, you can choose a new image, and by clicking on the Username, you can update everything about your account. In the middle, you can provide short information about yourself. Here, you can also see the total number of articles you have shared and the total number of upVotes/downVotes you have received so far.

Admin - Here, you can write new articles, as well as edit or delete articles and authors already completed.

Administrator - You can add authors and categories, as well as edit or delete existing authors and articles.

Deleted - If a user is deleted, all articles written by them move to the "Deleted" user.

Uncategorized - If a category is deleted, all articles assigned to it move to the "Uncategorized" category.

### How it was Developed
I started by finishing the Front-end part of the project using HTML and CSS. Since I had previously planned every page and feature, I did not encounter any design problems in this part. The main problem I faced was lack of information and experience. Although I had some knowledge about the Front-end part, I started the Back-end part with almost zero information. Overall, I spent about 45 days working on this project, averaging about 4.5 hours per day. I spent 20 days of these 45 days learning the technologies I would use. Approximately 10 days for Front-end, 10 days for Back-end, and 5 days for the database. After completing the Front-end, I switched to the Back-end by setting up XAMPP. Initially, I only used PHP, but I later introduced JavaScript to the project due to some issues with the upVote and downVote features. On the database side, I used a total of 5 tables: Users, Articles, Categories, DownVotes, and UpVotes. Some information about these tables:

Users - id, firstname, lastname, username, password, avatar, is_admin, about_me

Articles - id, title, body, thumbnail, date_time, category_id, author_id, is_featured, up_vote, down_vote

Categories - id, title, description

UpVotes & DownVotes - id, article_id, author_id