<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_publishers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'NXB Giáo Dục Việt Nam',
                'desc' => 'Nhà xuất bản Giáo dục Việt Nam, trực thuộc Bộ Giáo dục và Đào tạo, ra đời từ ngày 01 tháng 6 năm 1957. Là đơn vị xuất bản lớn nhất tại Việt Nam, nhà xuất bản này nổi tiếng với hàng nghìn đầu sách giáo dục được xuất bản hàng năm. Nhiệm vụ chính của Nhà xuất bản Giáo dục Việt Nam là tổ chức biên soạn, biên tập, in ấn và phát hành sách giáo khoa, cũng như các sản phẩm giáo dục hỗ trợ nghiên cứu và giảng dạy.',
                'photo_path' => '/storage/publisher/1/O67v1iHyhVry2L78K7QU.png',
                'photo_name' => 'nxbgd.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'NXB Trẻ',
                'description' => 'Nhà xuất bản Trẻ là đơn vị chuyên sản xuất sách và văn hóa phẩm đa dạng, phục vụ chủ yếu cho đối tượng trẻ, bao gồm thanh niên, thiếu nhi và tổ chức Đoàn các cấp trong thành phố. Nhà xuất bản không chỉ hướng tới bạn đọc nội địa mà còn mở rộng tầm ảnh hưởng quốc tế. Đội ngũ sáng tạo của Trẻ không ngừng nỗ lực để mang đến những tác phẩm văn hóa độc đáo, sáng tạo và giáo dục.',
                'photo_path' => '/storage/publisher/1/nnfPNvv6O4dPKsTlbw5a.jpg',
                'photo_name' => 'nxbtre.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'NXB Kim Đồng',
                'description' => 'Nhà xuất bản Kim Đồng là một địa chỉ uy tín dành cho tác giả trẻ gửi tác phẩm của mình. Nằm trong hệ thống Trung ương Đoàn TNCS Hồ Chí Minh, Kim Đồng chuyên sản xuất và phát hành sách dành cho thiếu nhi và bậc phụ huynh trên toàn quốc.',
                'photo_path' => '/storage/publisher/1/6tLvDygL17iXGy3n5H1f.png',
                'photo_name' => 'nxbkimdong.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'NXB Tổng Hợp Thành Phố Hồ Chí Minh',
                'description' => 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh được thành lập từ năm 1977. Nơi này không chỉ là nơi hội tụ về tư tưởng, văn hóa, chính trị của Đảng bộ và nhân dân thành phố mà còn là nguồn cảm hứng sáng tạo cho hàng ngàn tựa sách đa dạng.',
                'photo_path' => '/storage/publisher/1/Rd1lVbtuSbbs56BNO4ON.png',
                'photo_name' => 'nxbthtphcm.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'NXB Hội Nhà Văn',
                'description' => 'Nhà xuất bản Hội Nhà Văn được thành lập năm 1957. Nhà xuất bản Hội Nhà văn là sự kế thừa và tiếp thu có hiệu quả của công tác xuất bản của Nhà xuất bản Văn nghệ. Sản phẩm chủ yếu của nhà xuất bản là xuất bản sách đa dạng các thể loại như: tiểu thuyết, văn học, truyện ngắn, nghiên cứu, thơ,… và báo chí.',
                'photo_path' => '/storage/publisher/1/swmALMbBFyNEK63yFg5g.png',
                'photo_name' => 'nxbhnv.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'NXB Nhã Nam',
                'description' => 'Nhã Nam, tên đầy đủ là Công ty Cổ phần Văn hóa và Truyền thông Nhã Nam, gia nhập thị trường sách Việt Nam vào tháng 2 năm 2005 với tác phẩm "Balzac và cô bé thợ may Trung hoa" của Đới Tư Kiệt. 
