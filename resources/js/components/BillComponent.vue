<template>
    <div class="container-fluid" id="bills">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh sách đơn hàng client</h4>
                <p class="card-category">List of product client</p>
                </div>
                <div class="card-body">
                <div class="box bg-light p-1">
                    <div class="card card-bill bg-light text-dark" v-for="(bill, index) in bills" :key="index">
                        <div class="card-header d-flex">
                            <div class="bill-id mr-5"># {{bill.id}}</div>
                            <div class="billinfo">User Order <b> {{bill.user.name}}</b><small><i>{{bill.created_at}}</i></small></div>
                        </div>
                        <div class="card-body pl-5">
                            <div class="product d-flex" v-for="(bill_detail, index) in bill.bill_details" :key="index">
                                <div class="p-image ml-5 mr-5 mb-2"><img :src="bill_detail.product.image" alt=" imageproduct" width="100px"></div>
                                <div class="p-info">
                                    <p>{{bill_detail.curent_price}}</p>
                                    <p>{{bill_detail.amount}}</p>
                                    <p>{{bill_detail.curent_price*bill_detail.amount}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pl-5">
                            <div class="product d-flex" >
                                <div class="p-info">
                                    <p>{{bill.address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'BillComponent',
        data(){
            return{
                bills: {},
            }
        },
        methods:{
            async getAllBill(){
                const bills = await axios.get('get-all-bill').then((res) =>res.data);
                this.bills = bills;
            }
        },
        mounted() {
            this.getAllBill()
        },
    }
</script>
