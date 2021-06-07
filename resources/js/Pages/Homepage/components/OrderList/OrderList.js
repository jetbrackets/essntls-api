import { useState } from "react";
import DestinationDetails from "../DestinationDetails/DestinationDetails";
import Label from "../Label/Label";

// import * as style from "./style.module.css";

import WrapperdMap from "../../WrappedMap";

const Collapse = () => {
  const [show, setShow] = useState(false);

  const handleCollapse = () => setShow(!show);

  return (
    <>
      <tr
        onClick={handleCollapse}
        style={{
          cursor: "pointer",
          borderBottom: "1px solid #CFCFCF",
        }}
      >
        <td className=" align-middle">
          <div className={`progress $"progressBar}`}>
            <div
              className="progress-bar"
              role="progressbar"
              style={{ width: "50%" }}
              aria-valuenow="50"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>
        </td>
        <td className="align-middle text-center" style={{ color: "#969696" }}>
          #34834
        </td>
        <td className="align-middle text-center">
          <div>
            <p style={{ margin: "0" }}>16:05 p.m</p>
            <small style={{ color: "#969696" }}>02/23/2021</small>
          </div>
        </td>
        <td className="align-middle text-center">
          <div>
            <p style={{ margin: "0" }}>16:05 p.m</p>
            <small style={{ color: "#969696" }}>02/23/2021</small>
          </div>
        </td>
        <td className="align-middle text-center">$30</td>
        <td className="col-md-2 align-middle">Marck Avillar</td>
        <td className="col-md-2 align-middle">Douglas Santos</td>
        <td style={{ width: "40px" }}>
          <svg width="18" height="11" fill="none">
            <path
              d="M2 2L9 9L16 2"
              stroke="#2A3642"
              strokeWidth="3"
              strokeLinecap="round"
              strokeLinejoin="round"
            />
          </svg>
        </td>
      </tr>
      <tr className={`collapse ${show ? "show" : ""}`}>
        <td colSpan="7">
          <div className="orderDetails">
            <div>
              <div>
                <button className="getReailTimeButton">
                  <svg width="20" height="21" fill="none">
                    <path
                      d="M3 19.5C1.89543 19.5 1 18.6046 1 17.5C1 16.3954 1.89543 15.5 3 15.5C4.10457 15.5 5 16.3954 5 17.5C5 18.6046 4.10457 19.5 3 19.5Z"
                      fill="#269E97"
                    />
                    <path
                      d="M11 18.5C11 13.5294 6.97056 9.5 2 9.5V7.5C8.07513 7.5 13 12.4249 13 18.5H11Z"
                      fill="#269E97"
                    />
                    <path
                      d="M18 18.5C18 9.66344 10.8365 2.5 1.99997 2.5V0.5C11.9411 0.5 20 8.55887 20 18.5H18Z"
                      fill="#269E97"
                    />
                  </svg>
                  track in real time
                </button>
              </div>

              <div className="detailsContainer">
                <div>
                  <div className="mapOrderDetails">
                    <WrapperdMap />
                  </div>
                </div>

                <div className="locationDetails">
                  <div className="locationContainer">
                    <DestinationDetails />
                  </div>

                  <div>
                    <Label>Time History</Label>
                    <table className="table table-borderless">
                      <tr>
                        Requested in:
                        <td>16 p.m</td>
                      </tr>
                      <tr>
                        Acepted in:
                        <td>16:05 p.m</td>
                      </tr>
                      <tr>
                        Arrival in:
                        <td>16:25 p.m</td>
                      </tr>
                      <tr>
                        Delivery time:
                        <td>20m</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div className="locationDetails">
              <p>Items</p>
              <div className={`table-responsive $"containerItems}`}>
                <table className="table table-striped">
                  <tbody>
                    <tr>
                      <td>Ibuprofen 200mg</td>
                      <td>3</td>
                      <td>$ 10,00</td>
                      <td>$ 30,00</td>
                    </tr>

                    <tr>
                      <td>Ibuprofen 200mg</td>
                      <td>3</td>
                      <td>$ 10,00</td>
                      <td>$ 30,00</td>
                    </tr>

                    <tr>
                      <td>Ibuprofen 200mg</td>
                      <td>3</td>
                      <td>$ 10,00</td>
                      <td>$ 30,00</td>
                    </tr>

                    <tr>
                      <td>Ibuprofen 200mg</td>
                      <td>3</td>
                      <td>$ 10,00</td>
                      <td>$ 30,00</td>
                    </tr>

                    <tr>
                      <td>Ibuprofen 200mg</td>
                      <td>3</td>
                      <td>$ 10,00</td>
                      <td>$ 30,00</td>
                    </tr>

                    <tr>
                      <td>Ibuprofen 200mg</td>
                      <td>3</td>
                      <td>$ 10,00</td>
                      <td>$ 30,00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div>
                <Label>Invoice Details ($)</Label>
                <table className="table table-borderless">
                  <tr>
                    Requested in:
                    <td>16 p.m</td>
                  </tr>
                  <tr>
                    Acepted in:
                    <td>16:05 p.m</td>
                  </tr>
                  <tr>
                    Arrival in:
                    <td>16:25 p.m</td>
                  </tr>
                  <tr>
                    Delivery time:
                    <td>20m</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </td>
      </tr>
    </>
  );
};

const OrderList = () => {
  return (
    <>
      <table className="table table-borderless">
        <thead>
          <tr className="tableRow">
            <th scope="col">Progress</th>
            <th scope="col" className="text-center">
              Order number
            </th>
            <th scope="col" className="text-center">
              Acepted in
            </th>
            <th scope="col" className="text-center">
              Arrival in
            </th>
            <th scope="col" className="text-center">
              Amount
            </th>
            <th scope="col">Customer</th>
            <th scope="col">Service Provider</th>
          </tr>
        </thead>
        <tbody>
          <Collapse />
          <Collapse />
        </tbody>
      </table>
    </>
  );
};

export default OrderList;
