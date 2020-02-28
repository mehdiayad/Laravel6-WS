<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'code' => 'SBK09832',
            'subcategory' => 'accessoires smartphones',
            'price' => 23.46,
            'brand' => 'Apple',
            'description_title' => "JASBON Coque pour iPhone 11 Pro, Coque Silicone Liquide avec Protecteur d'écran Gratuit Housse Protective Etui Anti-Choc Anti-Rayure Gel Case pour iPhone XI Pro - Noir",
            'description_product' => "Avec verre trempé : Comparer avec la coque normale, cette coque a un protecteur d’écran en verre trempé gratuit inclus dans l’emballage.Silicone Liquide : 100% compatible avec iPhone 11 Pro, Fabriquée de silicone liquide pour supporter la même qualité que la coque officielle.Protection Complète : Même tomber à partir de 2 mètres, notre coque peut protéger votre appareil intact. Détails Parfaits: Le bas de la coque fabriqué en silicone est souple pour éviter d’être rompu. Il y a une couche fibre à l’intérieur pour contre les rayures. Charge Sans Fil : Le téléphone iPhone XI Pro peut être chargé sans fil avec la coque élégante.",
            'stock' => 99,
            'color' => 'noir',
            'score' => 4,
            'category_id' => 1,
            'img_overview' => 'SBK09832.png',
            'img1' => 'SBK09832-1.png',
            'img2' => 'SBK09832-2.png',
            'img3' => 'SBK09832-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'BC44C14PP',
            'subcategory' => 'Coliers',
            'price' => 100.444,
            'brand' => 'Cartier',
            'description_title' => "B.Catcher Femme Collier en Argent 925 Pendentif Coeur Gardien de l'amour Saint-Valentin Zirconium cubique Cadeau parfait élégant",
            'description_product' => "Matériau: Argent 925, Zirconium cubique 5A.Dimensions: 15mm * 19,6mm. Un cadeau fantastique pour votre bien-aimé pour les fêtes, les anniversaires.Chaîne italienne, pendentif en Coeur, en argent 925, incrusté avec un Zircon cubique de 5.5mm au centre qui clignotent en fonction de la lumière et de l'éclat.Un accessoire parfait pour vos vêtements, un cadeau approprié pour les mariages et les engagements ou d'autres situations.S'il y a un problème de qualité, vous pouvez demander un remplacement ou un remboursement dans les 30 jours suivant la réception.",
            'stock' => 48,
            'color' => 'argent',
            'category_id' => 2,
            'score' => 3,
            'img_overview' => 'BC44C14PP.png',
            'img1' => 'BC44C14PP-1.png',
            'img2' => 'BC44C14PP-2.png',
            'img3' => 'BC44C14PP-3.png',
       ]);
        
        DB::table('products')->insert([
            'code' => 'B07GFT67NJ',
            'subcategory' => 'meubles',
            'price' => 80.00,
            'brand' => 'Amazon',
            'description_title' => "Movian - Bureau 3 tiroirs Idro Modern, 56 x 110 x 73,5, Blanc",
            'description_product' => "Dimensions : 56 x 110 x 73 cm.Finition minimaliste en mélaminé blanc.Panneau de particules de bois solide de 16 mm d’épaisseur.Design à la fois élégant et très pratique.Deux personnes requises pour un assemblage facile.Nécessite assemblage",
            'stock' => 37,
            'color' => 'blanc',
            'category_id' => 3,
            'score' => 4,
            'img_overview' => 'B07GFT67NJ.png',
            'img1' => 'B07GFT67NJ-1.png',
            'img2' => 'B07GFT67NJ-2.png',
            'img3' => 'B07GFT67NJ-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'LPO45633PD',
            'subcategory' => 'accesoires moto',
            'price' => 25.00,
            'brand' => 'Eastpack',
            'description_title' => "Favoto Housse Protection pour Moto Couverture Polyester 210T Résistant",
            'description_product' => "Matériau de Haute Qualité - La housse est faite de tissu polyester 210T pour protéger contre la pluie, la poussière, la chaleur, les rayons ultraviolets et les rayures et les intempéries. Résistant aux déjections d'oiseaux. Conception Antivol - Cette housse de motocyclette sécurisée est munie d'un trou de serrure qui facilite l'utilisation du verrou de la moto lorsque vous le fixez avec une serrure.Taille Universelle – Taille jusqu'à 96,5 pouces/ 245cm, adapté à la plupart des motos: Harley-Davidson, Honda, Suzuki, Kawasaki, Harley Davidson, Honda, Suzuki, Kawasaki, Yamaha, bicyclettes, etc.Solide et Durable - Chaque hausse est faite d'un tissu avec coupe-vent cousu sur les deux côtés. Il résiste aux intempéries et peut également protéger la peinture de la voiture de tomber.Léger et Facile à Ranger - Lorsqu'il n'est pas utilisé, il peut être plié dans le sac de rangement. Pratique à le prendre à tout moment",
            'stock' => 18,
            'color' => 'vert',
            'category_id' => 4,
            'score' => 3,
            'img_overview' => 'LPO45633PD.png',
            'img1' => 'LPO45633PD-1.png',
            'img2' => 'LPO45633PD-2.png',
            'img3' => 'LPO45633PD-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'EWC20678',
            'subcategory' => 'presse-agrumes electriques',
            'price' => 99.99,
            'brand' => 'Moulinex',
            'description_title' => "Moulinex2ZU255B10 Extracteur de Jus Infiny Juice Pressoir Fruits et Légumes 82 tours/minute Centrifugeuse Pression à Froid Silencieux 200W Gris",
            'description_product' => "Technologie de pression à froid, pour extraire délicatement le jus des fruits et légumes.Vitesse lente (82 tours/minute) pour éviter l'oxydation et préserver tous les nutriments.Silencieux pour profiter d'un jus fraîchement préparé à tout moment de la journée.Deux pichets : l'un pour recueillir le jus et l'autre pour recueillir la pulpe sèche.Facile à utiliser et à nettoyer grâce à ses éléments amovibles compatibles lave-vaiselle",
            'stock' => 25,
            'color' => 'gris',
            'category_id' => 5,
            'score' => 2,
            'img_overview' => 'EWC20678.png',
            'img1' => 'EWC20678-1.png',
            'img2' => 'EWC20678-2.png',
            'img3' => 'EWC20678-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'JODJDEO78',
            'subcategory' => 'Audio & Video',
            'price' => 39.99,
            'brand' => 'Sony',
            'description_title' => "Sony WH-1000XM3 Casque Bluetooth à réduction de bruit sans Fil Alexa et Google Assistant intégrés - Noir",
            'description_product' => "La meilleure réduction de bruit du marché, encore améliorée. Profil Bluetooth: A2DP, AVRCP, HFP, HSP. Jusqu'à 30h d'autonomie avec la fonction de réduction de bruit activée. Mode charge rapide (15 min = 8h de lecture). Style de port: Circumaural. Fonction Quick Attention pour réduire instantanément le volume de votre musique et pouvoir suivre une conversation. Contrôle facile de lecture de la musique par simple contact sur l'oreillette.",
            'stock' => 12,
            'color' => 'noir',
            'score' => 3,
            'category_id' => 1,
            'img_overview' => 'JODJDEO78.png',
            'img1' => 'JODJDEO78-1.png',
            'img2' => 'JODJDEO78-2.png',
            'img3' => 'JODJDEO78-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'PO9898',
            'subcategory' => 'bracelet',
            'price' => 10.99,
            'brand' => 'AUIN',
            'description_title' => "Bracelet Homme en Cuir avec Ancre Argent pour Bracelet Cadeau Homme Femme avec chaînette pour Hommes Garçons",
            'description_product' => "Un design élégant et élégant vous rend plus charmant et élégant.Des petits bijoux de création, de haute qualité, et le travail pour augmenter le plaisir de la vie.Attrapez ces beaux accessoires pour vous , Un bon cadeau pour vous-même, vos amis ou vos soeurs.Convient pour cadeau occasions : tourisme, cérémonie d'ouverture, cadeaux d'entreprise, etc.Combinaison de l'esthétique et applicable à toute la beauté des filles et des dames, des boutiques, des restaurants, des parties, la mode sauvage.",
            'stock' => 48,
            'color' => 'argent',
            'category_id' => 2,
            'img_overview' => 'PO9898.png',
            'img1' => 'PO9898-1.png',
            'img2' => 'PO9898-2.png',
            'img3' => 'PO9898-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'ZZ87E89',
            'subcategory' => 'meubles',
            'price' => 59.95,
            'brand' => 'Idimex',
            'description_title' => "IDIMEX Buffet Calais, Commode Meuble de Rangement avec 1 tiroir et 2 Portes, en mélaminé décor chêne Sonoma",
            'description_product' => "Dimensions du buffet CALAIS (L x H x P) : 60 x 84 x 30 cm.Cette commode est fabriquée à partir de panneaux de particules recouvert dun mélaminé, résistant aux éraflures et très facile dentretien à laide dun chiffon humide.Ce meuble possède à la fois un tiroir et un espace de stockage avec une tablette intérieure pour plus de commodités.Cette armoire multifonctions peut être utilisée comme meuble de rangement dans votre salon, votre salle à manger ou votre entrée.Finition décor chêne sonoma",
            'stock' => 22,
            'color' => 'noir',
            'category_id' => 3,
            'img_overview' => 'ZZ87E89.png',
            'img1' => 'ZZ87E89-1.png',
            'img2' => 'ZZ87E89-2.png',
            'img3' => 'ZZ87E89-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'LP995633PD',
            'subcategory' => 'chaines a neige',
            'price' => 25.00,
            'brand' => 'Favotto',
            'description_title' => "Chaîne de Neige,6pcs Universelles Chaîne Voiture Antidérapant Chaîne Neige de Pneus Chaînes de Sécurité pour Voiture-Camion-SUV ,Convient à Largeur de Pneu",
            'description_product' => "【chaînes à neige de haute qualité 】Les chaînes à neige de pneu sont construites à partir dacier pur de qualité supérieure, épaississent le TPU, les poteaux en acier et les fixations en alliage d'aluminium pour assurer la durabilité et la longévité,Lensemble comprenant 6 chaînes antidérapantes, 1 x pelle à neige, 1 paire de gants antidérapants, 1 outil d'installation【Chaînes durgence】Ces chaînes anti-dérapantes fonctionnent bien et restent performantes par tous les tempsCette chaîne à neige antidérapante pour voitures fonctionne bien, que vous soyez coincé dans le sable, la boue, la neige ou l'escalade.la chaîne à neige NE PEUT PAS être utilisée sur une route en ciment lorsqu'il ne neige pas.【Modèles de Voitures Compatibles】Les chaînes à neige conviennent à la plupart des véhicules, voitures ordinaires, véhicules tout-terrain, VUS et camionnettes, mais pas aux camions. Ils conviennent à la plupart des pneus de véhicule standard avec une largeur de pneu de 165-285 mm, mais pas au moyeu de roue en fer.",
            'stock' => 18,
            'color' => 'vert',
            'category_id' => 4,
            'img_overview' => 'LP995633PD.png',
            'img1' => 'LP995633PD-1.png',
            'img2' => 'LP995633PD-2.png',
            'img3' => 'LP995633PD-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'RR83479',
            'subcategory' => 'plateau a pizza',
            'price' => 99.99,
            'brand' => 'Moulinex',
            'description_title' => "Amazy Pierre à pizza avec pelle à pizza – Plaque de cuisson de pâtes à pain et à pizza au goût authentique - Cordiérite pour four et grill avec raclette à pizza (38 x 30 x 1,5 cm)",
            'description_product' => "Idéal pour pizzas et tartes flambées – convient aussi pour la préparation de pain et de petits pains croustillants.Résultat : pâte aérée et croustillante comme la pâte italienne traditionnelle.Convient à tout type de four et de barbecue à gaz ou au charbon de bois.",
            'stock' => 25,
            'color' => 'gris',
            'category_id' => 5,
            'img_overview' => 'RR83479.png',
            'img1' => 'RR83479-1.png',
            'img2' => 'RR83479-2.png',
            'img3' => 'RR83479-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'KK983232X',
            'subcategory' => 'Audio & Video',
            'price' => 23.46,
            'brand' => 'Snowkids',
            'description_title' => "Câble HDMI 4K 2m - Snowkids Câble HDMI 2.0 Haute Vitesse par Ethernet en Nylon Tressé Supporte 3D/ Retour Audio - Cordon HDMI pour Lecteur Blu-Ray/Xbox/Xbox 360/ PS3/ PS4/ TV 4K Ultra HD/Ecran - Gris",
            'description_product' => "Avec verre trempé : Comparer avec la coque normale, cette coque a un protecteur d’écran en verre trempé gratuit inclus dans l’emballage.Silicone Liquide : 100% compatible avec iPhone 11 Pro, Fabriquée de silicone liquide pour supporter la même qualité que la coque officielle.Protection Complète : Même tomber à partir de 2 mètres, notre coque peut protéger votre appareil intact. Détails Parfaits: Le bas de la coque fabriqué en silicone est souple pour éviter d’être rompu. Il y a une couche fibre à l’intérieur pour contre les rayures. Charge Sans Fil : Le téléphone iPhone XI Pro peut être chargé sans fil avec la coque élégante.",
            'stock' => 99,
            'color' => 'noir',
            'score' => 4,
            'category_id' => 1,
            'img_overview' => 'KK983232X.png',
            'img1' => 'KK983232X-1.png',
            'img2' => 'KK983232X-2.png',
            'img3' => 'KK983232X-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'BB4784973',
            'subcategory' => 'Boucles doreilles',
            'price' => 100.444,
            'brand' => 'Swarovski',
            'description_title' => "J. RENEÉ Cadeau Saint Valentin, Boucle d'oreille Femme Argent 925, Perles de SWAROVSKI, Bijoux Femme, Cadeau Femme, Emballage de Boîte Cadeau Eélégant",
            'description_product' => "MATIÈRE: Perle Blanc de Swarovski, Type de métal: Argent 925, sans allergène, sans nickel, sans cadmium, sans plomb.SPÉCIFICATION: Taille de la perle: 10*10 mm/0.39*0.39 in, poids: 3.4 g / 0.12 oz.APPLICATION: Ces uniques bijoux femme sont une idée cadeau appropriée comme cadeaux de Saint Valentin, cadeaux de fête des mères, cadeaux de Noël, cadeaux d'anniversaire, cadeaux d'anniversaire, cadeaux de mariage, cadeaux de fête, cadeaux de graduation, cadeaux de rentrée des classes. Un cadeau spécial pour leur exprimer votre amour.",
            'stock' => 20,
            'color' => 'argent',
            'category_id' => 2,
            'img_overview' => 'BB4784973.png',
            'img1' => 'BB4784973-1.png',
            'img2' => 'BB4784973-2.png',
            'img3' => 'BB4784973-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'II40934434',
            'subcategory' => 'meubles',
            'price' => 129.00,
            'brand' => 'Idimex',
            'description_title' => "IDIMEX Bureau d'angle Carmen Table avec Meuble de Rangement intégré et modulable avec 4 étagères 1 Porte et 1 tiroir, décor chêne Sauvage et Blanc Mat",
            'description_product' => "Dimensions du plan de travail (L x H x P) : 120 x 75 x 59 cm / Dimensions du meuble de rangement (L x H x P) : 121,5 x 72,5 x 31 cm / Longueur totale une fois lensemble déplié : 232 cm. Ce bureau dangle est fabriqué en panneaux de particules de bois recouvert dun mélaminé au décor chêne sauvage et blanc mat, résistant aux éraflures et facile dentretien. Vous pouvez assembler ce bureau avec un angle droit à 90°, idéal pour aménager le coin dune chambre ou bien à placer au centre dun bureau, ou bien complètement déplié à 180°, à placer le long dun mur dans une grande pièce",
            'stock' => 37,
            'color' => 'beige',
            'category_id' => 3,
            'img_overview' => 'II40934434.png',
            'img1' => 'II40934434-1.png',
            'img2' => 'II40934434-2.png',
            'img3' => 'II40934434-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'LPO09923PD',
            'subcategory' => 'accesoires moto',
            'price' => 25.00,
            'brand' => 'Favotto',
            'description_title' => "COOAU Compresseur d'air Portatif 12V 150PSI, Gonfleur Electrique avec Rechargeable d'Allume-Cigare, Compresseur Air Numérique LCD Écran, avec Lampe LED, Compatible avec Véhicules, Moto, Bicyclette",
            'description_product' => "【Compresseur d'Air Puissant】 - Soutenir plus de types de pneus: 150PSI Valeur de pression maximale. Gonfler plus vite：28-30L/min débit d'air. Ce compresseur d'air digital peut gonfler des pneus de 15 à 38PSI en 3-5 minutes. 【Détections en temps réel et presets intelligents】 - Avec COOAU compresseur portable, vous pouvez facilement vérifier la pression des pneus à tout moment, et afficher la pression sur l'écran LCD. Appuyez brièvement sur le bouton «R» pour changer d'unit kg / c㎡ / bar / PSI / kPa. En même temps, vous préréglez la valeur de pression que vous voulez. Quand la pression atteint la valeur préréglée, le compresseur s'arrête de fonctionner automatiquement sans que vous ayez à vous en inquiéte",
            'stock' => 18,
            'color' => 'vert',
            'category_id' => 4,
            'img_overview' => 'LPO09923PD.png',
            'img1' => 'LPO09923PD-1.png',
            'img2' => 'LPO09923PD-2.png',
            'img3' => 'LPO09923PD-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'UIE09343',
            'subcategory' => 'patisserie',
            'price' => 99.99,
            'brand' => 'Moulinex',
            'description_title' => "Nifogo Douille Patisserie Poche à Douille Patisserie 34 Pièces Acier Inoxydable DIY Kits pour Décoration de Gâteaux, Muffins 24 Douilles+Puff Douille Ciseaux (Douilles)",
            'description_product' => " DECORATION DE GATEAUX: 24 douilles en inox, 2 poches à douille réutilisables, 1 Puff Douille, 1 fleurs clous, 3 coupleurs, 2 Brosse de Nettoyage, 1 Ciseaux.ACIER INOXYDABLE & SAIN: Fabriqué en matière de qualité alimentaire, créé à l'aide d'un procédé de soudage sans soudure, elles ne rouilleront pas, ne s'abimeront pas ou ne terniront pas.FORMES MULTIPLES: Idéal pour faire de jolis tourbillons, rosettes, rubans, étoiles, feuilles et d'autres formes avec seulement quelques unes des douilles comprises dans cet ensemble.",
            'stock' => 25,
            'color' => 'gris',
            'category_id' => 5,
            'img_overview' => 'UIE09343.png',
            'img1' => 'UIE09343-1.png',
            'img2' => 'UIE09343-2.png',
            'img3' => 'UIE09343-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'II4983493',
            'subcategory' => 'Audio & Video',
            'price' => 25.29,
            'brand' => 'Naf Naf',
            'description_title' => "NAF NAF MORNING V3 - Radio réveil avec port USB chargeur, 2 alarmes ultra compact",
            'description_product' => "NAF NAF MORNING V3 - Radio réveil avec port USB chargeur, 2 alarmes ultra compact",
            'stock' => 22,
            'color' => 'noir',
            'score' => 4,
            'category_id' => 1,
            'img_overview' => 'II4983493.png',
            'img1' => 'II4983493-1.png',
            'img2' => 'II4983493-2.png',
            'img3' => 'II4983493-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'RR9843984',
            'subcategory' => 'Montres',
            'price' => 50.00,
            'brand' => 'Lacoste',
            'description_title' => "Lacoste Watch 2010901",
            'description_product' => "Mouvement Quartz 2 aiguilles.Boîter en acier inoxydable.Bracelet milanais en acier inoxydable.Cadran argent avec détails bleu.Signature crocodile à 3 heures",
            'stock' => 48,
            'color' => 'argent',
            'category_id' => 2,
            'img_overview' => 'RR9843984.png',
            'img1' => 'RR9843984-1.png',
            'img2' => 'RR9843984-2.png',
            'img3' => 'RR9843984-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'HFI03943094',
            'subcategory' => 'meubles',
            'price' => 80.00,
            'brand' => 'eSituro',
            'description_title' => "eSituro SSTR0067 Étagère Polyvalente de Rangement Meuble composant Moderne étagère d'échelle pour Cuisine Couloir Salle de Bain 90x40x95CM",
            'description_product' => "Dimensions: 90x40x95cm, Poids: 21kg.Construction en métal solide et stable, capacité de charge jusqu'à 20 kg.Toutes les planches sont fébriquées en MDF robuste. Facile à installer.Imperméable, résistant aux rayures et facile à entretenir.Étagère polyvalente, idéale pour salle de séjour",
            'stock' => 37,
            'color' => 'beige',
            'category_id' => 3,
            'img_overview' => 'HFI03943094.png',
            'img1' => 'HFI03943094-1.png',
            'img2' => 'HFI03943094-2.png',
            'img3' => 'HFI03943094-3.png',
        ]);
        
        DB::table('products')->insert([
            'code' => 'LPO434233PD',
            'subcategory' => 'accesoires moto',
            'price' => 25.00,
            'brand' => 'Favotto',
            'description_title' => "K&N Voitures et moto nettoyant 355ML + Aérosol huile 204ML pour filtre à air 99-5003EU",
            'description_product' => "Élimine la saleté de la route, l'échappement du moteur et la graisse.Le seul nettoyant conçu spécialement pour les filtres coton K&N.Restaure le filtre pour un état comme neuf.Huile inclue pour huilé à nouveau le filtre à air après nettoyage",
            'stock' => 18,
            'color' => 'vert',
            'category_id' => 4,
            'img_overview' => 'LPO434233PD.png',
            'img1' => 'LPO434233PD-1.png',
            'img2' => 'LPO434233PD-2.png',
            'img3' => 'LPO434233PD-3.png',
        ]);
        
        
        DB::table('products')->insert([
            'code' => 'VV904039',
            'subcategory' => 'fondues electriques',
            'price' => 99.99,
            'brand' => 'Moulinex',
            'description_title' => "Tristar FO-1109 Appareil à Fondue Familial, INOX",
            'description_product' => "Appareil à fondue en acier inoxydable luxueux pour les dîners en famille.Caquelon à fondue amovible pour faciliter le remplissage et le nettoyage.Servez les sauces et vinaigrettes à l’aide de l’anneau porte-sauces pratique avec ses 6 bols.Un thermostat réglable au lieu d'utiliser des bougies chauffe-plats.Facile à nettoyer grâce aux pièces pouvant aller au lave-vaisselle",
            'stock' => 25,
            'color' => 'gris',
            'category_id' => 5,
            'img_overview' => 'VV904039.png',
            'img1' => 'VV904039-1.png',
            'img2' => 'VV904039-2.png',
            'img3' => 'VV904039-3.png',
        ]);
        
    }
}
