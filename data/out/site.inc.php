<?php 
//域名后缀配置
$domain_regexp='/([a-z0-9][a-z0-9\\-]+?\\.(?:com|cn|net|org|info|la|cc|co|gov|sx|gz|sh|sc|faith|date|space)(?:\\.cn)?)$/';
//站长统计代码
$cnzz='<script src="https://s4.cnzz.com/z_stat.php?id=1260851296&web_id=1260851296" language="JavaScript"></script>';
$pc_cnzz='<script src="https://s4.cnzz.com/z_stat.php?id=1260851296&web_id=1260851296" language="JavaScript"></script>';
$wap_cnzz='<script src="https://s4.cnzz.com/z_stat.php?id=1260851296&web_id=1260851296" language="JavaScript"></script>';
//数字简替换成字母 配置
$n=array (
  0 => '1',
  1 => '2',
  2 => '3',
  3 => '4',
  4 => '5',
  5 => '6',
  6 => '7',
  7 => '8',
  8 => '9',
  9 => '0',
);
$s=array (
  0 => 'd',
  1 => 'e',
  2 => 'a',
  3 => 'm',
  4 => 'o',
  5 => 'r',
  6 => 'u',
  7 => 'n',
  8 => 'i',
  9 => 't',
);
//首页数量及泛域名支持
$ntkey_count = 0;//ntkey的数量,内页可以使用ntkey1,ntkey2....
$is_use_sogou_pic = false; //是否启用本地化图片地址[程序自动302到原图]

$is_random_muban = false; //内页是否启用随机模板
$is_extk_random_key = false; //extk采用固定随机词
$is_all_bwk = true; //是否需要bwk等数据

$is_key_random = false;  //内页是否随机模式[外链全部随机/extk为所有外链词及bwk的随机]
$is_use_unavail = false; //是否启用unavailable //启用它默认启用PC版本
$is_use_unavail_mobile = false; //是否启用手机版unavailable. 需要先启用PC版本
$is_part = false;   //是否启用分词模式 //本功能无用
$is_fan =  false;  //是否泛域名
$is_fan_www = false; //泛解析域名是否需要前导wwww, 如www.111.chihuo.date

$index_list_cache_time = 3600 * 4;      //列表缓存时间

$key_info_count=array (
  'videos_count' => 2,
  'imgs_count' => 12,
  'txts_count' => 12,
  'ques_count' => 0,
  'items_count' => 0,
  'comments_count' => 0,
);
//域名及配置
//所有模板[按需自己定]
$alltmpl1=array (
  0 => '11',
);
//手机模板默认一定保留
$mobile_tmpl = "mobile";
$wap_tmpl = "wap";

