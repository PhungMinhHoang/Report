<template>
    <b-form class="checklist" @submit.prevent="formSubmit">
        <table class="table table-bordered">
            <tr>
                <th style="width:" >STT</th>
                <th style="width:25%">Nội dung đánh giá</th>
                <th style="width:25%">Hướng dẫn</th>
                <th style="width:">Link lưu trữ chung</th>
                <th style="width:">Kết quả đánh giá</th>
                <th style="width:">Điểm tối đa</th>
                <th style="width:">Điểm thực tế</th>
            </tr>
            <tr>
                <td>1</td>
                <th>Xây dựng kế hoạch chi tiết thực hiện Dự án</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1.1</td>
                <td id='document-name-0'>Dự án đã có Quyết định phê duyệt Dự án sản xuất thử nghiệm.</td>
                <td >
                    Quyết định phê duyệt Dự án sản xuất thử nghiệm
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[0]" @keyup="inputLink(0)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-0" class="form-control" v-model="selections[0]" @change="changeSelect($event,0)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[0]}}</td>
                <td>{{real_score[0]}}</td>
            </tr>
            <tr>
                <td>1.2</td>
                <td id='document-name-1'>Hồ sơ đầu vào quá trình sản xuất thử nghiệm</td>
                <td >
                    Hồ sơ đầu vào quá trình sản xuất thử nghiệm đáp ứng theo mục 5.1.3 của QT.VHT.KHCN.01.SXTN
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[1]" @keyup="inputLink(1)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-1" class="form-control" v-model="selections[1]" @change="changeSelect($event,1)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[1]}}</td>
                <td>{{real_score[1]}}</td>
            </tr>
            <tr>
                <td>1.3</td>
                <td id='document-name-2'>Hiện trạng phê duyệt kế hoạch chi tiết thực hiện Dự án</td>
                <td >
                    Kế hoạch chi tiết thực hiện Dự án được phê duyệt bởi Ban Giám đốc Khối
                    <br/>* Áp dụng: BM.VHT.KHCN.01-SXTN.01 - Ke hoach thuc hien du an
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung</td>
                <td><input type="text" class="form-control" v-model="links[2]" @keyup="inputLink(2)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-2" class="form-control" v-model="selections[2]" @change="changeSelect($event,2)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[2]}}</td>
                <td>{{real_score[2]}}</td>
            </tr>
            <tr>
                <td>1.4</td>
                <td id='document-name-3'>Hiện trạng công việc trên hệ thống VECO</td>
                <td >
                    Hoàn thành cập nhật cây công việc trên Hệ thống VECO
                </td>
                <td><input type="text" class="form-control" v-model="links[3]" @keyup="inputLink(3)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-3" class="form-control" v-model="selections[3]" @change="changeSelect($event,3)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[3]}}</td>
                <td>{{real_score[3]}}</td>
            </tr>
            <tr>
                <td>2</td>
                <th>Rà soát vật tư linh kiện tồn kho</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2.1</td>
                <td id='document-name-4'>Hoàn thành bảng rà soát Vật tư linh kiện tồn kho</td>
                <td >
                    Hoàn thành bảng rà soát Vật tư linh kiện tồn kho.
                    <br/>* Áp dụng: BM.VHT.KHCN.01-SXTN.02 - Checklist VTLK
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung                   <br/>
                </td>
                <td><input type="text" class="form-control" v-model="links[4]" @keyup="inputLink(4)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-4" class="form-control" v-model="selections[4]" @change="changeSelect($event,4)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[4]}}</td>
                <td>{{real_score[4]}}</td>
            </tr>
            <tr>
                <td>3</td>
                <th>Đề nghị mua sắm</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3.1</td>
                <td id='document-name-5'>Hiện trạng thực hiện hợp đồng gia công với đối tác, hợp đồng mua sắm VTLK</td>
                <td >
                    Hoàn thành hợp đồng gia công, mua sắm Vật tư linh kiện với đối tác
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[5]" @keyup="inputLink(5)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-5" class="form-control" v-model="selections[5]" @change="changeSelect($event,5)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[5]}}</td>
                <td>{{real_score[5]}}</td>
            </tr>
            <tr>
                <td>4</td>
                <th>Chuẩn bị vật tư linh kiện</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4.1</td>
                <td id='document-name-6'>Chuẩn bị vật tư linh kiện</td>
                <td >
                    Hoàn thành chuẩn bị vật tư linh kiện
                    <br/>* Áp dụng: BM.VHT.KHCN.01-SXTN.02 - Checklist VTLK
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[6]" @keyup="inputLink(6)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-6" class="form-control" v-model="selections[6]" @change="changeSelect($event,6)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[6]}}</td>
                <td>{{real_score[6]}}</td>
            </tr>
            <tr>
                <td>4.2</td>
                <td id='document-name-7'>Kiểm tra Vật tư linh kiện tồn kho</td>
                <td >
                    Hoàn thành kiểm tra Vật tư linh kiện tồn kho
                    <br/>* Áp dụng: BM.VHT.KHCN.01-SXTN.02 - Checklist VTLK
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[7]" @keyup="inputLink(7)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-7" class="form-control" v-model="selections[7]" @change="changeSelect($event,7)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[7]}}</td>
                <td>{{real_score[7]}}</td>
            </tr>
            <tr>
                <td>5</td>
                <th>Chuẩn bị tài liệu sản xuất</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5.1</td>
                <td id='document-name-8'>Hiện trạng rà soát các tài liệu liên quan đến quá trình Sản xuất thử nghiệm</td>
                <td >
                    Hoàn thành chuẩn bị tài liệu sản xuất
                    <br/>* Áp dụng: BM.VHT.KHCN.01-SXTN.03 - Checklist TLSX
                    <br/>* Tài liệu gia công tại đơn vị sản xuất (Phỏng vấn chủ nhiệm Dự án để có thông tin chi tiết)
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[8]" @keyup="inputLink(8)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-8" class="form-control" v-model="selections[8]" @change="changeSelect($event,8)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[8]}}</td>
                <td>{{real_score[8]}}</td>
            </tr>
            <tr>
                <td>6</td>
                <th>Chuẩn bị công cụ sản xuất</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6.1</td>
                <td id='document-name-9'>Hiện trạng chuẩn bị công cụ sản xuất</td>
                <td >
                    Hoàn thành chuẩn bị công cụ sản xuất
                    <br/>* Áp dụng: BM.VHT.KHCN.01-SXTN.04 - Checklist CCSX
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[9]" @keyup="inputLink(9)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-9" class="form-control" v-model="selections[9]" @change="changeSelect($event,9)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[9]}}</td>
                <td>{{real_score[9]}}</td>
            </tr>
            <tr>
                <td>6.2</td>
                <td id='document-name-10'>Hiện trạng kiểm tra công cụ sản xuất</td>
                <td>
                    Hoàn thành kiểm tra danh mục và yêu cầu của công cụ sản xuất
                </td>
                <td><input type="text" class="form-control" v-model="links[10]" @keyup="inputLink(10)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-10" class="form-control" v-model="selections[10]" @change="changeSelect($event,10)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[10]}}</td>
                <td>{{real_score[10]}}</td>
            </tr>
            <tr>
                <td>7</td>
                <th>Chuẩn bị bài đo, phương pháp đo</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7.1</td>
                <td id='document-name-11'>Có Checklist danh mục bài đo, phương pháp đo</td>
                <td>
                    Hoàn thành Checklist Bài đo, phương pháp đo
                    <br/>* BM.VHT.KHCN.01-SXTN.05 - Checklist BĐPPĐ
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[11]" @keyup="inputLink(11)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-11" class="form-control" v-model="selections[11]" @change="changeSelect($event,11)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[11]}}</td>
                <td>{{real_score[11]}}</td>
            </tr>
            <tr>
                <td>7.2</td>
                <td id='document-name-12'>Dự thảo kịch bản thử nghiệm tại đơn vị sử dụng</td>
                <td>
                    Dự thảo kịch bản thử nghiệm tại đơn vị sử dụng
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[12]" @keyup="inputLink(12)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-12" class="form-control" v-model="selections[12]" @change="changeSelect($event,12)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[12]}}</td>
                <td>{{real_score[12]}}</td>
            </tr>
            <tr>
                <td>8</td>
                <th>Thống nhất phương án sản xuất</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8.1</td>
                <td id='document-name-13'>Thống nhất toàn bộ các nội dung liên quan đến Quá trình sản xuất</td>
                <td>
                    Biên bản thống nhất phương án sản xuất
                    <br/>*BM.VHT.KHCN.01-SXTN.06 - Bien ban hop
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[13]" @keyup="inputLink(13)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-13" class="form-control" v-model="selections[13]" @change="changeSelect($event,13)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[13]}}</td>
                <td>{{real_score[13]}}</td>
            </tr>
            <tr>
                <td>9</td>
                <th>Sản xuất đợt i</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9.1</td>
                <td id='document-name-14'>Hoàn thành sản xuất lô sản phẩm, các công cụ sản xuất theo kế hoạch</td>
                <td>
                    Đánh giá hoàn thành dựa trên các yếu tố:
                    <br/>- Hoàn thành lô sản xuất
                    <br/>- Tài liệu Nhật ký sản xuất (BM.VHT.KHCN.01-SXTN.07 - Nhat ky QLSX)
                    <br/>- Biên bản đo kiểm (BM.VHT.KHCN.01-SXTN.08 - Mau bien ban do)
                    <br/>*Yêu cầu lưu lại hồ sơ của tất cả các đợt sản xuất trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[14]" @keyup="inputLink(14)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-14" class="form-control" v-model="selections[14]" @change="changeSelect($event,14)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[14]}}</td>
                <td>{{real_score[14]}}</td>
            </tr>
            <tr>
                <td>10</td>
                <th>Kiểm tra, đánh giá, đo kiểm sản phẩm</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10.1</td>
                <td id='document-name-15'>Kết quả đo kiểm, đánh giá sản phẩm SXTN</td>
                <td>
                    Kết quả đo kiểm, đánh giá sản phẩm SXTN
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[15]" @keyup="inputLink(15)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-15" class="form-control" v-model="selections[15]" @change="changeSelect($event,15)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[15]}}</td>
                <td>{{real_score[15]}}</td>
            </tr>
            <tr>
                <td>11</td>
                <th>Thử nghiệm thực tế</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>11.1</td>
                <td id='document-name-16'>Hoàn thành kế hoạch thử nghiệm thực tế</td>
                <td>
                    Kế hoạch thử nghiệm thực tế được phê duyệt (Cấp TCT)
                    <br/>* BM.VHT.KHCN.01-SXTN.09A - Ke hoach thu nghiem thuc te
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[16]" @keyup="inputLink(16)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-16" class="form-control" v-model="selections[16]" @change="changeSelect($event,16)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[16]}}</td>
                <td>{{real_score[16]}}</td>
            </tr>
            <tr>
                <td>11.2</td>
                <td id='document-name-17'>Hoàn thành và báo cáo kết quả thử nghiệm tại đơn vị sử dụng</td>
                <td>
                    Báo cáo kết quả thử nghiệm thực tế
                    <br/>* BM.VHT.KHCN.01-SXTN.09B - Bien ban thu nghiem thuc te
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[17]" @keyup="inputLink(17)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-17" class="form-control" v-model="selections[17]" @change="changeSelect($event,17)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[17]}}</td>
                <td>{{real_score[17]}}</td>
            </tr>
            <tr>
                <td>12</td>
                <th>Đánh giá chất lượng sản phẩm</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>12.1</td>
                <td id='document-name-18'>Hoàn thành đánh giá chất lượng sản phẩm</td>
                <td>
                    Báo cáo đánh giá chất lượng sản phẩm
                    <br/>* BM.VHT.KHCN.01-SXTN.10 - Bao cao danh gia chat luong san pham
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[18]" @keyup="inputLink(18)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-18" class="form-control" v-model="selections[18]" @change="changeSelect($event,18)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[18]}}</td>
                <td>{{real_score[18]}}</td>
            </tr>
            <tr>
                <td>13</td>
                <th id='document-name-19'>Phân tích nguyên nhân, khắc phục lỗi</th>
                <td>
                    Hồ sơ phân tích nguyên nhân, khắc phục lỗi, bao gồm:
                    <br/>- Yêu cầu thay đổi.
                    <br/>- Log QLDA (theo QT quản lý thay đổi)
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[19]" @keyup="inputLink(19)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-19" class="form-control" v-model="selections[19]" @change="changeSelect($event,19)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[19]}}</td>
                <td>{{real_score[19]}}</td>
            </tr>
            <tr>
                <td>14</td>
                <th id='document-name-20'>Điều chỉnh/cập nhật tài liệu SXTN (nếu có)</th>
                <td>
                    Các tài liệu SXTN đã được cập nhật, điều chỉnh theo thực tế sản xuất
                </td>
                <td><input type="text" class="form-control" v-model="links[20]" @keyup="inputLink(20)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-20" class="form-control" v-model="selections[20]" @change="changeSelect($event,20)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[20]}}</td>
                <td>{{real_score[20]}}</td>
            </tr>
            <tr>
                <td>15</td>
                <th id='document-name-21'>Xây dựng/Cập nhật Quy trình công nghệ lắp ráp Gia công tích hợp đồng điều chỉnh</th>
                <td>
                    Bộ tài liệu Quy trình Công nghệ lắp ráp Gia công Tích hợp - Đồng điều đồng
                    <br/>* BM.VHT.KHCN.01-SXTN.11 - QTCN lắp ráp GCTH-ĐĐC
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[21]" @keyup="inputLink(21)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-21" class="form-control" v-model="selections[21]" @change="changeSelect($event,21)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[21]}}</td>
                <td>{{real_score[21]}}</td>
            </tr>
            <tr>
                <td>16</td>
                <th id='document-name-22'>Lập báo cáo kết quả giai đoạn</th>
                <td>
                    Hoàn thành phê duyệt cấp TCT các báo cáo sau:
                    <br/>- Báo cáo kết quả giai đoạn (BM.VHT.KHCN.01-SXTN.12 -Bao cao ket qua giai doan)
                    <br/>- Báo cáo linh kiện (BM.VHT.KHCN.01-SXTN.13 - Bieu mau bao cao linh kien)
                    <br/>- Bảng chấm công theo công việc (BM.VHT.KHCN.01-SXTN.14 - Bieu mau theo cong viec)
                    <br/>- Báo cáo phẩn bổ chi phí nhân công theo nhân sự (BM.VHT.KHCN.01-SXTN.15 - Bieu mau theo nhan su)
                    <br/>- Bảng Tổng hợp chi phí nhân công theo nhân sự (BM.VHT.KHCN.01-SXTN.16 - Tong hop chi phi nhan cong theo nhan su)
                    <br/>* Yêu cầu lưu trữ trên hệ thống chung
                </td>
                <td><input type="text" class="form-control" v-model="links[22]" @keyup="inputLink(22)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-22" class="form-control" v-model="selections[22]" @change="changeSelect($event,22)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[22]}}</td>
                <td>{{real_score[22]}}</td>
            </tr>
            <tr>
                <td>17</td>
                <th>Cập nhật/Hoàn thiện tài liệu xây dựng bộ Hồ sơ DVT</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>17.1</td>
                <td id='document-name-23'>PM và nhóm dự án cập nhật và hoàn thiện tài liệu, xây dựng bộ hồ sơ DVT</td>
                <td>
                    Bộ hồ sơ DVT (gồm các tài liệu EVT đã được cập nhật, điều chỉnh theo thực tế sản xuất)
                    <br/>Tài liệu hướng dẫn sửa chữa và bảo dưỡng
                </td>
                <td><input type="text" class="form-control" v-model="links[23]" @keyup="inputLink(23)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-23" class="form-control" v-model="selections[23]" @change="changeSelect($event,23)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[23]}}</td>
                <td>{{real_score[23]}}</td>
            </tr>
            <tr>
                <td>17.2</td>
                <td id='document-name-24'>TT Sản xuất/P.Sản xuất kiểm tra ký xác nhận hồ sơ DVT</td>
                <td>
                    Checklist danh mục bộ hồ sơ DVTđược TT Sản xuất ký xác nhận.
                </td>
                <td><input type="text" class="form-control" v-model="links[24]" @keyup="inputLink(24)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-24" class="form-control" v-model="selections[24]" @change="changeSelect($event,24)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[24]}}</td>
                <td>{{real_score[24]}}</td>
            </tr>
            <tr>
                <td>17.3</td>
                <td id='document-name-25'>Hồ sơ DVT được ký bởi BGĐ Khối</td>
                <td>
                    Bộ hồ sơ tài liệu nghiên cứu thiết kế theo quy định tại mục đầu ra QT này
                </td>
                <td><input type="text" class="form-control" v-model="links[25]" @keyup="inputLink(25)" placeholder="Nhập link vào đây"></td>
                <td>
                    <select disabled id="select-25" class="form-control" v-model="selections[25]" @change="changeSelect($event,25)" >
                        <option :value="undefined" disabled>--Lựa chọn--</option>
                        <option value="-1">Không áp dụng</option>
                        <option value="0">Không đạt</option>
                        <option value="1">Đạt</option>
                    </select>
                </td>
                <td>{{temp_max_score[25]}}</td>
                <td>{{real_score[25]}}</td>
            </tr>
            

            <tr>
                <th colspan="5">Tổng điểm</th>
                <td>{{getTotalTempMaxScore}}</td>
                <td>{{getTotalRealScore}}</td>
            </tr>
            <tr>
                <th colspan="5">Tỷ lệ tuân thủ áp dụng</th>
                <td>{{getRate}}%</td>
                <td><input class="btn btn-block btn-success" type="submit" value="Chấm" @click="checkEmpty()"></td>
            </tr>
          </table>
    </b-form>
