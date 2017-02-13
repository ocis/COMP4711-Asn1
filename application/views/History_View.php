<div class="container">
  <h2>History Transactions</h2>                                            
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>TransID</th>
        <th>RobotID</th>
        <th>PartsID</th>
        <th>Transaction Type</th>
        <th>Transaction Date</th>
        <th>Transaction Time</th>
        <th>Shipment Status</th>
        <th>Shipment Date</th>
        <th>Shipment Received Date</th>
        <th>Shipment Received Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
	  {history}
        <td>{TransID}</td>
        <td>{RobotID}</td>
        <td>{PartsID}</td>
        <td>{Transaction Type}</td>
        <td>{Transaction Date}</td>
        <td>{Transaction Time}</td>
        <td>{Shipments Status}</td>
        <td>{Shipment Date}</td>
        <td>{Shipment Received Date}</td>
        <td>{Shipment Received Time}</td>
      </tr>
	  {/history}
    </tbody>
  </table>
  </div>
</div>

</body>
</html>