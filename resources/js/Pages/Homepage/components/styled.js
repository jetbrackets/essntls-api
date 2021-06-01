import styled from "styled-components";

export const Label = styled.p`
  display: grid;
  grid-template-columns: 1fr 2fr;
  align-items: center;
  color: #269e97;
  font-size: 12px;
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
