import React from 'react'

function OrderMenu() {
    return (
        <div className="container">
            <div className="row">
                <div className="col-sm">
                    <h1 style={{fontFamily:"Hind Vadodara, sans-serif"}}>Starters</h1>
                </div>
            </div>
            <div className="row">
                <div className="col-sm">
                <table class="table table-bordered border-dark text-center" style={{fontFamily:"Hind Vadodara, sans-serif"}}>
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Dish</th>
                    <th scope="col">Price</th>
                    <th scope="col">Add Items</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Item1</td>
                    <td>$$</td>
                    <td><button type="button" class="btn btn-success">Add-Items</button></td>
                    <td><button type="button" class="btn btn-danger">Remove</button></td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Item2</td>
                <td>$$</td>
                <td><button type="button" class="btn btn-success">Add-Items</button></td>
                <td><button type="button" class="btn btn-danger">Remove</button></td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Item3</td>
                <td>$$$</td>
                <td><button type="button" class="btn btn-success">Add-Items</button></td>
                <td><button type="button" class="btn btn-danger">Remove</button></td>
                </tr>
            </tbody>
        </table>
                </div>
            </div>
        </div>
    )
}

export default OrderMenu
