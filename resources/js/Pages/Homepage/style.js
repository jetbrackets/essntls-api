import styled from "styled-components";

export const Container = styled.div`
  width: 300px;
  background: #fff;
  padding: 1rem;
`;

export const SeviceProvider = styled.div`
  display: flex;
  align-items: center;
  justify-content: space-between;

  > div {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
`;

export const ServiceProviderInfo = styled.div`
  margin-left: 1rem;

  > div {
    display: flex;
    align-items: center;
    justify-content: space-between;

    span {
      color: #969696;
      margin-left: 5px;
    }
  }
`;

export const Image = styled.img``;

export const ProgressInformation = styled.div`
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: #269e97;
`;

export const BarProgress = styled.div`
  width: 100%;
  margin-left: 8px;
  height: 8px;
  background: #269e97;
`;

export const Destinations = styled.div`
  div {
    display: flex;
    align-items: center;

    &:nth-child(2) {
      margin-top: 2rem;
    }
  }
`;

export const Circle = styled.span`
  margin-right: 1rem;
  display: block;
  height: 17px;
  width: 17px;
  border-radius: 50%;
  background: #fff;
  border: 1px solid
    ${(props) => (props.statusColor === "green" ? "#33a753" : "#F01E1E")};
  position: relative;

  &::before {
    content: "";
    display: block;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    background: ${(props) =>
      props.statusColor === "green" ? "#33a753" : "#F01E1E"};
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
`;

export const Label = styled.p`
  display: grid;
  grid-template-columns: 1fr 2fr;
  align-items: center;
  color: #269e97;
  margin: 5px 0;

  &::after {
    content: "";
    width: 100%;
    height: 1px;
    background: #269e97;
    display: block;
    margin-top: 2px;
  }
`;

export const DeliveryInformation = styled.div`
  div {
    p {
      display: flex;
      align-items: center;
      justify-content: space-between;

      margin: 5px 0;
    }
  }
`;

export const InfoContainer = styled.div`
  display: grid;
  grid-template-columns: 1.5fr 1fr;
  grid-gap: 1rem;
`;

export const CustomerInformation = styled.div``;

export const Customer = styled.div`
  display: flex;
  align-items: center;
  justify-content: space-between;

  > div {
    display: flex;
    align-items: center;
    justify-content: space-between;

    div {
      margin-left: 1rem;

      p {
        margin: 0px;
      }

      span {
        color: #969696;
      }
    }
  }
`;

export const CallButton = styled.button`
  background: url("/icons/call.svg") no-repeat center center;
  height: 30px;
  width: 48px;
  border: 1px solid #269e97;
  cursor: pointer;
`;

export const ViewOrders = styled.a`
  display: block;
  font-weight: bold;
  color: #269e97;
  text-align: center;
  margin-top: 10px;
`;
