import styled from "styled-components";

export const OrderDetails = styled.div`
  display: grid;
  grid-template-columns: 2fr 1fr;
  grid-gap: 2rem;
  margin-top: 1rem;
`;

export const GetRealTimeButton = styled.button`
  max-width: 229px;
  font-weight: 600;
  font-size: 14px;
  line-height: 21px;
  color: #269e97;
  border: 1px solid #269e97;
  text-transform: uppercase;
  background: #fff;
  padding: 0.5rem 1.5rem;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;

  svg {
    margin-right: 10px;
  }
`;

export const MapOrderDetails = styled.div`
  margin-top: 1rem;
`;

export const LocationDetails = styled.div`
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
`;

export const LocationContainer = styled.div`
  margin-bottom: 2.5rem;
  margin-top: 1rem;
`;

export const DetailsContainer = styled.div`
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 1rem;
`;

export const TableRow = styled.tr`
  th {
    font-size: 12px;
    font-weight: normal;
    color: #269e97;

    &.text-center {
      text-align: center;
    }
  }
`;

export const ProgressBar = styled.div`
  border-radius: 0 !important;
  height: 8px !important;
  div {
    background-color: #269e97 !important;
  }
`;

export const ContainerItems = styled.div`
  max-height: 200px;
  overflow-y: scroll;

  &::-webkit-scrollbar {
    width: 8px;
  }
  &::-webkit-scrollbar-track {
    background: transparent;
  }
  &::-webkit-scrollbar-thumb {
    background-color: #269e97;
    border-radius: 4px;
  }

  tr {
    font-size: 14px;

    td {
      font-size: 14px;
    }
  }
`;
