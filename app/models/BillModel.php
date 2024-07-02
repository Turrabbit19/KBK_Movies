<?php
namespace App\Models;

class BillModel extends BaseModel
{
    protected $table = 'bills';

    public function getBill(){
        $sql = "
        SELECT b.id              AS    b_id,
               b.status          AS    b_status,
               b.created_at      AS    b_created_at,
               b.updated_at      AS    b_updated_at,
               bk.payment_method AS    bk_payment_method,
               bk.total_amount   AS    bk_total_amount,
               st.show_date      AS    st_show_date,
               st.show_time      AS    st_show_time,
               r.room_number     AS    r_room_number,
               s.seat_number     AS    s_seat_number,
               stp.price         AS    stp_price,
               stp.type_name     AS    stp_type_name,
               cp.sale           AS    cp_sale,
               f.name            AS    f_name,
               f.totals          AS    f_totals,
               ac.name           AS    ac_name
        FROM $this->table AS b
        INNER JOIN bookings     AS bk   ON b.booking_id = bk.id
        INNER JOIN showtimes    AS st   ON bk.showtime_id = st.id
        INNER JOIN rooms        AS r    ON bk.room_id = r.id
        INNER JOIN seats        AS s    ON bk.seat_id = s.id
        INNER JOIN seat_types   AS stp  ON s.seat_type_id = stp.id
        INNER JOIN coupons      AS cp   ON bk.coupon_id = cp.id
        INNER JOIN foods        AS f    ON bk.food_id = f.id
        INNER JOIN accounts     AS ac   ON bk.account_id = ac.id
        ORDER BY b.id
        ";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    public function delBill($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}