$allhost=array (
  'www.joinyeah.com.cn' => 
  array (
    'hid' => 5108,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'blbhxy-nc',
    ),
    'index_list_title' => '雏妓在线观看完整版_脱肛图片_连乳贴都不带的车模',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinmei',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topmei',
        'name' => '美女',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'jiqinghot',
        'name' => '偷拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'chemo',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'jingtu',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yopai',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'pafuli',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yuchemo',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mowait',
        'name' => '头条',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvsizu',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'temei',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'uslele',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '54',
      1 => '1075',
    ),
    'outter_conf' => 
    array (
      0 => '291',
      1 => '1461',
    ),
    'srand_conf' => 
    array (
      0 => '1798',
      1 => '1885',
    ),
    'seo_desc' => '{$SEOTITLE},热门推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51080,
    'index_key' => '解开美女胸衣,鸣人与纲手的邪恶图片,男朋友想要那个怎么办,让五官变漂亮的秘诀,动态图片雨后小故事吧',
    'mobile_tmpl' => 'mlaonanren-nc',
  ),
  'www.bjyzy.com.cn' => 
  array (
    'hid' => 5109,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'ko1-nc',
    ),
    'index_list_title' => '久久热最新地址获取器_抖奶神功_体罚高跟鞋憋尿的方法',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinmei',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topvideo',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'hothot',
        'name' => '写真',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'tui',
        'name' => '美图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'sizutu',
        'name' => '视频',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yowuwu',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'pawait',
        'name' => '完美',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yusizu',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mozhen',
        'name' => '头条',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvwuwu',
        'name' => '完美',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'temeinv',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'usmeinv',
        'name' => '写真',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '469',
      1 => '1070',
    ),
    'outter_conf' => 
    array (
      0 => '327',
      1 => '1126',
    ),
    'srand_conf' => 
    array (
      0 => '1146',
      1 => '1019',
    ),
    'seo_desc' => '{$SEOTITLE},TOP十条{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51090,
    'index_key' => '短篇辣文合集最新章节,男生发型图片2016潮流,车祸视频惨不忍睹女尸,雯雅婷4所有图片大全,百度网盘搜索引擎',
    'mobile_tmpl' => 'mblbhxy-nc',
  ),
  'www.dz021.com.cn' => 
  array (
    'hid' => 5110,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'laonanren-nc',
    ),
    'index_list_title' => 'gif邪恶动态图第1期_lol女英雄全彩本子_微信头像女生气质唯美',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xintop',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topzonghe',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'sizuhot',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'lele',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'jiqingtu',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yochemo',
        'name' => '美图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'pavideo',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yutui',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mopapa',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvtui',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'temei',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'usmeinv',
        'name' => '自拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '631',
      1 => '759',
    ),
    'outter_conf' => 
    array (
      0 => '88',
      1 => '263',
    ),
    'srand_conf' => 
    array (
      0 => '982',
      1 => '1050',
    ),
    'seo_desc' => '{$SEOTITLE},爆料推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51100,
    'index_key' => '校花的贴身高手,lovelive学园偶像祭,下课后爱的辅导课,老公不爱你的三大表现,刘亦菲黑木耳b全图',
    'mobile_tmpl' => 'mkang-nc',
  ),
  'www.car520.cn' => 
  array (
    'hid' => 5111,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'laonanren-nc',
    ),
    'index_list_title' => '安全裤_里番库漫画_19禁韩国mv合集视频',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinsizu',
        'name' => '自拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topjing',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'sizuhot',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'pai',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'fulitu',
        'name' => '精彩',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yopapa',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'papai',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yumei',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mojing',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvmei',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tepai',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'usmei',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '378',
      1 => '571',
    ),
    'outter_conf' => 
    array (
      0 => '400',
      1 => '1224',
    ),
    'srand_conf' => 
    array (
      0 => '499',
      1 => '1187',
    ),
    'seo_desc' => '{$SEOTITLE},爆料推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51110,
    'index_key' => '微信福利群二维码2016,抖奶神功,风景图片,熊黛林牛仔裤凹进去,麻生希作品',
    'mobile_tmpl' => 'mkang-nc',
  ),
  'www.chinawugang.cn' => 
  array (
    'hid' => 5112,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'laonanren-nc',
    ),
    'index_list_title' => '幽默图片_干一夜_有谁上过自己妈妈',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinpic',
        'name' => '偷拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topjing',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'paihot',
        'name' => '娱乐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'dongtai',
        'name' => '精彩',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'waittu',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yodongtai',
        'name' => '精彩',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'papapa',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yupai',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'momeinv',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvmei',
        'name' => '美女',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tefuli',
        'name' => '自拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'ustui',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '606',
      1 => '1140',
    ),
    'outter_conf' => 
    array (
      0 => '434',
      1 => '23',
    ),
    'srand_conf' => 
    array (
      0 => '484',
      1 => '124',
    ),
    'seo_desc' => '{$SEOTITLE},最新更新{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51120,
    'index_key' => 'juliaann,车展穿的最少的车模,太监的净身过程图解,老公太凶猛,便签纸素材',
    'mobile_tmpl' => 'mlaonanren-nc',
  ),
  'www.tssdll.com.cn' => 
  array (
    'hid' => 5113,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'kang-nc',
    ),
    'index_list_title' => '小伙当街叫女友脱内衣_肉番动画在线播放_公主打奴婢光屁屁作文',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinpic',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topchemo',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'sizuhot',
        'name' => '写真',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'jing',
        'name' => '头条',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'toptu',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yovideo',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'patop',
        'name' => '娱乐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yuzhen',
        'name' => '偷拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'modongtai',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvchemo',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tepai',
        'name' => '完美',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'ushot',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '21',
      1 => '590',
    ),
    'outter_conf' => 
    array (
      0 => '134',
      1 => '713',
    ),
    'srand_conf' => 
    array (
      0 => '1126',
      1 => '1373',
    ),
    'seo_desc' => '{$SEOTITLE},爆料推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51130,
    'index_key' => 'tara成员左乳曝光,硬占丰满妻,第一社区,蔡文姬无惨,腐漫画',
    'mobile_tmpl' => 'mlaonanren-nc',
  ),
  'www.cmscenter.cn' => 
  array (
    'hid' => 5114,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'ko1-nc',
    ),
    'index_list_title' => '人体结构图五脏六腑_李金铭丝袜_恶心的原味内裤',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinzhen',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topzonghe',
        'name' => '美图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'wuwuhot',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'wuwu',
        'name' => '偷拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'paitu',
        'name' => '美图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yosizu',
        'name' => '自拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'papai',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yuzhen',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mowuwu',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvhot',
        'name' => '精彩',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tesizu',
        'name' => '自拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'ustui',
        'name' => '精彩',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '249',
      1 => '879',
    ),
    'outter_conf' => 
    array (
      0 => '105',
      1 => '245',
    ),
    'srand_conf' => 
    array (
      0 => '1875',
      1 => '1749',
    ),
    'seo_desc' => '{$SEOTITLE},爆料推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51140,
    'index_key' => '4399美女小游戏,阴环饰品,贝莉雅尔,女性解小便,国防生待遇',
    'mobile_tmpl' => 'mlaonanren-nc',
  ),
  'www.hnjagg.cn' => 
  array (
    'hid' => 5115,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'blbhxy-nc',
    ),
    'index_list_title' => '疯狂来往下载_可以啪啪的手机游戏_微信表情包搞笑图片',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinlele',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'toptui',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'lelehot',
        'name' => '视频',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'jing',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'leletu',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yopic',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'pawait',
        'name' => '自拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yujiqing',
        'name' => '写真',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'motui',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvpic',
        'name' => '美图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'telele',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'ushot',
        'name' => '自拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '585',
      1 => '996',
    ),
    'outter_conf' => 
    array (
      0 => '364',
      1 => '1206',
    ),
    'srand_conf' => 
    array (
      0 => '1471',
      1 => '1083',
    ),
    'seo_desc' => '{$SEOTITLE},热门推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51150,
    'index_key' => '爱言叶钢琴谱,男生福利手机游戏,春野樱,玉蒲团3之官人我要,火影忍者图片',
    'mobile_tmpl' => 'mlaonanren-nc',
  ),
  'www.ycgczj.cn' => 
  array (
    'hid' => 5116,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'laonanren-nc',
    ),
    'index_list_title' => 'gif出处高清视频_里番漫画库全彩本子_未满十八岁',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinlele',
        'name' => '头条',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topwuwu',
        'name' => '自拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'zhenhot',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'zhen',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'pictu',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yojiqing',
        'name' => '完美',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'padongtai',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yuvideo',
        'name' => '美图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'motui',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvpapa',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tejiqing',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'usjiqing',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '229',
      1 => '382',
    ),
    'outter_conf' => 
    array (
      0 => '398',
      1 => '1103',
    ),
    'srand_conf' => 
    array (
      0 => '1758',
      1 => '1425',
    ),
    'seo_desc' => '{$SEOTITLE},热门推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51160,
    'index_key' => '妹子撸管专用动态图,异地恋见面就是滚床单,ed2k资源,2008艳照门女主角,女生来月经可以啪啪吗',
    'mobile_tmpl' => 'mlaonanren-nc',
  ),
  'www.szfilm.net.cn' => 
  array (
    'hid' => 5117,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'kang-nc',
    ),
    'index_list_title' => '种子搜索_阴刑_cf女角色h故事',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinwuwu',
        'name' => '偷拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topfuli',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'tuihot',
        'name' => '精彩',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'fuli',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'sizutu',
        'name' => '视频',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yowait',
        'name' => '动态图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'patui',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yuchemo',
        'name' => '娱乐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mohot',
        'name' => '头条',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvvideo',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tevideo',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'uspic',
        'name' => '美女',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '352',
      1 => '267',
    ),
    'outter_conf' => 
    array (
      0 => '250',
      1 => '591',
    ),
    'srand_conf' => 
    array (
      0 => '497',
      1 => '702',
    ),
    'seo_desc' => '{$SEOTITLE},TOP十条{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51170,
    'index_key' => '郭富城玩够了熊黛林,表情大全,扑倒小萌妻:大叔,轻点,触手控,tuigirl恋恋视频',
    'mobile_tmpl' => 'mblbhxy-nc',
  ),
  'www.bdtlmzc.com.cn' => 
  array (
    'hid' => 5118,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'laonanren-nc',
    ),
    'index_list_title' => '啪啪啪邪恶动态图_xbox360和xboxone_女歌手腿间掉落卫生巾',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xintui',
        'name' => '写真',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'toplele',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'meinvhot',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'zhen',
        'name' => '头条',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'wuwutu',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yomeinv',
        'name' => '精彩',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'pazonghe',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yujing',
        'name' => '精彩',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mowuwu',
        'name' => '头条',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvmeinv',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'temei',
        'name' => '完美',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'uspai',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '48',
      1 => '314',
    ),
    'outter_conf' => 
    array (
      0 => '396',
      1 => '748',
    ),
    'srand_conf' => 
    array (
      0 => '1330',
      1 => '387',
    ),
    'seo_desc' => '{$SEOTITLE},热门推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51180,
    'index_key' => '2016dnf男柔道加点,gif邪恶动态图第1期,男生福利手机游戏,我的丁丁图片,昵图网素材图库大图',
    'mobile_tmpl' => 'mkang-nc',
  ),
  'www.168report.cn' => 
  array (
    'hid' => 5119,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'kang-nc',
    ),
    'index_list_title' => '那一夜他的老师疯狂的_邪恶漫画之可知子绅士_菊花岛怎么样',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xintop',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topchemo',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'dongtaihot',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'papa',
        'name' => '激情',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'waittu',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yozonghe',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'pasizu',
        'name' => '完美',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yupic',
        'name' => '偷拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mopapa',
        'name' => '美图',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvchemo',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tepic',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'ustui',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '370',
      1 => '488',
    ),
    'outter_conf' => 
    array (
      0 => '341',
      1 => '118',
    ),
    'srand_conf' => 
    array (
      0 => '120',
      1 => '1219',
    ),
    'seo_desc' => '{$SEOTITLE},爆料推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51190,
    'index_key' => '类似缘之空的动漫,人体艺术摄影集,天姿,ed2k资源,踩踏部落网,美女qq号很开放的',
    'mobile_tmpl' => 'mlaonanren-nc',
  ),
  'www.tri-circledoor.cn' => 
  array (
    'hid' => 5120,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'ko1-nc',
    ),
    'index_list_title' => '爱视频微拍福利_莲蓬乳取虫子视频_赵丽颖图片',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinpic',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'toppic',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'jinghot',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'hot',
        'name' => '娱乐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'leletu',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yotui',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'pachemo',
        'name' => '视频',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yuzhen',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'modongtai',
        'name' => '车模',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvzhen',
        'name' => '视频',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tedongtai',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'uspai',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '169',
      1 => '857',
    ),
    'outter_conf' => 
    array (
      0 => '157',
      1 => '651',
    ),
    'srand_conf' => 
    array (
      0 => '228',
      1 => '185',
    ),
    'seo_desc' => '{$SEOTITLE},爆料推荐{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51200,
    'index_key' => '微录客视频,李智友牛仔裤,被子的英文,台湾beautyleg全集,赵本山玩过多少女人',
    'mobile_tmpl' => 'mblbhxy-nc',
  ),
  'www.se-3.com.cn' => 
  array (
    'hid' => 5121,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'kang-nc',
    ),
    'index_list_title' => '给个网站你们懂的_嫩模陈静仪_北大校长周其凤艳照',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xinpai',
        'name' => '头条',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topsizu',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'jiqinghot',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'video',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'videotu',
        'name' => '美女',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yovideo',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'pasizu',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yudongtai',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mozhen',
        'name' => '完美',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvwait',
        'name' => '偷拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tetop',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'uslele',
        'name' => '另类',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '255',
      1 => '1031',
    ),
    'outter_conf' => 
    array (
      0 => '449',
      1 => '1109',
    ),
    'srand_conf' => 
    array (
      0 => '1745',
      1 => '813',
    ),
    'seo_desc' => '{$SEOTITLE},TOP十条{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51210,
    'index_key' => '女人想睡男人的表现,女歌手腿间掉落卫生巾,百度影音绫波芹,男人射精时叫,表示什么,纹身图案',
    'mobile_tmpl' => 'mblbhxy-nc',
  ),
  'www.shjuanlianmen.com.cn' => 
  array (
    'hid' => 5122,
    'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
    'muban' => 
    array (
      0 => 'laonanren-nc',
    ),
    'index_list_title' => '触手小说大全_九尾妖狐阿狸h本子_cf色系图片灵狐者图片',
    'filename_templet' => '/{$cat}/{$temp_num_kid}/',
    'cat_url' => '/{$cat}/',
    'detail_url' => '/{$cat}/{$temp_num_kid}/{$cid}.html',
    'cat_seo_title' => '{$cat.name}',
    'detail_seo_title' => '{$tkey_$novel.name_$chapter.name}',
    'cat_map' => 
    array (
      '另类美图' => 
      array (
        'pinyin' => 'xindongtai',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      'gif动态图片第五十二期' => 
      array (
        'pinyin' => 'topvideo',
        'name' => '推荐',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '你懂的动态图' => 
      array (
        'pinyin' => 'videohot',
        'name' => '福利',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '邪恶gif图' => 
      array (
        'pinyin' => 'fuli',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '风云' => 
      array (
        'pinyin' => 'zonghetu',
        'name' => '视频',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '好图' => 
      array (
        'pinyin' => 'yotop',
        'name' => '综合',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '美女' => 
      array (
        'pinyin' => 'pafuli',
        'name' => '完美',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '娱乐' => 
      array (
        'pinyin' => 'yufuli',
        'name' => '自拍',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '模特' => 
      array (
        'pinyin' => 'mohot',
        'name' => '无码',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '写真' => 
      array (
        'pinyin' => 'nvwuwu',
        'name' => '写真',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '特写' => 
      array (
        'pinyin' => 'tejiqing',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
      '自拍' => 
      array (
        'pinyin' => 'uswait',
        'name' => '丝足',
        'detail_url' => '',
        'key_url' => '',
        'key_seo_title' => '{$tkey}_{$bwk1}_{$bwk2}_{$swk1}',
        'cat_seo_title' => '{$cat.name}',
        'detail_seo_title' => '',
      ),
    ),
    'group' => 'fenzu51',
    'inner_conf' => 
    array (
      0 => '380',
      1 => '26',
    ),
    'outter_conf' => 
    array (
      0 => '292',
      1 => '934',
    ),
    'srand_conf' => 
    array (
      0 => '1673',
      1 => '69',
    ),
    'seo_desc' => '{$SEOTITLE},TOP十条{$imgs[0].title},{$imgs[1].title}',
    'index_v_value' => 51220,
    'index_key' => '爆女生菊花是什么感觉,色戒在哪可以看完整版,六间房被禁的视频,谁干过护士,中长发烫发发型图片',
    'mobile_tmpl' => 'mlaonanren-nc',
  ),
);

$bk_replace=array (
  0 => '{$tkey}',
  1 => '{$tkey}',
  2 => '{$tkey}',
  3 => '{$tkey}',
  4 => '{$tkey}',
  5 => '{$tkey}',
  6 => '{$tkey}',
  7 => '{$tkey}',
  8 => '{$tkey}',
  9 => '{$tkey}',
);

$cat_order_host=array (
);


$detail_configs=array (
  0 => '/{$cat}/{$temp_num_kid}/{$cid}.html',
);