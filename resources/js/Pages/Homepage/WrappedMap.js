import { useState } from "react";
import {
  GoogleMap,
  useLoadScript,
  Marker,
  InfoWindow,
} from "@react-google-maps/api";

// import * as style from "./style.module.css";

import * as data from '../Homepage/data/data-exemplo.json';
import DestinationDetails from "./components/DestinationDetails/DestinationDetails";
import Label from "./components/Label/Label";

const libraries = ["places"];
const mapContainerStyle = {
  height: "350px",
  width: "auto",
};

const center = {
  lat: 45.4211,
  lng: -75.6903,
};

const WrapperdMap = () => {
  const { isLoaded, loadError } = useLoadScript({
    googleMapsApiKey: "AIzaSyDZ3LwmK5_dj0YoUXy8u_7NMU0o2u1Nvuk",
    libraries,
  });
  const [selectedPark, setSelectedPark] = useState(null);

  if (loadError) return "Error";
  if (!isLoaded) return "Loading...";

  return (
    <div>
      <GoogleMap
        id="map"
        zoom={8}
        center={center}
        mapContainerStyle={mapContainerStyle}
      >
        {data.features.map((park) => (
          <Marker
            key={park.properties.PARK_ID}
            position={{
              lat: park.geometry.coordinates[1],
              lng: park.geometry.coordinates[0],
            }}
            onClick={() => setSelectedPark(park)}
            icon={{
              url: `/car.svg`,
              scaledSize: new window.google.maps.Size(25, 25),
            }}
          />
        ))}

        {selectedPark ? (
          <InfoWindow
            position={{
              lat: selectedPark.geometry.coordinates[1],
              lng: selectedPark.geometry.coordinates[0],
            }}
            onCloseClick={() => {
              setSelectedPark(null);
            }}
          >
            <div>
              <div className={style.container}>
                <div className={style.serviceProvider}>
                  <div className={style.flexCenter}>
                    <img src="/images/service-provider.png" alt="" />
                    <div className={style.serviceProviderInfo}>
                      Douglas Santos
                      <div className={style.startProviderInfo}>
                        <img src="/icons/start.svg" alt="" />
                        <img src="/icons/start.svg" alt="" />
                        <img src="/icons/start.svg" alt="" />
                        <img src="/icons/start.svg" alt="" />
                        <img src="/icons/start-empty.svg" alt="" />
                        <div>
                          <span className={style.numberDelivery}>
                            1500 Deliveries
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button className={style.callButton} />
                </div>

                <div className={style.progressInformation}>
                  <p className={style.progressTitle}>Progress</p>
                  <div className={style.barProgress} />
                </div>

                <DestinationDetails />

                <div className={style.marginTop}>
                  <Label>Delivery Infos</Label>
                  <div className={style.infoContainer}>
                    <div>
                      <p>
                        Requested in: <span>16 p.m</span>
                      </p>
                      <p>
                        Acepted in: <span>16:05 p.m</span>
                      </p>
                      <p>
                        Arrival in:1<span>6:25 p.m</span>{" "}
                      </p>
                      <p>
                        Delivery time: <span>20min</span>
                      </p>
                    </div>

                    <div>
                      <p>
                        Items: <span>$300</span>
                      </p>
                      <p>
                        Shipping: <span>$20.00</span>
                      </p>
                    </div>
                  </div>
                </div>

                <div className={style.marginTop}>
                  <Label>Customer</Label>
                  <div className={style.customer}>
                    <div className={style.flexCenter}>
                      <img src="/images/customer.png" alt="" />
                      <div className={style.customerInfo}>
                        <p>Marck Avillar</p>
                        <span>38 Orders</span>
                      </div>
                    </div>
                    <button className={style.callButton} />
                  </div>
                </div>

                <a className={style.viewOrders} href="/">
                  View Order Details
                </a>
              </div>
            </div>
          </InfoWindow>
        ) : null}
      </GoogleMap>
    </div>
  );
};

export default WrapperdMap;
