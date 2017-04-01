<div class="container">
  <h2>History Transactions</h2>
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Transaction Type</th>
        <th>Transaction Date</th>
        <th>Transaction Time</th>
        <th>Shipment Date</th>
        <th>Shipment Received Date</th>
        <th>Shipment Received Time</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
	  {history}
        <td>{Transaction Type}</td>
        <td>{Transaction Date}</td>
        <td>{Transaction Time}</td>
        <td>{Shipment Date}</td>
        <td>{Shipment Received Date}</td>
        <td>{Shipment Received Time}</td>
        <td>{Description}</td>
      </tr>
	  {/history}
    </tbody>
  </table>
  </div>
</div>

</body>
</html>