</template>

<script>
export default {
    name: 'ChecklistSX',
    props:{
        quy_trinh: Object,
        de_tai: Object,
        thoigian: [Date,String]
    },
    data(){
        return{
            document_names: [],
            links: [],
            selections: [],
            max_score:      [5,2,2,1,2,5,2.5,2.5,10,2.5,2.5,2.5,2.5,5,15,5,2,3,5,5,2,5,5,2,2,2],
            real_score:     [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            temp_max_score: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
        } 
    },
    computed: {
        getTotalRealScore(){
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
            return this.real_score.reduce(reducer)
        },
        getTotalTempMaxScore(){
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
            return this.temp_max_score.reduce(reducer)
        },
        getRate(){
            return Math.round(this.getTotalRealScore / this.getTotalTempMaxScore * 100);
        },
    },
    methods: {
        filterArray(array){
            return array.filter(element => {
                return element != undefined && element != null && element != ""
            });
        },
        inputLink(i){
            let DOM_select = document.getElementById(`select-${i}`),
                DOM_td_document_names = document.getElementById(`document-name-${i}`);
            
            if(this.links[i] != ""){
                DOM_select.disabled = false;
                DOM_select.required = true;
                this.$set(this.temp_max_score,i,this.max_score[i])
                this.$set(this.document_names,i,DOM_td_document_names.innerText)      
            }
            else{
                DOM_select.disabled = true;
                DOM_select.required = false;
                this.$set(this.selections,i,undefined)
                this.$set(this.document_names,i,undefined)
                this.$set(this.temp_max_score,i,0)
                this.$set(this.real_score,i,0)
                DOM_select.classList.remove("bg-warning","bg-success","bg-danger");
            }
        },
        changeSelect(event,i){
            event.target.classList.add("text-dark");
            event.target.classList.remove("bg-warning","bg-success","bg-danger");
            //Đánh giá đạt
            if(this.selections[i] == 1){
                event.target.classList.add("bg-success");
                this.$set(this.real_score,i,this.max_score[i])
                this.$set(this.temp_max_score,i,this.max_score[i])
            }
            //Không áp dụng
            else if(this.selections[i] == -1 || this.selections[i] == null){
                event.target.classList.add("bg-warning");
                this.$set(this.temp_max_score,i,0)
                this.$set(this.real_score,i,0)
            }
            //Chưa đánh giá || Đánh giá không đạt
            else{
                event.target.classList.add("bg-danger");
                this.$set(this.temp_max_score,i,this.max_score[i])
                this.$set(this.real_score,i,0)
            }    
        },
        checkEmpty(){
            if(this.filterArray(this.selections).length != this.filterArray(this.links).length){
                this.$bvToast.toast('Vui lòng chọn kết quả đánh giá!', {
                    title: `Thông báo`,
                    variant: "warning",
                    toaster: "b-toaster-top-center",
                    autoHideDelay: 3000
                });
            }
        },
        getDocuments(){
            let documents = [];
            for (let i = 0; i < this.filterArray(this.links).length; i++) {
                documents.push({
                    ten: this.filterArray(this.document_names)[i],
                    link: this.filterArray(this.links)[i],
                    danh_gia: this.filterArray(this.selections)[i]
                })
            }
            return documents;
        },
        formSubmit() {
            if(isNaN(this.getRate)){
                this.$bvToast.toast('Bạn chưa chấm!', {
                    title: `Thông báo`,
                    variant: "danger",
                    toaster: "b-toaster-bottom-right",
                    autoHideDelay: 3000
                });
            }
            else{     
                axios.post("/kpi-quy-trinh", {
                    quy_trinh_id: this.quy_trinh.id,
                    du_an_id: this.de_tai.id,
                    diem: this.getRate,
                    thoigian: this.thoigian,
                    tai_lieu_quy_trinh: this.getDocuments()
                })
                .then(response => {
                    this.$bvToast.toast(response.data.data.ten_du_an, {
                        title: `Thêm thành công kpi quy trinh:${response.data.data.ten_quy_trinh}`,
                        variant: "success",
                        toaster: "b-toaster-bottom-right",
                        autoHideDelay: 5000
                    });
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    }
}
</script>

<style lang = "scss" scoped>
    select{
        width: 145px;
        margin: 0 auto;
    }
    input{
        width: 200px;
        margin: 0 auto;
    }
</style>