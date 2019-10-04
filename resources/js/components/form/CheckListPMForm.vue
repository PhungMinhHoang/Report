<template>
    <b-form class="checklist" @submit.prevent="formSubmit">
        <table class="table table-bordered">
            <tr>
                <th style="width:" >STT</th>
                <th style="width:15%">Nội dung đánh giá</th>
                <th style="width:15%">Nội dung hồ sơ tài liệu</th>
                <th style="width:15%">Biểu mẫu yêu cầu</th>
                <th style="width:10%">Cấp phê duyệt</th>
                <th style="width:">Link lưu trữ chung</th>
                <th style="width:">Kết quả đánh giá</th>
                <th style="width:">Điểm tối đa</th>
                <th style="width:">Điểm thực tế</th>
            </tr>
            <tr>
                <td>1</td>
                <th>Lập kế hoạch</th>
                <td id='document-name-0'>Cây công việc chi tiết trên hệ thống VECO</td>
                <td>Theo template VECO</td>
                <td>PM/Kỹ sư hệ thống</td>
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
                <td>2</td>
                <th>Xác định/Phê duyệt yêu cầu người dùng</th>
                <td id='document-name-1'>
                    - BRD được xem xét và phê duyệt.
                    <br/>- Tài liệu RTM được cập nhật</td>
                <td>
                    - SW – BRD (Business Requirement Document)
                    <br/>- SW - Cau hoi khao sat
                    <br/>- SW – Checklist BRD            
                </td>
                <td>PM/Kỹ sư hệ thống</td>
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
                <td>3</td>
                <th>Xác định/Phê duyệt yêu cầu phần mềm</th>
                <td id='document-name-2'>
                    - Tài liệu Usecase được phê duyệt
                    <br/>- Tài liệu SRS được phê duyệt
                    <br/>- Tài liệu RTM được cập nhật
                </td>
                <td>
                    - SW – SRS
                    <br/>- SW - Use case
                    <br/>- SW - RTM
                    <br/>- SW - Checklist SRS
                    <br/>- SW – Checklist Use case
                </td>
                <td>PM/Kỹ sư hệ thống</td>
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
                <td>4</td>
                <th>Thiết kế/Phê duyệt mức cao</th>
                <td id='document-name-3'>
                    - Tài liệu HLD được phê duyệt
                    <br/>- Kế hoạch tích hợp PI Plan được phê duyệt
                    <br/>- Tài liệu RTM được cập nhật
                </td>
                <td>
                    - SW– HLD
                    <br/>- SW– DbD
                    <br/>- SW- Ke hoach tich hop san pham
                    <br/>- SW - Checklist Tai lieu thiet ke CSDL
                    <br/>- SW - Checklist Tai lieu thiet ke
                </td>
                <td>PM/Kỹ sư hệ thống</td>
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
                <td>5</td>
                <th>Thiết kế/Phê duyệt chi tiết</th>
                <td id='document-name-4'>
                    - Tài liệu DD
                    <br/>- Tài liệu UID
                </td>
                <td>
                    - SW– DD
                    <br/>- SW– SyID
                    <br/>- SW– UID
                    <br/>- SW - Checklist Tai lieu thiet ke
                </td>
                <td>PM/Kỹ sư hệ thống</td>
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
                <td>6</td>
                <th>Thiết kế kiểm thử</th>
                <td id='document-name-5'>Tài liệu Testcase, test data, Testscript (Nếu có)</td>
                <td>
                    SW - Test Case
                    <br/>- SW - Checklist Test case
                </td>
                <td>PM/Kỹ sư hệ thống</td>
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
                <td>7</td>
                <th>Code, code review, unit test & fix bug</th>
                <td id='document-name-6'>Mã nguồn</td>
                <td>
                    - SW- Thong bao phat hanh
                    <br/>- SW - Checklist Thong bao phat hanh
                    <br/>- SW - Checklist Ma nguon phan mem
                </td>
                <td>Trưởng nhóm SW</td>
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
                <td>8</td>
                <th>Tích hợp</th>
                <td id='document-name-7'>Mã nguồn đã được tích hợp</td>
                <td>-</td>
                <td>Trưởng nhóm SW</td>
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
                <td>9</td>
                <th>Ban hành</th>
                <td id='document-name-8'>Sản phẩm đã được tích hợp và kiểm thử, ban hành, đóng gói</td>
                <td>-</td>
                <td>-</td>
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
                <td>10</td>
                <th>Chuẩn bị môi trường</th>
                <td id='document-name-9'>Môi trường kiểm tra đã được chuẩn bị sẵn sàng.</td>
                <td>-</td>
                <td>-</td>
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
                <td>11</td>
                <th>Thực hiện kiểm thử</th>
                <td id='document-name-10'>
                    - Chương trình đã được kiểm thử
                    <br/>- Testcase
                </td>
                <td>
                    - SW - Guideline Quan ly loi
                    <br/>- SW - Defect Log
                </td>
                <td>-</td>
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
                <td>12</td>
                <th>Phân tích nguyên nhân, giải pháp</th>
                <td id='document-name-11'>Log phát triển phần mềm</td>
                <td>SW - Log phat trien phan mem</td>
                <td>-</td>
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
                <td>13</td>
                <th>Tổng kết và báo cáo</th>
                <td id='document-name-12'>Báo cáo kiểm thử</td>
                <td>SW - Bao cao ket qua kiem thu</td>
                <td>PM/Kỹ sư hệ thống</td>
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
                <th colspan="7">Tổng điểm</th>
                <td>{{getTotalTempMaxScore}}</td>
                <td>{{getTotalRealScore}}</td>
            </tr>
            <tr>
                <th colspan="7">Tỷ lệ tuân thủ áp dụng</th>
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
            max_score: [5,12,15,12,12,5,5,5,5,2,12,5,5],
            real_score: [0,0,0,0,0,0,0,0,0,0,0,0,0],
            temp_max_score: [0,0,0,0,0,0,0,0,0,0,0,0,0],
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
    }
    input{
        width: 200px;
    }
</style>