Ngay từ cuốn sách đầu tiên, độc giả đã dành sự quan tâm và yêu mến cho một thương hiệu sách mới mẻ mang trong mình khát vọng góp phần tạo lập diện mạo mới cho xuất bản văn học tại Việt Nam.',
                'photo_path' => '/storage/publisher/1/WJu9T1wW63QLJQSTMJY9.jpg',
                'photo_name' => 'nxbnn.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'NXB Thanh Niên',
                'description' => 'Nhà Xuất bản Thanh Niên trực thuộc Trung ương Đoàn Thanh Niên Cộng sản Hồ Chí Minh, được thành lập ngày 14-7-1954. Là cơ quan tuyên truyền, giáo dục của Trung ương Đoàn, vũ khí sắc bén về công tác chính trị, tư tưởng và văn hóa của Đảng. Trong 70 năm qua, được sự lãnh đạo trực tiếp của Ban Bí thư Trung ương Đoàn, sự chỉ đạo của Ban Tuyên giáo Trung ương Đảng, sự quản lý nhà nước của Bộ Thông tin và Truyền thông và sự giúp đỡ, hỗ trợ của các cơ quan nhà nước, Nhà Xuất bản Thanh Niên đã không ngừng phát triển, đạt được nhiều thành tựu.',
                'photo_path' => '/storage/publisher/1/vmUQXyJwOVc8PdnUeh51.png',
                'photo_name' => 'nxbtn.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'NXB Đại Học Quốc Gia Hà Nội',
                'description' => 'Đại học Quốc Gia Hà Nội là một trung tâm đào tạo đại học, sau đại học, nghiên cứu và ứng dụng khoa học – công nghệ đa ngành, đa lĩnh vực, chất lượng cao, giữ vai trò nòng cốt trong hệ thống giáo dục đại học Việt Nam với một hệ thống gồmbao gồm 37 đơn vị, trong đó: Cơ quan ĐHQGHN (Văn phòng, 09 Ban chức năng và Khối Văn phòng Đảng - đoàn thể) và 36 đơn vị thành viên, đơn vị trực thuộc, gồm: 09 trường đại học thành viên; 02 trường trực thuộc, 02 Khoa trực thuộc và 02 Trung tâm đào tạo môn chung; 05 Viện nghiên cứu khoa học thành viên, 01 Viện nghiên cứu khoa học trực thuộc, 15 đơn vị dịch vụ và phục vụ trực thuộc. Bên trong các trường đại học thành viên của ĐHQGHN có 04 trường THPT (Trường THPT Chuyên Ngoại Ngữ, Trường THPT Chuyên Khoa học tự nhiên, Trường THPT Chuyên Khoa học Xã hội và Nhân văn, Trường THPT Khoa học Giáo dục) và 01 Trường THCS (Trường THCS Ngoại Ngữ). ĐHQGHN có 08 tổ chức thực hiện nhiệm vụ đặc biệt (01 Trung tâm, 02 Văn phòng, 02 Quỹ phát triển, 03 Câu lạc bộ). Trong xu thế phát triển và hội nhập quốc tế, ĐHQGHN đóng vai trò tiên phong trong việc đi tắt đón đầu, tiếp cận với nền tri thức của nhân loại, mở rộng biên độ hợp tác với nhiều trường đại học danh tiếng trên thế giới.',
                'photo_path' => '/storage/publisher/1/XLpCKiA9d6sZCw711CBK.jpg',
                'photo_name' => 'nxbdhqghn.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'NXB Đà Nẵng',
                'description' => 'Là một trong những Nhà xuất bản lớn của miền Trung, nằm ở trung độ của cả nước, là Nhà xuất bản Tổng hợp, có chức năng xuất bản các loại sách Chính trị – văn hóa – xã hội – khoa học – văn học nghệ thuật – thiếu nhi và các loại văn hóa phẩm. Nhà xuất bản Đà Nẵng là người bạn gần gũi của các nhà khoa học, văn nghệ sỹ, bạn đọc trong cả nước. Từ năm 1984 đến nay, NXB. Đà Nẵng đã xuất bản hơn 20.000 đầu sách các loại với hàng triệu bản sách, nhiều tác phẩm đã được giải thưởng của Liên hiệp các hội VHNT Việt Nam, được Bộ Văn hóa Thông tin trao bằng khen về sách đẹp. Hàng trăm đầu sách được các giới chuyên môn, nghiên cứu, dư luận đánh giá cao. Năm 2004, NXB. Đà Nẵng vinh dự được nhận Huân chương Lao động Hạng Ba.',
                'photo_path' => '/storage/publisher/1/IOsTb3j0UDQDT2SPEq4w.jpg',
                'photo_name' => 'nxbdn.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'NXB Văn Học',
                'description' => 'Ra đời trong những ngày tháng khói lửa của cuộc kháng chiến chống Pháp, trưởng thành qua các thời kỳ đấu tranh giải phóng dân tộc và công cuộc xây dựng Tổ quốc XHCN, hơn 70 năm qua, NXB Văn học luôn đồng hành cùng những biến động của đất nước, hoà chung nhịp thở của đời sống nhân dân và phong trào văn nghệ cả nước. ',
                'photo_path' => '/storage/publisher/1/4DRAXZhLYtVVNRs8jkEs.png',
                'photo_name' => 'nxbvn.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'NXB Đồng Nai',
                'description' => 'Ngày 19-06-1980, Nhà xuất bản Tổng hợp Đồng Nai được thành lập. Trải qua nhiều lần chuyển đổi mô hình, ngày 01-08-2008, Bộ Thông tin và Truyền thông cho phép thành lập Nhà xuất bản Đồng Nai. Đây là một trong những nhà xuất bản địa phương đầu tiên ở khu vực phía Nam và hiện nay là Nhà xuất bản duy nhất tại miền Đông Nam Bộ. Là nhà xuất bản của một địa phương giàu truyền thống cách mạng, được sự quan tâm của Tỉnh ủy, UBND Tỉnh và các ban ngành trong tỉnh, Nhà xuất bản Đồng Nai luôn bám sát tôn chỉ, mục đích, chức năng hoạt động và đối tượng phục vụ là phục vụ cho văn hóa đọc của địa phương, thực hiện nhiệm vụ chính trị địa phương, xuất bản các sách lịch sử – văn hóa, truyền thống của địa phương nhằm nâng cao niềm tự hào về truyền thống yêu nước của các thế hệ cha ông, về đất và người Đồng Nai qua các giai đoạn lịch sử của dân tộc.',
                'photo_path' => '/storage/publisher/1/DIuWPmI2LYhtcxMoIRp4.png',
                'photo_name' => 'nxbdn.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'NXB Thế Giới',
                'description' => 'Nhà xuất bản Thế giới là một trong những đơn vị xuất bản lớn và có uy tín tại Việt Nam. Được thành lập vào năm 1957, Nhà xuất bản Thế giới ban đầu chủ yếu phục vụ cho việc xuất bản và phổ biến các tác phẩm văn học, triết học, khoa học, và công nghệ từ các nước trên thế giới. Nhà xuất bản Thế giới không chỉ nổi tiếng với việc chọn lọc và dịch thuật các tác phẩm chất lượng mà còn với quy trình sản xuất sách chuyên nghiệp, đảm bảo chất lượng và bền vững. Họ đã và đang đóng góp rất lớn vào việc nâng cao kiến thức và văn hóa đọc giả Việt Nam thông qua các hoạt động xuất bản đa dạng và phong phú.',
                'photo_path' => '/storage/publisher/1/AZoCNkelQwzcEvEfr9eF.png',
                'photo_name' => 'nxbtg.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'NXB Lao Động',
                'description' => 'Nhà xuất bản Lao Động là một trong những đơn vị xuất bản lớn tại Việt Nam, chuyên hoạt động trong lĩnh vực xuất bản sách, tài liệu về khoa học xã hội, triết học, kinh tế, và các sách giáo khoa. Nhà xuất bản này có vai trò quan trọng trong việc phổ biến kiến thức và nghiên cứu các vấn đề xã hội, kinh tế của đất nước.',
                'photo_path' => '/storage/publisher/1/6ppqmHpBftqFjGG303qs.png',
                'photo_name' => 'nxbld.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'NXB Đại Học Sư Phạm',
                'description' => 'Nhà xuất bản Đại Học Sư Phạm là nơi chuyên cung cấp sách giáo khoa và tài liệu chuyên ngành cho giảng viên và sinh viên trong và cả ngoài trường.',
                'photo_path' => '/storage/publisher/1/IHoGkVDxHwsgnbElyLAO.png',
                'photo_name' => 'nxbdhsp.png',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
    }
}
