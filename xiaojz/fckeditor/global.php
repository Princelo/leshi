<?

define('ROOT_PATH', str_replace('global.php', '', str_replace('\\', '/', __FILE__)));

//include('mian.php'); //������Ӧ�ó����$_SESSION �Ǳ��������ݿ��еĻ���ֱ�ӽ����ȫ�������ļ������������������ȫ��$_SESSION���ֿ��Խ�һ�����Ʊ༭�����ϴ�Ȩ�ޡ�

$SET['webpath'] = '/a/fckeditor/'; # �����Ŀ¼ ������б�� '/' ��ʼ �� '/'����

$SET['UpFile'] = 'upfile/';      # �ϴ��ļ����Ŀ¼  ����'/'����

$SET['image'] = 'image/';        # ͼƬ�ļ����Ŀ¼  ����'/'����


$SET['flash'] = 'flash/';        # FLASH�ļ����Ŀ¼ ����'/'����


$SET['media'] = 'media/';        # ý���ļ����Ŀ¼  ����'/'����


$SET['files'] = 'files/';        # ���������ļ����Ŀ¼  ����'/'����


$SET['waterimage']  = C_ROOT_PATH.'waterimage/waterimage.png'; # ˮӡλ��


$SET['weburl']  = 'http://'.$_SERVER['SERVER_NAME']; #����ˮӡ��

?>