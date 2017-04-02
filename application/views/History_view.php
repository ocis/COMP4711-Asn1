<div class="container">
  <h2>History Transactions</h2>
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Transaction ID</th>
        <th>Transaction Type</th>
        <th>Part ID</th>
        <th>Robot ID</th>
        <th>Amount</th>
        <th>Transaction Time</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
	  {history}
        <td>{Transaction ID}</td>
        <td>{Transaction Type}</td>
        <td>{Parts ID}</td>
        <td>{Robot ID}</td>
        <td>{Amount}</td>
        <td>{Transaction Time}</td>
        <td>{Description}</td>
      </tr>
	  {/history}
    </tbody>
  </table>
  </div>
</div>

</body>
</html>
