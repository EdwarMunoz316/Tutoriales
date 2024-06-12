import Card from "./card";
import Loading from "./loading";
import FormImg from "./formImg";
import { UseFetchImagenes } from "../hooks/useFetchImagenes";

const Cards = () => {
  const [images, loading, handleSubmit] = UseFetchImagenes();

  return (
    <div className="text-center">
      <FormImg handleSubmit={handleSubmit} />
      <hr />

      {loading && <Loading />}

      <div className="row">
        {images.map((img) => {
          return (
            <div key={img.id} className="col">
              <Card img={img.urls.regular} />
            </div>
          );
        })}
      </div>
    </div>
  );
};

export default Cards;
