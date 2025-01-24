<form action="{{ url('/send-order') }}" method="POST">
    @csrf  <!-- CSRF token for security -->
    
    <input type="text" name="order_id" value="12345">
    <input type="text" name="firstname" value="Hasib">
    <input type="text" name="lastname" value="Ahmed">
    <input type="text" name="mobileno" value="1234567890">
    <input type="text" name="address_line_one" value="123 Main St">
    <input type="text" name="total_price" value="500">
    
    <button type="submit">Send Order</button>
</form>

<script>

axios.post('/send-order', {
    order_id: '12345',
    firstname: 'Hasib',
    lastname: 'Ahmed',
    mobileno: '1234567890',
    address_line_one: '123 Main St',
    total_price: '500'
})
.then(response => {
    console.log('Order sent:', response.data);
})
.catch(error => {
    console.error('Error sending order:', error);
});

</script>